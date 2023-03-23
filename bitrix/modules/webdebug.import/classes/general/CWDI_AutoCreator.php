<?
Use \Bitrix\Iblock\PropertyIndex;
IncludeModuleLangFile(__FILE__);

class CWDI_AutoCreator {

	const LANG = 'WDI_AUTOCREATE_';

	protected $strHandler;
	protected $arHandler;
	protected $intIBlockId;
	protected $intOffersIBlockId;
	protected $arParams;

	protected static function getMessage($strPhrase, $arReplace=[]){
		return \Bitrix\Main\Localization\Loc::getMessage(static::LANG.$strPhrase, $arReplace);
	}
	
	public function __construct($strHandler, $intIBlockId, $arParams){
		$this->strHandler = $strHandler;
		$this->arHandler = $this->getHandlerArray();
		$this->intIBlockId = intVal($intIBlockId);
		$this->intOffersIBlockId = intVal(CWDI::getOffersIBlockID($intIBlockId));
		$this->arParams = $arParams;
	}

	public function process(){
		if(!\Bitrix\Main\Loader::includeModule('iblock')){
			return false;
		}
		$this->createProps();
		$obDate = new \Bitrix\Main\Type\Datetime;
		$arProfile = [
			'NAME' => $this->getHandlerParams()['SITE'],
			'ACTIVE' => 'Y',
			'SORT' => '100',
			'DESCRIPTION' => static::getMessage('PROFILE_DECSRIPTION'),
			'HANDLER' => $this->strHandler,
			'DATE_CREATED' => $obDate->toString(),
			'DATE_MODIFIED' => $obDate->toString(),
			'PARAMS' => $this->buildProfileParams(),
			'MATCHES' => $this->buildProfileMatches(),
		];
		$arProfile['PARAMS'] = serialize($arProfile['PARAMS']);
		$arProfile['MATCHES'] = serialize($arProfile['MATCHES']);
		CWDI_Profile::add($arProfile);
		return true;
	}

