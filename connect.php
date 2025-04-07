<?php
$host = 'localhost';
$dbname = 'rowery';
$user = 'root';
$password = '';

$polaczenie = new mysqli($host, $user, $password, $dbname);
if ($polaczenie->connect_error) {
    die("Błąd połączenia z bazą danych: " . $polaczenie->connect_error);
}
?>