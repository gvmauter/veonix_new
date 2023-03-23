<?

namespace Ammina\Optimizer\Core2\Parser;

class PHPParser extends Base
{

	public function doParse($strHTML)
	{
		$this->strHTML = $strHTML;
	}

	public function doParsePart($strHTML, $strEncode = "utf-8")
	{
		// TODO: Implement doParsePart() method.
	}

	public function removeCssLink($index)
	{
		// TODO: Implement removeCssLink() method.
	}

	public function setHrefForCssLink($index, $href)
	{
		// TODO: Implement setHrefForCssLink() method.
	}

	public function replaceCssStyleToLink($index, $strFileName)
	{
		// TODO: Implement replaceCssStyleToLink() method.
	}

	public function removeCssStyle($index)
	{
		// TODO: Implement removeCssStyle() method.
	}

	public function AddTag($strXPathParent, $strTag, $arAttributes = array(), $strTagContent = '', $bFirstChild = false)
	{
		// TODO: Implement AddTag() method.
	}

	public function AddTagBeforeCssLink($iCssLinkIndex, $strTag, $arAttributes = array(), $strTagContent = '')
	{
		// TODO: Implement AddTagBeforeCssLink() method.
	}

	public function doUnlockMoveBxRandScript()
	{
		// TODO: Implement doUnlockMoveBxRandScript() method.
	}

	public function doMoveBxRandScriptToEndBody()
	{
		// TODO: Implement doMoveBxRandScriptToEndBody() method.
	}

	public function doMakeStaticAsproSetTheme()
	{
		// TODO: Implement doMakeStaticAsproSetTheme() method.
	}

	public function doUnlockSkipMoveJsAspro()
	{
		// TODO: Implement doUnlockSkipMoveJsAspro() method.
	}

	public function doUnlockSkipMoveJsHead()
	{
		// TODO: Implement doUnlockSkipMoveJsHead() method.
	}

	public function doUnlockSkipMoveJsBody()
	{
		// TODO: Implement doUnlockSkipMoveJsBody() method.
	}

	public function removeJsScriptAttribute($index, $strAttribute)
	{
		// TODO: Implement removeJsScriptAttribute() method.
	}

	public function removeJsScript($index)
	{
		// TODO: Implement removeJsScript() method.
	}

	public function moveJsScriptBefore($index, $iBeforeIndex)
	{
		// TODO: Implement moveJsScriptBefore() method.
	}

	public function setSrcForJsScript($index, $src)
	{
		// TODO: Implement setSrcForJsScript() method.
	}

	public function setContentForJsScript($index, $content)
	{
		// TODO: Implement setContentForJsScript() method.
	}

	public function setSrcForJsOutlineScript($index, $src)
	{
		// TODO: Implement setSrcForJsOutlineScript() method.
	}

	public function setDeferForInlineJsScript($index, $content)
	{
		// TODO: Implement setDeferForInlineJsScript() method.
	}

	public function setDeferForJsScript($index)
	{
		// TODO: Implement setDeferForJsScript() method.
	}

	public function doAppendDeferInitScript()
	{
		// TODO: Implement doAppendDeferInitScript() method.
	}

	public function setJsDelayScript($index, $content = '', $src = '', $iTimeout = 5000)
	{
		// TODO: Implement setJsDelayScript() method.
	}

	public function setJsDelayScriptAttribute($index, $strAttribute, $strContent)
	{

	}

	public function initJsDelayMainScript()
	{

	}

	public function setJsDelayMainScript($index, $content = '', $src = '', $iTimeout = 500)
	{
		// TODO: Implement setJsDelayScript() method.
	}

	public function finishJsDelayMainScript($variant = 'variant3', $delay = 1000)
	{
	}

	public function moveJsToBodyEnd()
	{
		// TODO: Implement moveJsToBodyEnd() method.
	}

	public function moveJsToHeadStart($index)
	{
		// TODO: Implement moveJsToHeadStart() method.
	}

	public function isImage($strImage)
	{
		// TODO: Implement isImage() method.
	}

	public function setImageDecodingAttribute($index)
	{
	}

	public function setImageDataOriginAttribute($index, $content)
	{
	}

	public function setImageAttribute($index, $strContent)
	{
		// TODO: Implement setImageAttribute() method.
	}

	public function setImageScriptContent($index, $strContent)
	{
		// TODO: Implement setImageScriptContent() method.
	}

	public function getAllLazyTags($strLazyClasses, $strLazyTags, $strIgnoreClasses, $strIgnoreIdent)
	{
	}

	public function setLazyAttribute($index, $attributeIndex, $strContent)
	{
	}

	public function setLazyNodeAttribute($index, $strAttribute, $strContent)
	{
		// TODO: Implement setLazyNodeAttribute() method.
	}

	public function addLazyClassAttribute($index, $strClass)
	{

	}

	public function removeWhiteSpace()
	{
		// TODO: Implement removeWhiteSpace() method.
	}

	public function removeComments()
	{
		// TODO: Implement removeComments() method.
	}

	public function removeScriptAttr()
	{
		// TODO: Implement removeScriptAttr() method.
	}

	public function removeStyleAttr()
	{
		// TODO: Implement removeStyleAttr() method.
	}

	public function removePreTag()
	{
		// TODO: Implement removePreTag() method.
	}

	public function getAllJsScriptWithBxLoadCss()
	{
		// TODO: Implement getAllJsScriptWithBxLoadCss() method.
	}

	public function setJsScriptWithBxLoadCssContent($index, $strContent)
	{
		// TODO: Implement setJsScriptWithBxLoadCssContent() method.
	}

	public function doRemoveLinkPreloadPrefetch()
	{
		// TODO: Implement doRemoveLinkPreloadPrefetch() method.
	}

	public function getAllIFrameTags($strIgnoreClasses, $strIgnoreIdent, $strExcludeUrl, $strIncludeUrl)
	{
	}

	public function setIFrameLazyAttribute($index, $strContent)
	{
	}

	public function setIFrameLazyNodeAttribute($index, $strAttribute, $strContent)
	{
	}

	public function addIFrameLazyClassAttribute($index, $strClass)
	{
	}

	public function getAllLazyCss($strExcludeUrl, $strIncludeUrl)
	{

	}

	public function makeLazyCssEmptyStyleTag($index)
	{

	}

	public function getAllAntilazyTags($strLazyClasses, $strLazyAttr)
	{
	}

	public function setAntilazyAttribute($index, $attribute, $content)
	{

	}

	public function removeAntilazyAttribute($index, $attribute)
	{

	}
}
