
<div id="block-header">
    <div id="header-top">
        <ul id="top-menu">
            <li>Регион доставки - <span>Москва</span></li>
            <li><a href="index.php">Главная</a></li>
            <li><a href="catalog.php">Мужчинам</a></li> <!--не доделано-->
            <li><a href="catalog.php">Женщинам</a></li>
            <li><a href="contact.php">Контакты</a> </li>
        </ul>

        <p id="userform" align="right"><a class="top-userform">Вход</a><a href="userregistr.php">Регистрация</a></p>
        <div id="block_top_aut">
            <div class="corner"></div>
            <form method="post">
                <ul id="email_pass">
                    <h3>Вход</h3>
                    <p id="message_aut">Неверно ввели Логин и/или Пароль</p>
                    <li><center><input type="text" id="aut_login" placeholder="Логин или E-mail"/></center></li>
                    <li><center><input type="text" id="aut_pass" placeholder="Пароль"/> <span id="button_pass_show" class="pass_show"></span></center>
                    <ul id="list_aut">
                        <li><input type="checkbox" name="remember" id="remember"/><label for="remember">Запомнить</label></li>
                        <li><a id="remind_pass" href="#">Не помню пароль</a></li>
                    </ul>
                    </li>
                   <p id="button_aut" align="right"><a>Войти</a></p>
                      <p align="right" class="aut_loading"><img src="img/loading.gif"></p>
                </ul>
            </form>
        </div>

    </div>

<img id="img-logo" src="img/logo.png"/>
    <img id="logo" src="img/0.jpg"/>

    <div id="comoninf">
       <p align="right">Звонок бесплатный</p>
        <h3 align="right"> &#9742; 8(800) 300-55-66 </h3>
        <p align="right" id="block-basket"><a href=""><img src="img/basket.png"/>Корзина пуста</a></p>


    </div>
    <div id="icons">
        <h3>Мы в социальных сетях</h3>
        <a href="" class="facebook" ><img src="img/facebook.png"/></a>
        <a href="" class="twitter"><img src="img/twitter.png"/></a>
        <a href="" class="insta"><img src="img/Instagram.png"/></a>
    </div>

</div>
<nav>
    <div id="meddle-menu">
        <ul>
            <li><img src="img/trend.png"><a href="index.php">Тренды сезона</a> </li>
            <li><img src="img/new.png"> <a href="">Новинки</a></li>
            <li><img src="img/sale.png"> <a href="">Скидки</a></li>

        </ul>
        <div id="search">
            <form method="get" action="search.php?q="> <!--передача данных методом get и файл для него с параметром -->
                <span><img src="img/icon-search.png"/></span>
                <input type="text" id="input-search" name="q" placeholder="Поиск по сайту"/>
                <input type="submit" id="button-search" value="Найти"/>
            </form>
        </div>

    </div>
</nav>