<?php
IncludeModuleLangFile(__FILE__);

class cCustomCDN
{
    private static $handled_url = array();
    private static $processed_url = array();
    private static $skeeped_url = array();

    static $MODULE_ID="skypark.cdn";
    private static $isAjax = false;
    private static $cdnUrl = '';
    private static $includeMask  =""; //js;css;jpg;jpeg;gif
    private static $excludeMask  ="";
    private static $excludeDirMask  ="";
    private static $regexConfig=array(
       "original"=>0,
       "attribute"=>1,
       "open_quote"=>2,
       "protocol"=>3,
       "fulldomain"=>4,
       "port"=>13, 
       "url"=>14,
       "extension"=>15,
       "params"=>16,
       "close_quote"=>17,
    );
    private static $validProtocol=array(
        "//",
        "http://",
        "https://"
    );
    private static $siteNames=array(

    );
    private static $myUrl="";
    private static $myAbsoluteUrl="";
    
    private static $domain_regex = "(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][-_\.a-zA-Z0-9]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,6}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,13})";
    private static $ip_regex="(\d{1,3}\.){3}\d{1,3}";

    private static $extension_regex;
    
    public static function startsWith($str, $char)
    {
        return $str[0] === $char;
    }

    public static function startsWithpart($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }

    public static function endsWithpart($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }
    
