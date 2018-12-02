<?php
session_start();
$_SESSION["username"] = "";
$_SESSION["password"] = "";
$_SESSION["email"] = "";
$_SESSION["loggedin"] = "false";
$_SESSION["user_id"] = "";

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
//checking if an existing account has already used the email or password
$sql = "SELECT * FROM users WHERE username = '".$_REQUEST["username"]."' OR email = '".$_REQUEST["email"]."'";
//echo $sql;
$results = $mysql -> query($sql);
if(!$results){
    echo 'SQL error: ' . $mysqli -> error;
}else{
    //echo 'query successful';
}

//checking if the username and password pass database requirements
if(empty($_REQUEST["username"] || $_REQUEST["password"]|| $_REQUEST["email"])){
    echo "<h2> Please fill in all fields to proceed.</h2>";
    include "accountcreation.php";
    exit();
}else if($results -> num_rows > 0){
    echo "<h2> An account with your username or email address already exists. </h2>";
    include "accountcreation.php";
    exit();
}else{
    $sql = "INSERT INTO users (username, password, email, power) 
VALUES 
('" . $_REQUEST["username"].  "', '" . $_REQUEST["password"]. "', '" . $_REQUEST["email"]. "', 0)";
    //echo $sql;

    $sending = $mysql -> query($sql);

    $_SESSION["username"] = $_REQUEST["username"];
    $_SESSION["password"] = $_REQUEST["password"];
    $_SESSION["email"] = $_REQUEST["email"];
    $_SESSION["loggedin"] = "true";

    //finding the ID of the user just created
    $sql = "SELECT * FROM users WHERE username = '".$_REQUEST["username"]."' AND password = '".$_REQUEST["password"].
        "' AND email = '".$_REQUEST["email"]."'";
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error: ' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
    $currentrow = $results -> fetch_assoc();
    $_SESSION["user_id"] = $currentrow["user_id"];

    include "header.php";
    echo "<h1>Welcome, " . $_REQUEST["username"] . "!". "</h1>"
?>
<a href="#">Make your first playlist</a><br>
<a href="#">Join an existing playlist</a><br>
    <a href="accountsettings.php">Account settings</a><br>
    <a href="home.php">home</a><br>
<?php }?>




