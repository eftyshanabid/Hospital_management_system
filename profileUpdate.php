
<?php 
if(isset($_POST['Update_name'])){
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

$Update_name = $_POST['Update_name'];
$Update_email = $_POST['Update_email'];
$Update_password = $_POST['Update_password'];
$Update_phone = $_POST['Update_phone'];
$Update_address = $_POST['Update_address'];

$email = $_SESSION['email'];
$sql = "UPDATE patient SET patient_name = '$Update_name', email = '$Update_email', password = '$Update_password', phone = '$Update_phone', address = '$Update_address' WHERE email = '$email' ;";
if ($con->query($sql) === TRUE) {
    echo "<script> alert('Update successful') </script>";
    $_SESSION['email'] = $Update_email;
  } else {
    echo "Error updating record: " . $conn->error;
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<style>

    body{
        background: url(https://img5.goodfon.com/wallpaper/nbig/f/a5/most-les-vodoem.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
      }
    .container
    {
        margin-top: 100px;
    }
   
</style>

<body>
    <?php require('navbar.php') ?>
    <div class="container w-50">
        <h2 class="text-center mb-3">Update Your Profile</h2>
    <form action="profileUpdate.php" method="post">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="Update_name" class="form-control" id="exampleInputEmail1" aria-describedby="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" name="Update_email" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password</label>
    <input type="password" name="Update_password" class="form-control" id="exampleInputEmail1" aria-describedby="">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="text" name="Update_phone" class="form-control" id="exampleInputEmail1" aria-describedby="">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" name="Update_address" class="form-control" id="exampleInputEmail1" aria-describedby="">
    
  </div>
  <button type="submit" name="Update_button" class="btn btn-primary">Update</button>
</form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>