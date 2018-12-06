<?php
require_once dirname(__DIR__) . '/config/init.php';
new \core\App();

var_dump(\core\App::$app->getProperties());


