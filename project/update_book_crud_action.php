<?php
include("connection.php");
if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["book_no"]) && isset($_POST["cat_id"])){
    if(isset($_POST["cat_id"])){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $book_no = $_POST["book_no"];
        $cat_id = $_POST["cat_id"];
        $sql = "update `book` set name = '$name', price = '$price', book_no = '$book_no', cat_id = '$cat_id' where id = $id";
        $result = mysqli_query($conn, $sql);
        session_start();
        if($result){
            $_SESSION["book_update"] = "book_update";
            header("location: book_crud.php");
        }
    }else{
        echo "please select your catagory";
    }
    
}

?>