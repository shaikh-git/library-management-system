<?php
include("connection.php");

if(isset($_POST["student_id"]) && isset($_POST["book"]) && isset($_POST["book_no"]) && isset($_POST["cat_id"]) && isset($_POST["expiry_date"])){
        $student_id = $_POST["student_id"];
        $book = $_POST["book"];
        $book_no = $_POST["book_no"];
        $cat_id = $_POST["cat_id"];
        $expiry_date = $_POST["expiry_date"];
        $sql1 = "insert into `issued` (student_id, book_id, book_no, cat_id, expiry_date) values ('$student_id', '$book', '$book_no', '$cat_id', '$expiry_date')";
        // echo "$sql1";
        $result = mysqli_query($conn, $sql1);
        print_r($result);
        session_start();
        if($result){
            $_SESSION["add_issued"] = "add_issued";
            header("location: issued.php");
        }else{
            echo "error";
        }
    
}

?>