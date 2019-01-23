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
    $idUtilizador = $_POST['idUtilizador'];
    $nome_utilizador = $_POST['nome_utilizador'];
    $password_utilizador = $_POST['password_utilizador'];


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
$sql = "UPDATE utilizador SET nome_utilizador='$nome_utilizador', password_utilizador='$password_utilizador' WHERE idUtilizador='$idUtilizador'";


$result = $conn->multi_query($sql);

$conn->close();


?>