<?php
//CRUD API resource controller
 require_once CORE.'/Controller.php';
 require_once CORE.'/Request.php';
 require_once MODELS.'/Category.php';
 require_once CORE.'/Request.php';


class CategoryController extends Controller
{
    public function index() {
        $categories = (new Category())->all();
        $title = "Categories List";
        $this->view->render('admin/categories/index', compact('title', 'categories'), 'admin');

    }

    public function create(){
        $title = "Create Category";
        $this->view->render('admin/categories/create', compact('title'), 'admin'); 

    }
    public function store(){
            //классическая процедура upload image
              if(!empty($this->request->data['image'])){
            $file = $this->request->data['image'];
            $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/assets/images/categories';

                if(is_uploaded_file($file['tmp_name'])){
                $filename = sha1(mt_rand(1,9999), $file['name'].uniqid()).time();
                $uploaded = $uploadDir.'/'.$filename;
                move_uploaded_file($file['tmp_name'], $uploaded);

            }else {
                throw new Exception('Upload: Can\'t upload file.');
                }
            } 
        $status = $this->request->data['status'] ? 1:0;
        (new Category())->save(['name'=>$this->request->data['name'], 
        'status'=>$status, 'image'=>$filename]);
        return header('Location: /admin/categories');
    }

    public function show($vars){

        extract($vars);
        //var_dump($id);
        $title = "Category Data";
   
        $category = (new Category())->getByPK($id);
        $this->view->render('admin/categories/show', compact('title', 'category'), 'admin'); 

    }
    public function edit($vars){
        extract($vars);
        $title = "Category Edit";
        $category = (new Category())->getByPK($id);
        $this->view->render('admin/categories/edit', compact('title', 'category'), 'admin'); 
    }

    public function update(){
        $status = $this->request->data['status'] ? 1 : 0;
        (new Category())->update($this->request->data['id'], ['name'=>$this->request->
        data['name'], 'status'=>$status]);
        return header('Location: /admin/categories');
    }

    public function destroy($vars){
        extract($vars);
        if(isset($_POST['submit'])){
            (new Category())->destroy($id);
            return header('Location: /admin/categories');
        }elseif(isset($_POST['reset'])){
            return header('Location: /admin/categories');
        }
        $title = "Delete Category";
        $category = (new Category())->getByPK($id);
        $this->view->render('admin/categories/delete', compact('title', 'category'), 'admin'); 


                
    }

    //диалог удаления
}


    
