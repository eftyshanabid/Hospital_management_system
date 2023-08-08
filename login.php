<?php

if(!empty($_POST['save']))
{
   $con = mysqli_connect('localhost','root','','patient_database');
   if(!$con)
{
    die("connection failed due to " . mysqli_connect_error());
}
else
{
    //echo "connection to database is successful";
}
  
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  $query = " SELECT * from patient where email = '$email' and password='$pass' ";
  $res = mysqli_query($con,$query);

  if($res)
  {
     //echo "query successful <br>";
  }
  else
  {
    echo "Erorr: $query <br> $con->error <br>";
  }

  $query2 = " SELECT patient_ID from patient where email = '$email' and password='$pass' ";
  $res2 = mysqli_query($con,$query2);

  if($res2)
  {
    //echo "successful";
  }
  else
  {
    echo "Erorr: $query <br> $con->error <br>";
  }

  $rows = mysqli_fetch_assoc($res2);
  


  $login_res = mysqli_num_rows($res);
  $logIn = false;

  if($login_res>0)
  {
    $logIn = true;
    session_start();
    $_SESSION['loggedIn'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['patient_ID'] = $rows['patient_ID'];
    // $id = $_SESSION['patient_ID'];
    // echo "$id";
    header("Location: http://localhost/dbms_project/home.php ");
    exit();

  }
  else
  {
    echo " <script> alert('login failed') </script> ";
  }

  $con->close();

}
 
?>


<!-- .................................................................. -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
   

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  <?php require('navbar_login.php') ?>;
    <div class="container ">
      <form action="login.php" method="post">
        <div class="title">Login</div>
        <div class="input-box underline">
          <input type="text" placeholder="Enter Your Email" name="email" required>
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Enter Your Password" name="pass" required>
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="save" value="Sign In">
        </div>
        <div>
          <a href="http://localhost/dbms_project/reg.php">Don't have an account?</a>
        </div>
      </form>
    </div>

    <!-- ....................................................................... -->

    <script> 



    </script>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>

