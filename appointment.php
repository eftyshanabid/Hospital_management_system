<?php 
session_start();
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] = false)
{
  header("Location: http://localhost/dbms_project/login.php ");
  exit;
}

$con = mysqli_connect('localhost','root','','patient_database');

if(!$con)
{
    die("connection failed due to " . mysqli_connect_error());
}
else
{
    //echo "connection to database is successful";
}


$doctor_id =  $_SESSION['doctor_id'];
$email = $_SESSION['email'];

$query = " SELECT * from doctor where doctor_ID = '$doctor_id' ";
$query2 = " SELECT * from patient where email = '$email' ";
$res = mysqli_query($con,$query);
$res2 = mysqli_query($con,$query2);
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
  $rows2 = mysqli_fetch_assoc($res2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>appointment</title>
    <style>
        body{
        background: url(https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZG9jdG9yJTIwYXBwb2ludG1lbnR8ZW58MHx8MHx8&w=1000&q=80);
        background-repeat: no-repeat;
        background-size: cover;
        color: black;
      }
      
    </style>
</head>
<body>
<?php require('navbar.php')?>;
<div class="container ">
        <h2 class="text-center mt-5">Your Appointment Details</h2>
        <div class="container border border-warning border-3 w-50 mt-5">
           <div>
           <h5 class="pt-3 text-center ">Patient name : <?php if(isset($rows2['patient_name'])) echo $rows2['patient_name']; ?></h5>
           <h5 class="pt-3 text-center ">Patient age : <?php if(isset($rows2['age'])) echo $rows2['age']; ?></h5>
            <h5 class="pt-3 text-center ">Doctor Name : <?php if(isset($rows['doctor_name'])) echo 'Dr. '.$rows['doctor_name']; ?></h5>
            <h5 class="pt-3 text-center">Doctor phone : <?php if(isset($rows['phone'])) echo $rows['phone']; ?></h5>
            <h5 class="pt-3 text-center">Doctor email : <?php if(isset($rows['email'])) echo $rows['email']; ?></h5>
            <h5 class="pt-3 text-center">Doctor specialisation : <?php if(isset($rows['specialization'])) echo $rows['specialization']; ?></h5>
            <h5 class="pt-3 text-center">Schedule : <?php if(isset($rows['schedule'])) echo $rows['schedule']; ?></h5>
           </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>