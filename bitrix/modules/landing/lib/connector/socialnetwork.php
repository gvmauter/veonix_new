<?php
namespace Bitrix\Landing\Connector;

use Bitrix\Landing\Binding;
use Bitrix\Landing\Copy\Integration\Group;
use Bitrix\Landing\Manager;
use Bitrix\Landing\Restriction;
use Bitrix\Landing\Rights;
use Bitrix\Landing\Site;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class SocialNetwork
{
	/**
	 * Binding code short.
	 */
	const SETTINGS_CODE_SHORT = 'knowledge';

	/**
	 * Binding code.
	 */
	const SETTINGS_CODE = 'landing_knowledge';

	/**
	 * Path for binding group with new site.
	 * @todo: it's not good, specify path in the code, but temporary it's ok
	 */
	const PATH_GROUP_BINDING = 'kb/binding/group/create.php?groupId=#groupId#';

	/**
	 * Gets binding row by group id.
	 * @param int $groupId Group id.
	 * @param bool $checkAccess Check read access.
	 * @return array
	 */
	public static function getBindingRow(int $groupId, bool $checkAccess = true)
	{
		\Bitrix\Landing\Site\Type::setScope(
			\Bitrix\Landing\Site\Type::SCOPE_CODE_GROUP
		);

		$groupId = intval($groupId);
		$bindings = Binding\Group::getList($groupId);

		if ($bindings)
		{
			$bindings = array_pop($bindings);

			if ($bindings['ENTITY_TYPE'] == Binding\Entity::ENTITY_TYPE_SITE)
			{
				$hasAccess = !$checkAccess || Rights::hasAccessForSite(
					$bindings['ENTITY_ID'],
					Rights::ACCESS_TYPES['read']
				);
				if ($hasAccess)
				{
					return $bindings;
				}
			}
		}

		return [];
	}

	/**
	 * Builds and returns social group menu link.
	 * @param int $groupId Group id.
	 * @param bool $returnCreateLink If true and link is no exist, returns create link.
	 * @return string
	 */
	public static function getSocNetMenuUrl($groupId, $returnCreateLink = true)
	{
		if (Option::get(Group::MODULE_ID, Group::CHECKER_OPTION . $groupId, '') == 'Y')
		{
			return '';
		}

		// tariff limits
		if (!Restriction\Manager::isAllowed('limit_crm_free_knowledge_base_project'))
		{
			$asset = \Bitrix\Main\Page\Asset::getInstance();
			$asset->addString(
				$asset->insertJs(
					'var KnowledgeCreate = function() 
						{
							' . Restriction\Manager::getActionCode('limit_crm_free_knowledge_base_project') . '
						};',
					'',
					true
				)
			);
			return 'javascript:void(KnowledgeCreate());';
		}

		$link = '';
		$groupId = intval($groupId);
		$bindings = self::getBindingRow($groupId, false);

		// binding exist
		if ($bindings)
		{
			$link = $bindings['PUBLIC_URL'];
			self::processTabHit($link);
		}
		// binding don't exist, allow to create new one
		else if (
			$returnCreateLink &&
			!self::isExtranet() &&
			self::userInGroup($groupId)
		)
		{
			\CJSCore::init('sidepanel');
			$link = SITE_DIR . str_replace('#groupId#', $groupId, self::PATH_GROUP_BINDING);
		}

		return $link;
	}

	/**
	 * Returns title knowledge of group.
	 * @param int $groupId Group id.
	 * @return string
	 */
	public static function getSocNetMenuTitle($groupId)
	{
		$title = '';
		$groupId = intval($groupId);
		$bindings = self::getBindingRow($groupId, false);
		if ($bindings['TITLE'])
		{
			$title = $bindings['TITLE'];
		}
		return $title;
	}

	/**
	 * Fill settings array for social network group.
	 * @param array &$socNetFeaturesSettings Settings array.
	 * @return void
	 */
	public static function onFillSocNetFeaturesList(&$socNetFeaturesSettings)
	{
		$scopeCode = \Bitrix\Landing\Site\Type::SCOPE_CODE_GROUP;
		if (
			\Bitrix\Landing\Site\Type::isEnabled($scopeCode) &&
			\Bitrix\Main\ModuleManager::isModuleInstalled('intranet')
		)
		{
			$socNetFeaturesSettings[self::SETTINGS_CODE] = [
				'allowed' => [SONET_ENTITY_GROUP],
				'title' => Loc::getMessage('LANDING_CONNECTOR_SN_TITLE'),
				'operation_titles' => [
					'read' => Loc::getMessage('LANDING_CONNECTOR_SN_PERMS_READ'),
					'edit' => Loc::getMessage('LANDING_CONNECTOR_SN_PERMS_EDIT'),
					'sett' => Loc::getMessage('LANDING_CONNECTOR_SN_PERMS_SETT'),
					'delete' => Loc::getMessage('LANDING_CONNECTOR_SN_PERMS_DELETE'),
				],
				'operations' => [
					'read' => [SONET_ENTITY_GROUP => SONET_ROLES_USER],
					'edit' => [SONET_ENTITY_GROUP => SONET_ROLES_USER],
					'sett' => [SONET_ENTITY_GROUP => SONET_ROLES_USER],
					'delete' => [SONET_ENTITY_GROUP => SONET_ROLES_USER],
				],
				'minoperation' => ['read'],
			];
		}
	}

	/**
	 * Invokes when changing §permissions of socialnetwork group is occurred.
	 *
	 * @param int $id Feature id.
	 * @param array $fields Feature fields.
	 * @return void
	 */
	public static function onSocNetFeaturesUpdate(int $id, array $fields): void
	{
		$groupId = self::getGroupIdByFeatureId($id);

		if ($groupId)
		{
			AddEventHandler('main', 'onEpilog', function() use($groupId)
			{
				$siteId = Binding\Group::getSiteIdByGroupId($groupId);
				if ($siteId)
				{
					$binding = new \Bitrix\Landing\Binding\Group($groupId);
					$binding->rebindSite($siteId);
				}
			});
		}
	}

	/**
	 * Fill menu array for social network group.
	 * @param array &$result Menu array.
	 * @return void
	 */
	public static function onFillSocNetMenu(&$result)
	{
		// allowed only for groups
		if (!isset($result['Group']['ID']))
		{
			return;
		}
		if (!isset($result['Urls']['View']))
		{
			return;
		}

		// is enabled in features or not
		if (!empty($result['ActiveFeatures']))
		{
			$enable = array_key_exists(
				self::SETTINGS_CODE,
				$result['ActiveFeatures']
			);
		}
		else
		{
			$enable = false;
		}

		if ($enable)
		{
			$url = self::getSocNetMenuUrl($result['Group']['ID']);
			if (!$url)
			{
				$enable = false;
			}
			$title = self::getSocNetMenuTitle($result['Group']['ID']);
			if ($title !== '')
			{
				$title = ' - ' . $title;
			}
		}
		else
		{
			$url = '';
			$title = '';
		}

		// build menu params
		$result['CanView'][self::SETTINGS_CODE] = $enable;
		$result['Title'][self::SETTINGS_CODE] = Loc::getMessage('LANDING_CONNECTOR_SN_TITLE') . $title;
		$result['Urls'][self::SETTINGS_CODE] = $url;
	}

	/**
	 * Returns true, if current site is extranet.
	 * @return bool
	 */
	protected static function isExtranet()
	{
		if (\Bitrix\Main\Loader::includeModule('extranet'))
		{
			return \CExtranet::isExtranetSite();
		}

		return false;
	}

	/**
	 * If current hit is for opening url.
	 * @param string $url Url for opening.
	 * @return void
	 */
	protected static function processTabHit($url)
	{
		$request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
		if ($request->get('tab') == self::SETTINGS_CODE_SHORT)
		{
			if ($request->get('page'))
			{
				$url = $request->get('page');
			}
			$asset = \Bitrix\Main\Page\Asset::getInstance();
			$asset->addString(
				$asset->insertJs(
					'BX.ready(function(){BX.SidePanel.Instance.open(\'' . \CUtil::jsEscape($url) . '\');});',
			 		'',
		 			true
				)
			);
		}
	}

	/**
	 * Returns group path by id.
	 * @param int $groupId Group id.
	 * @param string|null $pagePath Page of landing.
	 * @param bool $generalPath Returns only general path of group.
	 * @return string
	 */
	public static function getTabUrl(int $groupId, ?string $pagePath = null, bool $generalPath = false): ?string
	{
		static $groupPath = null;

		if ($groupPath === null)
		{
			$groupPath = Option::get('socialnetwork', 'group_path_template', '', SITE_ID);
			if (mb_substr($groupPath, -1) == '/')
			{
				$groupPath .= 'general/';
			}
		}

		if ($groupId && $groupPath)
		{
			$groupPath = str_replace('#group_id#', $groupId, $groupPath);
		}

		if ($generalPath)
		{
			return $groupPath;
		}

		if ($groupId && $groupPath)
		{
			$uri = new \Bitrix\Main\Web\Uri($groupPath);
			$uri->addParams([
				'tab' => self::SETTINGS_CODE_SHORT
			]);
			if ($pagePath)
			{
				$uri->addParams([
					'page' => $pagePath
				]);
			}
			return $uri->getUri();
		}

		return null;
	}

	/**
	 * Returns true, if current user are member of group.
	 * @param int $groupId Group id.
	 * @return bool
	 */
	public static function userInGroup($groupId)
	{
		$groupId = (int) $groupId;
		return \CSocNetUserToGroup::getUserRole(
			Manager::getUserId(),
			$groupId
		) !== false;
	}

	/**
	 * On social network group delete.
	 * @param int $groupId Group id.
	 * @return void
	 */
	public static function onSocNetGroupDelete($groupId)
	{
		\Bitrix\Landing\Site\Type::setScope(
			\Bitrix\Landing\Site\Type::SCOPE_CODE_GROUP
		);
		$bindings = Binding\Group::getList($groupId);
		foreach ($bindings as $binding)
		{
			if ($binding['ENTITY_TYPE'] == Binding\Group::ENTITY_TYPE_SITE)
			{
				Site::delete($binding['ENTITY_ID'], true)->isSuccess();
			}
		}
	}

	/**
	 * Local tool for resolve group id by group feature id.
	 *
	 * @param int $featureId Feature id.
	 * @return int|null
	 */
	private static function getGroupIdByFeatureId(int $featureId): ?int
	{
		static $featureToGroup = null;

		if ($featureToGroup === null)
		{
			$res = \CSocNetFeatures::getList(
				[],
				[
					'ENTITY_TYPE' => SONET_ENTITY_GROUP,
					'FEATURE' => self::SETTINGS_CODE,
				],
				false, false,
				['ID', 'ENTITY_ID']
			);
			while ($row = $res->fetch())
			{
				$featureToGroup[$row['ID']] = $row['ENTITY_ID'];
			}
		}

		return $featureToGroup[$featureId] ?? null;
	}
}
