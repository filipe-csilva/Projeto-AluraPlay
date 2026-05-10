<?php

    try {
        $pdo = new PDO("mysql:host=localhost", "root", "Admin@#2354");

        $pdo->exec("CREATE DATABASE IF NOT EXISTS AluraPlay");

        $pdo->exec("USE AluraPlay");
        
        $pdo->exec("CREATE TABLE IF NOT EXISTS videos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            url VARCHAR(200) NOT NULL,
            title VARCHAR(255) NOT NULL
        )");
        
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }