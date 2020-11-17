<?php

require_once CORE.'/Controller.php';

class ContactController extends Controller
{
    public function index()
    {
        $config = require_once CONFIG.'/db.php';
        $address = config('configs');
        $title_1 ='Связаться с нами'; 
        $title_2 ='Контакты';
        $subtitle = 'Мы в социальных сетях';
        $messages = [];
        $error = null;
        $conn = mysqli_connect($config['db']['DB_HOST'], $config['DB_USERNAME'], $config
        ['DB_PASSWORD'], $config['db']['DB_NAME']);
        

        if(!empty($_POST)){
            try{
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $message =  mysqli_real_escape_string($conn, $_POST['message']);
                $subject = $_POST['subject'];
                $gender = filter_input(INPUT_POST, 'gender');

                $sql = "INSERT INTO guestbook (username, email, message, subject, gender) VALUES ('$username', 
                '$email', '$message', '$subject', '$gender')";
                
                mysqli_query($conn, $sql);

            }catch (Exception $e){
            $error = $e ->getMessage();
            }
        }   
 

        $this->view->render('contact/index', compact('title_1', 'title_2','subtitle', 'address', 'messages')); 
    }
}



 