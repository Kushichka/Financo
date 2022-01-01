<?php

    session_start();
    require_once('connect.php');

    if(isset($_SESSION['login'])) {
        header('location: bills.php');
    }

    include "pages/head.php";

    if(isset($_REQUEST['action'])) {
        switch($_REQUEST['action']) {
            case 'register':
                include 'pages/register.php';
                break;
            
            case 'signup':
                $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
                $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
                $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

                if(mb_strlen($mail) < 5 || mb_strlen($mail) > 30) {
                    $_SESSION['error-msg'] = 'Неверная длина почты (5-30 символов)';
                    exit(header('location: index.php'));
                } else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 20) {
                    $_SESSION['error-msg'] = 'Неверная длина пароля (8-20 символов)';
                    exit(header('location: index.php'));
                } else if(mb_strlen($login) < 3 || mb_strlen($login) > 16) {
                    $_SESSION['error-msg'] = 'Неверная длина логина (3-16 символов)';
                    exit(header('location: index.php'));
                }

                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $_SESSION['error-msg'] = 'Неверный формат почты';
                    exit(header('location: index.php'));
                } else if(preg_match("/^[a-z A-Z 0-9]+$/i", $login) == 0){
                    $_SESSION['error-msg'] = 'Неверный формат логина';
                    exit(header('location: index.php'));
                }

                $query = $db->query("SELECT * FROM `user` WHERE `mail` = '$mail' OR `login` = '$login' LIMIT 1");

                if($query->num_rows != 0) {
                    $_SESSION['error-msg'] = 'Такой аккаунт уже существует';
                    exit(header('location: index.php'));
                }

                $pass = password_hash($pass, PASSWORD_ARGON2I);
                $db->query("INSERT INTO `user` (`mail`, `password`, `login`) VALUES ('$mail', '$pass', '$login')");
                $db->close();
                $_SESSION['succes-msg'] = 'Регистрация прошла успешно';
                header('location: index.php?action=login');

                break;

            case 'login':
                include 'pages/login.php';
                break;

            case 'signin':
                $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
                $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

                $query = $db->query("SELECT * FROM `user` WHERE `login` = '$login'");
                $user = $query->fetch_assoc();
                $db->close();

                if(password_verify($pass, $user['password'])) {
                    $_SESSION['login'] = $user['login'];
                    $_SESSION['mail'] = $user['mail'];
                    header('location: bills.php');
                } else {
                    $_SESSION['error-msg'] = 'Неверный логин или пароль';
                    header('location: index.php?action=login');
                }
                break;

            case 'signout':
                $_SESSION = array();
                session_destroy();
                header('location: index.php?action=login');
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




    




        
