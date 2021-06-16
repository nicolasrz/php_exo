<?php


function initRouter(){

    $controller = "home";

    if(isset($_GET['controller'])) {
        $controller = $_GET['controller'];
    }

    $controller = ucfirst($controller) . 'Controller';
    include('Controller/'.$controller.'.php');

    $action = "showAllBooks";
    if(isset($_GET['action'])) {
        $action = $_GET['action'];
    }

    $action();


}