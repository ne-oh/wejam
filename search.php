<title>WeJam | Search</title>
<link rel="stylesheet" type="text/css" href="externalstylesheet.css">

<style>
    body{
        text-align: center;
        font-family: "Glacial Indifference";
        background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);    }

    h1{
        text-align: center;
        color: black;
        width: 100%;
        font-size: 30pt;
        padding: 2%;
        font-family: "Glacial Indifference";
        margin: 0;
        margin-bottom: 2.5%;
    }

    #submitbutton{
        background-color: #FFCC00;
        width: 375px;
        font-size: 14pt;
        height: 50px;

    }
    #searchform{
        width: 40%;
        margin: auto;
        box-shadow: 0px 15px 50px 1px rgba(0,0,0,.5);
        padding-top: 5%;
        padding-bottom: 5%;
        background-color: ghostwhite;

    }
    #myVideo{
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        z-index: -5;
    }
</style>
<?php include "header.php";?>
<video autoplay muted loop id="myVideo">
    <source src="assets/Indie%20Band%20Plays%20Music%20on%20Stage.mp4" type="video/mp4">
</video>
<div id="searchform"><h1>Search for a playlist</h1>
    <form action="results.php">
        <strong>Name</strong> <input type="text" name="playlist_name"> <br>
        <strong>Theme</strong> <input type="text" name="playlist_theme"> <br>
        <strong>Creator</strong> <input type="text" name="playlist_creator"> <br>
        <input id="submitbutton" type="submit" >
    </form>
    Don't have a playlist to join? <a href="wejam/home.php">Make your own.</a></div>

