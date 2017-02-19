<?php
/**
 * Created by PhpStorm.
 * User: Stas Jalba
 * Date: 24.01.2017
 * Time: 16:06
 */

require_once __DIR__ . '/autoload.php';

function header_block(){
    echo '<a href="/site/softgroup_academy/task_3-4/book/all"> Книги </a>';
    echo '<a href="/site/softgroup_academy/task_3-4/author/all"> Автори </a>';
    echo '<a href="/site/softgroup_academy/task_3-4/edition/all"> Видавництва </a><br>';
}

header_block();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);


$ctrl = !empty($pathParts[4]) ? ucfirst($pathParts[4]) : 'Author';
$action = !empty($pathParts[5]) ? ucfirst($pathParts[5]) : 'All';

$controllerClassName = $ctrl . 'Controller';
$controllerPath = 'controllers/' . $controllerClassName . '.php';
$controllerClassName = file_exists($controllerPath) ? $controllerClassName : 'AuthorController';



try {
    $controller = new $controllerClassName;
    $actionName = 'action' . $action;
    $method = method_exists($controller, $actionName) ? $actionName : 'actionAll';
    $controller->$method();
} catch (Exception $exception){
    die('Its EXCEPTION: ' . $exception->getMessage());
}










