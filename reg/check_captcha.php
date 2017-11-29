<?php

if($_SERVER["REQUEST_METHOD"] == "POST") /*обращение к файлу и дествия, если метод post*/
{
    session_start(); /*включение сессии*/
    if($_SESSION['img_captcha'] == strtolower($_POST['reg_captcha'])) /*переводим все в нижний регистр*/
    {
        echo 'true';
    } else
        { echo 'false'; }
}
 ?>