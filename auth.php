<?php
require "Class/db.classes.php";
require "Class/login.classes.php";
require "Class/login-contr.classes.php";

session_start();

if(isset($_POST['login'])) {
    $i = 0;
    $salt = 'kirill';
    $json = file_get_contents("bd/myBD.json");
    $obj = json_decode($json, true);
    $login = preg_replace('/\s+/', '', $_POST['login']);
    $password=preg_replace('/\s+/', '', $_POST['password']);
    $user=new LoginContr($login,$password);
    $user->loginUser();


}