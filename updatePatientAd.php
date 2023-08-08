<?php 
if(isset($_POST['Update_name_ad'])){
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


$Update_name_ad = $_POST['Update_name_ad'];
$Update_email_ad = $_POST['Update_email_ad'];
$Update_phone_ad = $_POST['Update_phone_ad'];
$Update_address_ad = $_POST['Update_address_ad'];
$Update_gender_ad = $_POST['Update_gender_ad'];

$patient_id = $_SESSION['up_username_lan'];
$sql = "UPDATE patient SET patient_name = '$Update_name_ad', email = '$Update_email_ad', phone = '$Update_phone_ad', address = '$Update_address_ad',  gender = '$Update_gender_ad' WHERE patient_ID = '$patient_id'  ;";
if ($con->query($sql) === TRUE) {
    echo "<script> alert('Update successful') </script>";
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
        background: url(https://img.freepik.com/free-photo/old-black-background-grunge-texture-blackboard-chalkboard-concrete_1258-52289.jpg?w=2000);
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
      }
    .container
    {
        margin-top: 50px;
    }
   
</style>

<body>
    <?php require('navbar_updatePatientAd.php') ?>;
    <div class="container w-50">
        <h2 class="text-center mb-3">Update Patient Database</h2>
    <form action="updatePatientAd.php" method="post">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="Update_name_ad" class="form-control" id="exampleInputEmail1" aria-describedby="">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" name="Update_email_ad" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Age</label>
    <input type="text" name="Update_age_ad" class="form-control" id="exampleInputEmail1" aria-describedby="">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="text" name="Update_phone_ad" class="form-control" id="exampleInputEmail1" aria-describedby="">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Address</label>
    <input type="text" name="Update_address_ad" class="form-control" id="exampleInputEmail1" aria-describedby="">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Gender</label>
    <input type="text" name="Update_gender_ad" class="form-control" id="exampleInputEmail1" aria-describedby="">  
  </div>
  <button type="submit" name="Update_button_ad" class="btn btn-primary justify-content-center">Update</button>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>