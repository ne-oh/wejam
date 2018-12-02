<?php
session_start();
include "header.php";
?>
<style>

    .team-card{
        float: left;
        width: 30%;
        text-align: center;
    }
    .team-img{
        width: 30%;
        border-radius: 100%;
    }
    .team-label{
        color: black;
        font-size: 18pt;
    }
</style>
<div id="aboutfill1">
    <h1>OUR TEAM</h1>
</div>

<div class="team-card">
    <img class="team-img" src="assets/annie.png"><br>
    <h2>Annie Oh</h2>
    <h3 class="team-label">PHP and Database</h3>
</div>
<div class="team-card">
    <img class="team-img" src="assets/handyprofile1.jpg"><br>
    <h2>Handy Culver</h2>
    <h3 class="team-label">Design and User Research</h3>
</div>
<div class="team-card">
    <img class="team-img" src="assets/ashleyprofile.jpg"><br>
    <h2>Ashley Pakzaban</h2>
    <h3 class="team-label">HTML & CSS and Project Manager</h3>
</div>

