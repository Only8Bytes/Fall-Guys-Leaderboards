<?php
    $servername = "localhost";
    $username = "id16333195_plushel";
    $password = "FearMeIAmLag2019!";
    $database = "id16333195_fallguysboards";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    function ordinal($number) {
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if ((($number % 100) >= 11) && (($number%100) <= 13))
            return $number. 'th';
        else
            return $number. $ends[$number % 10];
    }
?>

<script>
    function preloadImages(array) {
        if (!preloadImages.list) {
            preloadImages.list = [];
        }
        var list = preloadImages.list;
        for (var i = 0; i < array.length; i++) {
            var img = new Image();
            img.onload = function() {
                var index = list.indexOf(this);
                if (index !== -1) {
                    // remove image from the array once it's loaded
                    // for memory consumption reasons
                    list.splice(index, 1);
                }
            }
            list.push(img);
            img.src = array[i];
        }
    }
    
    preloadImages(["thumbnails/FallMountain.png", "thumbnails/JumpShowdown.png", "thumbnails/RoyalFumble.png", "thumbnails/RollOff.png", "thumbnails/FallBall.png", "thumbnails/Jinxed.png"]);
</script>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css" media="screen">
        <title>Fall Guys Leaderboards</title>
        <link rel="shortcut icon" href="crown.ico">
    </head>
    <body>
        <div class="background"></div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">
                <img src="title.png" width="189" height="40" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse font-weight-bold" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/crowns.php">Crown Leaders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/races.php">Races</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/scores.php">High Scores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/miscellaneous.php">Miscellaneous</a>
                </li>
                </ul>
            </div>
        </nav>
        <?php
            $query = mysqli_query($conn, "SELECT * FROM events E WHERE E.endtime > NOW() ORDER BY E.datetime LIMIT 3");
            while ($row = mysqli_fetch_array($query)){
                $today = date("Y-m-d H:i:s");
                $starttime = date("Y-m-d", strtotime($row['datetime']));
                $endtime = date("Y-m-d", strtotime($row['endtime']));
                if (($starttime < $today) && ($endtime > $today)){
                    echo "<div style=\"text-align: center; margin-top: 2rem; max-width: 1456px; margin-left: auto; margin-right: auto;\" class=\"alert alert-success\" role=\"alert\">";
                    echo "<b>ONGOING EVENT:</b> ".$row['name']." is currently ongoing, you can watch it <a class=\"alert-link\" href=\"".$row['watchlink']."\">here</a>";
                    echo "</div>";
                }
            }
        ?>
        <div class="main">
            <div class="col1">
                <div class="sidepanel">
                    <img class = "thumbnail" id="thumbnail" src = "/thumbnails/FallMountain.png">
                    <div class = "textcontainer">
                        <div id="winstreakSidebar">
                            <h5>Win Streak</h5>
                            <p>The longest streak of consecutive wins by players playing either solo or in a squad! Winning streaks do not all have to be in one sitting or even on Main Show, but it cannot be done in a party if playing solo. Squads Mode will count for solo win streaks, but you cannot be in a party.</p>
                        </div>
                        <div id="finalsstreakSidebar" style="display: none;">
                            <h5>Finals Streak</h5>
                            <p>The longest streak of consecutive appearances in the finals on Main Show! The player does not have to win the crown, but they have to be in the final game of the episode. Any game ending in a crown that is not a final minigame, such as Slime Climb, does not count!</p>
                        </div>
                        <div id="jumptimeoutsSidebar" style="display: none;">
                            <h5>Jump Showdown</h5>
                            <br>
                            <p>Released: Season 1 Patch</p>
                            <p>Player Count: 2-20</p>
                            <p><i>Be the last Fall Guy standing above the Slime!</i></p>
                        </div>
                        <div id="winsdailySidebar" style="display: none;">
                            <h5>Wins in 24 hours</h5>
                            <p>The most wins a player achieves in a span of 24 hours! Rounds do not have to be played on main show or in one sitting and wins are counted towards the total if they all occur on the same calendar day.</p>
                        </div>
                        <div id="longestfallballSidebar" style="display: none;">
                            <h5>Longest Fall Ball</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 8-20</p>
                            <p><i>Score goals by getting balls into the opposing team's - work together to get the win!</i></p>
                        </div>
                        <div id="jinxedSidebar" style="display: none;">
                            <h5>Fastest Jinxed</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 40-50</p>
                            <p><i>The first team to get completely Jinxed are eliminated!</i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col2">
                <ul class="nav nav-tabs flex-wrap-reverse">
                    <li class="nav-item">
                        <a class="nav-link active" href="#winstreak" id="winstreaktab" data-toggle="tab">Win Streak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="finalsstreaktab" href="#finalsstreak" data-toggle="tab">Finals Streak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="jumptimeoutstab" href="#jumptimeouts" data-toggle="tab">Jump Showdown</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="winsdailytab" href="#winsdaily" data-toggle="tab">Wins in 24h</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="longestfallballtab" href="#fallball" data-toggle="tab">Fall Ball</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="jinxedtab" href="#jinxed" data-toggle="tab">Jinxed</a>
                    </li>
                </ul>
                <div class="content">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style = "margin-left: 20px; margin-bottom: 20px;">
                        <label class="btn btn-info" id="vanilla" style="display:none;">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked>Vanilla
                        </label>
                        <label class="btn btn-info active" id="solos" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked>Solos
                        </label>
                        <label class="btn btn-info" id="squads"  style="border-top-right-radius: .25rem; border-bottom-right-radius: .25rem;">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked>Squads
                        </label>
                        <label class="btn btn-info" id="blowdown" style="display:none;">
                            <input type="radio" name="options" id="option2" autocomplete="off">Blowdown
                        </label>
                    </div>
                    
                    <div class="tab-content">
                        <div class="tab-pane active" id="winstreak">
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM players WHERE players.winstreak > 0 ORDER BY players.winstreak DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Streak</th>
                                      <th scope = "col" style = "width: 10%;">Date Set</th>
                                      <th scope = "col" style = "width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $k = 1;
                                        $prev = 0;
                                        while ($row = mysqli_fetch_array($query)){
                                            if ($row['winstreak'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['winstreak'];
                                            echo "<tr>";
                                            echo "<td><b>".ordinal($k)."</b></td>";
                                            if ($k == 1){
                                                echo "<td style=\"text-align: center;\"><img src=\"gold.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 2){
                                                echo "<td style=\"text-align: center;\"><img src=\"silver.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 3){
                                                echo "<td style=\"text-align: center;\"><img src=\"bronze.png\" style=\"width: 25px;\"></td>";
                                            } else {
                                                echo "<td></th>";
                                            }
                                            echo "<td><b>".$row['ign']."</b></td>";
                                            if ($row['link'] != ""){
                                                echo "<td><b><a class=\"link\"  target=\"_blank\" href=\"".$row['link']."\">".$row['alias']."</a></b></td>";
                                            } else {
                                                echo "<td><b>".$row['alias']."</b></td>";
                                            }
                                            echo "<td><b>".$row['winstreak']."</b></td>";
                                            echo "<td><b>".$row['winstreakdate']."</b></td>";
                                            echo "<td></td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="winstreaksquad">
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM squadwins ORDER BY squadwins.wins DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Streak</th>
                                      <th scope = "col" style = "width: 10%;">Date Set</th>
                                      <th scope = "col" style = "width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $k = 1;
                                        $prev = 0;
                                        while ($row = mysqli_fetch_array($query)){
                                            if ($row['wins'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['wins'];
                                            echo "<tr>";
                                            echo "<td><b>".ordinal($k)."</b></td>";
                                            if ($k == 1){
                                                echo "<td style=\"text-align: center;\"><img src=\"gold.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 2){
                                                echo "<td style=\"text-align: center;\"><img src=\"silver.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 3){
                                                echo "<td style=\"text-align: center;\"><img src=\"bronze.png\" style=\"width: 25px;\"></td>";
                                            } else {
                                                echo "<td></th>";
                                            }
                                            
                                            $memberquery = mysqli_query($conn, "SELECT * FROM players P WHERE P.ign IN (SELECT ign FROM teams T WHERE T.teamid = ".$row['squadid'].")");
                                            echo "<td>";
                                            while ($memberrow = mysqli_fetch_array($memberquery)){
                                                echo "<p style=\"margin-bottom: .25rem\"><b>".$memberrow['ign']."</b></p>";
                                            }
                                            echo "</td>";
                                            
                                            $memberquery = mysqli_query($conn, "SELECT * FROM players P WHERE P.ign IN (SELECT ign FROM teams T WHERE T.teamid = ".$row['squadid'].")");
                                            echo "<td>";
                                            while ($memberrow = mysqli_fetch_array($memberquery)){
                                                if ($memberrow['link'] != ""){
                                                    echo "<p style=\"margin-bottom: .25rem\"><b><a class=\"link\"  target=\"_blank\" href=\"".$memberrow['link']."\">".$memberrow['alias']."</a></b></p>";
                                                } else {
                                                    echo "<p style=\"margin-bottom: .25rem\"><b>".$memberrow['alias']."</b></p>";
                                                }
                                            }
                                            echo "</td>";
                                            
                                            echo "<td><b>".$row['wins']."</b></td>";
                                            echo "<td><b>".$row['date']."</b></td>";
                                            echo "<td></td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="finalsstreak">
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM players WHERE players.finalsstreak > 0 ORDER BY players.finalsstreak DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Streak</th>
                                      <th scope = "col" style = "width: 10%;">Date Set</th>
                                      <th scope = "col" style = "width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $k = 1;
                                        $prev = 0;
                                        while ($row = mysqli_fetch_array($query)){
                                            if ($row['finalsstreak'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['finalsstreak'];
                                            echo "<tr>";
                                            echo "<td><b>".ordinal($k)."</b></td>";
                                            if ($k == 1){
                                                echo "<td style=\"text-align: center;\"><img src=\"gold.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 2){
                                                echo "<td style=\"text-align: center;\"><img src=\"silver.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 3){
                                                echo "<td style=\"text-align: center;\"><img src=\"bronze.png\" style=\"width: 25px;\"></td>";
                                            } else {
                                                echo "<td></th>";
                                            }
                                            echo "<td><b>".$row['ign']."</b></td>";
                                            if ($row['link'] != ""){
                                                echo "<td><b><a class=\"link\"  target=\"_blank\" href=\"".$row['link']."\">".$row['alias']."</a></b></td>";
                                            } else {
                                                echo "<td><b>".$row['alias']."</b></td>";
                                            }
                                            echo "<td><b>".$row['finalsstreak']."</b></td>";
                                            echo "<td><b>".$row['finalsstreakdate']."</b></td>";
                                            echo "<td></td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="jumptimeouts">
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM jumpshowdown T WHERE T.blowdown = 0 ORDER BY T.winners DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Winners</th>
                                      <th scope = "col" style = "width: 10%;">Date Set</th>
                                      <th scope = "col" style = "width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $k = 1;
                                        $prev = 0;
                                        while ($row = mysqli_fetch_array($query)){
                                            if ($row['winners'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['winners'];
                                            echo "<tr>";
                                            echo "<td><b>".ordinal($k)."</b></td>";
                                            if ($k == 1){
                                                echo "<td style=\"text-align: center;\"><img src=\"gold.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 2){
                                                echo "<td style=\"text-align: center;\"><img src=\"silver.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 3){
                                                echo "<td style=\"text-align: center;\"><img src=\"bronze.png\" style=\"width: 25px;\"></td>";
                                            } else {
                                                echo "<td></th>";
                                            }
                                            
                                            $memberquery = mysqli_query($conn, "SELECT * FROM players P WHERE P.ign IN (SELECT ign FROM teams T WHERE T.teamid = ".$row['timeoutid'].")");
                                            echo "<td>";
                                            while ($memberrow = mysqli_fetch_array($memberquery)){
                                                echo "<p style=\"margin-bottom: .25rem\"><b>".$memberrow['ign']."</b></p>";
                                            }
                                            echo "</td>";
                                            
                                            $memberquery = mysqli_query($conn, "SELECT * FROM players P WHERE P.ign IN (SELECT ign FROM teams T WHERE T.teamid = ".$row['timeoutid'].")");
                                            echo "<td>";
                                            while ($memberrow = mysqli_fetch_array($memberquery)){
                                                if ($memberrow['link'] != ""){
                                                    echo "<p style=\"margin-bottom: .25rem\"><b><a class=\"link\"  target=\"_blank\" href=\"".$memberrow['link']."\">".$memberrow['alias']."</a></b></p>";
                                                } else {
                                                    echo "<p style=\"margin-bottom: .25rem\"><b>".$memberrow['alias']."</b></p>";
                                                }
                                            }
                                            echo "</td>";
                                            
                                            echo "<td><b>".$row['winners']."</b></td>";
                                            echo "<td><b>".$row['date']."</b></td>";
                                            if ($row['proof'] != ""){
                                                if ($row['video']){
                                                    echo "<td><a href=\"".$row['proof']."\" target=\"_blank\" rel=\"noopener noreferrer\"><img src=\"video.png\" style=\"padding-right: 10px; width: 35px;\"></a></td>";
                                                } elseif ($row['image']){
                                                    echo "<td><a href=\"".$row['proof']."\" target=\"_blank\" rel=\"noopener noreferrer\"><img src=\"image.png\" style=\"padding-right: 10px; width: 35px;\"></a></td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="jumptimesoutsfan">
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM jumpshowdown T WHERE T.blowdown = 1 ORDER BY T.winners DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Winners</th>
                                      <th scope = "col" style = "width: 10%;">Date Set</th>
                                      <th scope = "col" style = "width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $k = 1;
                                        $prev = 0;
                                        while ($row = mysqli_fetch_array($query)){
                                            if ($row['winners'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['winners'];
                                            echo "<tr>";
                                            echo "<td><b>".ordinal($k)."</b></td>";
                                            if ($k == 1){
                                                echo "<td style=\"text-align: center;\"><img src=\"gold.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 2){
                                                echo "<td style=\"text-align: center;\"><img src=\"silver.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 3){
                                                echo "<td style=\"text-align: center;\"><img src=\"bronze.png\" style=\"width: 25px;\"></td>";
                                            } else {
                                                echo "<td></th>";
                                            }
                                            
                                            $memberquery = mysqli_query($conn, "SELECT * FROM players P WHERE P.ign IN (SELECT ign FROM teams T WHERE T.teamid = ".$row['timeoutid'].")");
                                            echo "<td>";
                                            while ($memberrow = mysqli_fetch_array($memberquery)){
                                                echo "<p style=\"margin-bottom: .25rem\"><b>".$memberrow['ign']."</b></p>";
                                            }
                                            echo "</td>";
                                            
                                            $memberquery = mysqli_query($conn, "SELECT * FROM players P WHERE P.ign IN (SELECT ign FROM teams T WHERE T.teamid = ".$row['timeoutid'].")");
                                            echo "<td>";
                                            while ($memberrow = mysqli_fetch_array($memberquery)){
                                                if ($memberrow['link'] != ""){
                                                    echo "<p style=\"margin-bottom: .25rem\"><b><a class=\"link\"  target=\"_blank\" href=\"".$memberrow['link']."\">".$memberrow['alias']."</a></b></p>";
                                                } else {
                                                    echo "<p style=\"margin-bottom: .25rem\"><b>".$memberrow['alias']."</b></p>";
                                                }
                                            }
                                            echo "</td>";
                                            
                                            echo "<td><b>".$row['winners']."</b></td>";
                                            echo "<td><b>".$row['date']."</b></td>";
                                            if ($row['proof'] != ""){
                                                if ($row['video']){
                                                    echo "<td><a href=\"".$row['proof']."\" target=\"_blank\" rel=\"noopener noreferrer\"><img src=\"video.png\" style=\"padding-right: 10px; width: 35px;\"></a></td>";
                                                } elseif ($row['image']){
                                                    echo "<td><a href=\"".$row['proof']."\" target=\"_blank\" rel=\"noopener noreferrer\"><img src=\"image.png\" style=\"padding-right: 10px; width: 35px;\"></a></td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="winsdaily">
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM players WHERE players.winsdaily > 0 ORDER BY players.winsdaily DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Wins</th>
                                      <th scope = "col" style = "width: 10%;">Date Set</th>
                                      <th scope = "col" style = "width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $k = 1;
                                        $prev = 0;
                                        while ($row = mysqli_fetch_array($query)){
                                            if ($row['winsdaily'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['winsdaily'];
                                            echo "<tr>";
                                            echo "<td><b>".ordinal($k)."</b></td>";
                                            if ($k == 1){
                                                echo "<td style=\"text-align: center;\"><img src=\"gold.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 2){
                                                echo "<td style=\"text-align: center;\"><img src=\"silver.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 3){
                                                echo "<td style=\"text-align: center;\"><img src=\"bronze.png\" style=\"width: 25px;\"></td>";
                                            } else {
                                                echo "<td></th>";
                                            }
                                            echo "<td><b>".$row['ign']."</b></td>";
                                            if ($row['link'] != ""){
                                                echo "<td><b><a class=\"link\"  target=\"_blank\" href=\"".$row['link']."\">".$row['alias']."</a></b></td>";
                                            } else {
                                                echo "<td><b>".$row['alias']."</b></td>";
                                            }
                                            echo "<td><b>".$row['winsdaily']."</b></td>";
                                            echo "<td><b>".$row['winsdailydate']."</b></td>";
                                            echo "<td></td>";
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="longestfallball">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM fallballtime T, players P WHERE P.ign = T.ign ORDER BY T.time DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Time</th>
                                      <th scope = "col" style = "width: 10%;">Date Set</th>
                                      <th scope = "col" style = "width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $k = 1;
                                        $prev = 0;
                                        while ($row = mysqli_fetch_array($query)){
                                            if ($row['time'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['time'];
                                            echo "<tr>";
                                            echo "<td><b>".ordinal($k)."</b></td>";
                                            if ($k == 1){
                                                echo "<td style=\"text-align: center;\"><img src=\"gold.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 2){
                                                echo "<td style=\"text-align: center;\"><img src=\"silver.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 3){
                                                echo "<td style=\"text-align: center;\"><img src=\"bronze.png\" style=\"width: 25px;\"></td>";
                                            } else {
                                                echo "<td></th>";
                                            }
                                            echo "<td><b>".$row['ign']."</b></td>";
                                            if ($row['link'] != ""){
                                                echo "<td><b><a class=\"link\"  target=\"_blank\" href=\"".$row['link']."\">".$row['alias']."</a></b></td>";
                                            } else {
                                                echo "<td><b>".$row['alias']."</b></td>";
                                            }
                                            $timetext = "";
                                            $minutes = floor(($row['time'] / 60) % 60);
                                            if ($minutes > 0){
                                                $timetext = $timetext.$minutes."m";
                                            }
                                            if ($timetext != ""){
                                                $timetext = $timetext." ";
                                            }
                                            $seconds = $row['time'] - ($minutes * 60);
                                            $seconds = number_format((float)$seconds, 2, '.', '');
                                            $timetext = $timetext.$seconds."s";
                                            echo "<td><b>".$timetext."</b></td>";
                                            echo "<td><b>".$row['date']."</b></td>";
                                            if ($row['proof'] != ""){
                                                if ($row['video']){
                                                    echo "<td><a href=\"".$row['proof']."\" target=\"_blank\" rel=\"noopener noreferrer\"><img src=\"video.png\" style=\"padding-right: 10px; width: 35px;\"></a></td>";
                                                } elseif ($row['image']){
                                                    echo "<td><a href=\"".$row['proof']."\" target=\"_blank\" rel=\"noopener noreferrer\"><img src=\"image.png\" style=\"padding-right: 10px; width: 35px;\"></a></td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="jinxed">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM jinxedtime T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Time</th>
                                      <th scope = "col" style = "width: 10%;">Date Set</th>
                                      <th scope = "col" style = "width: 5%;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i = 1;
                                        $k = 1;
                                        $prev = 0;
                                        while ($row = mysqli_fetch_array($query)){
                                            if ($row['time'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['time'];
                                            echo "<tr>";
                                            echo "<td><b>".ordinal($k)."</b></td>";
                                            if ($k == 1){
                                                echo "<td style=\"text-align: center;\"><img src=\"gold.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 2){
                                                echo "<td style=\"text-align: center;\"><img src=\"silver.png\" style=\"width: 25px;\"></td>";
                                            } elseif ($k == 3){
                                                echo "<td style=\"text-align: center;\"><img src=\"bronze.png\" style=\"width: 25px;\"></td>";
                                            } else {
                                                echo "<td></th>";
                                            }
                                            echo "<td><b>".$row['ign']."</b></td>";
                                            if ($row['link'] != ""){
                                                echo "<td><b><a class=\"link\"  target=\"_blank\" href=\"".$row['link']."\">".$row['alias']."</a></b></td>";
                                            } else {
                                                echo "<td><b>".$row['alias']."</b></td>";
                                            }
                                            $timetext = "";
                                            $minutes = floor(($row['time'] / 60) % 60);
                                            if ($minutes > 0){
                                                $timetext = $timetext.$minutes."m";
                                            }
                                            if ($timetext != ""){
                                                $timetext = $timetext." ";
                                            }
                                            $seconds = $row['time'] - ($minutes * 60);
                                            $seconds = number_format((float)$seconds, 2, '.', '');
                                            $timetext = $timetext.$seconds."s";
                                            echo "<td><b>".$timetext."</b></td>";
                                            echo "<td><b>".$row['date']."</b></td>";
                                            if ($row['proof'] != ""){
                                                if ($row['video']){
                                                    echo "<td><a href=\"".$row['proof']."\" target=\"_blank\" rel=\"noopener noreferrer\"><img src=\"video.png\" style=\"padding-right: 10px; width: 35px;\"></a></td>";
                                                } elseif ($row['image']){
                                                    echo "<td><a href=\"".$row['proof']."\" target=\"_blank\" rel=\"noopener noreferrer\"><img src=\"image.png\" style=\"padding-right: 10px; width: 35px;\"></a></td>";
                                                } else {
                                                    echo "<td></td>";
                                                }
                                            } else {
                                                echo "<td></td>";
                                            }
                                            echo "</tr>";
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script>
            var page = "winstreak";
        
            $("#winstreaktab").click(function(){
                $('.textcontainer > :not(#winstreakSidebar)').hide();
                $("#winstreakSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/FallMountain.png");
                $("#blowdown").hide();
                $("#vanilla").hide();
                $("#solos").show();
                $("#squads").show();
                $('.tab-content > :not(#winstreak)').hide();
                $("#winstreak").show();
                $("#blowdown").removeClass("active");
                $("#squads").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#solos").addClass("active");
                page = "winstreak";
            })
            $("#finalsstreaktab").click(function(){
                $('.textcontainer > :not(#finalsstreakSidebar)').hide();
                $("#finalsstreakSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/RollOff.png");
                $("#blowdown").hide();
                $("#vanilla").hide();
                $("#solos").hide();
                $("#squads").hide();
                $('.tab-content > :not(#finalsstreak)').hide();
                $("#finalsstreak").show();
                $("#blowdown").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#solos").removeClass("active");
                $("#squads").removeClass("active");
                page = "finalsstreak";
            })
            $("#jumptimeoutstab").click(function(){
                $('.textcontainer > :not(#jumptimeoutsSidebar)').hide();
                $("#jumptimeoutsSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/JumpShowdown.png");
                $("#blowdown").show();
                $("#vanilla").show();
                $("#solos").hide();
                $("#squads").hide();
                $('.tab-content > :not(#jumptimeouts)').hide();
                $("#jumptimeouts").show();
                $("#blowdown").removeClass("active");
                $("#vanilla").addClass("active");
                $("#solos").removeClass("active");
                $("#squads").removeClass("active");
                page = "jumptimeouts";
            })
            $("#winsdailytab").click(function(){
                $('.textcontainer > :not(#winsdailySidebar)').hide();
                $("#winsdailySidebar").show();
                $("#thumbnail").attr("src", "thumbnails/RoyalFumble.png");
                $("#blowdown").hide();
                $("#vanilla").hide();
                $("#solos").hide();
                $("#squads").hide();
                $('.tab-content > :not(#winsdaily)').hide();
                $("#winsdaily").show();
                $("#blowdown").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#solos").removeClass("active");
                $("#squads").removeClass("active");
                page = "winsdaily";
            })
            $("#longestfallballtab").click(function(){
                $('.textcontainer > :not(#longestfallballSidebar)').hide();
                $("#longestfallballSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/FallBall.png");
                $("#blowdown").hide();
                $("#vanilla").hide();
                $("#solos").hide();
                $("#squads").hide();
                $('.tab-content > :not(#longestfallball)').hide();
                $("#longestfallball").show();
                $("#blowdown").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#solos").removeClass("active");
                $("#squads").removeClass("active");
                page = "fallball";
            })
            $("#jinxedtab").click(function(){
                $('.textcontainer > :not(#jinxedSidebar)').hide();
                $("#jinxedSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/Jinxed.png");
                $("#blowdown").hide();
                $("#vanilla").hide();
                $("#solos").hide();
                $("#squads").hide();
                $('.tab-content > :not(#jinxed)').hide();
                $("#jinxed").show();
                $("#blowdown").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#solos").removeClass("active");
                $("#squads").removeClass("active");
                page = "jinxed";
            })
            
            $("#vanilla").click(function(){
                if (page == "jumptimeouts"){
                    $("#jumptimesoutsfan").hide();
                    $("#jumptimeouts").show();
                }
            })
            
            $("#blowdown").click(function(){
                if (page == "jumptimeouts"){
                    $("#jumptimesoutsfan").show();
                    $("#jumptimeouts").hide();
                }
            })
            
            $("#solos").click(function(){
                if (page == "winstreak"){
                    $("#winstreak").show();
                    $("#winstreaksquad").hide();
                }
            })
            
            $("#squads").click(function(){
                if (page == "winstreak"){
                    $("#winstreaksquad").show();
                    $("#winstreak").hide();
                }
            })
        </script>
        
    </body>
</html>