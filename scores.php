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
    
    preloadImages(["thumbnails/ButtonBashers.png", "thumbnails/EggScramble.png", "thumbnails/EggSiege.png", "thumbnails/FallBall.png", "thumbnails/HoopsieDaisy.png", "thumbnails/Jinxed.png", "thumbnails/PegwinPursuit.png", "thumbnails/Basketfall.png", "thumbnails/PowerTrip.png"]);
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
                    <img class = "thumbnail" id="thumbnail" src = "/thumbnails/Basketfall.png">
                    <div class = "textcontainer">
                        <div id="buttonbashersSidebar" style="display: none;">
                            <h5>Button Bashers</h5>
                            <br>
                            <p>Released: Season 4.5</p>
                            <p>Player Count: 2-30</p>
                            <p><i>Press the button that lights up to score points and defeat your rival!</i></p>
                        </div>
                        <div id="eggscrambleSidebar" style="display: none;">
                            <h5>Egg Scramble</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 12-39</p>
                            <p><i>Put the most eggs in your team's basket before the timer runs out!</i></p>
                        </div>
                        <div id="eggsiegeSidebar" style="display: none;">
                            <h5>Egg Siege</h5>
                            <br>
                            <p>Released: Season 2</p>
                            <p>Player Count: 12-39</p>
                            <p><i>Put the most eggs in your team's basket before the timer runs out!</i></p>
                        </div>
                        <div id="fallballSidebar" style="display: none;">
                            <h5>Fall Ball</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 8-20</p>
                            <p><i>Score goals by getting balls into the opposing team's - work together to get the win!</i></p>
                        </div>
                        <div id="hoopsiedaisySidebar" style="display: none;">
                            <h5>Hoopsie Daisy</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 15-30</p>
                            <p><i>JUMP and DIVE through hoops to score points for your team!</i></p>
                        </div>
                        <div id="jinxedSidebar" style="display: none;">
                            <h5>Jinxed</h5>
                            <br>
                            <p>Released: Season 1</p>
                            <p>Player Count: 40-50</p>
                            <p><i>The first team to get completely Jinxed are eliminated!</i></p>
                        </div>
                        <div id="pegwinpursuitSidebar" style="display: none;">
                            <h5>Pegwin Pursuit</h5>
                            <br>
                            <p>Released: Season 3</p>
                            <p>Player Count: 12-30</p>
                            <p><i>Grab and hold onto a Penguin to score points for your team!</i></p>
                        </div>
                        <div id="powertripSidebar" style="display: none;">
                            <h5>Power Trip</h5>
                            <br>
                            <p>Released: Season 4</p>
                            <p>Player Count: 8-30</p>
                            <p><i>GRAB the batteries and RUN across the tiles to re-colour the field!</i></p>
                        </div>
                        <div id="basketfallSidebar">
                            <h5>Basketfall</h5>
                            <br>
                            <p>Released: Season 4</p>
                            <p>Player Count: 8-20</p>
                            <p><i>Score points by getting balls into the opposing team's basket - work together to get the win!</i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col2">
                <ul class="nav nav-tabs flex-wrap-reverse">
                    <li class="nav-item">
                        <a class="nav-link active" id="basketfalltab" href="#basketfall" data-toggle="tab">Basketfall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#eggscramble" id="eggscrambletab" data-toggle="tab">Egg Scramble</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#buttonbashers" id="buttonbasherstab" data-toggle="tab">Button Bashers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="eggsiegetab" href="#eggsiege" data-toggle="tab">Egg Siege</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="fallballtab" href="#fallball" data-toggle="tab">Fall Ball</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hoopsiedaisytab" href="#hoopsiedaisy" data-toggle="tab">Hoopsie Daisy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="jinxedtab" href="#jinxed" data-toggle="tab">Jinxed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pegwinpursuittab" href="#pegwinpursuit" data-toggle="tab">Pegwin Pursuit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="powertriptab" href="#powertrip" data-toggle="tab">Power Trip</a>
                    </li>
                </ul>
                <div class="content">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style = "margin-left: 20px; margin-bottom: 20px;">
                        <label class="btn btn-info active" id="allscores" style="display:none;">
                            <input type="radio" name="options" id="option1" autocomplete="off" checked>All Scores
                        </label>
                        <label class="btn btn-info" id="vanilla" style="display:none;">
                            <input type="radio" name="options" id="option2" autocomplete="off">Vanilla
                        </label>
                    </div>
                    
                    <div class="tab-content">
                        <div class="tab-pane" id="buttonbashers">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM buttonbashers T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="eggscramble">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM eggscramble T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="eggscramblevanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM eggscramble T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="eggsiege">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM eggsiege T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="fallball">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM fallball T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane active" id="basketfall">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM basketfall T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="hoopsiedaisy">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM hoopsiedaisy T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="hoopsiedaisyvanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM hoopsiedaisy T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM jinxed T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="pegwinpursuit">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM pegwinpursuit T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="powertrip">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM powertrip T, players P WHERE P.ign = T.ign ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
                        <div class="tab-pane" id="pegwinpursuitvanilla">
                            <?php
                                $query = mysqli_query($conn, "SELECT P.ign, P.alias, P.link, T.score, T.date, T.proof, T.video, T.image FROM pegwinpursuit T, players P WHERE P.ign = T.ign AND T.variant = 0 ORDER BY T.score DESC");
                            ?>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                      <th scope = "col" style = "width: 5%;">#</th>
                                      <th scope = "col" style = "width: 10%;"></th>
                                      <th scope = "col" style = "width: 35%;">Player</th>
                                      <th scope = "col" style = "width: 20%;">Alias</th>
                                      <th scope = "col" style = "width: 10%;">Score</th>
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
                                            if ($row['score'] != $prev) {
                                                $k = $i;
                                            }
                                            $prev = $row['score'];
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
                                            echo "<td><b>".$row['score']."</b></td>";
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
            var page = "basketfall";
            
            $("#buttonbasherstab").click(function(){
                $('.textcontainer > :not(#buttonbashersSidebar)').hide();
                $("#buttonbashersSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/ButtonBashers.png");
                $("#allscores").hide();
                $("#vanilla").hide();
                $('.tab-content > :not(#buttonbashers)').hide();
                $("#buttonbashers").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "buttonbashers";
            })
            $("#eggscrambletab").click(function(){
                $('.textcontainer > :not(#eggscrambleSidebar)').hide();
                $("#eggscrambleSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/EggScramble.png");
                $("#allscores").show();
                $("#vanilla").show();
                $('.tab-content > :not(#eggscramble)').hide();
                $("#eggscramble").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "eggscramble";
            })
            $("#eggsiegetab").click(function(){
                $('.textcontainer > :not(#eggsiegeSidebar)').hide();
                $("#eggsiegeSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/EggSiege.png");
                $("#allscores").hide();
                $("#vanilla").hide();
                $('.tab-content > :not(#eggsiege)').hide();
                $("#eggsiege").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "eggsiege";
            })
            $("#fallballtab").click(function(){
                $('.textcontainer > :not(#fallballSidebar)').hide();
                $("#fallballSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/FallBall.png");
                $("#allscores").hide();
                $("#vanilla").hide();
                $('.tab-content > :not(#fallball)').hide();
                $("#fallball").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "fallball";
            })
            $("#hoopsiedaisytab").click(function(){
                $('.textcontainer > :not(#hoopsiedaisySidebar)').hide();
                $("#hoopsiedaisySidebar").show();
                $("#thumbnail").attr("src", "thumbnails/HoopsieDaisy.png");
                $("#allscores").show();
                $("#vanilla").show();
                $('.tab-content > :not(#hoopsiedaisy)').hide();
                $("#hoopsiedaisy").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "hoopsiedaisy";
            })
            $("#jinxedtab").click(function(){
                $('.textcontainer > :not(#jinxedSidebar)').hide();
                $("#jinxedSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/Jinxed.png");
                $("#allscores").hide();
                $("#vanilla").hide();
                $('.tab-content > :not(#jinxed)').hide();
                $("#jinxed").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "jinxed";
            })
            $("#pegwinpursuittab").click(function(){
                $('.textcontainer > :not(#pegwinpursuitSidebar)').hide();
                $("#pegwinpursuitSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/PegwinPursuit.png");
                $("#allscores").show();
                $("#vanilla").show();
                $('.tab-content > :not(#pegwinpursuit)').hide();
                $("#pegwinpursuit").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "pegwinpursuit";
            })
            $("#powertriptab").click(function(){
                $('.textcontainer > :not(#powertripSidebar)').hide();
                $("#powertripSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/PowerTrip.png");
                $("#allscores").hide();
                $("#vanilla").hide();
                $('.tab-content > :not(#powertrip)').hide();
                $("#powertrip").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "powertrip";
            })
            $("#basketfalltab").click(function(){
                $('.textcontainer > :not(#basketfallSidebar)').hide();
                $("#basketfallSidebar").show();
                $("#thumbnail").attr("src", "thumbnails/Basketfall.png");
                $("#allscores").hide();
                $("#vanilla").hide();
                $('.tab-content > :not(#basketfall)').hide();
                $("#basketfall").show();
                $("#vanilla").removeClass("active");
                $("#allscores").addClass("active")
                page = "basketfall";
            })
            
            $("#vanilla").click(function(){
                if (page == "eggscramble"){
                    $("#eggscramble").hide();
                    $("#eggscramblevanilla").show();
                } else if (page == "hoopsiedaisy"){
                    $("#hoopsiedaisy").hide();
                    $("#hoopsiedaisyvanilla").show();
                } else if (page == "pegwinpursuit"){
                    $("#pegwinpursuit").hide();
                    $("#pegwinpursuitvanilla").show();
                }
            })
            
            $("#allscores").click(function(){
                if (page == "eggscramble"){
                    $("#eggscramble").show();
                    $("#eggscramblevanilla").hide();
                } else if (page == "hoopsiedaisy"){
                    $("#hoopsiedaisy").show();
                    $("#hoopsiedaisyvanilla").hide();
                } else if (page == "pegwinpursuit"){
                    $("#pegwinpursuit").show();
                    $("#pegwinpursuitvanilla").hide();
                }
            })
        </script>
        
    </body>
</html>