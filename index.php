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
                    echo "<div style=\"text-align: center; margin-top: 2rem; max-width: 1240px; margin-left: auto; margin-right: auto;\" class=\"alert alert-success\" role=\"alert\">";
                    echo "<b>ONGOING EVENT:</b> ".$row['name']." is currently ongoing, you can watch it <a class=\"alert-link\" href=\"".$row['watchlink']."\">here</a>";
                    echo "</div>";
                }
            }
        ?>
        <div class="infobox">
            <div class="box">
                <h2>Welcome to Fall Guys Leaderboards!</h2>
                <br>
                <p>Fall Guys Leaderboards is a community created and operated website for tracking Fall Guys minigame records and tracking the best of the best. The leaderboards and scoreboards on this website are manually updated so there is no guarantee that all information provided is correct. That being said, it is being kept up to date with new submissions from the community, so if you have a score or time to submit you can submit it in the <a class="link" target="_blank" href="https://discord.gg/HyfMjRfezT"><nobr><b>Fall Guys Leaderboards Discord server</b></nobr></a>. Any times submitted should be timed by the <a class="link" target="_blank" href="https://github.com/ShootMe/FallGuysStats"><nobr><b>Fall Guys Stats Tracker</b></nobr></a> developed by DevilSquirrel to ensure consistency across all players.</p>
                <br>
                <p>This website is free to use, but it is not free to operate. Although this website was created and is being maintained out of passion, it has a cost to run. Donations of any amount to support this website and its further development would be greatly appreciated, but are not required.</p>
                <a href="https://www.paypal.com/biz/fund?id=EJMR2GT7TUPU2" target="_blank" type="button" class="btn btn-success" id="donate">Donate</a>
            </div>
        </div>
        
        <div class="event-list">
            <?php
                $query = mysqli_query($conn, "SELECT * FROM events E WHERE E.endtime > NOW() ORDER BY E.datetime LIMIT 3");
                while ($row = mysqli_fetch_array($query)){
                    echo "<div class=\"card\" data-href=\"".$row['infolink']."\">";
                    echo "<img class=\"card-img-top\" src=\"/eventimages/".$row['imagename'].".png\">";
                    echo "<div class=\"card-body\">";
                    echo "<h5 class=\"card-title\">".$row['name']."</h5>";
                    echo "<p class=\"card-text\">".$row['description']."</p>";
                    echo "</div>";
                    echo "<div class=\"card-footer\">";
                    echo "<small class=\"text-muted\">Hosted by ".$row['host']."</small>";
                    
                    $today = date("Y-m-d H:i:s");
                    $starttime = date("Y-m-d", strtotime($row['datetime']));
                    $endtime = date("Y-m-d", strtotime($row['endtime']));
                    if (($starttime < $today) && ($endtime > $today)){
                        echo "<b><p style=\"float: right; font-size: 14px; margin-top:2px;\" class=\"text-muted\">ONGOING</p></b>";
                    } else {
                        echo "<b><p style=\"float: right; font-size: 14px; margin-top:2px;\" class=\"text-muted\">".date('M d g:ia', strtotime($row['datetime']))." UTC</p></b>";
                    }
                    echo "</div>";
                    echo "</div>";
                }
            ?>
        </div>
        <div id="footer">
            Game information and images provided by Fall Guys Leaderboards are the property of Mediatonic Limited
        </footer>
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
            $(".card").click(function(){
                window.open($(this).attr("data-href"), "_blank");
                return false;
            });
        </script>
    </body>
</html>