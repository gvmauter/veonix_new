<?
namespace Luxar\Sitemap;

class SitemapOther {

    public static function generate($arSitemap) {
        $fileNameArray = [];
        $domain = Sitemap::getDomain($arSitemap);

        $fileName = $arSitemap['SETTINGS']['FILENAME_OTHER'];
        $fileNameWithOutXML = substr($fileName, 0, -4);

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

        $arSitemap['SETTINGS']['OTHER']['strings'] = trim($arSitemap['SETTINGS']['OTHER']['strings']);

        $MAX_FILE_SIZE = Sitemap::$MAX_FILE_SIZE;
        if (!empty($arSitemap['SETTINGS']['MAX_FILE_SIZE']) && $arSitemap['SETTINGS']['MAX_FILE_SIZE'] > 1) {
            $MAX_FILE_SIZE = $arSitemap['SETTINGS']['MAX_FILE_SIZE'];
        }

		$MAX_URL_COUNT = Sitemap::$MAX_URL_COUNT;
		if (!empty($arSitemap['SETTINGS']['MAX_COUNT_URL']) && $arSitemap['SETTINGS']['MAX_COUNT_URL'] > 1) {
			$MAX_URL_COUNT = $arSitemap['SETTINGS']['MAX_COUNT_URL'];
		}

        if (strlen($arSitemap['SETTINGS']['OTHER']['strings']) > 0) {

            $fp = fopen($docRoot.'/'.$tmpFileName, 'a');

            $line = Sitemap::FILE_START;
            fputs($fp, $line);

            $stringsArray = explode("\n", $arSitemap['SETTINGS']['OTHER']['strings']);

            foreach($stringsArray as $arUrl) {

                $arUrl = self::prepareString($arUrl);

                if (empty($arUrl)) {
                    continue;
                }

                $line = Sitemap::arrayToXML([
                    'url' => $domain.$arUrl,
                    'changefreq' => $arSitemap['SETTINGS']['OTHER']['changefreq'],
                    'priority' => $arSitemap['SETTINGS']['OTHER']['priority'],
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

                if (is_file($docRoot.'/'.$fileName))
                    unlink($docRoot.'/'.$fileName);

                rename($docRoot.'/'.$file, $docRoot.'/'.$fileName);
                $fileNameArray[] = $fileName;
            }
        }
        else {
            if (is_file($docRoot.'/'.$fileName))
                unlink($docRoot.'/'.$fileName);
        }

        return $fileNameArray;
    }

    public static function prepareString($string) {

        $string = trim($string);

        if (empty($string)) {
            return $string;
        }

        if (strpos($string, 'http') === 0) {
            $ex = explode('/', $string);

            $string = str_replace($ex[0].'//'.$ex[2], '', $string);
        }

        return $string;
    }
}