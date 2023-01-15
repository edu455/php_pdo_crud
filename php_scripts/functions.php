<?php
function delete_product($id){
    global $conn;
    $sql='DELETE FROM product WHERE id=:id';
    $stmt=$conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
}
function update_product($id,$barcode,$name, $description, $stock, $price){
    global $conn;
    $sql='UPDATE product SEt barcode=:barcode,name=:name,description=:description,stock=:stock,price=:price WHERE id=:id';
    $stmt=$conn->prepare($sql);
    $stmt->execute(['barcode'=>$barcode,'name'=>$name,'description'=>$description,'stock'=>$stock,'price'=>$price,'id'=>$id]);
}
function fetch_products(){
    global $conn;
    $sql=$conn->query('SELECT * FROM product');
    return $sql->fetchAll();
}
function fetch_product($id){
    global $conn;
    $sql='SELECT * FROM product WHERE id=:id';
    $stmt=$conn->prepare($sql);
    if($stmt->execute(['id'=>$id])){
        return $stmt->fetch();
    }
}