<?php

namespace Acrit\Import;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class ProfileFieldsTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> PARENT_ID int mandatory
 * <li> F_FIELD string(255) mandatory
 * <li> IB_FIELD string(255) mandatory
 * <li> PARAMS string optional
 * </ul>
 *
 * @package Bitrix\Import
 **/

class ProfileFieldsTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'acrit_import_profile_fields';
    }

    /**
     * Returns entity map definition.
     *
     * @return array
     */
    public static function getMap()
    {
        return array(
            'ID' => array(
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
                'title' => Loc::getMessage('PROFILE_FIELDS_ENTITY_ID_FIELD'),
            ),
            'PARENT_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('PROFILE_FIELDS_ENTITY_PARENT_ID_FIELD'),
            ),
            'F_FIELD' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateFField'),
                'title' => Loc::getMessage('PROFILE_FIELDS_ENTITY_F_FIELD_FIELD'),
            ),
            'IB_FIELD' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateIbField'),
                'title' => Loc::getMessage('PROFILE_FIELDS_ENTITY_IB_FIELD_FIELD'),
            ),
            'PARAMS' => array(
                'data_type' => 'text',
                'title' => Loc::getMessage('PROFILE_FIELDS_ENTITY_PARAMS_FIELD'),
                'save_data_modification' => array(__CLASS__, 'saveParams'),
                'fetch_data_modification' => array(__CLASS__, 'fetchParams'),
            ),
        );
    }
    /**
     * Returns validators for F_FIELD field.
     *
     * @return array
     */
    public static function validateFField()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for IB_FIELD field.
     *
     * @return array
     */
    public static function validateIbField()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }

    public static function saveParams()
    {
        return array(
            function ($value) {
                return base64_encode(serialize($value));
            }
        );
    }
    public static function fetchParams()
    {
        return array(
            function ($value) {
                return unserialize(base64_decode($value));
            }
        );
    }
}
