<?php
/**
 * User: Ro Kovalenko
 * Date: 12/30/2017
 * Time: 7:58 PM
 */


class Index_model extends Model
{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        require 'views/Header.php';
        require 'views/index/index.php';
        require 'views/Footer.php';

    }
}