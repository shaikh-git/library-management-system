<?php
include("connection.php");
session_start();
if(!isset($_SESSION["email"])){
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Library Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .sidebar {
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      width: 250px;
      background-color: #343a40;
      color: #fff;
      padding-top: 20px;
    }

    .sidebar .nav-link {
      color: #ccc;
    }

    .sidebar .nav-link:hover {
      color: #fff;
    }

    .content {
      margin-left: 250px;
      padding: 10px;
    }
    .info ul{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        padding: 10px;
    }
    .info ul li{
        list-style-type: none;
        
    }
    .collapse:hover{
      background-color: white;
    }
    .collapse:hover a{
      color: black;
    }
    .collapse a{
      text-decoration: none;
      color: yellow;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .content {
        margin-left: 0;
      }
    }
  </style>

</head>
<body>
    
  <div class="sidebar">
    <h3 class="text-center">Library</h3>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="db.php">Dashboard</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo" href="#">Students</a>
        <div id="demo" class="collapse">
          <a class=" pl-4 py-1" href="add_student.php"  >Add Students</a>
        </div>
        <div id="demo" class="collapse py-1">
          <a class=" pl-4" href="manage_student_crud.php" >Manage Students</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo1" href="#">Books</a>
        <div id="demo1" class="collapse">
          <a class=" pl-4 py-1" href="book.php"  >Add Books</a>
        </div>
        <div id="demo1" class="collapse py-1">
          <a class=" pl-4" href="book_crud.php" >Manage Books</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo2" href="#">Catagorys</a>
        <div id="demo2" class="collapse">
          <a class=" pl-4 py-1" href="catagory.php"  >Add Catagory</a>
        </div>
        <div id="demo2" class="collapse py-1">
          <a class=" pl-4" href="catagory_crud.php" >Manage Catagorys</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="collapse" data-target="#demo4" href="#">Issued</a>
        <div id="demo4" class="collapse">
          <a class=" pl-4 py-1" href="issued.php"  >Books Issued</a>
        </div>
        <div id="demo4" class="collapse py-1">
          <a class=" pl-4" href="issued_crud.php"  >Manage Issued Books</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" data-target="#demo5" href="#">Not Returned</a>
        <div id="demo5" class="collapse">
          <a class=" pl-4 py-1" href="not_returned.php"   > Add Books Not Returned</a>
        </div>
        <div id="demo5" class="collapse py-1">
        <a class=" pl-4" href="not_returned_crud.php"  >Manage Books Not Returned</a>
        </div>
      </li>
    </ul>
  </div>

  <div class="content">
    <div class="container">
        <div class=" info  bg-light navbar-light">
        <ul>
            <li>
              <?php
                if(isset($_SESSION["name"])){
                  echo $_SESSION["name"];
                }
              ?>
            </li>
            <li>
            <?php
                if(isset($_SESSION["email"])){
                  echo $_SESSION["email"];
                }
              ?>
            </li>
            <li>
            <div style="display: flex; flex-wrap: wrap;">
            <div class="dropdown mr-4">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Profile</button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="profile_update.php">Update Profile</a>
                    <a class="dropdown-item" href="Change_password.php">Change Password</a>
                  </div>
                </div>
            <div>
            <a href="logout.php"><button class="btn btn-success">Logout</button></a>
            </div>
            </div>
            </li>
        </ul>
        </div>
    </div>
  </div>
  <div class="content">
    <div class="container">
      <!-- <h1 class="text-center">Welcome to the Library</h1> -->
      <marquee><h1>Welcome to the Library</h1></marquee>
      <div class="row justify-content-center">
            <div class="col-md-8  form-container">
                <h1 class="text-center">Registration</h1>
                <form action="add_student_action.php" method="POST">
                    <div class="mb-2">
                        <label for="studentName" class="form-label">Full Name :</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="mb-2">
                        <label for="studentEmail" class="form-label">Email Address :</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" required>
                    </div>

                    

                    <div class="mb-2">
                        <label for="phoneNumber" class="form-label">Phone Number :</label>
                        <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" required>
                    </div>

                    <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                              <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                              <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="other" value="other">
                              <label class="form-check-label" for="other">Other</label>
                            </div>
                          </div>

                    <div class="mb-2">
                        <label for="password" class="form-label">Password :</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">Confirm Password :</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter confirm password" required>
                    </div>

                    <!-- <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="termsCheck" required>
                        <label class="form-check-label" for="termsCheck">I agree to the terms and conditions.</label>
                    </div> -->

                    <button type="submit" class="btn btn-primary w-100">Register</button>
                </form>
                
            </div>
        </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<?php
if(isset($_SESSION["error"]) && $_SESSION["error"] == "error"){
  echo "<script> alert('Email Id Already Exists');   </script>";
  $_SESSION["error"] = "";
}
if(isset($_SESSION["add"]) && $_SESSION["add"] == "add"){
  echo "<script> alert('Add Student Successfull');   </script>";
  $_SESSION["add"] = "";
}
?>
</body>
</html>
