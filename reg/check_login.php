<?php
if($_SERVER["REQUEST_METHOD"] == "POST") /*обращение к базе данных и выбор метода*/
{
    include("../include/db_connect.php");
    include("../functions/functions.php");

    global $link;

    $login = screening($_POST['reg_login']);
//    throw new Exception('LOGIN: ['. $login . ']');
    $result = mysqli_query($link, "SELECT login FROM reg_user WHERE login='$login'");

//    throw new Exception('ROWS COUNT: ['. mysqli_num_rows($result) . ']');
    if (mysqli_num_rows($result) > 0)
    {
//        throw new Exception('RESULT: [false]');
        echo 'false';
    }
    else
    {
//        throw new Exception('RESULT: [true]');
        echo 'true';
    }
}
?>
