
//business
var businesscnt=3;
var businessind=0;

$(document).ready(function(){
  $('.business .boxInner .text').hide();
  $('.business .boxInner .business_img img').hide();

  $('.business .boxInner .text:eq(0)').fadeIn();
  $('.business .boxInner .business_img img:eq(0)').fadeIn();

$('.business .business_btn a').click(function(e){
  e.preventDefault();

      if($(this).is('.left_btn')){ // is() , hasClass() 2 1 0 2 1 0 
        if(businessind==0){businessind=businesscnt;}
          businessind--;
      }else if($(this).is('.right_btn')){ // 0 1 2 0 1 2 
        if(businessind==businesscnt-1){businessind=-1;}
          businessind++;
      }
      $('.business .boxInner .text').hide();
      $('.business .boxInner .text:eq('+businessind+')').fadeIn();
    
      $('.business .boxInner .business_img img').hide();
      $('.business .boxInner .business_img img:eq('+businessind+')').fadeIn();

  });
});


  // esg
  let barSize = 33.33;
  let barTotal = 33.33;
  let movesize3 = 220;  //li의 너비
  let position3 = 0;
  let newCnt = 0;
  let startX, endX;
  const esgSec = document.querySelector('.esg');
  const esgMove = document.querySelector('.esg ul');
  const scrollBarBlue = document.querySelector('.scrollBar span');

  function touchesgStart(e){
    if(e.pageX==undefined){  //모바일이면...
      startX = e.touches[0].pageX ;
    }else{  //데스크탑이면..
      e.preventDefault();
      startX =  e.pageX;
    }
  };
  function touchesgEnd(e){
    if(e.pageX==undefined){
      endX = e.changedTouches[0].pageX;
    }else{
      endX = e.pageX;
    }

    if(startX > endX){
      newCnt++;

      if(newCnt >= 3){
        newCnt = newCnt - 1;
        esgMove.style.left = '60px';
      } else {
        position3 += -movesize3;
        esgMove.style.left = position3+'px';

        barTotal += barSize;
        scrollBarBlue.style.width = `${barTotal}%`;
        scrollBarBlue.style.transition = 'width .3s';
      }
    } else {
      newCnt--;

      if(newCnt < 0){
        newCnt = 0;
        esgMove.style.left = 0;
      } else {
        position3 -= -movesize3;
        esgMove.style.left = position3+'px';

        barTotal -= barSize;
        scrollBarBlue.style.width = `${barTotal}%`;
        scrollBarBlue.style.transition = 'width .3s';
      }
    }
  };
  esgSec.addEventListener('touchstart', touchesgStart);
  esgSec.addEventListener('touchend', touchesgEnd);
  esgSec.addEventListener('mousedown', touchesgStart);
  esgSec.addEventListener('mouseup', touchesgEnd);