<?

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Web\Json;
use Mcart\Xls\Admin\ProfileEdit;
use Mcart\Xls\Helpers\Html;
use Mcart\Xls\McartXls;
use Mcart\Xls\ORM\Profile\ConstTable;
/* @var $obMcartXls McartXls */

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_before.php');
require_once($_SERVER['DOCUMENT_ROOT'].BX_ROOT.'/modules/mcart.xls/prolog.php');
Loc::loadMessages(__FILE__);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_admin_after.php');
//--------------------------//
$obEdit = new ProfileEdit();
if(!$obEdit->getRight()){
    return;
}
$obMcartXls = McartXls::getInstance();
if(!$obMcartXls->checkRequirements()){
    $obMcartXls->showErrors();
    return;
}
try{
    $obEdit->prolog();
} catch (Exception $e) {
    CAdminMessage::ShowMessage($e->getMessage());
    $obEdit->showBackButton();
    return;
}
//--------------------------//
try {
    $arProfile = $obEdit->getProfileForForm();
    $arColumnsForConst = $obEdit->getColumnsForConst();
    $isSimpleInterface = $obEdit->isSimpleInterface();
    $obHtml = new Html();
    $pref = (string)McartXls::getRequestPref();
} catch (Exception $e) {
    CAdminMessage::ShowMessage($obMcartXls->getErrorMessage($e, 'Error'));
    return;
}
//--------------------------//
?>
<form method="POST" action="<?=$obEdit->getFormAction()?>"
    enctype="multipart/form-data" name="mcart_xls_profile_edit_form" id="mcart_xls_profile_edit_form">
    <?=bitrix_sessid_post();?>
    <input type="hidden" name="lang" value="<?=LANG?>" />
    <input type="hidden" name="<?=$obEdit->getFieldName('ID')?>" value="<?=$arProfile['ID']?>" />  <?
