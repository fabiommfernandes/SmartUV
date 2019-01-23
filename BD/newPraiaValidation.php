<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_UV";

function __autoload($class_name) {
	require_once $class_name . '.php';
}


$nome_praia = $_POST["nome_praia"];

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


$sql = "SELECT nome_praia FROM Praia where nome_praia = '$nome_praia';";

$result = $conn->query($sql);

$resposta = array();

if($result->num_rows == 0 ){
    
    $empty = "0";
    $resposta[]= $empty;
    
    echo json_encode ($resposta);
}

else{
    // valor de cada linha
    while($row = $result->fetch_assoc()) {
        
        $nome_praia = $row ["nome_praia"];
        
    $praia = new stdClass();
    $praia->nome_praia = "$nome_praia" ;
    $resposta[] = $praia;
        
    }

    
    echo json_encode ($resposta);
}



$conn->close();

?>