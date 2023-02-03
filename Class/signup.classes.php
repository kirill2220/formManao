<?php
session_start();
class Signup extends DB {

protected function setUser($login,$email,$name,$password){
    $json=$this->connect();
    $arr = array(
        'login'     => $login,
        'email'    => $email,
        'password'     => $password,
        'name'    => $name
    );

    $arr['password']=md5($arr['password'].'Kirill');

    array_push($json, $arr);
    $json_string = json_encode($json);
    file_put_contents("bd/myBD.json", $json_string);
    $response=[
        "status"=>true,
        "message"=>"Пользователь успешно зарегистрирован",
    ];
    echo json_encode($response);
    die();
}
    protected  function checkUser($login,$email){
    $result=true;
        $json=$this->connect();
        foreach ($json as $pas){
            if($pas['login']==$login){
                $response=[
                    "status"=>false,
                    "type"=>2,
                    "message"=>"Такой login уже существует!",
                ];
                echo json_encode($response);

                $result=false;
                die();
            }
            if($pas['email']==$email){
                $response=[
                    "status"=>false,
                    "type"=>3,
                    "message"=>"Такой email уже существует!",
                ];
                echo json_encode($response);

                $result=false;
                die();
            }
        }
        return $result;
    }
}