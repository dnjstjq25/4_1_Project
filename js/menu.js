$(document).ready(function() 
{
              $('ul.menu_list li ul').hide();
              $('.menu_box').hide();

    $('ul.menu_list li.menu').hover(
        function() { 
            $('ul',this).fadeIn('normal',function(){$(this).stop();});
            $('.menu_box').slideDown('fast',function(){$(this).stop();});
            $(this).find('.link').css({
                'color':'#fd9d1e',
                'border-bottom': '3px solid #fd9d1e'
            });
        },
        function() {

            $('ul',this).hide();
            $('.menu_box').hide();
            $(this).find('.link').css({
                'color':'#333',
                'border-bottom': 'none'
            });
        });

    $('ul.menu_list li.menu .link').bind('focus', function () {        
            $(this).parents('.menu').find('ul').fadeIn('fast');
            $('.menu_box').slideDown('fast');
            $(this).parents('.menu').siblings().find('ul').fadeOut('fast');
        });

    $('ul.menu_list li.m6 li:last').find('a').bind('blur', function () {        
          $('ul.menu_list li.m6 ul').fadeOut('fast');
          $('.menu_box').slideUp('normal');
    });
});