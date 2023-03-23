<?
namespace Goodde\YandexTurbo\Model;

use Bitrix\Main\Type,
	Bitrix\Main\Config\Option,
	Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class Request
{
	private static $moduleId = 'goodde.yandexturboapi';
	private static $protocol = 'https://';
	private static $host = 'api.webmaster.yandex.net';
	private static $version = '/v4/';
	private static $curlTimeout = 10;
	
	
	public static function getPropSite($siteId = '')
	{
		$arTurboProp = array();	
		$turboProp = Option::get(self::$moduleId, 'turbo_prod', '', $siteId);
		if (strlen($turboProp) > 0)
			$arTurboProp = unserialize($turboProp);
		
		return $arTurboProp;
	}
	
	public static function getServerAddress($siteId = '')
	{			
		$strHost = '';
		$arProp = self::getPropSite($siteId);
		if($arProp['host_id'])
		{
			$arHost = explode(':', $arProp['host_id']);
			$strHost .= $arHost[0].'://'.$arHost[1];
		}
		return $strHost;
	}
	
	public static function getToken($siteId = '')
	{			
		$arToken = self::getPropSite($siteId);
		return $arToken['token'];
	}
	
	public static function getUserId($siteId = '')
	{			
		$arUserId = self::getPropSite($siteId);
		return $arUserId['user_id'];
	}
	
	public static function getHostId($siteId = '')
	{		
		$arHostId = self::getPropSite($siteId);
		return $arHostId['host_id'];
	}
	
	public static function getUrl($version = '/v4/')
	{
		$url = self::$protocol.self::$host.$version;
		return $url;
	}
	
	public static function getHeaderList($siteId = '')
	{
		return array(
			'User-Agent: '.$_SERVER['HTTP_USER_AGENT'],
			'Authorization: OAuth '. self::getToken($siteId)
		);
	}
	
	public static function strUser()
	{
		return self::getUrl(self::$version).'user/';
	}
	
	public static function strHost($siteId = '')
	{
		return self::getUrl(self::$version).'user/'.self::getUserId($siteId).'/hosts/';
	}
	
	public static function strUploadAddress($siteId = '', $mode = '')
	{
		return self::getUrl(self::$version).'user/'.self::getUserId($siteId).'/hosts/'.self::getHostId($siteId).'/turbo/uploadAddress/?mode='.$mode;
	}
	
	public static function stsTaskId($siteId = '', $taskId = '')
	{
		return self::getUrl(self::$version).'user/'.self::getUserId($siteId).'/hosts/'.self::getHostId($siteId).'/turbo/tasks/'.$taskId;
	}
	
	public static function strAddAddress($siteId = '', $mode = '')
	{
		$strAddAddress = '';
		$arProp = Request::curUploadAddress($siteId, $mode);
		if(strlen($arProp['url_'.$mode]) > 0)
		{
			$strAddAddress = $arProp['url_'.$mode];
		}
		return $strAddAddress;
	}
	
	public static function curUser($siteId = '')
	{
		$arUserId = array();
		if($curl = curl_init(self::strUser()))
		{
			$arHeaderList = self::getHeaderList($siteId);
			$arHeaderList[] = 'Accept: application/json';
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arHeaderList);
			curl_setopt($curl, CURLOPT_TIMEOUT, self::$curlTimeout);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			$result = curl_exec($curl);
			curl_close($curl);
			$arResult = json_decode($result, true);
			if(!isset($arResult['error_code']))
			{
				$arUserId['user_id'] = $arResult['user_id'];
			}
		}
		return $arUserId;
	}
	
	public static function curHost($siteId = '')
	{
		$arHosts = array();
		if($curl = curl_init(self::strHost($siteId)))
		{
			$arHeaderList = self::getHeaderList($siteId);
			$arHeaderList[] = 'Accept: application/json';
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arHeaderList);
			curl_setopt($curl, CURLOPT_TIMEOUT, self::$curlTimeout);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			$result = curl_exec($curl);
			curl_close($curl);
			$arResult = json_decode($result, true);
			if(!isset($arResult['error_code']))
			{
				$arHosts = $arResult['hosts'];
			}
		}
		return $arHosts;
	}
	
	public static function curUploadAddress($siteId = '', $mode = '')
	{	
		$arUploadAddress = array();
		if($curl = curl_init(self::strUploadAddress($siteId, $mode)))
		{
			$arHeaderList = self::getHeaderList($siteId);
			$arHeaderList[] = 'Accept: application/json';
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arHeaderList);
			curl_setopt($curl, CURLOPT_TIMEOUT, self::$curlTimeout);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			$result = curl_exec($curl);
			curl_close($curl);
			$arResult = json_decode($result, true);
			if(!isset($arResult['error_code']))
			{
				$arUploadAddress['url_'.strtolower($mode)] = $arResult['upload_address'];
			}
		}
		return $arUploadAddress;
	}
	
	public static function addFeed($siteId = '', $mode = '', $data = '', $isGzip = false)
	{	
		$arResult = array();
		if($curl = curl_init(self::strAddAddress($siteId, $mode)))
		{
			$arHeaderList = self::getHeaderList($siteId);
			$arHeaderList[] = 'Content-type: application/rss+xml';
			if($isGzip)
			{
				$arHeaderList[] = 'Content-Encoding: gzip';
			}
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arHeaderList);
			curl_setopt($curl, CURLOPT_TIMEOUT, self::$curlTimeout);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			if($isGzip)
			{
				curl_setopt($curl, CURLOPT_ENCODING , 'gzip'); 
			}
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			curl_setopt($curl, CURLOPT_VERBOSE, true);
			$result = curl_exec($curl);
			curl_close($curl);
			$arResult = json_decode($result, true);
		}
		
		return $arResult;
	}
	
	public static function getFeed($siteId = '', $taskId = '')
	{
		$arResult = array();
		if($curl = curl_init(self::stsTaskId($siteId, $taskId)))
		{
			$arHeaderList = self::getHeaderList($siteId);
			$arHeaderList[] = 'Accept: application/json';
			curl_setopt($curl, CURLOPT_HTTPHEADER, $arHeaderList);
			curl_setopt($curl, CURLOPT_TIMEOUT, self::$curlTimeout);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			$result = curl_exec($curl);
			curl_close($curl);
			$arResult = json_decode($result, true);
		}
		return $arResult;
	}
}