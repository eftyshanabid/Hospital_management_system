<?php 


$con = mysqli_connect('localhost','root','','patient_database');
   if(!$con)
{
    die("connection failed due to " . mysqli_connect_error());
}
session_start();
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] = false)
{
  header("Location: http://localhost/dbms_project/login.php ");
  exit;
}


$email = $_SESSION['email'];

$query = " SELECT * from patient where email = '$email' ";
$res = mysqli_query($con,$query);

if($res)
  {
    //echo "query successful <br>";
  }
  else
  {
    echo "Erorr: $query <br> $con->error <br>";
  }

  if(mysqli_num_rows($res) > 0)
  {
    //echo "user exist";
  }
  $rows = mysqli_fetch_assoc($res);

?>

<!-- ............................................................................. -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>My Profile</title>
    <style>
      body{
        background: url(https://img5.goodfon.com/wallpaper/nbig/f/a5/most-les-vodoem.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
      }
      
    </style>
</head>
<body>
  <?php require('navbar.php')?>;
    <div class="container">
        <h2 class="text-center mt-5">My Profile</h2>
        <div class="container w-50 border mt-5">
           <div>
            <h5 class="pt-3 ">name : <?php if(isset($rows['patient_name'])) echo $rows['patient_name']; ?></h5>
            <h5 class="pt-3 ">age : <?php if(isset($rows['age'])) echo $rows['age']; ?></h5>
            <h5 class="pt-3 ">phone : <?php if(isset($rows['phone'])) echo $rows['phone']; ?></h5>
            <h5 class="pt-3 ">address : <?php if(isset($rows['address'])) echo $rows['address']; ?></h5>
            <h5 class="pt-3 ">email : <?php if(isset($rows['email'])) echo $rows['email']; ?></h5>
            <h5 class="pt-3 ">gender : <?php if(isset($rows['gender'])) echo $rows['gender']; ?></h5>
           </div>
           <div class="text-center mt-5 m-3"><button onclick="location.href = 'http://localhost/dbms_project/profileUpdate.php' " class="btn btn-success btn-lg">Update Profile</button></div>
        </div>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>