$(document).ready(function() {
  var screenSize, screenHeight;
  var current=false;

  function screen_size(){
      screenSize = $(window).width(); //스크린의 너비
      screenHeight = $(window).height();  //스크린의 높이

      $("#content").css('margin-top',screenHeight);
      
      if( screenSize > 768 && current==false){
          $("#imgBG").show();
          $("#imgBG2").hide();
          current=true;
        }
      if(screenSize <= 768){
          $("#imgBG").hide();
          $("#imgBG2").show();
          current=false;
      }
  }

  screen_size();  //최초 실행시 호출
  
 $(window).resize(function(){    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
      screen_size();
  }); 
  
  $('.down').click(function(){
      screenHeight = $(window).height();
      $('html,body').animate({'scrollTop':screenHeight}, 1000);
  });
  
  
});