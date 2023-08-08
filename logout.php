<?php

    session_start();

    session_unset();
    session_destroy();
    
    // echo "successful";

    header("location: http://localhost/dbms_project/login.php");

?>