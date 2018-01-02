<?php
/**
 * User: Ro Kovalenko
 * Date: 12/30/2017
 * Time: 1:19 PM
 */


class Router {

    private $URL ;
    private $controller;

    public function __construct(){

        /**
         * Simple example regarding OOP
         * How can you see, this constructor will do everything in short section of your code
         */

        // Begin

        //Default initialization
        $this->controller['class'] = '';
        $this->controller['method'] = '';
        $this->controller['parameters'] = '';
        $this->controller['flag'] = '';

        $this->parse();

       switch ($this->routing()){

           case 'index':
               require 'controllers/Index.php';
               $app_controller = new Index();
               $app_controller->index();
               break;
           case 'class':
               //require 'controllers/' . $this->controller['class'] .'.php';
               $app_controller = new $this->controller['class'];
               $app_controller->index();
               break;
           case 'class/method':
               //require 'controllers/' . $this->controller['class'] .'.php';
               $app_controller = new $this->controller['class'];
               $method = $this->controller['method'];
               $app_controller->$method($this->controller['parameters']);
               break;
           case 'error':
              require 'controllers/Error_404.php';
              $app_controller = new Error_404();

              break;

       }

       // End
    }

   private function parse(){


       // Getting url
       $this->URL = rtrim($_SERVER['REQUEST_URI'], '/');
       // Parse by '/'
       $this->URL = explode('/',$this->URL);
       // Prepare controller name for check

       if(!empty($this->URL[1])){

           //if class name isn't null
           $this->controller['class'] = $this->URL[1];
       }

       if(!empty($this->URL[2])){

           //if method name isn't null
           $this->controller['method'] = $this->URL[2];
       }

       if(!empty($this->URL[3])){
           //if method name isn't null
           $this->controller['parameters'] = $this->URL[3];
       }


   }

   private function routing(){

       if(empty($this->controller['class'])){

           return 'index';

       }else{

               if(file_exists('controllers/'.$this->controller['class'].'.php')){

                   require 'controllers/' . $this->controller['class'] .'.php';

                   $test_app_controller = new $this->controller['class'];



                   if(!empty($this->controller['method'])){


                       if(method_exists($test_app_controller,$this->controller['method'])){

                           $this->controller['flag'] = 2;
                           return 'class/method';

                       }else {

                           $this->controller['flag'] = 0;
                           return 'error';
                       }

                   }


                   $this->controller['flag'] = 1;
                   return 'class';


               }else {

                   $this->controller['flag'] = 0;
                   return 'error';

               }
           }
       }


}

