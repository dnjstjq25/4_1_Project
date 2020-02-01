$(document).ready(function()
{
    $('.product .info dt:eq(0)').show();
    $('.product .info dd:eq(0)').show();
    $('.product li dl:eq(0)').stop().animate({top:'330px'},{queue:false,duration:160});
      
    $('.product .pr_img li').click(function(){
        var ind2 = $(this).index();
        
        $('.product .info dt').hide();
        $('.product .info dd').hide();
        
        $('.product .info dt:eq('+ind2+')').fadeIn('slow');
        $('.product .info dd:eq('+ind2+')').fadeIn('slow');
        
        $(this).siblings('li').find('dl').stop().animate({top:'0px'},{queue:false,duration:160});
		$("dl", this).stop().animate({top:'330px'},{queue:false,duration:160});
    });
}
)