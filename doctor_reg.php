<?php
if(isset($_POST['name'])){

$con = mysqli_connect('localhost','root','','patient_database');

if(!$con)
{
    die("connection failed due to " . mysqli_connect_error());
}
else
{
    //echo "connection to database is successful";
}

$name = $_POST['name'];
$doctor_id = $_POST['doctor_id'];
// $department = $_POST['department'];
$specialization = $_POST['specialization'];
$email = $_POST['email'];
$phone = $_POST['phone'];


$errors = array();
$qq = "SELECT doctor_id from doctor where doctor_id = '$doctor_id'";
$uu =  mysqli_query($con,$qq);

if(mysqli_num_rows($uu)>0)
{
  $errors['u'] = "doctor id exist ";
  // echo "<script> alert('username already exist') </script>";
}

if(count($errors) == 0){
$sql = "INSERT INTO `doctor` (`doctor_ID`, `doctor_name`, `specialization`, `email`, `phone`) VALUES ('$doctor_id', '$name', '$specialization', '$email', '$phone');";
$res = mysqli_query($con,$sql);
if($res)
{
    echo "<script> alert('insertion successful') </script>";
}
}

$con->close();

}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="doctor_reg.css?v=<?php echo time(); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php require('navbar_admin_panel.php') ?>;
  <div class="container">
    <div class="title">Doctor Registration</div>
    <div class="content">
      <form action="doctor_reg.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" id= "name" placeholder="Enter your name" required>
          </div>

          <div class="input-box">
            <span class="details">Doctor_ID</span>
            <input type="text" name="doctor_id"  placeholder="ID" required>
            <p class="text-danger"> <?php if(isset($errors['u'])) echo $errors['u']; ?> </p>
          </div>


          <div class="input-box">
            <span class="details">Specialization</span>
            <input type="text" name="specialization" placeholder="Enter your number" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email"  required>
          </div>

          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" required>
          </div>
          
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> 