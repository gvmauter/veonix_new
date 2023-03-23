<?php

namespace BXmaker\AutoSitemap\Exception;

/**
 * Базовое исключение, наследуется другими, которые относятся к модулю, для отделения исключений модуля от прочих исключений
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
     * Вернет кастомный код исклчюения
     * @return mixed
     */
    public function getCustomCode()
    {
        return $this->customCode;
    }
    /**
     * Вернет дополнительные данные исклчюения
     * @return array
     */
    public function getCustomData()
    {
        return $this->customData;
    }
    /**
     * Установить значение по ключу в дополнительных данны
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
     * Заменит дополнительные данные на новый набор
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