$obEdit->getTabControl()->Begin(); // отобразим заголовки закладок
$obEdit->getTabControl()->BeginNextTab();
    $FIELD = 'NAME';
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD), '', true, 'text',
        ['name'=>$pref.$FIELD, 'value'=>$arProfile[$FIELD], 'maxlength'=>'255', 'size'=>'50'], ['width' => '40%'], ['width' => '60%']);?>
    <tr class="<?=$obHtml->css_class_tr.' '.$obHtml->css_class_required?>">
        <td width="40%" class="<?=$obHtml->css_class_td_title?>"><?=$obEdit->getProfileFieldTitle('FILE')?></td>
        <td width="60%" class="<?=$obHtml->css_class_td_value?> mcart_xls_file"><?
            echo CFileInput::Show(
                $pref.'FILE',
                '',
                array(
                    //"IMAGE" => "N",
                    "PATH" => "Y",
                    "FILE_SIZE" => "Y",
                    "DIMENSIONS" => "Y",
                    "IMAGE_POPUP" => "N",
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
    </tr>
	<tr class="<?=$obHtml->css_class_tr.' '.$obHtml->css_class_required?>">
		<td class="<?=$obHtml->css_class_td_title?>"><?=$obEdit->getProfileFieldTitle('IBLOCK_ID')?></td>
		<td class="<?=$obHtml->css_class_td_value?>"><?
            $disabled = ($isSimpleInterface? ' disabled ' : ''); ?>
            <select class="IBLOCK_TYPE_ID" name="<?=$pref?>IBLOCK_TYPE_ID" <?=$disabled?>><?
                $jsIBlocks = '';
                $optionsIBlock = '';
                foreach ($obEdit->getIBlocksByTypes() as $arIBlockType) {
                    if (empty($arIBlockType['IBlocks'])) {
                        continue;
                    }
                    echo '<option value="'.$arIBlockType['IBLOCK_TYPE_ID'].'" '
                        . ($arIBlockType['IBLOCK_TYPE_ID'] == $arProfile['IBLOCK_TYPE_ID']?' selected="selected"':'').'>'
                        . '['.$arIBlockType['IBLOCK_TYPE_ID'].'] '.$arIBlockType['IBLOCK_TYPE_NAME'].'</option>';
                    $str = '';
                    foreach ($arIBlockType['IBlocks'] as $arIBlock) {
                        $str .= '<option value="'.$arIBlock['ID'].'">['.$arIBlock['ID'].'] '.$arIBlock['NAME'].'</option>';
                        if($arIBlockType['IBLOCK_TYPE_ID'] == $arProfile['IBLOCK_TYPE_ID']){
                            $optionsIBlock .= '<option value="'.$arIBlock['ID'].'" '
                                .($arIBlock['ID'] == $arProfile['IBLOCK_ID']?' selected="selected"':'')
                                .'>['.$arIBlock['ID'].'] '.$arIBlock['NAME'].'</option>';
                        }
                    }
                    if(!$isSimpleInterface){
                        $jsIBlocks .= "arIBlocks['".$arIBlockType['IBLOCK_TYPE_ID']."'] = '<select name=\"".$pref."IBLOCK_ID\">$str</select>';\n";
                    }
                } ?>
            </select>
            <span class="IBLOCK_ID"><?
            if (!empty($optionsIBlock)) {
                echo '<select name="'.$pref.'IBLOCK_ID"'.$disabled.'>'.$optionsIBlock.'</select>';
            }?></span>
		</td>
	</tr>
    <?
    $FIELD = 'QUANTITY_ELEMENTS_IMPORTED_PER_STEP';
    $input_options = ['name' => $pref.$FIELD, 'value' => $arProfile[$FIELD], 'size' => '10'];
    if($isSimpleInterface){
        $input_options['disabled'] = 'disabled';
    }
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD), '', false, 'text', $input_options,
        ['width' => '40%'], ['width' => '60%']);

    $FIELD = 'SKU_CODE';
    $input_options = ['name' => $pref.$FIELD, 'value' => $arProfile[$FIELD], 'size' => '10'];
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD), '', false, 'text', $input_options,
    ['width' => '40%'], ['width' => '60%']);


    $FIELD = 'ONLY_UPDATE';
    $input_options = ['name' => $pref.$FIELD, 'value' => $arProfile[$FIELD]];
    if($isSimpleInterface){
        $input_options['disabled'] = 'disabled';
    }
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD), '', false, 'boolean', $input_options);

    $FIELD = 'DEACTIVATE_IF_NEW';
    $input_options = ['name' => $pref.$FIELD, 'value' => $arProfile[$FIELD]];
    if($isSimpleInterface){
        $input_options['disabled'] = 'disabled';
    }
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD), '', false, 'boolean', $input_options);

    $FIELD = 'DEACTIVATE_IF_QUANTITY_0';
    $input_options = ['name' => $pref.$FIELD, 'value' => $arProfile[$FIELD]];
    if($isSimpleInterface){
        $input_options['disabled'] = 'disabled';
    }
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD),
        Loc::getMessage('MCART_XLS_PROFILE_'.$FIELD.'_TOOLTIP'), false, 'boolean', $input_options);

    $FIELD = 'DEACTIVATE_IF_PRICE_0';
    $input_options = ['name' => $pref.$FIELD, 'value' => $arProfile[$FIELD]];
    if($isSimpleInterface){
        $input_options['disabled'] = 'disabled';
    }
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD), '', false, 'boolean', $input_options);

    $FIELD = 'ACTIVATE_IF_QUANTITY_AND_PRICE_NOT_0';
    $input_options = ['name' => $pref.$FIELD, 'value' => $arProfile[$FIELD]];
    if($isSimpleInterface){
        $input_options['disabled'] = 'disabled';
    }
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD),
        Loc::getMessage('MCART_XLS_PROFILE_'.$FIELD.'_TOOLTIP'), false, 'boolean', $input_options);

    $FIELD = 'HEADER_ROW';
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD), '', false, 'text',
        ['name'=>$pref.$FIELD, 'value'=>$arProfile[$FIELD], 'size'=>'10']);

    $FIELD = 'START_ROW';
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD), '', false, 'text',
        ['name'=>$pref.$FIELD, 'value'=>$arProfile[$FIELD], 'size'=>'10']);

    $FIELD = 'END_ROW';
    $input_options = ['name' => $pref.$FIELD, 'value' => $arProfile[$FIELD], 'size' => '10'];
    if($isSimpleInterface){
        $input_options['disabled'] = 'disabled';
    }
    echo $obHtml->getRowInput($obEdit->getProfileFieldTitle($FIELD),
        Loc::getMessage('MCART_XLS_PROFILE_'.$FIELD.'_TOOLTIP'), false, 'text', $input_options);
    ?>
	<tr class="<?=$obHtml->css_class_tr?>">
		<td class="<?=$obHtml->css_class_td_title?>"><?=$obEdit->getProfileFieldTitle('IBLOCK_SECTION_ID_FOR_NEW')?></td>
		<td class="<?=$obHtml->css_class_td_value?>">
            <select name="<?=$pref?>IBLOCK_SECTION_ID_FOR_NEW">
                <option value="0"></option>
            </select>
		</td>
	</tr>
    <tr class="heading">
      <td colspan="2"><?=Loc::getMessage("MCART_XLS_PROFILE_STEP1_HEAD3")?></td>
    </tr>
    <tr>
        <td colspan="2">
            <table class="properties table table-hover">
                <thead>
                    <tr>
                      <th width="45%" align="right"><?=Loc::getMessage("MCART_XLS_PROFILE_STEP1_CONST_HEAD1")?></th>
                      <th width="45%" align="center"><?=Loc::getMessage("MCART_XLS_PROFILE_STEP1_CONST_HEAD2")?></th>
                      <th width="10%" align="left"><button class="const_add" type="button">+</button></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </td>
    </tr><?