	/**
	 * MATCHES_*: FIELD => [PROPERTY_TYPE, MULTIPLE, SOURCE]
	 * PROPS: ID => [PROPERTY_TYPE, MULTIPLE, CODE, NAME, SOURCE, SOURCE_PARAMS]
	 */
	protected function getHandlerParams(){
		$arHandlerParams = [
			##################################################################################################################
			'GIFTS' => [
				'SITE' => 'gifts.ru',
				'PARAMS' => [
					'LOGIN' => $this->arParams['gifts_username'],
					'PASSWORD' => $this->arParams['gifts_password'],
				],
				'PROPS' => [
					'CODE' => ['S', 'N', 'CODE', 'Артикул', 'CODE'],
					'CODE_MAJOR' => ['S', 'N', 'CODE_MAJOR', 'Артикул группы', 'CODE_MAJOR'],
					5 => ['L', 'Y', 'MATERIAL', 'Материал', 'FILTER_5', ['multiple_separator' => 'semicolon']],
					6 => ['L', 'N', 'CAP_TYPE', 'Тип кепки', 'FILTER_6'],
					13 => ['L', 'N', 'BRAND', 'Бренд', 'BRAND'],
					19 => ['L', 'N', 'MEMORY', 'Объем памяти', 'FILTER_19'],
					21 => ['L', 'N', 'COLOR', 'Цвет', 'FILTER_21'],
					22 => ['L', 'N', 'DATING', 'Датировка', 'FILTER_22'],
					23 => ['L', 'N', 'GENDER', 'Пол', 'FILTER_23'],
					24 => ['L', 'N', 'CALENDARS', 'Календари', 'FILTER_24'],
					28 => ['L', 'N', 'PRINT_TYPE', 'Вид нанесения', 'FILTER_28'],
					#8 => ['L', 'N', 'SPECFILTER', 'Спецфильтр', ''],
					#29 => ['L', 'N', 'FORMAT', 'Формат', ''],
					#30 => ['L', 'N', 'PANTON', 'Panton', ''],
					#47 => ['L', 'N', 'COVER_TYPE', 'Тип обложки', ''],
					#53 => ['L', 'N', 'BLOCK_COLOR', 'Цвет блока', ''],
					#73 => ['L', 'N', 'MARKING', 'Подлежит маркировке', ''],
					#74 => ['L', 'N', 'BOX_SIZE', 'Размер коробки', ''],
					#76 => ['L', 'N', 'ELECTRO_CAPACITY', 'Емкость, мАч', ''],
					#77 => ['L', 'N', 'VOLUME', 'Объем, л', ''],
					#78 => ['L', 'N', 'CANVAS_SIZE', 'Размер полотна', ''],
					#80 => ['L', 'N', 'SHELF_LIFE', 'Срок годности', ''],
					#81 => ['L', 'N', 'BALL_DIAMETER', 'Диаметр шарика', ''],
					#83 => ['L', 'N', 'MARKING_STOCK', 'Маркировка остатков', ''],
				],
				'PROP_CALLBACK' => function($intPropExtId, $arProp){
					return sprintf('WDI_%s_%s', $this->strHandler, $arProp[2]);
				},
				'MATCHES' => [
					'S' => [
						'NAME' => ['S', 'N', 'NAME'],
					],
					'E' => [
						'NAME' => ['S', 'N', 'NAME'],
						'PREVIEW_TEXT' => ['S', 'N', 'CONTENT_NO_LINKS', ['html_type' => 'html']],
						'DETAIL_TEXT' => ['S', 'N', 'CONTENT_NO_LINKS', ['html_type' => 'html']],
						'PREVIEW_PICTURE' => ['S', 'N', 'BIG_IMAGE'],
						'DETAIL_PICTURE' => ['S', 'N', 'SUPER_BIG_IMAGE'],
						'CATALOG_PRICE_1' => ['N', 'N', 'STOCK_END_USER_PRICE'],
						'CATALOG_QUANTITY' => ['N', 'N', 'STOCK_AMOUNT'],
					],
					'O' => [
						'NAME' => ['S', 'N', 'NAME'],
						'PREVIEW_TEXT' => ['S', 'N', 'CONTENT_NO_LINKS', ['html_type' => 'html']],
						'DETAIL_TEXT' => ['S', 'N', 'CONTENT_NO_LINKS', ['html_type' => 'html']],
						'PREVIEW_PICTURE' => ['S', 'N', 'BIG_IMAGE'],
						'DETAIL_PICTURE' => ['S', 'N', 'SUPER_BIG_IMAGE'],
						'CATALOG_PRICE_1' => ['N', 'N', 'OFFER_PRICE'],
						'CATALOG_QUANTITY' => ['N', 'N', 'STOCK_AMOUNT'],
					],
				],
				'LINK_SOURCE' => [
					'S' => 'PAGE_ID',
					'E' => 'PRODUCT_ID',
					'O' => 'OFFER_PRODUCT_ID',
				],
			],
			##################################################################################################################
			'OASISCATALOG' => [
				'SITE' => 'oasiscatalog.com',
				'PARAMS' => [
					'APIKEY' => $this->arParams['oasis_apikey'],
				],
				'SHEET_PARAMS' => [
					'WAREHOUSES_TO_QUANTITY' => [
						'000000027' => 'Y',
						'000000029' => 'Y',
						'000000034' => 'Y',
						'000000039' => 'Y',
						'1-0000034' => 'Y',
					],
				],
				'PROPS' => [
					'ARTICLE' => ['S', 'N', 'ARTICLE', 'Артикул', 'ARTICLE'],
					'besprovodnaya_peredacha' => ['L', 'N', 'BESPROVODNAYA_PEREDACHA', 'Беспроводная передача', 'ATTRIBUTE_besprovodnaya_peredacha'],
					'versiya_bluetooth' => ['L', 'N', 'VERSIYA_BLUETOOTH', 'Версия Bluetooth®', 'ATTRIBUTE_versiya_bluetooth'],
					'ves' => ['S', 'N', 'VES', 'Вес', 'ATTRIBUTE_ves'],
					'vid_zastezhki' => ['L', 'N', 'VID_ZASTEZHKI', 'Вид застежки', 'ATTRIBUTE_vid_zastezhki'],
					'vid_mekhanizma' => ['L', 'N', 'VID_MEKHANIZMA', 'Вид механизма', 'ATTRIBUTE_vid_mekhanizma'],
					'vmestimost' => ['L', 'N', 'VMESTIMOST', 'Вместимость', 'ATTRIBUTE_vmestimost'],
					'vodozashchita' => ['L', 'N', 'VODOZASHCHITA', 'Водозащита', 'ATTRIBUTE_vodozashchita'],
					'vodostoykost' => ['L', 'N', 'VODOSTOYKOST', 'Водостойкость', 'ATTRIBUTE_vodostoykost'],
					'vozmozhnost_zameny_sterzhnya_kartridzha' => ['L', 'N', 'VOZMOZHNOST_ZAMENY_STERZHNYA_KARTRIDZHA', 'Возможность замены стержня/картриджа', 'ATTRIBUTE_vozmozhnost_zameny_sterzhnya_kartridzha'],
					'vozmozhnost_naneseniya' => ['L', 'N', 'VOZMOZHNOST_NANESENIYA', 'Возможность нанесения', 'ATTRIBUTE_vozmozhnost_naneseniya'],
					'vremya_vosproizvedeniya' => ['L', 'N', 'VREMYA_VOSPROIZVEDENIYA', 'Время воспроизведения', 'ATTRIBUTE_vremya_vosproizvedeniya'],
					'vkhodnye_parametry' => ['L', 'N', 'VKHODNYE_PARAMETRY', 'Входные параметры', 'ATTRIBUTE_vkhodnye_parametry'],
					'vysota_vorotnika' => ['S', 'N', 'VYSOTA_VOROTNIKA', 'Высота воротника', 'ATTRIBUTE_vysota_vorotnika'],
					'vykhodnye_parametry' => ['L', 'N', 'VYKHODNYE_PARAMETRY', 'Выходные параметры', 'ATTRIBUTE_vykhodnye_parametry'],
					'garantiya' => ['L', 'N', 'GARANTIYA', 'Гарантия', 'ATTRIBUTE_garantiya'],
					'germetichnost' => ['L', 'N', 'GERMETICHNOST', 'Герметичность', 'ATTRIBUTE_germetichnost'],
					'dalnost_osveshcheniya' => ['S', 'N', 'DALNOST_OSVESHCHENIYA', 'Дальность освещения', 'ATTRIBUTE_dalnost_osveshcheniya'],
					'data' => ['L', 'N', 'DATA', 'Дата', 'ATTRIBUTE_data'],
					'derzhatel_dlya_ruchki' => ['L', 'N', 'DERZHATEL_DLYA_RUCHKI', 'Держатель для ручки', 'ATTRIBUTE_derzhatel_dlya_ruchki'],
					'diagonal_ekrana' => ['L', 'N', 'DIAGONAL_EKRANA', 'Диагональ экрана', 'ATTRIBUTE_diagonal_ekrana'],
					'diametr_vkhodnogo_zrachka' => ['S', 'N', 'DIAMETR_VKHODNOGO_ZRACHKA', 'Диаметр входного зрачка', 'ATTRIBUTE_diametr_vkhodnogo_zrachka'],
					'diametr_dinamika' => ['S', 'N', 'DIAMETR_DINAMIKA', 'Диаметр динамика', 'ATTRIBUTE_diametr_dinamika'],
					'diametr_kupola' => ['S', 'N', 'DIAMETR_KUPOLA', 'Диаметр купола', 'ATTRIBUTE_diametr_kupola'],
					'diametr_ruchki_zonta' => ['S', 'N', 'DIAMETR_RUCHKI_ZONTA', 'Диаметр ручки зонта', 'ATTRIBUTE_diametr_ruchki_zonta'],
					'dlina_izdeliya_po_tsentru_spinki' => ['S', 'N', 'DLINA_IZDELIYA_PO_TSENTRU_SPINKI', 'Длина изделия по центру спинки', 'ATTRIBUTE_dlina_izdeliya_po_tsentru_spinki'],
					'dlina_kabelya' => ['S', 'N', 'DLINA_KABELYA', 'Длина кабеля', 'ATTRIBUTE_dlina_kabelya'],
					'dlina_pereda_ot_verkhney_plechevoy_tochki' => ['S', 'N', 'DLINA_PEREDA_OT_VERKHNEY_PLECHEVOY_TOCHKI', 'Длина переда от верхней плечевой точки', 'ATTRIBUTE_dlina_pereda_ot_verkhney_plechevoy_tochki'],
					'dlina_po_tsentru_pereda_ot_shva_vtachivaniya_vorotnika' => ['S', 'N', 'DLINA_PO_TSENTRU_PEREDA_OT_SHVA_VTACHIVANIYA_VOROTNIKA', 'Длина по центру переда от шва втачивания воротника', 'ATTRIBUTE_dlina_po_tsentru_pereda_ot_shva_vtachivaniya_vorotnika'],
					'dlina_proymy' => ['S', 'N', 'DLINA_PROYMY', 'Длина проймы', 'ATTRIBUTE_dlina_proymy'],
					'dlina_rukava' => ['S', 'N', 'DLINA_RUKAVA', 'Длина рукава', 'ATTRIBUTE_dlina_rukava'],
					'dlina_rukava_ot_tsentra_spiny' => ['S', 'N', 'DLINA_RUKAVA_OT_TSENTRA_SPINY', 'Длина рукава от центра спины', 'ATTRIBUTE_dlina_rukava_ot_tsentra_spiny'],
					'dlina_ruchek' => ['S', 'N', 'DLINA_RUCHEK', 'Длина ручек', 'ATTRIBUTE_dlina_ruchek'],
					'dlina_spinki_ot_verkhney_plechevoy_tochki' => ['S', 'N', 'DLINA_SPINKI_OT_VERKHNEY_PLECHEVOY_TOCHKI', 'Длина спинки от верхней плечевой точки', 'ATTRIBUTE_dlina_spinki_ot_verkhney_plechevoy_tochki'],
					'dlina_spinki_ot_vysshey_tochki_plechevogo_shva' => ['S', 'N', 'DLINA_SPINKI_OT_VYSSHEY_TOCHKI_PLECHEVOGO_SHVA', 'Длина спинки от высшей точки плечевого шва', 'ATTRIBUTE_dlina_spinki_ot_vysshey_tochki_plechevogo_shva'],
					'dlina_shkaly' => ['S', 'N', 'DLINA_SHKALY', 'Длина шкалы', 'ATTRIBUTE_dlina_shkaly'],
					'dopusk' => ['L', 'N', 'DOPUSK', 'Допуск', 'ATTRIBUTE_dopusk'],
					'emkost_elementa' => ['N', 'N', 'EMKOST_ELEMENTA', 'Емкость элемента', 'ATTRIBUTE_emkost_elementa'],
					'iznanka' => ['L', 'N', 'IZNANKA', 'Изнанка', 'ATTRIBUTE_iznanka'],
					'indikatsiya' => ['L', 'N', 'INDIKATSIYA', 'Индикация', 'ATTRIBUTE_indikatsiya'],
					'instruktsiya' => ['L', 'N', 'INSTRUKTSIYA', 'Инструкция', 'ATTRIBUTE_instruktsiya'],
					'interfeys' => ['L', 'N', 'INTERFEYS', 'Интерфейс', 'ATTRIBUTE_interfeys'],
					'istochnik_pitaniya' => ['L', 'N', 'ISTOCHNIK_PITANIYA', 'Источник питания', 'ATTRIBUTE_istochnik_pitaniya'],
					'karman_dlya_bumag' => ['L', 'N', 'KARMAN_DLYA_BUMAG', 'Карман для бумаг', 'ATTRIBUTE_karman_dlya_bumag'],
					'kol_vo_vizitok_kart' => ['S', 'N', 'KOL_VO_VIZITOK_KART', 'Кол-во визиток/карт', 'ATTRIBUTE_kol_vo_vizitok_kart'],
					'kol_vo_lampochek' => ['S', 'N', 'KOL_VO_LAMPOCHEK', 'Кол-во лампочек', 'ATTRIBUTE_kol_vo_lampochek'],
					'kol_vo_listov' => ['S', 'N', 'KOL_VO_LISTOV', 'Кол-во листов', 'ATTRIBUTE_kol_vo_listov'],
					'kol_vo_paneley' => ['S', 'N', 'KOL_VO_PANELEY', 'Кол-во панелей', 'ATTRIBUTE_kol_vo_paneley'],
					'kol_vo_person' => ['S', 'N', 'KOL_VO_PERSON', 'Кол-во персон', 'ATTRIBUTE_kol_vo_person'],
					'kol_vo_slozheniy' => ['S', 'N', 'KOL_VO_SLOZHENIY', 'Кол-во сложений', 'ATTRIBUTE_kol_vo_slozheniy'],
					'kol_vo_spits' => ['S', 'N', 'KOL_VO_SPITS', 'Кол-во спиц', 'ATTRIBUTE_kol_vo_spits'],
					'kol_vo_fotografiy' => ['S', 'N', 'KOL_VO_FOTOGRAFIY', 'Кол-во фотографий', 'ATTRIBUTE_kol_vo_fotografiy'],
					'kol_vo_tsiklov' => ['S', 'N', 'KOL_VO_TSIKLOV', 'Кол-во циклов', 'ATTRIBUTE_kol_vo_tsiklov'],
					'komplektnost' => ['L', 'N', 'KOMPLEKTNOST', 'Комплектность', 'ATTRIBUTE_komplektnost'],
					'kontrol_gromkosti' => ['L', 'N', 'KONTROL_GROMKOSTI', 'Контроль громкости', 'ATTRIBUTE_kontrol_gromkosti'],
					'koeffitsient_peredachi' => ['S', 'N', 'KOEFFITSIENT_PEREDACHI', 'Коэффициент передачи', 'ATTRIBUTE_koeffitsient_peredachi'],
					'kratnost_uvelichenie' => ['S', 'N', 'KRATNOST_UVELICHENIE', 'Кратность (увеличение)', 'ATTRIBUTE_kratnost_uvelichenie'],
					'kreplenie_bloka' => ['L', 'N', 'KREPLENIE_BLOKA', 'Крепление блока', 'ATTRIBUTE_kreplenie_bloka'],
					'lichnye_dannye' => ['L', 'N', 'LICHNYE_DANNYE', 'Личные данные', 'ATTRIBUTE_lichnye_dannye'],
					'lyasse' => ['L', 'N', 'LYASSE', 'Ляссе', 'ATTRIBUTE_lyasse'],
					'maksimalnaya_moshchnost' => ['S', 'N', 'MAKSIMALNAYA_MOSHCHNOST', 'Максимальная мощность', 'ATTRIBUTE_maksimalnaya_moshchnost'],
					'maksimalnaya_nagruzka' => ['S', 'N', 'MAKSIMALNAYA_NAGRUZKA', 'Максимальная нагрузка', 'ATTRIBUTE_maksimalnaya_nagruzka'],
					'marka_stali' => ['L', 'N', 'MARKA_STALI', 'Марка стали', 'ATTRIBUTE_marka_stali'],
					'massa_netto' => ['L', 'N', 'MASSA_NETTO', 'Масса нетто', 'ATTRIBUTE_massa_netto'],
					'material_platka_sharfa' => ['L', 'N', 'MATERIAL_PLATKA_SHARFA', 'Материал платка/шарфа', 'ATTRIBUTE_material_platka_sharfa'],
					'material_ruchki' => ['L', 'N', 'MATERIAL_RUCHKI', 'Материал ручки', 'ATTRIBUTE_material_ruchki'],
					'material_sterzhnya' => ['L', 'N', 'MATERIAL_STERZHNYA', 'Материал стержня', 'ATTRIBUTE_material_sterzhnya'],
					'material_tovara' => ['L', 'N', 'MATERIAL_TOVARA', 'Материал товара', 'ATTRIBUTE_material_tovara'],
					'mesto_sbora' => ['L', 'N', 'MESTO_SBORA', 'Место сбора', 'ATTRIBUTE_mesto_sbora'],
					'metod_naneseniya' => ['L', 'N', 'METOD_NANESENIYA', 'Метод нанесения', 'ATTRIBUTE_metod_naneseniya'],
					'mikrofon' => ['L', 'N', 'MIKROFON', 'Микрофон', 'ATTRIBUTE_mikrofon'],
					'moshchnost' => ['S', 'N', 'MOSHCHNOST', 'Мощность', 'ATTRIBUTE_moshchnost'],
					'nalichie_chekhla_futlyara' => ['L', 'N', 'NALICHIE_CHEKHLA_FUTLYARA', 'Наличие чехла/футляра', 'ATTRIBUTE_nalichie_chekhla_futlyara'],
					'nominalnaya_moshchnost' => ['S', 'N', 'NOMINALNAYA_MOSHCHNOST', 'Номинальная мощность', 'ATTRIBUTE_nominalnaya_moshchnost'],
					'oblozhka' => ['L', 'N', 'OBLOZHKA', 'Обложка', 'ATTRIBUTE_oblozhka'],
					'obkhvat_golovy' => ['S', 'N', 'OBKHVAT_GOLOVY', 'Обхват головы', 'ATTRIBUTE_obkhvat_golovy'],
					'obkhvat_shei' => ['S', 'N', 'OBKHVAT_SHEI', 'Обхват шеи', 'ATTRIBUTE_obkhvat_shei'],
					'obem' => ['L', 'N', 'OBEM', 'Объем', 'ATTRIBUTE_obem'],
					'obem_pamyati' => ['L', 'N', 'OBEM_PAMYATI', 'Объем памяти', 'ATTRIBUTE_obem_pamyati'],
					'plotnost' => ['S', 'N', 'PLOTNOST', 'Плотность', 'ATTRIBUTE_plotnost'],
					'radius_besprovodnoy_zaryadki' => ['L', 'N', 'RADIUS_BESPROVODNOY_ZARYADKI', 'Радиус беспроводной зарядки', 'ATTRIBUTE_radius_besprovodnoy_zaryadki'],
					'radius_deystviya' => ['L', 'N', 'RADIUS_DEYSTVIYA', 'Радиус действия', 'ATTRIBUTE_radius_deystviya'],
					'razlinovka' => ['L', 'N', 'RAZLINOVKA', 'Разлиновка', 'ATTRIBUTE_razlinovka'],
					'razmer' => ['S', 'N', 'RAZMER', 'Размер', 'ATTRIBUTE_razmer'],
					'razmer_tovara_sm' => ['N', 'N', 'RAZMER_TOVARA_SM', 'Размер товара (см)', 'ATTRIBUTE_razmer_tovara_sm'],
					'razmer_fotografii' => ['L', 'N', 'RAZMER_FOTOGRAFII', 'Размер фотографии', 'ATTRIBUTE_razmer_fotografii'],
					'rezinka' => ['L', 'N', 'REZINKA', 'Резинка', 'ATTRIBUTE_rezinka'],
					'rossiyskiy_razmer' => ['S', 'N', 'ROSSIYSKIY_RAZMER', 'Российский размер', 'ATTRIBUTE_rossiyskiy_razmer'],
					'rost' => ['S', 'N', 'ROST', 'Рост', 'ATTRIBUTE_rost'],
					'svetovoy_potok' => ['L', 'N', 'SVETOVOY_POTOK', 'Световой поток', 'ATTRIBUTE_svetovoy_potok'],
					'sertifikaty_standarty' => ['L', 'N', 'SERTIFIKATY_STANDARTY', 'Сертификаты, стандарты', 'ATTRIBUTE_sertifikaty_standarty'],
					'sistema_zashchity_o_vetra' => ['L', 'N', 'SISTEMA_ZASHCHITY_O_VETRA', 'Система защиты о ветра', 'ATTRIBUTE_sistema_zashchity_o_vetra'],
					'skorost_vosstanovleniya_formy' => ['L', 'N', 'SKOROST_VOSSTANOVLENIYA_FORMY', 'Скорость восстановления формы', 'ATTRIBUTE_skorost_vosstanovleniya_formy'],
					'skorost_zapisi' => ['L', 'N', 'SKOROST_ZAPISI', 'Скорость записи', 'ATTRIBUTE_skorost_zapisi'],
					'skorost_chteniya' => ['L', 'N', 'SKOROST_CHTENIYA', 'Скорость чтения', 'ATTRIBUTE_skorost_chteniya'],
					'sovmestimost' => ['L', 'N', 'SOVMESTIMOST', 'Совместимость', 'ATTRIBUTE_sovmestimost'],
					'soedinitelnyy_razem' => ['L', 'N', 'SOEDINITELNYY_RAZEM', 'Соединительный разъем', 'ATTRIBUTE_soedinitelnyy_razem'],
					'soprotivlenie' => ['L', 'N', 'SOPROTIVLENIE', 'Сопротивление', 'ATTRIBUTE_soprotivlenie'],
					'sostav' => ['S', 'N', 'SOSTAV', 'Состав', 'ATTRIBUTE_sostav'],
					'spravochnaya_informatsiya' => ['L', 'N', 'SPRAVOCHNAYA_INFORMATSIYA', 'Справочная информация', 'ATTRIBUTE_spravochnaya_informatsiya'],
					'srok_godnosti' => ['L', 'N', 'SROK_GODNOSTI', 'Срок годности', 'ATTRIBUTE_srok_godnosti'],
					'steklo' => ['L', 'N', 'STEKLO', 'Стекло', 'ATTRIBUTE_steklo'],
					'tverdost' => ['L', 'N', 'TVERDOST', 'Твердость', 'ATTRIBUTE_tverdost'],
					'telefonnaya_kniga' => ['L', 'N', 'TELEFONNAYA_KNIGA', 'Телефонная книга', 'ATTRIBUTE_telefonnaya_kniga'],
					'temperaturnyy_rezhim' => ['L', 'N', 'TEMPERATURNYY_REZHIM', 'Температурный режим', 'ATTRIBUTE_temperaturnyy_rezhim'],
					'tip_zaryadki' => ['L', 'N', 'TIP_ZARYADKI', 'Тип зарядки', 'ATTRIBUTE_tip_zaryadki'],
					'tip_konstruktsii' => ['L', 'N', 'TIP_KONSTRUKTSII', 'Тип конструкции', 'ATTRIBUTE_tip_konstruktsii'],
					'tip_krepleniya' => ['L', 'N', 'TIP_KREPLENIYA', 'Тип крепления', 'ATTRIBUTE_tip_krepleniya'],
					'tip_soedineniya' => ['L', 'N', 'TIP_SOEDINENIYA', 'Тип соединения', 'ATTRIBUTE_tip_soedineniya'],
					'tip_sterzhnya' => ['L', 'N', 'TIP_STERZHNYA', 'Тип стержня', 'ATTRIBUTE_tip_sterzhnya'],
					'tip_ustanovki' => ['L', 'N', 'TIP_USTANOVKI', 'Тип установки', 'ATTRIBUTE_tip_ustanovki'],
					'tolshchina_uzla' => ['L', 'N', 'TOLSHCHINA_UZLA', 'Толщина узла', 'ATTRIBUTE_tolshchina_uzla'],
					'format' => ['L', 'N', 'FORMAT', 'Формат', 'ATTRIBUTE_format'],
					'tsvet_bumagi' => ['L', 'N', 'TSVET_BUMAGI', 'Цвет бумаги', 'ATTRIBUTE_tsvet_bumagi'],
					'tsvet_gravirovki' => ['L', 'N', 'TSVET_GRAVIROVKI', 'Цвет гравировки', 'ATTRIBUTE_tsvet_gravirovki'],
					'tsvet_sreza' => ['L', 'N', 'TSVET_SREZA', 'Цвет среза', 'ATTRIBUTE_tsvet_sreza'],
					'tsvet_tovara' => ['L', 'N', 'TSVET_TOVARA', 'Цвет товара', 'ATTRIBUTE_tsvet_tovara'],
					'tsvet_chernil' => ['L', 'N', 'TSVET_CHERNIL', 'Цвет чернил', 'ATTRIBUTE_tsvet_chernil'],
					'chastotnyy_diapazon' => ['L', 'N', 'CHASTOTNYY_DIAPAZON', 'Частотный диапазон', 'ATTRIBUTE_chastotnyy_diapazon'],
					'chuvstvitelnost' => ['L', 'N', 'CHUVSTVITELNOST', 'Чувствительность', 'ATTRIBUTE_chuvstvitelnost'],
					'shirina_vorotnika' => ['S', 'N', 'SHIRINA_VOROTNIKA', 'Ширина воротника', 'ATTRIBUTE_shirina_vorotnika'],
					'shirina_gorloviny' => ['S', 'N', 'SHIRINA_GORLOVINY', 'Ширина горловины', 'ATTRIBUTE_shirina_gorloviny'],
					'shirina_grudi_izdeliya_po_grudi' => ['S', 'N', 'SHIRINA_GRUDI_IZDELIYA_PO_GRUDI', 'Ширина груди изделия (ПО груди)', 'ATTRIBUTE_shirina_grudi_izdeliya_po_grudi'],
					'shirina_izdeliya_pod_proymoy' => ['S', 'N', 'SHIRINA_IZDELIYA_POD_PROYMOY', 'Ширина изделия под проймой', 'ATTRIBUTE_shirina_izdeliya_pod_proymoy'],
					'shirina_niza_izdeliya_pered' => ['S', 'N', 'SHIRINA_NIZA_IZDELIYA_PERED', 'Ширина низа изделия (перед)', 'ATTRIBUTE_shirina_niza_izdeliya_pered'],
					'shirina_plecha' => ['S', 'N', 'SHIRINA_PLECHA', 'Ширина плеча', 'ATTRIBUTE_shirina_plecha'],
					'shirina_po_talii_po_talii' => ['S', 'N', 'SHIRINA_PO_TALII_PO_TALII', 'Ширина по талии (ПО талии)', 'ATTRIBUTE_shirina_po_talii_po_talii'],
					'shirina_rukava_bitseps' => ['S', 'N', 'SHIRINA_RUKAVA_BITSEPS', 'Ширина рукава (бицепс)', 'ATTRIBUTE_shirina_rukava_bitseps'],
					'shirina_rukava_po_nizu' => ['S', 'N', 'SHIRINA_RUKAVA_PO_NIZU', 'Ширина рукава по низу', 'ATTRIBUTE_shirina_rukava_po_nizu'],
					'shirina_rukava_pod_proymoy' => ['S', 'N', 'SHIRINA_RUKAVA_POD_PROYMOY', 'Ширина рукава под проймой', 'ATTRIBUTE_shirina_rukava_pod_proymoy'],
				],
				'PROP_CALLBACK' => function($intPropExtId, $arProp){
					return sprintf('WDI_%s_%s', $this->strHandler, $arProp[2]);
				},
				'MATCHES' => [
					'S' => [
						'NAME' => ['S', 'N', 'NAME'],
					],
					'E' => [
						'NAME' => ['S', 'N', 'NAME'],
						'PREVIEW_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'DETAIL_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'PREVIEW_PICTURE' => ['S', 'N', 'IMAGES'],
						'DETAIL_PICTURE' => ['S', 'N', 'IMAGES'],
						'CATALOG_PRICE_1' => ['N', 'N', 'STOCK_END_USER_PRICE'],
						'CATALOG_QUANTITY' => ['N', 'N', 'STOCK_AMOUNT'],
					],
					'O' => [
						'NAME' => ['S', 'N', 'NAME'],
						'PREVIEW_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'DETAIL_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'PREVIEW_PICTURE' => ['S', 'N', 'IMAGES'],
						'DETAIL_PICTURE' => ['S', 'N', 'IMAGES'],
						'CATALOG_PRICE_1' => ['N', 'N', 'OFFER_PRICE'],
						'CATALOG_QUANTITY' => ['N', 'N', 'STOCK_AMOUNT'],
					],
				],
				'LINK_SOURCE' => [
					'S' => 'ID',
					'E' => 'GROUP_ID',
					'O' => 'PRODUCT_ID',
				],
			],
			##################################################################################################################
			'HAPPYGIFTS' => [
				'SITE' => 'happygifts.ru',
				'PARAMS' => [],
				'PROPS' => [
					'ARTICLE' => ['S', 'N', 'ARTICLE', 'Общий артикул группы', 'ARTICLE'],
					'ARTICLE_FULL' => ['S', 'N', 'ARTICLE_FULL', 'Артикул', 'ARTICLE_FULL'],
					'BRAND_NAME' => ['L', 'N', 'BRAND_NAME', 'Бренд', 'BRAND_NAME'],
					'SIZE' => ['S', 'N', 'SIZE', 'Размер', 'SIZE'],
					'CLOTHES_SIZE' => ['S', 'N', 'CLOTHES_SIZE', 'Размер одежды', 'CLOTHES_SIZE'],
					'MATERIAL' => ['L', 'N', 'MATERIAL', 'Материал', 'MATERIAL'],
					'COLOR' => ['L', 'N', 'COLOR', 'Цвет', 'COLOR'],
					'BOX_COUNT' => ['S', 'N', 'BOX_COUNT', 'Штук в коробке', 'BOX_COUNT'],
					'BOX_VOLUME' => ['S', 'N', 'BOX_VOLUME', 'Объем коробки', 'BOX_VOLUME'],
					'BOX_WEIGHT' => ['S', 'N', 'BOX_WEIGHT', 'Вес коробки', 'BOX_WEIGHT'],
					'WEIGHT' => ['S', 'N', 'WEIGHT', 'Вес единицы', 'WEIGHT'],
					'VOLUME' => ['S', 'N', 'VOLUME', 'Объем единицы', 'VOLUME'],
					'F_PRINT' => ['L', 'Y', 'F_PRINT', 'Вид нанесения', 'F_PRINT'],
					#
					'F_DIARY' => ['L', 'N', 'F_DIARY', 'Ежедневник', 'F_DIARY'],
					'F_CHARGER' => ['L', 'N', 'F_CHARGER', 'Зарядное устройство', 'F_CHARGER'],
					'F_PEN' => ['L', 'N', 'F_PEN', 'Ручка', 'F_PEN'],
					'F_BOX' => ['L', 'N', 'F_BOX', 'Коробка', 'F_BOX'],
					'F_ON_ORDER' => ['L', 'N', 'F_ON_ORDER', 'Только под заказ', 'F_ON_ORDER'],
					'F_EXHAUST' => ['L', 'N', 'F_EXHAUST', 'До исчерпания', 'F_EXHAUST'],
					'F_BONUS' => ['L', 'N', 'F_BONUS', 'Бонус', 'F_BONUS'],
					'F_BEST_PRICE' => ['L', 'N', 'F_BEST_PRICE', 'Лучшая цена', 'F_BEST_PRICE'],
					'F_GREEN' => ['L', 'N', 'F_GREEN', 'Green', 'F_GREEN'],
					'F_NEW_YEAR' => ['L', 'N', 'F_NEW_YEAR', 'Новый год', 'F_NEW_YEAR'],
					'F_POSTCARDS' => ['L', 'N', 'F_POSTCARDS', 'Открытки', 'F_POSTCARDS'],
					'F_WINTER' => ['L', 'N', 'F_WINTER', 'Зимнее предложение', 'F_WINTER'],
					'F_SUMMER' => ['L', 'N', 'F_SUMMER', 'Летнее предложение', 'F_SUMMER'],
					'F_NEW' => ['L', 'N', 'F_NEW', 'New', 'F_NEW'],
					'F_23_FEB' => ['L', 'N', 'F_23_FEB', '23 февраля', 'F_23_FEB'],
					'F_8_MAR' => ['L', 'N', 'F_8_MAR', '8 марта', 'F_8_MAR'],
					'F_SALE' => ['L', 'N', 'F_SALE', 'Sale', 'F_SALE'],
				],
				'PROP_CALLBACK' => function($intPropExtId, $arProp){
					return sprintf('WDI_%s_%s', $this->strHandler, $arProp[2]);
				},
				'MATCHES' => [
					'S' => [
						'NAME' => ['S', 'N', 'NAME'],
					],
					'E' => [
						'NAME' => ['S', 'N', 'NAME'],
						'PREVIEW_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'DETAIL_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'PREVIEW_PICTURE' => ['S', 'N', 'PICTURE'],
						'DETAIL_PICTURE' => ['S', 'N', 'PICTURE'],
						'CATALOG_PRICE_1' => ['N', 'N', 'PRICE'],
						'CATALOG_QUANTITY' => ['N', 'N', 'STOCK_ALL'],
					],
					'O' => [
						'NAME' => ['S', 'N', 'NAME_FULL'],
						'PREVIEW_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'DETAIL_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'PREVIEW_PICTURE' => ['S', 'N', 'PICTURE'],
						'DETAIL_PICTURE' => ['S', 'N', 'PICTURE'],
						'CATALOG_PRICE_1' => ['N', 'N', 'PRICE'],
						'CATALOG_QUANTITY' => ['N', 'N', 'STOCK_ALL'],
					],
				],
				'LINK_SOURCE' => [
					'S' => 'ID',
					'E' => 'ID',
					'O' => 'ID',
				],
			],
			##################################################################################################################
			'XINDAORUSSIA' => [
				'SITE' => 'xindaorussia.ru',
				'PARAMS' => [],
				'PROPS' => [
					'ARTICLE' => ['S', 'N', 'ARTICLE', 'Общий артикул группы', 'ARTICLE'],
					'ARTICLE_FULL' => ['S', 'N', 'ARTICLE_FULL', 'Артикул', 'ARTICLE_FULL'],
					'PRINT' => ['L', 'Y', 'PRINT', 'Способы нанесения', 'PRINT'],
					#
					'PROP_COLOR' => ['L', 'N', 'PROP_COLOR', 'Цвет', 'PROP_COLOR'],
					'PROP_BRAND' => ['L', 'N', 'PROP_BRAND', 'Бренд', 'PROP_BRAND'],
					'PROP_MATERIAL' => ['L', 'N', 'PROP_MATERIAL', 'Материал', 'PROP_MATERIAL'],
					'PROP_WEIGHT' => ['N', 'N', 'PROP_WEIGHT', 'Вес (г)', 'PROP_WEIGHT'],
					'PROP_SIZE' => ['S', 'N', 'PROP_SIZE', 'Размер', 'PROP_SIZE'],
					#
					'PACK_SIZE' => ['S', 'N', 'PACK_SIZE', 'Размер упаковки', 'PACK_SIZE'],
					'PACK_COUNT' => ['S', 'N', 'PACK_COUNT', 'Число товаров в упаковке', 'PACK_COUNT'],
					'PACK_WEIGHT' => ['N', 'N', 'PACK_WEIGHT', 'Вес упаковки (г)', 'PACK_WEIGHT'],
					#
					'ATTR_NEW' => ['L', 'N', 'ATTR_NEW', 'Новинка', 'ATTR_NEW'],
					'ATTR_ECO' => ['L', 'N', 'ATTR_ECO', 'Эко', 'ATTR_ECO'],
				],
				'PROP_CALLBACK' => function($intPropExtId, $arProp){
					return sprintf('WDI_%s_%s', $this->strHandler, $arProp[2]);
				},
				'MATCHES' => [
					'S' => [
						'NAME' => ['S', 'N', 'NAME'],
					],
					'E' => [
						'NAME' => ['S', 'N', 'NAME'],
						'PREVIEW_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'DETAIL_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'PREVIEW_PICTURE' => ['S', 'N', 'IMAGE'],
						'DETAIL_PICTURE' => ['S', 'N', 'IMAGE'],
						'CATALOG_PRICE_1' => ['N', 'N', 'PRICE'],
						'CATALOG_QUANTITY' => ['N', 'N', 'AMOUNT_MOSCOW_FREE'],
					],
					'O' => [
						'NAME' => ['S', 'N', 'NAME'],
						'PREVIEW_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'DETAIL_TEXT' => ['S', 'N', 'DESCRIPTION', ['html_type' => 'html']],
						'PREVIEW_PICTURE' => ['S', 'N', 'IMAGE'],
						'DETAIL_PICTURE' => ['S', 'N', 'IMAGE'],
						'CATALOG_PRICE_1' => ['N', 'N', 'PRICE'],
						'CATALOG_QUANTITY' => ['N', 'N', 'AMOUNT_MOSCOW_FREE'],
					],
				],
				'LINK_SOURCE' => [
					'S' => 'ID',
					'E' => 'ARTICLE',
					'O' => 'ARTICLE',
				],
			],
			##################################################################################################################
		];
		return $arHandlerParams[$this->strHandler];
	}

