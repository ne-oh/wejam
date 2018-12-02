<?php
//handles the SQL for admin view

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



//playlist forms
if($_REQUEST["identifier"] == "update-playlist"){
    $sql = "UPDATE playlists 
            SET title = '". $_REQUEST["title"] ."', creator_id = ". $_REQUEST["creator_id"] .", theme = '". $_REQUEST["theme"] ."'
            WHERE playlist_id = " . $_REQUEST["playlist_id"];
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
}
if($_REQUEST["identifier"] == "delete-playlist"){
    $sql = "DELETE FROM playlists WHERE playlist_id = " . $_REQUEST["playlist_id"];
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
}
if($_REQUEST["identifier"] == "add-playlist"){
    $sql = "INSERT INTO playlists (title, creator_id, theme) VALUES ('".$_REQUEST["title"]."', ".$_REQUEST["creator_id"].", '".$_REQUEST["theme"]."')";
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
}


//user forms
if($_REQUEST["identifier"] == "update-user"){
    $sql = "UPDATE users 
            SET username = '". $_REQUEST["username"] ."', password = ". $_REQUEST["password"] .", email = '". $_REQUEST["email"] ."' power = ". $_REQUEST["power"]."
            WHERE user_id = " . $_REQUEST["user_id"];
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
}
if($_REQUEST["identifier"] == "delete-user"){
    $sql = "DELETE FROM users WHERE user_id = " . $_REQUEST["user_id"];
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
        echo $sql;
    }else{
        //echo 'query successful';
    }
}

if($_REQUEST["identifier"] == "add-user"){
    $sql = "INSERT INTO users (username, password, email, power) VALUES ('" . $_REQUEST["username"] ."', '" . $_REQUEST["password"] ."', '" . $_REQUEST["email"] ."', " . $_REQUEST["power"] .")";
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
}

//song forms
if($_REQUEST["identifier"] == "update-song"){
    $sql = "UPDATE songs 

            SET 
            title = '". $_REQUEST["title"] ."', 
            url = '". $_REQUEST["url"] ."', 
            user_id = '". $_REQUEST["user_id"] ."' , 
            duration = '". $_REQUEST["duration"] ."' , 
            youtube_id = '". $_REQUEST["youtube_id"] ."' , 
            description = '". $_REQUEST["description"]. "'
            
            WHERE song_id = " . $_REQUEST["song_id"];
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
}


if($_REQUEST["identifier"] == "add-song"){
    $sql = "INSERT INTO songs (title, url, user_id, duration, youtube_id, description) 
VALUES ('".$_REQUEST["title"]."','".$_REQUEST["url"]."','".$_REQUEST["user_id"]."','".$_REQUEST["duration"]."','".$_REQUEST["youtube_id"]."','".$_REQUEST["description"]."')";
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
}
if($_REQUEST["identifier"] == "delete-song"){
    $sql = "DELETE FROM songs WHERE song_id = " . $_REQUEST["song_id"];
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
        echo $sql;
    }else{
        //echo 'query successful';
    }
}
//playlist songs forms
if($_REQUEST["identifier"] == "update-playlist-song"){
    $sql = "UPDATE playlist_songs 
            SET playlist_id = " . $_REQUEST["playlist_id"] . ", song_id = ". $_REQUEST["song_id"]."
            WHERE connection_id=" . $_REQUEST["connection_id"];
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
    }else{
        //echo 'query successful';
    }
}
if($_REQUEST["identifier"] == "delete-playlist-song"){
    $sql = "DELETE FROM playlist_songs WHERE connection_id = " . $_REQUEST["connection_id"];
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
        echo $sql;
    }else{
        //echo 'query successful';
    }
}
if($_REQUEST["identifier"] == "add-playlist-song"){
    $sql = "INSERT INTO playlist_songs (playlist_id, song_id) VALUES (".$_REQUEST["playlist_id"].", ".$_REQUEST["song_id"].")";
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error' . $mysql -> error;
        echo $sql;
    }else{
        //echo 'query successful';
    }
}
?>