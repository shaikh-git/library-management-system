<?php
include("connection.php");
$id = $_GET["id"];
$sql = "delete  from `returned` where id = $id";
$result = mysqli_query($conn, $sql);
session_start();
if($result){
    $_SESSION["delete_returned"] = "delete_returned";
    header("location: not_returned_crud.php");
}
?>