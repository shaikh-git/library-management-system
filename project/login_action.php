<?php
$conn = mysqli_connect("localhost","root","","library_db");
$email = $_POST["email"];
$password = $_POST["password"];
$sql = "SELECT * FROM users where email='$email' && password='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
 $name = $row["full_name"];

session_start();
if(mysqli_num_rows($result) > 0 && $row["role"] == 1){
    echo "Login Successfull";
    $_SESSION["email"] = $email;
    $_SESSION["full_name"] = $name;
    header("location: db.php");
}
if(mysqli_num_rows($result) > 0 && $row["role"] == 0){
    echo "Login Successfull";
    $_SESSION["full_name"] = $name;
    $_SESSION["email"] = $email;
    header("location: user_db.php");
}else{
    echo "Invalid Email or Password";
    // header("location:login.php");
}
?>
