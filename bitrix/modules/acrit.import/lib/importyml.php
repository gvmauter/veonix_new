<?php

namespace Acrit\Import;


class ImportYml extends ImportXml
{
    const SOURCE_ROOT_LEVEL = 4;
    const SOURCE_ROOT_ITEM = 'offer';
    const SOURCE_CATEG_LEVEL = 4;
    const SOURCE_CATEG_ITEM = 'category';

	public function fieldsPreParams() {
		return [];
	}

	public function getLinkMode() {
		return self::LINK_MODE_ORDER;
	}

	public function getIdentAttribs() {
		$arList = [
			'param_name',
		];
		return $arList;
	}

    function __construct($ID=0) {
        parent::__construct($ID);

        $this->arFieldsDefault = array(
            "yml_catalog_shop_offers_offer_1" => array(
                'ignore' => true,
            ),
            "yml_catalog_shop_offers_offer_1_id" => array(
                'name' => GetMessage("ACRIT_IMPORT_IDENTIFIKATOR_PREDLO"),
            ),
            "yml_catalog_shop_offers_offer_1_available" => array(
                'name' => GetMessage("ACRIT_IMPORT_STATUS_TOVARA"),
            ),
            "yml_catalog_shop_offers_offer_url_1" => array(
                'name' => 'URL '.GetMessage("ACRIT_IMPORT_STRANICY_TOVARA"),
            ),
            "yml_catalog_shop_offers_offer_name_1" => array(
	            'name' => GetMessage("ACRIT_IMPORT_NAZVANIE_PREDLOJENIA"),
            ),
            "yml_catalog_shop_offers_offer_picture_1" => array(
	            'name' => GetMessage("ACRIT_IMPORT_SSYLKA_NA_KARTINKU_T"),
            ),
            "yml_catalog_shop_offers_offer_price_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_AKTUALQNAA_CENA_TOVA"),
            ),
            "yml_catalog_shop_offers_offer_oldprice_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_STARAA_CENA_TOVARA"),
            ),
            "yml_catalog_shop_offers_offer_vat_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_STAVKA_NDS_DLA_TOVAR"),
            ),
            "yml_catalog_shop_offers_offer_currencyId_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_VALUTA"),
            ),
            "yml_catalog_shop_offers_offer_1_cbid" => array(
	            'name' => GetMessage("ACRIT_IMPORT_RAZMER_STAVKI_NA_KAR"),
            ),
            "yml_catalog_shop_offers_offer_1_bid" => array(
	            'name' => GetMessage("ACRIT_IMPORT_RAZMER_STAVKI_NA_OST"),
            ),
            "yml_catalog_shop_offers_offer_category_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_NAZVANIE_KATEGORII_T"),
            ),
            "yml_catalog_shop_offers_offer_categoryId_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_IDENTIFIKATOR_KATEGO"),
            ),
            "yml_catalog_shop_offers_offer_delivery_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_VOZMOJNOSTQ_KURQERSK"),
            ),
            "yml_catalog_shop_offers_offer_delivery-options_1" => array(
                'ignore' => true,
            ),
            "yml_catalog_shop_offers_offer_model_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_MODELQ_TOVARA"),
            ),
            "yml_catalog_shop_offers_offer_vendor_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_NAZVANIE_PROIZVODITE"),
            ),
            "yml_catalog_shop_offers_offer_vendorCode_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_KOD_PROIZVODITELA"),
            ),
            "yml_catalog_shop_offers_offer_country_of_origin_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_STRANA_PROIZVODSTVA"),
            ),
            "yml_catalog_shop_offers_offer_local_delivery_days_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_SROK_KURQERSKOY_DOST"),
            ),
            "yml_catalog_shop_offers_offer_local_delivery_cost_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_STOIMOSTQ_KURQERSKOY"),
            ),
            "yml_catalog_shop_offers_offer_pickup_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_VOZMOJNOSTQ_SAMOVYVO"),
            ),
            "yml_catalog_shop_offers_offer_store_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_VOZMOJNOSTQ_KUPITQ_T"),
            ),
            "yml_catalog_shop_offers_offer_description_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_OPISANIE_PREDLOJENIA"),
            ),
            "yml_catalog_shop_offers_offer_sales_notes_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_POMETKI"),
            ),
            "yml_catalog_shop_offers_offer_manufacturer_warranty_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_OFICIALQNAA_GARANTIA"),
            ),
            "yml_catalog_shop_offers_offer_adult_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_DLA_VZROSLYH"),
            ),
            "yml_catalog_shop_offers_offer_barcode_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_STRIHKOD"),
            ),
            "yml_catalog_shop_offers_offer_expiry_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_SROK_GODNOSTI_SROK"),
            ),
            "yml_catalog_shop_offers_offer_weight_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_VES_TOVARA"),
            ),
            "yml_catalog_shop_offers_offer_dimensions_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_GABARITY_TOVARA_V_UP"),
            ),
            "yml_catalog_shop_offers_offer_downloadable_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_PRODUKT_MOJNO_SKACAT"),
            ),
            "yml_catalog_shop_offers_offer_age_1" => array(
                'name' => GetMessage("ACRIT_IMPORT_VOZRASTNAA_KATEGORIA"),
            ),
            "yml_catalog_shop_offers_offer_1_group_id" => array(
                'name' => GetMessage("ACRIT_IMPORT_IDENTIFIKATOR_GRUPPY"),
            ),
        );
    }

    public function fields() {
        $arSourceFields = array();
        // List of main fields
        $arRows = $this->get(self::STEP_BY_COUNT, 1, 0, self::SOURCE_ROOT_LEVEL, self::SOURCE_ROOT_ITEM);
        $arRow = $arRows[0];
        // Default fields
        if (!empty($this->arFieldsDefault)) {
            foreach ($this->arFieldsDefault as $k => $arField) {
                if (!$arField['ignore']) {
                    $arSourceFields[$k] = array(
                        'ID' => $k,
                        'NAME' => $arField['name'],
                        'EXAMPLE' => '',
                    );
                }
            }
        }
        // Fields from source
        if (!empty($arRow)) {
            foreach ($arRow as $k => $value) {
                // Ignored fields
                if ($this->arFieldsDefault[$k]['ignore']) {
                    continue;
                }
//                // Name of params
//                if (strpos($k, 'yml_catalog_shop_offers_offer_param_') !== false && strpos($k, '_name')) {
//                    $arSourceFields[str_replace('_name', '', $k)]['NAME'] = $this->convStrEncoding($value);
//                    continue;
//                }
                // Name of params
                if (strpos($k, 'yml_catalog_shop_offers_offer_param_') !== false && strpos($k, '_name')) {
                    $arSourceFields[str_replace('_name', '', $k)]['NAME'] = $this->convStrEncoding($value);
                    continue;
                }
                // Name of delivery options
                if (strpos($k, 'yml_catalog_shop_offers_offer_delivery-options_option_') !== false) {
                    if (strpos($k, '_cost')) {
                        $arSourceFields[$k]['NAME'] = GetMessage("ACRIT_IMPORT_STOIMOSTQ_DOSTAVKI");
                    }
                    elseif (strpos($k, '_days')) {
                        $arSourceFields[$k]['NAME'] = GetMessage("ACRIT_IMPORT_SROK_DOSTAVKI_DNEY");
                    }
                    elseif (strpos($k, '_order-before')) {
                        $arSourceFields[$k]['NAME'] = GetMessage("ACRIT_IMPORT_VREMA_DO_KOTOROGO_N");
                    }
                    else {
                        continue;
                    }
                }
                // Name of other fields
                $ar = explode('_', $k);
                $key_base = '';
                for ($i = 0; $i < self::SOURCE_ROOT_LEVEL; $i++) {
                    $key_base .= $ar[$i] . '_';
                }
                $name = str_replace($key_base, '', $k);
                $name = str_replace('_', ' / ', $name);
                // Value example
                $example = '';
                if (trim($value)) {
                    $example = substr($value, 0, 10) . (strlen($value) > 10 ? '...' : '');
                }
                // Add field to the list
                $arSourceFields[$k]['ID'] = $k;
                if (!$arSourceFields[$k]['NAME']) {
                    $arSourceFields[$k]['NAME'] = $name;
                }
                $arSourceFields[$k]['EXAMPLE'] = $example;
            }
        }
        return $arSourceFields;
    }

    public function count() {
        $count = 0;
        $res = $this->find(function($i, $arRow, $arHierarchyCur, &$count) {
            $count++;
        }, $count, self::STEP_NO, 0, 0, self::SOURCE_ROOT_LEVEL, self::SOURCE_ROOT_ITEM, array(), 1);
        return $count;
    }

    public function get($type=self::STEP_NO, $limit=0, $next_item=0, $root_level=false, $root_node=false, $arRootPath=array(), $level_limit=0) {
	    $arRows = [];
	    $this->find(function($i, $arRow, $arHierarchyCur, &$arRows) {
		    // Category name
		    $arCRows = [];
		    if ($arRow['yml_catalog_shop_offers_offer_categoryId_1']) {
			    $this->find(function ($j, $arCRow, $arCHierarchyCur, &$arCRows) {
				    $arCRows[] = $arCRow;
			    }, $arCRows, self::STEP_NO, 0, 0, self::SOURCE_CATEG_LEVEL, self::SOURCE_CATEG_ITEM);
			    foreach ($arCRows as $arCRow) {
				    if ($arRow['yml_catalog_shop_offers_offer_categoryId_1'] == $arCRow['yml_catalog_shop_categories_category_1_id']) {
					    $arRow['yml_catalog_shop_offers_offer_category_1'] = $arCRow['yml_catalog_shop_categories_category_1'];
				    }
		        }
		    }
		    $arRows[] = $arRow;
	    }, $arRows, $type, $limit, $next_item, self::SOURCE_ROOT_LEVEL, self::SOURCE_ROOT_ITEM, $arRootPath, $level_limit);
	    return $arRows;
    }

    public function import($type=self::STEP_NO, $limit=0, $next_item=0) {
	    \CModule::IncludeModule('iblock');
	    $next_item = $this->find(function($i, $arRow, $arHierarchyCur, &$arRows) {
		    // Category name
		    $arCRows = [];
		    if ($arRow['yml_catalog_shop_offers_offer_categoryId_1']) {
			    $this->find(function ($j, $arCRow, $arCHierarchyCur, &$arCRows) {
				    $arCRows[] = $arCRow;
			    }, $arCRows, self::STEP_NO, 0, 0, self::SOURCE_CATEG_LEVEL, self::SOURCE_CATEG_ITEM);
			    foreach ($arCRows as $arCRow) {
				    if ($arRow['yml_catalog_shop_offers_offer_categoryId_1'] == $arCRow['yml_catalog_shop_categories_category_1_id']) {
					    $arRow['yml_catalog_shop_offers_offer_category_1'] = $arCRow['yml_catalog_shop_categories_category_1'];
				    }
			    }
		    }
		    // Import process
            $this->saveIBData($arRow, $i + 1);
	    }, $arRows, $type, $limit, $next_item, self::SOURCE_ROOT_LEVEL, self::SOURCE_ROOT_ITEM);
	    return $next_item;
    }

}