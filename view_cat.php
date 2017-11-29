<?php
session_start(); /*открытие сессии*/
unset($_SESSION['cart']);

include ("include/db_connect.php"); /*подключение базы данных к главной странице*/
include ("include/db.php"); /*подключение файла проверки*/
include ("functions/functions.php"); /*подключение файла проверки !!!!!не работает*/


$cat=(!empty($_GET['cat']))? screening($_GET['cat']): "";

$type=(!empty($_GET['type']))? screening($_GET['type']): "";

                $sorting=isset($_GET['sort']) ?($_GET["sort"]) : 'дефолтное значение'; /*скрипт сортировки, указываем глобальный массив из переменной*/

              switch ($sorting)
                { /*проверка сортировки с помощью оператора*/
                    case 'price-asc';
                        $sorting='price ASC'; /*указан столбец в таблице*/
                        $sort_name= 'по цене';
                        break;
                    case 'popular';
                        $sorting='count DESC'; /*указан столбец в таблице*/
                        $sort_name= 'по популярности';
                        break;
                    case 'brand';
                        $sorting='brand'; /*указан столбец в таблице*/
                        $sort_name= 'от А до Я';
                        break;
                    default:
                        $sorting='products_id DESC'; /*указан столбец в таблице*/
                        $sort_name= 'без сортировки';
                        break;
                }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Internet shop</title>
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



 <?php /*код для вывода товаров на страницу*/
            $con = mysqli_connect("localhost", "admin", "12345", "db_shop");
            if (!empty($cat) && !empty($type)) /*если существуют! указанные переменные, то будет выполнено следующуее действие*/
            {
               $querycat= "AND brand='$cat' AND type_products='$type'";
               $catlink="cat=$cat&";
            }
            else { /*если одной из переменной нет, то будет выполняться условие*/
                if (! empty($type)){
              $querycat="AND type_products='$type'"; /*если предыдущее условие не выполняется то переменную оставляем пустой и ничего не загрузится из бд*/
                }else {
                    $querycat="";
                }
                if (! empty($cat)){
                    $catlink="cat=$cat&"; /*если предыдущее условие не выполняется то переменную оставляем пустой и ничего не загрузится из бд*/
                }else {
                    $catlink="";
                }
            }

 $num=4; /*количество товара, выводимого на страницу*/
 $page= isset($_GET['page']) ? (int)$_GET['page'] : 'дефолтное значение'; /*выводит в командной строке номер страницы*/
 list($count,$temp)=db_query($con,"SELECT COUNT(*) FROM table_producrs WHERE visible='1' "); /*выбирает и считает количество товаров в таблице*/
 $temp=mysqli_fetch_array($count); /*результат*/
 if ($temp[0]>0){
     $tempcount=$temp[0]; /*создаем переменную с общим кол.товаров*/
     $total=(($tempcount-1)/$num)+1; /*считаем количество страниц на сайте, берем общее к.товаров - 1/на количество выводимых на сайте и+1*/
     $total=intval($total); /*округляем предыдущее значение, т.к. вывести дробное число страниц невозможно*/
     $page=intval($page);
     if (empty($page)or $page<0)$page=1; /*если страницы не существует или она <0, то будет 1*/
     if ($page>$total)$page=$total; /*если номер страниц больше, чем их количество, то берется просто максимальное количество существующих страниц*/
     // Вычисляем начиная с какого номера следует выводить товары
     $start = $page * $num - $num;

     $qury_start_num = " LIMIT $start, $num"; /*лимит вывода товаров*/
 }



            list($result, $num_rows) = db_query($con,"SELECT * FROM table_producrs WHERE visible='1'  $querycat ORDER BY $sorting $qury_start_num "); /*ORDER BY это сортировка по заданной переменной*/
            if  ($num_rows > 0) { /*если результаты > 0, то выводится на экран результат*/
                $row = mysqli_fetch_assoc($result); /*переменная, где хранятся все результаты*/
 echo '
 <div id="block-sorting">
            <p id="nav-3"><a href="index.php">Главная</a>\<span>Все товары</span></p>
            <ul id="options-list">
                <li>Вид: </li>
                <li><img  id="style-grid" src="img/icon-grid.png" /></li>
                <li><img id="style-list" src="img/icon-list.png" /></li>

                <li>Сортировка:</li>

                <li ><a id="selector-sort"> '.$sort_name.'</a>
            <ul id="sorting-list">
                <li><a href="view_cat.php? '.$catlink.' type='.$type.' & sort=price-asc">по цене</a></li> <!--*переменная sort*-->
                <li><a href="view_cat.php? '.$catlink.' type='.$type.' & sort=popular">по популярности</a></li>
                <li><a href="view_cat.php? '.$catlink.' type='.$type.' & sort=brand">от А до Я</a></li>
            </ul>

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
            $result = mysqli_query($con,"SELECT * FROM table_producrs WHERE visible='1' $querycat ORDER BY $sorting $qury_start_num "); /*ORDER BY это сортировка по заданной переменной*/
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
echo '</ul>'; /*алгоритм для вывода постраничной навигации по товарам*/

if ($page != 1){
    $pstr_prev = '<li><a class="pstr-prev" href="index.php?page='.($page - 1).'">&lt;</a></li>';
}
else {
    $pstr_prev ="";
}
$pstr_next =($page != $total) ? '<li><a class="pstr-next" href="index.php?page='.($page + 1).'">&gt;</a></li>' : "";


// Формируем ссылки со страницами
$page5left = ($page - 5 > 0) ? '<li><a href="index.php?page='.($page - 5).'">'.($page - 5).'</a></li>' : "";
if($page - 4 > 0) {
    $page4left = '<li><a href="index.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
}
else {
    $page4left = "";
}
if($page - 3 > 0) {
    $page3left = '<li><a href="index.php?page=' . ($page - 3) . '">' . ($page - 3) . '</a></li>';
}
else {
    $page3left="";
}
$page2left = ($page - 2 > 0) ? '<li><a href="index.php?page='.($page - 2).'">'.($page - 2).'</a></li>' : "";
$page1left = ($page - 1 > 0) ? '<li><a href="index.php?page='.($page - 1).'">'.($page - 1).'</a></li>' : "";

$page5right = ($page + 5 <= $total) ? '<li><a href="index.php?page='.($page + 5).'">'.($page + 5).'</a></li>' : "";
$page4right = ($page + 4 <= $total) ? '<li><a href="index.php?page='.($page + 4).'">'.($page + 4).'</a></li>' : "";
$page3right = ($page + 3 <= $total) ? '<li><a href="index.php?page='.($page + 3).'">'.($page + 3).'</a></li>' : "";
$page2right = ($page + 2 <= $total) ? '<li><a href="index.php?page='.($page + 2).'">'.($page + 2).'</a></li>' : "";
$page1right = ($page + 1 <= $total) ? '<li><a href="index.php?page='.($page + 1).'">'.($page + 1).'</a></li>' : "";

if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="index.php?page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = "";
}

if ($total > 1)
{
    echo ' <div id="pstr-nav"> <ul>  ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left.
        "<li><a class='pstr-active' href='index.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '</ul>  </div> ';

}


            ?>

    </div>
    <?php include ("include/block-footer.php")?>


</div>

</body>
</html>
