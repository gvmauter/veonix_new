<?php

use Bitrix\Main\Localization\Loc;
use Mcart\Xls\Admin\ProfileColumnEdit;
use Mcart\Xls\ORM\Profile\Column\CustomFieldsTable;
use Mcart\Xls\Helpers\Html;
use Mcart\Xls\McartXls;
/** @var $obMcartXls McartXls */
/** @global CAdminMainChain $adminChain */

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require_once($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/mcart.xls/prolog.php');
Loc::loadMessages(__FILE__);

//--------------------------//
$obEdit = new ProfileColumnEdit();
if(!$obEdit->getRight()){
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
    return;
}
$obMcartXls = McartXls::getInstance();
if(!$obMcartXls->checkRequirements()){
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
    $obMcartXls->showErrors();
    return;
}
try{
    $obEdit->prolog();
} catch (Exception $e) {
    require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
    CAdminMessage::ShowMessage($e->getMessage());
    $obEdit->showBackButton();
    return;
}
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
//--------------------------//
try {
    $obMcartXls->showErrors();
    $arProfile = $obEdit->getProfile();
    $arProfileColumn = $obEdit->getProfileColumn();
    $arColumns = $obEdit->getColumns();
    $entityCustomFields = CustomFieldsTable::getEntity();
    $obHtml = new Html();
    $pref = (string)McartXls::getRequestPref();
} catch (Exception $e) {
    CAdminMessage::ShowMessage($obMcartXls->getErrorMessage($e, 'Error'));
    return;
}
//--------------------------//
?>
<form method="POST" action="" enctype="multipart/form-data"
    name="mcart_xls_profile_edit_form" id="mcart_xls_profile_edit_form">
    <?=bitrix_sessid_post();?>
    <input type="hidden" name="lang" value="<?=LANG?>" />
    <input type="hidden" name="<?=$obEdit->getFieldName('ID')?>" value="<?=$arProfileColumn['ID']?>" /> <?
$obEdit->getTabControl()->Begin();
$obEdit->getTabControl()->BeginNextTab();
$obEdit->getTabControl()->BeginNextTab();
//--
    $field = 'COLUMN'; ?>
    <tr class="<?=$obHtml->css_class_tr.' '.$obHtml->css_class_required?>">
        <td width="40%" class="<?=$obHtml->css_class_td_title?>"><?=$obEdit->getFieldTitle($field)?></td>
        <td width="60%" class="<?=$obHtml->css_class_td_value?> mcart_xls_file"><?
            $arOptions = $arProfile['FILE_HEADERS'];
            if (!is_array($arOptions) || empty($arOptions)) {
                $arOptions = [];
            }else{
                foreach ($arOptions as $k => &$v) {
                    $arOptions[$k] = '['.$k.'] '.$v;
                }
                array_unshift($arOptions, '');
            }
            echo '<div>'.$obHtml->getInputSelect([
                'name' => $obEdit->getFieldName('COLUMN_BY_LIST'),
                'selected' => $arProfileColumn[$field],
                'options' => $arOptions,
                'options_as_key_value' => true,
            ]).'</div>';
            $value = '';
            if (!empty($arProfileColumn[$field]) && empty($arOptions[$arProfileColumn[$field]])) {
                $value = $arProfileColumn[$field];
            }
            echo Loc::getMessage("MCART_XLS_OR").' '.$obHtml->getInputText([
                'name' => $obEdit->getFieldName($field),
                'value' => $value,
                'type' => 'text',
                'size' => '10'
            ]);
            ?>
        </td>
	</tr><?

    $field = 'DO_NOT_IMPORT_ROW_IF_EMPTY';
    $inputOptions = ['name' => $obEdit->getFieldName($field), 'value' => $arProfileColumn[$field]];
    echo $obHtml->getRowInput($obEdit->getFieldTitle($field), '', false, 'boolean', $inputOptions);

    $field = 'IS_IDENTIFY_ELEMENT';
    $inputOptions = ['name' => $obEdit->getFieldName($field), 'value' => $arProfileColumn[$field]];
    echo $obHtml->getRowInput($obEdit->getFieldTitle($field), '', false, 'boolean', $inputOptions);

    $field = 'HANDLER';
    $fieldNameForHandler = $obEdit->getFieldName($field);
    $arOptions = ['' => ' '];
    $ar = $obEdit->getFieldValues($field);
    if(is_array($ar)){
        $arOptions = array_merge($arOptions, $ar);
    }
    echo $obHtml->getRowInput(
        $obEdit->getFieldTitle($field),
        $obEdit->getFieldTooltip($field),
        false,
        'select',
        [
            'name' => $fieldNameForHandler,
            'selected' => $arProfileColumn[$field],
            'options' => $arOptions,
            'options_as_key_value' => true,
        ]
    );

    ?>
    <tr class="heading">
        <td colspan="2">
            <?=Loc::getMessage("MCART_XLS_CUSTOM_FIELDS_HEAD")
                .' ('.Loc::getMessage("MCART_XLS_CUSTOM_FIELDS_HEAD_TOOLTIP").')'?>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="custom_fields">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th width="200px"><?=$entityCustomFields->getField('NAME')->getTitle()?></th>
                        <th><?=$entityCustomFields->getField('VALUE')->getTitle()?></th>
                        <th width="20px"><button class="field_add" type="button">+</button></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </td>
	</tr><?

    $field = 'SAVE_IN';
    $fieldName = $obEdit->getFieldName($field);
    $value = $arProfileColumn['SAVE_IN_PREF'].'_'.$arProfileColumn[$field]; ?>
    <tr class="heading">
        <td colspan="2"><?=$obEdit->getFieldTitle($field)?></td>
    </tr>
    <tr class="<?=$obHtml->css_class_tr.' '.$obHtml->css_class_required?>">
        <td colspan="2" class="<?=$obHtml->css_class_td_value?>"><?
            foreach ($arColumns as $ar1) {?>
                <div class="overflow_y_label"><?=htmlspecialcharsEx($ar1['NAME'])?></div>
                <div class="overflow_y"><?
                    foreach ($ar1['ITEMS'] as $ar) {
                        $id = $fieldName.'['.$ar['KEY'].']'; ?>
                        <div class="label">
                            <input type="radio" name="<?=$fieldName?>" value="<?=$ar['KEY']?>" id="<?=$id?>"
                            <?=($ar['KEY']==$value?'checked':'')?>>
                            <label for="<?=$id?>">&nbsp;<?=htmlspecialcharsEx($ar['NAME'])?></label>
                        </div><?
                    } ?>
                </div><?
            } ?>
        </td>
    </tr><?

//--
$obEdit->getTabControl()->Buttons([
    'btnSave' => true,
    'btnApply' => true,
    'btnCancel' => true,
    'back_url' => $obEdit->getUrlProfileColumns()
]);
$obEdit->getTabControl()->End();?>
</form><?
echo BeginNote();
    echo Loc::getMessage("MCART_XLS_REQUIRED_FIELDS");
echo EndNote(); ?>
<script type="text/javascript">
$(function() {
    var obHandler = $('form#mcart_xls_profile_edit_form select[name="<?=$fieldNameForHandler?>"]'),
        obCustomFields = $('form#mcart_xls_profile_edit_form .custom_fields > table > tbody');
    function mcartXlsSetCustomFields(){
        BX.showWait();
        $.ajax({
            type: "POST",
            dataType: "json",
            url: 'mcart_xls_ajax.php',
            data: {
                sessid: '<?=bitrix_sessid()?>',
                <?=$pref?>act: 'GetCustomFields',
                <?=$pref?>PROFILE_COLUMN_ID: '<?=$arProfileColumn['ID']?>',
                <?=$pref?>HANDLER: obHandler.val(),
            }
        }).done(function(arResult){
            if(!arResult.RESULT){
                obCustomFields.html('');
                BX.closeWait();
                return;
            }
            var fields = '',
                key = 0;
            if(arResult.html){
                fields += arResult.html;
            }
            obCustomFields.html(fields);
            key = (parseInt(obCustomFields.find('tr.field_row:last-child').attr('data-key'))+1);
            obCustomFields.append(mcartXlsGetCustomFieldHtml(key));
            BX.closeWait();
        });
    }

    function mcartXlsGetCustomFieldHtml(key){
        var html = '<tr class="field_row" data-key="'+key+'">';
        html += '<td><input name="<?=$pref?>[CUSTOM_FIELDS]['+key+'][NAME]" value="" type="text" /></td>';
        html += '<td><textarea name="<?=$pref?>[CUSTOM_FIELDS]['+key+'][VALUE]" rows="1" maxlength="255"></textarea></td>'
            +'<td><button class="field_del" type="button">x</button></td>';
        return html;
    }

    $('form#mcart_xls_profile_edit_form .custom_fields > table').on('click', 'button.field_add', function(){
        var key = (parseInt(obCustomFields.find('tr.field_row:last-child').attr('data-key'))+1);
        obCustomFields.append(mcartXlsGetCustomFieldHtml(key));
    });

    obCustomFields.on('click', 'button.field_del', function(){
        $(this).closest('tr.field_row').remove();
    });

    mcartXlsSetCustomFields();
    obHandler.change(function(){
        mcartXlsSetCustomFields();
    });

});
</script><?
//--------------------------//
include_once 'inc/profile_edit.css.php';
//--------------------------//
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");