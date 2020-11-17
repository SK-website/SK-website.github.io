<?php
//CRUD API resource controller
 require_once CORE.'/Controller.php';
 require_once CORE.'/Request.php';
 require_once MODELS.'/Guest.php';


class GuestbookController extends Controller
{
    public function index() {
        $guests = (new Guest())->all();
        $title = "Guests List";
        $this->view->render('admin/guests/index', compact('title', 'guests'), 'admin');

    }

    public function show($vars){

        extract($vars);
        //var_dump($id);
        $title = "Guest Data";
        $guests = (new Guest())->all();
        $guest = (new Guest())->getByPK($id);
        $this->view->render('admin/guests/show', compact('title', 'guest'), 'admin'); 
    }

    public function destroy($vars){
        extract($vars);
        if(isset($_POST['submit'])){
            (new Category())->destroy($id);
            return header('Location: /admin/guests');
        }elseif(isset($_POST['reset'])){
            return header('Location: /admin/guests');
        }
        $title = "Delete Guest";
        $category = (new Guest())->getByPK($id);
        $this->view->render('admin/guests/delete', compact('title', 'guest'), 'admin'); 
        
    }
}