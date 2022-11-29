// 움직여랏 //
$(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
    var mainScroll = $(window).scrollTop(); //스크롤의 거리
    var mainScrollGap = $(window).height()-500;
  
    //토목 
    var mainCivil = $('.civil').offset().top - mainScrollGap;
    if(mainScroll > mainCivil){
        $('.civil').addClass('move');
    } else if(mainScroll < mainList -300){
        $('.civil').removeClass('move');
    };

    //건축
    var mainConst = $('.const').offset().top - mainScrollGap;
    if(mainScroll > mainConst){
        $('.const').addClass('move');
    } else if(mainScroll < mainList -300){
        $('.const').removeClass('move');
    };


    //플랜트
    var mainPlant = $('.plant').offset().top - mainScrollGap;
    if(mainScroll > mainPlant){
        $('.plant').addClass('move');
    } else if(mainScroll < mainList -300){
        $('.plant').removeClass('move');
    };

  });
  

  //더보기 확장

    $(document).ready(function() {
        $('.gall .more').toggle(function(){
            $('.gall .aList').fadeIn('slow');
            $(this).find('span').text(' ▲');
        },function(){
            $('.gall .aList').fadeOut('fast');
            $(this).find('span').text(' ▼');
        });
 
     //tab키 처리

        $('.gall .more').on('focus', function () {
               $('.select .aList').fadeIn('slow');
        });
        $('.gall .aList li:last').on('blur', function () {
               $('.select .aList').fadeOut('fast');
        });
 });
 