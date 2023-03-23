<?php

namespace Acrit\Import;

use Bitrix\Main,
    Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

/**
 * Class ProfileTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> ACTIVE bool optional default 'Y'
 * <li> NAME string(100) optional
 * <li> CODE string(100) optional
 * <li> DESCRIPTION string(255) optional
 * <li> ENCODING string(100) optional
 * <li> TYPE string(50) optional
 * <li> TIMESTAMP_X datetime mandatory default 'CURRENT_TIMESTAMP'
 * <li> START_LAST_TIME datetime optional
 * <li> IBLOCK_ID int mandatory
 * <li> DEFAULT_SECTION_ID int optional
 * <li> SOURCE string(255) mandatory
 * <li> SOURCE_TYPE string(255) optional
 * <li> SOURCE_LOGIN string(255) optional
 * <li> SOURCE_KEY string(255) optional
 * <li> SOURCE_DELIMITER string(255) optional
 * <li> SOURCE_ROOT_LEVEL int mandatory
 * <li> SOURCE_ROOT_ITEM string(255) mandatory
 * <li> SOURCE_PARAM_1 string(255) optional
 * <li> SOURCE_PARAM_2 string(255) optional
 * <li> SOURCE_PARAM_3 text optional
 * <li> ELEMENT_IDENTIFIER string(255) mandatory
 * <li> IMGS_SOURCE_TYPE string(50) mandatory
 * <li> IMGS_SOURCE_PATH string(255) mandatory
 * <li> ACTIONS_NOT_IN_FILE string(50) mandatory
 * <li> ACTIONS_NEW_ELEMENTS string(50) mandatory
 * <li> ACTIONS_EXIST_ELEMENTS string(50) mandatory
 * <li> ACTIONS_PRICE_NULL bool optional default 'N'
 * <li> ACTIONS_AMOUNT_NULL bool optional default 'N'
 * <li> ACTIONS_SECTIONS_LINK string(50) mandatory
 * <li> ACTIONS_SECTIONS_CREATE bool optional default 'Y'
 * <li> ACTIONS_IB_IMG_MODIF bool optional default 'N'
 * <li> SCHEDULE_DURATION int mandatory
 * <li> SCHEDULE_PERIOD int mandatory
 * </ul>
 *
 * @package Bitrix\Import
 **/

