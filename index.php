<?php

    session_start();
    require_once('connect.php');

    if(isset($_SESSION['mail'])) {
        header('location: bills.php');
    }

    include "pages/head.php";

    if(isset($_REQUEST['action'])) {
        switch($_REQUEST['action']) {
            case 'register':
                include 'pages/register.php';
                break;
            
            case 'signup':
                $mail = filter_var(trim($_POST['mail']));
                $pass = filter_var(trim($_POST['pass']));

                if(mb_strlen($mail) < 5 || mb_strlen($mail) > 30) {
                    $_SESSION['error-msg'] = 'Неверная длина почты (5-30 символов)';
                    exit(header('location: index.php'));
                } else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 20) {
                    $_SESSION['error-msg'] = 'Неверная длина пароля (8-20 символов)';
                    exit(header('location: index.php'));
                }

                $query = $db->query("SELECT * FROM `user` WHERE `mail` = '$mail'");

                if($query->num_rows != 0) {
                    $_SESSION['error-msg'] = 'Пользователь с такой почтой уже существует';
                    exit(header('location: index.php'));
                }

                $pass = password_hash($pass, PASSWORD_ARGON2I);

                $db->query("INSERT INTO `user` (`mail`, `password`) VALUES ('$mail', '$pass')");
                $db->close();
                $_SESSION['succes-msg'] = 'Регистрация прошла успешно';
                header('location: index.php?action=login');
                break;

            case 'login':
                include 'pages/login.php';
                break;

            case 'signin':
                $mail = filter_var(trim($_POST['mail']));
                $pass = filter_var(trim($_POST['pass']));

                $query = $db->query("SELECT * FROM `user` WHERE `mail` = '$mail'");
                $user = $query->fetch_assoc();
                $db->close();

                if(password_verify($pass, $user['password'])) {
                    $_SESSION['mail'] = $user['mail'];
                    header('location: bills.php');
                } else {
                    $_SESSION['error-msg'] = 'Неверный пароль или почта';
                    header('location: index.php?action=login');
                }
                break;

            case 'signout':
                $_SESSION = array();
                session_destroy();
                header('location: index.php');
                break;

            default:
                include 'pages/register.php';
                break;
        }
    } else {
        include 'pages/register.php';
    }

    include "pages/foot.php";

?>




    




        
