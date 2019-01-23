<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_UV";

function __autoload($class_name) {
	require_once $class_name . '.php';
}

$praia = $_GET["idPraiaSensor"];
$sensor = $_GET["idSensor"];

// Criar conecção
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar conecção
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// UTF-8 Lingua Portuguesa
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');


//Selecionar a tabela
$sql = "SELECT nome_sensor FROM Sensor WHERE idPraiaSensor=" . $praia;
//echo $sql;
$result = $conn->query($sql);

$row = $result->fetch_row();
//var_dump($row);

//VER COMO DAR O ECHO DO NOME_UTILIZADOR
$sizeRow = $row.size();
$rowValue = $row[$sizeRow];




echo ($rowValue);


$conn->close();


?>