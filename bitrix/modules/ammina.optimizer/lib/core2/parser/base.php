<?

namespace Ammina\Optimizer\Core2\Parser;

abstract class Base
{
	protected $strHTML = '';
	protected $bMinifiedOutput = false;

	/**
	 * @param $strParserName
	 *
	 * @return Base
	 */
	public static function createParser($strParserName, $bCheckNotValidOpenTag = false, $arOtherOptions = array())
	{
		$className = 'Ammina\\Optimizer\\Core2\\Parser\\' . $strParserName;
		return new $className($bCheckNotValidOpenTag, $arOtherOptions);
	}

	public function setOutputMinified($bMininfied = true)
	{
		$this->bMinifiedOutput = $bMininfied;
	}

	abstract public function doParse($strHTML);

	abstract public function doParsePart($strHTML, $strEncode = "utf-8");

	public function doSaveHTML()
	{
		return $this->strHTML;
	}

	public function doSaveHTMLPart()
	{
		return $this->strHTML;
	}

	public function getAllClassesAndIdent()
	{
		return array(
			"CLASSES" => array(),
			"IDENT" => array(),
		);
	}

	public function getAllCssLinks()
	{
		return array();
	}

	abstract public function removeCssLink($index);

	abstract public function setHrefForCssLink($index, $href);

	public function getAllCssStyle()
	{
		return array();
	}

	abstract public function replaceCssStyleToLink($index, $strFileName);

	abstract public function removeCssStyle($index);

	/**
	 * @param $strXPathParent
	 * @param $strTag
	 * @param array $arAttributes
	 * @param string $strTagContent
	 * @param bool $bFirstChild
	 */
	abstract public function AddTag($strXPathParent, $strTag, $arAttributes = array(), $strTagContent = '', $bFirstChild = false);

	abstract public function AddTagBeforeCssLink($iCssLinkIndex, $strTag, $arAttributes = array(), $strTagContent = '');

	abstract public function doUnlockMoveBxRandScript();

	abstract public function doMoveBxRandScriptToEndBody();

	abstract public function doMakeStaticAsproSetTheme();

	abstract public function doUnlockSkipMoveJsAspro();

	abstract public function doUnlockSkipMoveJsHead();

	abstract public function doUnlockSkipMoveJsBody();

	public function getAllJsScript($bIgnoreSkip = false, $bReturnAllExtensions = false)
	{
		return array();
	}

	abstract public function removeJsScriptAttribute($index, $strAttribute);

	abstract public function removeJsScript($index);

	abstract public function moveJsScriptBefore($index, $iBeforeIndex);

	abstract public function setSrcForJsScript($index, $src);

	abstract public function setContentForJsScript($index, $content);

	abstract public function setSrcForJsOutlineScript($index, $src);

	abstract public function setDeferForInlineJsScript($index, $content);

	abstract public function setDeferForJsScript($index);

	abstract public function doAppendDeferInitScript();

	abstract public function setJsDelayScript($index, $content = '', $src = '', $iTimeout = 5000);

	abstract public function setJsDelayScriptAttribute($index, $strAttribute, $strContent);

	abstract public function initJsDelayMainScript();

	abstract public function setJsDelayMainScript($index, $content = '', $src = '', $iPauseBefore = 500);

	abstract public function finishJsDelayMainScript($variant = 'variant3', $delay = 1000);

	abstract public function moveJsToBodyEnd();

	abstract public function moveJsToHeadStart($index);

	public function getAllImages($arCheckTypes)
	{
		return array();
	}

	abstract public function isImage($strImage);

	abstract public function setImageDecodingAttribute($index);

	abstract public function setImageDataOriginAttribute($index, $content);

	abstract public function setImageAttribute($index, $strContent);

	abstract public function setImageScriptContent($index, $strContent);

	abstract public function removeWhiteSpace();

	abstract public function removeComments();

	abstract public function removeScriptAttr();

	abstract public function removeStyleAttr();

	abstract public function removePreTag();

	abstract public function getAllJsScriptWithBxLoadCss();

	abstract public function setJsScriptWithBxLoadCssContent($index, $strContent);

	abstract public function doRemoveLinkPreloadPrefetch();

	abstract public function getAllLazyTags($strLazyClasses, $strLazyTags, $strIgnoreClasses, $strIgnoreIdent);

	abstract public function setLazyAttribute($index, $attributeIndex, $strContent);

	abstract public function setLazyNodeAttribute($index, $strAttribute, $strContent);

	abstract public function addLazyClassAttribute($index, $strClass);

	abstract public function getAllIFrameTags($strIgnoreClasses, $strIgnoreIdent, $strExcludeUrl, $strIncludeUrl);

	abstract public function setIFrameLazyAttribute($index, $strContent);

	abstract public function setIFrameLazyNodeAttribute($index, $strAttribute, $strContent);

	abstract public function addIFrameLazyClassAttribute($index, $strClass);

	abstract public function getAllLazyCss($strExcludeUrl, $strIncludeUrl);

	abstract public function makeLazyCssEmptyStyleTag($index);

	protected function doNormalizeCharsetValue($strValue)
	{
		global $APPLICATION;
		if (!defined("BX_UTF") || BX_UTF !== true) {
			return $APPLICATION->ConvertCharset($strValue, (amopt_strlen(LANG_CHARSET) > 0 ? LANG_CHARSET : SITE_CHARSET), "UTF-8");
		}
		return $strValue;
	}

	abstract public function getAllAntilazyTags($strLazyClasses, $strLazyAttr);

	abstract public function setAntilazyAttribute($index, $attribute, $content);

	abstract public function removeAntilazyAttribute($index, $attribute);

}
