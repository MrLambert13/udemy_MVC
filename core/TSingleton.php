<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.12.2018
 * Time: 13:22
 */

namespace core;


trait TSingleton
{
    /** инстанс
     * @var
     */
    private static $instance;

    /**Заполняем объектом если его там нет, или возвращаем то что есть.
     * @return TSingleton
     */
    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}