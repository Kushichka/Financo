<?php
    session_start();
    require_once('connect.php');

    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    if(mb_strlen($mail) < 5 || mb_strlen($mail) > 30) {
        $_SESSION['message'] = 'Неверная длина почты (5-30 символов)';
        exit(header('location: ../index.php'));
    } else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 20) {
        $_SESSION['message'] = 'Неверная длина пароля (8-20 символов)';
        exit(header('location: ../index.php'));
    }

    $query = $db->query("SELECT * FROM `user` WHERE `mail` = '$mail'");

    if($query->num_rows != 0) {
        $_SESSION['message'] = 'Пользователь с такой почтой уже существует';
        exit(header('location: ../index.php'));
    }

    $pass = password_hash($_POST['pass'], PASSWORD_ARGON2I);

    $db->query("INSERT INTO `user` (`mail`, `password`) VALUES ('$mail', '$pass')");
    $db->close();
    $_SESSION['message'] = 'Регистрация прошла успешно';
    header("location: ../login.php");
?>

