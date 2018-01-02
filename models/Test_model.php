<?php
/**
 * Created by PhpStorm.
 * User: bansc
 * Date: 1/2/2018
 * Time: 5:47 PM
 */




class  Test_model extends Model
{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        require 'views/Header.php';
        require 'views/Test/index.php';
        require 'views/Footer.php';

    }
}