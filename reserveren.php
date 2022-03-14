<?php
include 'functions.php';
session_start();
// Checken of de gebruiker is ingelogd. Als hij niet is ingelogd wordt hij teruggestuurd naar index.html
if (!isset($_SESSION['loggedin'])) {
    header('location: index.html');
    exit;
}

if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    // data van deze maand
    $ym = date('Y-m');
}
$timestamp = strtotime($ym . '-01');
$prev = date('Y-m', strtotime('-1 month', $timestamp));
$current = date('Y-m');
$next = date('Y-m', strtotime('+1 month', $timestamp));
$html_title = date('F Y', $timestamp);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Reserveren</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="icon" href="https://i.postimg.cc/QNpWgb6Y/ja-removebg-preview.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nanum+Pen+Script&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="alterstyles.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nanum+Pen+Script&family=Oswald:wght@500&family=Roboto+Slab:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nanum+Pen+Script&family=Oswald:wght@500&family=Red+Hat+Mono:wght@600&family=Roboto+Slab:wght@200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <style>
        .container {
            font-family: 'Noto Sans', sans-serif;
            margin-top: 80px;
        }

        h3 {
            margin-bottom: 30px;
        }

        th {
            height: 30px;
            text-align: center;
        }

        td {
            height: 100px;
        }

        .btn-danger {
            color: #fff;
            background-color: #c9302c;
            background-image: none;
            border-color: #ac2925;
            width: 80px;
        }

        .btn-success {
            color: #fff;
            background-color: #5cb85c;
            border-color: #4cae4c;
            width: 80px;
        }

        .table-bordered td,
        .table-bordered th,
        .table-bordered tr {
            border: 7px solid #dba617 !important;


        }

        .table {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;
        }

        .table-header {
            background-color: #dba617;
            font-family: 'Oswald', sans-serif;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="navbar-logo">
            <a href="jumbo-intern.nl"><img src="https://wereldlichtjesdagleidscherijn.nl/wp-content/uploads/2018/11/Jumbo_Logo.svg_-1030x287.png" width="210px" height="70px"></img>
            </a>
        </div>
        <div class="internintern">
            <p>reserveren</p>
        </div>
        <ul class="navbar-types">
            <li class="link"><a class="links" href="home.php">Home</a></li>
            <span class="dot">
                <p>:)</p>
            </span>
            <li class="link"><a class="links" href="reserveringeninlog.html">Reserveringen</a></li>
            <span class="dot">
                <p>:)</p>
            </span>
            <li class="link"><a class="links" href="profile.php">Profiel</a></li>
            <span class="dot">
                <p>:)</p>
            </span>
            <li class="link"><a class="links" href="about.php">About</a></li>
            <span class="dot">
                <p>:)</p>
            </span>
            <li class="link"><a class="links" href="logout.php">Uitloggen</a></li>
            <span class="dot">
                <p>:)</p>
            </span>

        </ul>
        <div class="navbar-logo2">
            <a href="jumbo-intern.nl/about"><img src="https://i.pinimg.com/736x/c0/1f/4c/c01f4c96bc45c8712a7f636677ae840c.jpg" width="150px" height="100px"></img>
            </a>
        </div>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <th>
                <center>
                    <h2 class="htmltitle"><?= htmlentities($html_title); ?></h2>
                </center>
                <center>
                    <h4><button class="intbutton"><a class="but" href="?ym=<?php echo $prev; ?>">Vorige</a></button> <button class="intbutton"><a class="but" href="?ym=<?php echo $current; ?>">Heden</a></button> <button class="intbutton"><a class="but" href="?ym=<?php echo $next; ?>">Volgende</a></h4></button>
                </center>
            </th>
        </table>
        <table class="table table-bordered">

            <tr class="table-header">
                <th>Zondag</th>
                <th>Maandag</th>
                <th>Dinsdag</th>
                <th>Woensdag</th>
                <th>Donderdag</th>
                <th>Vrijdag</th>
                <th>Zaterdag</th>
            </tr>
            <?php
            return  calendar();
            ?>
        </table>
    </div>
</body>

</html>