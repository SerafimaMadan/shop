<?php

function screening($value)
{ $con = mysqli_connect("localhost", "admin", "12345", "db_shop");
        $value = strip_tags($value);/*удаление html php тегов чтобы нельзя было сформировать запрос извне*/
        $value = mysqli_real_escape_string($con,$value);/*очистка спец символов, работает только с подключенной базой данных*/
        $value = trim($value);/*удаление пробелов*/
        return $value; /*возвращаем результат в переменную*/
      }
?>

