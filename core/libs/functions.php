<?php

/** служебная фунеция для вывода дебага
 *
 * @param array $arr - массив данных для вывода
 */
function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}