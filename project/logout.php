<?php 
session_start();
if (isset($_SESSION["email"])) {
    session_destroy();
    session_abort();
    header("location:index.php");
}

?>