<?php
class Request
{
    public $data = [];
    public $query = [];

    public function __construct() {
        // $this->data = $this->cleanInput($_REQUEST);
        $this->data = $this->mergeData($_REQUEST, $_FILES);   
    }

    /**
     * merge post and files data
     * You shouldn't have two fields with the same 'name' attribute in $_POST & $_FILES
     *
     * @param  array $post
     * @param  array $files
     * @return array the merged array
     */
    private function mergeData(array $post, array $files){
        $post = $this->cleanInput($post);
        return array_merge($files, $post);
    }

    // public function __construct() {
    //  $this->data = $this->cleanInput($_REQUEST);
       
    // }
    
    //Функциии обраюботки запросов на маршрут
    public function uri(){
        if(isset($_SERVER['REQUEST_URI']) && !empty($_SERVER ['REQUEST_URI'])){
        return trim($_SERVER['REQUEST_URI'], '/');
        }
    }



    private function cleanInput($data){

        if(is_array($data)){
            $cleaned = [];
            foreach ($data as $key => $value){
                $cleaned[$key] = $this->cleanInput($value);
            }
            return $cleaned;
         }
        //такой способ очистки подходит только если кодировка ограничена UTF-8, 
        //а если допускаются другие, то он не подходит
        return trim(htmlentities($data, ENT_QUOTES)); 
       
    }
}
