<<<<<<< HEAD
<?php

try { 
    // Connexion BDD en production
    $pdo = new PDO("mysql:host=localhost;dbname=odrl9643_sendcards","odrl9643_adminsendcards","adminsendcards"); 

    // Connexion BDD en développement
    // $pdo = new PDO("mysql:host=localhost;dbname=sendcards","root","");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
=======
<?php

try { 
    // Connexion BDD en production
    $pdo = new PDO("mysql:host=localhost;dbname=odrl9643_sendcards","odrl9643_adminsendcards","adminsendcards"); 

    // Connexion BDD en développement
    // $pdo = new PDO("mysql:host=localhost;dbname=sendcards","root","");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
>>>>>>> 6d0f1bcc811d98af327c678d18ddadf81a686334
}