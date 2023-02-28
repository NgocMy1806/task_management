<?php 
require 'db/Connection.php';
require 'router/Dispatch.php';
require_once 'Controllers/Controller.php';
// $db=Connection::getInstance();
// $query=$db->query('select * from tasks;');
// $tasks=$query->fetchAll();
// var_dump($tasks);

// cách check xem file connection.php của mình chạy đc ko
// $conn=new Connection();
// $query = $conn->getInstance()->query('select * from tasks;');
// $tasks=$query->fetchAll();
// var_dump($tasks);

session_start();
define ("DOMAIN",$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']);

$dispatcher = new Dispatch();
$dispatcher->dispatcher();

