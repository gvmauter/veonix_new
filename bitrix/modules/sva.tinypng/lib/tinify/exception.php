<?php

namespace Sva\TinyPng\Tinify;

class Exception extends \Exception {
    public static function create($message, $type, $status) {
        if ($status == 401 || $status == 429) {
            $klass = "Sva\TinyPng\Tinify\AccountException";
        } else if($status >= 400 && $status <= 499) {
            $klass = "Sva\TinyPng\Tinify\ClientException";
        } else if($status >= 500 && $status <= 599) {
            $klass = "Sva\TinyPng\Tinify\ServerException";
        } else {
            $klass = "Sva\TinyPng\Tinify\Exception";
        }

        if (empty($message)) $message = "No message was provided";
        return new $klass($message, $type, $status);
    }

    function __construct($message, $type = NULL, $status = NULL) {
        if ($status) {
            $this->status = $status;
            parent::__construct($message . " (HTTP " . $status . "/" . $type . ")");
        } else {
            parent::__construct($message);
        }
    }
}
