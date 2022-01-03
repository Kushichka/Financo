
<div class="auth">
            <div class="auth-title">
                <h1>Регистрация</h1>
            </div>
            <form class="auth__register-form" action="signup" method="post" id="register-form">
                <!-- <input type="hidden" name="action" value="signup"> -->

                <label class="login-img" for="login"><img src="img/login.png" alt="login icon"></label>
                <input class="register__input-login" id="login" type="text" name="login" placeholder="Логин" required>

                <label class="mail-img" for="mail"><img src="img/mail.png" alt="email icon"></label>
                <input class="register__input-mail" id="mail" type="email" name="mail" placeholder="Почта" required>

                <label class="lock-img" for="pass"><img src="img/lock.png" alt="password icon"></label>
                <input class="register__input-pass" id="pass" type="password" name="pass" placeholder="Пароль" required>
            </form>
            <div class="auth-btns">
                <input class="auth__register-btn" form="register-form" type="submit" value="Регистрация">
                <form class="auth__register-login" action="login">
                    <!-- <input type="hidden" name="action" value="login"> -->
                    <input class="auth__login-btn" type="submit" value="Войти">
                    <!-- <a href="/financo/login">Войти</a> -->
                </form>
            </div>
        </div>
    </div>

