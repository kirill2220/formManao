<?php
session_start();
class Login extends DB {

    protected function getUser($login,$password){
        $json=$this->connect();
        $password= md5($password.'Kirill');
        foreach ($json as $msg) {
            if ($login == $msg['login'] && $password == $msg['password']) {
                $user = $msg;
                $_SESSION['user'] = [
                    "name" => $user['name']
                ];
                setcookie('user', $user['name'], time() + 10, "/");
                $response =[
                    "status"=> true
                ];
                echo json_encode($response);
            }
        }
        if (!isset($_COOKIE['user'])){
            $response =[
                "status"=> false,
                "message"=>"Неверный логин или пароль",
            ];
            echo json_encode($response);
        }
    }

}