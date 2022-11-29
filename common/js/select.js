

$(document).ready(function() {

	$('.family .arrow').toggle(function(){
		$('.family .aList').fadeIn('slow');
		$(this).css('background','#bd0202').css('color','#fff')
		$(this).html('<span> family site <i class="fa-solid fa-caret-up"></i></span>');		
	},function(){
        $('.family .aList').fadeOut('fast');
		$('.family .aList').mouseleave('fast'); 
		$(this).css('background','#fff').css('color','#666')
		$(this).html('<span> family site <i class="fa-solid fa-caret-down"></i></span>');			
	});

	//tab키 처리
	  $('.family .arrow').on('focus', function () {        
              $('.family .aList').fadeIn('slow');	
       });
       $('.family .aList li:last a').on('blur', function () {        
              $('.family .aList').fadeOut('fast');
       });
 
});

