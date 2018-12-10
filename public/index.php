<?php
/**
 * Created by PhpStorm.
 * User: hamze
 * Date: 11/12/2018
 * Time: 10:39 AM
 */
require_once "../app/config.php";
require_once "../src/Router.php";
require_once "../app/routes.php";

ini_set("display_errors", 0);
ini_set("error_log", __DIR__."/../logs/error.log");
error_reporting(0);
if($config["env"]=="dev"){
    ini_set("display_errors", 1);
    error_reporting(E_ALL);
}
$requestUri=$_SERVER["REQUEST_URI"];

$router=new Router($routes,$requestUri);
$router->checkRoute();
