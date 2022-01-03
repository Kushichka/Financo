<?php

    session_start();
    require('Route.php');
    require_once('connect.php');

    if(isset($_SESSION["login"])) {
        include "pages/head.php";
    } else {
        include "pages/authHead.php";
    }

    Route::add('/', function () {
        if(isset($_SESSION["login"])) {
            header("Location: /financo/bills");
            exit;
        }
        header("location: /financo/register");
    });

    Route::add('/register', function () {
        if(isset($_SESSION["login"])) {
            header('Location: /financo/bills');
            exit;
        }
        include 'pages/register.php';
    });

    Route::add('/signup', function () {
        global $db;
        $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
        $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
        $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

        if(mb_strlen($mail) < 5 || mb_strlen($mail) > 30) {
            $_SESSION['error-msg'] = 'Неверная длина почты (5-30 символов)';
            header('location: /financo/register');
            exit;
        } else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 20) {
            $_SESSION['error-msg'] = 'Неверная длина пароля (8-20 символов)';
            header('location: /financo/register');
            exit;
        } else if(mb_strlen($login) < 3 || mb_strlen($login) > 16) {
            $_SESSION['error-msg'] = 'Неверная длина логина (3-16 символов)';
            header('location: /financo/register');
            exit;
        }

        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error-msg'] = 'Неверный формат почты';
            header('location: /financo/register');
            exit;
        } else if(preg_match("/^[a-z A-Z 0-9]+$/i", $login) == 0){
            $_SESSION['error-msg'] = 'Неверный формат логина';
            header('location: /financo/register');
            exit;
        }

        $query = $db->query("SELECT * FROM `user` WHERE `mail` = '$mail' OR `login` = '$login' LIMIT 1");

        if($query->num_rows != 0) {
            $_SESSION['error-msg'] = 'Такой аккаунт уже существует';
            header('location: /financo/register');
            exit;
        }

        $pass = password_hash($pass, PASSWORD_ARGON2I);
        $db->query("INSERT INTO `user` (`mail`, `password`, `login`) VALUES ('$mail', '$pass', '$login')");
        $db->close();
        $_SESSION['succes-msg'] = 'Регистрация прошла успешно';
        header('location: /financo/login');
    }, 'post');

    Route::add('/login', function () {
        if(isset($_SESSION["login"])) {
            header('Location: /financo/bills');
            exit;
        }
        include 'pages/login.php';
    });

    Route::add('/signin', function () {
        global $db;
        $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

        $query = $db->query("SELECT * FROM `user` WHERE `login` = '$login'");
        $user = $query->fetch_assoc();
        $db->close();

        if(password_verify($pass, $user['password'])) {
            $_SESSION['login'] = $user['login'];
            $_SESSION['mail'] = $user['mail'];
            header('location: /financo/bills');
        } else {
            $_SESSION['error-msg'] = 'Неверный логин или пароль';
            header('location: /financo/login');
        }
    }, 'post');

    Route::add('/signout', function () {
        session_unset();
        $_SESSION = array();
        session_destroy();
        header('location: /financo/login');
    });

    Route::add('/bills', function () {
        if(!isset($_SESSION["login"])) {
            header('Location: /financo');
            exit;
        }
        include "pages/bills.php";
    });

    Route::add('/firsttime', function () {
        if(isset($_SESSION["login"])) {
            header('Location: /financo/bills');
            exit;
        }
        include "pages/firsttime.php";
    });

    Route::pathNotFound(function($path) {
        header('HTTP/1.0 404 Not Found');
        include '404.php';
      });

    Route::run('/financo');

    if(isset($_SESSION["login"])) {
        include "pages/foot.php";
    } else {
        include "pages/authFoot.php";
    }

?>




    




        
