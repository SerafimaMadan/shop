$(document).ready(function() { /*подключение плагина*/
    $('#userreg').validate(
        {
            /* правила для проверки формы регистрации*/
            rules:{
                "reg_login":{
                    required:true, /*проверка на пустоту поля*/
                    minlength:5, /*мин длина значения в поле*/
                    maxlength:15,
                    remote: { /*здесь мы проверяем уникальность логина*/
                        type: "post",
                        url: "reg/check_login.php",
                        data: {
                            reg_login: function() {
                                return $('#reg_login').val();
                            }
                        }
                    }
                },
                "reg_pass":{
                    required:true,
                    minlength:7,
                    maxlength:15
                },
                "reg_surname":{
                    required:true,
                    minlength:2,
                    maxlength:15
                },
                "reg_name":{
                    required:true,
                    minlength:2,
                    maxlength:15
                },
               "reg_mail":{
                    required:true,
                    email:true
                },
                "reg_phone":{
                    required:true
                },
                "reg_address":{
                    required:true
                },
                "reg_captcha":{
                    required:true,
                    remote: {
                        type: "post",
                        url: "reg/check_captcha.php"

                    }

                }
            },

            /* выводимые сообщения при нарушении предыдущих правил*/
            messages:{
                "reg_login":{
                    required:"Укажите Логин!",
                    minlength:"От 5 до 15 символов!",
                    maxlength:"От 5 до 15 символов!",
                    remote:jQuery.validator.format("Имя {0} уже занято.")
                },
                "reg_pass":{
                    required:"Укажите Пароль!",
                    minlength:"От 7 до 15 символов!",
                    maxlength:"От 7 до 15 символов!"
                },
                "reg_surname":{
                    required:"Укажите вашу Фамилию!",
                    minlength:"От 3 до 20 символов!",
                    maxlength:"От 3 до 20 символов!"
                },
                "reg_name":{
                    required:"Укажите Имя!",
                    minlength:"От 3 до 15 символов!",
                    maxlength:"От 3 до 15 символов!"
                },
                "reg_mail":{
                    required:"Укажите E-mail",
                    email:"Не корректный E-mail"
                },
                "reg_phone":{
                    required:"Укажите номер телефона!"
                },
                "reg_address":{
                    required:"Необходимо указать адрес доставки!"
                },
                "reg_captcha":{
                    required:"Введите код с картинки!",
                    remote: "Неверный код проверки!"
                }
            },

            submitHandler: function(form){ /*функция для описания действий после нажатия кнопки зарегистрироваться*/
                $(form).ajaxSubmit({
                    success: function(data) {

                        if (data.trim() == 'true') /*если пользователь все поля заполнил правильно, выводится сообщение о успешной регистрации*/

                        {
                            $("#block_registration").fadeOut(300,function() { /*действия после исчезновения блока с формой регистрации*/

                                $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Вы успешно зарегистрированы!");
                                $("#form_submit").hide();

                            });

                        }
                        else
                        {
                            $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data); /*действие в случае неудачи с регистрацией*/
                        }
                    }
                });
            }
        });
});
