<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "DB_UV";

function __autoload($class_name) {
	require_once $class_name . '.php';
}


//POST 
    $nome_utilizador = $_POST['nome_utilizador'];
    $password = $_POST['password'];
    $nome_praia = $_POST['nome_praia'];
    $tipo = $_POST['tipo'];


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


if($tipo == "Administrador"){
    $sql = "INSERT INTO utilizador (nome_utilizador, password_utilizador, tipo) VALUES ('$nome_utilizador', '$password', '$tipo');";
}
else{
    
$sql = "INSERT INTO praia (nome_praia) VALUES ('$nome_praia'); INSERT INTO utilizador (nome_utilizador, password_utilizador, tipo,  idPraiaUtilizador) VALUES ('$nome_utilizador', '$password', '$tipo', (SELECT  idPraia FROM praia WHERE nome_praia= '$nome_praia' ));";

}

$result = $conn->multi_query($sql);

$conn->close();


?>