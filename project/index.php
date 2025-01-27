

<?php 
$conn = mysqli_connect("localhost","root","","library_db");
if(isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    echo"$email";
    header("location:db.php");
    session_start();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    
</head>
<body style="background-image:url(bg1.png);">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">LIBRARY LOGIN FORM</h2>
                        <form action="login_action.php" method="POST">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group mt-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                            </div>
                            <div class="form-check mt-3">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <a href="#" class="text-decoration-none">Forgot Password?</a>
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                            </div>
                        </form>
                        <p class="text-center mt-3">Don't Have an Account? <a href="register.php" class="text-decoration-none">Register Here </a></p>

                        </div>
</body>
</html>