<?php
include("connection.php");
if(isset($_POST["id"]) && isset($_POST["student_id"]) && isset($_POST["book_id"]) && isset($_POST["book_no"]) && isset($_POST["cat_id"]) && isset($_POST["expiry_date"])){
    $id = $_POST["id"];
    $student_id = $_POST["student_id"];
    $book_id = $_POST["book_id"];
    $book_no = $_POST["book_no"];
    $cat_id = $_POST["cat_id"];
    $expiry_date = $_POST["expiry_date"];
    $sql = "update `issued` set student_id = '$student_id', cat_id = '$cat_id', book_id = '$book_id', book_no = '$book_no', expiry_date = '$expiry_date' where id = $id";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["issued_update"] = "issued_update";
        header("location: issued_crud.php");
    }
}

?>