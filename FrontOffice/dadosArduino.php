<?php

header('Content-Type: application/json');

define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'DB_UV');

    
    // Create connection
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
if(!$conn){
    die("connection failed". $conn->error);
}
    

$query = sprintf("SELECT idUV_Praia, created_at FROM Dados LIMIT 10");

$result = $conn->query($query);

$data = array();
foreach($result as $row){
    $data[] = $row ;
    
}

$result->close();
$conn->close();

print json_encode($data);

?>
