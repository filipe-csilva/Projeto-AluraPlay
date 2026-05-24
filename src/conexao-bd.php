<?php

    try {
        $pdo = new PDO("mysql:host=localhost", "root", "Admin@#2354");

        $pdo->exec("CREATE DATABASE IF NOT EXISTS AluraPlay");

        $pdo->exec("USE AluraPlay");
        
        $pdo->exec("CREATE TABLE IF NOT EXISTS videos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            url VARCHAR(200) NOT NULL,
            title VARCHAR(255) NOT NULL,
            image_path VARCHAR(255)
        )");

        $pdo->exec("CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(200) NOT NULL,
            password VARCHAR(255) NOT NULL,
            name VARCHAR(100),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
        
    } catch (PDOException $e) {
        die("Erro: " . $e->getMessage());
    }