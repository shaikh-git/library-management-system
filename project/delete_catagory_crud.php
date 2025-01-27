<?php
include("connection.php");
$id = $_GET["id"];
$sql = "delete  from `catagory` where id = $id";
$result = mysqli_query($conn, $sql);
session_start();
if($result){
    $_SESSION["delete_catagory"] = "delete_catagory";
    header("location: catagory_crud.php");
}
?>