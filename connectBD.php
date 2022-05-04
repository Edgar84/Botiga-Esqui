<?php
    
    try {
        $connect = new PDO("mysql:host=localhost;dbname=db_esqui", "root", "client");
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>