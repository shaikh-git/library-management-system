<?php
include("connection.php");
if(isset($_POST["catagory"])){
$catagory = $_POST["catagory"];
$sql1 = "select catagory from `catagory` where catagory = '$catagory'";
$res = mysqli_query($conn, $sql1);
session_start();
if(mysqli_num_rows($res) > 0){
    $_SESSION["catagory"] = "catagory";
    header("location: catagory.php");

}else{
    $sql = "insert into `catagory` (catagory) values ('$catagory')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION["add_catagory"] = "add_catagory";
        header("location: catagory.php");
    }
}
}
?>