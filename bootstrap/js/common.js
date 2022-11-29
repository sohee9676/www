$(document).ready(function () {

        // intro
        setTimeout(function(){
            $('.pageintro').fadeOut();
            
        }, 3000);

    //상단 이동
    $('.topMove').hide();
    $(window).on('scroll', function () { //스크롤 값의 변화가 생기면
        var scroll = $(window).scrollTop(); //스크롤의 거리

        if (scroll > 500) { //500이상의 거리가 발생되면
            $('.topMove').fadeIn('slow'); //top노출
        } else {
            $('.topMove').fadeOut('fast'); //top미노출
        }
    });
    $('.topMove').click(function (e) { //아이콘 클릭 시 상단으로 스르륵 이동
        e.preventDefault();
        $("html,body").stop().animate({
            "scrollTop": 0
        }, 100);
    });

    /*스크롤 이벤트*/
    var h1= $('#about').offset().top-300 ;
    var h2= $('#favorite').offset().top-300 ;
    var h3= $('#lookbook').offset().top-300 ;

    $(window).on('scroll',function(){ 
        var scroll = $(window).scrollTop(); 
            
        if(scroll>=400 && scroll<h1){  
            $('#about').addClass('scrollevent'); 
            
        }else if(scroll>=h1 && scroll<h2){            
            $('#shop').addClass('scrollevent'); 

        }else if(scroll>=h2 && scroll<h3){            
            $('#favorite').addClass('scrollevent'); 

        }else if(scroll>=h3){            
            $('#lookbook').addClass('scrollevent'); 

        }
    });
});