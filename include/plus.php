
<div id="plus">
    <p class="header-title">Категории товаров</p>
    <ul >
        <li><a id="index1" href="">Мужчинам</a>
            <ul class="category-section">
                <li><a href="view_cat.php?type=мужчинам"> <strong>Все бренды</strong></a></li>

                <?php
                $con = mysqli_connect("localhost", "admin", "12345", "db_shop");
               list($result, $num_rows) = db_query($con,"SELECT * FROM category WHERE TYPE ='мужчинам' ");
                If ($num_rows> 0)
                {
                    $row = mysqli_fetch_array($result);
                    do
                    {
                        echo '
     
  <li><a href="view_cat.php?cat='.strtolower($row["brend"]).'&type='.$row["type"].'">'.$row["brend"].'</a></li>
     
    ';
                    }
                    while ($row = mysqli_fetch_array($result));
                }

                ?>

            </ul>

        </li>
        <li><a id="index2" href="">Женщинам </a>
            <ul class="category-section">
                <li><a href="view_cat.php?type=женщинам"><strong>Все бренды</strong> </a></li>

                <?php
                $con = mysqli_connect("localhost", "admin", "12345", "db_shop");
                list($result, $num_rows) = db_query($con,"SELECT * FROM category WHERE TYPE ='женщинам' ");
                If ($num_rows> 0)
                {
                    $row = mysqli_fetch_array($result);
                    do
                    {
                        echo '
     
  <li><a href="view_cat.php?cat='.strtolower($row["brend"]).'&type='.$row["type"].'">'.$row["brend"].'</a></li>
     
    ';
                    }
                    while ($row = mysqli_fetch_array($result));
                }

                ?>

            </ul>
        </li>

    </ul>
</div>
