<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_UV";

function __autoload($class_name) {
	require_once $class_name . '.php';
}


//POST 
    $nome_sensor = $_POST['nome_sensor'];
    //Passar ID PRAIA OU NAO?
    $id_praia = $_POST['idSensorPraia'];

// Criar conecção
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conecção
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "$id_praia";
} 

// UTF-8 Lingua Portuguesa
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');
echo "$id_praia";
//Selecionar tabela UVIndex da DB
$sql = "INSERT INTO Sensor (nome_sensor, idSensorPraia) VALUES ('$nome_sensor', '$id_praia')";

$result = $conn->query($sql);

$conn->close();


?>