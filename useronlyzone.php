<?php
session_start();
if($_SESSION["loggedin"] != "true"){
    ?>
This functionality is available once you've created an account and logged in.

    <?php
    include "login.php";
    exit();
}


?>