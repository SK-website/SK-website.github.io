<?php
class View
{
    public $controller;

    public function __construct(Controller $controller)
    {
        $this->controller = $controller;
    }
    public function render($template, $data=[], $layout='site'){
        if($data){
            //var_dump($data);
            extract($data);
        }
       
        $template .= '.php';
        include_once VIEWS."/layouts/${layout}.php";
    }
}