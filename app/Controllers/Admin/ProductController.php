<?php
// CRUD (API resourse controller)
require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Category.php';
require_once MODELS.'/Brand.php';
require_once MODELS.'/Product.php';

class ProductController extends Controller
{
    public function index() {
        $products = (new Product())->all();
        $title = "Product List";
        $this->view->render('admin/products/index', 
        compact('title', 'products'), 'admin');

    }
    public function create() {
        $title = "Add New Product";
        $categories = (new Category())->all();
        $brands = (new Brand())->all();
        $this->view->render('admin/products/create', 
        compact('title', 'categories', 'brands'), 'admin');
        
    }
    public function store() {

        if(!empty($this->request->data['image'])){
            $file = $this->request->data['image'];
            $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/assets/images/products';
            
            if(is_uploaded_file($file['tmp_name'])){
            $filename = sha1(mt_rand(1,9999), $file['name'].uniqid()).time();
            $uploaded = $uploadDir.'/'.$filename;
            move_uploaded_file($file['tmp_name'], $uploaded);
            
        }else {
            throw new Exception('Upload: Can\'t upload file.');
            }
        } 

        $status = $this->request->data['status'] ? 1:0;
        $is_new = $this->request->data['is_new'] ? 1:0;

        // var_dump('$this->request->data');
        // exit();

        (new Product())->save(['name'=>$this->request->data['name'], 
        'description'=>$this->request->data['description'], 
        'status'=>$status, 'is_new'=>$is_new,
        'brand_id'=>$this->request->data['brand_id'],
        'category_id'=>$this->request->data['category_id'],
        'price'=>$this->request->data['price'], 'image'=>$filename]);
        return header('Location: /admin/products');
        
    }


    public function show($vars) {
        extract($vars);
        $title = "Product Detail";
        $categories = (new Category())->all();
        $product = (new Product())->getByPK($id);
        $this->view->render('admin/products/show', 
        compact('title', 'product', 'categories'), 'admin');
        
        
    }
    public function edit($vars) {
        extract($vars);
        $title = "Product Edit";
        $product = (new Product())->getByPK($id);
        $categories = (new Category())->all();
        $brands = (new Brand())->all();
        $this->view->render('admin/products/edit', 
        compact('title', 'product', 'categories', 'brands'), 'admin');
        
    }
    public function update() {
        $status = $this->request->data['status'] ? 1:0;
        $is_new = $this->request->data['is_new'] ? 1:0;
        
        (new Product())->update($this->request->data['id'], 
        ['name'=>$this->request->data['name'], 
        'description'=>$this->request->data['description'], 
        'status'=>$status, 'is_new'=>$is_new,
        'brand_id'=>$this->request->data['brand_id'],
        'category_id'=>$this->request->data['category_id'],
        'price'=>$this->request->data['price']]); 
        return header('Location: /admin/products');
        
    }
    public function destroy($vars) {
        extract($vars);
        if(isset($_POST['submit'])){
            (new Product())->destroy($id);
            return header('Location: /admin/products');

        }elseif(isset($_POST['reset'])){
            return header('Location: /admin/products');
            
        }
        $title = "Delete Product";
        $product = (new Product())->getByPK($id);
        $this->view->render('admin/products/delete', 
        compact('title', 'product'), 'admin');
        
    }
}