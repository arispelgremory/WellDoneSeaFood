<?php
 include ("conn_db.php");
 $database="wdsf";
 $mysqli=new mysqli($host, $user, $password, $database);
 if(mysqli_connect_errno())
 {
     echo 'Could not connect to database. Error: '.mysqli_connect_error();
     exit;
 }

include("session.php");

if (isset($_SESSION)){
    $newProduct = $_POST['product_id'];
    $newAmount = $_POST['amount'];

    //get current string
    $sql0 = 'select * from cart where `Customer_id`="'. $_SESSION['ID'] . '";';
    $oriData = $mysqli->query($sql0);
    

    $row = $oriData -> fetch_assoc();

    if(!$row['Product_name']){
        $insert_product_name = $newProduct."($newAmount)";
    } else {
        $insert_product_name = $row['Product_name'] . ",$newProduct($newAmount)";
    }

    $sql = 'update `cart` set `Product_name`="'. $insert_product_name .'" where `cart`.`Customer_id`="'. $_SESSION['ID'] . '";';
    if($mysqli->query($sql)){
        echo "\nSuccessful";
    } else {
        echo "error";
    }


} else {
    echo "<script>window.location = 'index.php';</script>";
}



?>