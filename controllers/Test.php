<?php
/**
 * User: Ro Kovalenko
 * Date: 12/30/2017
 * Time: 1:19 PM
 */



class Test extends Controller
{

   public function __construct(){

       parent::__construct();
   }

   public function index(){

        echo 'Test index';
   }

   public function method($parametrs_income){

      $this->parameters = $parametrs_income;

       echo $this->parameters.'<br>';
       echo 'Test method';
   }

}