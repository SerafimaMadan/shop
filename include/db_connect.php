<?php
$db_host ='localhost';
$db_user ='admin';
$db_pass='12345';
$db_database='db_shop';

global $link;

$link = new mysqli($db_host, $db_user, $db_pass, $db_database);/*стандартное подключение к базе данных*/

//$mysqli_select_db($db_database, $link) or die("Нет соединения с БД ". mysqli_error());

/** @noinspection PhpParamsInspection */
mysqli_query($link,'set names utf8'); /*кодировка символов на сайте, указана такая  UTF-8*/

?>