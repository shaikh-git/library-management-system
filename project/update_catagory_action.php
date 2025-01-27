<?php
include("connection.php");
if(isset($_POST["id"]) && isset($_POST["catagory"])){
    $id = $_POST["id"];
    $catagory = $_POST["catagory"];
    $sql = "update `catagory` set catagory = '$catagory' where id = $id";
    $result = mysqli_query($conn, $sql);
    session_start();
    if($result){
        $_SESSION["update_catagory"] = "update_catagory";
        header("location: catagory_crud.php");
    }
}

?>