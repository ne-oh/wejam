<?php
session_start();
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
$counter = 1;
$sql = "SELECT * FROM playlists ORDER BY visits DESC";
$results = $mysql -> query($sql);
?>
<style>
    #myChart{
        width: 100%;
        margin: auto;
    }
    .rank-data{
        border: solid black 1px;
        padding: 2%;
    }
</style>
<h1>Top Playlists</h1>
<h2>Top 5</h2>
<script src="Chart.js"></script>
<canvas id="myChart"></canvas>

<h2>Full Ranking</h2>
<table>
        <tr>
            <td class="rank-data">Rank</td>
            <td class="rank-data">Playlist</td>
            <td class="rank-data">Theme</td>
            <td class="rank-data">Creator</td>
            <td class="rank-data">Visits</td>
        </tr> <?php
    $chart = array();
    $views = array();
while($currentrow = $results -> fetch_assoc()){

    $user_sql = "SELECT * FROM users WHERE user_id = "  . $currentrow["creator_id"];
    $user_results = $mysql -> query($user_sql);
    $current_user = $user_results -> fetch_assoc();

    $current = $currentrow["title"] . " by " . $current_user["username"];
    array_push($chart, $current);
    array_push($views, (int)$currentrow["visits"]);
    ?>

        <tr>
            <td class="rank-data"><?php echo $counter; $counter++; ?></td>
            <td class="rank-data"><a href="playlist.php?id=<?php echo $currentrow["playlist_id"]; ?>"><?php echo $currentrow["title"]; ?></a></td>
            <td class="rank-data"><?php echo $currentrow["theme"]; ?></td>
            <td class="rank-data"><?php echo $current_user["username"]; ?></td>
            <td class="rank-data"><?php echo (int)$currentrow["visits"]; ?></td>
        </tr>
    <?php
}
?>

</table>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    for($x = 0; $x <= 5 ; $x++){
                        if($x == 0){
                            echo '"' . $chart[$x] . '"';
                        }else{
                            echo ', "' . $chart[$x] . '"';
                        }
                    }?>
                ],
                datasets: [{
                    label: '# of visits',
                    data: [

                        <?php
                        for($x = 0; $x <= 5 ; $x++){
                            if($x == 0){
                                echo 'parseInt("' . $views[$x] . '")';
                            }else{
                                echo ', parseInt("' . $views[$x] . '")';
                            }
                        }?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 4
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
