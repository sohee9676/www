
// JavaScript Document
var cnt=$('.sub2_tab ul li').size();  //탭메뉴 개수 ***
$('.gall>div').hide(); //모든 탭내용을 안보이게...
$('.gall>div:eq(0)').fadeIn(); // 첫번째 탭 내용만 열어라
$('.sub2_tab li:eq(0)').css('background','#bd0202');
$('.sub2_tab li:eq(0)').css('color','#fff');//첫번째 탭메뉴 활성화
   
   //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***

$('.sub2_tab ul li').click(function(e){
   e.preventDefault();   // <a> href="#" 값을 강제로 막는다  
   
   var ind = $(this).index('.sub2_tab ul li');  // 클릭시 해당 index를 뽑아준다
   //console.log(ind);


     $('.sub2_tab ul li a').removeClass('current');
     $('.sub2_tab ul li a:eq('+ind+')').addClass('current');

     $('.gall>div').hide(); //모든 탭내용을 안보이게...
     $('.gall>div:eq('+ind+')').fadeIn(); //클릭한 해당 탭내용만 보여라


})