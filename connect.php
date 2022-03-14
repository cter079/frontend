<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_NAME = 'phplogin';
$mysqli = mysqli_connect($DATABASE_HOST, $DATABASE_USER, "", $DATABASE_NAME);
$query= "SELECT email, username FROM accounts WHERE id = " . $_SESSION['email'];
$result = $mysqli -> query($query);
?>