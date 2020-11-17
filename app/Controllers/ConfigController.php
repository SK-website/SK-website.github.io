<?php

class ConfigController
{
    public function index()
    {
        $url = CONFIG . "/configs.json";
        $address = config('configs');
        $title = 'Edit Config';
        if ($_POST) {

            try {
                $email = $_POST['email'];
                if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                    throw new Exception($email);
                }
                $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_SPECIAL_CHARS);
                $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_SPECIAL_CHARS);
                $city =  filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS);
                $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

                $formdata = [
                    'email' => $email,
                    'country' => $country,
                    'street' => $street,
                    'city' => $city,
                    'mobile' => $mobile
                ];
                $json = json_encode($formdata);
                file_put_contents($url, $json);
                header('Location: /contact');
                exit();
            } catch (Exception $e) {
                echo "Caught Exception";
            }
        }
        render('config/index', compact('title', 'address'));
    }
}
