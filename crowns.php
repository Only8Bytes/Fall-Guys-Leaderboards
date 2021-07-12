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
                    <img class = "thumbnail" id="thumbnail" src = "/thumbnails/crowns.png">
                    <div class = "textcontainer">
                        <div id="crownsSidebar">
                            <h5>Total Crowns</h5>
                            The total crown count a player has is based on the number of wins that the player has. The amount of crowns on their Crown Rank is not the number being measured here as crowns can be won through the season passes.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col2">
                <div class="content" style="border-radius: 5px 5px 5px 5px;">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM players WHERE players.crowns > 0 ORDER BY players.crowns DESC");
                    ?>
                    <table class="table table-striped table-dark">
                        <thead>
                            <tr>
                              <th scope = "col" style = "width: 5%;">#</th>
                              <th scope = "col" style = "width: 10%;"></th>
                              <th scope = "col" style = "width: 35%;">Player</th>
                              <th scope = "col" style = "width: 20%;">Alias</th>
                              <th scope = "col" style = "width: 10%;">Wins</th>
                              <th scope = "col" style = "width: 10%;">Updated</th>
                              <th scope = "col" style = "width: 5%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $k = 1;
                                $prev = 0;
                                while ($row = mysqli_fetch_array($query)){
                                    if ($row['crowns'] != $prev) {
                                        $k = $i;
                                    }
                                    $prev = $row['crowns'];
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
                                    echo "<td><b>".$row['crowns']."</b></td>";
                                    echo "<td><b>".$row['date']."</b></td>";
                                    echo "<td></td>";
                                    echo "</tr>";
                                    $i++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>