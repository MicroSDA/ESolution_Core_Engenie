<?php
/**
 * User: Ro Kovalenko
 * Date: 12/30/2017
 * Time: 1:19 PM
 */

require 'models/Test_model.php';

class Test extends Controller
{

   public function __construct(){

       parent::__construct();
   }

   public function index(){

       $models = new Test_model();
       $models->index();
   }

   public function method($parametrs_income){

      $this->parameters = $parametrs_income;

   }

}