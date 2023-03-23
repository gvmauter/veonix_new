<?
namespace Luxar\Sitemap;

class SitemapFiles {

	public static function prepareSettings($arFields) {

		$newArFields = $arFields;

		return $newArFields;
	}

	public static function generate($arSitemap) {

		$fileNameArray = [];
		$domain = Sitemap::getDomain($arSitemap);

		$fileName = $arSitemap['SETTINGS']['FILENAME_FILES'];
		$fileNameWithOutXML = substr($fileName, 0, -4);

        $MAX_FILE_SIZE = Sitemap::$MAX_FILE_SIZE;
        if (!empty($arSitemap['SETTINGS']['MAX_FILE_SIZE']) && $arSitemap['SETTINGS']['MAX_FILE_SIZE'] > 1) {
            $MAX_FILE_SIZE = $arSitemap['SETTINGS']['MAX_FILE_SIZE'];
        }

		$MAX_URL_COUNT = Sitemap::$MAX_URL_COUNT;
		if (!empty($arSitemap['SETTINGS']['MAX_COUNT_URL']) && $arSitemap['SETTINGS']['MAX_COUNT_URL'] > 1) {
			$MAX_URL_COUNT = $arSitemap['SETTINGS']['MAX_COUNT_URL'];
		}

		$tmpFileName = $fileName.'.tmp';
		$docRoot = Sitemap::getDocumentRoot($arSitemap);

		$arrTmpFiles = [];
		$arrTmpFiles[] = $tmpFileName;

		$countUrl = 0;

		if (Sitemap::$DEBUG) {
			echo "\tFile name {$fileName}\n";
			echo "\tTemp file name {$tmpFileName}\n";
			echo "\tDocument root {$docRoot}\n";
		}

		$fp = fopen($docRoot.'/'.$tmpFileName, 'a');

		$line = Sitemap::FILE_START;
		fputs($fp, $line);

		$arUrlList = [];
		foreach ($arSitemap['SETTINGS']['DIR'] as $k => $v) {
			if ($v !== 'Y') {
				continue;
			}

			if ($arSitemap['SETTINGS']['FILE_ADD_DIR_SLASH'] == 'Y') {
				if (substr($k, -1) !== '/') {
					$k.= '/';
				}
				if (substr($k, -1) !== '/') {
					$k.= '/';
				}
			}

			$arUrlList[$k] = $v;
		}

		foreach ($arSitemap['SETTINGS']['FILE'] as $k => $v) {
			if ($v !== 'Y') {
				continue;
			}

			if ($arSitemap['SETTINGS']['FILE_DELETE_INDEX_PHP'] == 'Y') {
				if (substr($k, -9, 9) === 'index.php') {
					$k = substr($k, 0, -9);

					if (isset($arUrlList[$k])) {
						continue;
					}
				}
			}

			$arUrlList[$k] = $v;
		}

		foreach($arUrlList as $arUrl => $val) {

			if ($val !== 'Y') {
				continue;
			}

			$line = Sitemap::arrayToXML([
				'url' => $domain.$arUrl,
				'changefreq' => $arSitemap['SETTINGS']['FILE_SETTINGS']['changefreq'],
				'priority' => $arSitemap['SETTINGS']['FILE_SETTINGS']['priority'],
			]);
			if (!$line) {
				continue;
			}

			fputs($fp, $line);
			$countUrl++;

			// Может в функцию завернуть?
			$newFile = false;

			if ($countUrl % 50 == 0) {
				if (filesize($docRoot.'/'.$tmpFileName) >= $MAX_FILE_SIZE) {
					$newFile = true;
				}
			}

			if ($countUrl == $MAX_URL_COUNT) {
				$newFile = true;
			}

			if ($newFile) {

				$line = Sitemap::FILE_END;
				fputs($fp, $line);
				fclose($fp);

				$tmpFileName = $fileNameWithOutXML.'.part'.(count($arrTmpFiles)).'.xml.tmp';
				$arrTmpFiles[] = $tmpFileName;
				$countUrl = 0;

				$fp = fopen($docRoot.'/'.$tmpFileName, 'a');

				$line = Sitemap::FILE_START;
				fputs($fp, $line);
			}
		}

		$line = Sitemap::FILE_END;
		fputs($fp, $line);

		fclose($fp);

		foreach ($arrTmpFiles as $file) {
			$fileName = substr($file, 0, -4);

			if (is_file($docRoot.'/'.$fileName)) {
				unlink($docRoot.'/'.$fileName);
			}

			rename($docRoot.'/'.$file, $docRoot.'/'.$fileName);
			$fileNameArray[] = $fileName;
		}

		return $fileNameArray;
	}

	public static function getDirStructure($bLogical, $site, $path)
	{
		global $USER;

		$arDirContent = array();
		if($USER->CanDoFileOperation('fm_view_listing', array($site, $path)))
		{
			\Bitrix\Main\Loader::includeModule('fileman');

			$arDirs = array();
			$arFiles = array();

			\CFileMan::GetDirList(array($site, $path), $arDirs, $arFiles, array(), array("NAME" => "asc"), "DF", $bLogical, true);

			$arDirContent_t = array_merge($arDirs, $arFiles);
			for($i=0,$l = count($arDirContent_t);$i<$l;$i++)
			{
				$file = $arDirContent_t[$i];
				$arPath = array($site, $file['ABS_PATH']);
				if(
					($file["TYPE"]=="F" && !$USER->CanDoFileOperation('fm_view_file',$arPath))
					|| ($file["TYPE"]=="D" && !$USER->CanDoFileOperation('fm_view_listing',$arPath))
					|| ($file["TYPE"]=="F" && $file["NAME"]==".section.php")
				)
				{
					continue;
				}

				$f = $file['TYPE'] == 'F'
					? new \Bitrix\Main\IO\File($file['PATH'], $site)
					: new \Bitrix\Main\IO\Directory($file['PATH'], $site);

				$p = $f->getName();

				if($f->isSystem()
					|| $file['TYPE'] == 'F' && in_array($p, array("urlrewrite.php"))
					|| $file['TYPE'] == 'D' && preg_match("/\/(bitrix|".\COption::getOptionString("main", "upload_dir", "upload").")\//", "/".$p."/")
				)
				{
					continue;
				}

				$arFileData = array(
					'NAME' => $bLogical ? $file['LOGIC_NAME'] : $p,
					'FILE' => $p,
					'TYPE' => $file['TYPE'],
					'DATA' => $file,
				);

				if(strlen($arFileData['NAME']) <= 0)
					$arFileData['NAME'] = GetMessage('SEO_DIR_LOGICAL_NO_NAME');

				$arDirContent[] = $arFileData;
			}
			unset($arDirContent_t);
		}

		return $arDirContent;
	}
}