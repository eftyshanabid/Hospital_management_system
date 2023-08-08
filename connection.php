<?php 

$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server,$username,$password);

if(!$con)
{
    die("connection failed due to " . mysqli_connect_error());
}
else
{
    echo "connection to database is successful";
}

?>