<?

namespace Ammina\Optimizer\Core2\Optimizer;

use Ammina\Optimizer\Core2\Application;
use Ammina\Optimizer\Core2\Driver\LazyImage\Blur;
use Sabberworm\CSS\OutputFormat;
use Sabberworm\CSS\Parser;
use Sabberworm\CSS\Value\URL;

class Lazy
{
	protected $arOptions = false;
	protected $moveJsBxstatTop = false;
	protected $arAllImageTags = [];
	protected $arAllIFrameTags = [];
	protected $arAllJSScript = [];
	protected $arAllCssLinks = [];
	/**
	 * @var Image
	 */
	protected $oImageOptimizer = NULL;
	protected $oBlur = NULL;

	public function __construct($arOptions, $moveJsBxstatTop = false)
	{
		$this->oBlur = new Blur();
		$this->setOptions($arOptions);
		$this->setMoveJsBxstatTop($moveJsBxstatTop);
	}

	public function setOptions($arOptions)
	{
		$this->arOptions = $arOptions;
	}

	public function setMoveJsBxstatTop($moveJsBxstatTop)
	{
		$this->moveJsBxstatTop = $moveJsBxstatTop;
	}

	public function doOptimize()
	{
		global $APPLICATION;
		if ($this->arOptions['images']['options']['ACTIVE'] === 'Y') {
			$this->doOptimizeImages();
		}
		if ($this->arOptions['iframe']['options']['ACTIVE'] === 'Y') {
			$this->doOptimizeIFrame();
		}
		if ($this->arOptions['images']['options']['ACTIVE'] === 'Y' || $this->arOptions['iframe']['options']['ACTIVE'] === 'Y') {
			$content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/bitrix/js/ammina.optimizer/ammina.lazy.js');
			$content = str_replace(array('\'#PERSENT_DISPLAY_IMAGE#\'', '\'#PERSENT_DISPLAY_IFRAME#\''), array((float)($this->arOptions['images']['options']['PERCENT_DISPLAY'] / 100), (float)($this->arOptions['iframe']['options']['PERCENT_DISPLAY'] / 100)), $content);
			Application::getInstance()->getParser()->AddTag("//body[1]", "script", array(
				"data-nolazy" => 'true'
			), $content);
		}
		if ($this->arOptions['js']['options']['ACTIVE'] === 'Y') {
			$this->doOptimizeJs();
		}
		if ($this->arOptions['js_main']['options']['ACTIVE'] === 'Y') {
			$this->doOptimizeJsMain();
		}
		if ($this->arOptions['css']['options']['ACTIVE'] === 'Y') {
			$this->doOptimizeCss();
		}
	}

	protected function doOptimizeImages()
	{
		$oParser = Application::getInstance()->getParser();
		if (!$oParser) {
			return;
		}
		$this->arAllImageTags = $oParser->getAllLazyTags($this->arOptions['images']['options']['LAZY_CLASS'], $this->arOptions['images']['options']['LAZY_TAGS'], $this->arOptions['images']['options']['IGNORE_CLASS'], $this->arOptions['images']['options']['IGNORE_IDENT']);
		$this->oImageOptimizer = Application::getInstance()->getImageOptimizer();

		foreach ($this->arAllImageTags as $index => $arTag) {
			foreach ($arTag['ATTRIBUTES'] as $attributeIndex => $attributeInfo) {
				if ($attributeInfo['TYPE'] === 'img' && $attributeIndex === 'src') {
					$this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['LAZY_FILE'] = $this->doMakeLazyFile($attributeInfo['IMAGE']);
					$oParser->setLazyNodeAttribute($index, "data-src", $attributeInfo['IMAGE']);
					if (strlen($this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['LAZY_FILE']) > 0) {
						$oParser->setLazyAttribute($index, $attributeIndex, $this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['LAZY_FILE']);
						$oParser->addLazyClassAttribute($index, "ammina-lazy");
						$oParser->addLazyClassAttribute($index, "ammina-lazy-img-src");
					}
				} elseif ($attributeInfo['TYPE'] === 'srcset') {
					$originalContent = $attributeInfo['SRCSET_TEMPLATE'];
					$lazyContent = $attributeInfo['SRCSET_TEMPLATE'];
					foreach ($attributeInfo['IMAGES'] as $k => $v) {
						$originalContent = str_replace('#IMAGE_' . $k . '#', $v, $originalContent);
						$lazyFile = $this->doMakeLazyFile($v);
						$lazyContent = str_replace('#IMAGE_' . $k . '#', $lazyFile, $lazyContent);
					}
					$oParser->setLazyNodeAttribute($index, "data-srcset", $originalContent);
					if (strlen($lazyContent) > 0) {
						$oParser->setLazyAttribute($index, $attributeIndex, $lazyContent);
						$oParser->addLazyClassAttribute($index, "ammina-lazy");
						$oParser->addLazyClassAttribute($index, "ammina-lazy-srcset");
					}
				} elseif ($attributeInfo['TYPE'] === 'style') {
					$this->doMakeLazyStyle($index, $attributeIndex);
					if (strlen($this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['OPTIMIZE_LAZY_STYLE']) > 0 && strlen($this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['OPTIMIZE_MAIN_IMG']) > 0) {
						$oParser->setLazyNodeAttribute($index, "data-background-image", $this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['OPTIMIZE_MAIN_IMG']);
						$oParser->setLazyAttribute($index, $attributeIndex, $this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['OPTIMIZE_LAZY_STYLE']);
						$oParser->addLazyClassAttribute($index, "ammina-lazy");
						$oParser->addLazyClassAttribute($index, "ammina-lazy-style");
					}
				}
			}
		}
	}