	protected function getHandlerArray(){
		static $arHandlers = null;
		$arResult = null;
		if(is_null($arHandlers)){
			$arHandlers = \CWDI_Handler::GetList();
		}
		if(is_array($arHandlers) && strlen($this->strHandler)){
			$arResult = $arHandlers[$this->strHandler];
		}
		return $arResult;
	}

	protected function buildProfileParams(){
		$arResult = [
			'IGNORE_ERRORS' => 'Y',
			'HANDLER_SCHEDULE_MODE' => 'cron',
			'SCHEDULE_INTERVAL_START_VALUE' => '',
			'SCHEDULE_INTERVAL_START_TYPE' => 'minute',
			'SCHEDULE_INTERVAL_END_VALUE' => '',
			'SCHEDULE_INTERVAL_END_TYPE' => 'minute',
			'INDIVIDUAL_RUN_ONLY' => 'N',
			'PHP_PATH' => $this->arParams['php_path'],
			#
			'S' => [
				[
					'IBLOCK_ID' => $this->intIBlockId,
					'SECTION_ID' => $this->getHandlerRootSectionId(),
					'SEARCH_ONLY_IN_THIS_SECTION' => 'N',
					'LINK' => [
						'SECTION' => [
							'FIELD' => 'other',
							'OTHER' => $this->createLinkPropSection(),
							'HANDLER' => '',
						],
						'ELEMENT' => [
							'FIELD' => 'other',
							'OTHER' => $this->createLinkPropElement(),
							'HANDLER' => '',
						],
						'OFFER' => [
							'FIELD' => 'other',
							'OTHER' => $this->createLinkPropOffer(),
							'HANDLER' => '',
						],
					],
				],
			],
			#
			'SKIP_NEW_ELEMENTS' => 'N',
			'SKIP_NEW_SECTIONS' => 'N',
			#
			'SKIP_MULTISECTIONS' => 'Y',
			'ELEMENTS_SKIP_MOVING' => 'Y',
			'SECTIONS_SKIP_MOVING' => 'Y',
			#
			'SKIP_UPDATE_SEARCH' => 'N',
			#
			'NEW_SECTIONS_ACTIVE' => 'Y',
			'OLD_SECTIONS_ACTIVE' => 'Y',
			'DEACTIVATE_MISSING_SECTIONS' => 'Y',
			'DEACTIVATE_MISSING_SECTIONS_TYPE' => 'profile',
			#
			'NEW_ELEMENTS_ACTIVE' => 'Y',
			'OLD_ELEMENTS_ACTIVE' => 'Y',
			'DEACTIVATE_MISSING_ELEMENTS' => 'Y',
			'DEACTIVATE_MISSING_ELEMENTS_TYPE' => 'profile',
			#
			'ELEMENTS_QUANTITY_TRACE' => 'D',
			'ELEMENTS_CAN_BUY_ZERO' => 'D',
			'ELEMENTS_SUBSCRIBE' => 'D',
			'VAT_INCLUDED' => 'N',
			'DEFAULT_VAT' => '',
			'DEFAULT_CURRENCY' => 'RUB',
			'CURRENCY_DESIGNATIONS' => [],
			'DEFAULT_UNIT' => '5',
			'MEASURE_DESIGNATIONS' => [],
			#
			'ACTIVATE_BY_QUANTITY_GENERAL' => 'N',
			'ACTIVATE_BY_QUANTITY_STORE' => 'N',
			'ACTIVATE_BY_PRICE' => 'N',
			'CLEAR_QUANTITY_MISSING_ELEMENTS' => 'N',
			'CLEAR_QUANTITY_MISSING_ELEMENTS_TYPE' => 'N',
			#
			'LOAD_OFFERS' => 'Y',
			'SKIP_NEW_OFFERS' => 'N',
			'NEW_OFFERS_ACTIVE' => 'Y',
			'OLD_OFFERS_ACTIVE' => 'Y',
			'DEACTIVATE_MISSING_OFFERS' => 'Y',
			'DEACTIVATE_MISSING_OFFERS_TYPE' => 'profile',
			#
			'RECALCULATE_QUANTITY' => 'N',
			#
		];
		if($arAdditionalParams = $this->getHandlerParams()['PARAMS']){
			$arResult = array_merge($arResult, $arAdditionalParams);
		}
		if($arSheetParams = $this->getHandlerParams()['SHEET_PARAMS']){
			$arResult['S'][0] = array_merge($arResult['S'][0], $arSheetParams);
		}
		return $arResult;
	}

