<?
namespace Luxar\Sitemap;


class SitemapAgent {

	const MODULE_ID = 'luxar.sitemap';
	public static $time = 86400;

	private static $agentTemplate = '\Luxar\Sitemap\SitemapAgent::run(#SITEMAP_ID#);';

	public static function checkExist($SITEMAP_ID) {

		if ($SITEMAP_ID < 1) {
			return false;
		}

		if (self::getAgentID($SITEMAP_ID) !== false) {
			return true;
		}

		return false;
	}

	public static function getAgentID($SITEMAP_ID) {

		if ($SITEMAP_ID < 1) {
			return false;
		}

		$res = \CAgent::GetList(
			array('ID' => 'ASC'),
			array(
				'MODULE_ID' => self::MODULE_ID,
				'NAME' => self::getAgentName($SITEMAP_ID),
			)
		)->Fetch();

		if (!$res) {
			return false;
		}

		return $res['ID'];
	}

	public static function add($SITEMAP_ID) {

		if ($SITEMAP_ID < 1) {
			return false;
		}

		$AGENT_ID = \CAgent::AddAgent(
			self::getAgentName($SITEMAP_ID),
			self::MODULE_ID,
			'Y',
			self::$time,
			'',
			'Y'
		);

		return $AGENT_ID;
	}

	public static function remove($SITEMAP_ID) {

		if ($SITEMAP_ID < 1) {
			return false;
		}

		$AGENT_ID = self::getAgentID($SITEMAP_ID);

		if ($AGENT_ID) {
			\CAgent::RemoveAgent(
				self::getAgentName($SITEMAP_ID),
				self::MODULE_ID
			);
		}
	}

	public static function getAgentName($SITEMAP_ID) {
		return str_replace('#SITEMAP_ID#', $SITEMAP_ID, self::$agentTemplate);
	}

	public static function run($SITEMAP_ID) {

		if ($SITEMAP_ID > 0)
			\Luxar\Sitemap\Sitemap::generate($SITEMAP_ID);

		return self::getAgentName($SITEMAP_ID);
	}
}