<?php
require 'Routes.php';
class Dispatch
{
    private $uri;
    private $routes;
    public function geturl()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->routes = new Routes();
        $this->routes->getRoute($this->uri);
        // echo $this->uri;
    }
    public function dispatcher()
    {
        $this->geturl();
        $class = ucfirst($this->routes->controller) . 'Controller';
        //echo $this->routes->controller;

        //hàm dispatcher này được gọi từ file index.php, cho nên khi require thì mình cần đứng từ vị trí của file index
        $controllerPath = 'Controllers/' . $class . '.php';
        //echo $controllerPath;
        require_once $controllerPath;
        $controller = new $class();

        return call_user_func_array([$controller, $this->routes->action], $this->routes->param);
    }
}
