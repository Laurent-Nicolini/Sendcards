<?php

require "connexion_db.php";

if (isset($_SESSION['id_user'])){
    $iduser = $_SESSION['id_user'];
    $statement = $pdo->prepare(
        "SELECT * FROM cards 
        INNER JOIN address_book
        ON cards.address_id = address_book.id
        WHERE cards.user_id=:iduser"
        );
    $statement->bindValue(':iduser', $iduser, PDO::PARAM_INT);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_OBJ);

} else {
    header("Location: ../login.php");
    exit();
}
