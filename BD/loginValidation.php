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
$password_utilizador = $_POST["password_utilizador"];

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


$sql = "SELECT * FROM Utilizador where nome_utilizador = '$nome_utilizador' AND password_utilizador='$password_utilizador';";

$result = $conn->query($sql);

$resposta = array();

$idUtilizador = "idSensor";
$tipo = "nome_sensor";

if($result->num_rows == 0 ){
    
    $empty = "0";
    $resposta[]= $empty;
    
    echo json_encode ($resposta);
}

else{
    // valor de cada linha
    while($row = $result->fetch_assoc()) {
        
		$id = $row["idUtilizador"];
		$tipo = $row["tipo"];
        $nome_utilizador = $row ["nome_utilizador"];
        
    $utilizador = new stdClass();
    $utilizador->tipo =  "$tipo";
    $utilizador->idUtilizador = "$id";
    $utilizador->nome_utilizador = "$nome_utilizador" ;
    $resposta[] = $utilizador;
        
    }

    
    echo json_encode ($resposta);
}



$conn->close();

?>