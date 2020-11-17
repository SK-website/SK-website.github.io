<?php

require_once CORE.'/Controller.php';

class DashboardController extends Controller
{
    public function index()
    {
        $this->view->render('admin/index', ['title'=>"Dashboard"], 'admin');
    }

}
