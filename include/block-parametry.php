<script type="text/javascript">
    $(document).ready(function() {
        $('#block-trackbar').trackbar ({
            onMove: function() /*функция для смены цены в полях, при движении бегунка*/
            {
                document.getElementById("start-price").value=this.leftValue; /*присваиваем значение ползунков слева и справа*/
                document.getElementById("end-price").value=this.rightValue;
            },
            width:200,
            leftLimit:1000,
            leftValue: <?php
            if (in_array("start_price", $_GET) AND (int)$_GET["start_price"] >=1000 AND (int)$_GET["start_price"]<=50000) {
             echo (int)$_GET["start_price"];
            }else {
                echo "1000";
            }
            ?>,
            rightLimit:50000,
            rightValue:<?php
            if (in_array("end_price", $_GET) AND (int)$_GET["end_price"] >=1000 AND (int)$_GET["end_price"]<=50000) {
                echo (int)$_GET["end_price"];
            }else {
                echo "50000";
            }
            ?>,
            roundup: 1000
        });
    });

</script>

<div id="block-parametr">
    <p class="header-title">Поиск по параметрам</p>
    <p class="title-filter">Цена</p>
    <form method="get" action="search-filter.php">
        <div id="block-input-price">
            <ul>
                <li><p>от</p></li>
                <li><input type="text" id="start-price" name="start_price" value="1000" /></li>
                <li><p>до</p></li>
                <li><input type="text" id="end-price" name="end_price" value="50 000" /></li>

            </ul>
            </div>
        <div id="block-trackbar"></div>
        <p class="title-filter"></p>
        <ul class="checkbox-brand"> </ul>
<center><input type="submit" id="button-param-search" name="submit" value="Найти" /></center> <!-- center для размещения этой кнопки по центру блока-->
    </form>

</div>