<?php
session_start();

/*$_SESSION["songs"] = array();
$_SESSION["song_names"] = array();
$_SESSION["users"] = array();
$_SESSION["connection_ids"] = array();

$_SESSION["finished_songs"] = array();
$_SESSION["finished_song_names"] = array();
$_SESSION["finished_users"] = array();
$_SESSION["finished_connection_ids"] = array();*/

$playlist_id = $_REQUEST["id"];

function moveElement(&$array, $from, $to) {
    $out = array_splice($array, $from, 1);
    array_splice($array, $to, 0, $out);
}

if($_REQUEST["controls"] == "delete"){
    array_push($_SESSION["finished_songs"],$_SESSION["songs"][$_REQUEST["position"]] );
    array_push($_SESSION["finished_song_names"], $_SESSION["song_names"][$_REQUEST["position"]]);
    array_push($_SESSION["finished_users"], $_SESSION["users"][$_REQUEST["position"]]);
    array_push($_SESSION["finished_connection_ids"], $_SESSION["connection_ids"][$_REQUEST["position"]]);

    array_splice($_SESSION["songs"], $_REQUEST["position"], 1);
    array_splice($_SESSION["song_names"], $_REQUEST["position"], 1);
    array_splice($_SESSION["users"], $_REQUEST["position"], 1);
    array_splice($_SESSION["connection_ids"], $_REQUEST["position"], 1);

    header("Location: playlist.php?id=" . $_REQUEST["id"]);
}
if($_REQUEST["controls"] == "load"){
//save the information of the song you're trying to load
    moveElement($_SESSION["songs"], $_REQUEST["position"], 0);
    moveElement($_SESSION["song_names"], $_REQUEST["position"], 0);
    moveElement($_SESSION["users"], $_REQUEST["position"], 0);
    moveElement($_SESSION["connection_ids"], $_REQUEST["position"], 0);

    header("Location: playlist.php?id=" . $_REQUEST["id"]);
}
if($_REQUEST["controls"] == "requeue"){
    array_push($_SESSION["songs"], $_SESSION["finished_songs"][$_REQUEST["position"]]);
    array_push($_SESSION["users"], $_SESSION["finished_users"][$_REQUEST["position"]]);
    array_push($_SESSION["song_names"], $_SESSION["finished_song_names"][$_REQUEST["position"]]);
    array_push($_SESSION["connection_ids"], $_SESSION["finished_connection_ids"][$_REQUEST["position"]]);

    header("Location: playlist.php?id=" . $_REQUEST["id"]);
}

?>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var tag = document.createElement('script');
    tag.id = 'iframe-demo';
    tag.src = 'https://www.youtube.com/iframe_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);


