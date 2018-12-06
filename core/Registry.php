<?php
/**
 * Реестр
 */

namespace core;


class Registry
{
    use TSingleton;

    /**
     * @var array набор свойств
     */
    protected static $properties = [];

    /**Установка свойств
     *
     * @param $name {mixed} Имя свойства
     * @param $value {mixed} значение
     */
    public function setProperty($name, $value) {
        self::$properties[$name] = $value;
    }

    /**
     * @param $name {mixed} Имя свойства
     *
     * @return mixed {mixed} начение
     */
    public static function getProperty($name) {
        if (isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
    }

    /**
     * @param $name mixed имя свойства реестра
     *
     * @return mixed все свойства реестра
     */
    public function getProperties() {
        return self::$properties;
    }
}