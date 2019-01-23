<?php

 error_reporting(E_ALL);
 ini_set('display_errors', 1);


  //Email information
  $admin_email = "ricardoguerreiro214314@epad.edu.pt , fabiofernandes214315@epad.edu.pt";
    $email = isset($_POST['email']) ? $_POST['email'] : '';
      echo "email: ";
      echo '<script>console.log($email)</script>';
      //echo $email; 
      echo "<br />";

    $nome =  isset($_POST['nome']) ? $_POST['nome'] : '';
      echo "nome ";
      echo '<script>console.log(nome)</script>';
      echo $nome;
         echo "<br />";
      
    $message =  isset($_POST['message']) ? $_POST['message'] : '';
      echo "message: ";
            echo '<script>console.log($message  )</script>';
         echo "<br />";
  

  //send email
 mail($admin_email, $nome, $message, "From:", $email);
  
  //Email response

 header("Location: index.html#contact");
  exit();
  

?>