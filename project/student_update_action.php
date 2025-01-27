<?php
include("connection.php");
if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["gender"])){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $sql = "update `users` set full_name = '$name', email = '$email', phone = '$phone', gender = '$gender' where id = $id";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["student_update"] = "student_update";
        header("location: manage_student_crud.php");
    }else{
        echo "error";
    }
}

?>