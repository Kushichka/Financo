<?php

    session_start();
    require_once('connect.php');

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    $query = $db->query("SELECT * FROM `user` WHERE `mail` = '$mail'");
    $user = $query->fetch_assoc();
    $db->close();

    if(password_verify($pass, $user['password'])) {
        $_SESSION['mail'] = $user['mail'];
        header('location: ../bills.php');
    } else {
        header('location: ../login.php');
    }


?>