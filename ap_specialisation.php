<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>specialisation</title>
</head>
<style>
    hr.style5 {
	background-color: #fff;
	border-top: 2px dashed #8c8b8b;
}
    body{
        background: url(https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZG9jdG9yJTIwYXBwb2ludG1lbnR8ZW58MHx8MHx8&w=1000&q=80);
        background-repeat: no-repeat;
        background-size: cover;
        color: white;
        }
    
    </style>
</head>
<body>
    <?php require('navbar_admin_panel.php') ?>;
    <div class="container">
        <h2 class="text-center text-danger mt-5">Doctor's Specialisation</h2>
        <div class="container w-50 mt-5">
        <div><button onclick="location.href='http://localhost/dbms_project/Otolaryngology.php'" type="button" class="btn btn-success btn-lg w-100 mt-3 text-dark"><h4>Otolaryngology</h4></button></div>
        <hr class="style5">
        <div><button onclick="location.href='http://localhost/dbms_project/Dermatology.php'" type="button" class="btn btn-success btn-lg w-100 text-dark"><h4>Dermatology</h4></button></div>
        <hr class="style5">
        <div><button onclick="location.href='http://localhost/dbms_project/Pediatrics.php'" type="button" class="btn btn-success btn-lg w-100 mb-3 text-dark"><h4>Pediatrics</h4></button></div>
        <hr class="style5">
        <div><button onclick="location.href='http://localhost/dbms_project/Psychiatry.php'" type="button" class="btn btn-success btn-lg w-100 mb-3 text-dark"><h4>Psychiatry</h4></button></div>
        </div>   
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>