<?php
/**
 * User: Ro Kovalenko
 * Date: 12/30/2017
 * Time: 1:19 PM
 */



class Router {

    private $URL ;
    private $controller;
    private $app_controller;

    public function __construct(){

        /**
         * Simple example regarding OOP
         * How can you see, this constructor will do everything in short section of your code
         */

        // Begin
        $this->controller['class'] = '';
        $this->controller['method'] = '';
        $this->controller['parameters'] = '';

       $this->parse();

       switch ($this->routing()){

           case 'index':
               echo 'index';
               break;
           case 'class':
               echo 'class';
               break;
           case 'class/method':
               echo 'class/method';
               break;
           case 'error':
               echo 'error';
               break;

       }

       // End
    }

   private function parse(){


       //echo $_SERVER['REQUEST_URI'].'<br>';

       // Getting url
       $this->URL = rtrim($_SERVER['REQUEST_URI'], '/');
       // Parse by '/'
       $this->URL = explode('/',$this->URL);
       // Prepare controller name for check

       if(!empty($this->URL[2])){
           //if class name isn't null
           $this->controller['class'] = $this->URL[2];
       }

       if(!empty($this->URL[3])){
           //if method name isn't null
           $this->controller['method'] = $this->URL[3];
       }

       if(!empty($this->URL[4])){
           //if parameters aren't null
           $this->controller['parameters'] = $this->URL[4];
       }


   }

   private function routing(){

       if(empty($this->controller['class'])){

           // Url is empty -> redirect to index
           //$controller = new Index();
          // $controller->index();
           return 'index';

       }else{

           if(file_exists('controllers/'.$this->controller['class'].'.php')){

               require 'controllers/'.$this->controller['class'].'.php';

               $this->app_controller = new $this->controller['class'];

               if(method_exists($this->app_controller,$this->controller['method'])){

                   return 'class/method';
                   $this->controller['flag'] = 2;
               }

               $this->controller['flag'] = 3;
               return 'class';


           }else{
                   $this->controller['flag'] = 0;
                   return 'error';

               }
           }
       }


}

