$(document).ready(function() {
    /*установка для блока new в правой части подключенный плагин карусели */
   $("#newsticker").jCarouselLite({
		vertical: true,
		hoverPause:true, /*остановка при наведении на новость*/
		btnPrev: "#news-prev", /*кнопка вперед крутит -не работает-*/
		btnNext: "#news-next", /*назад крутить*/
		visible: 3, /*количество новосте в блоке видимости*/
		auto:3000, /*интервал прокрутки новостей 3 сек*/
		speed:500 /*скорость прокручивания*/
	});
/*------*/
loadcart();
/*скрипт для переключения картинок в строчны или блочный варианты и замена цвета картинки выбора*/
$("#style-grid").click(function(){
    
$("#block-product-grid").show();
$("#block-product-list").hide();

$("#style-grid").attr("src","img/icon-grid-active.png"); /*смена картинки принажатии*/
$("#style-list").attr("src","img/icon-list.png");

$.cookie('select_style','grid'); /*плагин для запоминания формы варианта товаров*/
});

$("#style-list").click(function(){

$("#block-product-grid").hide();
$("#block-product-list").show();

$("#style-list").attr("src","img/icon-list-active.png");
$("#style-grid").attr("src","img/icon-grid.png");

$.cookie('select_style','list');/*плагин для запоминания формы варианта товаров подключен к главной странице*/
});

/*проверяем существование*/
if ($.cookie('select_style') == 'grid')
{
$("#block-product-grid").show();
$("#block-product-list").hide();

$("#style-grid").attr("src","img/icon-grid-active.png");
$("#style-list").attr("src","img/icon-list.png");
}
else /*если значение выбрано list то следующий алгоритм*/
{
$("#block-product-grid").hide();
$("#block-product-list").show();

$("#style-list").attr("src","img/icon-list-active.png");
$("#style-grid").attr("src","/img/icon-grid.png");
}
    /*----*/
$("#selector-sort").click(function(){   /*включение сортировки при клике при помощи функции*/
   $("#sorting-list").slideToggle(200);  /*слайдинг нужен, чтобы после 2 нажатия сортировка сворачивалась, в скобках время реакции*/
});

    $('#plus > ul > li > a').click(function(){

        if ($(this).attr('class') != 'active'){ /*открытие списка в активной категории*/

            $('#plus > ul > li > ul').slideUp(100);
            $(this).next().slideToggle(100);

            $('#plus > ul > li > a').removeClass('active'); /*закрытие всех неактивных классов*/
            $(this).addClass('active');
            $.cookie('select_cat', $(this).attr('id'));

        }else
        {

            $('#plus > ul > li > a').removeClass('active'); /*удалить активные классы*/
            $('#plus > ul > li > ul').slideUp(100); /*закрыть все списки*/
            $.cookie('select_cat', ''); /*категория не выбрана*/
        }
    });
/*проверка при загрузке сайта*/
    if ($.cookie('select_cat') != '')
    {
        $('#plus > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show(); /*указываем на id строки # соединяем со значением и добавляем класс activ после перезагрузки*/
    }

    $('#gen_pass').click(function(){ /*нажатие на сгенерировать пароль*/
 $.ajax({
  type: "POST",
  url: "functions/genpass.php",
  dataType: "html",
  cache: false, /*для отсутствия сохранения в браузере*/
  success: function(data) {       /*указание места размещения пароля*/
  $('#reg_pass').val(data);
  }
});
 
}); 


$('#reload_captcha').click(function(){ /*функция для обновления капчи*/
$('#block_captcha > img').attr("src","reg/reg_captcha.php?r="+ Math.random()); /*меняем src для img и генерируем новое значение для всех браузеров*/
});


 $('.top-auth').toggle(
       function() {
           $(".top-auth").attr("id","active-button");
           $("#block-top-auth").fadeIn(200);
       },
       function() {
           $(".top-auth").attr("id","");
           $("#block-top-auth").fadeOut(200);  
       }
    );















});