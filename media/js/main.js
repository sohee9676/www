$(document).ready(function () {
    var on_off = false; //false(안오버)  true(오버)
  
    $("#headerArea").mouseenter(function () {
      var scroll = $(window).scrollTop();
      $('#headerArea').addClass('on');

      on_off = true;
    });
  
    $("#headerArea").mouseleave(function () {
      var scroll = $(window).scrollTop(); //스크롤의 거리
  
      // 메인 위에 있을 때만 배경 오프, 밑에 있을 때는 배경 온
      if (scroll < 300) {
            $('#headerArea').removeClass('on');
      } else {
        $('#headerArea').addClass('on');
    }
      on_off = false;
    });
  
    // $(window).on('scroll',function(){}); : 스크롤의 거리가 발생하면
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop(); //스크롤의 거리를 리턴하는 함수 // scrollTop : 내려온 거리
  
      if (scroll > 300) {
        //스크롤 700까지 내리면
        $("#headerArea").addClass('on');
      } else {
        //스크롤 내리기 전 디폴트(마우스올리지않음)
        if (on_off == false) {
          //마우스가 헤더에 안오버 했을 때 투명
          $('#headerArea').removeClass('on');
        }
      }})
    });
  

  // navigation

  
  $(document).ready(function() {
      var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
        
      $('.menuOpen').click(function() { //메뉴버튼 클릭시
          
          var documentHeight =  $(document).height();
          $('#gnb').css('height',documentHeight); 
  
        if(op==false){
          $('#gnb').animate({right:0,opacity:1}, 'fast');
          $('#headerArea').addClass('mn_open');
          op=true;
        }else{
          $('#gnb').animate({right:'-100%',opacity:0}, 'fast');
          $('#headerArea').removeClass('mn_open');
          op=false;
          }
      })
  });


$(window).resize(function () {    //웹브라우저 크기 조절시 반응하는 이벤트 메소드()
    var screenSize = $(window).width();
    if (screenSize > 1024) {  // 해상도가 태블릿 이상이면
        current = 1;
        $("#gnb").css({ right: 0, opacity: 1 });
        $('#headerArea').removeClass('mn_open');
        $('#headerArea').css('background','none');
        op=false

    }
    if (current == 1 && screenSize <= 1024) {  // 해상도가 태블릿 이하면
     $("#gnb").css({ right: '-100%', opacity: 0 });
     current = 0;

     if(op=false){
        $('#headerArea').removeClass('mn_open');
        $('#headerArea').css('background','none');
        $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
     }
    }
}); 


//TOP

    $('.topMove').click(function(e){
       e.preventDefault();
        //상단으로 스르륵 이동합니다.
       $("html,body").stop().animate({"scrollTop":0},1000); //스크롤을 스무스하게 움직이는 코드
    });
  
  // });