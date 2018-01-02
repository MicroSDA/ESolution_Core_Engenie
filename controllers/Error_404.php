<?php
/**
 * User: Ro Kovalenko
 * Date: 12/30/2017
 * Time: 1:19 PM
 */


require 'models/Error_404_model.php';

class Error_404 extends Controller
{

    public function __construct(){

        parent::__construct();

        $this->index();
    }

    public function index(){

        $models = new Error_404_model();
        $models->index();

    }
}