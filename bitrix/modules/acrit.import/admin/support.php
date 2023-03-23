<?php
$moduleId = "acrit.import";
require_once( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php" );
CUtil::InitJSCore( array( "ajax", "jquery" ) );
$APPLICATION->AddHeadScript( "/bitrix/js/acrit.import/main.js" );

use Bitrix\Main\SystemException;

IncludeModuleLangFile(__FILE__);

$moduleStatus = CModule::IncludeModuleEx( $moduleId );
if ($moduleStatus == MODULE_DEMO_EXPIRED ):
    $buyLicenceUrl = "https://www.acrit-studio.ru/market/module/acrit.import/?action=BUY&id=154854";
    require_once( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php" );?>
    <div class="adm-info-message">
        <div class="acrit_note_button">
            <a href="<?=$buyLicenceUrl?>" target="_blank" class="adm-btn adm-btn-save"><?=GetMessage( "ACRIT_IMPORT_DEMOEND_BUY_LICENCE_INFO" )?></a>
        </div>
        <div class="acrit_note_text"><?=GetMessage( "ACRIT_IMPORT_DEMOEND_PERIOD_INFO" );?></div>
        <div class="acrit_note_clr"></div>
    </div>
<?
else:
    require_once( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/$moduleId/include.php" );

    require( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php" );

    $arTabs = array(
        array(
            "DIV" => "main",
            "TAB" => GetMessage( "ACRIT_IMPORT_SUPPORT_TAB_NAME" ),
            "ICON" => "main_user_edit",
            "TITLE" => GetMessage( "ACRIT_IMPORT_SUPPORT_TAB_TITLE" )
        ),
    );

    $tabControl = new CAdminTabControl( "tabControl", $arTabs, false, true);
	$bExistBitrixCloudMonitoring = \Acrit\Import\Informer::CheckBitrixCloudMonitoring( GetMessage( "SC_SET_BITRIX_CLOUD_MONITORING_EMAIL" ) );
?>
    <form method="POST" action="<?=$APPLICATION->GetCurPage();?>" ENCTYPE="multipart/form-data" id="support_form" name="support_form">

    <?$tabControl->Begin();?>

    <?$tabControl->BeginNextTab();?>

	<tr>
		<td class="heading" colspan="2"><?=GetMessage( "SC_SET_BITRIX_CLOUD_MONITORING_OPTIONS" );?></td>
	</tr>
	<tr>
		<td colspan="2" class="adm-detail-content-cell" align="center">
			<a class="adm-btn adm-btn-save" onclick="javascript:UpdateBitrixCloudMonitoring( '<?=GetMessage( "SC_SET_BITRIX_CLOUD_MONITORING_EMAIL" );?>' );">
				<?if( $bExistBitrixCloudMonitoring ){
					echo GetMessage( "ACRIT_IMPORT_SET_BITRIX_CLOUD_MONITORING_BUTTON_OFF" );
				}
				else{
					echo GetMessage( "ACRIT_IMPORT_SET_BITRIX_CLOUD_MONITORING_BUTTON_ON" );
				}?>
			</a>
		</td>
	</tr>

    <tr>
        <td class="heading" colspan="2"><?=GetMessage( "SC_FRM_1" );?></td>
    </tr>
    <tr>
        <td valign="top" class="adm-detail-content-cell-l"><span class="required">*</span><?=GetMessage( "SC_FRM_2" );?><br/>
            <small><?=GetMessage( "SC_FRM_3" );?></small>
        </td>
        <td valign="top" class="adm-detail-content-cell-r">
            <textarea cols="60" rows="6" name="ticket_text_proxy" id="ticket_text_proxy"></textarea>
            <textarea style="display: none" name="ticket_text_log" id="ticket_text_log">
            <b><?=GetMessage( "ACRIT_IMPORT_LOG_STATISTICK" )?></b><br/>
            <b><?=GetMessage( "ACRIT_IMPORT_LOG_ALL" )?></b><br/>
                <?=GetMessage( "ACRIT_IMPORT_LOG_ALL_IB" )?> <?=$arProfile["LOG"]["IBLOCK"]?><br/>
                <?=GetMessage( "ACRIT_IMPORT_LOG_ALL_SECTION" )?> <?=$arProfile["LOG"]["SECTIONS"]?><br/>
                <?=GetMessage( "ACRIT_IMPORT_LOG_ALL_OFFERS" )?> <?=$arProfile["LOG"]["PRODUCTS"]?><br/>
            <b><?=GetMessage( "ACRIT_IMPORT_LOG_EXPORT" )?></b><br/>
                <?=GetMessage( "ACRIT_IMPORT_LOG_OFFERS_EXPORT" )?> <?=$arProfile["LOG"]["PRODUCTS_EXPORT"]?><br/>
            <b><?=GetMessage( "ACRIT_IMPORT_LOG_ERROR" )?></b><br/>
                <?=GetMessage( "ACRIT_IMPORT_LOG_ERR_OFFERS" )?> <?=$arProfile["LOG"]["PRODUCTS_ERROR"]?><br/>
                <?if( file_exists( $_SERVER["DOCUMENT_ROOT"].$arProfile["LOG"]["FILE"] ) ){?>
                    <?=GetMessage( "ACRIT_IMPORT_LOG_FILE" )?> <?=$arProfile["LOG"]["FILE"]?><br/>
                <?}?>
        </textarea>
        </td>
    </tr>
    <tr>
        <td class="adm-detail-content-cell-l"></td>
        <td class="adm-detail-content-cell-r">
            <input type="button" value="<?=GetMessage( "SC_FRM_4" );?>" onclick="SubmitToSupport()" name="submit_button">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?=BeginNote();?>
            <a href="https://www.acrit-studio.ru/technical-support/nastroyka-modulya-universalnyy-import/" target="_blank"><?=GetMessage( "SC_TXT_2" );?></a>
	        <?=EndNote();?>
	        <?=BeginNote();?>
            <?=GetMessage( "SC_TXT_1" );?> <a href="<?=GetMessage( "A_SUPPORT_URL" );?>"><?=GetMessage( "A_SUPPORT_URL" );?></a>
            <?=EndNote();?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?=GetMessage( "ACRIT_IMPORT_RECOMMENDS" );?>
        </td>
    </tr>

    <?$tabControl->EndTab();?>

    <?$tabControl->End();?>
    <?$tabControl->ShowWarnings( "support_form", $message );?>

    </form>
<?endif;?>

<form target="_blank" name="fticket" action="<?=GetMessage( "A_SUPPORT_URL" );?>" method="POST">
    <input type="hidden" name="send_ticket" value="Y">
    <input type="hidden" name="ticket_title" value="<?=GetMessage( "SC_RUS_L1" )." ".htmlspecialcharsbx( CAcritExportproplusTools::GetHttpHost() );?>">
    <input type="hidden" name="ticket_text" value="Y">
</form>

<script type="text/javascript">
    function SubmitToSupport(){
        var frm = document.forms.fticket;

        frm.ticket_text.value = BX( 'ticket_text_proxy' ).value;

        if( frm.ticket_text.value == '' ){
            alert( '<?=GetMessage( "SC_NOT_FILLED" )?>' );
            return;
        }

        frm.submit();
    }
</script>
<?require( $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php" );?>