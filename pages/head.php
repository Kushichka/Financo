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
            <!-- <?php 
                echo $_SESSION["login"];
                echo $_REQUEST['signout'];
                echo print_r($_SESSION);
            ?> -->
            <div class="header">
                <a class="logo" href="/financo">Financo</a>
                <nav class="navbar">
                    <a class="menu__btn active__btn" href="bills">Счета</a>
                    <a class="menu__btn" href="#">Переводы</a>
                    <a class="menu__btn" href="#">Отчет</a>
                    <a class="menu__btn" href="#">Настройки</a>
                </nav>
                <div class="login__wrapper">
                    <button class="login__btn menu__btn" type="button" id="login-btn"><?php echo $_SESSION['login'];?></button>
                    <div class="login__wrapper-dropdown">
                        <form action="signout">
                            <!-- <input type="hidden" name="action" value="signout"> -->
                            <input class="login__btn menu__btn" type="submit" value="Выйти">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>