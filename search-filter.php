<?php
session_start(); /*открытие сессии*/
unset($_SESSION['cart']);

include ("include/db_connect.php"); /*подключение базы данных к главной странице*/
include ("include/db.php"); /*подключение файла проверки*/
include ("functions/functions.php"); /*подключение файла проверки */

$cat=screening($_GET["cat"]); /*щшибки в определении переменных, выводится зпмечание*/
$type=screening($_GET["type"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Посик по параметрам</title>
    <link href="css/reset.css" rel="stylesheet" type="text/css"/>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="swichprice/track.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>
    <script type="text/javascript" src="js/shop-script.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="swichprice/jquery.trackbar.js"></script>
</head>
<body>


<div id="blok-body"> <!-- вся информация на сайте -->

    <?php include ("include/block-header.php")?> <!-- меню, логотип, корзина-->

    <div id="block-right">
        <?php include ("include/plus.php");
        include ("include/block-parametry.php");
        include ("include/block-news.php")
        ?> <!--правый блок навигации-->
    </div> <!--информация по товарам-->
    <div id="block-content"><!--все товары-->


<?php /*код для вывода товаров на страницу при выборе цены*/
        $con = mysqli_connect("localhost", "admin", "12345", "db_shop");

       if( isset($_GET["brand"])){
           $check_brand=implode(',',$_GET["brand"]); /*объединяем элементы глобального массива в строку*/
       }
       $start_price=(int)$_GET["start_price"]; /*int указываеи на использование только цифровых значений, при неправильном наборе выводится 0*/
        $end_price=(int)$_GET["end_price"];
        /*проверяем существование переменной $check_brand*/
        if (!empty($check_brand) or !empty($end_price)) /*если выбираем что-то одно, бренд или диапозон цен, то выполняется следующее действие*/
        {

             if (!empty($end_price)) $query_price="AND price BETWEEN $start_price AND $end_price"; /*проверка выбора цены*/

        }

        list($result, $num_rows) = db_query($con,"SELECT * FROM table_producrs WHERE visible='1'   $query_price ORDER BY products_id DESC "); /*ORDER BY это сортировка по заданной переменной*/
        if  ($num_rows > 0) { /*если результаты > 0, то выводится на экран результат*/
        $row = mysqli_fetch_assoc($result); /*переменная, где хранятся все результаты*/
        echo '
 <div id="block-sorting">
            <p id="nav-3"><a href="index.php">Главная</a>\<span>Все товары</span></p>
            <ul id="options-list">
                <li>Вид: </li>
                <li><img  id="style-grid" src="img/icon-grid.png" /></li>
                <li><img id="style-list" src="img/icon-list.png" /></li>

               

            </li>
        </ul>
    </div>
     <ul id="block-product-grid">
    ';
        do {
            /*функция подгона картинок до нужного размера*/
            if  ($row["image"] != "" && file_exists("upload_img/".$row["image"])) /*проверка существования картинки*/
            {
                $img_path = 'upload_img/'.$row["image"];
                $max_width = 200;
                $max_height = 200;
                list($width, $height) = getimagesize($img_path);
                $ratioh = $max_height/$height;
                $ratiow = $max_width/$width;
                $ratio = min($ratioh, $ratiow);
                $width = intval($ratio*$width);
                $height = intval($ratio*$height);
            }else /* условие вывода картинки нет изображения*/
            {
                $img_path = "img/no-image.png";
                $width = 110;
                $height = 200;
            }
            // Количество товаров
            list(, $table_products) = db_query($con,"SELECT * FROM table_producrs WHERE products_id = '{$row["products_id"]}' AND visible='1'");
            echo'
<!--выводится подсчет просмотров-->
<li>
<div class="block-img-grid"> 
<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
</div>
<p class="style-title-grid"><a href="">'.$row["title"].'</a></p> <!--название-->
<ul class="review-count-grid">
<li><img src="img/eye-icon.png"/><p>0</p></li>
<li><img src="img/comment-icon.png"/><p>0</p></li>
</ul>
<a class="add-card-grid"></a> <!--кнопка корзины в блоке для товара-->
<p class="style-price-grid"><strong>'.$row["price"].'</strong>руб.</p> <!--выводим цену из базы данных -->
<div class="mini-features">'.$row["mini_features"].'</div>
</li>
     
';

        }

        while ($row = mysqli_fetch_array($result));


        ?>
        </ul>
        <ul id="block-product-list">
            <?php /*код для вывода товаров на страницу в виде списка при переключении*/
            $con=mysqli_connect("localhost", "admin", "12345", "db_shop");
            $result = mysqli_query($con,"SELECT * FROM table_producrs WHERE visible='1'  $query_price ORDER BY products_id DESC "); /*ORDER BY это сортировка по заданной переменной*/
            if  (mysqli_num_rows($result)>0) {
                $row = mysqli_fetch_assoc($result); /*переменная, где хранятся все результаты*/
                do {
                    /*функция подгона картинки до нужного размера*/
                    if  ($row["image"] != "" && file_exists("upload_img/".$row["image"])) /*проверка существования картинки*/
                    {
                        $img_path = 'upload_img/'.$row["image"];
                        $max_width = 150;
                        $max_height = 150;
                        list($width, $height) = getimagesize($img_path);
                        $ratioh = $max_height/$height;
                        $ratiow = $max_width/$width;
                        $ratio = min($ratioh, $ratiow);
                        $width = intval($ratio*$width);
                        $height = intval($ratio*$height);
                    }else /* условие вывода картинки нет изображения*/
                    {
                        $img_path = "img/no-image.png";
                        $width = 110;
                        $height = 200;
                    }
                    // Количество товаров
                    list(, $table_products) = db_query($con,"SELECT * FROM table_producrs WHERE products_id = '{$row["products_id"]}' AND visible='1' ");
                    echo'
<!--подсчет просмотров-->
<li>
<div class="block-img-list"> 
<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"/>
</div>

<ul class="review-count-list">
<li><img src="img/eye-icon.png"/><p>0</p></li>
<li><img src="img/comment-icon.png"/><p>0</p></li>
</ul>
<p class="style-title-list"><a href="">'.$row["title"].'</a></p>
<a class="add-card-list"></a> <!--кнопка корзины в блоке для товара-->
<p class="style-price-list"><strong>'.$row["price"].'</strong>руб.</p> <!--выводим цену из базы данных -->
<div class="mini-description">'.$row["mini_description"].'</div>
</li>';

                }

                while ($row = mysqli_fetch_array($result));
            }
            } else {
                echo '<h3>Раздел не существует или временно не доступен!</h3>';
            }
            ?>
        </ul>
    </div>
    <?php include ("include/block-footer.php")?>


</div>

</body>
</html>

