<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.12.2018
 * Time: 13:10
 */

namespace core;


class ErrorHandler
{
    public function __construct() {
        if (DEBUG) {
            //передаем в функцию EOL = -1 т.е. показывать все ошибки
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        //назначаем обработку исключений
        set_exception_handler([$this, 'exceptionHandler']);
    }

    /** Метод обработки ошибок
     *
     * @param  $e вся информация об исключаниях
     */
    public function exceptionHandler($e) {
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    /**Логгирование ошибок
     *
     * @param string $message - текст ошибки
     * @param string $file - файл где произошла ошибка
     * @param string $line - строка на которой произошла обшика
     */
    protected function logErrors($message = '', $file = '', $line = '') {
        error_log(
            '[' . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n======================\n",
            3,
            ROOT . '/tmp/errors.log'
        );
    }

    /**
     * @param     $errno - номер ошибки
     * @param     $errstr - текст ошибки
     * @param     $errfile - файл в котором проихошла ощибка
     * @param     $errLine - строка
     * @param int $response - http код для браузера
     */
    protected function displayError($errno, $errstr, $errfile, $errLine, $response = 404) {
        //отправим заголовок
        http_response_code($response);
        //подключаем шаблон по условию
        if ($response === 404 && !DEBUG) {
            require WWW . '/errors/404.php';
            die;
        }
        if (DEBUG) {
            require WWW . '/errors/dev.php';
        } else {
            require WWW . '/errors/prod.php';
        }
        die;
    }
}