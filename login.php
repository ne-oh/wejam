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
if(!empty($_REQUEST["username"])){
    $sql = "SELECT * FROM users WHERE username='".$_REQUEST["username"]."'";
    echo $sql;
    echo "Num rows " . $results -> num_rows . "<hr>";
    if(!$results){
        echo 'SQL error: ' . $mysqli -> error;
    }else{
        //echo 'query successful';
    }

    $results = $mysql -> query($sql);
    if($results -> num_rows > 0){
        $currentrow = $results -> fetch_assoc();
    }
}else{
    //echo "You forgot to fill out your username. Please try again.";
    include"header.php";
    include"loginform.php";
    exit();
}



if($_SESSION["loggedin"] == "true") {
    // all good
    header('Location: home.php');
}
else if (!empty($_REQUEST["password"])) {
    if($_REQUEST["password"]==$currentrow["password"]) {
        // VALID login
        $_SESSION["loggedin"]="true";


        //setting appropriate session variables
        $_SESSION["username"]=$currentrow["username"];
        $_SESSION["password"]=$currentrow["password"];
        $_SESSION["email"]=$currentrow["email"];
        $_SESSION["user_id"]=$currentrow["user_id"];
        $_SESSION["power"]=$currentrow["power"];

        header('Location: home.php');

    }
    else {
        // INVALID login
        include"header.php";

        echo "Your username and password do not match. Please try again.";
        include "loginform.php";
        exit();
    }
}
else 	{ // NOT logged in and has NOT submitted form/login
    // include login form
    include"header.php";

    include "loginform.php";
    exit();
    // STOP the page
}

?>
