<?php

use Bitrix\Main\Localization\Loc;
use Mcart\Xls\Admin\ProfileImport;
use Mcart\Xls\Helpers\Html;
use Mcart\Xls\McartXls;
/** @var $obMcartXls McartXls */

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require_once($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/mcart.xls/prolog.php');
Loc::loadMessages(__FILE__);

$obProfileImport = new ProfileImport();
if(!$obProfileImport->getRight()){
    return;
}
$obMcartXls = McartXls::getInstance();
if(!$obMcartXls->checkRequirements()){
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
    $obMcartXls->showErrors();
    return;
}
try{
    $obProfileImport->prolog();
} catch (Exception $e) {
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
    CAdminMessage::ShowMessage($e->getMessage());
    $obProfileImport->showBackButton();
    return;
}

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
//--------------------------//
try {
    $arProfile = $obProfileImport->getProfile();
    $arFile = $obProfileImport->getFile();
    $obHtml = new Html();
    $pref = McartXls::getRequestPref();
} catch (Exception $e) {
    CAdminMessage::ShowMessage($obMcartXls->getErrorMessage($e, 'Error'));
}
$obMcartXls->showErrors();
//--------------------------//
?>
<form method="POST" action="" enctype="multipart/form-data"
    name="mcart_xls_profile_edit_form" id="mcart_xls_profile_edit_form">
    <?=bitrix_sessid_post();?>
    <input type="hidden" name="lang" value="<?=LANG?>"> <?
    $obProfileImport->getTabControl()->Begin();
    $obProfileImport->getTabControl()->BeginNextTab();
    $obProfileImport->getTabControl()->BeginNextTab();
    $obProfileImport->getTabControl()->BeginNextTab();
    //--
    if($arFile['ID'] <= 0){
        $field = 'FILE';
        $fileFieldName = $obProfileImport->getFieldName($field); ?>
        <tr class="<?=$obHtml->css_class_tr.' '.$obHtml->css_class_required?>">
            <td width="40%" class="<?=$obHtml->css_class_td_title?>"><?=$obProfileImport->getFieldTitle($field)?></td>
            <td width="60%" class="<?=$obHtml->css_class_td_value?> mcart_xls_file"><?
                echo CFileInput::Show(
                    $fileFieldName,
                    '',
                    array(
                        "PATH" => "Y",
                        "FILE_SIZE" => "Y",
                        "DIMENSIONS" => "Y",
                        "IMAGE_POPUP" => "N",
                        //"IMAGE" => "N",
                        //"MAX_SIZE" => $maxSize,
                    ), array(
                        'upload' => true,
                        'medialib' => false,
                        'file_dialog' => true,
                        'cloud' => false,
                        'del' => false,
                        'description' => false,
                    )
                ); ?>
            </td>
        </tr><?
        $obProfileImport->getTabControl()->Buttons(); ?>
        <input class="adm-btn-save" type="submit" name="save" value="<?=Loc::getMessage("MCART_XLS_TO_IMPORT")?>" />
        <a class="adm-btn" href="mcart_xls_index.php?lang=<?=LANGUAGE_ID?>"><?=Loc::getMessage("MCART_XLS_CANCEL")?></a><?
    }else{ ?>
        <tr>
            <td colspan="2">
                <div class="import">
                    <div class="errors" style="color:red;"></div>
                    <div class="processedRows"><?=Loc::getMessage("MCART_XLS_IMPORT__PROCESSED_ROWS")?>: <span class="value">0</span></div>
                    <div class="addedElements"><?=Loc::getMessage("MCART_XLS_IMPORT__ADDED_ELEMENTS")?>: <span class="value">0</span></div>
                    <div class="updatedElements"><?=Loc::getMessage("MCART_XLS_IMPORT__UPDATED_ELEMENTS")?>: <span class="value">0</span></div>
                    <div class="log"></div>
                </div>
            </td>
        </tr><?
        $obProfileImport->getTabControl()->Buttons();
    }
    //--
    $obProfileImport->getTabControl()->End(); ?>
</form>
<script type="text/javascript">
$(function() { <?
    if($arFile['ID'] <= 0){?>
        $('form#mcart_xls_profile_edit_form').submit(function(){
            var obForm = $(this),
                obFile = obForm.find('input[name="<?=$fileFieldName?>"]:visible'),
                fileType = obFile.attr('type'),
                fileVal = '',
                div = obFile.closest('.adm-input-file-control');
            if(fileType === 'file'){
                div.find('input.adm-designed-file[type="file"]').each(function(){
                    if(fileVal == ''){
                        fileVal = $(this).val();
                    }
                });
            }else if(obFile.length > 0){
                fileVal = obFile.val();
            }
            if(fileVal == '' || fileVal.substr(-5).toLowerCase()!=='.xlsx'){
                alert('<?=Loc::getMessage("MCART_XLS_PROFILE_ERROR_FILE")?>');
                return false;
            }
            return true;
        }); <?
    }else{ ?>
        var obForm = $('form#mcart_xls_profile_edit_form'),
            obImport = obForm.find('.import'),
            obImportErrors = obImport.find('.errors'),
            obImportProcessedRows = obImport.find('.processedRows .value'),
            obImportAddedElements = obImport.find('.addedElements .value'),
            obImportUpdatedElements = obImport.find('.updatedElements .value'),
            obImportLog = obImport.find('.log'),
            obBtns = obForm.find('.adm-btn');
        function mcartXlsImport(startRow){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: 'mcart_xls_ajax.php',
                data: {
                    sessid: '<?=bitrix_sessid()?>',
                    <?=$pref?>act: 'Import',
                    <?=$pref?>PROFILE_ID: '<?=$arProfile['ID']?>',
                    <?=$pref?>FILE_ID: '<?=$arFile['ID']?>',
                    <?=$pref?>START_ROW: startRow
                }
            }).done(function(arResult){
                if(!arResult.processedRows){
                    arResult.processedRows = 0;
                }
                if(!arResult.addedElements){
                    arResult.addedElements = 0;
                }
                if(!arResult.updatedElements){
                    arResult.updatedElements = 0;
                }
                if(!arResult.log){
                    arResult.log = '';
                }
                if(!arResult.ERRORS){
                    arResult.ERRORS = '';
                }
                obImportProcessedRows.html(arResult.processedRows);
                obImportAddedElements.html(Number(obImportAddedElements.html())+arResult.addedElements);
                obImportUpdatedElements.html(Number(obImportUpdatedElements.html())+arResult.updatedElements);
                obImportLog.append('<div>'+arResult.log+'</div>');
                if(!arResult.RESULT){
                    obImportErrors.html(arResult.ERRORS);
                    BX.closeWait();
                    return;
                }
                if(!arResult.isComplete && arResult.nextStartRow){
                    mcartXlsImport(arResult.nextStartRow);
                }else{
                    BX.closeWait();
                    obBtns.show();
                }
            });
        };
        var wait = BX.showWait();
        obBtns.hide();
        mcartXlsImport('<?=$arProfile['START_ROW']?>');<?
    }?>
});
</script><?

//--------------------------//
include_once 'inc/profile_edit.css.php';
//--------------------------//
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");