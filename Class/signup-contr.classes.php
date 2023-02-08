<?php
class SignupContr extends  Signup {
    private $login;
    private $password;
    private $Confirm_password;
    private $name;
    private $email;
public function __construct($login,$email,$name,$password,$Confirm_password){
    $this->login=$login;
    $this->email=$email;
    $this->name=$name;
    $this->password=$password;
    $this->Confirm_password=$Confirm_password;
}

public function signupUser(){

    if($this->emptyInput()==false){
        exit();
    }
    if($this->checkLogin()==false){
        exit();
    }
    if($this->invalidEmail()==false){
        exit();
    }
    if($this->invalidPassword()==false){
        exit();
    }
    if($this->invalidConfrmPassword()==false){
        exit();
    }
    if($this->invalidName()==false){
        exit();
    }
    if($this->checkUser($this->login,$this->email)==false){
        exit();
    }
$this->setUser($this->login,$this->email,$this->name,$this->password);

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
    if($this->Confirm_password===''){
        $error_fields[]='Confirm_password';
    }
    if($this->name===''){
        $error_fields[]='name';
    }
    if($this->email===''){
        $error_fields[]='email';
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

    }
    return $result;
}
private  function  invalidName(){
    $result=true;
    if(strlen( $this->name) >=2  && preg_match('/^[a-zA-Z]+$/',$this->name) ){}
    else{
        $response=[
            "status"=>false,
            "type"=>6,
            "message"=>"Длинна имени должна быть не менее 3 и не более 1  символа и включает в себя буквы латинского алфаввита",
        ];
        $result=false;
        echo json_encode($response);

    }
    return $result;
}
    private  function  invalidEmail(){
        $result=true;
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $response=[
                "status"=>false,
                "type"=>3,
                "message"=>"Неверный формат email",
            ];
            echo json_encode($response);

            $result=false;
        }
        return $result;
    }

private  function  invalidPassword(){
    $result=true;
    if (strlen( $this->password)>=6  && preg_match('/[0-9]/',$this->password) && preg_match('/[A-Za-z]/',$this->password) ){}
    else{
        $response=[
            "status"=>false,
            "type"=>4,
            "message"=>"Длинна пароля должна быть не менее 6 символов и включать в себя цифры и буквы латинского алфаввита",
        ];
        $result=false;
        echo json_encode($response);

    }
    return $result;
}
    private  function  invalidConfrmPassword(){
        $result=true;
        if($this->Confirm_password!=$this->password ){
            $response=[
                "status"=>false,
                "type"=>5,
                "message"=>"Не совпадают пароли",
            ];
            $result=false;
            echo json_encode($response);

        }
        return $result;
    }
    private  function  checkLogin(){
        $result=true;
        if (strlen( $this->login)>=6){}
        else{
            $response=[
                "status"=>false,
                "type"=>2,
                "message"=>"линна логи не менее 6 символов",
            ];
            $result=false;
            echo json_encode($response);

        }
        return $result;
    }
 }