//business
var businesscnt=3;
var businessind=0;

$(document).ready(function(){
  $('.business .business_img img:eq(0)').fadeIn('slow');
  $('.business .boxInner ul li:eq(0)').fadeIn('slow');
  
$('.business .business_btn a').click(function(e){
  e.preventDefault();

      if($(this).is('.left_btn')){ // is() , hasClass() 2 1 0 2 1 0 
        if(businessind==0){businessind=businesscnt;}
          businessind--;
      }else if($(this).is('.right_btn')){ // 0 1 2 0 1 2 
        if(businessind==businesscnt-1){businessind=-1;}
          businessind++;
      }

      $('.business .boxInner ul li').hide();
      $('.business .boxInner ul li:eq('+businessind+')').fadeIn('slow');
    
      $('.business .boxInner .business_img img').hide();
      $('.business .boxInner .business_img img:eq('+businessind+')').fadeIn('slow');

  });
});

//esg 아코디언 


	$('.esgInner ul li span').mouseenter(function (event) {
		var $target = $(event.target);
		if ($target.is('.ag_btn01')) {
			$('.esgInner li:eq(1)').animate({ left: 800 }, 500).clearQueue();
			$('.esgInner li:eq(2)').animate({ left: 1000 }, 500).clearQueue();
        $('#content .esg .esgInner .esg_text').css('opacity','1');
        $(this).css('width','800');
		} else if ($target.is('.ag_btn02')) {
			$('.esgInner li:eq(1)').animate({ left: 200 }, 500).clearQueue();
			$('.esgInner li:eq(2)').animate({ left: 1000 }, 500).clearQueue();
        $('#content .esg .esgInner .esg_text').css('opacity','1');
        $(this).css('width','800');
		} else if ($target.is('.ag_btn03')) {
			$('.esgInner li:eq(1)').animate({ left: 200 }, 500).clearQueue();
			$('.esgInner li:eq(2)').animate({ left: 400}, 500).clearQueue();
        $('#content .esg .esgInner .esg_text').css('opacity','1');
        $(this).css('width','800');
		}
	});

	$('.esgInner li span').mouseleave(function(event) {
		$('#content .esg .esgInner .esg_text').css('opacity','0');
		$('.esgInner li:eq(0)').animate({ left: 0 }, 500).clearQueue();
		$('.esgInner li:eq(1)').animate({ left: 400 }, 500).clearQueue();
		$('.esgInner li:eq(2)').animate({ left: 800 }, 500).clearQueue();
		$('.esgInner li span').css('width', '');
		$('.esg_title').animate({ width: 400 });
	});

//news

$(document).ready(function() {
    var position=0;  //최초위치
    // var movesize=360;
    var movesize=30+$('.news_inner ul li').width();

    // var timeonoff;
   
  $('.news_inner ul').after($('.news_inner ul').clone());
    //슬라이드 겔러리를 한번 복제
 
  $('.top_btn ul li.bt a').click(function(e){
     e.preventDefault();
     
     if($(this).is('.left_btn')){  //이전버튼 클릭
            if(position==-3600){
                $('.news_inner').css('left',0);
                position=0;
        } 

          position-=movesize;  // li 크기만큼 감소
              $('.news_inner').stop().animate({left:position}, 'fast',
                function(){							
                    if(position<=-3600){
                        $('.news_inner').css('left',0);
                        position=0;
                    }
                }).clearQueue();
                ;

     }else if($(this).is('.right_btn')){  //다음버튼 클릭
                    if(position>=0){
                        $('.news_inner').css('left',-1800);
                        position=-1800;
            }
 
            position+=movesize; // li 크기만큼씩 증가
            $('.news_inner').stop().animate({left:position}, 'fast',
                function(){							
                    if(position==0){
                        $('.news_inner').css('left',-1800);
                        position=-1800;
                    }
                    
                }).clearQueue();;
      }
   });
});




// 움직여랏 //
$(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
  var mainScroll = $(window).scrollTop(); //스크롤의 거리
  var mainScrollGap = $(window).height()-500;

  //value 
  var mainValue = $('.value').offset().top - mainScrollGap;
  if(mainScroll > mainValue){
      $('.value').addClass('move');
  } else if(mainScroll < mainValue -300){
      $('.value').removeClass('move');
  };

  // BUSINESS
  var mainBusiness = $('.business').offset().top - mainScrollGap;
  if(mainScroll > mainBusiness){
      $('.business').addClass('move');
  } else if(mainScroll < mainBusiness-300 ){
      $('.business').removeClass('move');
  };

  // 지속가능경영
  var mainEsg = $('.esg').offset().top - mainScrollGap;
  if(mainScroll > mainEsg){
      $('.esg').addClass('move');
  } else if(mainScroll < mainEsg-300){
      $('.esg').removeClass('move');
  };

  // 뉴스룸
  var mainNews = $('.news').offset().top - mainScrollGap;
  if(mainScroll > mainNews){
      $('.news').addClass('move');
  } else if(mainScroll < mainNews -200){
      $('.news').removeClass('move');
  };

  // 인재채용
  var mainHire = $('.hire').offset().top - mainScrollGap -300;
  if(mainScroll > mainHire){
      $('.hire').addClass('move');
  } else if(mainScroll < mainHire - 300){
      $('.hire').removeClass('move');
  };

});