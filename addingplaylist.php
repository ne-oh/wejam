<?php
session_start();

//THIS IS A USER ONLY ZONE
include "useronlyzone.php";
ini_set('memory_limit', '128M');

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


if(empty($_REQUEST["creating"])){
    include "header.php";
    include "playlistform.php";

}else{
    if($_REQUEST["url"] == "" || empty($_REQUEST["title"])){
        include "header.php";
        include "playlistform.php";
        echo "<h2>URL EQUALS EMPTY STRING OR TITLE EMPTY  </h2>";

    }else{
        //echo "<hr>Size of array URL: " . sizeof($_REQUEST["url"]) . "<hr> <br>";
        function getYoutubeID($url){
            $cut = substr($url, strrpos($url, "=") + 1);
            return $cut;
        }
        include "header.php";
        //echo "success, URLs taken and fields full<br><hr><br>";
        echo "<h2>Adding playlist...</h2>";
        echo "<img id='loading' alt='loading' src='assets/loading.gif'><br>";

        //Successfully adding a playlist happens in three parts:
        // 1. Playlist title and theme (if applicable) added to <playlists>
        // 2. Songs from url form array added to <songs>
        // 3. Added songs connected to the created playlist in <playlist_songs>


        // 1. Playlist title and theme (if applicable) added to <playlists>
        $sql = "INSERT INTO playlists (title, theme, creator_id) VALUES ('". $_REQUEST["title"]."', '". $_REQUEST["theme"]."'," . $_SESSION["user_id"]. ")";
        $send = $mysql -> query($sql);
        if(!$send){
            echo 'SQL error for $send_playlist: ' . $mysql -> error;
            echo "<br>" . $sql;
        }else{
            //echo 'query successful';
        }
        //finding the playlist's ID
        $sql = "SELECT * FROM playlists WHERE title = '". $_REQUEST["title"] ."' AND theme = '". $_REQUEST["theme"] ."' AND creator_id = " . $_SESSION["user_id"];
        $results = $mysql -> query($sql);
        if(!$results){
            echo 'SQL error for $playlist_result: ' . $mysql -> error;
            echo "<br>" . $sql;
        }else{
            //echo 'query successful';
        }

        $currentrow = $results -> fetch_assoc();
        echo $currentrow["title"] . "<br> <hr>";
        $playlist_id = $currentrow["playlist_id"];
        $playlist_songs_sql = "INSERT INTO playlist_songs (playlist_id, song_id) VALUES ";


        for ($k = 0; $k < sizeof($_REQUEST["url"]); $k++){
            echo $_REQUEST["url"][$k];
            $api_key = "AIzaSyCRxFDoQrJAk1H16wrkDnLKF1eup9TkvlM";
            $video_url = $_REQUEST["url"][$k];
            $video_id = getYoutubeID($video_url);
            echo " | (" . $video_id . ")<br>";

            $api_url = 'https://www.googleapis.com/youtube/v3/videos?part=snippet%2CcontentDetails%2Cstatistics&id=' . $video_id . '&key=' . $api_key;

            $data = json_decode(file_get_contents($api_url));

            $title = str_replace('"', '', str_replace("'","",$data->items[0]->snippet->title));
            $desc = str_replace('"', '', str_replace("'","",$data->items[0]->snippet->description));
            $duration = $data->items[0]->contentDetails->duration;
// 2. Songs from url form array added to <songs>
            $sql = "INSERT INTO songs
                     (title, url, description, user_id, duration, youtube_id)
                     VALUES 
                     ('". $title ."', '". $video_url ."', '". $desc ."', '". $_SESSION["user_id"] ."', '". $duration ."', '". $video_id ."')";
            // echo $sql;

            $send = $mysql -> query($sql);
            if(!$send){
                echo 'SQL error for $send_song: ' . $mysql -> error;
                //echo "<br>" . $sql;
            }else{
                //echo 'query successful';
            }

            //finding the song that was just added to the database
            $sql = "SELECT DISTINCT * FROM songs WHERE title = '". $title ."' AND url = '".$video_url ."' AND user_id =" . $_SESSION["user_id"];
            $results = $mysql -> query($sql);
            if(!$results){
                echo 'SQL error for $song_result: ' . $mysql -> error;
            }else{
                //echo 'query successful';
            }
            $currentrow = $results -> fetch_assoc();
            if($k == 0){
                $playlist_songs_sql .= "(". $playlist_id .", ". $currentrow["song_id"] .")";
            }else{
                $playlist_songs_sql .= ", (". $playlist_id .", ". $currentrow["song_id"] .")";
            }

            echo $playlist_songs_sql . "<hr>";
        }
        // 3. Added songs connected to the created playlist in <playlist_songs>
        $playlist_songs_sql .= ";";
        $send = $mysql -> query($playlist_songs_sql);
        if(!$send){
            echo 'SQL error for $send_playlist_songs: ' . $mysql -> error;
            echo "<br>" . $playlist_songs_sql;
        }else{
            //echo 'query successful';
        }
        ?>
        <script>
            window.location.replace('playlist.php?id=<?php echo $playlist_id ?>');
        </script>
        <?php
    }

}
