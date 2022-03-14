<?php
session_start();
// met de database verbinden
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, "", $DATABASE_NAME);
// Errors aanmaken voor database connectie en velden
if ( mysqli_connect_errno() ) {
	exit('Kon niet verbinden met de database: ' . mysqli_connect_error());
}
if ( !isset($_POST['email'], $_POST['password']) ) {
	exit('Vul beide velden in alstublieft!');
}

// Informatie ophalen vanuit de database door middel van SQL
// Ik gebruik prepare omdat het sql injecties voorkomt. Dat is makkelijker dan escape strings voor mij. 
// Het zorgt ervoor dat een statement geen waarde heeft tot het bij de database komt die het omzet in een werkend statement.
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE email = ?')) {
	// Met bind parameters zorgen we ervoor dat gebruikers alleen een string in kunnen voeren.
	$stmt->bind_param('s', $_POST['email']);
	// Uitvoeren
    $stmt->execute();
	// Opslaan van de ingevulde gegevens zodat de database kan checken of het account bestaat.
	$stmt->store_result();
  // Kijken of het account bestaat.
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
       // Het account bestaat nu kunnen we checken of het wachtwoord klopt.
        if (password_verify($_POST['password'], $password)) {
            // Wachtwoord klopt.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $id; 
            header('Location: home.php');
        }
        // Bij onjuiste gebruikersnaam of wachtwoord een error
        else {
            $errors = 'Onjuiste gebruikersnaam/wachtwoord';
        }
    } else {
        $errors = 'Onjuiste gebruikersnaam/wachtwoord';
    }

	$stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2><?= $errors ?></h2>
</body>
</html>
