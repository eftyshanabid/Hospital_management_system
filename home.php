<?php 

  session_start();
  if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] = false)
  {
    header("Location: http://localhost/dbms_project/login.php ");
    exit;
  }

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hospital </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   </head>
<body>
  <?php require('navbar.php') ?>
  <div class="img" ></div>
  <div class="center">
    <div class="btns">
      <button >About Us</button>
      <button id="sign_up">Contact Us</button>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
</body>

</html>
