<?php

namespace Mcart\Xls\ORM\Profile\Column;

use Bitrix\Main\Entity;
use Bitrix\Main\Localization\Loc;
use Exception;
use Mcart\Xls\Handler\Handlers;

Loc::loadMessages(__FILE__);

/**
 * Class CustomFieldsTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> COLUMN_ID int mandatory
 * <li> HANDLER string(8) mandatory
 * <li> NAME string(255) mandatory
 * <li> VALUE string mandatory
 * </ul>
 *
 * @package Bitrix\Xls
 **/
class CustomFieldsTable extends Entity\DataManager {

    /**
     * Returns DB table name for entity
     *
     * @return string
     */
    public static function getTableName() {
        return 'mcart_xls_profile_column_custom_fields';
    }

    /**
     * Returns entity map definition
     *
     * @return array
     */
    public static function getMap() {
        $loc_pref = 'MCART_XLS_PROFILE_COLUMN_CUSTOM_FIELDS_';
        return [
            new Entity\IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true
            ]),
            new Entity\IntegerField('COLUMN_ID', [
                'required' => true,
                'title' => Loc::getMessage($loc_pref.'COLUMN_ID')
            ]),
            new Entity\ReferenceField(
                'COLUMN',
                'Mcart\Xls\ORM\Profile\Column',
                ['=this.COLUMN_ID' => 'ref.ID']
            ),
            new Entity\EnumField('HANDLER', [
                'required' => false,
                'title' => Loc::getMessage($loc_pref.'HANDLER'),
                'values' => Handlers::getHandlerValues(),
            ]),
            new Entity\StringField('NAME', [
                'required' => true,
                'title' => Loc::getMessage($loc_pref.'NAME')
            ]),
            new Entity\TextField('VALUE', [
                'required' => false,
                'title' => Loc::getMessage($loc_pref.'VALUE')
            ]),
        ];
    }

    public static function saveCustomFieldsForHandlerNull(int $profileColumnId, array $arValues){
        if($profileColumnId <= 0 || !is_array($arValues)){
            return;
        }
        foreach ($arValues as $k => $ar) {
            $handlerCode =  trim((string)filter_var($ar['HANDLER']));
            if (!empty($handlerCode)) {
                continue;
            }
            $ar['NAME'] = trim((string)filter_var($ar['NAME']));
            if (empty($ar['NAME'])) {
                continue;
            }
            $ar['VALUE'] = trim((string)filter_var($ar['VALUE']));
            if (empty($ar['VALUE'])) {
                continue;
            }
            $arNames[] = $ar['NAME'];
            $arFields = [
                'COLUMN_ID' => $profileColumnId,
                'HANDLER' => '',
                'NAME' => $ar['NAME'],
                'VALUE' => $ar['VALUE'],
            ];
            $arCustomField = CustomFieldsTable::getList([
                'filter' => ['=COLUMN_ID' => $profileColumnId, '=HANDLER' => '', '=NAME' => $ar['NAME']]
            ])->fetch();
            if ($arCustomField['ID'] > 0) {
                $result = CustomFieldsTable::update($arCustomField['ID'], $arFields);
            }else{
                $result = CustomFieldsTable::add($arFields);
            }
            if (!$result->isSuccess()) {
                throw new Exception ('<pre>'.print_r($result->getErrorMessages(), true).'<pre>');
            }
        }
        $ob = CustomFieldsTable::getList([
            'filter' => ['=COLUMN_ID' => $profileColumnId, '=HANDLER' => '', '!@NAME' => $arNames]
        ]);
        while ($arCustomField = $ob->fetch()) {
            CustomFieldsTable::delete($arCustomField['ID']);
        }
    }

}
