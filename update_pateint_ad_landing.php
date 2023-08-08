
<?php 
if(isset($_POST['up_username_lan'])){
$con = mysqli_connect('localhost','root','','patient_database');

if(!$con)
{
    die("connection failed due to " . mysqli_connect_error());
}
else
{
    //echo "connection to database is successful";
}

session_start();
  if(!isset($_SESSION['adminloggedIn']) || $_SESSION['adminloggedIn'] = false)
  {
    header("Location: http://localhost/dbms_project/admin login.php ");
    exit;
  }

  $up_username_lan = $_POST['up_username_lan'];
  $sql = "SELECT * from patient where patient_ID = '$up_username_lan'";
  $res = mysqli_query($con,$sql);
  
  if(mysqli_num_rows($res)>0)
  {
    //echo "username exist";
    $_SESSION['up_username_lan'] = $up_username_lan;
    header("Location: http://localhost/dbms_project/updatePatientAd.php"); 
  }
  else
  {
    echo "username does not exist";
  }

  $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Delete Patient Info</title>

    <style>
        body{
        background: url(https://img.freepik.com/free-photo/old-black-background-grunge-texture-blackboard-chalkboard-concrete_1258-52289.jpg?w=2000);
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
        }
        .container
        {
            margin-top: 200px;
        }
    </style>

</head>
<body>
<?php require('navbar_updatePatientAd.php') ?>;
    <div class="container w-25">
    <h3>Enter Patient Username</h3>
    <form action="update_pateint_ad_landing.php" method="post">
  <div class="mb-3 mt-5">
    <label for="exampleInputPassword1" class="form-label">Patient ID</label>
    <input type="text" name="up_username_lan" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>