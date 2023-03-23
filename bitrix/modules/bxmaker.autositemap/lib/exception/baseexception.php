<?php

namespace BXmaker\AutoSitemap\Exception;

/**
 * ������� ����������, ����������� �������, ������� ��������� � ������, ��� ��������� ���������� ������ �� ������ ����������
 */
class BaseException extends \Exception
{
    protected $customCode;
    protected $customData;
    public function __construct($message, $customCode, $customData = array())
    {
        parent::__construct($message);
        $this->customCode = $customCode;
        $this->customData = $customData;
    }
    /**
     * ������ ��������� ��� ����������
     * @return mixed
     */
    public function getCustomCode()
    {
        return $this->customCode;
    }
    /**
     * ������ �������������� ������ ����������
     * @return array
     */
    public function getCustomData()
    {
        return $this->customData;
    }
    /**
     * ���������� �������� �� ����� � �������������� �����
     * @param string $name
     * @param mixed $value
     * @return $this
     */
    public function setCustomDataItem($name, $value)
    {
        $this->customData[$name] = $value;
        return $this;
    }
    /**
     * ������� �������������� ������ �� ����� �����
     * @param array $arData
     * @return $this
     */
    public function replaceCustomData($arData)
    {
        $this->customData = $arData;
        return $this;
    }
}
?>