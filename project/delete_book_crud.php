<?php
include("connection.php");
$id = $_GET["id"];
$sql = "delete  from `book` where id = $id";
$result = mysqli_query($conn, $sql);
session_start();
if($result){
    $_SESSION["delete_book"] = "delete_book";
    header("location: book_crud.php");
}
?>