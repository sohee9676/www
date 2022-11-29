$(document).ready(function () {

    var scrollcnt=0;

    $('#content section:eq(0)').addClass('move');

    var h1= $('#content .value').offset().top-200 ;
    var h2= $('#content .business').offset().top-100 ;
    var h3= $('#content section:eq(2)').offset().top-100 ;
    var h4= $('#content section:eq(3)').offset().top-100 ;
    var h5= $('#content section:eq(4)').offset().top-100 ;


     //스크롤의 좌표가 변하면.. 스크롤 이벤트
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop(); 

        $('.text').text(scroll);

        if(scroll>=0 && scroll<h1){
             $('#content .value').addClass('move');
            //  $('#content section:eq(0)').css('opacity',1);
            // scrollcnt=0;
        }else if(scroll>=h1 && scroll<h2){
              $('#content .business)').addClass('move');
            // scrollcnt=1;
        }else if(scroll>=h2 && scroll<h3){
              $('#content section:eq(2)').addClass('move');
            // scrollcnt=2;
        }else if(scroll>=h3 && scroll<h4){
              $('#content section:eq(3)').addClass('move');
            // scrollcnt=3;
        }else if(scroll>=h4 && scroll<h5){
             $('#content section:eq(4)').addClass('move');
            // scrollcnt=4;
       }

       $('#content section:eq('+scrollcnt+')').addClass('move');
              
    });


});