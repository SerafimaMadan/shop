<?php /*поиск ошибок*/
function db_query ($connection, $query) {
    $query_result = mysqli_query($connection, $query)
        or die('<font color="red"><b>MySQL error: </b>' . mysqli_error($connection) . '</font><br>'
             . '<font color="#8a2be2"><b>Query: </b>' . $query . '</font>');
    $num_rows = mysqli_num_rows($query_result);
    return array($query_result, $num_rows); // функция возвращения переменных в массиве
}
?>