class ProfileTable extends Main\Entity\DataManager
{
    /**
     * Returns DB table name for entity.
     *
     * @return string
     */
    public static function getTableName()
    {
        return 'acrit_import_profile';
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
                'title' => Loc::getMessage('PROFILE_ENTITY_ID_FIELD'),
            ),
            'ACTIVE' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIVE_FIELD'),
            ),
            'NAME' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateName'),
                'title' => Loc::getMessage('PROFILE_ENTITY_NAME_FIELD'),
            ),
            'CODE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateCode'),
                'title' => Loc::getMessage('PROFILE_ENTITY_CODE_FIELD'),
            ),
            'DESCRIPTION' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateDescription'),
                'title' => Loc::getMessage('PROFILE_ENTITY_DESCRIPTION_FIELD'),
            ),
            'ENCODING' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateEncoding'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ENCODING_FIELD'),
            ),
            'TYPE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateType'),
                'title' => Loc::getMessage('PROFILE_ENTITY_TYPE_FIELD'),
            ),
            'TIMESTAMP_X' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('PROFILE_ENTITY_TIMESTAMP_X_FIELD'),
            ),
            'START_LAST_TIME' => array(
                'data_type' => 'datetime',
                'title' => Loc::getMessage('PROFILE_ENTITY_START_LAST_TIME_FIELD'),
            ),
            'IBLOCK_ID' => array(
                'data_type' => 'integer',
                'required' => true,
                'title' => Loc::getMessage('PROFILE_ENTITY_IBLOCK_ID_FIELD'),
            ),
            'DEFAULT_SECTION_ID' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('PROFILE_ENTITY_DEFAULT_SECTION_ID_FIELD'),
            ),
            'SOURCE' => array(
                'data_type' => 'string',
                'required' => true,
                'validation' => array(__CLASS__, 'validateSource'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_FIELD'),
            ),
            'SOURCE_TYPE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSourceType'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_TYPE_FIELD'),
            ),
            'SOURCE_LOGIN' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSourceLogin'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_LOGIN_FIELD'),
            ),
            'SOURCE_KEY' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSourceKey'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_KEY_FIELD'),
            ),
            'SOURCE_DELIMITER' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSourceDelimiter'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_DELIMITER_FIELD'),
            ),
            'SOURCE_ROOT_LEVEL' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_ROOT_LEVEL_FIELD'),
            ),
            'SOURCE_ROOT_ITEM' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSourceRootItem'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_ROOT_ITEM_FIELD'),
            ),
            'SOURCE_PARAM_1' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSourceParam1'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_PARAM_1_FIELD'),
            ),
            'SOURCE_PARAM_2' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateSourceParam2'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_PARAM_2_FIELD'),
            ),
            'SOURCE_PARAM_3' => array(
                'data_type' => 'string',
                'save_data_modification' => array(__CLASS__, 'saveModFieldParam3'),
                'fetch_data_modification' => array(__CLASS__, 'fetchModFieldParam3'),
                'title' => Loc::getMessage('PROFILE_ENTITY_SOURCE_PARAM_3_FIELD'),
            ),
            'ELEMENT_IDENTIFIER' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateElementIdentifier'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ELEMENT_IDENTIFIER_FIELD'),
            ),
            'IMGS_SOURCE_TYPE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateImgsSourceType'),
                'title' => Loc::getMessage('PROFILE_ENTITY_IMGS_SOURCE_TYPE_FIELD'),
            ),
            'IMGS_SOURCE_PATH' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateImgsSourcePath'),
                'title' => Loc::getMessage('PROFILE_ENTITY_IMGS_SOURCE_PATH_FIELD'),
            ),
            'ACTIONS_NOT_IN_FILE' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateActionsNotInFile'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIONS_NOT_IN_FILE_FIELD'),
            ),
            'ACTIONS_NEW_ELEMENTS' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateActionsNewElements'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIONS_NEW_ELEMENTS_FIELD'),
            ),
            'ACTIONS_EXIST_ELEMENTS' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateActionsExistElements'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIONS_EXIST_ELEMENTS_FIELD'),
            ),
            'ACTIONS_PRICE_NULL' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIONS_PRICE_NULL_FIELD'),
            ),
            'ACTIONS_AMOUNT_NULL' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIONS_AMOUNT_NULL_FIELD'),
            ),
            'ACTIONS_SECTIONS_LINK' => array(
                'data_type' => 'string',
                'validation' => array(__CLASS__, 'validateActionsSectionsLink'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIONS_SECTIONS_LINK_FIELD'),
            ),
            'ACTIONS_SECTIONS_CREATE' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIONS_SECTIONS_CREATE_FIELD'),
            ),
            'ACTIONS_IB_IMG_MODIF' => array(
                'data_type' => 'boolean',
                'values' => array('N', 'Y'),
                'title' => Loc::getMessage('PROFILE_ENTITY_ACTIONS_IB_IMG_MODIF_FIELD'),
            ),
            'SCHEDULE_DURATION' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('PROFILE_ENTITY_SCHEDULE_DURATION_FIELD'),
            ),
            'SCHEDULE_PERIOD' => array(
                'data_type' => 'integer',
                'title' => Loc::getMessage('PROFILE_ENTITY_SCHEDULE_PERIOD_FIELD'),
            ),
        );
    }
    /**
     * Returns validators for NAME field.
     *
     * @return array
     */
    public static function validateName()
    {
        return array(
            new Main\Entity\Validator\Length(null, 100),
        );
    }
    /**
     * Returns validators for CODE field.
     *
     * @return array
     */
    public static function validateCode()
    {
        return array(
            new Main\Entity\Validator\Length(null, 100),
        );
    }
    /**
     * Returns validators for DESCRIPTION field.
     *
     * @return array
     */
    public static function validateDescription()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for ENCODING field.
     *
     * @return array
     */
    public static function validateEncoding()
    {
        return array(
            new Main\Entity\Validator\Length(null, 100),
        );
    }
    /**
     * Returns validators for TYPE field.
     *
     * @return array
     */
    public static function validateType()
    {
        return array(
            new Main\Entity\Validator\Length(null, 50),
        );
    }
    /**
     * Returns validators for SOURCE field.
     *
     * @return array
     */
    public static function validateSource()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SOURCE_TYPE field.
     *
     * @return array
     */
    public static function validateSourceType()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SOURCE_LOGIN field.
     *
     * @return array
     */
    public static function validateSourceLogin()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SOURCE_KEY field.
     *
     * @return array
     */
    public static function validateSourceKey()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SOURCE_DELIMITER field.
     *
     * @return array
     */
    public static function validateSourceDelimiter()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SOURCE_ROOT_ITEM field.
     *
     * @return array
     */
    public static function validateSourceRootItem()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SOURCE_PARAM_1 field.
     *
     * @return array
     */
    public static function validateSourceParam1()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for SOURCE_PARAM_2 field.
     *
     * @return array
     */
    public static function validateSourceParam2()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for ELEMENT_IDENTIFIER field.
     *
     * @return array
     */
    public static function validateElementIdentifier()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for IMGS_SOURCE_TYPE field.
     *
     * @return array
     */
    public static function validateImgsSourceType()
    {
        return array(
            new Main\Entity\Validator\Length(null, 50),
        );
    }
    /**
     * Returns validators for IMGS_SOURCE_PATH field.
     *
     * @return array
     */
    public static function validateImgsSourcePath()
    {
        return array(
            new Main\Entity\Validator\Length(null, 255),
        );
    }
    /**
     * Returns validators for ACTIONS_NOT_IN_FILE field.
     *
     * @return array
     */
    public static function validateActionsNotInFile()
    {
        return array(
            new Main\Entity\Validator\Length(null, 50),
        );
    }
    /**
     * Returns validators for ACTIONS_NEW_ELEMENTS field.
     *
     * @return array
     */
    public static function validateActionsNewElements()
    {
        return array(
            new Main\Entity\Validator\Length(null, 50),
        );
    }
    /**
     * Returns validators for ACTIONS_EXIST_ELEMENTS field.
     *
     * @return array
     */
    public static function validateActionsExistElements()
    {
        return array(
            new Main\Entity\Validator\Length(null, 50),
        );
    }
    /**
     * Returns validators for ACTIONS_SECTIONS_LINK field.
     *
     * @return array
     */
    public static function validateActionsSectionsLink()
    {
        return array(
            new Main\Entity\Validator\Length(null, 50),
        );
    }

    public static function onAfterUpdate(Main\Entity\Event $event)
    {
        $result = new Main\Entity\EventResult;
        $arMainData = $event->getParameter("primary");
        $arChangeData = $event->getParameter("fields");
//        // Schedule
//        if ($arMainData['ID'] && $arChangeData['SCHEDULE_PERIOD']) {
//            \Acrit\Import\Agents::add($arMainData['ID'], $arChangeData['SCHEDULE_PERIOD'] * 60);
//        }

        return $result;
    }

    public static function saveModFieldParam3() {
	    return [
		    function ($value) {
			    return serialize($value);
		    }
	    ];
    }

    public static function fetchModFieldParam3() {
	    return [
		    function ($value) {
			    return unserialize($value);
		    }
	    ];
    }

//	public static function update($primary, array $data) {
//	    if ($data['SOURCE_PARAM_3']) {
//		    $data['SOURCE_PARAM_3'] = serialize($data['SOURCE_PARAM_3']);
//	    }
//	    return parent::update($primary, $data);
//    }
}
