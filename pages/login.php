<?php

    if(isset($_SESSION["login"])) {
        header('Location: bills.php');
        exit;
    }

?>

<div class="auth">
            <div class="auth-title">
                <h1>Авторизация</h1>
            </div>
            <form class="auth__register-form" action="signin" method="post" id="login-form">
                <!-- <input type="hidden" name="action" value="signin"> -->

                <label class="login-img" for="login"><img src="img/login.png" alt="login icon"></label>
                <input class="register__input-login" id="login" type="text" name="login" placeholder="Логин" required>

                <label class="lock-img" for="pass"><img src="img/lock.png" alt="password icon"></label>
                <input class="register__input-pass" id="pass" type="password" name="pass" placeholder="Пароль" required>
            </form>
            <div class="auth-btns">
                <input class="auth__register-btn" form="login-form" type="submit" value="Войти">
                <form class="auth__register-login" action="register">
                    <!-- <input type="hidden" name="action" value="register"> -->
                    <input class="auth__login-btn" type="submit" value="Регистрация">
                </form>
            </div>
        </div>
    </div>