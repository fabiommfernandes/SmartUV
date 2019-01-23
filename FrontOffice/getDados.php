<?php

    // Prepare variables for database connection
   
    $dbusername = "";  
    $dbpassword = "";  
    $server = ""; 

    // Connect to your database

    $dbconnect = mysql_connect($server, $dbusername, $dbpassword);
    
    $dbselect = mysql_select_db("DB_UV",$dbconnect);

    // Prepare the SQL statement

    $sql = "INSERT INTO Dados (idUV_Praia) VALUES ('".$_GET["value"]."')";    

    // Execute SQL statement

    mysql_query($sql);

?>