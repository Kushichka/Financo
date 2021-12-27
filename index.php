<?php

    session_start();

    if(isset($_SESSION["mail"])) {
        header('Location: bills.php');
    }

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <title>Financo</title>
</head>

<body>
    <div class="index-container">
        <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="msg-box"><p class="msg">'.$_SESSION['message'].'</p></div>';
            }
            unset($_SESSION['message']);
        ?>
        <div class="auth">
            <div class="auth-title">
                <h1>Регистрация</h1>
            </div>
            <form action="script/signup.php" method="post" id="register-form">
                <label class="mail-img" for="mail"><img src="img/mail.png" alt="email icon"></label>
                <input class="register__input-mail" id="mail" type="mail" name="mail" placeholder="Почта" required>
                <label class="lock-img" for="pass"><img src="img/lock.png" alt="password icon"></label>
                <input class="register__input-pass" id="pass" type="password" name="pass" placeholder="Пароль">
            </form>
            <div class="auth-btns">
                <input class="auth__register-btn" form="register-form" type="submit" value="Регистрация">
                <a class="auth__login-btn" href="login.php">Войти</a>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>