	protected function getHandlerRootSectionId(){
		$strResult = '';
		if($this->arParams['separated_sections'] == 'Y'){
			$arSection = [
				'IBLOCK_ID' => $this->intIBlockId,
				'NAME' => static::getMessage('SECTION_NAME', ['#SITE#' => $this->getHandlerParams()['SITE']]),
				'CODE' => str_replace('.', '_', $this->getHandlerParams()['SITE']),
				'ACTIVE' => 'N',
				'EXTERNAL_ID' => 'WDI_SECTION_'.$this->strHandler,
			];
			$arFilter = array_intersect_key($arSection, array_flip(['IBLOCK_ID', 'EXTERNAL_ID']));
			if($arExistSection = \CIBlockSection::getList([], $arFilter, false, ['ID'])->fetch()){
				$strResult = strVal($arExistSection['ID']);
			}
			else{
				$obSection = new \CIBlockSection;
				if($intSectionId = $obSection->add($arSection)){
					$strResult = strVal($intSectionId);
				}
				unset($obSection);
			}
		}
		return $strResult;
	}

	protected function getPropertyCode($strEntity, $strFull=false){
		$strCode = 'WDI_EXT_ID_'.$this->strHandler;
		switch($strEntity){
			case 'S':
				return ($strFull ? 'UF_' : '').$strCode;
				break;
			case 'E':
			case 'O':
				return $strCode;
				break;
		}
	}

