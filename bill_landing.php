<?php 
if(isset($_POST['package_ID'])){
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
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] = false)
{
  header("Location: http://localhost/dbms_project/login.php ");
  exit;
}

$package_ID = $_POST['package_ID'];
$sql = "SELECT * from bill where package_ID = '$package_ID'";
$res = mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0)
{
  echo "successful";
   $_SESSION['package_ID'] = $package_ID;
   header("Location: http://localhost/dbms_project/bills.php"); 
}
else
{
  echo "failed";
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
    <title>Package landing</title>

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
<?php require('navbar.php') ?>
    <div class="container w-25">
    <h3>Enter Package ID</h3>
    <form action="bill_landing.php" method="post">
  <div class="mb-3 mt-5">
    <label for="exampleInputPassword1" class="form-label">Package ID</label>
    <input type="text" name="package_ID" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>