<?php
session_start();
include "header.php";
?>
<script src="https://www.youtube.com/iframe_api"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    .share-modal{
        width: 70%;
    }
    #myBtn, #add-song{
        width: 100%;
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
    }
    #playlist-song-queue{
        list-style: none;
        overflow: scroll;
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
        padding-right: 3%;
    }
    #video-name{
        padding-left: 3.5%;
        color: black;
        font-size: 24pt;
        float:left;
        margin-top: 3%;
    }
    #like-song{
        height: 35px;
        float:left;
        margin-left: 1.5%;
        margin-top: 2%;

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
    }
    #playlist-creator{
        color:white;
        font-size: 14pt;
        margin-top: 0%;
    }
    #next-up{
        margin-top: 0%;
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

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}

?>
<div id="playlist-view">
    <div id="playlist-sidebar">
        <ul>
            <p class="song-label">PLAYLIST</p>
            <p id="playlist-name">Disney Music</p>
            <p id="playlist-creator">Created by annie</p>
        </ul>

        <ul id="playing-now">
            <p class="song-label">NOW PLAYING</p>
            <li class="queue-item"><strong>Auli'i Cravalho - How Far I'll Go</strong> <br>added by <strong>annie</strong> </li><hr class="current-song">
        </ul>
        <ul id="playlist-song-queue">
            <p class="song-label" id="next-up">NEXT UP</p>
            <li class="queue-item"><strong>Auli'i Cravalho - How Far I'll Go</strong> <br>added by <strong>annie</strong> </li><hr class="song-hr">
            <li class="queue-item"><strong>Auli'i Cravalho - How Far I'll Go</strong> <br>added by <strong>annie</strong> </li><hr class="song-hr">
            <li class="queue-item"><strong>Auli'i Cravalho - How Far I'll Go</strong> <br>added by <strong>annie</strong> </li><hr class="song-hr">
        </ul>
        <div id="bottom-left-controls">
            <!-- Trigger/Open The Modal -->
            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
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

            <div id="queueModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>
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
            <button id="myBtn">Share Playlist</button>
            <button id="add-song">Queue Songs</button>


            <?php
            if($_REQUEST["sent"] == "true"){
                mail($_REQUEST["email"],
                    $_REQUEST["subject"],
                    $_REQUEST["message"],
                    "WeJam");
            }
            ?>
            <script>
                // Get the modal
                var modal = document.getElementById('myModal');
                var modal2 = document.getElementById('queueModal');

                $( document ).ready(function() {
                    $("#myBtn, #add-song").on("click", function(){
                        $(this).prev().prev().css("display", "block");
                    })
                    // When the user clicks on <span> (x), close the modal

                    $(".close").on("click", function(){
                        $(this).prev().prev().css("display", "none");
                    })

                });

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                    if (event.target == modal2) {
                        modal2.style.display = "none";
                    }
                }
            </script>
        </div>
    </div>
    <div id="playlist-iframe">
        <iframe id="video-player" width="100%" src="https://www.youtube.com/embed/cPAbx5kgCJo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <p id="video-name"><strong>Auli'i Cravalho - How Far I'll Go</strong> added by annie</p>
    </div>
</div>