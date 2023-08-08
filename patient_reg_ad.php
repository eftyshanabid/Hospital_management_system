<?php 
if(isset($_POST['name'])){
// $server = "localhost";
// $username = "root";
// $password = "";
// $db = 'patient_database';


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
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$age = $_POST['age'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$pass =  $_POST['pass'];
$gender = $_POST['gender'];

// $confirm_pass = $_POST['confirm_pass'];

$errors = array();

$qq = "SELECT patient_ID from patient where patient_ID = '$user_name'";
$uu =  mysqli_query($con,$qq);

$qs = "SELECT email from patient where email = '$email'";
$xx =  mysqli_query($con,$qs);

if(mysqli_num_rows($uu)>0)
{
  $errors['u'] = "username exist ";
  // echo "<script> alert('username already exist') </script>";
}
if(mysqli_num_rows($xx)>0)
{
  $errors['e'] = "email exist ";
  // echo "<script> alert('email already exist') </script>";
}


if(count($errors) == 0)
{
  $sql = "INSERT INTO `patient` (`patient_ID`, `patient_name`, `phone`, `email`, `address`, `age`,`gender`,`password`) VALUES ('$user_name', '$name', '$phone', '$email', '$address', '$age','$gender', '$pass');";
  $result = mysqli_query($con,$sql);
  if($result)
  {
    echo "<script> alert('insertion successful') </script>";
    header("Location: http://localhost/dbms_project/login.php ");
  }
}



// if($con->query($sql) == true)
// {
//   echo "<script>alert('data inserted')</script>";
// }
// else
// {
//   echo "Erorr: $sql <br> $con->error <br>";
// }
$con->close();
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="reg.css?v=<?php echo time(); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php require('navbar_admin_panel.php') ?>;
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="reg.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" id= "name" placeholder="Enter your name" required>
          </div>

          <div class="input-box">
            <span class="details">User Name</span>
            <input type="text" name="user_name"  placeholder="User Name" required>
            <p class="text-danger"> <?php if(isset($errors['u'])) echo $errors['u']; ?> </p>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" placeholder="Enter your email"  required>
            <p class="text-danger"> <?php if(isset($errors['e'])) echo $errors['e']; ?> </p>
          </div>

            <div class="input-box">
            <span class="details">Age</span>
            <input type="text" name="age" placeholder="Age" required>
          </div>

          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" placeholder="Address" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="phone" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text"  name="pass" placeholder="Enter your password" required >
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" name="confirm_pass" placeholder="Confirm your password" >
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="male" id="dot-1" >
          <input type="radio" name="gender" value="female" id="dot-2">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          </div>
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

