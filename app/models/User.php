<?php
/**
 * Created by PhpStorm.
 * User: hamze
 * Date: 12/17/2018
 * Time: 1:26 PM
 */

namespace App\models;


use Framework\Model;

class User extends Model
{
    //we have to set specify the corresponding model for the table
    protected $table = "users";

}