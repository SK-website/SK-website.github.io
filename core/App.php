<?php

require_once CORE.'/Request.php';
require_once CORE.'/Router.php';



class App
{
    public $request = null;

    public function __construct()
    {
        $this->request = new Request();
    }

    //Установка времени и локацииs
    private function init(){
        date_default_timezone_set('Europe/Kiev');
        setlocale(LC_ALL, 'uk_UA'); 
    }

    //Errors logging
    private function setErrorLogging(){

        if(APP_ENV == 'dev'){
        ini_set('display_startup_errors', 1); 
        error_reporting(E_ALL|E_WARNING|E_PARSE|E_NOTICE|E_DEPRECATED);
        ini_set('display_errors', 1);
        }else{
            error_reporting(E_ALL);
            ini_set('display_errors', 0);
        }

        ini_set('log_errors', 1);
        ini_set('error_log', LOGS.'/error.log');
    }

    public function run(){
        $this->init();
        $this->setErrorLogging();
        //create instance router
                (new Router($this->request))->run();
    }
}