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
    
    preloadImages(["thumbnails/SlimeClimb.png", "/thumbnails/SeeSaw.png", "thumbnails/DoorDash.png", "thumbnails/WallGuys.png", "thumbnails/Whirlygig.png", "thumbnails/GateCrash.png", "thumbnails/HoopsieLegends.png", "thumbnails/DizzyHeights.png", "thumbnails/FallMountain.png", "thumbnails/TipToe.png", "thumbnails/TundraRun.png", "thumbnails/BigFans.png", "thumbnails/SkiFall.png", "thumbnails/HitParade.png", "thumbnails/FruitChute.png", "thumbnails/RockNRoll.png", "thumbnails/KnightFever.png", "thumbnails/FreezyPeak.png", "thumbnails/SnowyScrap.png", "thumbnails/RollOn.png", "thumbnails/SkylineStumble.png", "thumbnails/ShortCircuit.png", "thumbnails/Slimescraper.png"]);
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
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Races
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>-->
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
                    <img class = "thumbnail" id = "thumbnail" src = "/thumbnails/BigFans.png">
                    <div class = "textcontainer">
                        <div id="slimeclimbSidebar" style="display: none;">
                            <h5>Slime Climb</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 21-40</p>
                            <p><i>Outrun the slime and reach the finish line!</i></p>
                        </div>
                        <div id="slimescraperSidebar" style="display: none;">
                            <h5>Slimescraper</h5>
                            <br>
                            <p>Released: Season 4.5</p>
                            <p>Player Count: 21-40</p>
                            <p><i>Outrun the slime and reach the finish line!</i></p>
                        </div>
                        <div id="seesawSidebar" style="display: none;">
                            <h5>See Saw</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Run and balance across rows of see-saws to reach the finish line!</i></p>
                        </div>
                        <div id="doordashSidebar" style="display: none;">
                            <h5>Door Dash</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Avoid the fake doors and race to the finish!</i></p>
                        </div>
                        <div id="wallguysSidebar" style="display: none;">
                            <h5>Wall Guys</h5>
                            <br>
                            <p>Released: Season 2</p>
                            <p>Player Count: 15-30</p>
                            <p><i>Use &lt;GRAB&gt; to GRAB and move blocks - create paths and jump along to cross walls and reach the finish line!</i></p>
                        </div>
                        <div id="whirlygigSidebar" style="display: none;">
                            <h5>Whirlygig</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Navigate the obstacles and race to the finish line!</i></p>
                        </div>
                        <div id="gatecrashSidebar" style="display: none;">
                            <h5>Gate Crash</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Avoid the moving doors and race to the finish line!</i></p>
                        </div>
                        <div id="hoopsielegendsSidebar" style="display: none;">
                            <h5>Hoopsie Legends</h5>
                            <br>
                            <p>Released: Season 2</p>
                            <p>Player Count: 10-30</p>
                            <p><i>JUMP and DIVE through hoops to score 6 points!</i></p>
                        </div>
                        <div id="dizzyheightsSidebar" style="display: none;">
                            <h5>Dizzy Heights</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Navigate the obstacles and race to the finish line!</i></p>
                        </div>
                        <div id="fallmountainSidebar" style="display: none;">
                            <h5>Fall Mountain</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 2-10</p>
                            <p><i>Reach the top of the mountain first and use &lt;GRAB&gt; to GRAB the CROWN!</i></p>
                        </div>
                        <div id="tiptoeSidebar" style="display: none;">
                            <h5>Tip Toe</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 10-25</p>
                            <p><i>Avoid fake tiles and find the hidden path to reach the finish line!</i></p>
                        </div>
                        <div id="tundrarunSidebar" style="display: none;">
                            <h5>Tundra Run</h5>
                            <br>
                            <p>Released: Season 3</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Navigate the frosty obstacles and race to the finish line!</i></p>
                        </div>
                        <div id="bigfansSidebar">
                            <h5>Big Fans</h5>
                            <br>
                            <p>Released: Season 2.5</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Navigate the obstacles and race to the finish line!</i></p>
                        </div>
                        <div id="skifallSidebar" style="display: none;">
                            <h5>Ski Fall</h5>
                            <br>
                            <p>Released: Season 3</p>
                            <p>Player Count: 24-43</p>
                            <p><i>Jump through the holes to score points!</i></p>
                        </div>
                        <div id="hitparadeSidebar" style="display: none;">
                            <h5>Hit Parade</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Navigate the obstacles and race to the finish line!</i></p>
                        </div>
                        <div id="fruitchuteSidebar" style="display: none;">
                            <h5>Fruit Chute</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 10-34</p>
                            <p><i>Dodge the flying fruit and race up the conveyor belt to reach the finish line!</i></p>
                        </div>
                        <div id="rocknrollSidebar" style="display: none;">
                            <h5>Rock 'N' Roll</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 15-30</p>
                            <p><i>Push your ball to the finish as a team to qualify!</i></p>
                        </div>
                        <div id="snowyscrapSidebar" style="display: none;">
                            <h5>Snowy Scrap</h5>
                            <br>
                            <p>Released: Season 3</p>
                            <p>Player Count: 12-30</p>
                            <p><i>Push your snowball through snow to grow it to max size!</i></p>
                        </div>
                        <div id="knightfeverSidebar" style="display: none;">
                            <h5>Knight Fever</h5>
                            <br>
                            <p>Released: Season 2</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Navigate the Medieval obstacles and race to the finish line!</i></p>
                        </div>
                        <div id="freezypeakSidebar" style="display: none;">
                            <h5>Freezy Peak</h5>
                            <br>
                            <p>Released: Season 3</p>
                            <p>Player Count: 10-40</p>
                            <p><i>Scale the frozen mountain to reach the finish line at the peak!</i></p>
                        </div>
                        <div id="skylinestumbleSidebar" style="display: none;">
                            <h5>Skyline Stumble</h5>
                            <br>
                            <p>Released: Season 4</p>
                            <p>Player Count: 40-60</p>
                            <p><i>Navigate the futuristic obstacles and race to the finish line!</i></p>
                        </div>
                        <div id="shortcircuitSidebar" style="display: none;">
                            <h5>Short Circuit</h5>
                            <br>
                            <p>Released: Season 4</p>
                            <p>Player Count: 30-43</p>
                            <p><i>Navigate the obstacles and race 2 laps around the course</i></p>
                        </div>
                        <div id="rollonSidebar" style="display: none;">
                            <h5>Roll On</h5>
                            <br>
                            <p>Released: Season 4</p>
                            <p>Player Count: 30-60</p>
                            <p><i>Run across the rotating rings to reach the finish line!</i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col2">
                <ul class="nav nav-tabs flex-wrap-reverse">
                    <li class="nav-item">
                        <a class="nav-link active" id="bigfanstab" href="#bigfans" data-toggle="tab">Big Fans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="dizzyheightstab" href="#dizzyheights" data-toggle="tab">Dizzy Heights</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="doordashtab" href="#doordash" data-toggle="tab">Door Dash</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="fallmountaintab" href="#fallmountain" data-toggle="tab">Fall Mountain</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="freezypeaktab" href="#freezypeak" data-toggle="tab">Freezy Peak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="fruitchutetab" href="#fruitchute" data-toggle="tab">Fruit Chute</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="gatecrashtab" href="#gatecrash" data-toggle="tab">Gate Crash</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hitparadetab" href="#hitparade" data-toggle="tab">Hit Parade</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hoopsielegendstab" href="#hoopsielegends" data-toggle="tab">Hoopsie Legends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="knightfevertab" href="#knightfever" data-toggle="tab">Knight Fever</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="rocknrolltab" href="#rocknroll" data-toggle="tab">Rock 'N' Roll</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="rollontab" href="#rollon" data-toggle="tab">Roll On</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="seesawtab" href="#seesaw" data-toggle="tab">See Saw</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="shortcircuittab" href="#shortcircuit" data-toggle="tab">Short Circuit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="skifalltab" href="#skifall" data-toggle="tab">Ski Fall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="skylinestumbletab" href="#skylinestumble" data-toggle="tab">Skyline Stumble</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="slimeclimbtab" href="#slimeclimb" data-toggle="tab">Slime Climb</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="slimescrapertab" href="#slimescraper" data-toggle="tab">Slimescraper</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="snowyscraptab" href="#snowyscrap" data-toggle="tab">Snowy Scrap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tiptoetab" href="#tiptoe" data-toggle="tab">Tip Toe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tundraruntab" href="#tundrarun" data-toggle="tab">Tundra Run</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="wallguystab" href="#wallguys" data-toggle="tab">Wall Guys</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="whirlygigtab" href="#whirlygig" data-toggle="tab">Whirlygig</a>
                    </li>
                </ul>
                <div class="content">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style = "margin-left: 1rem; margin-bottom: 1rem;">
                        <label class="btn btn-info active" id="allruns" style="display:none;">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked>All Runs
                        </label>
                        <label class="btn btn-info" id="glitchless" style="display:none;">
                            <input type="radio" name="options" id="option2" autocomplete="off">Glitchless
                        </label>
                        <label class="btn btn-info" id="vanilla" style="display:none;">
                            <input type="radio" name="options" id="option2" autocomplete="off">No Hammers
                        </label>
                        <label class="btn btn-info" id="sixrings" style="display:none;">
                            <input type="radio" name="options" id="option2" autocomplete="off">6 Rings
                        </label>
                    </div>
                    
                    <button type="button" class="btn btn-outline-light" id="rulesbutton" data-toggle="modal" data-target="#exampleModalCenter" style="display:none">Rules</button>
                    
                    <div class="tab-content">
                        <div class="tab-pane" id="slimescraper">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM slimescraper T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="slimeclimb">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM slimeclimb T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="slimeclimbvanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM slimeclimb T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="seesaw">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM seesaw T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="seesawvanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM seesaw T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="doordash">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM doordash T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="doordashvanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM doordash T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="doordashglitchless">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM doordash T, players P WHERE P.ign = T.ign AND T.glitch = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="wallguys">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM wallguys T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="whirlygig">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM whirlygig T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="whirlygigglitchless">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM whirlygig T, players P WHERE P.ign = T.ign AND T.glitch = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="gatecrash">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM gatecrash T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="hoopsielegends">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM hoopsielegends T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="hoopsielegendssixrings">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM hoopsielegends T, players P WHERE P.ign = T.ign AND T.sixrings = 1 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="dizzyheights">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM dizzyheights T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="rollon">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM rollon T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="dizzyheightsvanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM dizzyheights T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="fallmountain">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM fallmountain T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="tiptoe">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM tiptoe T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="tiptoevanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM tiptoe T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="tundrarun">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM tundrarun T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane active" id="bigfans">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM bigfans T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="skifall">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM skifall T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <div class="alert alert-warning" role="alert" style="text-align: center; background-color: #333; color: #f3f3f3; border-color: #aaa; width: 70%; margin: 0 auto 10px auto;">
                                <strong>NOTICE: </strong>The Ski Fall glitch is no longer viable, but those times are included on this leaderboard
                            </div>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="skifallglitchless">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM skifall T, players P WHERE P.ign = T.ign AND T.glitch = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="hitparade">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM hitparade T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="fruitchute">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM fruitchute T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="rocknroll">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM rocknroll T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="snowyscrap">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM snowyscrap T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="knightfever">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM knightfever T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="knightfevervanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM knightfever T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="freezypeak">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM freezypeak T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="skylinestumble">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM skylinestumble T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
                        <div class="tab-pane" id="shortcircuit">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.time, T.date, T.proof, T.video, T.image FROM shortcircuit T, players P WHERE P.ign = T.ign ORDER BY T.time");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%"></th>
                                      <th scope = "col" style = "width: 35%">Player</th>
                                      <th scope = "col" style = "width: 20%">Alias</th>
                                      <th scope = "col" style = "width: 10%">Time</th>
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
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Rules</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Category Rules</h5>
                        <p style="color:#ddd"></p>
                        <h5>General Rules</h5>
                        <p style="color:#ddd"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modalclose">Close</button>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script>
            var page = "bigfans";
            
            function updateCorners(){
                
                if ($("#glitchless").is(':visible') && $("#vanilla").is(":hidden") && $("#sixrings").is(":hidden")){
                    $('#glitchless').css('border-bottom-right-radius', '.25rem');
                    $('#glitchless').css('border-top-right-radius', '.25rem');
                } else {
                    $('#glitchless').css('border-bottom-right-radius', '0');
                    $('#glitchless').css('border-top-right-radius', '0');
                }
                if ($("#vanilla").is(':visible') && $("#sixrings").is(":hidden")){
                    $('#vanilla').css('border-bottom-right-radius', '.25rem');
                    $('#vanilla').css('border-top-right-radius', '.25rem');
                } else {
                    $('#vanilla').css('border-bottom-right-radius', '0');
                    $('#vanilla').css('border-top-right-radius', '0');
                }
            }
        
            $("#slimeclimbtab").click(function(){
                $('.textcontainer > :not(#slimeclimbSidebar)').hide();
                $('.tab-content > :not(#slimeclimb)').hide();
                $("#slimeclimb").show();
                $("#slimeclimbSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/SlimeClimb.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").show();
                $("#vanilla").show();
                page = "slimeclimb";
                updateCorners();
            })
            $("#slimescrapertab").click(function(){
                $('.textcontainer > :not(#slimescraperSidebar)').hide();
                $('.tab-content > :not(#slimescraper)').hide();
                $("#slimescraper").show();
                $("#slimescraperSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/Slimescraper.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "slimescraper";
                updateCorners();
            })
            $("#seesawtab").click(function(){
                $('.textcontainer > :not(#seesawSidebar)').hide();
                $('.tab-content > :not(#seesaw)').hide();
                $("#seesaw").show();
                $("#seesawSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/SeeSaw.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").show();
                $("#vanilla").show();
                page = "seesaw";
                updateCorners();
            })
            $("#doordashtab").click(function(){
                $('.textcontainer > :not(#doordashSidebar)').hide();
                $('.tab-content > :not(#doordash)').hide();
                $("#doordash").show();
                $("#doordashSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/DoorDash.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").show();
                $("#allruns").show();
                $("#vanilla").show();
                page = "doordash";
                updateCorners();
            })
            $("#wallguystab").click(function(){
                $('.textcontainer > :not(#wallguysSidebar)').hide();
                $('.tab-content > :not(#wallguys)').hide();
                $("#wallguys").show();
                $("#wallguysSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/WallGuys.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "wallguys";
                updateCorners();
            })
            $("#whirlygigtab").click(function(){
                $('.textcontainer > :not(#whirlygigSidebar)').hide();
                $('.tab-content > :not(#whirlygig)').hide();
                $("#whirlygig").show();
                $("#whirlygigSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/Whirlygig.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").show();
                $("#allruns").show();
                $("#vanilla").hide();
                page = "whirlygig";
                updateCorners();
            })
            $("#gatecrashtab").click(function(){
                $('.textcontainer > :not(#gatecrashSidebar)').hide();
                $('.tab-content > :not(#gatecrash)').hide();
                $("#gatecrash").show();
                $("#gatecrashSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/GateCrash.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "gatecrash";
                updateCorners();
            })
            $("#hoopsielegendstab").click(function(){
                $('.textcontainer > :not(#hoopsielegendsSidebar)').hide();
                $('.tab-content > :not(#hoopsielegends)').hide();
                $("#hoopsielegends").show();
                $("#hoopsielegendsSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/HoopsieLegends.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").show();
                $("#glitchless").hide();
                $("#vanilla").hide();
                $("#allruns").show();
                page = "hoopsielegends";
                updateCorners();
            })
            $("#dizzyheightstab").click(function(){
                $('.textcontainer > :not(#dizzyheightsSidebar)').hide();
                $('.tab-content > :not(#dizzyheights)').hide();
                $("#dizzyheights").show();
                $("#dizzyheightsSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/DizzyHeights.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").show();
                $("#vanilla").show();
                page = "dizzyheights";
                updateCorners();
            })
            $("#fallmountaintab").click(function(){
                $('.textcontainer > :not(#fallmountainSidebar)').hide();
                $('.tab-content > :not(#fallmountain)').hide();
                $("#fallmountain").show();
                $("#fallmountainSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/FallMountain.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "fallmountain";
                updateCorners();
            })
            $("#tiptoetab").click(function(){
                $('.textcontainer > :not(#tiptoeSidebar)').hide();
                $('.tab-content > :not(#tiptoe)').hide();
                $("#tiptoe").show();
                $("#tiptoeSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/TipToe.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").show();
                $("#vanilla").show();
                page = "tiptoe";
                updateCorners();
            })
            $("#tundraruntab").click(function(){
                $('.textcontainer > :not(#tundrarunSidebar)').hide();
                $('.tab-content > :not(#tundrarun)').hide();
                $("#tundrarun").show();
                $("#tundrarunSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/TundraRun.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "tundrarun";
                updateCorners();
            })
            $("#bigfanstab").click(function(){
                $('.textcontainer > :not(#bigfansSidebar)').hide();
                $('.tab-content > :not(#bigfans)').hide();
                $("#bigfans").show();
                $("#bigfansSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/BigFans.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "bigfans";
                updateCorners();
            })
            $("#skifalltab").click(function(){
                $('.textcontainer > :not(#skifallSidebar)').hide();
                $('.tab-content > :not(#skifall)').hide();
                $("#skifall").show();
                $("#skifallSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/SkiFall.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").show();
                $("#allruns").show();
                $("#vanilla").hide();
                page = "skifall";
                updateCorners();
            })
            $("#hitparadetab").click(function(){
                $('.textcontainer > :not(#hitparadeSidebar)').hide();
                $('.tab-content > :not(#hitparade)').hide();
                $("#hitparade").show();
                $("#hitparadeSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/HitParade.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "hitparade";
                updateCorners();
            })
            $("#fruitchutetab").click(function(){
                $('.textcontainer > :not(#fruitchuteSidebar)').hide();
                $('.tab-content > :not(#fruitchute)').hide();
                $("#fruitchute").show();
                $("#fruitchuteSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/FruitChute.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "fruitchute";
                updateCorners();
            })
            $("#rocknrolltab").click(function(){
                $('.textcontainer > :not(#rocknrollSidebar)').hide();
                $('.tab-content > :not(#rocknroll)').hide();
                $("#rocknroll").show();
                $("#rocknrollSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/RockNRoll.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "rocknroll";
                updateCorners();
            })
            $("#snowyscraptab").click(function(){
                $('.textcontainer > :not(#snowyscrapSidebar)').hide();
                $('.tab-content > :not(#snowyscrap)').hide();
                $("#snowyscrap").show();
                $("#snowyscrapSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/SnowyScrap.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "snowyscrap";
                updateCorners();
            })
            $("#knightfevertab").click(function(){
                $('.textcontainer > :not(#knightfeverSidebar)').hide();
                $('.tab-content > :not(#knightfever)').hide();
                $("#knightfever").show();
                $("#knightfeverSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/KnightFever.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").show();
                $("#vanilla").show();
                page = "knightfever";
                updateCorners();
            })
            $("#freezypeaktab").click(function(){
                $('.textcontainer > :not(#freezypeakSidebar)').hide();
                $('.tab-content > :not(#freezypeak)').hide();
                $("#freezypeak").show();
                $("#freezypeakSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/FreezyPeak.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "freezypeak";
                updateCorners();
            })
            $("#rollontab").click(function(){
                $('.textcontainer > :not(#rollonSidebar)').hide();
                $('.tab-content > :not(#rollon)').hide();
                $("#rollon").show();
                $("#rollonSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/RollOn.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "rollon";
                updateCorners();
            })
            $("#skylinestumbletab").click(function(){
                $('.textcontainer > :not(#skylinestumbleSidebar)').hide();
                $('.tab-content > :not(#skylinestumble)').hide();
                $("#skylinestumble").show();
                $("#skylinestumbleSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/SkylineStumble.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "skylinestumble";
                updateCorners();
            })
            $("#shortcircuittab").click(function(){
                $('.textcontainer > :not(#shortcircuitSidebar)').hide();
                $('.tab-content > :not(#shortcircuit)').hide();
                $("#shortcircuit").show();
                $("#shortcircuitSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/ShortCircuit.png");
                $("#glitchless").removeClass("active");
                $("#vanilla").removeClass("active");
                $("#allruns").addClass("active")
                $("#sixrings").removeClass("active");
                $("#sixrings").hide();
                $("#glitchless").hide();
                $("#allruns").hide();
                $("#vanilla").hide();
                page = "shortcircuit";
                updateCorners();
            })
            
            $("#glitchless").click(function(){
                if (page == "doordash"){
                    $("#doordashglitchless").show();
                    $("#doordash").hide();
                    $("#doordashvanilla").hide();
                } else if (page == "whirlygig"){
                    $("#whirlygigglitchless").show();
                    $("#whirlygig").hide();
                } else if (page == "skifall"){
                    $("#skifallglitchless").show();
                    $("#skifall").hide();
                    $("#skifallvanilla").hide();
                }
            })
            $("#allruns").click(function(){
                if (page == "doordash"){
                    $("#doordashglitchless").hide();
                    $("#doordash").show();
                    $("#doordashvanilla").hide();
                } else if (page == "whirlygig"){
                    $("#whirlygigglitchless").hide();
                    $("#whirlygig").show();
                } else if (page == "hoopsielegends"){
                    $("#hoopsielegendssixrings").hide();
                    $("#hoopsielegends").show();
                } else if (page == "slimeclimb"){
                    $("#slimeclimb").show();
                    $("#slimeclimbvanilla").hide();
                } else if (page == "seesaw"){
                    $("#seesaw").show();
                    $("#seesawvanilla").hide();
                } else if (page == "dizzyheights"){
                    $("#dizzyheights").show();
                    $("#dizzyheightsvanilla").hide();
                } else if (page == "tiptoe"){
                    $("#tiptoe").show();
                    $("#tiptoevanilla").hide();
                } else if (page == "knightfever"){
                    $("#knightfever").show();
                    $("#knightfevervanilla").hide();
                } else if (page == "skifall"){
                    $("#skifall").show();
                    $("#skifallglitchless").hide();
                }
            })
            $("#sixrings").click(function(){
                if (page == "hoopsielegends"){
                    $("#hoopsielegendssixrings").show();
                    $("#hoopsielegends").hide();
                }
            })
            $("#vanilla").click(function(){
                if (page == "doordash"){
                    $("#doordashglitchless").hide();
                    $("#doordash").hide();
                    $("#doordashvanilla").show();
                } else if (page == "slimeclimb"){
                    $("#slimeclimb").hide();
                    $("#slimeclimbvanilla").show();
                } else if (page == "seesaw"){
                    $("#seesaw").hide();
                    $("#seesawvanilla").show();
                } else if (page == "dizzyheights"){
                    $("#dizzyheights").hide();
                    $("#dizzyheightsvanilla").show();
                } else if (page == "tiptoe"){
                    $("#tiptoe").hide();
                    $("#tiptoevanilla").show();
                } else if (page == "knightfever"){
                    $("#knightfever").hide();
                    $("#knightfevervanilla").show();
                }
            })
            
            updateCorners();
        </script>
        
    </body>
</html>