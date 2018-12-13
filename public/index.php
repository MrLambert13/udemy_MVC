<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once LIB . '/functions.php';

new \core\App();
//\core\App::$app->setProperty('test', 'TEST');
//debug(\core\App::$app->getProperties());

throw new Exception('Старница не найдена', 404);