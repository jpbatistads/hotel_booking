<?php
$servername = "localhost";
$database = "hotel_booking";
$username = "root";
$password = "";
// Criando a  connecção
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failou: " . mysqli_connect_error());
}


?>