	public function doMakeLazyFile($strFileName)
	{
		if ($this->arOptions['images']['options']['TYPE'] === "blur") {
			$strResult = $this->doMakeLazyFileBlur($strFileName);
		} else {
			$strResult = $this->doMakeLazyFileMainImg($strFileName);
		}
		/*if ($this->arOptions['images']['options']['TYPE'] === "blurgrey") {
			$strResult = $this->doMakeLazyFileBlurGrey($strFileName);
		} elseif ($this->arOptions['images']['options']['TYPE'] === "blur") {
			$strResult = $this->doMakeLazyFileBlur($strFileName);
		}*/
		/*
		if (amopt_strlen($strResult) > 0 && file_exists($_SERVER['DOCUMENT_ROOT'] . $strResult) && Application::getInstance()->isSupportWebP() && $this->arOptions['lazy']['options']['CONVERT_WEBP'] == "Y") {
			$strResult = $this->oImageOptimizer->oWebPImage->doOptimizeImage($strResult);
		}*/
		if ($strResult !== false && file_exists($_SERVER['DOCUMENT_ROOT'] . $strResult) && $this->arOptions['images']['options']['INLINE_IMG'] === "Y" && filesize($_SERVER['DOCUMENT_ROOT'] . $strResult) <= $this->arOptions['images']['options']['MAX_SIZE_INLINE']) {
			$strFullName = $_SERVER['DOCUMENT_ROOT'] . $strResult;
			$arPathInfo = ammina_pathinfo($strFullName);
			$arPathInfo['extension'] = amopt_strtolower($arPathInfo['extension']);
			if (isset($this->oImageOptimizer->arInlineTypesWebP[$arPathInfo['extension']])) {
				return 'data:' . $this->oImageOptimizer->arInlineTypesWebP[$arPathInfo['extension']] . ';base64,' . base64_encode(file_get_contents($strFullName));
			}
		}
		if ($strResult !== false && file_exists($_SERVER['DOCUMENT_ROOT'] . $strResult)) {
			return $strResult;
		}
		return $strFileName;
	}

