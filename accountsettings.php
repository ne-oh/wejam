<?php
session_start();

include "useronlyzone.php";
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
$sql = "SELECT * FROM users WHERE user_id = " . $_SESSION["user_id"];
//echo $sql;
$results = $mysql -> query($sql);
if(!$results){
    echo 'SQL error: ' . $mysql -> error;
}else{
    //echo 'query successful';
}
while($currentrow = $results -> fetch_assoc()){
?>

<h1>Your Profile</h1>
<h2>Account Settings</h2>
<hr>
Username <form action="accountupdate.php">
        <input type="text" value="<?php echo $currentrow["username"]?>" name="username" pattern="^.{4,45}$" title="Must be at least 4 characters">
        <input type="hidden" name="which" value="username">
        <input type="submit" value="Update">
    </form>

Password <form action="accountupdate.php">
        <input type="password" value="<?php echo $currentrow["password"]?>" name="password" pattern="^.{4,45}$" title="Must be at least 4 characters">
    <input type="hidden" name="which" value="password">
        <input type="submit"  value="Update">
    </form>

Email <form action="accountupdate.php">
        <input type="email" value="<?php echo $currentrow["email"]?>" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address.">
    <input type="hidden" name="which" value="email">
        <input type="submit" value="Update">
    </form>
<br>
<h2>Your Playlists</h2>
<hr>
<ol>
    <?php
    $sql = "SELECT * FROM playlists WHERE creator_id = " . $_SESSION["user_id"];
    //echo $sql;
    $results = $mysql -> query($sql);

    if(!$results){
        echo '<li>No playlists yet!<a href="addingplaylist.php">Make your first one here</a></li>';
        //echo "<br>" . $sql;
        //echo 'SQL error: ' . $mysql -> error;
    }else{
        while($currentrow = $results -> fetch_assoc()){
            if(sizeof($currentrow) == 0){
                echo '<li>No playlists yet!<a href="addingplaylist.php">Make your first one here</a></li>';
            }else{
                echo "<a href='playlist.php?id=". $currentrow['playlist_id'] ."'><li>" . $currentrow['title']."</li></a>";
            }

        }
    }
    ?>
</ol>
<?php }?>