<?php
include("connection.php");
session_start();
if(!isset($_SESSION["user_email"])){
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
  <link 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
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

    /* .content {
      margin-left: 250px;
      padding: 10px;
    } */
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

        <nav>
        <div class=" info  bg-light navbar-light">
        <ul>
        <li class="px-3">
              <?php
                if(isset($_SESSION["user_id"])){
                  echo "Student Id - ". $_SESSION["user_id"];
                }
              ?>
            </li>
            <li class="px-3">
              <?php
                if(isset($_SESSION["user_name"])){
                  echo "Name - ". $_SESSION["user_name"];
                }
              ?>
            </li>
            <li class="px-3">
            <?php
                if(isset($_SESSION["user_email"])){
                  echo "Email Id - ". $_SESSION["user_email"];
                }
              ?>
            </li>
            <li class="px-3">
            <div style="display: flex; flex-wrap: wrap;">
            <div class="dropdown mr-4">
                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Profile</button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="user_profile_update.php">Update Profile</a>
                    <a class="dropdown-item" href="user_Change_password.php">Change Password</a>
                  </div>
                </div>
            <div>
            <a href="user_logout.php"><button class="btn btn-success">Logout</button></a>
            </div>
            </div>
            </li>
        </ul>
        </div>
        </nav>

        <div class="content">
  <div class="container">
  <marquee><h1>Welcome to the Library</h1></marquee>
    <h2 class="text-center pb-4">All Issued Books Information</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="myTable">
        <thead class="thead-dark">
          <tr>
            <th>SL.No</th>
            <th>Name</th>
            <th>Books Name</th>
            <th>Books Number</th>
            <th>Books Catagory</th>
            <th>Issued Date</th>
            <th>Expiry Date</th>
          </tr>
        </thead>
        <?php
        $student_id = $_SESSION["user_id"];
        $sql = "select issued.book_no, issued.issued_date, issued.expiry_date, users.full_name as student_name, book.name as book_name, catagory.catagory from `issued` inner join `users` on issued.student_id = users.id inner join `book` on issued.book_id = book.id inner join `catagory` on issued.cat_id = catagory.id where student_id = '$student_id'";
        $result = mysqli_query($conn, $sql);
        $sl = 0;
        while($row = mysqli_fetch_assoc($result)){
            $sl++;
            // $_SESSION["students"] = $sl ;
        ?>
        <tr>
            <td><?php echo $sl;  ?></td>
            <td><?php echo $row["student_name"];  ?></td>
            <td><?php echo $row["book_name"];  ?></td>
            <td><?php echo $row["book_no"];  ?></td>
            <td><?php echo $row["catagory"];  ?></td>
            <td><?php echo $row["issued_date"];  ?></td>
            <td><?php echo $row["expiry_date"];  ?></td>
            
        </tr>

        <?php
        }
        ?>
      </table>
    </div>
  </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
        } );
  </script>

</body>
</html>
