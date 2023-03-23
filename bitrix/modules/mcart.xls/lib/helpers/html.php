<?php

namespace Mcart\Xls\Helpers;

use Bitrix\Main\Localization\Loc;
use function htmlspecialcharsEx;
use function ShowJSHint;

Loc::loadMessages(__FILE__);

final class Html {
    public $css_class_tr;
    public $css_class_required;
    public $css_class_td_title;
    public $css_class_td_value;

    public function __construct(
        $css_class_tr = 'row',
        $css_class_required = 'input_required',
        $css_class_td_title = 'input_title',
        $css_class_td_value = 'input_value'
    ) {
        $this->css_class_tr = filter_var((string)$css_class_tr, FILTER_SANITIZE_STRING);
        $this->css_class_required = filter_var((string)$css_class_required, FILTER_SANITIZE_STRING);
        $this->css_class_td_title = filter_var((string)$css_class_td_title, FILTER_SANITIZE_STRING);
        $this->css_class_td_value = filter_var((string)$css_class_td_value, FILTER_SANITIZE_STRING);
    }

    public static function showInputsHidden($pref, $k, $v) {
         if(!is_array($v)){ ?>
            <input type="hidden" name="<?=$pref.$k?>" value="<?=$v?>"><?
             return;
        }
        foreach ($v as $k2 => $v2) {
            self::showInputsHidden($pref, $k.'['.$k2.']', $v2);
        }
    }

    /**
     * Возвращает строку таблицы формы.
     * В первой ячейке название, во второй - поле ввода.
     *
     * @param string $title         Название
     * @param string $tooltip       Описание
     * @param boolean $isRequired   Обязательное ли
     * @param string $type          text | boolean | select | select_iblock
     * @param array $inputOptions   ['name' => 'field_name', 'value' => 'field_value', 'type' => 'text', 'size' => '50']
     * @param array $td1_options    ['width' => '40%']
     * @param array $td2_options    ['width' => '60%']
     * @return string
     */
    public function getRowInput(
        $title = '',
        $tooltip = '',
        $isRequired = false,
        $type = 'text',
        $inputOptions = [],
        $td1_options = [],
        $td2_options = []
    ) {
        if(
            ($type!='select_iblock' && empty($inputOptions['name'])) ||
            ($type=='select_iblock' && (empty($inputOptions['iblock_id']['name']) || empty($inputOptions['iblock_type_id']['name'])))
        ){
            return '';
        }
        $title = htmlspecialchars((string)$title, ENT_QUOTES | ENT_HTML401);
        $tooltip = htmlspecialchars((string)$tooltip, ENT_QUOTES | ENT_HTML401);
        $isRequired = intval($isRequired);
        $css_class_tr = $this->css_class_tr;
        if($isRequired){
            $css_class_tr .= ' '.$this->css_class_required;
        }

        $html = '<tr';
        if(!empty($css_class_tr)){
            $html .= ' class="'.$css_class_tr.'"';
        }
        $html .= '><td class="'.$this->css_class_td_title.'"';
        foreach ($td1_options as $k => $v) {
            $html .= ' '.$k.'="'.htmlspecialchars($v).'"';
        }
        $html .= '>'.ShowJSHint($tooltip, ['return' => true]).$title.'</td>'
            .'<td class="'.$this->css_class_td_value.'"';
        foreach ($td2_options as $k => $v) {
            $html .= ' '.$k.'="'.htmlspecialchars($v).'"';
        }
        $html .= '>';
        switch ($type) {
            case 'boolean':
                $html .= $this->getInputBoolean($inputOptions);
                break;
            case 'select';
                $html .= $this->getInputSelect($inputOptions);
                break;
            case 'select_iblock';
                $html .= $this->getSelectIblock($inputOptions);
                break;
            default: // text | hidden
                $html .= $this->getInputText($inputOptions);
                break;
        }
        $html .= '</td></tr>';


        return $html;
    }

    /**
     *
     * @param array $inputOptions ['name' => 'field_name', 'value' => 'field_value', 'type' => 'text', 'size' => '50']
     * @return string
     */
    public function getInputText($inputOptions) {
        if(empty($inputOptions['name'])){
            return '';
        }
        if(empty($inputOptions['type'])){
            $inputOptions['type'] = 'text';
        }
        $html .= '<input';
        foreach ($inputOptions as $k => $v) {
            $html .= ' '.$k.'="'.htmlspecialchars($v).'"';
        }
        $html .= ' />';
        return $html;
    }

