<?php
/**
 * Created by PhpStorm.
 * User: hamze
 * Date: 11/26/2018
 * Time: 10:38 AM
 */

class Router
{
    protected $routes;
    protected $requestUri;

    public function __construct($routes, $requestUri)
    {
        $this->routes = $routes;
        $this->requestUri = $requestUri;

    }

    public function checkRoute()
    {
        if (isset($this->routes[$this->requestUri])) {
            var_dump($this->routes[$this->requestUri]);
            $this->callFunction();
        } else {
            echo "not found";
        }
    }

    public function callFunction($fragment=null, $id=null)
    {
        $numeController=$this->routes[$this->requestUri]["controller"];
        $numeActiune=$this->routes[$this->requestUri]["action"];


        require_once "../app/controllers/".$numeController.".php";

        preg_match('/\d+/', $fragment, $id);


        $pageController=new $numeController();
        $pageController->$numeActiune();
    }


}