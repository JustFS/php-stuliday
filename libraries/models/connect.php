<?php

    $servername = 'localhost'; 
    $dbname='stuliday';
    $user='root'; 
    $pass='';
    
    try{
    $db = new PDO("mysql:host=$servername;dbname=$dbname",$user,$pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(Exception $ex){
        echo "Error : " . $ex->getMessage();
    }
?>

