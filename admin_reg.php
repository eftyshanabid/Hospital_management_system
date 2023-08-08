<?php 

if(isset($_POST['admin_username'])){
$con = mysqli_connect('localhost','root','','patient_database');

if(!$con)
{
    die("connection failed due to " . mysqli_connect_error());
}
else
{
    //echo "connection to database is successful";
}

$admin_username = $_POST['admin_username'];
$admin_pass = $_POST['admin_pass'];

$errors = array();

$qq = "SELECT username from admins where username = '$admin_username' ";
$qqr = mysqli_query($con,$qq);

if(mysqli_num_rows($qqr)>0)
{
  $errors['u'] = "username exist ";
//   echo "<script> alert('username already exist') </script>";
}



if(count($errors) == 0){
$sql = "INSERT INTO `admins` (`username`, `password`) VALUES ('$admin_username', '$admin_pass');" ;
$res = mysqli_query($con,$sql);
if($res)
{
    echo "<script> alert('insertion successful') </script>";
}
}

// if(count($errors) == 0)
// {

// }


// if($con->query($sql) == true)
// {
//   echo "<script>alert('successfull')</script>";
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
     <link rel="stylesheet" href="admin_reg.css?v=<?php echo time(); ?>">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <?php require('navbar_login_ad.php') ?>;
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="admin_reg.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">User Name</span>
            <input type="text" name="admin_username"  placeholder="User Name" required>
            <p class="text-danger"> <?php if(isset($errors['u'])) echo $errors['u']; ?> </p>
          </div>

          <div class="input-box">
            <span class="details">Password</span>
            <input type="text"  name="admin_pass" placeholder="Enter your password" required >
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