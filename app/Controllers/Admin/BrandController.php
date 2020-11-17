<?php
// CRUD (API resourse controller)
require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Brand.php';

class BrandController extends Controller
{
    public function index() {
        $brands = (new Brand())->all();
        $title = "Brand List";
        $this->view->render('admin/brands/index', 
        compact('title', 'brands'), 'admin');

    }
    public function create() {
        $title = "Add New Brand";
        $this->view->render('admin/brands/create', 
        compact('title'), 'admin');
        
    }
    public function store() {
        $status = $this->request->data['status'] ? 1:0;
        (new Brand())->save(['name'=>$this->request->data['name'], 'description'=>$this->request->data['description'], 'status'=>$status]);
        return header('Location: /admin/brands');
        
    }
    public function show($vars) {
        extract($vars);
        $title = "Brand Detail";
        $brand = (new Brand())->getByPK($id);
        $this->view->render('admin/brands/show', 
        compact('title', 'brand'), 'admin');
        
        
    }
    public function edit($vars) {
        extract($vars);
        $title = "Brand Edit";
        $brand = (new Brand())->getByPK($id);
        $this->view->render('admin/brands/edit', 
        compact('title', 'brand'), 'admin');
        
    }
    public function update() {
        $status = $this->request->data['status'] ? 1:0;
        (new Brand())->update($this->request->data['id'], 
        ['name'=>$this->request->data['name'], 'description'=>$this->request->data['description'], 'status'=>$status]);
        return header('Location: /admin/brands');
        
    }
    public function destroy($vars) {
        extract($vars);
        if(isset($_POST['submit'])){
            (new Brand())->destroy($id);
            return header('Location: /admin/brands');

        }elseif(isset($_POST['reset'])){
            return header('Location: /admin/brands');
            
        }
        $title = "Delete Brand";
        $brand = (new Brand())->getByPK($id);
        $this->view->render('admin/brands/delete', 
        compact('title', 'brand'), 'admin');    
    }
}


    
