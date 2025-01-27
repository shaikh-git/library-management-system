<?php
include("connection.php");
$id = $_GET["id"];
$sql = "delete  from `users` where id = $id";
$result = mysqli_query($conn, $sql);
session_start();
if($result){
    $_SESSION["student_delete"] = "student_delete";
    header("location: manage_student_crud.php");
}
?>