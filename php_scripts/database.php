<?php
const host='localhost';
const user='root';
const password='';
const dbname='grocery_store';
const dsn='mysql:host='.host.';dbname='.dbname;
const options=array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => false,
);
try{
    $conn=new PDO(dsn,user,password,options);
}catch(PDOException $e){
    echo $e->getMessage();
}