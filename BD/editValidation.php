<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_UV";

function __autoload($class_name) {
	require_once $class_name . '.php';
}

$nome_utilizador = $_POST["nome_utilizador"];
$idUtilizador = $_POST["idUtilizador"];



// Criar conesscção
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


$sql = "SELECT nome_utilizador FROM Utilizador where nome_utilizador = '$nome_utilizador' AND idUtilizador='$idUtilizador';";

$result = $conn->query($sql);

if($result->num_rows == 0 ){
    
  echo "0";
}

else{

    echo "1";
}



$conn->close();

?>