    /**
     *
     * @param array $inputOptions ['name' => 'field_name', 'value' => 'field_value', 'type' => 'text', 'size' => '50']
     * @return string
     */
    public function getInputBoolean($inputOptions) {
        if(empty($inputOptions['name'])){
            return '';
        }
        $name = htmlspecialchars($inputOptions['name']);
        $html = '<input type="hidden" name="'.$name.'" value="N" />'
            .'<input type="checkbox" value="Y" name="'.$name.'" ';
        if($inputOptions['value']=='Y'){
            $html .= ' checked';
        }
        foreach ($inputOptions as $k => $v) {
            if($k == 'value' || $k == 'name'){
                continue;
            }
            $html .= ' '.$k.'="'.htmlspecialchars($v).'"';
        }
        $html .= ' />';
        return $html;
    }

    /**
     *
     * @param array $inputOptions Example: <pre>
     *  [
     *      'name' => 'field_name',
     *      'selected' => ['k2'],
     *      'options' => [
     *          ['ID' => 'k1','NAME' => 'v1'],
     *          ['ID' => 'k2','NAME' => 'v2']
     *      ],
     *      'options_as_key_value' => false,
     *      'option_key_for_value' => 'ID',
     *      'option_key_for_name' => 'NAME',
     *      'multiple' => 'multiple',
     *      'as_checkbox_or_radio' => false,
     *  ]
     * </pre>
     * @return string
     */
    public function getInputSelect($inputOptions) {
        if(empty($inputOptions['name'])){
            return '';
        }
        $inputOptions['as_checkbox_or_radio'] = intval($inputOptions['as_checkbox_or_radio']);
        if (!is_array($inputOptions['selected'])) {
            $inputOptions['selected'] = empty($inputOptions['selected'])? [] : [(string)$inputOptions['selected']];
        }
        if (empty($inputOptions['option_key_for_value'])) {
            $inputOptions['option_key_for_value'] = 'ID';
        }
        if (empty($inputOptions['option_key_for_name'])) {
            $inputOptions['option_key_for_name'] = 'NAME';
        }
        $inputOptions['options_as_key_value'] = ($inputOptions['options_as_key_value']===true);
        $arExclude = [
            'selected',
            'options',
            'option_key_for_value',
            'option_key_for_name',
            'options_as_key_value',
            'as_checkbox_or_radio'
        ];
        if($inputOptions['as_checkbox_or_radio']){
            $arExclude[] = 'name';
            $html = '<div ';
        }else{
            $html = '<select ';
        }
        foreach ($inputOptions as $k => $v) {
            if(in_array($k, $arExclude)){
                continue;
            }
            $html .= ' '.$k.'="'.htmlspecialchars($v).'"';
        }
        $html .= '>';
        if($inputOptions['as_checkbox_or_radio']){
            $k = '';
            $v = Loc::getMessage('MCART_XLS_LIST_EMPTY');
            $type = ($inputOptions['multiple']=='multiple'?'checkbox':'radio');
            $id = $inputOptions['name'].$k;
            $html .= '<div class="label">'
                . '<input type="'.$type.'" name="'.$inputOptions['name'].'" value="'.$k.'" id="'.$id.'" '
                    .(in_array($k, $inputOptions['selected'])?'checked':'').' /> '
                . '<label for="'.$id.'">&nbsp;<i>'.$v.'</i></label>'
                . '</div>';
        }
        foreach ($inputOptions['options'] as $key => $ar) {
            if($inputOptions['options_as_key_value']){
                $k = htmlspecialcharsEx($key);
                $v = htmlspecialcharsEx($ar);
            }else{
                $k = htmlspecialcharsEx($ar[$inputOptions['option_key_for_value']]);
                $v = htmlspecialcharsEx($ar[$inputOptions['option_key_for_name']]);
            }

            if(!$inputOptions['as_checkbox_or_radio']){
                $html .= '<option';
                if(in_array($k, $inputOptions['selected'])){
                    $html .= ' selected="selected"';
                }
                $html .= ' value="'.$k.'">'.$v.'</option>';
                continue;
            }
            $id = $inputOptions['name'].$k;
            $html .= '<div class="label">'
                . '<input type="'.$type.'" name="'.$inputOptions['name'].'" value="'.$k.'" id="'.$id.'" '
                    .(in_array($k, $inputOptions['selected'])?'checked':'').' /> '
                . '<label for="'.$id.'">&nbsp;'.$v.'</label>'
                . '</div>';
        }
        if($inputOptions['as_checkbox_or_radio']){
            $html .= '</div>';
        }else{
            $html .= '</select>';
        }

        return $html;
    }

