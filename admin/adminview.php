<?php
//to do: add data validation to add sections
// fix header


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

include "admin-header.php";

include "update-database.php";
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    #admin-view{
        text-align: center;
    }
    #admin-view-users, #admin-view-playlists, #admin-view-songs, #admin-view-playlist-songs{
    }
    table, th, td {
        border: 1px solid black;
        margin: auto;
        text-align: left;
    }
    .admin-view-header{
        font-size: 24px;
        font-weight: bold;
        text-decoration: underline;
        transition: 100ms ease-in-out;
        color: blue;
    }

</style>
<div id="admin-view">
    <h1>Admin View</h1>

    <div id="admin-view-headers">
    <span id="admin-playlists" class="admin-view-header">Playlists | </span>
    <span id="admin-users" class="admin-view-header">Users | </span>
    <span id="admin-songs" class="admin-view-header">Songs | </span>
    <span id="admin-playlist-songs" class="admin-view-header">Playlists' songs</span>
</div>
<script>
    $( document ).ready(function() {
        if(<?php echo $_REQUEST["key"]?> == 0){
            $("#admin-view-users, #admin-view-songs, #admin-view-playlist-songs").hide();
        }else if(<?php echo $_REQUEST["key"]?> == 1){
            $("#admin-view-users, #admin-view-songs, #admin-view-playlist-songs").hide();
        }else if(<?php echo $_REQUEST["key"]?> == 2){
            $("#admin-view-playlists, #admin-view-songs, #admin-view-playlist-songs").hide();
        }else if(<?php echo $_REQUEST["key"]?> == 3){
            $("#admin-view-users, #admin-view-playlists, #admin-view-playlist-songs").hide();
        }else if(<?php echo $_REQUEST["key"]?> == 4){
            $("#admin-view-users, #admin-view-songs, #admin-view-playlists").hide();
        }else{
            $("#admin-view-users, #admin-view-songs, #admin-view-playlist-songs").hide();
        }

        $(".admin-view-header").on("mouseover", function(){
            $(this).css("opacity", "0.5");
        });

        $(".admin-view-header").on("mouseout", function(){
            $(this).css("opacity", "1.0");
        });

        $("#admin-users").on("click", function(){
            $("#admin-view-playlists, #admin-view-songs, #admin-view-playlist-songs").hide();
            $("#admin-view-users").fadeIn(300);
        });

        $("#admin-playlists").on("click", function(){
            $("#admin-view-users, #admin-view-songs, #admin-view-playlist-songs").hide();
            $("#admin-view-playlists").fadeIn(300);
        });

        $("#admin-songs").on("click", function(){
            $("#admin-view-playlists, #admin-view-users, #admin-view-playlist-songs").hide();
            $("#admin-view-songs").fadeIn(300);
        });

        $("#admin-playlist-songs").on("click", function(){
            $("#admin-view-playlists, #admin-view-songs, #admin-view-users").hide();
            $("#admin-view-playlist-songs").fadeIn(300);
        });

    });
</script>
<div id="admin-view-playlists">
    <h2>Playlist Table</h2>
    <h3>Add, Update, Delete</h3>
    <table>
        <tr>
            <th>playlist_id</th>
            <th>title</th>
            <th>creator_id</th>
            <th>theme</th>
            <th></th>
            <th></th>

        </tr>
    <?php
    $sql = "SELECT * FROM playlists";
    $results = $mysql -> query($sql);
    if(!$results){
        echo 'SQL error (playlists)' . $mysqli -> error;
    }else{
        //echo 'query successful';
    }
    while($currentrow = $results -> fetch_assoc()){
    ?>
        <tr>
            <form action="adminview.php">
                <input type="hidden" name="identifier" value="update-playlist">

            <td><input type="hidden" name="playlist_id" value="<?php echo $currentrow["playlist_id"]?>"><?php echo $currentrow["playlist_id"]?></td>
            <td><input type="text" name="title" value="<?php echo $currentrow["title"]?>"></td>
            <td><input type="text" name="creator_id" value="<?php echo $currentrow["creator_id"]?>"></td>
            <td><input type="text" name="theme" value="<?php echo $currentrow["theme"]?>"></td>
            <td>
                    <input type="submit" value="Update">
            </td>
            <td><form action="adminview.php">
                    <input type="hidden" name="identifier" value="delete-playlist">
                    <input type="hidden" name="playlist_id" value="<?php echo $currentrow["playlist_id"]?>">
                    <input type="submit" value="Delete">
                </form></td>
            </form>
        </tr>
    <?php }?>
        <tr>
            <form action="adminview.php">
            <input type="hidden" name="identifier" value="add-playlist">
                <td></td>
                <td><input type="text" name="title" placeholder="title" required></td>
                <td><input type="text" name="creator_id" placeholder="creator_id"  required></td>
                <td><input type="text" name="theme" placeholder="theme (opt)" ></td>
                <td>
                    <input type="submit" value="Add">
                </td>
            <td></td>
            </form>
        </tr>
    </table>
