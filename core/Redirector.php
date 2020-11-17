<?php

class Redirector{

    public function redirect($location = ""){
        return header('Location: '. PUBLIC_ROOT . $location);
    }
} 