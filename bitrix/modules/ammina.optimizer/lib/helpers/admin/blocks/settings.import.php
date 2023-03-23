<?php

namespace Ammina\Optimizer\Helpers\Admin\Blocks;

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class SettingsImport
{
	/*
		public static function getScripts()
		{
			global $APPLICATION;
			\CJSCore::Init(array("jquery2"));
			\Bitrix\Main\Page\Asset::getInstance()->addJs("/bitrix/js/ammina.ip/admin/content.js");
			$APPLICATION->SetAdditionalCSS("/bitrix/themes/.default/ammina.ip.css");
			return '
				<script type="text/javascript">
					$(document).ready(function(){
						$("#FIELD_COUNTRY").amminaIpAdminBlockContent();
						$("#FIELD_REGION").amminaIpAdminBlockContent();
						$("#FIELD_CITY").amminaIpAdminBlockContent();
					});
				</script>
			';
		}*/

	public static function getEdit()
	{
		global $APPLICATION;

		$select = '<option value="all">' . Loc::getMessage('AMMINA_OPTIMIZER_SITES_ALL') . '</option>';
		$rSites = \CSite::GetList($b, $o);
		while ($arSite = $rSites->Fetch()) {
			$select .= '<option value="' . $arSite['LID'] . '">[' . $arSite['LID'] . '] ' . $arSite['NAME'] . '</option>';
		}
		$result = '
			<table border="0" cellspacing="0" cellpadding="0" width="100%" class="adm-detail-content-table edit-table">
				<tbody>
					<tr>
						<td class="adm-detail-content-cell-l" width="40%">' . Loc::getMessage("AMMINA_OPTIMIZER_FIELD_SITE_ID") . ':</td>
						<td class="adm-detail-content-cell-r">
							<select name="FIELD[SITE_ID]" class="adm-bus-select">' . $select . '</select>
						</td>
					</tr>
					<tr>
						<td class="adm-detail-content-cell-l">' . Loc::getMessage("AMMINA_OPTIMIZER_FIELD_SETTINGS") . ':</td>
						<td class="adm-detail-content-cell-r">
							<input type="file" class="adm-bus-input" name="FIELDS[SETTINGS]" id="FIELD_SETTINGS" value="" />
						</td>
					</tr>
				</tbody>
			</table>';

		return $result;
	}
}