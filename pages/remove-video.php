<?php

    require ("../src/conexao-bd.php"); 
    require ("../src/Model/Video.php");
    require ("../src/Repository/VideoRepository.php");

    $videoRepositorio = new VideoRepository($pdo);
    $videoRepositorio->removeVideo($_GET["id"]);
    header('Location: /');