<?php
/**
 * User: Ro Kovalenko
 * Date: 12/30/2017
 * Time: 1:19 PM
 */


require 'models/Index_model.php';

class Index extends Controller
{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $models = new Index_model();
        $models->index();
    }

    public function method(){

    }
}