    public static function OnEndBufferContent(&$content)
    {
         //if is adminkO exit
        if (defined("ADMIN_SECTION")) {
          return ;
        }

        if (!self::IsActive()) {
            return;
        }
         
        self::$myUrl = dirname($_SERVER["REQUEST_URI"]) . "/";

        $res = CSite::GetByID(SITE_ID);
        $siteid=SITE_ID;
        if ($res
           && isset($res->arResult[0])
           && isset($res->arResult[0]["SERVER_NAME"])
        ) {
            self::$siteNames[] = $res->arResult[0]["SERVER_NAME"];
            $siteid = $res->arResult[0]['LID'];
            self::$myUrl = $res->arResult[0]['SERVER_NAME'];
           // self::$myAbsoluteUrl=empty($res->arResult[0]['DIR'])?$APPLICATION->GetCurDir():$res->arResult[0]['DIR'];

        }
        
        global $APPLICATION;
        self::$myAbsoluteUrl = $APPLICATION->GetCurDir();

        self::$cdnUrl = COption::GetOptionString(self::$MODULE_ID, 'cdn_domain'.$siteid);
        self::$includeMask  = COption::GetOptionString(self::$MODULE_ID, 'include_mask'.$siteid);
        self::$excludeMask  = COption::GetOptionString(self::$MODULE_ID, 'exclude_mask'.$siteid);
        self::$excludeDirMask  = trim(COption::GetOptionString(self::$MODULE_ID, 'exclude_dir_mask'.$siteid));
        
        if (self::$cdnUrl === "") {
            return;
        }           

        $tmp = json_decode($content);
        unset($tmp);
        if (json_last_error() === JSON_ERROR_NONE) {
            return;
        }  

        $absoluteUrl = trim(self::$myAbsoluteUrl, '/');
	$curUri = trim($APPLICATION->GetCurUri(), '/');
        if ($absoluteUrl != '') {
            $CurPath = explode("/", dirname($absoluteUrl));
            $FirstCurPAth = explode("/", $absoluteUrl);
            
            // массив путей страниц, на которых плагин не нужен
            $arDirExclude = self::$excludeDirMask != '' ? explode(";", trim(self::$excludeDirMask, ';')) : array();
            foreach ($arDirExclude as &$dirExclude) {
                $dirExclude = preg_replace('~^https?://~', '', trim($dirExclude)); // удаляем схему
                $dirExclude = trim(preg_replace('~' . self::$myUrl . '~', '', $dirExclude), '/'); // удаляем домен
            }
            
            //var_dump($CurPath);
            //var_dump($FirstCurPAth);
            //print_r($arDirExclude);
	    //var_dump($curUri);
            
            foreach ($arDirExclude as &$dirExclude) {
                if (0 === mb_strpos($curUri, $dirExclude, 0, 'utf-8')) {
                    return;
                }
            }
            
            if ((in_array($CurPath[0], $arDirExclude)) || (count($FirstCurPAth) > 1 && in_array($FirstCurPAth[1], $arDirExclude))) {
                return;
            }
        }
/*        
        if ($APPLICATION->GetCurDir() != "/" ) {
            $CurPath = explode("/", dirname(trim(self::$myAbsoluteUrl, '/')));
            $FirstCurPAth = explode("/", trim(self::$myAbsoluteUrl, '/'));
            $arDirExclude = self::$excludeDirMask != '' ? explode(";", trim(self::$excludeDirMask, ';')) : array();
var_dump(self::$myUrl);
var_dump(self::$myAbsoluteUrl);            
var_dump($CurPath);
            var_dump($FirstCurPAth);
            print_r($arDirExclude);

            if ((in_array($CurPath[0], $arDirExclude)) || (count($FirstCurPAth) > 1 && in_array($FirstCurPAth[1], $arDirExclude))) {
                return;
            }
        }
*/        
        self::$siteNames[] = $_SERVER['SERVER_ADDR'];

        self::$isAjax = preg_match("/<head>/i", substr($content, 0, 512)) === 0;

        #prepare include mask
        self::$extension_regex = "(?:[a-zA-Z]{1,4})";
        if (!empty(self::$includeMask)){
           $arExtensions = array_map(
                array(
                        "cCustomCDN",
                        "_preg_quote",
                    ),
                explode(";",self::$includeMask)
            );
            self::$extension_regex = "(?:".implode("|", $arExtensions).")";
        }

        //;$domain_regex="(([a-zA-Z]{1})|([a-zA-Z]{1}[a-zA-Z]{1})|([a-zA-Z]{1}[0-9]{1})|([0-9]{1}[a-zA-Z]{1})|([a-zA-Z0-9][-_\.a-zA-Z0-9]{1,61}[a-zA-Z0-9]))\.([a-zA-Z]{2,6}|[a-zA-Z0-9-]{2,30}\.[a-zA-Z]{2,13})";
        //$ip_regex="(\d{1,3}\.){3}\d{1,3}";
        $regex = "/
				((?i:
					href=
					|src=
                    |srcset=
                    |data-original=
                    |data-background=
                    |data-1x=
                    |data-2x=
                    |data-lazy=
                    |content=
					|BX\\.loadCSS\\(
					|BX\\.loadScript\\(
					|BX\\.getCDNPath\\(
					|jsUtils\\.loadJSFile\\(
					|background\\s*:\\s*url\\(
                    |background-image:\\s*url\\(
				))                                                   #attribute
				(\"|'|)                                              #open_quote
                ((?:https?:\/+|\/\/)?)                               #protocol if set
				#((?:[\da-zA-Z\.-]+)?)                               #prefix
                ((?:" . self::$domain_regex . "|" . self::$ip_regex . ")?)
                ((?:\:\d+)?)                                         #port
				([^?'\"]+\\.)                                        #href body
				(" . self::$extension_regex . ")                     #extension
				(|\\?\\d+|\\?v=\\d+)                                 #params
				(\\2)                                                #close_quote
			/xi";
        $content = preg_replace_callback($regex, array("cCustomCDN", "_filter"), $content);
            
        // атрибуты, содержащие несколько ссылок
        $regex = "/
				((?i:
					srcset=
				))                                                   #attribute
				(\"|'|)                                              #open_quote
                (.*?)                                                #value
				(\\2)                                                #close_quote
			/xi";
        $content = preg_replace_callback($regex, array("cCustomCDN", "_filterMulti"), $content);

    }
    static function _preg_quote($str)
    {
        return preg_quote($str, "/");
    }
    
    public static function _filter($match)
    {
        $vals=array();
        foreach (self::$regexConfig as $key=>$val){
            $vals[$key]= $match[$val];
        }

        if (self::$isAjax && $vals['extension'] === "js") {
            return $match[0];
        }

        ## process exclude mask
        $masks = explode(';',self::$excludeMask);
        foreach ($masks as  $mask){
            if ($mask == $vals['extension']){
                return $match[0];
            }
        }

        $bFounded = false;
        if (!empty($vals['protocol'])&&empty($vals['fulldomain'])){
            return $match[0];
        }
        if (!empty($vals['fulldomain'])){
            foreach(self::$siteNames as  $domain){
                if (preg_match('/(.*)'.$domain.'$/i', $vals['fulldomain'])) {
                   $bFounded = true;
                   break;
                }
            }
            if (!$bFounded){
                return $match[0];
            }
        }

        $proto = empty($vals['protocol'])?"//":$vals['protocol'];
        $filePath = /*$prefix.*/$vals['url'].$vals['extension'];
        if ($vals['params'] === ''){
            $filePath = CUtil::GetAdditionalFileURL($filePath);
        }

        if (self::startsWithpart($vals['url'], "www.")){
            return $match[0];
        }

        //Fix spaces in the link
        $filePath = str_replace(" ", "%20", $filePath);
        if (!self::startsWith($filePath, '/')){
            //$filePath=self::$myUrl.$filePath;
            $filePath=self::$myAbsoluteUrl.$filePath;
        }

        if (strpos($filePath, 'mailto:')!==FALSE){
            return $match[0];
        }

        return $vals['attribute'].$vals['open_quote'].$proto.self::$cdnUrl.$filePath.$vals['params'].$vals['close_quote'];
    }
    
    public static function _filterMulti($match)
    {
        if (!preg_match('~\s+~isu', $match[3])) { // нет пробелов
            return $match[0];
        }
                
        // выбираем ссылки и преобразуем по одной согласно общему фильтру
        $regexUrl = "/
     	        ()()
		    	#\b
                ((?:https?:\/+|\/\/)?)                               #protocol if set
                ((?:" . self::$domain_regex . "|" . self::$ip_regex . ")?)
				([^?'\"\s]+\\.)                                        #href body
				(" . self::$extension_regex . ")                     #extension
				(|\\?\\d+|\\?v=\\d+)                                 #params
				#\b
			    ()                                                   #close_quote
			/xiU";
        $match[3] = preg_replace_callback($regexUrl, array("cCustomCDN", "_filter"), $match[3]); 
        unset($match[0]);
        return implode('', $match);
    }

    public static function IsActive()
    {
        foreach (GetModuleEvents("main", "OnEndBufferContent", true) as $arEvent) {
            if ($arEvent["TO_MODULE_ID"] === self::$MODULE_ID && $arEvent["TO_CLASS"] === "cCustomCDN") {
                    return true;
            }
        }
        return false;
    }

    public static function stop()
    {
        UnRegisterModuleDependences("main","OnEndBufferContent", self::$MODULE_ID, "cCustomCDN","OnEndBufferContent");
    }

    public static function SetActive()
    {
        if(!self::IsActive()){
            RegisterModuleDependences("main", "OnEndBufferContent", self::$MODULE_ID, "cCustomCDN", "OnEndBufferContent");
        }
        return self::IsActive();
    }
}
