<?php
/**
 * Created by PhpStorm.
 * User: hamze
 * Date: 11/26/2018
 * Time: 10:38 AM
 */
namespace Framework;

class Router
{
    protected $routes;
    protected $requestUri;
    protected $queryString;

    public function __construct($routes, $requestUri, $queryString)
    {
        $this->routes = $routes;
        $this->requestUri = $requestUri;
        $this->queryString = $queryString;


    }

    public function checkRoute()
    {

        if($this->queryString){
            $linkCorect=explode("?", $this->requestUri);
            $this->requestUri = $linkCorect[0];
        }
        if(isset($this->routes[$this->requestUri]))
        {
            $this->callFunction($this->requestUri);
        }
        else{
            preg_match('/\d+/', $this->requestUri, $idNr);
            $link = $this->requestUri;

            $impart=explode("/", $link);
            $newLink=str_replace($impart[2], "{id}",$link);
            if($this->routes[$newLink])
            {
                $this->callFunction($newLink,$idNr[0]);
            }

        }
//
    }

    public function callFunction($newLink, $id=null)
    {
        $numeController=$this->routes[$newLink]["controller"];
        $numeActiune=$this->routes[$newLink]["action"];


        $controller='\\App\\Controllers\\'. $numeController;

        $pageController = new $controller();
        $pageController->$numeActiune($id, $this->queryString);

//        if($id=null){
//        $pageController->$numeActiune();
//        }else{
//            $pageController->$numeActiune($id[0]);
//
//        }


    }


}