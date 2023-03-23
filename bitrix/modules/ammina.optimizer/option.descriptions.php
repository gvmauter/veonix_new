<?

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arAllowLibrary = \Ammina\Optimizer\Core2\LibAvailable::getCurrentCheckData();

$arLibraryCss = array(
	"sabberworm" => array(),
);
$arLibraryJs = array(
	"uglifyjs" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
	"uglifyjs2" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
	"terserjs" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
	"babelminify" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
);
$strDefaultLibraryJs = "uglifyjs";
$arLibraryImagesJpg = array(
	"phpimagick" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
	"jpegoptim" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
);
$strDefaultLibraryImagesJpg = "phpimagick";

$arLibraryImagesPng = array(
	"phpimagick" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
	"optipng" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
	"pngquant" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
);
$strDefaultLibraryImagesPng = "pngquant";

$arLibraryImagesGif = array(
	"phpimagick" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
	"gifsicle" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
);
$arLibraryImagesSvg = array(
	"svgo" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
);
$strDefaultLibraryImagesSvg = "svgo";
$arLibraryHtml = array(
	"amminaoptimizer" => array(),
);

$arLibraryParser = array(
	"domparser" => array(
		"DISABLED" => !$arAllowLibrary['packages']['dom'],
	),
	//"phpparser" => array(),
);
$arLibraryImagesWebP = array(
	"cwebp" => array(
		"DISABLED" => !$arAllowLibrary['other']['amminabxapi'],
	),
);
$strDefaultLibraryImagesWebP = "cwebp";

