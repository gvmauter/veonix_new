<?

namespace Ammina\Optimizer\Core2\Driver\LazyImage;

use Ammina\Optimizer\Core2\Application;

class Base
{
	protected $driverName = "";

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
				$app = Application::getInstance();
				if (!$app->isAllowSendRequestComplete()) {
					return false;
				}
				$startTime = microtime(true);
				$bResult = \CAmminaOptimizer::doRequestWorkServerResultFile($strResultUrl, $strResultFilePath, $strFileNameResultUrl);
				$endTime = microtime(true);
				$app->addTimeRequestCompleteImage($endTime - $startTime);

				if ($bResult) {
					$this->doMakeResultInfo($arRequest['FUNCTION_PARAMETERS']['SOURCE_FILE_PATH'], $arRequest['FUNCTION_PARAMETERS']['RESULT_FILE_PATH'], $arRequest['FUNCTION_PARAMETERS']['RESULT_INFO_FILE_PATH']);
					return $strResultFilePath;
				}

				if (!$bEndTime) {
					return false;
				}

				@unlink($_SERVER['DOCUMENT_ROOT'] . $strFileNameResultUrl);
			}
		}

		$arRequest['LIBTYPE'] = "lazyimage";
		return Application::getInstance()->doPushStackRequest($arRequest, "optimize", $strResultFilePath, $strFileNameResultUrl);
	}

	public function makeLazyFile($strSourceFilePath, $strResultFilePath, $strResultInfoFilePath, $arOptions){
		$arRequest = array(
			"DRIVER" => $this->driverName,
			"GET_FILE" => $strSourceFilePath,
			"HASH_FILE" => md5_file($_SERVER['DOCUMENT_ROOT'] . $strSourceFilePath),
			"RESULT_FILE" => $strResultFilePath,
			"FUNCTION" => "makeLazyFile",
			"FUNCTION_PARAMETERS" => array(
				"SOURCE_FILE_PATH" => $strSourceFilePath,
				"RESULT_FILE_PATH" => $strResultFilePath,
				"RESULT_INFO_FILE_PATH" => $strResultInfoFilePath,
				"OPTIONS" => $arOptions,
			),
		);
		return $this->sendRequest($arRequest, $strResultFilePath, $strResultFilePath . ".resulturl");
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
