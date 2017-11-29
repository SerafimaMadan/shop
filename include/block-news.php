<div id="block-news">
    <center><p class="news-prev">&#9652</p></center>
    <div id="newsticker">
        <ul>
            <?php /*функция вывода новостей*/
            $con = mysqli_connect("localhost", "admin", "12345", "db_shop");
            list($result, $num_rows) = db_query($con,"SELECT * FROM news ORDER BY id DESC "); /*ORDER BY это сортировка по заданной переменной*/
            if  ($num_rows > 0) { /*если результаты > 0, то выводится на экран результат*/
                $row = mysqli_fetch_assoc($result); /*переменная, где хранятся все результаты*/
                do
                {
            echo '<li><span>'.$row["date"].'</span>
            <a href="">'.$row["title"].'</a>
            <p>'.$row["text"].'</p></li>';
                }
                while ($row = mysqli_fetch_array($result));
            }
            ?>


        </ul>
            </div>
    <center><p class="news-next">&#9662</p></center> <!--доработать, не работает при нажатии-->
</div>