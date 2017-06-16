(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		$('.widget-testimonials-carousel .testimonials-item .item-comment p').each(function() {
            $(this).text($(this).text().substring(0,120) + '...');
        });
        
        //lazyload images
        $('.lazy').lazy();
	});

    $('ul.tabs__caption').on('click', 'li:not(.active)', function() {
        $(this)
        .addClass('active').siblings().removeClass('active')
        .closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
    });
    
    //ajax send email
    $('#new_post').submit(function(e){
        // Работа с виджетом recaptcha
        // 1. Получить ответ гугл капчи
        var captcha = grecaptcha.getResponse();

        // 2. Если ответ пустой, то выводим сообщение о том, что пользователь не прошёл тест.
        // Такую форму не будем отправлять на сервер.
        if (!captcha.length) {
            // Выводим сообщение об ошибке
            $('#recaptchaError').text('* Вы не прошли проверку "Я не робот"');
        } else {
            // получаем элемент, содержащий капчу
            $('#recaptchaError').text('');
        
            // 3. Если форма валидна и длина капчи не равно пустой строке, то отправляем форму на сервер (AJAX)
        
            // добавить в formData значение 'g-recaptcha-response'=значение_recaptcha
            //formData.append('g-recaptcha-response', captcha);
            
            $.ajax({
                type: "POST",
                url: $('#new_post').attr('action'), //Change
                data: $('#new_post').serialize()
            }).done(function () {
                $('#new_post').fadeOut();
                $('.after-send').delay(400).fadeIn();
                setTimeout(function () {
                    // Done Functions
                    $('#new_post').trigger("reset");
                    $('.after-send').fadeOut();
                    $('#new_post').delay(400).fadeIn();
                }, 2000);
            });
            
        }

        return false;
    });
    
    //ajax send email
    $('#room-form, #contact-form').submit(function(e){
        $.ajax({
            type: "POST",
            url: $(this).attr('action'), //Change
            data: $(this).serialize()
        }).done(function () {
            $('#room-form, #contact-form').fadeOut();
            $('.after-send').delay(400).fadeIn();
            setTimeout(function () {
                // Done Functions
                $('#room-form, #contact-form').trigger("reset");
                $('.after-send').fadeOut();
                $('#room-form, #contact-form').delay(400).fadeIn();
            }, 2000);
        });
        return false;
    });
})(jQuery, this);
