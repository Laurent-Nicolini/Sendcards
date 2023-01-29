<?php

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $password = password_hash(htmlspecialchars($_POST['password'], ENT_QUOTES), PASSWORD_DEFAULT);

    try {
        include_once "connexion_db.php";
        $statement = $pdo->prepare(
            "INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password)"
         );
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();
        header('Location: ../index.php');
        exit();

    } catch (PDOException $e) {
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
} else {
    session_start();
    $_SESSION['error'] = 1;
    header('Location: ../login.php');
    exit();
}