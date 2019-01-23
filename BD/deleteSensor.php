<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "fabio";
$password1 = "fabio";
$dbname = "DB_UV";

function __autoload($class_name) {
	require_once $class_name . '.php';
}


//POST 
    $idSensor = $_POST['idSensor'];
 


// Criar conecção
$conn = new mysqli($servername, $username, $password1, $dbname);
// Verificar conecção
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// UTF-8 Lingua Portuguesa
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

//Selecionar tabela UVIndex da DB
$sql = "DELETE FROM `sensor` WHERE `sensor`.`idSensor` = '$idSensor'";


$result = $conn->query($sql);

$conn->close();


?>