	protected function createLinkPropSection(){
		$strCode = $this->getPropertyCode('S', false);
		$strUf = $this->getPropertyCode('S', true);
		if($this->intIBlockId){
			$obProp = new \CUserTypeEntity();
			$arProp = [
				'ENTITY_ID' => 'IBLOCK_'.$this->intIBlockId.'_SECTION',
				'FIELD_NAME' => $strUf,
				'USER_TYPE_ID' => 'string',
				'XML_ID' => $strCode,
				'SORT' => 100,
				'MULTIPLE' => 'N',
				'MANDATORY' => 'N',
				'SHOW_FILTER' => 'N',
				'SHOW_IN_LIST' => 'N',
				'EDIT_IN_LIST' => 'N',
				'IS_SEARCHABLE' => 'N',
				'SETTINGS' => [
					'DEFAULT_VALUE' => '',
					'SIZE' => '20',
					'ROWS' => '1',
					'MIN_LENGTH' => '0',
					'MAX_LENGTH' => '0',
					'REGEXP' => '',
				],
				'EDIT_FORM_LABEL' => [
					LANGUAGE_ID => static::getMessage('EXT_ID_SECTION', ['#SITE#' => $this->getHandlerParams()['SITE']]),
				],
				'LIST_COLUMN_LABEL' => [
					LANGUAGE_ID => static::getMessage('EXT_ID_SECTION', ['#SITE#' => $this->getHandlerParams()['SITE']]),
				],
				'LIST_FILTER_LABEL' => [
					LANGUAGE_ID => static::getMessage('EXT_ID_SECTION', ['#SITE#' => $this->getHandlerParams()['SITE']]),
				],
				'ERROR_MESSAGE' => [
					LANGUAGE_ID => static::getMessage('EXT_ID_SECTION', ['#SITE#' => $this->getHandlerParams()['SITE']]),
				],
				'HELP_MESSAGE' => [
					LANGUAGE_ID => static::getMessage('EXT_ID_SECTION', ['#SITE#' => $this->getHandlerParams()['SITE']]),
				],
			];
			$resProp = $obProp->getList([], array_intersect_key($arProp, array_flip(['ENTITY_ID', 'FIELD_NAME'])));
			if(!$resProp->fetch()){
				$obProp->add($arProp);
			}
			unset($obProp, $resProp);
		}
		return $strUf;
	}

