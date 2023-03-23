<?
$path = $turboFeed->getPath().'/'.$arFeed['ID'].'/';
if($arFeed['IS_NOT_UPLOAD_FEED'] == 'Y')
{
	$turboFeed->uploadFeed($path, $arFeed);
}
else
{	
	global $runError;
	$exported = 0;
	$numberRss = 1;
	$numberItem = 1;
	$bytesWritten = 0;
	$fp = $turboFeed->rssHeader($path.'turbo_'.$numberRss.'.xml', $bytesWritten, array('ID' => $arFeed['ID'], 'TITLE' => $arFeed['NAME'], 'LINK' => $arFeed['SERVER_ADDRESS'], 'DESCRIPTION' => $arFeed['DESCRIPTION']));
	if(strlen($runError) <= 0)
	{ 
		while($exported < $totalItems) 
		{
			$arResult = $turboFeed->execute($parameters);
			$exported += count($arResult['ITEMS']);
			
			$fp = $turboFeed->rssBody($fp, '', $arResult, $arFeed, $bytesWritten, $numberRss, $numberItem);
			
			$parameters = array('LAST_ID' => $arResult['LAST_ID']);
			if($exported == $totalItems)
			{
				$turboFeed->rssFooter($fp);
				\Goodde\YandexTurbo\FeedTable::update($arFeed['ID'], array('DATE_ADD_FEED' => new \Bitrix\Main\Type\DateTime(), 'ALL_FEED' => 'N'));
				break;
			}
		}
		$turboFeed->uploadFeed($path, $arFeed);
	}
}
?>