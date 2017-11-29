<?php
session_start(); /*открытие сессии*/
unset($_SESSION['cart']);

include ("include/db_connect.php"); /*подключение базы данных к главной странице*/
include ("include/db.php"); /*подключение файла проверки*/
include ("functions/functions.php"); /*подключение файла проверки !!!!!не работает*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация пользователя</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="swichprice/track.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="js/shop-script.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="swichprice/jquery.trackbar.js"></script>
    <script type="text/javascript" src="js/jquery.form.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/controluserreg.js"> </script>
</head>
<body>


<div id="blok-body"> <!-- вся информация на сайте -->

    <?php include ("include/block-header.php")?> <!-- меню, логотип, корзина-->

    <div id="block-right">
        <?php include ("include/plus.php");
        include ("include/block-parametry.php");
        include ("include/block-news.php")
        ?> <!--правый блок навигации-->
    </div>
    <div id="block-content"> <!--блок регистрации пользователей-->
<h2 class="h2">Регистрация</h2>
        <form method="post" id="userreg" action="./reg/registration.php">
         <p id="reg_message"></p>
<div id="block_registration">
    <ul id="form_registration">
        <li>
        <label>Логин</label>
        <span class="star">*</span>
        <input id="reg_login" type="text" name="reg_login" value="admina"/>
        </li>
        <li>
            <label>Пароль</label>
            <span class="star">*</span>
            <input id="reg_pass" type="text" name="reg_pass" value="qwerty123"/>
            <span id="gen_pass">Сгенерировать</span>
        </li>
        <li>
            <label>Фамилия</label>
            <span class="star">*</span>
            <input id="reg_surname" type="text" name="reg_surname" value="Madan"/>
        </li>
        <li>
            <label>Имя</label>
            <span class="star">*</span>
            <input id="reg_name" type="text" name="reg_name" value="Serafima"/>
        </li>
        <li>
            <label>E-mail</label>
            <span class="star">*</span>
            <input id="reg_email" type="text" name="reg_email" value="svp1982@mail.ru"/>
        </li>
        <li>
            <label>Телефон</label>
            <span class="star">*</span>
            <input id="reg_phone" type="text" name="reg_phone" value="89106024567"/>
        </li>
        <li>
            <label>Адрес доставки</label>
            <span class="star">*</span>
            <input id="reg_address" type="text" name="reg_address" value="Verkovye, Lenina St., 1"/>
        </li>

        <li>
            <div id="block_captcha">
          <img src="reg/reg_captcha.php" /> <!-- -->
                <input id="reg_captcha" type="text" name="reg_captcha"/>
                <p id="reload_captcha">Обновить</p>
            </div>
        </li>
    </ul>

</div>
<p align="centre">
<input id="form_submit" type="submit" name="reg_submit" value="Регистрация"/>
</p>
        </form>
    </div>
    <?php include ("include/block-footer.php")?>


</div>

</body>
</html>

