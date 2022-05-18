<?php
    
    try {
        //$connect = new PDO("mysql:host=localhost;dbname=db_esqui", "root", "client");
        $connect = new PDO("mysql:host=localhost;dbname=db_esqui", "root", "12345");
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>