</script>
<style>

    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        text-align: center;
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 2.5%;
        border: 1px solid #888;
        width: 50%;
        overflow-y: scroll;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
   #shareBtn {
        width: 100%;
        text-align: center;
        height: 50px;
        background-color: gold;
        font-size: 12pt;
        margin-bottom: 1%;

    }

    #loopBtn, #shuffleBtn, #queueBtn, #infoBtn {
        width: 50%;
        float:left;
        text-align: center;
        height: 50px;
        background-color: gold;
        font-size: 12pt;
        margin-bottom: 1%;
    }
    #bottom-left-controls{
        position: fixed;
        bottom: 0;
        left:0;
        width: 20%;
        z-index: 2;
    }
    #playlist-song-queue{
        list-style: none;
        overflow-y: scroll;
        height: 35vh;
    }
    #playlist-sidebar{
        width:20%;
        height: 95vh;
        background-color: #202020;
        position: fixed;
        left: 0;
        top: 8vh;
    }
    #playlist-iframe{
        width:80%;
        float:right;
        overflow-y: scroll; overflow-x:hidden;
    }
    #header{
        margin-bottom: 0%;
        position: relative;
    }
    #playlist-view{
        margin-right: -0.5%;
        margin-left: -0.5%;
    }
    #video-player{
        height: 80vh;
    }
    .queue-item{
        height: 80px;
        color: white;
        font-size: 12pt;
        padding-right: 10%;
    }
    #video-name{
        padding-left: 3.5%;
        color: black;
        font-size: 24pt;
        float:left;
        margin-top: 3%;
    }
    .song-hr{
        height:.5px;
        opacity:.1;
    }
    body{
        background-color: white;
    }
    #playing-now{
        background-color: rgba(255,255,255,.1);
        list-style: none;
        margin-top:0%;
    }
    .song-label{
        opacity:0.5;
        font-weight: bold;
        line-height: 20px;
        font-size: 14px;
        color: white;
        padding-top: 2vh;
    }
    .current-song{
        line-height: 3vh;
        margin-bottom: 1%;
    }
    #playlist-name{
        color:white;
        font-size: 24pt;
        line-height: 30pt;
        font-weight: bold;
        margin-bottom: 0%;
        margin-top: 0%;
        padding-right: 10%;
    }
    #playlist-creator{
        color:white;
        font-size: 14pt;
        margin-top: 0%;
    }
    #next-up{
        margin-top: 0%;
    }
    .modal-row{
        width: 40%;
        float: left;
        text-align: left;
    }
    #modal-columns{
        height: 50vh;
        margin: auto;
    }
    .modal-row-header{
        font-size: 14pt;
        color: black;
        text-align: center;
    }
    #label-on-white{
        color: grey;
    }
    .queue-delete{
        color: blue;
        text-decoration: underline;
    }
    #listed-queue{
        height : 40vh;
        overflow-y: scroll;
        border: black 1px solid;
        background-color: ghostwhite;
        padding: 5%;
    }

</style>

<?php
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

//VISITS SQL
$visit_sql = "SELECT * FROM playlists WHERE playlist_id = " . $_REQUEST["id"];
$visit_results = $mysql -> query($visit_sql);
if(!$visit_results){
    echo 'SQL error: ' . $mysql -> error;
    echo $sql;
}else{
    //echo 'query successful';
}
$current_playlist = $visit_results -> fetch_assoc();
$incremented_visits = $current_playlist["visits"] + 1;
$visit_increment_sql = "UPDATE playlists SET visits = " . $incremented_visits . "WHERE playlist_id = " . $_REQUEST["id"];
$visits_update = $mysql -> query($visit_increment_sql);

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
$sql = "SELECT * FROM all_view2 WHERE playlist_id = " . $_REQUEST["id"];
$results = $mysql -> query($sql);
if(!$results){
    echo 'SQL error: ' . $mysql -> error;
    echo $sql;
}else{
    //echo 'query successful';
}

//has to happen before declaration of variables

//if the first index is empty
/*if($_SESSION["songs"][0] == ""){
    array_shift($_SESSION["songs"]);
    array_shift($_SESSION["song_names"]);
    array_shift($_SESSION["users"]);
    array_shift($_SESSION["connection_ids"]);
}*/
if($_REQUEST["controls"] == "reset" || sizeOf($_SESSION["songs"]) == 0 || $_SESSION["current_playlist"] != $playlist_id){
    // should only happen when:
    // 1. the playlist is reset $_SESSION["create_new"] == "yes"
    // 2. a SESSION's first time on the playlist ( == 0 )
    // 3. The playlist is finished/no songs left and we need a song ( == 0 )
    $_SESSION["songs"] = array();
    $_SESSION["song_names"] = array();
    $_SESSION["users"] = array();
    $_SESSION["connection_ids"] = array();

    $_SESSION["finished_songs"] = array();
    $_SESSION["finished_song_names"] = array();
    $_SESSION["finished_users"] = array();
    $_SESSION["finished_connection_ids"] = array();

    $_SESSION["current_playlist"] = $playlist_id;

    while($currentrow = $results -> fetch_assoc()) {
        array_push($_SESSION["songs"], $currentrow["youtube_id"]);
        array_push($_SESSION["users"], $currentrow["username"]);
        array_push($_SESSION["song_names"], $currentrow["title"]);
        array_push($_SESSION["connection_ids"], $currentrow["connection_id"]);

        $creator_id = $currentrow["creator_id"];
        $playlist_title = $currentrow["playlist_title"];
    }
}else{
    while($currentrow = $results -> fetch_assoc()) {
        $creator_id = $currentrow["creator_id"];
        $playlist_title = $currentrow["playlist_title"];
    }

}

