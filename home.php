<?php
// Sessie opnieuw starten om database info op te halen.
session_start();
// Checken of de gebruiker is ingelogd.
if (!isset($_SESSION['loggedin'])) {
  header('location: index.html');
  exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_NAME = 'phplogin';
$db = mysqli_connect($DATABASE_HOST, $DATABASE_USER, "", $DATABASE_NAME);
$id = $_SESSION['id']; //id halen van de login sessie

$query = mysqli_query($db, "select * from accounts where id='$id'"); // data van gebruiker ophalen
//data in een array stoppen.
$data = mysqli_fetch_array($query);
//username ophalen uit de array
$username = $data[1];
$first_name = explode(' ', $username, 2)[0];
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="icon" href="https://i.postimg.cc/QNpWgb6Y/ja-removebg-preview.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nanum+Pen+Script&family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nanum+Pen+Script&family=Oswald:wght@500&family=Roboto+Slab:wght@200;300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nanum+Pen+Script&family=Oswald:wght@500&family=Red+Hat+Mono:wght@600&family=Roboto+Slab:wght@200;300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@100;900&display=swap" rel="stylesheet">
</head>

<body>
  <nav>
    <div class="logo">
      <a href="home.php"> <img src="https://wereldlichtjesdagleidscherijn.nl/wp-content/uploads/2018/11/Jumbo_Logo.svg_-1030x287.png" alt="Logo Image"></a>
    </div>
    <div class="hamburger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
    <ul class="nav-links">
      <li class="link"><a href="home.php">Home</a></li>
      <span class="dot">
        <p>:)</p>
      </span>
      <li class="link"><a href="reserveren.php">Reserveren</a></li>
      <span class="dot">
        <p>:)</p>
      </span>
      <li class="link"><a href="profile.php">Profiel</a></li>
      <span class="dot">
        <p>:)</p>
      </span>
      <li class="link"><a href="about.php">About</a></li>
      <span class="dot">
        <p>:)</p>
      </span>
      <li class="link"><a href="logout.php">Uitloggen</a></li>
      <span class="dot">
        <p>:)</p>
      </span>
    </ul>
  </nav>
  <script src="nav.js"></script>
  <section class="headline">
    <button class="welcome"> <a href="profile.php">
        <h2>Hallo <?= $first_name ?>!</h2>
      </a>
    </button>
  </section>
  <main>
    <div class="infographic-wrapper">
      <span class="blokken">
        <h3>Reserveer vakantie uren</h3>
        <p>Verdien geld om uit te gaan</p>
        <img src="https://i.postimg.cc/ryYXdFQj/ja.png" width="140px" height="100px">

      </span>
      <span class="blokken">
        <h3>Makkelijk</h3>
        <a class="knop2" href="reserveren.php">
          <p>Met 1 klik op deze knop</p>
        </a>
        <button class="button4">
          >>>
        </button>
      </span>
      <span class="blokken">
        <h3>Help je collega's</h3>



        <p>Versterk je team!</p>

        <img src="https://i.postimg.cc/ZRYkVNXd/jumbo-thuisbezorging-1-removebg.png" width="220px" height="155px">
      </span>
    </div>

  </main>
</body>