<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "teste";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error){
        die("Conxão Falhou");
        
    }

?>