include "header.php";

?>

<title><?php echo "🎶" . $playlist_title?></title>
<div id="playlist-view">
<div id="playlist-sidebar">
    <ul>
        <p class="song-label">PLAYLIST</p>
        <p id="playlist-name"><?php echo $playlist_title;?></p>
        <p id="playlist-creator">Created by
            <?php
            $user_sql = "SELECT * FROM users WHERE user_id = " . $creator_id;
            $user_results = $mysql -> query($user_sql);
            $user_row = $user_results -> fetch_assoc();
            if(!$user_results){
                echo 'SQL error: ' . $mysql -> error;

            }else{
                //echo 'query successful';
            }
            echo "<strong>" . $user_row["username"] . "</strong>";

            //echo $creator_id;
            ?>
        </p>
    </ul>

    <?php
    $x = 0;
    $currentsong = $_SESSION["song_names"][$x];
    $currentuser = $_SESSION["users"][$x];
    ?>
    <ul id="playing-now">
        <p class="song-label">NOW PLAYING</p>
        <li class="queue-item"><strong><?php echo $_SESSION["song_names"][$x]?> </strong> <br>added by <strong><?php echo $_SESSION["users"][$x]?></strong> </li><hr class="current-song">
    </ul>
    <ul id="playlist-song-queue">
        <p class="song-label" id="next-up">NEXT UP</p>
        <li class="queue-item"><strong><?php echo $_SESSION["song_names"][$x + 1]?></strong> <br>added by <strong><?php echo $_SESSION["users"][$x + 1]?></strong> </li><hr class="song-hr">

            <?php
            for($x = 2; $x < sizeOf($_SESSION["song_names"]) ; $x++){
                ?>
                <li class="queue-item"><strong><?php echo $_SESSION["song_names"][$x]?></strong> <br>added by <strong><?php echo $_SESSION["users"][$x + 2]?></strong> </li><hr class="song-hr">
                <?php
            }
            ?>
    </ul>
    <script>
        $( document ).ready(function() {

            $("#shareBtn").on("click", function(){
                $("#shareModal").css("display", "block");
            });

            $("#queueBtn").on("click", function(){
                $("#queueModal").css("display", "block");
            });

            $("#infoBtn").on("click", function(){
                $("#infoModal").css("display", "block");
            });

            // When the user clicks on <span> (x), close the modal

            $("#share-close").on("click", function(){
                $("#shareModal").css("display", "none");
            })
            $("#info-close").on("click", function(){
                $("#infoModal").css("display", "none");
            })
            $("#queue-close").on("click", function(){
                $("#queueModal").css("display", "none");
            })

            //clicking on the window closes the active modal
            $('body').click(function(evt){
                if(evt.target.id == "shareModal")
                    $("#shareModal").css("display", "none");
                if(evt.target.id == "infoModal")
                    $("#infoModal").css("display", "none");
                if(evt.target.id == "queueModal")
                    $("#queueModal").css("display", "none");
            });

        });

    </script>
    <script>
        //toggle css color in jQuery here
    </script>



    <div id="bottom-left-controls">
        <button id="shuffleBtn">Shuffle</button>
        <button id="loopBtn">Loop</button>
        <button id="queueBtn">Queue</button>
        <button id="infoBtn">Info</button>
        <button id="shareBtn">Share Playlist</button>
    </div>
    <!-- Trigger/Open The Modal -->
    <!-- The Modal -->

    <div id="infoModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id="info-close">&times;</span>
                <div id="playlist-share">
                    <p class="song-label" id="label-on-white">PLAYLIST</p>
                        <h2>Disney Songs</h2>
                        <form action="playlist.php">
                            <input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>">
                            <input type="hidden" name="controls" value="reset">
                            <input type="submit" id="resetBtn" value="Reset Playlist">
                        </form>
                    <div id="modal-columns">
                        <div class="modal-row">
                            <h3 class="modal-row-header">Song Queue</h3>

                            <ol id="listed-queue">
                                <?php
                                for($y = 0; $y < sizeof($_SESSION["songs"]); $y++){
                                   ?>
                                    <li>
                                        <strong>
                                            <a target ='_blank' href='https://www.youtube.com/watch?v=<?php echo $_SESSION["songs"][$y]?>'><?php echo $_SESSION["song_names"][$y]?>
                                        </strong>
                                        </a>
                                        <br> added by
                                        <strong><?php echo $_SESSION["users"][$y]?></strong>
                                        <form name="load" action="playlist.php">
                                            <input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>">
                                            <input type="hidden" name="controls" value="delete">
                                            <input type="hidden" name="position" value="<?php echo $y;?>">
                                            <input class="queue-load" type="submit" value="Load">
                                        </form>
                                    </li>
                                <?php
                                    if($creator_id == $_SESSION["user_id"]){
                                        ?>
                                        <form name="delete" action="playlist.php">
                                            <input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>">
                                            <input type="hidden" name="controls" value="delete">
                                            <input type="hidden" name="position" value="<?php echo $y;?>">
                                            <input class="queue-delete" type="submit" value="Delete">
                                        </form>
                                        <?php
                                        //echo "<form></form><span class='queue-delete'>Delete</span><br><br>";
                                    }
                                }
                                ?>

                            </ol>
                        </div>
                        <div class="modal-row">
                            <h3 class="modal-row-header">Song Graveyard</h3>
                            <p>Deleted and Finished Songs</p>
                            <ul id="listed-queue">
                                <?php
                                //var_dump($_SESSION["finished_song_names"]);
                                for($y = 0; $y < sizeof($_SESSION["finished_songs"]); $y++){
                                    ?>
                                    <li>
                                        <strong>
                                            <a target ='_blank' href='https://www.youtube.com/watch?v=<?php echo $_SESSION["finished_songs"][$y]?>'><?php echo $_SESSION["finished_song_names"][$y]?>
                                        </strong>
                                        </a>
                                        <br> added by
                                        <strong><?php echo $_SESSION["finished_users"][$y]?></strong>
                                        <form name="requeue" action="playlist.php">
                                            <input type="hidden" name="id" value="<?php echo $_REQUEST["id"];?>">
                                            <input type="hidden" name="controls" value="requeue">
                                            <input type="hidden" name="position" value="<?php echo $y;?>">
                                            <input class="queue-load" type="submit" value="Re-add">
                                        </form>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        Contributors:
                        <?php
                        $contributor_sql = "SELECT DISTINCT username FROM all_view2 WHERE playlist_id = " . $_REQUEST['id'];
                        $contributors = $mysql -> query($contributor_sql);
                        if(!$contributors){
                            echo 'SQL error: ' . $mysql -> error;
                            echo $contributor_sql;
                        }else{
                            //echo 'query successful';
                        }
                        while($contributor = $contributors -> fetch_assoc()){
                            echo "<li>" . $contributor["username"] . "</li>";
                        }
                        ?>
                    </div>



    </div>



    </div>

    </div></div>
        <div id="queueModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id="queue-close">&times;</span>
                <div id="playlist-share">
                    <form>
                        <h2>Queue Songs</h2>
                        <script>
                            $(document).ready(function() {

                                $("#addanother").on("click", function(){
                                    $("#inputgroup").append("<input type='url' name='url[]' placeholder=\"https://www.youtube.com/watch?v=0tmKy2awfxE\"  " +
                                        "pattern=\"https?:\\/\\/www\\.youtube\\.com\\/watch\\?v.*\" title=\"Valid link required\" required> " +
                                        "<span class='delete'> | Delete</span><br>");
                                });

                                $("#inputgroup").on("click",".delete", function(){
                                    $(this).prev().remove();
                                    $(this).next().remove();
                                    $(this).remove();
                                });


                            });
                        </script>
                        <h3>Enter Youtube URLs</h3>
                        <input type="hidden" name="queueing" value="true">

                        <div id="inputgroup">
                            <input type="url" name="url[]" placeholder="https://www.youtube.com/watch?v=0tmKy2awfxE"  pattern="https?:\/\/www\.youtube\.com\/watch\?v.*" title="Valid link required" required> <br>

                        </div>
                        <strong><span id="addanother" >Add another input</span><br></strong>
                        <input type="submit" value="Queue">

                    </form>
                </div>
            </div>
        </div>

        <div id="shareModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close" id="share-close">&times;</span>
                <div id="playlist-share">
                    <form action="playlist.php">
                        <h2>Share this playlist</h2>
                        <input type="hidden" name="sent" value="true">
                        Subject<input class = "share-modal" type="text" name="subject" value="Join this playlist <?php echo $currentrow["user"]?> "><br>
                        Recipient <input class = "share-modal" type="email" name="email" placeholder="lorem@usc.edu" required><br>
                        Message<input class = "share-modal" type="textarea" name="message" value="Check out this
        <a href='http://webdev.iyaserver.com/~annieoh/wejam/playlist.php?playlist_id=<?php echo $_REQUEST["playlist_id"]?>'>playlist</a> on
        <a href='http://webdev.iyaserver.com/~annieoh/wejam/home.php'>WeJam</a>.<br><hr>
        It's a collaborative playlist so your friends can decide what songs you'd like to listen to together. "><br>
                        <input class = "share-modal" type="submit">
                    </form>
                </div>
            </div>
        </div>
        <?php
        if($_REQUEST["sent"] == "true"){
            mail($_REQUEST["email"],
                $_REQUEST["subject"],
                $_REQUEST["message"],
                "WeJam");
        }
        ?>

    <div id="playlist-iframe">
        <iframe id="video-player"
                width="100%"
                src="http://www.youtube.com/embed/<?php echo $_SESSION["songs"][0]?>?enablejsapi=1"
                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p id="video-name"><strong><?php echo $currentsong?> </strong> added by <strong><?php echo $currentuser?></strong></p>
    </div>
    <script>
        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('video-player', {
                playerVars: { 'autoplay': 1 },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
            console.log("created");
        }
        onYouTubeIframeAPIReady();

        function onPlayerReady(event) {
        }

        function nextSong(playerStatus){
            if(playerStatus === 0){
                // if the video in the player is finished,
                <?php

                    if(empty($REQUEST["controls"])){
                        // 1. add to 'finished' set of arrays
                        array_push($_SESSION["finished_songs"], $_SESSION["songs"][0]);
                        array_push($_SESSION["finished_song_names"], $_SESSION["song_names"][0]);
                        array_push($_SESSION["finished_users"], $_SESSION["users"][0]);
                        array_push($_SESSION["finished_connection_ids"], $_SESSION["connection_ids"][0]);

                        // 2. remove first element from the active queue arrays
                        array_shift($_SESSION["songs"]);
                        array_shift($_SESSION["song_names"]);
                        array_shift($_SESSION["users"]);
                        array_shift($_SESSION["connection_ids"]);
                    }


                ?>
                location.replace("playlist.php?id=<?php echo $playlist_id?>");

            }
        }

        function onPlayerStateChange(event) {
            nextSong(event.data);
        }
    </script>
</div>