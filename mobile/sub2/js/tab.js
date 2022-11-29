// sub2_1 탭(토글)

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


// sub2_2 탭
var cnt=$('.sub2_tab ul li a').size();  //탭메뉴 개수 ***
$('.gall>div').hide(); //모든 탭내용을 안보이게...
$('.gall>div:eq(0)').fadeIn(); // 첫번째 탭 내용만 열어라
$('.sub2_tab ul li:eq(0)').addClass('tabOn');//첫번째 탭메뉴 활성화
   

$('.sub2_tab ul li a').click(function(e){
   e.preventDefault();   // <a> href="#" 값을 강제로 막는다  
   
   var ind = $(this).index('.sub2_tab ul li a');  // 클릭시 해당 index를 뽑아준다

     $('.sub2_tab ul li a').removeClass('current');
     $('.sub2_tab ul li a:eq('+ind+')').addClass('current');

     $('.gall>div').hide(); //모든 탭내용을 안보이게...
     $('.gall>div:eq('+ind+')').fadeIn(); //클릭한 해당 탭내용만 보여라


})