$defaultParser = "domparser";
if (!$arAllowLibrary['packages']['dom']) {
	$defaultParser = "phpparser";
}
return array(
	"category" => array(
		"main" => array(
			"options" => array(
				"ACTIVE" => array(
					"TYPE" => "checkbox",
					"DEFAULT" => "N",
					"SHORT" => "Y",
				),
			),
			"groups" => array(
				"parse" => array(
					"options" => array(
						//����������
						"LIBRARY" => array(
							"TYPE" => "select",
							"DEFAULT" => "domparser",
							"SHORT" => "Y",
							"VARIANTS" => $arLibraryParser,
						),
						"CHECK_ENCODING_UTF8" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"CHECK_NOTVALID_START_TAG" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"CHECK_NOTVALID_UTF8_SYMBOLS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
					),
				),
				"request" => array(
					"options" => array(
						//������������ HTML �������
						"ACTIVE_HTML" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),

						//������������ AJAX �������
						"ACTIVE_AJAX" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//������������ JSON �������
						"ACTIVE_JSON" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//������������ ������� ������������� ajax
						"ACTIVE_COMPONENT_AJAX" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//������������ ������������
						"ACTIVE_AUTOCOMPOSITE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
					),
				),
				"other" => array(
					"options" => array(
						"CHECK_BXRAND_SCRIPT" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"CHECK_COMPONENT_AJAX_JSSCRIPT_EXISTS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"MOVE_JS_BODY" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"UNLOCK_SKIP_MOVE_JS_ASPRO" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"UNLOCK_SKIP_MOVE_JS_HEAD" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"UNLOCK_SKIP_MOVE_JS_BODY" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"REPLACE_BULLET" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"REPLACE_HTML_ENTITY" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
						),
						"DISABLE_MAIN_JOIN_CSS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DISABLE_MAIN_JOIN_JS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DISABLE_MAIN_MOVE_JS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"MOVE_JS_BXSTAT_TOP" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"MAKE_STATIC_ASPRO_SETTHEME" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
					)
				)
			),
		),
		"css" => array(
			"options" => array(
				"ACTIVE" => array(
					"TYPE" => "checkbox",
					"DEFAULT" => "N",
					"SHORT" => "Y",
				),
			),
			"groups" => array(
				"minify" => array(
					"options" => array(
						//��������������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//����������
						"LIBRARY" => array(
							"TYPE" => "select.options",
							"DEFAULT" => "sabberworm",
							"SHORT" => "Y",
							"VARIANTS" => $arLibraryCss,
						),
						//�� �������������� �����
						"EXCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������������� �����
						"INCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"external_css" => array(
					"options" => array(
						//�������������� ���������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//���������
						"EXCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//��������
						"INCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"outline_css" => array(
					"options" => array(
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"INCLUDE_CONTENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"EXCLUDE_CONTENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					)
				),
				"images" => array(
					"options" => array(
						//��������� ����������� �� CSS
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//�������������� �����������
						"OPTIMIZE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//Inline image
						"INLINE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//������������ ������ ����������� inline
						"MAX_IMAGE_SIZE" => array(
							"TYPE" => "text.bytes",
							"DEFAULT" => "8192",
							"SHORT" => "Y",
						),
						"CONVERT_WEBP" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
					),
				),
				"fonts" => array(
					"options" => array(
						//����������� �������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//���������� ���������
						"LINK" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
						),
						"LINK_ALL_FONTS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
						),
						"LINK_FONTS" => array(
							"TYPE" => "text",
							"DEFAULT" => "",
						),
						"UNICODE_RANGE" => array(
							"TYPE" => "text",
							"DEFAULT" => "",
						),
						"NORMALIZE_ORDER" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
						),
						//���������� font-face
						"FONT_FACE" => array(
							"TYPE" => "select",
							"DEFAULT" => "swap",
							"VARIANTS" => array(
								"none" => array(),
								"auto" => array(),
								"swap" => array(),
								"fallback" => array(),
							),
						),
						//�������������� Google ������
						"GOOGLE_FONTS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//��� ����������� Google (� ������ user agent, ����������� �����������)
						"GOOGLE_FONTS_TYPE" => array(
							"TYPE" => "select",
							"DEFAULT" => "ua",
							"VARIANTS" => array(
								"ua" => array(),
								//"standart" => array(),
							),
						),
						//���������� ������ inline
						"INLINE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
					),
				),
				"critical" => array(
					"options" => array(
						//�������� ����������� CSS � ��������� �� inline
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"USE_TAG_IDENT" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"ADD_CLASS" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
						),
						"ADD_IDENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
						),
						"ONLY_CLASS" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
						),
						"ONLY_IDENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
						),
						"IGNORE_CLASS" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
						),
						"IGNORE_IDENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => implode("\n", array("PART:bx_", "PART:sessid_", "PART:arrFilter_")),
						),
						"MAX_CRITICAL_RECORD" => array(
							"TYPE" => "text",
							"DEFAULT" => "5",
						),
						"USE_UNCRITICAL" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
					),
				),
				"other" => array(
					"options" => array(
						//��������� �� ����������� CSS �����
						"EXCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "PART:/css/blocks/dark-light-theme",
						),
						//�������� CSS inline � ��������
						"INLINE_CSS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//������������ ������ CSS ��� inline
						"MAX_SIZE_INLINE" => array(
							"TYPE" => "text.bytes",
							"DEFAULT" => "65536",
							"SHORT" => "Y",
						),
						//���������� Inline ����� </body>
						"INLINE_BEFORE_BODY" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"CHECK_BX_CSS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
						),
						"MOVE_STYLE_BOTTOM" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
						),
						"DOUBLE_CONVERT_UTF8_FOR_WINDOWS_1251" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
						),
					),
				),
			),
		),
		"js" => array(
			"options" => array(
				"ACTIVE" => array(
					"TYPE" => "checkbox",
					"DEFAULT" => "N",
					"SHORT" => "Y",
				),
			),
			"groups" => array(
				"minify" => array(
					"options" => array(
						//��������������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//����������
						"LIBRARY" => array(
							"TYPE" => "select.options",
							"DEFAULT" => $strDefaultLibraryJs,
							"SHORT" => "Y",
							"VARIANTS" => $arLibraryJs,
						),
						//�� �������������� �����
						"EXCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������������� �����
						"INCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"external_js" => array(
					"options" => array(
						//�������������� ���������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//���������
						"EXCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => implode("\n", array("https://www.googletagmanager.com/")),
							"SHORT" => "N",
						),
						//��������
						"INCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"outline_js" => array(
					"options" => array(
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"INCLUDE_CONTENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "window.lazySizesConfig = window.lazySizesConfig\n",
							"SHORT" => "N",
						),
						"EXCLUDE_CONTENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "if(!window.BX)window.BX={};\nBX.setCSSList\n(window.BX||top.BX).message\nBX.setJSList\nbxSession\n_ba.push\nMENU_URL\nBXHotKeys.Add\nBX.admin\nBXHotKeys\nwindow.oBXSticker\nBitrixSmallCart\nJCTitleSearch\nBX.Iblock.SmartFilter\nBX.message\nJCSaleProductsGiftSectionComponent\nBX.Currency\nJCCatalogItem\nJCCatalogSectionComponent\nmailSender\nvar phpVars\namminaRegions\nbx_basket\nBX.Main.Menu\nJCSmartFilter",
							"SHORT" => "N",
						),
					)
				),
				"other" => array(
					"options" => array(
						//�������� JS inline � ��������
						"INLINE_JS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//������������ ������ JS ��� inline
						"MAX_SIZE_INLINE" => array(
							"TYPE" => "text.bytes",
							"DEFAULT" => "65536",
							"SHORT" => "Y",
						),
						"DOUBLE_CONVERT_WIN1251" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						/****
						 * //���������� � JS ����� Outline JS
						 * "OUTLINE_JS" => array(
						 * "TYPE" => "checkbox",
						 * "DEFAULT" => "Y",
						 * "SHORT" => "Y",
						 * ),
						 * //����������� ������ ouline js ��� ���������� � �����
						 * "MIN_SIZE_OUTLINE" => array(
						 * "TYPE" => "text.bytes",
						 * "DEFAULT" => "1024",
						 * ),
						 * //Outline js � ��������� ����
						 * "OUTLINE_TO_SEPARATE" => array(
						 * "TYPE" => "checkbox",
						 * "DEFAULT" => "Y",
						 * "SHORT" => "Y",
						 * ),
						 * //��������������/�������������� inline JS
						 * "OPTIMIZE_INLINE" => array(
						 * "TYPE" => "checkbox",
						 * "DEFAULT" => "Y",
						 * "SHORT" => "Y",
						 * ),*/
						//��������� �� ����������� JS �����
						"EXCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
						),
					),
				),
				"ext" => array(
					"options" => array(
						//�������������� ��������� ������ ����
						"CHECK_CORE_FILES" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"JOIN_MODEL" => array(
							"TYPE" => "select.options",
							"DEFAULT" => "keeporder",
							"SHORT" => "Y",
							"VARIANTS" => array(
								"keeporder" => array(),
								"notjoin" => array(),
								"onlypreload" => array(),
								"bundle" => array(),
							)
						),
						"SET_DEFER" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"EXCLUDE_DEFER" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
						),
						"INCLUDE_DEFER" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
						),
						"COMPOSITE_MOVE_END" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"COMPOSITE_MOVE_TIMEOUT" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"COMPOSITE_MOVE_TIMEOUT_VALUE" => array(
							"TYPE" => "text",
							"DEFAULT" => "1000",
						),
					),
				),
			),
		),
		"images" => array(
			"options" => array(
				"ACTIVE" => array(
					"TYPE" => "checkbox",
					"DEFAULT" => "N",
					"SHORT" => "Y",
				),
			),
			"groups" => array(
				"search_model" => array(
					"options" => array(
						//������������ ��� IMG
						"CHECK_IMG" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"CHECK_SRCSET_IMG" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//������������ ����� background[-image]
						"CHECK_BACKGROUND" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//������������ data-src
						"CHECK_DATA_SRC" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//������������ ��� ���������
						"CHECK_ATTRIBUTES" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//������������ ��� � ��������
						"CHECK_ALL_OTHER" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
					)
				),
				"jpg_files" => array(
					"options" => array(
						//�������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//��������
						"QUALITY" => array(
							"TYPE" => "text",
							"DEFAULT" => "80",
							"SHORT" => "N",
						),
						/*
						//��������� ������ ����������� (��� ����) �� ���������
						"IMAGES_FROM_DIR" => array(
							"TYPE" => "files.static",
							"DEFAULT" => array("/upload/", "/local/templates/", "/bitrix/templates/"),
							"SHORT" => "N",
						),
						*/
						//���������� �����������
						"LIBRARY" => array(
							"TYPE" => "select.options",
							"DEFAULT" => $strDefaultLibraryImagesJpg,
							"SHORT" => "Y",
							"VARIANTS" => $arLibraryImagesJpg,
						),
						//��������� �����
						"EXCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� �����
						"INCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//������������� � WebP
						"CONVERT_WEBP" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//��������� �����
						"EXCLUDE_WEBP_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� �����
						"INCLUDE_WEBP_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"png_files" => array(
					"options" => array(
						//��������� PNG ������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//���������� �����������
						"LIBRARY" => array(
							"TYPE" => "select.options",
							"DEFAULT" => $strDefaultLibraryImagesPng,
							"SHORT" => "Y",
							"VARIANTS" => $arLibraryImagesPng,
						),
						//��������� �����
						"EXCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� �����
						"INCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//������������� � WebP
						"CONVERT_WEBP" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//��������� �� ����������� �����
						"EXCLUDE_WEBP_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� � ����������� �����
						"INCLUDE_WEBP_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//������������� � JPG
						"CONVERT_JPG" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//��������� �� ����������� �����
						"EXCLUDE_JPG_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� � ����������� �����
						"INCLUDE_JPG_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"gif_files" => array(
					"options" => array(
						//��������� HIF ������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//��������
						"QUALITY" => array(
							"TYPE" => "text",
							"DEFAULT" => "75",
							"SHORT" => "N",
						),
						//���������� �����������
						"LIBRARY" => array(
							"TYPE" => "select.options",
							"DEFAULT" => "phpimagick",
							"SHORT" => "Y",
							"VARIANTS" => $arLibraryImagesGif,
						),
						//��������� �����
						"EXCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� �����
						"INCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//������������� � WebP
						"CONVERT_WEBP" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//��������� �� ����������� �����
						"EXCLUDE_WEBP_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� � ����������� �����
						"INCLUDE_WEBP_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//������������� � JPG
						"CONVERT_JPG" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//��������� �� ����������� �����
						"EXCLUDE_JPG_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� � ����������� �����
						"INCLUDE_JPG_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"svg_files" => array(
					"options" => array(
						//�������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						/*
						//��������� ������ ����������� (��� ����) �� ���������
						"IMAGES_FROM_DIR" => array(
							"TYPE" => "files.static",
							"DEFAULT" => array("/upload/", "/local/templates/", "/bitrix/templates/"),
							"SHORT" => "N",
						),
						*/
						//���������� �����������
						"LIBRARY" => array(
							"TYPE" => "select.options",
							"DEFAULT" => $strDefaultLibraryImagesSvg,
							"SHORT" => "Y",
							"VARIANTS" => $arLibraryImagesSvg,
						),
						//��������� �����
						"EXCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� �����
						"INCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"webp_files" => array(
					"options" => array(
						//�������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//��������
						"QUALITY" => array(
							"TYPE" => "text",
							"DEFAULT" => "80",
							"SHORT" => "N",
						),
						//���������� �����������
						"LIBRARY" => array(
							"TYPE" => "select.options",
							"DEFAULT" => $strDefaultLibraryImagesWebP,
							"SHORT" => "Y",
							"VARIANTS" => $arLibraryImagesWebP,
						),
						//��������� �����
						"EXCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//�������� �����
						"INCLUDE_FILES" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"external_images" => array(
					"options" => array(
						//�������������� ���������
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//���������
						"EXCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//��������
						"INCLUDE" => array(
							"TYPE" => "files.static",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					),
				),
				"other" => array(
					"options" => array(
						//���������� ����������� Inline
						"INLINE_IMG" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//������������ ������ inline �����������
						"MAX_SIZE_INLINE" => array(
							"TYPE" => "text.bytes",
							"DEFAULT" => "2048",
						),
						//���� ������ ��� inline �����������
						"INLINE_TYPES" => array(
							"TYPE" => "text",
							"DEFAULT" => "jpg,jpeg,png,gif,svg,webp",
						),
						"NOT_CHANGE_ORIGINALS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						"ADD_DECODE_ATTRIBUTE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"INCLUDE_DATA_ORIGIN" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						/*//�������� ������ ����������� � ������������ � ����������� data
						"RESIZE_IMG" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),*/
						/*//�������� ��� IMG �� ��� Picture ��� �����������
						"IMG_TO_PICTURE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),*/
					),
				),
			),
		),
		"lazy" => array(
			"options" => array(
				"ACTIVE" => array(
					"TYPE" => "checkbox",
					"DEFAULT" => "N",
					"SHORT" => "Y",
				),
			),
			"groups" => array(
				"images" => array(
					"options" => array(
						//������������ LazyLaod
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//����� ��� ���������� ��������
						"LAZY_CLASS" => array(
							"TYPE" => "text",
							"DEFAULT" => "lazy",
							"SHORT" => "Y",
						),
						"LAZY_TAGS" => array(
							"TYPE" => "text",
							"DEFAULT" => "img, div, a, li, span, tr, td",
							"SHORT" => "Y",
						),
						"IGNORE_CLASS" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "top_big_one_banner\ntop_big_banners\nsection-banner-top\nlogo",
							"SHORT" => "N",
						),
						"IGNORE_IDENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"PERCENT_DISPLAY" => array(
							"TYPE" => "text",
							"DEFAULT" => "1",
							"SHORT" => "N",
						),
						//��� lazyLoad
						"TYPE" => array(
							"TYPE" => "select",
							"DEFAULT" => "blur",
							"SHORT" => "N",
							"VARIANTS" => array(
								"blur" => array(),
								//"blurgrey" => array(),
								"mainimg" => array(),
							),
						),
						"MAINIMG" => array(
							"TYPE" => "file",
							"DEFAULT" => "/bitrix/images/ammina.optimizer/spacer.gif",
							"SHORT" => "N",
						),
						"BLUR_MAX_WIDTH_OR_HEIGHT" => array(
							"TYPE" => "text",
							"DEFAULT" => "200",
							"SHORT" => "N",
						),
						"BLUR_BACK_ORIGINAL_SIZE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "N",
						),
						"BLUR_RADIUS" => array(
							"TYPE" => "text",
							"DEFAULT" => "30",
							"SHORT" => "N",
						),
						"BLUR_SIGMA" => array(
							"TYPE" => "text",
							"DEFAULT" => "5",
							"SHORT" => "N",
						),
						"BLUR_QUANTITY" => array(
							"TYPE" => "text",
							"DEFAULT" => "50",
							"SHORT" => "N",
						),
						//������������� � WebP
						"CONVERT_WEBP" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"INLINE_IMG" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"MAX_SIZE_INLINE" => array(
							"TYPE" => "text.bytes",
							"DEFAULT" => "8192",
						)
					),
				),
				"iframe" => array(
					"options" => array(
						//������������ LazyLaod
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"PERCENT_DISPLAY" => array(
							"TYPE" => "text",
							"DEFAULT" => "1",
							"SHORT" => "N",
						),
						"WAIT_URL" => array(
							"TYPE" => "text",
							"DEFAULT" => "/bitrix/images/ammina.optimizer/spacer.gif",
							"SHORT" => "N",
						),
						"IGNORE_CLASS" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"IGNORE_IDENT" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"URL_EXCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"URL_INCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					)
				),
				"antilazy" => array(
					"options" => array(
						//�������� ��������� lazyload
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"LAZY_CLASSES" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "lazy\nswiper-lazy\nlozad",
							"SHORT" => "N",
						),
						"LAZY_ATTR" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "data-lazyload",
							"SHORT" => "N",
						),
						"IMG_SRC_ATTR" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "data-src",
							"SHORT" => "N",
						),
						"BG_STYLE_ATTR" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "data-bg\ndata-background\ndata-background-image",
							"SHORT" => "N",
						),
					)
				),
				"js" => array(
					"options" => array(
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"TIME" => array(
							"TYPE" => "text",
							"DEFAULT" => "5000",
							"SHORT" => "N",
						),
						"TIME_BETWEEN_EXECUTE" => array(
							"TYPE" => "text",
							"DEFAULT" => "200",
							"SHORT" => "N",
						),
						"DELAY_YMETRIKA" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_GTM" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_GANALYTICS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_GRECAPTCHA" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_ROISTAT" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_BITRIXINFO" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_BITRIXSPREAD" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_BITRIX24" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_JIVOSITE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_REGMARKETS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_LIVETEX" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_TALKME" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_YACHAT" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_REDHELPER" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_SENDPULSE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_MAILRU" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_RAMBLERRU" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_YANDEXMAPS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_FACEBOOK" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"DELAY_VK" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"OTHER_URL_EXCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"OTHER_URL_INCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"OTHER_JSCONTENT_EXCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"OTHER_JSCONTENT_INCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					)
				),
				"js_main" => array(
					"options" => array(
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"MODEL_DELAY" => array(
							"TYPE" => "select",
							"SHORT" => "Y",
							"DEFAULT" => "variant3",
							"VARIANTS" => array(
								"variant1" => array(),
								"variant2" => array(),
								"variant3" => array()
							),
						),
						"TIME" => array(
							"TYPE" => "text",
							"DEFAULT" => "1000",
							"SHORT" => "N",
						),
						"TIME_BETWEEN_EXECUTE" => array(
							"TYPE" => "text",
							"DEFAULT" => "200",
							"SHORT" => "N",
						),
						"TIME_BETWEEN_CONTENT_EXECUTE" => array(
							"TYPE" => "text",
							"DEFAULT" => "100",
							"SHORT" => "N",
						),
						"JSURL_EXCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"JSURL_INCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"JSCONTENT_EXCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"JSCONTENT_INCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						"DISABLE_FOR_GROUPS" => array(
							"TYPE" => "text",
							"DEFAULT" => "1",
							"SHORT" => "N",
						),
					)
				),
				"css" => array(
					"options" => array(
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"MODE" => array(
							"TYPE" => "select",
							"DEFAULT" => "xhr",
							"SHORT" => "Y",
							"VARIANTS" => array(
								"xhr" => array(),
								"xhrlink" => array(),
							),
						),
						"WAIT" => array(
							"TYPE" => "text",
							"DEFAULT" => "1000",
						),
						"URL_EXCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "PART:/css/blocks/dark-light-theme",
							"SHORT" => "N",
						),
						"URL_INCLUDE" => array(
							"TYPE" => "textarea",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
					)
				),
			)
		),
		"html" => array(
			"options" => array(
				"ACTIVE" => array(
					"TYPE" => "checkbox",
					"DEFAULT" => "N",
					"SHORT" => "Y",
				),
			),
			"groups" => array(
				"tags" => array(
					"options" => array(
						"ACTIVE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//������� �����������
						"REMOVE_COMMENTS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "N",
						),
						//������� ��� pre
						"REMOVE_PRE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "N",
						),
						//������� ������ ��������� ���� script
						"REMOVE_ATTR_SCRIPT" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "N",
						),
						//������� ������ ��������� ���� style
						"REMOVE_ATTR_STYLE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "N",
						),
						//������� ������ �������, ��������� � ��
						"REMOVE_WHITE_SPACE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "N",
						),
					),
				),
			),
		),
		"other" => array(
			"options" => array(
				"ACTIVE" => array(
					"TYPE" => "checkbox",
					"DEFAULT" => "N",
					"SHORT" => "Y",
				),
			),
			"groups" => array(
				"headers" => array(
					"options" => array(
						//���������� ��������� preload
						"ACTIVE_PRELOAD" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//�������� preload ����������
						"PRELOAD" => array(
							"TYPE" => "headers.preload",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//���������� ��������� prefetch
						"ACTIVE_PREFETCH" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//�������� prefetch ����������
						"PREFETCH" => array(
							"TYPE" => "headers.prefetch",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//���������� ��������� preconnect
						"ACTIVE_PRECONNECT" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "N",
							"SHORT" => "Y",
						),
						//�������� preconnect ����������
						"PRECONNECT" => array(
							"TYPE" => "headers.preconnect",
							"DEFAULT" => "",
							"SHORT" => "N",
						),
						//��������� UserAgent ��� �������� prefetch/preconnect ����������
						"ACTIVE_USERAGENTS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
					),
				),
				"links" => array(
					"options" => array(
						"DELETE_OLD_LINKS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//���������� � HTML ����� ���� link � ������������ � ����������� headers
						"SET_LINKS" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						"ONLY_COMPOSITE" => array(
							"TYPE" => "checkbox",
							"DEFAULT" => "Y",
							"SHORT" => "Y",
						),
						//��� ������ �� ��������� (��� ���������)
						"LINKS_TYPE" => array(
							"TYPE" => "select",
							"DEFAULT" => "preload",
							"SHORT" => "Y",
							"VARIANTS" => array(
								"prefetch" => array(),
								"preload" => array(),
							),
						),
					),
				),
			),
		),
	),
);