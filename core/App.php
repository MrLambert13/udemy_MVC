<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.12.2018
 * Time: 13:09
 */

namespace core;


class App
{
    //контейнер для положения, состояния, хранилище в общем
    public static $app;

    public function __construct() {
        //Обрежем концевой слеш из адресной сроки(все что после 'домен/')
        $query = trim($_SERVER['QUERY_STRING'], '/');
        //запускаем сессию
        session_start();

        //объект реестра помещаем в контейнер
        self::$app = Registry::instance();

        self::getParams();
    }

    /**
     * Получение настрое и параметров из файла params.php
     */
    public static function getParams() {
        $params = require_once CONF . '/params.php';
        if (!empty($params)) {
            foreach ($params as $idx => $elem) {
                self::$app->setProperty($idx, $elem);
            }
        }
    }
}

