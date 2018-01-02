<?php
/**
 * Created by PhpStorm.
 * User: bansc
 * Date: 12/30/2017
 * Time: 10:36 PM
 */




class Error_404_model extends Model
{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        require 'views/Header.php';
        require 'views/Error_404/index.php';
        require 'views/Footer.php';

    }
}