<?

namespace Ammina\Optimizer\Core2\Optimizer\Image;

use Ammina\Optimizer\Core2\Application;
use Ammina\Optimizer\Core2\Driver\Image\CWebP;


class WebP extends Base
{
	/**
	 * @var CWebP
	 */
	protected $oDriverCWebP = NULL;

	function __construct()
	{
		$this->oDriverCWebP = new CWebP();
	}

	public function doOptimizeImage($strFilePath)
	{
		$strResult = $strFilePath;
		if ($this->arOptions['options']['ACTIVE'] === "Y" && (amopt_strpos($strFilePath, '/upload/ammina.optimizer/') !== 0 || amopt_strpos($strFilePath, '/upload/ammina.optimizer/lazy/') === 0)) {
			if (\CAmminaOptimizer::doMathPageToRules($this->arOptions['options']['EXCLUDE_FILES'], $strFilePath) && !\CAmminaOptimizer::doMathPageToRules($this->arOptions['options']['INCLUDE_FILES'], $strFilePath)) {
				return $strResult;
			}
			$arPathInfo = ammina_pathinfo($_SERVER['DOCUMENT_ROOT'] . $strFilePath);
			$arBasePathInfo = ammina_pathinfo($strFilePath);
			$ext = amopt_strtolower($arPathInfo['extension']);
			$strOptimizedFile = "/upload/ammina.optimizer/" . $ext . "-webp/q" . intval($this->arOptions['options']['QUALITY']) . $arBasePathInfo['dirname'] . "/" . $arBasePathInfo['filename'] . ".webp";
			$strOptimizedFileWait = "/upload/ammina.optimizer/" . $ext . "-webp/q" . intval($this->arOptions['options']['QUALITY']) . $arBasePathInfo['dirname'] . "/" . $arBasePathInfo['filename'] . ".webp.wait";
			$strOptimizedFileInfo = "/upload/ammina.optimizer/" . $ext . "-webp/q" . intval($this->arOptions['options']['QUALITY']) . $arBasePathInfo['dirname'] . "/" . $arBasePathInfo['filename'] . ".webp.info";
			if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) || Application::getInstance()->isClearCache("image") || filesize($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) <= 0) {
				CheckDirPath(dirname($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) . "/");
				if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait) && file_get_contents($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait) >= (time() - 60)) {
					$strResult = $strFilePath;
				} else {
					\CAmminaOptimizer::SaveFileContent($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileWait, time());
					if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile)) {
						@unlink($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile);
					}
					$strResultFile = false;
					if ($this->arOptions['options']['LIBRARY'] === "cwebp") {
						$strResultFile = $this->oDriverCWebP->optimizeImageWebP($strFilePath, $strOptimizedFile, $strOptimizedFileInfo, $this->arOptions['options']['QUALITY'], $this->arOptions['options_variant']['cwebp']);
					}
					if ($strResultFile !== true && file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) && filesize($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFile) > 0) {
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
		}
		return $strResult;
	}
}