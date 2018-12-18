<?php
/**
 * Created by PhpStorm.
 * User: hamze
 * Date: 12/3/2018
 * Time: 11:45 AM
 */
namespace App\Controllers;
use Framework\Controller;

class UserController extends Controller
{
    public function showAction($id, $queryString)
    {
        $text="Hello User Controller".$queryString.$id;

        echo $text;
    }

    public function index()
    {
//        return $this->view(“user/index.html”);
    }

}