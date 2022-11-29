$(document).ready(function () {
    $('.tab ul li a:eq(0)').addClass('current')    

    var cnt=0;
    
    $('.tab ul li:eq(0)').find('a').addClass('spy'); //첫번째 서브메뉴 활성화
    $('.historyAll div:eq(0)').addClass('boxMove'); //첫번째 내용글 애니메이션 처리

    var smh= $('.main').height()+320;  //메인 비주얼의 높이
    var h1= 170 + $('.historyAll div:eq(0)').offset().top ;
    var h2= 170 + $('.historyAll div:eq(1)').offset().top ;
    var h3= 170 + $('.historyAll div:eq(2)').offset().top ;
    var h4= 170 + $('.historyAll div:eq(3)').offset().top ;

     //스크롤의 좌표가 변하면.. 스크롤 이벤트
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();       
        $('.text').text(scroll);
        

        //sticky menu 처리
        if(scroll>smh){ 
            $('.tab').addClass('tabOn');
            $('header').hide();
        }else{
            $('.tab').removeClass('tabOn');
            $('header').fadeIn();
        }
        
        
        $('.tab ul li a').removeClass('spy');
        //모든 서브메뉴 비활성화~ 불꺼!!!
        
        
         //스크롤의 거리의 범위를 처리
         $('.tab ul li a').removeClass('current');

        if(scroll>=0 && scroll<h1){
            cnt=0;
            $('.tab ul li a:eq(0)').addClass('current');
        }else if(scroll>=h1 && scroll<h2){
            cnt=1;
            $('.tab ul li a:eq(1)').addClass('current');
        }else if(scroll>=h2 && scroll<h3){
            cnt=2;
            $('.tab ul li a:eq(2)').addClass('current');
        }else if(scroll>=h3 && scroll<h4){
            cnt=3;
            $('.tab ul li a:eq(3)').addClass('current');
        }else if(scroll>=h4){
            cnt=4;
            $('.tab ul li a:eq(4)').addClass('current');
        }
        
        $('.tab ul li a:eq('+cnt+')').addClass('spy');
        //서브메뉴 활성화
        $('.historyAll div:eq('+cnt+')').addClass('boxMove');
        //내용 콘텐츠 애니메이션
    
        
    });


});