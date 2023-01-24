<?php
session_start();
include_once 'connexion_db.php';

try {
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

        $statement = $pdo->prepare("SELECT * FROM users WHERE email =:email ");
        $statement->bindValue(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_OBJ);

        if ($results){
            foreach ($results as $result){
                $passhash = $result->password;
            }

            if ($password === $passhash){
                $_SESSION['id_user'] = intval($result->id);
                $_SESSION['email'] = $result->email;
                header('Location: ../index.php');
                exit();
            } else {
                $_SESSION['error'] = 1;
                header('Location: ../public/login.php');
                exit();
            }
        } else {
            $_SESSION['error'] = 1;
            header('Location: ../public/login.php');
            exit();
        }
    } else{
        $_SESSION['error'] = 1;
        header('Location: ../public/login.php');
        exit();
    }
} catch (\Throwable $th) {
    exit('<b>Catched exception at line '. $th->getLine() .' :</b> '. $th->getMessage());
}