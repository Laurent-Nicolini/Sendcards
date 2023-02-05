<?php
session_start();

if(isset($_POST['recipient']) && isset($_POST['card_text'])){
    $email_rec = $_POST['recipient'];
    $card_text = $_POST['card_text'];
    $iduser = $_SESSION['id_user'];
    $email_from = $_SESSION['email'];

    try {
        require_once "connexion_db.php";

        $statement = $pdo->prepare(
            "INSERT INTO address_book (email_rec, user_id)
            VALUES (:email_rec, :iduser)"
            );
        $statement->bindValue(':email_rec', $email_rec, PDO::PARAM_STR);
        $statement->bindValue(':iduser', $iduser, PDO::PARAM_INT);
        $statement->execute();
        $stt = $pdo->prepare(
            "INSERT INTO cards (text, user_id, address_id)
            VALUES (:card_text, :iduser, LAST_INSERT_ID())"
            );
        $stt->bindValue(':card_text', $card_text, PDO::PARAM_STR);
        $stt->bindValue(':iduser', $iduser, PDO::PARAM_INT);
        $stt->execute();

        // *** Fonction Mail de PHP pour envoyer la carte ***
        // function mail(
        //     string $to,
        //     string $subject,
        //     string $card_text,
        //     array|string $additional_headers = [],
        //     string $additional_params = ""
        // )

        $card_text = wordwrap($card_text, 70, "\r\n");
        $subject = "Test Mail";
        $additional_headers = "From: contact@devshivan.com";
        $additional_headers .= "Content-Type: text/html; charset=UTF-8";

        if(mail($email_rec, $subject, $card_text, $additional_headers)){
            $_SESSION['card_send'] = "yes";
            header("Location: ../public/new_card.php");
            exit();
        } else{
            $_SESSION['card_send'] = "error";
            header("Location: ../public/new_card.php");
            exit();
        }
        
        // *** FIN de la fonction Mail() de PHP ***


        // // *** Intégration API Sendgrid ***

        // require '../vendor/autoload.php'; // If you're using Composer (recommended)
        // // Comment out the above line if not using Composer
        // // require("<PATH TO>/sendgrid-php.php");
        // // If not using Composer, uncomment the above line and
        // // download sendgrid-php.zip from the latest release here,
        // // replacing <PATH TO> with the path to the sendgrid-php.php file,
        // // which is included in the download:
        // // https://github.com/sendgrid/sendgrid-php/releases

        // $email = new \SendGrid\Mail\Mail();
        // $email->setFrom($email_from, "User from");
        // $email->setSubject("Test API Sendgrid");
        // $email->addTo($email_rec, "User To");
        // $email->addContent("text/plain", $card_text);
        
        // /*$email->addContent(
        //     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        // );*/
        
        // $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        
        // try {
        //     $response = $sendgrid->send($email);
        // exit();
        //     print $response->statusCode() . "\n";
        //     print_r($response->headers());
        //     print $response->body() . "\n";

        // } catch (Exception $e) {
        //     echo 'Caught exception: '. $e->getMessage() ."\n";
        //     exit();
        // }

        // // *** FIN Intégration API Sendgrid ***


    } catch (\Throwable $th) {
        echo '<b>Catched exception at line '. $th->getLine() .' :</b> '. $th->getMessage();
        exit();

    }
} else {
    $_SESSION['card_error'] = 1;
    header("Location: ../public/new_card.php");
    exit();
}