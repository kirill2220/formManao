<?php
session_start();
class LoginContr extends  Login {
    private $login;
    private $password;
    public function __construct($login,$password){
        $this->login=$login;
        $this->password=$password;
    }

    public function loginUser(){

        if($this->emptyInput()==false){
            exit();
        }
   
        $this->getUser($this->login,$this->password);

    }
    private  function emptyInput(){
        $result=true;
        $error_fields=[];
        if($this->password===''){
            $error_fields[]='password';
        }
        if($this->login===''){
            $error_fields[]='login';

        }
        if(!empty($error_fields)){
            $result=false;
            $response=[
                "status"=>false,
                "type"=>1,
                "message"=>"Заполните все поля",
                "fields"=>$error_fields
            ];
            echo json_encode($response);
die();
        }
        return $result;
    }

}