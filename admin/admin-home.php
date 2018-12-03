<?php
session_start();
include "admin-header.php";

?>
<style>
    #admin-panel{
        text-align: center;
        width: 50%;
        background-color: lightsteelblue;
        margin: auto;
        margin-top: 5%;
        padding: 5%;
    }
</style>
<div id="admin-panel">
    <h1>Admin Panel</h1>
    <hr>
    <a href="data-vis.php"><h2>Google Analytics </h2></a>
    <a href="adminview.php?key=0"><h2>Database changes</h2></a>
    <a href="adminview.php?key=1">Playlists (Add, update, delete)</a><br>
    <a href="adminview.php?key=2">Users (Add, update, delete)</a><br>
    <a href="adminview.php?key=3">Songs (Add, update, delete)</a><br>
    <a href="adminview.php?key=4">Playlist-songs (Add, update, delete)</a><br>






</div>

