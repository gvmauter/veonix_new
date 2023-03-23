<?php
namespace Mcart\Xls\Ajax;

use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;
use Mcart\Xls\McartXls;
use function check_bitrix_sessid;

Loc::loadMessages(__FILE__);

final class Ajax extends Actions{
    protected $requestPref = '';
    protected $obRequest;
    protected $arResult = [];

    public function __construct() {
        $this->requestPref = (string)McartXls::getRequestPref();
        $this->obRequest = Application::getInstance()->getContext()->getRequest();
    }

    public function execAction() {
        $GLOBALS['APPLICATION']->RestartBuffer();
        if (!check_bitrix_sessid() || !$this->obRequest->isAjaxRequest()) {
            die();
        }
        $postAct = $this->obRequest->getPost($this->requestPref.'act');
        if (!empty($postAct)) {
            $postAct = filter_var($postAct, FILTER_VALIDATE_REGEXP,
                array('options' => array('regexp' => '/^[_0-9A-z]+$/mis')));
        }
        if (empty($postAct)) {
            die();
        }
        $arActions = get_class_methods('Mcart\Xls\Ajax\Actions');
        $act = 'execAction'.$postAct;
        if (!in_array($act, $arActions)) {
            die();
        }
        $this->{$act}();
        $this->arResult['RESULT'] = intval($this->arResult['RESULT']);
        echo json_encode($this->arResult);
        die();
    }

}
