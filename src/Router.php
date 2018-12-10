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
        preg_match('/\d+/', $this->requestUri, $idNr);
        $link = $this->requestUri;

        $impart=explode("/", $link);

        $newLink=str_replace($impart[2], "{id}",$link);
        if (isset($this->routes[$newLink])) {
            if($idNr) {
                $this->callFunction($newLink, $idNr);
            }else {
                var_dump($this->routes[$this->requestUri]);
                $this->callFunction($this->requestUri);
            }
        } else {
            echo "not found";
        }
    }
//dd
    public function callFunction($newLink, $id=null)
    {
        $numeController=$this->routes[$newLink]["controller"];
        $numeActiune=$this->routes[$newLink]["action"];


        require_once "../app/controllers/".$numeController.".php";

        $pageController = new $numeController();
        $pageController->$numeActiune($id);

    }


}