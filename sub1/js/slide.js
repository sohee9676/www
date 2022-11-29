$(document).ready(function () {

//슬라이드 메뉴 클릭시 해당 콘텐츠로 스스륵~~~ 이동
$('.tab ul li a:eq(0)').addClass('current');

$('.tab ul li a').click(function(e){
    e.preventDefault(); //href="#" 속성을 막아주는..메소드
    var value=0; //이동할 스크롤의 거리
    var ind = $(this).index('.tab ul li a');  // 클릭시 해당 index를 뽑아준다
    //console.log(ind);
 
      $('.tab ul li a').removeClass('current');
      $('.tab ul li a:eq('+ind+')').addClass('current');
 
      // $('.historyAll div').hide(); //모든 탭내용을 안보이게...
      $('.historyAll>div:eq('+ind+')').fadeIn(); // 첫번째 탭 내용만 열어라
    
 
    if($(this).hasClass('tab1')){   //첫번째 메뉴를 클릭했냐?   if($(this).is('#link1')){
      $(this).addClass('current');
      value= -200 + $('.historyAll #history01').offset().top;  // 해당 콘텐츠의 상단의 거리~~
    }else if($(this).hasClass('tab2')){
      $(this).addClass('current');
      value= -200 + $('.historyAll #history02').offset().top; 
    }else if($(this).hasClass('tab3')){
      $(this).addClass('current');
      value= -200 + $('.historyAll #history03').offset().top; 
    }else if($(this).hasClass('tab4')){
      $(this).addClass('current');
      value= -200 + $('.historyAll #history04').offset().top; 
    }
    
    $("html,body").stop().animate({"scrollTop":value},1000);

 
 });

});
