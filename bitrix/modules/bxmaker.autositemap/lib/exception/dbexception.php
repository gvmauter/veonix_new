<?php

namespace BXmaker\AutoSitemap\Exception;

/**
 * ���������� ���������� ��� ������ ����������, ��������, ������� ������ � �������
 */
class DBException extends \BXmaker\AutoSitemap\Exception\BaseException
{
    public function __construct($result)
    {
        /**
         * @var \Bitrix\Main\Error
         */
        $result->getErrorCollection()->rewind();
        $error = $result->getErrorCollection()->current();
        parent::__construct($error->getMessage(), 'ERROR_DB');
    }
}
?>