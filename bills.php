<?php

session_start();
if(!isset($_SESSION["mail"])) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

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
    <header class="header__wrapper">
        <div class="container">
            <div class="header">
                <a class="logo" href="index.html">Financo</a>
                <nav class="navbar">
                    <a class="menu__btn active__btn" href="bills.php">Счета</a>
                    <a class="menu__btn" href="#">Переводы</a>
                    <a class="menu__btn" href="#">Отчет</a>
                    <a class="menu__btn" href="#">Настройки</a>
                </nav>
                <div class="login__wrapper">
                    <form action="index.php">
                        <input type="hidden" name="action" value="signout">
                        <input class="login__btn menu__btn" type="submit" value="Выйти">
                    </form>
                </div>
            </div>
        </div>
    </header>
    <section class="content__wrapper">
        <div class="container__s">
            <div class="box__wrapper">
                <div id="box">
                    <h1>Ваши счета</h1>
                    <div class="raw">
                        <p class="title">Наличные</p>
                        <p class="amount">1236987</p>
                        <p class="currency">zł</p>
                        <a id="edit__value" href="#"></a>
                    </div>
                    <div class="raw">
                        <p class="title">Карта</p>
                        <p class="amount">542369</p>
                        <p class="currency">zł</p>
                        <a id="edit__value" href="#"></a>
                    </div>
                    <div class="raw">
                        <p class="title">Сбережения</p>
                        <p class="amount">236447</p>
                        <p class="currency">zł</p>
                        <a id="edit__value" href="#"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer__wrapper">
        <div class="container">
            <div class="footer">
                <p class="sign">Designed by Viktor Dariienko</p>
                <p class="copyright">© 2021 Viktor Dariienko. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>