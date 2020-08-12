<?php
include_once "conexao.php";

$email = $_POST['email'];



mysqli_query ($conn,"INSERT INTO subscribe (email) VALUES ('$email')" ); 


header("Location:../index.html");
exit;

?>