	protected function createLinkPropElement(){
		$strCode = $this->getPropertyCode('E');
		if($this->intIBlockId){
			$obProp = new \CIBlockProperty;
			$arProp = [
				'NAME' => static::getMessage('EXT_ID_ELEMENT', ['#SITE#' => $this->getHandlerParams()['SITE']]),
				'ACTIVE' => 'Y',
				'SORT' => '500',
				'CODE' => $strCode,
				'PROPERTY_TYPE' => 'S',
				'IBLOCK_ID' => $this->intIBlockId,
				'XML_ID' => $strCode,
			];
			$arFilter = array_intersect_key($arProp, array_flip(['IBLOCK_ID', 'CODE']));
			$arExistProp = $obProp->getList([], $arFilter);
			$bFound = $arExistProp->fetch();
			if(!$bFound){
				$obProp->add($arProp);
			}
			unset($obProp);
		}
		return 'PROPERTY_'.$strCode;
	}

	protected function createLinkPropOffer(){
		$strCode = $this->getPropertyCode('O');
		if($this->intOffersIBlockId){
			$obProp = new \CIBlockProperty;
			$arProp = [
				'NAME' => static::getMessage('EXT_ID_OFFER', ['#SITE#' => $this->getHandlerParams()['SITE']]),
				'ACTIVE' => 'Y',
				'SORT' => '500',
				'CODE' => $strCode,
				'PROPERTY_TYPE' => 'S',
				'IBLOCK_ID' => $this->intOffersIBlockId,
				'XML_ID' => $strCode,
			];
			$arFilter = array_intersect_key($arProp, array_flip(['IBLOCK_ID', 'CODE']));
			if(!$obProp->getList([], $arFilter)->fetch()){
				$obProp->add($arProp);
			}
			unset($obProp);
		}
		return 'PROPERTY_'.$strCode;
	}

