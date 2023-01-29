<?php

include_once "connexion_db.php";

if(isset($_SESSION['id_user'])){
    $iduser = $_SESSION['id_user'];
    
    try {
        $statement = $pdo->prepare(
            "SELECT email_rec FROM address_book
            WHERE address_book.user_id = :iduser"
        );
        $statement->bindValue(':iduser', $iduser, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_OBJ);

    } catch (\Throwable $th) {
        exit('<b>Catched exception at line '. $th->getLine() .' :</b> '. $th->getMessage());
    }

} else {
    $_SESSION['error'] = 1;
    header("Location: ../login.php");
    exit();
}