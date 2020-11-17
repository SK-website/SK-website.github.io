<?php

require_once CORE.'/Controller.php';

class AboutController  extends Controller
{
    public function index()
    {
        $this->view->render('about/index', ['title' => "О Галерее"]);
    }
}

