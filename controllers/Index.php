<?php
/**
 * User: Ro Kovalenko
 * Date: 12/30/2017
 * Time: 1:19 PM
 */

require './models/Index_model.php';

class Index extends Controller
{

    public function __construct(){

        parent::__construct();

    }

    public function index(){

        $views = new Index_model();
        $views->index();
    }

    public function method(){

    }
}