// sub3 품질 시스템 탭
var cnt=$('.process ul li a').size();  //탭메뉴 개수 ***
$('.pro_text ul li').hide(); //모든 탭내용을 안보이게...
$('.pro_text ul li:eq(0)').fadeIn(); // 첫번째 탭 내용만 열어라
$('.process ul li a:eq(0)').addClass('tabOn');//첫번째 탭메뉴 활성화
   

$('.process ul li a').click(function(e){
   e.preventDefault();   // <a> href="#" 값을 강제로 막는다  
   
   var ind = $(this).index('.process ul li a');  // 클릭시 해당 index를 뽑아준다

     $('.process ul li a').removeClass('current');
     $('.process ul li a:eq('+ind+')').addClass('current');

     $('.pro_text ul li').hide(); //모든 탭내용을 안보이게...
     $('.pro_text ul li:eq('+ind+')').fadeIn(); //클릭한 해당 탭내용만 보여라


})