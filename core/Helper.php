  
<?php

class Helper{

    public static function asset($dir, $file){
        return $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR.'assets/images/'.
        $dir.DIRECTORY_SEPARATOR.$file;
    }
} 