</div>

<div id="admin-view-users">
    <h2>Users Table</h2>
    <h3>Add, Update, Delete</h3>
    <table>
        <tr>
            <th>user_id</th>
            <th>username</th>
            <th>password</th>
            <th>email</th>
            <th>admin power</th>
            <th></th>
            <th></th>

        </tr>
        <?php
        $sql = "SELECT * FROM users";
        $results = $mysql -> query($sql);
        if(!$results){
            echo 'SQL error (users)' . $mysqli -> error;
        }else{
            //echo 'query successful';
        }
        while($currentrow = $results -> fetch_assoc()){
            ?>
            <tr>
                <form action="adminview.php">
                    <input type="hidden" name="identifier" value="update-user">

                <td><input type="hidden" name="user_id" value="<?php echo $currentrow["user_id"]?>"><?php echo $currentrow["user_id"]?></td>
                <td><input type="text" name="username" value="<?php echo $currentrow["username"]?>"></td>
                <td><input type="text" name="password" value="<?php echo $currentrow["password"]?>"></td>
                <td><input type="text" name="email" value="<?php echo $currentrow["email"]?>"></td>
                <td><input type="text" name="power" value="<?php echo $currentrow["power"]?>"></td>

                <td><input type="submit" value="Update"></td>
                </form>
                <td>
                    <form action="adminview.php">
                        <input type="hidden" name="identifier" value="delete-user">
                        <input type="hidden" name="user_id" value="<?php echo $currentrow["user_id"]?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php }?>
        <tr>
            <form action="adminview.php">
                <input type="hidden" name="identifier" value="add-user">
                <td></td>
                <td><input type="text" name="username" placeholder="username" required></td>
                <td><input type="text" name="password" placeholder="password"  required></td>
                <td><input type="text" name="email" placeholder="email"  required></td>
                <td><input type="text" name="power" placeholder="power"  required></td>
                <td></td>
                <td>
                    <input type="submit" value="Add">
                </td>
            </form>
        </tr>
    </table>
</div>

<div id="admin-view-songs">
    <h2>Songs Table</h2>
    <h3>Add, Update, Delete</h3>

    <table>
        <tr>
            <th>song_id</th>
            <th>title</th>
            <th>url</th>
            <th>user_id</th>
            <th>duration</th>
            <th>youtube_id</th>
            <th>description</th>

            <th></th>
            <th></th>

        </tr>
        <?php
        $sql = "SELECT * FROM songs";
        $results = $mysql -> query($sql);
        if(!$results){
            echo 'SQL error (songs)' . $mysqli -> error;
        }else{
            //echo 'query successful';
        }
        while($currentrow = $results -> fetch_assoc()){
            ?>
            <tr>
                <form action="adminview.php">
                <input type="hidden" name="identifier" value="update-song">

                <td><input type="hidden" name="song_id" value="<?php echo $currentrow["song_id"]?>"><?php echo $currentrow["song_id"]?></td>
                <td><input type="text" name="title" value="<?php echo $currentrow["title"]?>"></td>
                <td><input type="text" name="url" value="<?php echo $currentrow["url"]?>"></td>
                <td><input type="text" name="user_id" value="<?php echo $currentrow["user_id"]?>"></td>
                <td><input type="text" name="duration" value="<?php echo $currentrow["duration"]?>"></td>
                <td><input type="text" name="youtube_id" value="<?php echo $currentrow["youtube_id"]?>"></td>
                <td><input type="text" name="description" value="<?php echo $currentrow["description"]?>"></td>

                <td><input type="submit" value="Update"></td>
                    </form>
                <td><form action="adminview.php">
                        <input type="hidden" name="identifier" value="delete-song">
                        <input type="hidden" name="song_id" value="<?php echo $currentrow["song_id"]?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>

        <?php }?>
        <tr>
            <form action="adminview.php">
                <input type="hidden" name="identifier" value="add-song">
                <td></td>
                <td><input type="text" name="title" placeholder="title" required></td>
                <td><input type="text" name="url" placeholder="url"  required></td>
                <td><input type="text" name="user_id" placeholder="user_id"  required></td>
                <td><input type="text" name="duration" placeholder="duration"  required></td>
                <td><input type="text" name="youtube_id" placeholder="youtube_id"  required></td>
                <td><input type="text" name="description" placeholder="description"  required></td>

                <td>
                    <input type="submit" value="Add">
                </td>
            </form>
        </tr>
    </table>
</div>

<div id="admin-view-playlist-songs">
    <h2>Playlists' Songs Join Table </h2>
    <h3>Add, Update, Delete</h3>


    <table>
        <tr>
            <th>playlist_title</th>
            <th>playlist theme</th>

            <th>title</th>
            <th>url</th>
            <th>username</th>
            <th></th>
            <th></th>

        </tr>
        <?php
        $sql = "SELECT playlist_title, theme, title, url, username, connection_id
                FROM all_view2 ORDER BY playlist_title";
        $results = $mysql -> query($sql);
        if(!$results){
            echo 'SQL error (playlist_songs)' . $mysqli -> error;
        }else{
            //echo 'query successful';
        }
        while($currentrow = $results -> fetch_assoc()){
            ?>
            <tr>
                <form action="adminview.php">
                    <input type="hidden" name="identifier" value="update-playlist-song">
                    <input type="hidden" name="connection_id" value="<?php echo $currentrow["connection_id"]?>">


                    <td><select name="playlist_id">
                            <option value="<?php echo $currentrow["playlist_id"]?>"><?php echo $currentrow["playlist_title"]?></option>
                            <?php
                            $dd_sql = "SELECT * FROM playlists";
                            $dd_results = $mysql -> query($dd_sql);
                            if(!$dd_results){
                                echo 'SQL error (playlist dropdown 1)' . $mysql -> error;
                            }else{
                                //echo 'query successful';
                            }
                            while($ddrow=$dd_results->fetch_assoc()){
                                echo "<option value='". $ddrow["playlist_id"] ."'>". $ddrow["title"] ."</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td><?php echo $currentrow["theme"]?></td>
                    <td>
                        <select name="song_id">
                            <option value="<?php echo $currentrow["song_id"]?>"><?php echo $currentrow["title"]?></option>
                            <?php
                            $dd_sql = "SELECT * FROM songs";
                            $dd_results = $mysql -> query($dd_sql);
                            if(!$dd_results){
                                echo 'SQL error (song dropdown 1)' . $mysql -> error;
                            }else{
                                //echo 'query successful';
                            }
                            while($ddrow=$dd_results->fetch_assoc()){
                                echo "<option value='". $ddrow["song_id"] ."'>". $ddrow["title"] ."</option>";
                            }
                            ?>
                        </select>
                    </td>
                    <td><?php echo $currentrow["url"]?></td>
                    <td><?php echo $currentrow["username"]?></td>

                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <form action="adminview.php">
                            <input type="hidden" name="identifier" value="delete-playlist-song">

                            <input type="hidden" name="playlist_id" value="<?php echo $currentrow["connection_id"]?>">

                            <input type="submit" value="Delete">
                        </form></td>
                </form>
            </tr>
        <?php }?>
        <tr>
            <form action="adminview.php">
                <input type="hidden" name="identifier" value="add-playlist-song">
                <td>
                    <select name="playlist_id">
                        <?php
                        $sql = "SELECT * FROM playlists";
                        $results = $mysql -> query($sql);
                        if(!$results){
                            echo 'SQL error (playlist dropdown)' . $mysql -> error;
                        }else{
                            //echo 'query successful';
                        }
                        while($currentrow=$results->fetch_assoc()){
                            echo "<option value='". $currentrow["playlist_id"] ."'>". $currentrow["title"] ."</option>";
                        }
                        ?>
                    </select>
                </td>
                <td>

                </td>
                <td><select name="song_id">
                        <?php
                        $sql = "SELECT * FROM songs";
                        $results = $mysql -> query($sql);
                        if(!$results){
                            echo 'SQL error (playlist dropdown)' . $mysql -> error;
                        }else{
                            //echo 'query successful';
                        }
                        while($currentrow=$results->fetch_assoc()){
                            echo "<option value='". $currentrow["song_id"] ."'>". $currentrow["title"] ."</option>";
                        }
                        ?>
                    </select></td>
                <td></td>
                <td></td>
                <td></td>

                <td>
                    <input type="submit" value="Add">
                </td>

            </form>
        </tr>
    </table>
</div>

</div>