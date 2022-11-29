$(document).ready(function() {

    // 헤더 스크롤 반응
    var smh=$('.main').height();
    // gnb 스크롤 이벤트 체크
    $(window).on('scroll',function(){//스크롤의 거리가 발생하면
        var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
        //console.log(scroll);
        
        if(scroll>100){//스크롤300까지 내리면
            $('#headerArea').addClass('on');
        } else {//스크롤 내리기 전 디폴트(마우스올리지않음)
            $('#headerArea').removeClass('on');
        };
    });
  });


  // navigation


$(document).ready(function() {
    var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
      
    $('.menu_ham').click(function() { //메뉴버튼 클릭시
        
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
  
    });
    
    
     //2depth 메뉴 교대로 열기 처리 
     var onoff=[false,false,false,false,false,false];
     var arrcount=onoff.length;
     
     console.log(arrcount);
     $('#gnb .depth1 ul').hide();
     $('#gnb .depth1 h3 a').click(function(){
         var ind=$(this).parents('.depth1').index();
         
         console.log(ind);
         
        if(onoff[ind]==false){
         //$('#gnb .depth1 ul').hide();
         $(this).parents('.depth1').find('ul').slideDown('slow');
         $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');
          for(var i=0; i<arrcount; i++) onoff[i]=false; 
          onoff[ind]=true;
            
          $('.depth1 span').html('<i class="fa-solid fa-chevron-down"></i>');   
          $(this).find('span').html('<i class="fa-solid fa-chevron-up"></i>');   
             
        }else{
          $(this).parents('.depth1').find('ul').slideUp('fast'); 
          onoff[ind]=false;   
            
          $(this).find('span').html('<i class="fa-solid fa-chevron-down"></i>');     
        }
     });    
   
   });

   
$(document).ready(function() {
	$('.family .arrow').toggle(function(){

		$('.family .aList').stop().fadeIn('slow');
		$(this).css('background','#bd0202').css('color','#fff')
		$(this).html('<span> family site <i class="fa-solid fa-caret-up"></i></span>');		
	
  }
  , function(e){
    e.preventDefault();

    $(this).css('background','#ccc').css('color','#fff')
    $(this).html('<span> family site <i class="fa-solid fa-caret-down"></i></span>');		
    $('.family .aList').stop().slideUp(200);
});
  
});


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