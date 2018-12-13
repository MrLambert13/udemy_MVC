<?php
/**
 * Определяются константы, URL сайта и подключается автозагрузчик композера
 */

//константа для отображения ошибок, 1 - показывать, 0 - скрываь(логгировать)
define("DEBUG", 0);
//константа корня сайта
define("ROOT", dirname(__DIR__));
//константа папки public
define("WWW", ROOT . '/public');
//константа папки app
define("APP", ROOT . '/app');
//константа папки core
define("CORE", ROOT . '/core');
//константа папки libs
define("LIB", CORE . '/libs');
//константа папки cache
define("CACHE", ROOT . '/tmp/cache');
//константа папки config
define("CONF", ROOT . '/config');
//константа шаблона по умолчанию
define("LAYOUT", 'default');

//http://udemy/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}" . '<br>';
//http://udemy/
$app_path = preg_replace("#[^/]+$#", '', $app_path) . '<br>';
//http://udemy/
$app_path = preg_replace("/public/", '', $app_path) . '<br>';

define("PATH", $app_path);
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';