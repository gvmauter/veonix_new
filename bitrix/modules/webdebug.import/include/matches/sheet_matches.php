<?
IncludeModuleLangFile(__FILE__);
$ProfileID = IntVal($_GET['ID']);
$SheetIndex = $arData['SHEET_INDEX'];
$arParams = $arFields['PARAMS'];
$arSheetParams = $arParams['S'][$SheetIndex];
$IBlockID = $arSheetParams['IBLOCK_ID'];
if($_GET['subaction']=='show_sheet_matches' && $_GET['sheet']==$SheetIndex) {
	$IBlockID = htmlspecialcharsbx($_GET['IBLOCK_ID']);
}

$IBlockIsCatalog = CWDI::IBlockIsCatalog($IBlockID);
$IBlockHasOffers = $IBlockIsCatalog && CWDI::GetOffersIBlockID($IBlockID)>0;
$arData['IBLOCK_IS_CATALOG'] = $IBlockIsCatalog;
?>

<tr>
	<td colspan="2">
		<div id="sheet_matches_<?=$SheetIndex;?>">
			<?
			if(!is_numeric($IBlockID) || $IBlockID<0) {
				return;
			}
			?>
			<?if($_GET['subaction']=='show_sheet_matches' && $_GET['sheet']==$SheetIndex){CWDI::StopOutputBuffering();}?>
				<table class="adm-detail-content-table">
					<tbody>
						<tr class="heading"><td colspan="2"><?=GetMessage('WDI_PARAM_MATCHES');?> <?=WdiHint(GetMessage('WDI_PARAM_MATCHES_HINT'));?></td></tr>
						<tr>
							<td class="adm-detail-content-cell-r" colspan="2" width="100%">
								<script>
								function wdi_change_tab_entity_<?=$ProfileID;?>(Tab){
									<?if($ProfileID>0):?>
										$.cookie('WDI_ACTIVE_SHEET_ENTITY_<?=$ProfileID;?>',Tab,{expires:30, path:'/'});
									<?endif?>
								}
								<?if($ProfileID>0):?>
									$(document).ready(function(){
										var Tab = $.cookie('WDI_ACTIVE_SHEET_ENTITY_<?=$ProfileID;?>');
										if(Tab!=undefined){
											$('#view_tab_'+Tab).click();
										}
									});
								<?endif?>
								</script>
								<?
								$arSubTabs = array(
									array('DIV'=>'subtab_section_'.$SheetIndex, 'TAB'=>GetMessage('WDI_PARAM_MATCHES_TAB_SECTION_NAME'), 'TITLE'=>GetMessage('WDI_PARAM_MATCHES_TAB_SECTION_DESC'), 'ONSELECT'=>'wdi_change_tab_entity_'.$ProfileID.'("subtab_section_'.$SheetIndex.'");'),
									array('DIV'=>'subtab_element_'.$SheetIndex, 'TAB'=>GetMessage('WDI_PARAM_MATCHES_TAB_ELEMENT_NAME'), 'TITLE'=>GetMessage('WDI_PARAM_MATCHES_TAB_ELEMENT_DESC'), 'ONSELECT'=>'wdi_change_tab_entity_'.$ProfileID.'("subtab_element_'.$SheetIndex.'");'),
								);
								if($IBlockHasOffers && !defined('WDI_HIDE_SUBTAB_OFFERS')) {
									$arSubTabs[] = array('DIV'=>'subtab_offer_'.$SheetIndex, 'TAB'=>GetMessage('WDI_PARAM_MATCHES_TAB_OFFER_NAME'), 'TITLE'=>GetMessage('WDI_PARAM_MATCHES_TAB_OFFER_DESC'), 'ONSELECT'=>'wdi_change_tab_entity_'.$ProfileID.'("subtab_offer_'.$SheetIndex.'");');
								}
								$TabControl = new CAdminViewTabControl('WdiTabControl_Sheet_'.$SheetIndex, $arSubTabs);
								$TabControl->Begin();
								$TabControl->BeginNextTab();
								$arData['MATCHES_TYPE'] = 'SECTION';
								CWDI_Handler::IncludeCommonFile('/matches/_matches_section.php',$arHandler,$arFields,$arData);
								$TabControl->BeginNextTab();
								$arData['MATCHES_TYPE'] = 'ELEMENT';
								CWDI_Handler::IncludeCommonFile('/matches/_matches_element.php',$arHandler,$arFields,$arData);
								if($IBlockHasOffers && !defined('WDI_HIDE_SUBTAB_OFFERS')) {
									$TabControl->BeginNextTab();
									$arData['MATCHES_TYPE'] = 'OFFER';
									CWDI_Handler::IncludeCommonFile('/matches/_matches_offer.php',$arHandler,$arFields,$arData);
								}
								$TabControl->End();
								?>
							</td>
						</tr>
					</tbody>
				</table>
			<?if($_GET['subaction']=='show_sheet_matches' && $_GET['sheet']==$SheetIndex){die();}?>
		</div>
	</td>
</tr>
