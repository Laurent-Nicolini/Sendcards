<?php

if(isset($_SESSION['name']) && isset($_SESSION['email']) && isset($_SESSION['password'])){
    $name = htmlspecialchars($_SESSION['name'], ENT_QUOTES);
    $email = htmlspecialchars($_SESSION['email'], ENT_QUOTES);
    $password = password_hash(htmlspecialchars($_SESSION['password'], ENT_QUOTES), PASSWORD_DEFAULT);

    try {
        $statement = $pdo->prepare("
            INSERT INTO user (name, email, password)
            VALUES (:name, :email :password)");
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->bindValue(':password', $password, PDO::PARAM_STR);
        $statement->execute();

    } catch (PDOException $e) {
        exit('<b>Catched exception at line '. $e->getLine() .' :</b> '. $e->getMessage());
    }
} else {
    session_start();
    $_SESSION['error'] = 'yes';
    header('Location: login.php');
    exit();
}