//--
$obEdit->getTabControl()->Buttons([
    'btnSave' => true,
    'btnApply' => true,
    'btnCancel' => true,
    'back_url' => 'mcart_xls_index.php'
]);
$obEdit->getTabControl()->End(); // завершаем интерфейс закладок

echo BeginNote();
    echo Loc::getMessage("MCART_XLS_REQUIRED_FIELDS");
echo EndNote();

foreach ($arColumnsForConst as $k => $ar1) {
    $selectColumns[$k]['NAME'] = $ar1['NAME'];
    foreach ($ar1['ITEMS'] as $ar) {
        $selectColumns[$k]['OPTIONS'] .= '<option value="'.$ar['KEY'].'">'.$ar['NAME'].'</option>';
    }
}
if (empty($selectColumns)) {
    $selectColumns = [];
}
include_once 'inc/profile_edit.js.php'; ?>
<script type="text/javascript">
$(document).ready(function() { <?
    if (!empty($arProfile['FILE'])) {?>
        setTimeout(function(){
            var td = $('form#mcart_xls_profile_edit_form .mcart_xls_file');
            td.find('.add-file-popup-btn').click();
            $('#bx-admin-prefix:visible').find('.bx-core-popup-menu-item').eq(2).click();
            var file = td.find('input[name="<?=$pref?>FILE"][type="text"]:visible').last();
            if(file.length){
                file.val('<?=$arProfile['FILE']?>');
            }
        },100);  <?
    } ?>
    var arIBlocks = {},
        selectSections = '',
        selectColumns = <?=Json::encode($selectColumns)?>;
    <?= $jsIBlocks ?>
    function setPropertiesAndSections (IBLOCK_ID, IBLOCK_SECTION_ID_FOR_NEW, CONST_CODE, CONST_VALUE, CONST_ID){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: 'mcart_xls_ajax.php',
            data: {
                sessid: '<?=bitrix_sessid()?>',
                <?=$pref?>act: 'GetPropertiesAndSections',
                <?=$pref?>IBLOCK_ID: IBLOCK_ID
            }
        }).done(function(arResult){
            var selected;
            if(selectColumns.PROPERTIES){
                selectColumns.PROPERTIES.OPTIONS = '';
            }
            if(!arResult.RESULT){
                return;
            }
            if(arResult.PROPERTIES){
                for (var i = 0; i < arResult.PROPERTIES.length; i++) {
                    selectColumns.PROPERTIES.OPTIONS += '<option value="<?=ConstTable::SAVE_IN_PREF__PROPERTY?>_'+arResult.PROPERTIES[i]['ID']+'">'
                            +arResult.PROPERTIES[i]['NAME']+'</option>';
                }
            }
            $('form#mcart_xls_profile_edit_form .properties tbody').html('');
            selectSections = '<option value="0"></option>';
            if(arResult.SECTIONS){
                for (var i = 0; i < arResult.SECTIONS.length; i++) {
                    selected = '';
                    if(IBLOCK_SECTION_ID_FOR_NEW == arResult.SECTIONS[i]['ID']){
                        selected = ' selected="selected"';
                    }
                    selectSections += '<option value="'+arResult.SECTIONS[i]['ID']+'"'+selected+'>'+arResult.SECTIONS[i]['NAME']+'</option>';
                }
            }
            $('form#mcart_xls_profile_edit_form select[name="<?=$pref?>IBLOCK_SECTION_ID_FOR_NEW"]').html(selectSections);
            if(CONST_CODE){
                var ob;
                for (var i = 0; i < CONST_CODE.length; i++) {
                    ob = $(
                        '<tr class="const_row">'+
                            '<td>'+
                                '<input type="hidden" name="<?=$pref?>CONST_ID[]" value="'+CONST_ID[i]+'" />'+
                                '<input type="text" name="<?=$pref?>CONST_VALUE[]" value="'+CONST_VALUE[i]+'" />'+
                            '</td>'+
                            '<td><select name="<?=$pref?>CONST_CODE[]">'+
                                 '<optgroup label="'+selectColumns.FIELDS.NAME+'">'+selectColumns.FIELDS.OPTIONS+'</optgroup>'+
                                 '<optgroup label="'+selectColumns.PROPERTIES.NAME+'">'+selectColumns.PROPERTIES.OPTIONS+'</optgroup>'+
                                 '<optgroup label="'+selectColumns.CATALOG.NAME+'">'+selectColumns.CATALOG.OPTIONS+'</optgroup>'+
                            '</select></td>'+
                            '<td><button class="const_del" type="button">x</button></td>'+
                        '<tr>'
                    );
                    ob.find('option[value="'+CONST_CODE[i]+'"]').prop('selected',true);
                    $('form#mcart_xls_profile_edit_form .properties tbody').append(ob);
                }
            }
        });
    }
    setPropertiesAndSections('<?=$arProfile['IBLOCK_ID']?>', '<?=$arProfile['IBLOCK_SECTION_ID_FOR_NEW']?>'<?
        if (!empty($arProfile['CONST_CODE'])) {
            echo ', '.Json::encode($arProfile['CONST_CODE']);
            if (!empty($arProfile['CONST_VALUE'])) {
                echo ', '.Json::encode($arProfile['CONST_VALUE']);
                echo ', '.intval($arProfile['CONST_ID']);
            }
        } ?>);
    $('form#mcart_xls_profile_edit_form').on('change', 'select[name="<?=$pref?>IBLOCK_ID"]', function(){
        setPropertiesAndSections($(this).val());
    });
    $('form#mcart_xls_profile_edit_form select[name="<?=$pref?>IBLOCK_TYPE_ID"]').change(function(){
        var val = $(this).val(),
            str = arIBlocks[val];
        if(str == undefined){
            str = '';
        }
        $('form#mcart_xls_profile_edit_form .IBLOCK_ID').html(str);
        $('form#mcart_xls_profile_edit_form .properties tbody').html('');
        $('form#mcart_xls_profile_edit_form select[name="<?=$pref?>IBLOCK_ID"]').change();
    });

    $('form#mcart_xls_profile_edit_form .properties').on('click', 'button.const_add', function(){
        $('form#mcart_xls_profile_edit_form .properties tbody').append(
               '<tr class="const_row"><td><input type="text" name="<?=$pref?>CONST_VALUE[]" /></td>'+
               '<td><select name="<?=$pref?>CONST_CODE[]">'+
                    '<optgroup label="'+selectColumns.FIELDS.NAME+'">'+selectColumns.FIELDS.OPTIONS+'</optgroup>'+
                    '<optgroup label="'+selectColumns.PROPERTIES.NAME+'">'+selectColumns.PROPERTIES.OPTIONS+'</optgroup>'+
                    '<optgroup label="'+selectColumns.CATALOG.NAME+'">'+selectColumns.CATALOG.OPTIONS+'</optgroup>'+
               '</select></td>'+
               '<td><button class="const_del" type="button">x</button></td><tr>');
    });
    $('form#mcart_xls_profile_edit_form .properties').on('click', 'button.const_del', function(){
        $(this).closest('tr').remove();
    });

    $('form#mcart_xls_profile_edit_form').submit(function(){
        var ob = $(this),
            obFile = ob.find('input[name="<?=$pref?>FILE"]:visible'),
            fileType = obFile.attr('type'),
            fileVal = '',
            div = obFile.closest('.adm-input-file-control');

        if(ob.find('input[name="<?=$pref?>NAME"]').val()==''){
            return obMcarXls.formAlertError('<?=Loc::getMessage("MCART_XLS_PROFILE_ERROR_NAME")?>');
        }
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
            return obMcarXls.formAlertError('<?=Loc::getMessage("MCART_XLS_PROFILE_ERROR_FILE")?>');
        }
        if(ob.find('input[name="<?=$pref?>IBLOCK_ID"]').val()==''){
            return obMcarXls.formAlertError('<?=Loc::getMessage("MCART_XLS_PROFILE_ERROR_IBLOCK_ID")?>');
        }
    });
});
</script>
<?
//--------------------------//
include_once 'inc/profile_edit.css.php';
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/epilog_admin.php');