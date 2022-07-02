<?php
define("DNS","mysql:host=localhost;dbname=elibraryms;port=3306;");
define("USERNAME","root");
define("PASSWORD",'');

try{
    $conn=new PDO(DNS,USERNAME,PASSWORD);
    
    //echo "connection is successful!";
}catch(PDOException $ex){
    echo die($ex->getMessage());
}