	protected function createProps(){
		if($this->arParams['create_props'] != 'Y'){
			return;
		}
		if(is_array($arProps = $this->getHandlerParams()['PROPS'])){
			$arIBlocks = [$this->intIBlockId];
			if($this->intOffersIBlockId){
				$arIBlocks[] = $this->intOffersIBlockId;
			}
			$obProp = new \CIBlockProperty;
			foreach($arProps as $intPropExtId => &$arProp){
				$strCode = call_user_func($this->getHandlerParams()['PROP_CALLBACK'], $intPropExtId, $arProp);
				$arPropFields = [
					'NAME' => $arProp[3],
					'CODE' => $strCode,
					'SORT' => '500',
					'ACTIVE' => 'Y',
					'PROPERTY_TYPE' => $arProp[0],
					'XML_ID' => $strCode,
				];
				if($arProp[1] == 'Y'){
					$arPropFields['MULTIPLE'] = 'Y';
				}
				if(!CWDI::isUtf()){
					$arPropFields['NAME'] = CWDI::convertCharset($arPropFields['NAME'], 'UTF-8', 'CP1251');
				}
				foreach($arIBlocks as $intIBlockId){
					$arPropFields['IBLOCK_ID'] = $intIBlockId;
					$arFilter = array_intersect_key($arPropFields, array_flip(['IBLOCK_ID', 'XML_ID']));
					if(!$obProp->getList([], $arFilter)->fetch()){
						$obProp->add($arPropFields);
					}
				}
			}
			unset($arProp, $obProp);
		}
	}

