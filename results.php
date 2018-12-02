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

$sql = "SELECT * FROM playlist_view WHERE 1=1";
if($_REQUEST["playlist_name"] != ""){
    $sql .= " AND title LIKE '%" . $_REQUEST["playlist_name"] . "%'";
}
if($_REQUEST["playlist_theme"] != ""){
    $sql .= " AND theme LIKE '%" . $_REQUEST["playlist_theme"] . "%'";
}
if($_REQUEST["playlist_creator"] != ""){
    $sql .= " AND username LIKE '%" . $_REQUEST["playlist_creator"] . "%'";
}
//echo $sql . "<hr>";

$results = $mysql -> query($sql);

if(!$results){
    echo 'SQL error: ' . $mysqli -> error;
}else{
    //echo 'query successful';
}
include "header.php";
?>
<head>
    <title>WeJam | Your results</title>
    <script src="http://code.jquery.com/jquery.js"></script>

    <style>
        body{
            font-family: "Glacial Indifference";
            text-align: center;
        }
        .playlist_name{
            height:60px;
            line-height: 70px;
            font-size: 24px;
            padding-left: 2%;
            margin: .5%;
        }
        .oneplaylist{
            padding: 1%;
            transition: 200ms ease-in-out;
            border-bottom: .5px solid rgba(0,0,0,.1);
        }
        .songs{
            padding: 1%;
            line-height: 24px;
            font-size: 14pt;
        }
        .oneplaylist:hover{
            box-shadow: 0px 30px 20px 1px rgba(0,0,0,.02);
            background-color: white;

        }
        #all{
            width: 50%;
            box-shadow: 0px 25px 50px 1px rgba(0,0,0,.1);
            margin:auto;
            padding: 2%;
            background-color: rgba(255,255,255, .9);
            margin-bottom: 20%;

        }
        h1{
            text-align: center;
        }
        #numrow{
            text-align: center;
        }
        a{
            text-decoration: none;
            color: black;
            transition: 200ms ease-in-out;
        }
        a:hover{
            color: #FFCC00;
        }
        #logo{
            height: 30px;
            margin: auto;
            margin-top: 2%;
            margin-bottom: 2%;
            text-align: center;
            z-index: 5;
        }
        #myVideo{
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }
        #searchagain{
            background-color: #FFCC00;
            width: 100%;
            font-size: 14pt;
            font-weight: bold;
            margin-top: 5%;
            height: 50px;
            line-height: 50px;
        }
        hr{
            opacity: .1;
        }
        .results-submit-button{
            padding: 5%;
        }
    </style>
</head>
<video autoplay muted loop id="myVideo">
    <source src="assets/Indie%20Band%20Plays%20Music%20on%20Stage.mp4" type="video/mp4">
</video>
<div id="all">


<script>
    $(document).ready(function(){
        $(".songs").hide();
        $(".playlist_name").on("click", function(){
            $(this).next().slideToggle(200);
        })
        $("#againform").hide();
        $("#searchagain").on("click", function(){
            $(this).next().next().slideToggle(200);
        })
    });
</script>
<?php
echo "<h1 id='numrow'>We found " . $results -> num_rows . " playlist(s). </h1><br>";

$start = 1;
// If you've gotten a new start variable, start with it.
// If you were told otherwise, change the start value.
if(!empty($_REQUEST["start"])){
    $start = $_REQUEST["start"];
}
$end = $start + 5;

$counter = $start;
$results -> data_seek($start-1);

echo "<em>Showing records " . $start . " through " . $end . " of $results->num_rows</em>";
echo "<br><br>";


while($currentrow = $results -> fetch_assoc()){
    echo "<div class='oneplaylist'><div class='playlist_name'><a href='playlist.php?id=" . $currentrow["playlist_id"] . "'>
    <strong>" . $currentrow["title"] .
        "</strong></a> made by <strong>" . $currentrow["username"]. "</strong></div>";
    $songsql = "SELECT * FROM all_view2 WHERE playlist_id = " . $currentrow["playlist_id"];
    $songresults = $mysql -> query($songsql);
    if(!$songresults){
        echo 'SQL error for $songresults: ' . $mysqli -> error;
    }else{
        //echo 'query successful';
    }
    echo "<p class='songs'>";
    echo "<strong>THEME </strong>".$currentrow["theme"] . "<br><br>";

    while($songrow = $songresults -> fetch_assoc()){
        echo $songrow["title"] . "<br>";
    }

    $counter++;
    if($counter > $end){
        break;
    }

    echo "</p>

</div>";
}?>
</div>

    <?php
    // prevents the counter from going into a negative start count
    if(($start-5)>0){
        ?>
        <form>

            <input type="hidden" name="start" value="<?php echo $start - 5 ?>">
            <input type="hidden" name="playlist_name" value="<?php echo $_REQUEST['playlist_name'] ?>">
            <input type="hidden" name="playlist_theme" value="<?php echo $_REQUEST['playlist_theme'] ?>">
            <input type="hidden" name="playlist_creator" value="<?php echo $_REQUEST['playlist_creator'] ?>">

            <input class="results-submit-button" type="submit" value="PREVIOUS -> ">

        </form>
    <?php  } ?>



    <?php
    //prevents the record counter from exceeding the number of rows
    if(($start+5) < $results->num_rows){
        ?>
        <form>

            <input type="hidden" name="start" value="<?php echo $start + 5 ?>">
            <input type="hidden" name="playlist_name" value="<?php echo $_REQUEST['playlist_name'] ?>">
            <input type="hidden" name="playlist_theme" value="<?php echo $_REQUEST['playlist_theme'] ?>">
            <input type="hidden" name="playlist_creator" value="<?php echo $_REQUEST['playlist_creator'] ?>">

            <input class="results-submit-button" type="submit" value="NEXT -> ">

        </form>

    <?php  } ?>

    <div id="searchagain">Search again </div>
    <br>
    <form id="againform" action="#">
        <strong>Name</strong> <input type="text" name="playlist_name">
        <strong>Theme</strong> <input type="text" name="playlist_theme">
        <strong>Creator</strong> <input type="text" name="playlist_creator">
        <input id="submitbutton" type="submit" ></form>


