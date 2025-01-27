<?php
include("connection.php");
$id = $_GET['id'];
$sql = "delete from `issued` where id = $id";
$result = mysqli_query($conn, $sql);
session_start();
if($result){
    $_SESSION["issued_delete"] = "issued_delete";
    header("location: issued_crud.php");
}
?>