<?php 

if(!empty($_POST['save'])){
$con = mysqli_connect('localhost','root','','patient_database');
if($con)
{
  //echo "connection successful";
}
else
{
  die("connection failed due to " . mysqli_connect_error());
}

$admin_username = $_POST['admin_username'];
$admin_pass = $_POST['admin_pass'];

$query = " SELECT * from admins where username = '$admin_username' and password='$admin_pass' ";
$res = mysqli_query($con,$query);

if($res)
{
  // echo "query successful <br>";
}
else
{
  echo "Erorr: $query <br> $con->error <br>";
}

$login_res = mysqli_num_rows($res);
$logIn = false;

  if($login_res>0)
  {
    $logIn = true;
    session_start();
    $_SESSION['adminloggedIn'] = true;
    $_SESSION['adminUsername'] = $admin_username;
     echo  $_SESSION['adminUsername'];
    header("Location: http://localhost/dbms_project/admin_panel.php ");
    exit();

  }
  else
  {
    echo " <script> alert('login failed') </script> ";
  }


}
?>

<!-- ........................................................................ -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="admin_login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <?php require('navbar_login_ad.php')?>;
    <div class="container ">
      <form action="admin login.php" method="post">
        <div class="title">Admin Login</div>
        <div class="input-box underline">
          <input type="text" placeholder="Enter username" name="admin_username" required>
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Enter Your Password" name="admin_pass" required>
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="save" value="Sign in">
        </div>
        <div>
          <a href="http://localhost/dbms_project/admin_reg.php">Don't have an account?</a>
        </div>
      </form>
    </div>

    <!-- ....................................................................... -->

    <script> 



    </script>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
