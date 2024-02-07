<?php

// Connexion à la base de données

$pdo = new PDO('mysql:host=localhost;dbname=absolute_cleaning', 'root', 'root',
array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ));

    session_start();

    require_once("function.php");

    define("URL", "http://" . $_SERVER["HTTP_HOST"] . "htdocs/absolute_cleaning/");
    define("SITE_ROOT", $_SERVER["DOCUMENT_ROOT"] . "htdocs/absolute_cleaning/");

    $content = "";
?>