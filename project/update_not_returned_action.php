<?php
include("connection.php");
if(isset($_POST["id"]) && isset($_POST["student_id"]) && isset($_POST["book_id"]) && isset($_POST["status"]) && isset($_POST["expiry_date"])){
    $student_id = $_POST["student_id"];
    $book_id = $_POST["book_id"];
    $id = $_POST["id"];
    $status = $_POST["status"];
    $expiry_date = $_POST["expiry_date"];
    $sql = "update `returned` set student_id = '$student_id', book_id = '$book_id', status = '$status', expiry_date = '$expiry_date' where id = $id";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["update_returned"] = "update_returned";
        header("location: not_returned_crud.php");
    }
}

?>