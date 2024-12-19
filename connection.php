<?php
$host ='localhost';
$username = 'root';
$password = '';
$data_base = 'réservation_de_consultations_juridiques';

$conn = mysqli_connect($host, $username, $password, $data_base);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>