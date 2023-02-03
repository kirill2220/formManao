<?php
require "Class/db.classes.php";
require "Class/signup.classes.php";
require "Class/signup-contr.classes.php";

session_start();
$i=0;
if(isset($_POST['login'])) {
    $login=preg_replace('/\s+/', '', $_POST['login']);
    $password=preg_replace('/\s+/', '', $_POST['password']);
    $Confirm_password=preg_replace('/\s+/', '', $_POST['Confirm_password']);
    $name=preg_replace('/\s+/', '', $_POST['name']);
    $email=preg_replace('/\s+/', '', $_POST['email']);
$signup=new SignupContr($login,$email,$name,$password,$Confirm_password);
$signup->signupUser();



}
