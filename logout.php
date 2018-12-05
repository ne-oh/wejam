<?php
/**
 * Created by PhpStorm.
 * User: annieoh
 * Date: 11/23/18
 * Time: 9:45 PM
 */
session_start();
$_SESSION["username"] = "";
$_SESSION["password"] = "";
$_SESSION["email"] = "";
$_SESSION["user_id"] = "";
$_SESSION["loggedin"] = "";
$_SESSION["power"] = "";
header('Location: home.php');