	protected function doMakeLazyFileBlur($strFileName)
	{
		$strFileName = Application::getInstance()->getOriginalConvertedImage($strFileName);
		$arBasePathInfo = ammina_pathinfo($strFileName);
		$arBasePathInfo['extension'] = amopt_strtolower($arBasePathInfo['extension']);
		if (!in_array($arBasePathInfo['extension'], ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
			return $this->doMakeLazyFileMainImg();
		}

		$strResult = $strFileName;
		$arExtOptions = [
			'BLUR_MAX_WIDTH_OR_HEIGHT' => $this->arOptions['images']['options']['BLUR_MAX_WIDTH_OR_HEIGHT'],
			'BLUR_BACK_ORIGINAL_SIZE' => $this->arOptions['images']['options']['BLUR_BACK_ORIGINAL_SIZE'],
			'BLUR_RADIUS' => $this->arOptions['images']['options']['BLUR_RADIUS'],
			'BLUR_SIGMA' => $this->arOptions['images']['options']['BLUR_SIGMA'],
			'BLUR_QUANTITY' => $this->arOptions['images']['options']['BLUR_QUANTITY'],
			'CONVERT_WEBP' => $this->arOptions['images']['options']['CONVERT_WEBP']
		];
		$resultExtension = $arBasePathInfo['extension'];
		if ($arExtOptions['CONVERT_WEBP'] === 'Y') {
			$resultExtension = 'webp';
		}
		$ident = md5(serialize($arExtOptions));
		$strOptimizedFile = "/upload/ammina.optimizer/lazy/" . $ident . $arBasePathInfo['dirname'] . "/" . $arBasePathInfo['filename'] . "." . $resultExtension;
		$strOptimizedFileWait = "/upload/ammina.optimizer/lazy/" . $ident . $arBasePathInfo['dirname'] . "/" . $arBasePathInfo['filename'] . "." . $resultExtension . ".wait";
		$strOptimizedFileInfo = "/upload/ammina.optimizer/lazy/" . $ident . $arBasePathInfo['dirname'] . "/" . $arBasePathInfo['filename'] . "." . $resultExtension . ".info";
		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) || Application::getInstance()->isClearCache("image") || filesize($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) <= 0) {
			CheckDirPath(dirname($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) . "/");
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait) && file_get_contents($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait) >= (time() - 60)) {
				$strResult = $strFileName;
			} else {
				\CAmminaOptimizer::SaveFileContent($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait, time());
				if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile)) {
					@unlink($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile);
				}
				$strResultFile = $this->oBlur->makeLazyFile($strFileName, $strOptimizedFile, $strOptimizedFileInfo, $arExtOptions);
				if ($strResultFile !== true && file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile)) {
					@unlink($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait);
					$strResult = $strResultFile;
				}
			}
		} else {
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) && filemtime($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) < (time() - 3600)) {
				@touch($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile, time());
				if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait)) {
					@touch($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait, time());
				}
				if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileInfo)) {
					@touch($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileInfo, time());
				}
			}
			$strResult = $strOptimizedFile;
		}
		return $strResult;
	}

	/*
	protected function doMakeLazyFileBlurGrey($strFileName)
	{
		$arBasePathInfo = ammina_pathinfo($strFileName);
		$arBasePathInfo['extension'] = amopt_strtolower($arBasePathInfo['extension']);
		if ($arBasePathInfo['extension'] == "png") {
			$strLazyFile = "/upload/ammina.optimizer/lazy/blurgrey/png" . $arBasePathInfo['dirname'] . "/" . $arBasePathInfo['filename'] . ".png";
		} elseif (in_array($arBasePathInfo['extension'], array("jpg", "jpeg"))) {
			$strLazyFile = "/upload/ammina.optimizer/lazy/blurgrey/jpg" . $arBasePathInfo['dirname'] . "/" . $arBasePathInfo['filename'] . ".jpg";
		} else {
			return $this->doMakeLazyFileMainImg();
		}
		$strLazyFileInfo = $strLazyFile . ".info";
		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $strLazyFile)) {
			CheckDirPath(dirname($_SERVER['DOCUMENT_ROOT'] . $strLazyFile) . "/");
			if ($this->arAllowLibrary['packages']['phpimagick']) {
				$this->oDriverImagick->doMakeLazyFileBlurGrey($strFileName, $strLazyFile, $strLazyFileInfo);
			} else {
				return $this->doMakeLazyFileMainImg();
			}
		}
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strLazyFile)) {
			return $strLazyFile;
		}
		return false;
	}
*/
	protected function doMakeLazyFileMainImg()
	{
		if (amopt_strlen($this->arOptions['images']['options']['MAINIMG']) > 0) {
			return $this->arOptions['images']['options']['MAINIMG'];
		}
		return "/bitrix/images/ammina.optimizer/wait.gif";
	}

	public function doMakeLazyStyle($index, $attributeIndex)
	{
		global $APPLICATION;
		$strStyle = $this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['STYLE'];
		$arIdent = array(
			"STYLE" => $strStyle,
			"IDENT" => $this->oImageOptimizer->strBaseIdent,
			"LAZY" => true,
			"TYPE" => $this->arOptions['images']['options']['TYPE'],
		);
		$strIdent = md5(serialize($arIdent));
		$strCacheFile = "/bitrix/ammina.cache/img/ammina.optimizer/" . SITE_ID . "/lazy/" . amopt_substr($strIdent, 0, 2) . "/" . amopt_substr($strIdent, 0, 6) . "/" . $strIdent . ".css.txt";
		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $strCacheFile) || Application::getInstance()->isClearCache()) {
			CheckDirPath(dirname($_SERVER['DOCUMENT_ROOT'] . $strCacheFile) . "/");
			$oCssParser = new Parser('.style{' . $strStyle . '}');
			$oCssDocument = $oCssParser->parse();

			$arAllValues = $oCssDocument->getAllValues();
			foreach ($arAllValues as $oValue) {
				if ($oValue instanceof URL) {
					/**
					 * @var $oValue URL
					 */
					$strUrl = $oValue->getURL()->getString();
					if (amopt_strpos($strUrl, '://') !== false || amopt_strpos($strUrl, '//') === 0 || amopt_strpos($strUrl, 'data:') !== false) {
						return;
					}
					$this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['OPTIMIZE_MAIN_IMG'] = $strUrl;
					$strNewUrl = $this->doMakeLazyFile($strUrl);
					$oValue->getURL()->setString($strNewUrl);
				}
			}

			$strResult = trim($oCssDocument->render(OutputFormat::createCompact()));
			$strResult = amopt_substr($strResult, 7, amopt_strlen($strResult) - 8);
			$strResult = serialize(array(
				"STYLE" => $strResult,
				"IMG" => $this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['OPTIMIZE_MAIN_IMG'],
			));
			\CAmminaOptimizer::SaveFileContent($_SERVER['DOCUMENT_ROOT'] . $strCacheFile, $strResult);
		} else {
			if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strCacheFile) && filemtime($_SERVER['DOCUMENT_ROOT'] . $strCacheFile) < (time() - 3600)) {
				@touch($_SERVER['DOCUMENT_ROOT'] . $strCacheFile, time());
			}
		}
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strCacheFile)) {
			$arResult = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . $strCacheFile), ['allowed_classes' => false]);
			$this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['OPTIMIZE_LAZY_STYLE'] = $arResult['STYLE'];
			$this->arAllImageTags[$index]['ATTRIBUTES'][$attributeIndex]['OPTIMIZE_MAIN_IMG'] = $arResult['IMG'];
		}
	}

	protected function doOptimizeIFrame()
	{
		$oParser = Application::getInstance()->getParser();
		if (!$oParser) {
			return;
		}
		$this->arAllIFrameTags = $oParser->getAllIFrameTags($this->arOptions['iframe']['options']['IGNORE_CLASS'], $this->arOptions['iframe']['options']['IGNORE_IDENT'], $this->arOptions['iframe']['options']['URL_EXCLUDE'], $this->arOptions['iframe']['options']['URL_INCLUDE']);
		$this->oImageOptimizer = Application::getInstance()->getImageOptimizer();
		foreach ($this->arAllIFrameTags as $index => $arTag) {
			$this->arAllIFrameTags[$index]['LAZY_FILE'] = $this->arOptions['iframe']['options']['WAIT_URL'];
			$oParser->setIFrameLazyNodeAttribute($index, "data-src", $arTag['URL']);
			$oParser->setIFrameLazyAttribute($index, $this->arAllIFrameTags[$index]['LAZY_FILE']);
			$oParser->addIFrameLazyClassAttribute($index, "ammina-lazy");
			$oParser->addIFrameLazyClassAttribute($index, "ammina-lazy-iframe");
		}
	}

	protected function doOptimizeJs()
	{
		$this->arAllJSScript = Application::getInstance()->getParser()->getAllJsScript(true);
		$startTimeDelay = intval($this->arOptions['js']['options']['TIME']);
		if ($startTimeDelay < 100) {
			$startTimeDelay = 100;
		}
		$stepTimeDelay = intval($this->arOptions['js']['options']['TIME_BETWEEN_EXECUTE']);
		if ($stepTimeDelay < 50) {
			$stepTimeDelay = 50;
		}
		$arUrlExclude = explode("\n", $this->arOptions['js']['options']['OTHER_URL_EXCLUDE']);
		$arUrlInclude = explode("\n", $this->arOptions['js']['options']['OTHER_URL_INCLUDE']);
		$arContentExclude = explode("\n", $this->arOptions['js']['options']['OTHER_JSCONTENT_EXCLUDE']);
		$arContentInclude = explode("\n", $this->arOptions['js']['options']['OTHER_JSCONTENT_INCLUDE']);
		foreach ($arUrlExclude as $k => $v) {
			$arUrlExclude[$k] = trim($v);
			if (amopt_strlen($arUrlExclude[$k]) <= 0) {
				unset($arUrlExclude[$k]);
			}
		}
		foreach ($arUrlInclude as $k => $v) {
			$arUrlInclude[$k] = trim($v);
			if (amopt_strlen($arUrlInclude[$k]) <= 0) {
				unset($arUrlInclude[$k]);
			}
		}
		foreach ($arContentExclude as $k => $v) {
			$arContentExclude[$k] = trim($v);
			if (amopt_strlen($arContentExclude[$k]) <= 0) {
				unset($arContentExclude[$k]);
			}
		}
		foreach ($arContentInclude as $k => $v) {
			$arContentInclude[$k] = trim($v);
			if (amopt_strlen($arContentInclude[$k]) <= 0) {
				unset($arContentInclude[$k]);
			}
		}
		$oParser = Application::getInstance()->getParser();
		foreach ($this->arAllJSScript as $k => $v) {
			$setScriptAsWorked = false;
			$excludeScript = false;
			$arTypeContent = [];

			if (!empty($arUrlExclude)) {
				foreach ($arUrlExclude as $k1 => $v1) {
					if (amopt_stripos($v['src'], $v1) !== false) {
						$excludeScript = true;
						break;
					}
				}
			}

			if (!empty($arUrlInclude)) {
				foreach ($arUrlInclude as $k1 => $v1) {
					if (amopt_stripos($v['src'], $v1) !== false) {
						$arTypeContent['INCLUDE_SRC'] = true;
						$setScriptAsWorked = true;
						break;
						//$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
						//$startTimeDelay += $stepTimeDelay;
						//continue(2);
					}
				}
			}
			if (!empty($arContentExclude)) {
				foreach ($arContentExclude as $k1 => $v1) {
					if (amopt_stripos($v['CONTENT'], $v1) !== false) {
						$excludeScript = true;
						break;
					}
				}
			}
			if (!empty($arContentInclude)) {
				foreach ($arContentInclude as $k1 => $v1) {
					if (amopt_stripos($v['CONTENT'], $v1) !== false) {
						$arTypeContent['INCLUDE_CONTENT'] = true;
						$setScriptAsWorked = true;
						break;
						//$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						//$startTimeDelay += $stepTimeDelay;
						//continue(2);
					}
				}
			}

			//DELAY_YMETRIKA
			if (amopt_strpos($v['CONTENT'], 'mc.yandex.ru/metrika/tag.js') !== false || amopt_strpos($v['CONTENT'], '/npm/yandex-metrica-watch/tag.js') !== false || amopt_strpos($v['CONTENT'], '/metrika/watch.js') !== false) {
				$arTypeContent['YMETRIKA_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_GTM
			if (amopt_strpos($v['src'], 'googletagmanager.com/gtag/') !== false) {
				$arTypeContent['GTM_SRC'] = true;
				$setScriptAsWorked = true;
			}
			if (amopt_strpos($v['CONTENT'], 'googletagmanager.com/gtm.js') !== false) {
				$arTypeContent['GTM_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_GANALYTICS
			if (amopt_strpos($v['CONTENT'], 'google-analytics.com/analytics.js') !== false) {
				$arTypeContent['GANALYTICS_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_GRECAPTCHA
			if (amopt_strpos($v['CONTENT'], 'google.com/recaptcha/api.js') !== false || amopt_stripos($v['CONTENT'], 'asprorecaptcha') !== false) {
				$arTypeContent['GRECAPTCHA_CONTENT'] = true;
				$setScriptAsWorked = true;
			}
			if (amopt_strpos($v['src'], 'google.com/recaptcha/api.js') !== false) {
				$arTypeContent['GRECAPTCHA_SRC'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_ROISTAT
			if (amopt_strpos($v['CONTENT'], 'cloud.roistat.com') !== false) {
				$arTypeContent['ROISTAT_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_BITRIXSPREAD
			if (amopt_strpos($v['CONTENT'], '/bitrix/spread.php') !== false) {
				$arTypeContent['BITRIXSPREAD_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_BITRIXINFO
			if (amopt_strpos($v['CONTENT'], 'bitrix.info/ba.js') !== false) {
				$arTypeContent['BITRIXINFO_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_BITRIX24
			if (amopt_strpos($v['CONTENT'], '/crm/site_button/') !== false || amopt_strpos($v['CONTENT'], '/upload/crm/') !== false) {
				$arTypeContent['BITRIX24_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_REGMARKETS
			if (amopt_strpos($v['src'], 'regmarkets.ru/js/') !== false) {
				$arTypeContent['REGMARKETS_SRC'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_JIVOSITE
			if (amopt_strpos($v['src'], 'code.jivosite.com/widget/') !== false) {
				$arTypeContent['JIVOSITE_SRC'] = true;
				$setScriptAsWorked = true;
			}
			if (amopt_strpos($v['CONTENT'], 'code.jivosite.com/script') !== false) {
				$arTypeContent['JIVOSITE_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_LIVETEX
			$tmpContent = str_replace("'+'", '', $v['CONTENT']);
			if (amopt_strpos($tmpContent, 'livetex.ru/js/') !== false) {
				$arTypeContent['LIVETEX_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_TALKME
			if (amopt_strpos($v['CONTENT'], 'talk-me.ru/support') !== false) {
				$arTypeContent['TALKME_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_YACHAT
			if (amopt_stripos($v['CONTENT'], 'yandexChatWidget') !== false) {
				$arTypeContent['YACHAT_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_REDHELPER
			if (amopt_stripos($v['CONTENT'], 'web.redhelper.ru/service/') !== false) {
				$arTypeContent['REDHELPER_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_SENDPULSE
			if (amopt_strpos($v['src'], 'webpushs.com/js/push/') !== false) {
				$arTypeContent['SENDPULSE_SRC'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_MAILRU
			if (amopt_strpos($v['CONTENT'], 'top-fwz1.mail.ru/js/') !== false) {
				$arTypeContent['MAILRU_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_RAMBLERRU
			if (amopt_strpos($v['CONTENT'], 'st.top100.ru/top100/top100') !== false) {
				$arTypeContent['RAMBLERRU_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_YANDEXMAPS
			if (amopt_strpos($v['src'], 'api-maps.yandex.ru') !== false) {
				$arTypeContent['YANDEXMAPS_SRC'] = true;
				$setScriptAsWorked = true;
			}
			if (amopt_strpos($v['CONTENT'], 'api-maps.yandex.ru') !== false || amopt_strpos($v['CONTENT'], 'window.ymaps') !== false || amopt_strpos($v['CONTENT'], 'ymaps.') !== false) {
				$arTypeContent['YANDEXMAPS_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_FACEBOOK
			if (amopt_strpos($v['CONTENT'], 'fbevents.js') !== false) {
				$arTypeContent['FACEBOOK_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			//DELAY_VK
			if (amopt_strpos($v['src'], 'vk.com/js/api/') !== false) {
				$arTypeContent['VK_SRC'] = true;
				$setScriptAsWorked = true;
			}
			if (amopt_strpos($v['CONTENT'], 'vk.com/js/api/') !== false) {
				$arTypeContent['VK_CONTENT'] = true;
				$setScriptAsWorked = true;
			}

			if ($setScriptAsWorked || $excludeScript) {
				$oParser->setJsDelayScriptAttribute($k, 'data-lazy-js', 'true');
				if ($excludeScript) {
					continue;
				}
			}
			if ($setScriptAsWorked) {
				if ($arTypeContent['INCLUDE_SRC']) {
					$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
					$startTimeDelay += $stepTimeDelay;
					continue;
				}
				if ($arTypeContent['INCLUDE_CONTENT']) {
					$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
					$startTimeDelay += $stepTimeDelay;
					continue;
				}
				if ($this->arOptions['js']['options']['DELAY_YMETRIKA'] === "Y" && amopt_stripos($_SERVER['HTTP_USER_AGENT'], 'YandexMetrika') === false) {
					if ($arTypeContent['YMETRIKA_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_GTM'] === "Y") {
					if ($arTypeContent['GTM_SRC']) {
						$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
					if ($arTypeContent['GTM_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_GANALYTICS'] === "Y") {
					if ($arTypeContent['GANALYTICS_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_GRECAPTCHA'] === "Y") {
					if ($arTypeContent['GRECAPTCHA_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
					if ($arTypeContent['GRECAPTCHA_SRC']) {
						$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_ROISTAT'] === "Y") {
					if ($arTypeContent['ROISTAT_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_BITRIXSPREAD'] === "Y") {
					if ($arTypeContent['BITRIXSPREAD_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}

				if ($this->moveJsBxstatTop) {
					if ($arTypeContent['BITRIXINFO_CONTENT']) {
						$oParser->moveJsToHeadStart($k);
						continue;
					}
				} elseif ($this->arOptions['js']['options']['DELAY_BITRIXINFO'] === "Y") {
					if ($arTypeContent['BITRIXINFO_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_BITRIX24'] === "Y") {
					if ($arTypeContent['BITRIX24_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_REGMARKETS'] === "Y") {
					if ($arTypeContent['REGMARKETS_SRC']) {
						$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_JIVOSITE'] === "Y") {
					if ($arTypeContent['JIVOSITE_SRC']) {
						$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
					if ($arTypeContent['JIVOSITE_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_LIVETEX'] === "Y") {
					if ($arTypeContent['LIVETEX_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_TALKME'] === "Y") {
					if ($arTypeContent['TALKME_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_YACHAT'] === "Y") {
					if ($arTypeContent['YACHAT_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_REDHELPER'] === "Y") {
					if (amopt_stripos($v['CONTENT'], 'web.redhelper.ru/service/') !== false) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_SENDPULSE'] === "Y") {
					if ($arTypeContent['SENDPULSE_SRC']) {
						$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_MAILRU'] === "Y") {
					if ($arTypeContent['MAILRU_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_RAMBLERRU'] === "Y") {
					if ($arTypeContent['RAMBLERRU_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_YANDEXMAPS'] === "Y") {
					if ($arTypeContent['YANDEXMAPS_SRC']) {
						$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
					if ($arTypeContent['YANDEXMAPS_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_FACEBOOK'] === "Y") {
					if ($arTypeContent['FACEBOOK_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
				if ($this->arOptions['js']['options']['DELAY_VK'] === "Y") {
					if ($arTypeContent['VK_SRC']) {
						$oParser->setJsDelayScript($k, '', $v['src'], $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
					if ($arTypeContent['VK_CONTENT']) {
						$oParser->setJsDelayScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay += $stepTimeDelay;
						continue;
					}
				}
			}
		}
	}

	protected function doOptimizeJsMain()
	{
		global $APPLICATION, $USER;

		$userGroups = $USER->GetUserGroupArray();
		$arDisabled = explode(",", str_replace(' ', ',', $this->arOptions['js_main']['options']['DISABLE_FOR_GROUPS']));
		foreach ($arDisabled as $group) {
			$group = trim($group);
			if (strlen($group) > 0) {
				if (in_array($group, $userGroups)) {
					return;
				}
			}
		}

		$this->arAllJSScript = Application::getInstance()->getParser()->getAllJsScript(true);
		$startTimeDelay = intval($this->arOptions['js_main']['options']['TIME']);
		if ($startTimeDelay < 100) {
			$startTimeDelay = 100;
		}
		$stepTimeDelay = intval($this->arOptions['js_main']['options']['TIME_BETWEEN_EXECUTE']);
		if ($stepTimeDelay < 50) {
			$stepTimeDelay = 50;
		}
		$stepTimeContentDelay = intval($this->arOptions['js_main']['options']['TIME_BETWEEN_CONTENT_EXECUTE']);
		if ($stepTimeContentDelay < 10) {
			$stepTimeContentDelay = 10;
		}


		$arUrlExclude = explode("\n", $this->arOptions['js_main']['options']['JSURL_EXCLUDE']);
		$arUrlInclude = explode("\n", $this->arOptions['js_main']['options']['JSURL_INCLUDE']);
		$arContentExclude = explode("\n", $this->arOptions['js_main']['options']['JSCONTENT_EXCLUDE']);
		$arContentInclude = explode("\n", $this->arOptions['js_main']['options']['JSCONTENT_INCLUDE']);
		foreach ($arUrlExclude as $k => $v) {
			$arUrlExclude[$k] = trim($v);
			if (amopt_strlen($arUrlExclude[$k]) <= 0) {
				unset($arUrlExclude[$k]);
			}
		}
		foreach ($arUrlInclude as $k => $v) {
			$arUrlInclude[$k] = trim($v);
			if (amopt_strlen($arUrlInclude[$k]) <= 0) {
				unset($arUrlInclude[$k]);
			}
		}
		foreach ($arContentExclude as $k => $v) {
			$arContentExclude[$k] = trim($v);
			if (amopt_strlen($arContentExclude[$k]) <= 0) {
				unset($arContentExclude[$k]);
			}
		}
		foreach ($arContentInclude as $k => $v) {
			$arContentInclude[$k] = trim($v);
			if (amopt_strlen($arContentInclude[$k]) <= 0) {
				unset($arContentInclude[$k]);
			}
		}
		$oParser = Application::getInstance()->getParser();
		$oParser->initJsDelayMainScript();
		$prevContent = false;
		foreach ($this->arAllJSScript as $k => $v) {
			if (key_exists('data-amoptdelay-id', $v)) {
				continue;
			}
			if (key_exists('data-lazy-js', $v)) {
				continue;
			}
			if (key_exists('data-nolazy', $v)) {
				continue;
			}

			if (!empty($arUrlExclude)) {
				foreach ($arUrlExclude as $k1 => $v1) {
					if (amopt_stripos($v['src'], $v1) !== false) {
						continue(2);
					}
				}
			}
			if (!empty($arUrlInclude)) {
				foreach ($arUrlInclude as $k1 => $v1) {
					if (amopt_stripos($v['src'], $v1) !== false) {
						$oParser->setJsDelayMainScript($k, '', $v['src'], $startTimeDelay);
						$startTimeDelay = ($prevContent ? $stepTimeContentDelay : $stepTimeDelay);
						$prevContent = false;
						continue(2);
					}
				}
			}
			if (!empty($arContentExclude)) {
				foreach ($arContentExclude as $k1 => $v1) {
					if (amopt_stripos($v['CONTENT'], $v1) !== false) {
						continue(2);
					}
				}
			}
			if (!empty($arContentInclude)) {
				foreach ($arContentInclude as $k1 => $v1) {
					if (amopt_stripos($v['CONTENT'], $v1) !== false) {
						$oParser->setJsDelayMainScript($k, $v['CONTENT'], '', $startTimeDelay);
						$startTimeDelay = ($prevContent ? $stepTimeContentDelay : $stepTimeDelay);
						$prevContent = true;
						continue(2);
					}
				}
			}

			if (strlen($v['src']) > 0) {
				$oParser->setJsDelayMainScript($k, '', $v['src'], $startTimeDelay);
				$startTimeDelay = ($prevContent ? $stepTimeContentDelay : $stepTimeDelay);
				$prevContent = false;
			} elseif (strlen($v['CONTENT']) > 0) {
				$oParser->setJsDelayMainScript($k, $v['CONTENT'], '', $startTimeDelay);
				$startTimeDelay = ($prevContent ? $stepTimeContentDelay : $stepTimeDelay);
				$prevContent = true;
			}
		}
		$oParser->finishJsDelayMainScript($this->arOptions['js_main']['options']['MODEL_DELAY'], $this->arOptions['js_main']['options']['TIME']);
	}

	protected function doOptimizeCss()
	{
		$oParser = Application::getInstance()->getParser();
		$this->arAllCssLinks = $oParser->getAllLazyCss($this->arOptions['css']['options']['URL_EXCLUDE'], $this->arOptions['css']['options']['URL_INCLUDE']);
		$arItems = [];
		foreach ($this->arAllCssLinks as $index => $cssLink) {
			$oParser->makeLazyCssEmptyStyleTag($index);
			$arItems[$index] = [
				'url' => $cssLink['URL']
			];
		}
		if ($this->arOptions['css']['options']['MODE'] === 'xhr') {
			$strScript = <<<EOF
function amoptCssHttpGet(aUrl, aCallback) {
	var anHttpRequest = new XMLHttpRequest();
	anHttpRequest.onreadystatechange = function () {
		if (anHttpRequest.readyState == 4) {
			if (anHttpRequest.status == 200) {
				aCallback(anHttpRequest.responseText);
			} else {
				aCallback('');
			}
		}
	}

	anHttpRequest.open("GET", aUrl, true);
	anHttpRequest.send(null);
}

var amoptCssItems=#ITEMS#;
var amoptCssCntRequest = 0;
window.setTimeout(function () {
	for (let index in amoptCssItems) {
		if (amoptCssItems[index].url) {
			amoptCssCntRequest++;
			amoptCssHttpGet(amoptCssItems[index].url, function (cssContent) {
				amoptCssItems[index].content = cssContent;
				amoptCssCntRequest--;
				window.setTimeout(amoptMakeCssLink(index), 0);
			});
		}
	}
}, #TIMEWAIT#);

function amoptMakeCssLink(index) {
	var curTag = document.querySelector(`style[data-amoptcss-id="\${index}"]`);
	if (curTag) {
		curTag.textContent = amoptCssItems[index].content;
	}
}
EOF;
			$strScript = str_replace('#ITEMS#', \CUtil::PhpToJSObject($arItems), $strScript);
			$strScript = str_replace('#TIMEWAIT#', intval($this->arOptions['css']['options']['WAIT']), $strScript);
			Application::getInstance()->getParser()->AddTag("//body[1]", "script", array("async" => null, "data-amoptstyle" => null), $strScript);
		} elseif ($this->arOptions['css']['options']['MODE'] === 'xhrlink') {
			$strScript = <<<EOF
function amoptCssHttpGet(aUrl, aCallback) {
	var anHttpRequest = new XMLHttpRequest();
	anHttpRequest.onreadystatechange = function () {
		if (anHttpRequest.readyState == 4) {
			if (anHttpRequest.status == 200) {
				aCallback(anHttpRequest.responseText);
			} else {
				aCallback('');
			}
		}
	}

	anHttpRequest.open("GET", aUrl, true);
	anHttpRequest.send(null);
}

var amoptCssItems=#ITEMS#;
var amoptCssCntRequest = 0;
window.setTimeout(function () {
	for (let index in amoptCssItems) {
		if (amoptCssItems[index].url) {
			amoptCssCntRequest++;
			amoptCssHttpGet(amoptCssItems[index].url, function (cssContent) {
				amoptCssItems[index].content = cssContent;
				amoptCssCntRequest--;
				window.setTimeout(amoptMakeCssLink(index), 0);
			});
		}
	}
}, #TIMEWAIT#);

function amoptMakeCssLink(index) {
	var curTag = document.querySelector(`style[data-amoptcss-id="\${index}"]`);
	if (curTag) {
		var newEl1 = document.createElement('link');
		newEl1.rel='stylesheet';
		newEl1.href=amoptCssItems[index].url;
		curTag.parentNode.insertBefore(newEl1, curTag);
		curTag.parentNode.removeChild(curTag);
	}
}
EOF;
			$strScript = str_replace('#ITEMS#', \CUtil::PhpToJSObject($arItems), $strScript);
			$strScript = str_replace('#TIMEWAIT#', intval($this->arOptions['css']['options']['WAIT']), $strScript);
			Application::getInstance()->getParser()->AddTag("//body[1]", "script", array("async" => null, "data-amoptstyle" => null), $strScript);
		}
	}

	public function doOptimizeAntiLazy()
	{
		if ($this->arOptions['antilazy']['options']['ACTIVE'] !== 'Y') {
			return;
		}
		$oParser = Application::getInstance()->getParser();
		if (!$oParser) {
			return;
		}
		$arLazyClasses = explode("\n", $this->arOptions['antilazy']['options']['LAZY_CLASSES']);
		foreach ($arLazyClasses as $k => $v) {
			$arLazyClasses[$k] = trim($v);
			if (strlen($arLazyClasses[$k]) <= 0) {
				unset($arLazyClasses[$k]);
			}
		}
		$arLazyAttr = explode("\n", $this->arOptions['antilazy']['options']['LAZY_ATTR']);
		foreach ($arLazyAttr as $k => $v) {
			$arLazyAttr[$k] = trim($v);
			if (strlen($arLazyAttr[$k]) <= 0) {
				unset($arLazyAttr[$k]);
			}
		}
		$arImgSrcAttr = explode("\n", $this->arOptions['antilazy']['options']['IMG_SRC_ATTR']);
		foreach ($arImgSrcAttr as $k => $v) {
			$arImgSrcAttr[$k] = trim($v);
			if (strlen($arImgSrcAttr[$k]) <= 0) {
				unset($arImgSrcAttr[$k]);
			}
		}
		$arBgStyleAttr = explode("\n", $this->arOptions['antilazy']['options']['BG_STYLE_ATTR']);
		foreach ($arBgStyleAttr as $k => $v) {
			$arBgStyleAttr[$k] = trim($v);
			if (strlen($arBgStyleAttr[$k]) <= 0) {
				unset($arBgStyleAttr[$k]);
			}
		}

		$allAntilazy = $oParser->getAllAntilazyTags($this->arOptions['antilazy']['options']['LAZY_CLASSES'], $this->arOptions['antilazy']['options']['LAZY_ATTR']);
		foreach ($allAntilazy as $index => $arItem) {
			if (array_key_exists('class', $arItem)) {
				$ar = explode(" ", $arItem['class']);
				foreach ($ar as $k => $v) {
					if (in_array($v, $arLazyClasses)) {
						unset($ar[$k]);
					}
				}
				$oParser->setAntilazyAttribute($index, 'class', implode(' ', $ar));
			}
			foreach ($arLazyAttr as $k => $v) {
				if (array_key_exists($v, $arItem)) {
					$oParser->removeAntilazyAttribute($index, $v);
				}
			}
			if ($arItem['TAG_NAME'] === 'img') {
				foreach ($arImgSrcAttr as $imgSrc) {
					if (array_key_exists($imgSrc, $arItem) && strlen($arItem[$imgSrc]) > 0) {
						$oParser->setAntilazyAttribute($index, 'src', $arItem[$imgSrc]);
						$oParser->removeAntilazyAttribute($index, $imgSrc);
					}
				}
			}
			foreach ($arBgStyleAttr as $bgImage) {
				if (array_key_exists($bgImage, $arItem) && strlen($arItem[$bgImage]) > 0) {
					if (array_key_exists('style', $arItem)) {
						$oParser->setAntilazyAttribute($index, 'style', $this->doAntilazyStyle($arItem['style'], $arItem[$bgImage]));
					} else {
						$oParser->setAntilazyAttribute($index, 'style', 'background-image: url(\'' . $arItem[$bgImage] . '\');');
					}
					$oParser->removeAntilazyAttribute($index, $bgImage);
				}
			}

		}
	}

	protected function doAntilazyStyle($strStyle, $strBackgroundImage)
	{
		global $APPLICATION;
		$arIdent = array(
			"STYLE" => $strStyle,
			"NEWIMAGE" => $strBackgroundImage
		);
		$strIdent = md5(serialize($arIdent));
		$strCacheFile = "/bitrix/ammina.cache/img/ammina.optimizer/" . SITE_ID . "/antilazy/" . amopt_substr($strIdent, 0, 2) . "/" . amopt_substr($strIdent, 0, 6) . "/" . $strIdent . ".css";
		$strContent = "";

		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $strCacheFile) || Application::getInstance()->isClearCache("image") || Application::getInstance()->isClearCache("css") || ((time() - filemtime($_SERVER['DOCUMENT_ROOT'] . $strCacheFile)) > 300)) {
			$oCssParser = new Parser('.style{' . $strStyle . '}');
			$oCssDocument = $oCssParser->parse();

			$this->doAntilazyStyleImages($oCssDocument, $strBackgroundImage);
			$strResult = trim($oCssDocument->render(OutputFormat::createCompact()));
			$strResult = amopt_substr($strResult, 7, amopt_strlen($strResult) - 8);
			\CAmminaOptimizer::SaveFileContent($_SERVER['DOCUMENT_ROOT'] . $strCacheFile, $strResult);
			return $strResult;
		}

		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strCacheFile) && filemtime($_SERVER['DOCUMENT_ROOT'] . $strCacheFile) < (time() - 3600)) {
			@touch($_SERVER['DOCUMENT_ROOT'] . $strCacheFile, time());
		}
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strCacheFile . '.images')) {
			$images = unserialize(file_get_contents($_SERVER['DOCUMENT_ROOT'] . $strCacheFile . '.images'), ['allowed_classes' => false]);
			if (is_array($images)) {
				$app = Application::getInstance();
				foreach ($images as $k => $v) {
					$app->addConvertedImage($k, $v);
				}
			}
		}
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strCacheFile)) {
			return file_get_contents($_SERVER['DOCUMENT_ROOT'] . $strCacheFile);
		}
	}

	protected function doAntilazyStyleImages(&$oCssDocument, $strFileName)
	{
		$arAllValues = $oCssDocument->getAllValues();
		foreach ($arAllValues as $oValue) {
			if ($oValue instanceof URL) {
				/**
				 * @var $oValue URL
				 */
				$strUrl = $oValue->getURL()->getString();
				if (strlen($strUrl)>0){
					$oValue->getURL()->setString($strFileName);
				}
			}
		}
	}
}

