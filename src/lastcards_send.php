<?php

require "connexion_db.php";
$iduser = $_SESSION['id_user'];

if($_SESSION['id_user']){
    $statement = $pdo->prepare(
        "SELECT * FROM cards 
        INNER JOIN address_book
        WHERE address_book.id=address_id"
        );
    //$statement->bindValue(':id_user',$iduser, PDO::PARAM_STR);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_OBJ);

} else {
    header("Location: ../public/login.php");
    exit();
}
