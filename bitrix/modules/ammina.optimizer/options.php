<?

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

$module_id = "ammina.optimizer";
CModule::IncludeModule($module_id);

if (CAmminaOptimizer::getTestPeriodInfo() == \Bitrix\Main\Loader::MODULE_DEMO) {
	CAdminMessage::ShowMessage(array("MESSAGE" => Loc::getMessage("AMMINA_OPTIMIZER_SYS_MODULE_IS_DEMO"), "HTML" => true));
} elseif (CAmminaOptimizer::getTestPeriodInfo() == \Bitrix\Main\Loader::MODULE_DEMO_EXPIRED) {
	CAdminMessage::ShowMessage(array("MESSAGE" => Loc::getMessage("AMMINA_OPTIMIZER_SYS_MODULE_IS_DEMO_EXPIRED"), "HTML" => true));
}

$modulePermissions = CMain::GetGroupRight($module_id);
if ($modulePermissions >= "R") {

	global $MESS;
	Loc::loadMessages($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/options.php");
	Loc::loadMessages(__FILE__);

	if ($_SERVER['REQUEST_METHOD'] === "GET" && amopt_strlen($RestoreDefaults) > 0 && $modulePermissions >= "W" && check_bitrix_sessid()) {
		COption::RemoveOption($module_id);
		$z = CGroup::GetList($v1 = "id", $v2 = "asc", array("ACTIVE" => "Y", "ADMIN" => "N"));
		while ($zr = $z->Fetch()) {
			CMain::DelGroupRight($module_id, array($zr["ID"]));
		}
	}
	$strDomain = amopt_strtolower($_SERVER['HTTP_HOST']);
	if (amopt_strpos($strDomain, 'www.') === 0) {
		$strDomain = amopt_substr($strDomain, 4);
	}
	$arAllOptions = array(
		//array("ajax_active", Loc::getMessage("ammina.optimizer_OPTION_AJAX_ACTIVE"), "Y", Array("checkbox")),
		array("google_pagespeed_apikey", Loc::getMessage("ammina.optimizer_OPTION_GOOGLE_PAGESPEED_APIKEY"), "", array("text", 50)),
		array("amminabx_apikey", Loc::getMessage("ammina.optimizer_OPTION_AMMINABX_APIKEY"), "", array("textarea", 5, 50)),
		array("default_host", Loc::getMessage("ammina.optimizer_OPTION_DEFAULT_DOMAIN"), $strDomain, array("text", 50)),
		array("default_ishttps", Loc::getMessage("ammina.optimizer_OPTION_DEFAULT_ISHTTPS"), CMain::IsHttps() ? "Y" : "N", array("checkbox")),
		array("disabled_pages", Loc::getMessage("ammina.optimizer_OPTION_DISABLED_PAGES"), "/personal/\n/order/\n/basket/", array("textarea", 5, 50)),
		array("disabled_domains", Loc::getMessage("ammina.optimizer_OPTION_DISABLED_DOMAINS"), "crm.", array("textarea", 5, 50)),
		array("disabled_edit", Loc::getMessage("ammina.optimizer_OPTION_DISABLED_EDIT"), "Y", array("checkbox")),
		array("use_json_decode", Loc::getMessage("ammina.optimizer_OPTION_USE_JSON_DECODE"), "Y", array("checkbox")),
		array("use_ammina_pathinfo", Loc::getMessage("ammina.optimizer_OPTION_USE_AMMINA_PATHINFO"), "Y", array("checkbox")),
		array("log_error_requests", Loc::getMessage("ammina.optimizer_OPTION_LOG_ERROR_REQUESTS"), "Y", array("checkbox")),
		array("log_slow_requests", Loc::getMessage("ammina.optimizer_OPTION_LOG_SLOW_REQUESTS"), "Y", array("checkbox")),
		array("maxtime_request_complete", Loc::getMessage("ammina.optimizer_OPTION_MAXTIME_REQUEST_COMPLETE"), "2", array("text", 50)),

		array("separator", Loc::getMessage("ammina.optimizer_OPTION_SEPARATOR_PREOPT")),
		array("preopt_save_active", Loc::getMessage("ammina.optimizer_OPTION_PREOPT_SAVE_ACTIVE"), "N", array("checkbox")),
		array("preopt_resize_active", Loc::getMessage("ammina.optimizer_OPTION_PREOPT_RESIZE_ACTIVE"), "N", array("checkbox")),

		array("separator", Loc::getMessage("ammina.optimizer_OPTION_SEPARATOR_PREOPTAGENT")),
		array("preoptagent_active", Loc::getMessage("ammina.optimizer_OPTION_PREOPTAGENT_ACTIVE"), "N", array("checkbox")),
		array("preoptagent_onlycron", Loc::getMessage("ammina.optimizer_OPTION_PREOPTAGENT_ONLYCRON"), "N", array("checkbox")),
		array("preoptagent_period", Loc::getMessage("ammina.optimizer_OPTION_PREOPTAGENT_PERIOD"), "120", array("text", 10)),
		array("preoptagent_maxtime_step", Loc::getMessage("ammina.optimizer_OPTION_PREOPTAGENT_MAXTIME_STEP"), "15", array("text", 10)),
		array("preoptagent_period_steps", Loc::getMessage("ammina.optimizer_OPTION_PREOPTAGENT_PERIOD_STEPS"), "30", array("text", 10)),
		array("preoptagent_memorylimit", Loc::getMessage("ammina.optimizer_OPTION_PREOPTAGENT_MEMORYLIMIT"), "", array("text", 10)),
		array("preoptagent_dirs", Loc::getMessage("ammina.optimizer_OPTION_PREOPTAGENT_DIRS"), implode("\n", array("/upload/iblock/", "/upload/resize_cache/")), array("textarea", 5, 50)),

		array("separator", Loc::getMessage("ammina.optimizer_OPTION_SEPARATOR_CLEARCACHEAGENT")),
		array("clearcacheagent_active", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_ACTIVE"), "N", array("checkbox")),
		array("clearcacheagent_onlycron", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_ONLYCRON"), "N", array("checkbox")),
		array("clearcacheagent_period", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_PERIOD"), "1440", array("text", 10)),
		array("clearcacheagent_maxtime_step", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_MAXTIME_STEP"), "15", array("text", 10)),
		array("clearcacheagent_period_steps", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_PERIOD_STEPS"), "30", array("text", 10)),
		array("clearcacheagent_memorylimit", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_MEMORYLIMIT"), "", array("text", 10)),
		array("clearcacheagent_ttl_css", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_TTL_CSS"), "3", array("text", 10)),
		array("clearcacheagent_ttl_js", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_TTL_JS"), "14", array("text", 10)),
		array("clearcacheagent_ttl_image", Loc::getMessage("ammina.optimizer_OPTION_CLEARCACHEAGENT_TTL_IMAGE"), "30000", array("text", 10)),
	);

	$strWarning = "";
	if ($REQUEST_METHOD === "POST" && amopt_strlen($Update) > 0 && $modulePermissions === "W" && check_bitrix_sessid()) {
		foreach ($arAllOptions as $option) {
			$name = $option[0];
			$val = $$name;
			if ($option[3][0] === "checkbox" && $val !== "Y")
				$val = "N";
			if ($name === "clear_cache") {
				if ($val === "Y") {
					CAmminaOptimizer::clearCacheFiles();
				}
			} else {
				if ($name === "google_pagespeed_apikey") {
					$val = trim($val);
				}
				COption::SetOptionString($module_id, $name, $val, $option[1]);
			}
		}

		$rAgent = CAgent::GetList(array(), array(
			"NAME" => '\Ammina\Optimizer\Agent\CheckImages::doExecute();',
			"MODULE_ID" => $module_id,
		));
		if ($rAgent->SelectedRowsCount() > 1) {
			$rAgent->Fetch();
			while ($arAgent = $rAgent->Fetch()) {
				CAgent::Delete($arAgent['ID']);
			}
		}

		$arAgent = CAgent::GetList(array(), array(
			"NAME" => '\Ammina\Optimizer\Agent\CheckImages::doExecute();',
			"MODULE_ID" => $module_id,
		))->Fetch();
		if (COption::GetOptionString($module_id, "preoptagent_active", "N") === "Y") {
			$arFields = array(
				"NAME" => '\Ammina\Optimizer\Agent\CheckImages::doExecute();',
				"MODULE_ID" => $module_id,
				"ACTIVE" => "Y",
				"SORT" => 100,
				"IS_PERIOD" => "N",
				"AGENT_INTERVAL" => COption::GetOptionString($module_id, "preoptagent_period_steps", 30),
				"USER_ID" => false,
				"NEXT_EXEC" => ConvertTimeStamp(false, "FULL"),
			);
			if ($arAgent) {
				CAgent::Update($arAgent['ID'], $arFields);
			} else {
				CAgent::Add($arFields);
			}
			\COption::SetOptionString($module_id, "preoptagent_nextdir", "");
			\COption::SetOptionString($module_id, "preoptagent_emptyexec", "N");
		} else {
			if ($arAgent) {
				CAgent::Delete($arAgent['ID']);
			}
		}

		$rAgent = CAgent::GetList(array(), array(
			"NAME" => '\Ammina\Optimizer\Agent\CheckCache::doExecute();',
			"MODULE_ID" => $module_id,
		));
		if ($rAgent->SelectedRowsCount() > 1) {
			$rAgent->Fetch();
			while ($arAgent = $rAgent->Fetch()) {
				CAgent::Delete($arAgent['ID']);
			}
		}
		$arAgent = CAgent::GetList(array(), array(
			"NAME" => '\Ammina\Optimizer\Agent\CheckCache::doExecute();',
			"MODULE_ID" => $module_id,
		))->Fetch();
		if (COption::GetOptionString($module_id, "clearcacheagent_active", "N") === "Y") {
			$arFields = array(
				"NAME" => '\Ammina\Optimizer\Agent\CheckCache::doExecute();',
				"MODULE_ID" => $module_id,
				"ACTIVE" => "Y",
				"SORT" => 100,
				"IS_PERIOD" => "N",
				"AGENT_INTERVAL" => COption::GetOptionString($module_id, "clearcacheagent_period_steps", 30),
				"USER_ID" => false,
				"NEXT_EXEC" => ConvertTimeStamp(false, "FULL"),
			);
			if ($arAgent) {
				CAgent::Update($arAgent['ID'], $arFields);
			} else {
				CAgent::Add($arFields);
			}
			\COption::SetOptionString($module_id, "clearcacheagent_nextdir", "");
			\COption::SetOptionString($module_id, "clearcacheagent_emptyexec", "N");
		} else {
			if ($arAgent) {
				CAgent::Delete($arAgent['ID']);
			}
		}


		if (COption::GetOptionString($module_id, "preopt_save_active", "N") === "Y") {
			$eventManager = \Bitrix\Main\EventManager::getInstance();
			$eventManager->registerEventHandler('main', 'OnFileSave', $module_id, '\CAmminaOptimizer', 'OnFileSave', 10000);
		} else {
			$eventManager = \Bitrix\Main\EventManager::getInstance();
			$eventManager->unregisterEventHandler('main', 'OnFileSave', $module_id, '\CAmminaOptimizer', 'OnFileSave');
		}

		if (COption::GetOptionString($module_id, "preopt_resize_active", "N") === "Y") {
			$eventManager = \Bitrix\Main\EventManager::getInstance();
			$eventManager->registerEventHandler('main', 'OnAfterResizeImage', $module_id, '\CAmminaOptimizer', 'OnAfterResizeImage', 10000);
		} else {
			$eventManager = \Bitrix\Main\EventManager::getInstance();
			$eventManager->unregisterEventHandler('main', 'OnAfterResizeImage', $module_id, '\CAmminaOptimizer', 'OnAfterResizeImage');
		}

	}

	COption::SetOptionInt("ammina.optimizer", "pt", time());
	CAmminaOptimizer::doCheckAmminaBxAPIKey();

	if (amopt_strlen($strWarning) > 0)
		CAdminMessage::ShowMessage($strWarning);

	$aTabs = array();
	$aTabs[] = array(
		'DIV' => 'edit1',
		'TAB' => GetMessage('ammina.optimizer_TAB_SETTINGS_TITLE'),
		'TITLE' => GetMessage('ammina.optimizer_TAB_SETTINGS_DESC'),
	);
	$aTabs[] = array(
		'DIV' => 'edit2',
		'TAB' => GetMessage('ammina.optimizer_TAB_SUPPORT_TITLE'),
		'TITLE' => GetMessage('ammina.optimizer_TAB_SUPPORT_DESC'),
	);
	$aTabs[] = array(
		'DIV' => 'editrights',
		'TAB' => GetMessage('ammina.optimizer_TAB_RIGHTS_TITLE'),
		'TITLE' => GetMessage('ammina.optimizer_TAB_RIGHTS_DESC'),
	);
	$tabControl = new CAdminTabControl('tabControl', $aTabs);

	$tabControl->Begin();
	?>
	<form method="POST" action="<?
	echo $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($mid) ?>&lang=<?= LANGUAGE_ID ?>"><?
		bitrix_sessid_post();

		$tabControl->BeginNextTab();
		foreach ($arAllOptions as $Option) {
			$val = COption::GetOptionString($module_id, $Option[0], $Option[2]);
			$type = $Option[3];
			if ($Option[0] === "separator") {
				?>
				<tr class="heading">
					<td colspan="2"><?= $Option[1] ?></td>
				</tr>
				<?
			} else {
				?>
				<tr>
					<td valign="top" width="50%"><?
						if ($type[0] === "checkbox")
							echo "<label for=\"" . htmlspecialcharsbx($Option[0]) . "\">" . $Option[1] . "</label>";
						else
							echo $Option[1];
						?>:
					</td>
					<td valign="top" width="50%">
						<?
						if ($type[0] === "checkbox") {
							?>
							<input type="checkbox" name="<?
							echo htmlspecialcharsbx($Option[0]) ?>" id="<?
							echo htmlspecialcharsbx($Option[0]) ?>" value="Y"<?
							if ($val === "Y") echo " checked"; ?>>
						<? } elseif ($type[0] === "text") {
							?>
							<input type="text" size="<?
							echo $type[1] ?>" value="<?
							echo htmlspecialcharsbx($val) ?>" name="<?
							echo htmlspecialcharsbx($Option[0]) ?>">
						<? } elseif ($type[0] === "textarea") {
							?>
							<textarea rows="<?
							echo $type[1] ?>" cols="<?
							echo $type[2] ?>" name="<?
							echo htmlspecialcharsbx($Option[0]) ?>"><?
								echo htmlspecialcharsbx($val) ?></textarea>
						<? } elseif ($type[0] === "selectbox") {
							?>
							<select name="<?
							echo htmlspecialcharsbx($Option[0]) ?>" id="<?
							echo htmlspecialcharsbx($Option[0]) ?>">
								<?
								foreach ($Option[4] as $v => $k) {
									?>
									<option value="<?= $v ?>"<?
									if ($val == $v) echo " selected"; ?>><?= $k ?></option><?
								}
								?>
							</select>
						<? }
						if ($Option[0] === "google_pagespeed_apikey") {
							?>
							<a href="https://developers.google.com/speed/docs/insights/v5/get-started#key" target="_blank"><?= Loc::getMessage("ammina.optimizer_OPTION_GOOGLE_PAGESPEED_APIKEY_GET") ?></a>
							<?
						}
						if ($Option[0] === "amminabx_apikey") {
							?>
							<a href="/bitrix/admin/ammina.optimizer.get.key.php?lang=<?= LANGUAGE_ID ?>"><?= Loc::getMessage("ammina.optimizer_OPTION_AMMINABX_APIKEY_GET") ?></a>
							<br/>
							<?= GetMessage('ammina.optimizer_OPTION_AMMINABX_APIKEY_EMAIL') ?>: <?= COption::GetOptionString('ammina.optimizer', 'amminabx_email', GetMessage('ammina.optimizer_OPTION_AMMINABX_APIKEY_EMAIL_NO')) ?>
							<br/>
							<?= GetMessage('ammina.optimizer_OPTION_AMMINABX_APIKEY_ACTIVE_TO') ?>: <?= COption::GetOptionString('ammina.optimizer', 'amminabx_active_to', GetMessage('ammina.optimizer_OPTION_AMMINABX_APIKEY_ACTIVE_TO_NO')) ?>
							<br/>
							<?= GetMessage('ammina.optimizer_OPTION_AMMINABX_APIKEY_STATUS') ?>: <?= GetMessage('ammina.optimizer_OPTION_AMMINABX_APIKEY_STATUS_' . COption::GetOptionString('ammina.optimizer', 'amminabx_status', 'N')) ?>
							<br/>
							<?= GetMessage('ammina.optimizer_OPTION_AMMINABX_APIKEY_OPTISERVER') ?>: <?
							$ar = parse_url(COption::GetOptionString('ammina.optimizer', 'ammina_workurl', ''));
							echo $ar['host'];
						}
						?>
					</td>
				</tr>
				<?
				if ($Option[0] === "preoptagent_dirs") {
					$strNextDir = COption::GetOptionString($module_id, "preoptagent_nextdir", "");
					if (COption::GetOptionString($module_id, "preoptagent_onlycron", "N") === "Y") {
						$strNextDir = COption::GetOptionString($module_id, "preoptagent_onestepcurfile", "");
					}
					?>
					<tr>
						<td valign="top" width="50%"><?= GetMessage("ammina.optimizer_PREOPTAGENT_STATUS"); ?>:</td>
						<td valign="top" width="50%">
							<?
							if (amopt_strlen($strNextDir) > 0) {
								echo GetMessage("ammina.optimizer_PREOPTAGENT_STATUS_NEXT", array("#FILE#" => $strNextDir));
							} else {
								echo GetMessage("ammina.optimizer_PREOPTAGENT_STATUS_OK");
							}
							?>
						</td>
					</tr>
					<?
				}
			}
		}

		$tabControl->BeginNextTab();
		?>
		<tr>
			<td>
				<? echo GetMessage("ammina.optimizer_TAB_SUPPORT_CONTENT"); ?>
			</td>
		</tr>
		<?
		$tabControl->BeginNextTab();
		require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/admin/group_rights.php"); ?>
		<?
		$tabControl->Buttons(); ?>
		<script language="JavaScript">
			function RestoreDefaults() {
				if (confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>'))
					window.location = "<?echo $APPLICATION->GetCurPage()?>?RestoreDefaults=Y&lang=<?echo LANG?>&mid=<?echo urlencode($mid) . "&" . bitrix_sessid_get();?>";
			}
		</script>

		<input type="submit" <?
		if ($modulePermissions < "W") echo "disabled" ?> name="Update" value="<?= GetMessage("MAIN_SAVE") ?>">
		<input type="hidden" name="Update" value="Y">
		<input type="reset" name="reset" value="<?= GetMessage("MAIN_RESET") ?>">
		<input type="button" <?
		if ($modulePermissions < "W") echo "disabled" ?> title="<?= GetMessage("MAIN_HINT_RESTORE_DEFAULTS") ?>" onclick="RestoreDefaults();" value="<?= GetMessage("MAIN_RESTORE_DEFAULTS") ?>">
		<?
		$tabControl->End();
		?>
	</form>
	<?
}
