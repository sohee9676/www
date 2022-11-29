$(document).ready(function() {
	$('.sub2_tab .arrow').toggle(function(){

		$('.sub2_tab .aList').stop().fadeIn('slow');
		$(this).css('background','#bd0202').css('color','#fff')
		$(this).html('<span> 토목사업 실적 <i class="fa-solid fa-caret-up"></i></span>');		
  }
  , function(e){
    e.preventDefault();

    $(this).css('background','#ccc').css('color','#fff')
    $(this).html('<span> 토목사업 실적 <i class="fa-solid fa-caret-down"></i></span>');		
    $('.sub2_tab .aList').stop().slideUp(200);
});
  
});