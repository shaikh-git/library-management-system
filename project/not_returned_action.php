<?php
include("connection.php");
if(isset($_POST["student_id"]) && isset($_POST["book_id"]) && isset($_POST["status"]) && isset($_POST["expiry_date"])){
    $student_id = $_POST["student_id"];
    $book_id = $_POST["book_id"];
    $status = $_POST["status"];
    $expiry_date = $_POST["expiry_date"];
    $sql = "insert into `returned` (student_id, book_id, status, expiry_date) values ('$student_id', '$book_id', '$status', '$expiry_date')";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["add_returned"] = "add_returned";
        header("location: not_returned.php");
    }
}

?>