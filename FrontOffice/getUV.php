<?php

    $dbusername = "root";  
    $dbpassword = "";   
    $server = "localhost"; 
    $dbname = "DB_UV";

    $teste = $_GET['cara'];
    $random = 42.0;

    // Create connection
    $conn = new mysqli($server, $dbusername, $dbpassword, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO Dados (idUV_Praia, temperaturaPraia)
    VALUES ('$teste', '$random')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>