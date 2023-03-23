<?
$ProfileID = IntVal($_GET['ID']);
?><tr class="heading"><td colspan="2"><?=GetMessage('WDI_PARAM_MAIN_PARAMS');?><?if(!empty($arData['TITLE_SUFFIX'])):?> <?=$arData['TITLE_SUFFIX'];?><?endif?></td></tr>
<tr>
	<td colspan="2" class="table-main-params-subtabs">
		<script>
		function wdi_change_tab_settings(Tab){
			<?if($ProfileID>0):?>
				$.cookie('WDI_ACTIVE_SHEET_SETTINGS_<?=$ProfileID;?>',Tab,{expires:30, path:'/'});
			<?endif?>
		}
		<?if($ProfileID>0):?>
			$(document).ready(function(){
				var Tab = $.cookie('WDI_ACTIVE_SHEET_SETTINGS_<?=$ProfileID;?>');
				if(Tab!=undefined){
					$('#view_tab_'+Tab).click();
				}
			});
		<?endif?>
		</script>
		<div id="wdi_profile_subtabs">
			<?
			$arSubTabs = array();
			$arSubTabs[] = array('DIV'=>'subtab_general', 'TAB'=>GetMessage('WDI_PARAM_SUBTAB_GENERAL_NAME'), 'TITLE'=>GetMessage('WDI_PARAM_SUBTAB_GENERAL_DESC'), 'ONSELECT'=>'wdi_change_tab_settings("subtab_general");');
			$arSubTabs[] = array('DIV'=>'subtab_active', 'TAB'=>GetMessage('WDI_PARAM_SUBTAB_ACTIVE_NAME'), 'TITLE'=>GetMessage('WDI_PARAM_SUBTAB_ACTIVE_DESC'), 'ONSELECT'=>'wdi_change_tab_settings("subtab_active");');
			$arSubTabs[] = array('DIV'=>'subtab_catalog', 'TAB'=>GetMessage('WDI_PARAM_SUBTAB_CATALOG_NAME'), 'TITLE'=>GetMessage('WDI_PARAM_SUBTAB_CATALOG_DESC'), 'ONSELECT'=>'wdi_change_tab_settings("subtab_catalog");');
			if(!defined('WDI_HIDE_SUBTAB_OFFERS')) {
				$arSubTabs[] = array('DIV'=>'subtab_offers', 'TAB'=>GetMessage('WDI_PARAM_SUBTAB_OFFERS_NAME'), 'TITLE'=>GetMessage('WDI_PARAM_SUBTAB_OFFERS_DESC'), 'ONSELECT'=>'wdi_change_tab_settings("subtab_offers");');
			}
			$arSubTabs[] = array('DIV'=>'subtab_stores', 'TAB'=>GetMessage('WDI_PARAM_SUBTAB_STORES_NAME'), 'TITLE'=>GetMessage('WDI_PARAM_SUBTAB_STORES_DESC'), 'ONSELECT'=>'wdi_change_tab_settings("subtab_stores");');
			$childTabControl = new CAdminViewTabControl("ProfileSubTabs", $arSubTabs);
			$childTabControl->Begin();
			$childTabControl->BeginNextTab();
			CWDI_Handler::IncludeCommonFile('/profile/subtabs/general.php',$arHandler,$arFields,$arData);
			$childTabControl->BeginNextTab();
			CWDI_Handler::IncludeCommonFile('/profile/subtabs/active.php',$arHandler,$arFields);
			$childTabControl->BeginNextTab();
			CWDI_Handler::IncludeCommonFile('/profile/subtabs/catalog.php',$arHandler,$arFields);
			if(!defined('WDI_HIDE_SUBTAB_OFFERS')) {
				$childTabControl->BeginNextTab();
				CWDI_Handler::IncludeCommonFile('/profile/subtabs/offers.php',$arHandler,$arFields);
			}
			$childTabControl->BeginNextTab();
			CWDI_Handler::IncludeCommonFile('/profile/subtabs/stores.php',$arHandler,$arFields);
			$childTabControl->End();
			?>
		</div>
		<script>
		$('#wdi_profile_subtabs input[type=checkbox]').each(function(){
			if($(this).attr('ID')==undefined) {
				$(this).attr('ID','designed_checkbox_'+Math.random());
			}
			ID = $(this).attr('ID');
			if($(this).attr('ID')!=undefined) {
				BX.adminFormTools.modifyCheckbox(document.getElementById($(this).attr('ID')));
			}
		});
		</script>
		<hr/>
	</td>
</tr>