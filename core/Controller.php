<?php

require_once CORE.'/View.php';

class Controller 
{
    protected $view;
    public $request;


    public function __construct(Request $request=null)
    {
        $this->request = $request!==null ? $request : new Request();
        $this->view = new View($this);
    }
} 