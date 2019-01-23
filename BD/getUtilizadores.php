<?php

header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_UV";

function __autoload($class_name) {
	require_once $class_name . '.php';
}

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


$sql = "SELECT * FROM Utilizador";

$result = $conn->query($sql);

//Criacao de array para armazenar os dados
$utilizadores = array();

//Percorrer a DB até preencher tudo
if ($result->num_rows > 0) {
    // valor de cada linha
    while($row = $result->fetch_assoc()) {
        
		$id = $row["idUtilizador"];
		$nome_utilizador = $row["nome_utilizador"];
        $password_utilizador = $row["password_utilizador"];
        $tipo = $row["tipo"];
        
//Preencher o array criando um objecto
		$utilizador = new UtilizadoresObject($id, $nome_utilizador, $password_utilizador, $tipo);
		$utilizadores[] = $utilizador;
    }
} 


echo json_encode($utilizadores);


$conn->close();


?>