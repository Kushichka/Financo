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
    if (isset($_SESSION['error-msg'])) {
        echo '<div class="error-msg"><p class="msg">'.$_SESSION['error-msg'].'</p></div>';
    }
    unset($_SESSION['error-msg']);
    
    if (isset($_SESSION['succes-msg'])) {
        echo '<div class="succes-msg"><p class="msg">'.$_SESSION['succes-msg'].'</p></div>';
    }
    unset($_SESSION['succes-msg']);
?>