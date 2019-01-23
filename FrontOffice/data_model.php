<?php
    $dbhost="localhost";
    $dblogin="root";
    $dbpwd="";
    $dbname="DB_UV";

       
    $db =  mysql_connect($dbhost,$dblogin,$dbpwd);
    mysql_select_db($dbname);    
	
    $day = date('d');
    $month = date('m');
    $lastMonth = (string)($month-1);	
    $lastMonth = strlen($month - 1) == 1? '0'.$lastMonth : $lastMonth;
    
    $SQLString = "SELECT 	
		    idUV_PRAIA FROM Dados";		
										
    $result = mysql_query($SQLString);    
    $num = mysql_num_rows($result);   

# set heading	
    $data[0] = array('day','counts');		
    for ($i=1; $i<($num+1); $i++)
    {
        $data[$i] = array(substr(mysql_result($result, $i-1, "date"), 5, 5),
			(int) mysql_result($result, $i-1, "counts"));
    }	
    echo json_encode($data);
    mysql_close($db);
?>
