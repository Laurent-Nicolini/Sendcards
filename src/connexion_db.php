<?php

try { // Connexion BDD en développement
    $pdo = new PDO("mysql:host=localhost;dbname=sendcards","root","");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
}