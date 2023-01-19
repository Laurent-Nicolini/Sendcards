<?php

if (!isset($_SESSION['user'])){
    header('login.php');
    exit();
}