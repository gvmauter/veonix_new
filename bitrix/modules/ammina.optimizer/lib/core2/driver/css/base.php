<?

namespace Ammina\Optimizer\Core2\Driver\Css;

use Ammina\Optimizer\Core2\Application;

class Base
{
	protected $driverName = "";

	public function optimizeCss($strOriginalFilePath, $strResultFilePath, $strTmpResultFilePath, $strResultInfoFilePath, $arOptions = array())
	{
		$arRequest = array(
			"DRIVER" => $this->driverName,
			"GET_FILE" => $strResultFilePath,
			"HASH_FILE" => md5_file($_SERVER['DOCUMENT_ROOT'] . $strResultFilePath),
			"RESULT_FILE" => $strResultFilePath,
			"FUNCTION" => "optimizeCss",
			"FUNCTION_PARAMETERS" => array(
				"ORIGINAL_FILE_PATH" => $strOriginalFilePath,
				"RESULT_FILE_PATH" => $strResultFilePath,
				"TMP_RESULT_FILE_PATH" => $strTmpResultFilePath,
				"RESULT_INFO_FILE_PATH" => $strResultInfoFilePath,
				"OPTIONS" => $arOptions,
			),
		);
		return $this->sendRequest($arRequest, $strResultFilePath, $strResultFilePath . ".resulturl");
	}

	function sendRequest($arRequest, $strResultFilePath, $strFileNameResultUrl)
	{
		if (file_exists($_SERVER['DOCUMENT_ROOT'] . $strFileNameResultUrl)) {
			$bEndTime = false;
			$fmtime = filemtime($_SERVER['DOCUMENT_ROOT'] . $strFileNameResultUrl);
			if ($fmtime < (time() - 600)) {
				$bEndTime = true;
			}
			$strResultUrl = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $strFileNameResultUrl);
			if ($strResultUrl !== "wait") {
				$bResult = \CAmminaOptimizer::doRequestWorkServerResultFile($strResultUrl, $strResultFilePath, $strFileNameResultUrl);
				if ($bResult) {
					$this->doMakeResultInfo($arRequest['FUNCTION_PARAMETERS']['ORIGINAL_FILE_PATH'], $arRequest['FUNCTION_PARAMETERS']['RESULT_FILE_PATH'], $arRequest['FUNCTION_PARAMETERS']['RESULT_INFO_FILE_PATH']);
					return true;
				}

				if (!$bEndTime) {
					return false;
				}

				@unlink($_SERVER['DOCUMENT_ROOT'] . $strFileNameResultUrl);
			}
		}

		$arRequest['LIBTYPE'] = "css";
		return Application::getInstance()->doPushStackRequest($arRequest, "optimize", $strResultFilePath, $strFileNameResultUrl);
	}

	public function doMakeResultInfo($strSourceFileName, $strResultFileName, $strOptimizedFileInfo)
	{
		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileInfo)) {
			$arInfo = array(
				"SOURCE" => $strSourceFileName,
				"RESULT" => $strResultFileName,
				"SOURCE_SIZE" => filesize($_SERVER['DOCUMENT_ROOT'] . $strSourceFileName),
				"RESULT_SIZE" => filesize($_SERVER['DOCUMENT_ROOT'] . $strResultFileName),
			);
			\CAmminaOptimizer::SaveFileContent($_SERVER['DOCUMENT_ROOT'] . $strOptimizedFileInfo, serialize($arInfo));
		}
	}

}