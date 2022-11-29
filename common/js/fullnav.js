
$(document).ready(function() {

   var smh=$('.main').height();  //비주얼 이미지의 높이를 리턴한다   1000px
   var on_off=false;  //false(안오버)  true(오버)
   
       $('#headerArea').mouseenter(function(){
           //var scroll = $(window).scrollTop();
           $(this).css('background','#fff');
           $('.dropdownmenu li.menu h3 a').css('color','#333'); 
           $('.login li a').css('color','#666');
           $('.login li a::after').css('background','#666');
          
           on_off=true;
       });
   
      $('#headerArea').mouseleave(function(){
           var scroll = $(window).scrollTop();  //스크롤의 거리
           
           if(scroll<smh-80 ){
               $(this).css('background','none'); 
               $('.dropdownmenu li.menu h3 a').css('color','#fff');
               $('.login li a').css('color','#fff');
               $('.login li::after').css('background','#fff');

           }else{
               $(this).css('background','none'); 
               $('.dropdownmenu li.menu h3 a').css('color','#333');
               $('.login li a').css('color','#666');
               $('.login li::after').css('background','#666');
           }
          on_off=false;    
      });
   
      $(window).on('scroll',function(){//스크롤의 거리가 발생하면
           var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
           //console.log(scroll);

           if(scroll>smh-80){//스크롤320까지 내리면
               $('#headerArea').css('background','#fff').css('border-bottom','none');
               $('#headerArea').addClass('on');
               $('.dropdownmenu li.menu h3 a').css('color','#333');
               $('.login li a').css('color','#666'); 
               $('.login li a::after').css('background','#666'); 

           }else{//스크롤 내리기 전 디폴트(마우스올리지않음)
              if(on_off==false){
                   $('#headerArea').css('background','none');
                   $('#headerArea').removeClass('on');
                   $('.dropdownmenu li.menu h3 a').css('color','#fff');
                   $('.login li a').css('color','#fff'); 
                   $('.login li a::after').css('background','#fff'); 
              }
           }; 
           
        });

  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
       function() { 
          $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
          $('#headerArea').animate({height:320},'fast').clearQueue();
        },function() {
          $('ul.dropdownmenu li.menu ul').hide(); //모든 서브를 다 닫아라
          $('#headerArea').animate({height:80},'fast').clearQueue();
        });
    
     //1depth 효과
     $('ul.dropdownmenu li.menu').hover(
       function() { 
           $('.depth1',this).css('color','#bd0202');
       },function() {
          $('.depth1',this).css('color','#333');
     });
     

     //tab 처리
     $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
        $('ul.dropdownmenu li.menu ul').fadeIn('normal');
        $('#headerArea').animate({height:320},'fast').css('background','#fff').clearQueue();
    });

    $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
        $('ul.dropdownmenu li.menu ul').fadeOut('fast');
        $('#headerArea').animate({height:80},'normal').clearQueue();
    });
});



//top으로 이동

$(document).ready(function () {
            
    $('.topMove').hide();
 
   $(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
        var scroll = $(window).scrollTop(); //스크롤의 거리
       
        if(scroll>500){ //500이상의 거리가 발생되면
            $('.topMove').fadeIn('slow');  //top보여라~~~~
        }else{
            $('.topMove').fadeOut('fast');//top안보여라~~~~
        }
   });
 
    $('.topMove').click(function(e){
       e.preventDefault();
        //상단으로 스르륵 이동합니다.
       $("html,body").stop().animate({"scrollTop":0},1000); //스크롤을 스무스하게 움직이는 코드
    });

});