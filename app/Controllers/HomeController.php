
<?php
require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
 require_once MODELS.'/Category.php';
 require_once MODELS.'/Product.php';

class HomeController extends Controller
{
    // public function __construct()
    // {
    //    //render('home/index');
    // }
    public function index()
    {
        $this->view->render('home/index');
    }

    
    public function getProducts()
    { 
     
        $products = (new Product)->all();
        var_dump($products);
        exit();
        echo json_encode($products);
    }

    public function getProduct($vars)
    {
        extract($vars);
        $product = (new Product)->getByPK($id);
        echo json_encode($product);
    }

    public function getCategories()
    {
        $categories = (new Category)->all();
        echo json_encode($categories);
    }

    public function getCategoriesWithCount()   {
        $sql = "SELECT COUNT(*) count_product, category_id, categories.* FROM products 
        INNER JOIN categories
        ON categories.id = products.category_id
        WHERE categories.status =1 GROUP BY category_id";
        $categories = (new Category)->getWithSql($sql);
        echo json_encode($categories);
    }
    
}

