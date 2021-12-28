<div class="auth">
            <div class="auth-title">
                <h1>Авторизация</h1>
            </div>
            <form class="auth__register-form" action="index.php" method="post" id="login-form">
                <input type="hidden" name="action" value="signin">
                <label class="mail-img" for="mail"><img src="img/mail.png" alt="email icon"></label>
                <input class="register__input-mail" id="mail" type="mail" name="mail" placeholder="Почта" required>
                <label class="lock-img" for="pass"><img src="img/lock.png" alt="password icon"></label>
                <input class="register__input-pass" id="pass" type="password" name="pass" placeholder="Пароль" required>
            </form>
            <div class="auth-btns">
                <input class="auth__register-btn" form="login-form" type="submit" value="Войти">
                <form class="auth__register-login" action="index.php" method="post">
                    <input type="hidden" name="action" value="register">
                    <input class="auth__login-btn" type="submit" value="Регистрация">
                </form>
            </div>
        </div>
    </div>