	protected function buildProfileMatches(){
		$arResult = [];
		$arResult['SECTION'] = $this->getEntityMatches('S');
		$arResult['ELEMENT'] = $this->getEntityMatches('E');
		$arResult['OFFER'] = $this->getEntityMatches('O');
		return [
			'S' => [
				$arResult,
			]
		];
	}

	protected function getEntityMatches($strEntity){
		$arResult = [];
		$arMatches = [];
		if(is_array($arMatchesBase = $this->getHandlerParams()['MATCHES'][$strEntity])){
			if(in_array($strEntity, ['E', 'O'])){
				foreach($arMatchesBase as &$arMatch){
					if(is_array($arMatch[3])){
						$arMatch[3] = http_build_query($arMatch[3]);
					}
				}
				unset($arMatch);
			}
			$arMatches = array_merge($arMatches, $arMatchesBase);
		}
		$intIBlockId = $strEntity == 'O' ? $this->intOffersIBlockId : $this->intIBlockId;
		if($this->arParams['create_props'] == 'Y'){
			if(is_array($arProps = $this->getHandlerParams()['PROPS'])){
				foreach($arProps as $intPropExtId => $arProp){
					$strPropCode = call_user_func($this->getHandlerParams()['PROP_CALLBACK'], $intPropExtId, $arProp);
					if($arExistProp = $this->getPropertyByCode($strPropCode, $intIBlockId)){
						$strFieldCode = sprintf('PROPERTY_%d', $arExistProp['ID']);
						$arValueParams = is_array($arProp[5]) ? $arProp[5] : [];
						if($arProp[0] == 'L'){
							$arValueParams['list_value_type'] = 'value';
						}
						$arMatches[$strFieldCode] = [
							$arProp[0],
							$arProp[1],
							$arProp[4],
							http_build_query($arValueParams),
						];
					}
				}
			}
		}
		if($strLinkProp = $this->getPropertyCode($strEntity, true)){
			$strSource = $this->getHandlerParams()['LINK_SOURCE'][$strEntity];
			if(in_array($strEntity, ['E', 'O'])){
				if($arProp = $this->getPropertyByCode($strLinkProp, $intIBlockId)){
					$strFieldCode = sprintf('PROPERTY_%d', $arProp['ID']);
					$arMatches[$strFieldCode] = ['S', 'N', $strSource];
				}
			}
			elseif($strEntity == 'S'){
				$arMatches[$strLinkProp] = ['S', 'N', $strSource];
			}
		}
		foreach($arMatches as $strTarget => $arMatch){
			$arResult[$strTarget] = [
				'TYPE' => $arMatch[0],
				'MULTIPLE' => $arMatch[1],
				'IBLOCK_ID' => $intIBlockId,
				'HLBLOCK_ID' => '0',
				'SOURCE' => $arMatch[2],
				'CUSTOM' => '',
				'PARAMS' => strlen($arMatch[3]) ? $arMatch[3] : '',
			];
		}
		return $arResult;
	}

	protected function getPropertyByCode($strPropCode, $intIBlockId){
		$arFilter = [
			'IBLOCK_ID' => $intIBlockId,
			'CODE' => $strPropCode,
		];
		return \CIBlockProperty::getList([], $arFilter)->fetch();
	}
	
}
?>