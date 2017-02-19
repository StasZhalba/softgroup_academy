<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 15.02.2017
 * Time: 12:05
 */

function __autoload($class){
    if (file_exists(__DIR__ . '/controllers/' . $class . '.php')){
        require __DIR__ . '/controllers/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/models/' . $class . '.php')){
        require __DIR__ . '/models/' . $class . '.php';
    }
    elseif (file_exists(__DIR__ . '/classes/' . $class . '.php')){
        require __DIR__ . '/classes/' . $class . '.php';
    }

}