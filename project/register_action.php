<?php 
    $conn = mysqli_connect("localhost","root","","library_db");
      if(isset($_POST["submit"])){
        $fullName=$_POST["fullName"];
        $phone=$_POST["phone"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $gender=$_POST["gender"];

        $mysql="INSERT INTO users (full_name,phone,email,password,gender) VALUES ('$fullName','$phone','$email','$password','$gender')";
        $result = mysqli_query($conn,$mysql);
        if(($result==true)){
            echo"Registration successful";
            header("location: index.php");
            


       } else {
        echo "Register Again ......?";
       }

      }



    ?>