    /**
     *
     * @param array $inputOptions Example: <pre>
     *  [
     *      'arIBlocksByTypes' => [
     *          [
     *              'IBLOCK_TYPE_ID' => 'catalog',
     *              'IBLOCK_TYPE_NAME' => 'Catalog',
     *              'IBlocks' => [
     *                  ['ID' => '1','NAME' => 'Products1'],
     *                  ['ID' => '2','NAME' => 'Products2']
     *              ],
     *          ],
     *          [
     *              'IBLOCK_TYPE_ID' => 'news',
     *              'IBLOCK_TYPE_NAME' => 'News',
     *              'IBlocks' => [],
     *          ]
     *      ],
     *      'iblock_type_id' => ['name' => 'IBLOCK_TYPE_ID', 'selected' => 'catalog'],
     *      'iblock_id' => ['name' => 'IBLOCK_ID', 'selected' => 1],
     *      'isDisabled' => false,
     *      'selectorJquery' => '#adm-workarea'
     *  ]
     * </pre>
     * @return string
     */
    public function getSelectIblock($inputOptions) {
        if (empty($inputOptions['arIBlocksByTypes']) || !is_array($inputOptions['arIBlocksByTypes'])) {
            return '';
        }
        if(
            !array_key_exists(0, $inputOptions['arIBlocksByTypes']) &&
            !array_key_exists('', $inputOptions['arIBlocksByTypes'])
        ){
            array_unshift($inputOptions['arIBlocksByTypes'], ['IBLOCK_TYPE_ID' => '', 'IBLOCK_TYPE_NAME' => '', 'IBlocks' => []]);
        }
        $iblock_type_id_name = (string)$inputOptions['iblock_type_id']['name'];
        if (empty($iblock_type_id_name)) {
            $iblock_type_id_name = 'IBLOCK_TYPE_ID';
        }
        $iblock_id_name = (string)$inputOptions['iblock_id']['name'];
        if (empty($iblock_id_name)) {
            $iblock_id_name = 'IBLOCK_ID';
        }
        $iblock_type_id_selected = (string)$inputOptions['iblock_type_id']['selected'];
        $iblock_id_selected = intval($inputOptions['iblock_id']['selected']);
        $isDisabled = ($inputOptions['isDisabled']===true);
        $selectorJquery = (string)$inputOptions['selectorJquery'];

        $disabled = ($isDisabled? ' disabled ' : '');
        $html = '<select class="IBLOCK_TYPE_ID" name="'.$iblock_type_id_name.'" '.$disabled.'>';
        $jsIBlocks = '';
        $optionsIBlock = '';
        foreach ($inputOptions['arIBlocksByTypes'] as $arIBlockType) {
            if (!empty($arIBlockType['IBLOCK_TYPE_ID']) && empty($arIBlockType['IBlocks'])) {
                continue;
            }
            $name = '';
            if (!empty($arIBlockType['IBLOCK_TYPE_ID'])) {
                $name = '['.$arIBlockType['IBLOCK_TYPE_ID'].'] '.$arIBlockType['IBLOCK_TYPE_NAME'];
            }
            $html .= '<option value="'.$arIBlockType['IBLOCK_TYPE_ID'].'" '
                . ($arIBlockType['IBLOCK_TYPE_ID'] == $iblock_type_id_selected?' selected="selected"':'').'>'
                . $name.'</option>';
            if (empty($arIBlockType['IBLOCK_TYPE_ID'])) {
                continue;
            }
            $str = '';
            foreach ($arIBlockType['IBlocks'] as $arIBlock) {
                $str .= '<option value="'.$arIBlock['ID'].'">['.$arIBlock['ID'].'] '.$arIBlock['NAME'].'</option>';
                if($arIBlockType['IBLOCK_TYPE_ID'] == $iblock_type_id_selected){
                    $optionsIBlock .= '<option value="'.$arIBlock['ID'].'" '
                        .($arIBlock['ID'] == $iblock_id_selected?' selected="selected"':'')
                        .'>['.$arIBlock['ID'].'] '.$arIBlock['NAME'].'</option>';
                }
            }
            if(!$isDisabled){
                $jsIBlocks .= "arIBlocks['".$arIBlockType['IBLOCK_TYPE_ID']."'] = '<select name=\"".$iblock_id_name."\">$str</select>';\n";
            }
        }
        $html .= '</select><span class="IBLOCK_ID">';
        if (!empty($optionsIBlock)) {
            $html .= '<select name="'.$iblock_id_name.'"'.$disabled.'>'.$optionsIBlock.'</select>';
        }
        $html .=  '</span>';
        if(!$isDisabled){
            $html .=  '<script type="text/javascript">
                $(function() {
                    var arIBlocks = {};
                   '.$jsIBlocks.'
                    $(\''.$selectorJquery.' select[name="'.$iblock_type_id_name.'"]\').change(function(){
                        var val = $(this).val(),
                            str = arIBlocks[val];
                        if(str == undefined){
                            str = "";
                        }
                        $(\''.$selectorJquery.' .IBLOCK_ID\').html(str);
                        $(\''.$selectorJquery.' select[name="'.$iblock_id_name.'"]\').change();
                    });
                });
                </script>';
        }
        return $html;
    }
}
