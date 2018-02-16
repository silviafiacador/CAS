<?php 

$servername="localhost";
$username="root";
$password="usbw";
$dbname="cas";
$conn = new mysqli($servername, $username, $password, $dbname);


if ( $conn == TRUE  ) {
	mysqli_query( $conn, "SET NAMES 'utf8'" );} 
else {	echo '<script>alert("A conexão falhou!")</script>';}

?>