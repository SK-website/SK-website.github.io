<?php


//
class Router 
{

    public $request; 
    protected $routes = ROUTES;
    
    
    public function  __construct(Request $request)
    {
        $this->request = $request !==null ? $request : new Request();
    }
    
    private function getController($path){
        $segments = explode('\\', $path);
        list($controller, $action) = explode('@',array_pop($segments));
        $controllerPath = '/';
        foreach($segments as $segment){
            $controllerPath .= $segment.'/'; 
        } 
        var_dump([$controllerPath, $controller, $action]);
        return [$controllerPath, $controller, $action];
       
    }
    private function init($controllerPath, $controller, $action, $vars=[])
    {
        $controllerPath = CONTROLLERS . $controllerPath . $controller . '.php';
        if (file_exists($controllerPath)) {
            include_once $controllerPath;
            $controller = new $controller();
        }
        return $controller->$action($vars);
    }
   

    public function run(){
        if (array_key_exists($this->request->uri(),$this->routes)){
            return $this->init(...$this->getController($this->routes[$this->request->uri()]));
        }else{
            foreach ($this->routes as $key => $value){
                $pattern = "@^".preg_replace('/{([a-zA-Z0-9]+)}/', '(?<$1>[0-9]+)', $key)."$@";
                preg_match($pattern, $this->request->uri(), $matches);
                if($matches){
                    $arr = $this->getController($value);
                    $arr[] = $matches;
                    return $this->init(...$arr);                }
            }
            return $this->init(...$this->getController($this->routes['404']));
            // include_once CONTROLLERS/'./ErrorController.php';
            // (new ErrorController())->notFound();
        }

        
    }
}

// $result = null;

// try{
//     $routes = require_once CONFIG.'/routes.php';
// }catch(Exception $e){
//     error_log($e->getMessage());
// }


