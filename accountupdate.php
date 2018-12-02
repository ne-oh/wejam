<?php
session_start();
$host = "webdev.iyaserver.com";
$userid = "annieoh";
$userpw = "Iya2248350694";
$db = "annieoh_playlists";

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);
if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

if($_REQUEST["which"] == "username"){
    $sql = "SELECT * FROM users WHERE username = '".$_REQUEST["username"]."'";
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error: ' . $mysqli -> error;
    }else{
        //echo 'query successful';
    }

    if($results -> num_rows > 0) {
        // if the username IS taken
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
<script> alert('This username is taken. Please try again.');</script>";
        include "accountsettings.php";
        exit();

    }else{
        //go ahead and update
        echo "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
<script> alert('You have successfully changed your username.');</script>";

        $sql = "UPDATE users 
SET username = '".$_REQUEST["username"]."' WHERE user_id = '".$_SESSION["user_id"]."'";
        $sending = $mysql -> query($sql);
        header('Location: accountsettings.php');


    }

}

if($_REQUEST["which"] == "password"){
    $sql = "UPDATE users 
SET password = '".$_REQUEST["password"]."' WHERE user_id = '".$_SESSION["user_id"]."'";
    $sending = $mysql -> query($sql);

    header('Location: accountsettings.php');

}

if($_REQUEST["which"] == "email"){
    $sql = "SELECT * FROM users WHERE email = '".$_REQUEST["email"]."'";
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error: ' . $mysqli -> error;
    }else{
        //echo 'query successful';
    }

    if($results -> num_rows > 0) {
        // if the email IS taken
        echo "This email is already in use. <a href='accountsettings.php'>Please try again.</a>";
        exit();

    }else{
        //go ahead and update
        $sql = "UPDATE users 
SET email = '".$_REQUEST["email"]."' WHERE user_id = '".$_SESSION["user_id"]."'";
        $sending = $mysql -> query($sql);
        header('Location: accountsettings.php');


    }

}

?>