<?php
include("connection.php");
if(isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["book_no"]) && isset($_POST["cat_id"])){
    $name = $_POST["name"];
    $price = $_POST["price"];
    $book_no = $_POST["book_no"];
    $cat_id = $_POST["cat_id"];
    $sql = "insert into `book` (cat_id, name, price, book_no) values ('$cat_id', '$name', '$price', '$book_no')";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["add_book"] = "add_book";
        header("location: book.php");

    }else{
        echo "error";
    }
}

?>