<?php
session_start();
include "header.php";
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

$cloud ="";

$cloud_sql = "SELECT * FROM songs";
$cloud_results = $mysql -> query($cloud_sql);
while($cloud_row = $cloud_results -> fetch_assoc()){
    $cloud .= $cloud_row["title"];
    $cloud .= $cloud_row["description"];
}
?>


<div id="abouttop1">
    <h1>TOP SONGS</h1>

</div>



<img class="topchartimg" src="assets/statictopcharts.png">
