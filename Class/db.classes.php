<?php
session_start();
class DB{
 protected function connect(){
     $salt='Kirill';
     $file = "bd/myBD.json";
     $data=file_get_contents($file);
     if (empty($data)) {
         $json = [];
     } else {
         $json = json_decode($data, TRUE);
     }
     return $json;
 }
}