<?php
session_start();
if($_SESSION["power"] != 1){
    header("Location: http://webdev.iyaserver.com/~annieoh/wejam/home.php");
}
?>
<style>
    #admin-header{
        text-align:center;
        background-color: darkblue;
        color: white;
        height: 100px;
        line-height: 100px;
        font-size: 24px;
        margin: -1.5%;
        margin-bottom: 3%;

    }
    .admin-header-link{
        color: white;
    }
    .admin-header-link:visited{
        color: white;
    }
</style>
<div id="admin-header">
    <a class="admin-header-link" href="http://webdev.iyaserver.com/~annieoh/wejam/home.php">Back to main site | </a>
    <a class="admin-header-link" href="admin-home.php">Admin Home | </a>
    <a class="admin-header-link" href="data-vis.php">Data Visualization | </a>
    <a class="admin-header-link" href="adminview.php?key=0">Database Tables | </a>
    <a class="admin-header-link" href="http://webdev.iyaserver.com/~annieoh/wejam/logout.php">Logout</a>
</div>