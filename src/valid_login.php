<?php

if (!isset($_SESSION['id_user'])){
    header('login.php');
    exit();
}