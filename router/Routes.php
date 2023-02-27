<?php
class Routes
{
    private $controller = 'task';
    private $action = 'index';
    private $param;
    public function getRoute($uri)
    {
        if ($uri != '/'){
        $routeArray = explode('/', $uri);
        $this->controller = $routeArray[1]??'task';
        $this->action = $routeArray[2]??'index';
        $this->param=array_splice($routeArray,3,count($routeArray)-3)??[];
    }
    }

    // __get là magic method, $var là kiểu truyền biến đặc biệt, VD nếu mình truyền vào là __get (controller) thì sẽ return value của biến controller
    public function __get($var){
        if(!isset($this->{$var})){
       return null;
    }
    return $this->{$var}; 
    }
}

