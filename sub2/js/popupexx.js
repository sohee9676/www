$(document).ready(function(){
  //객체배열(json) - 건축사업
  var memo = [
        {title:'태백장성 동아 like 10', date:'2018. 04. 27 ~', site:'강원도 태백시 장성동 167-15', company:'시행/시공 : 동아건설산업'},
        {title:'오송역 동아 like 10', date:'2017. 06 ~', site:'청주시 흥덕구 오송 바이오폴리스지구 B6BL', company:'대한해운주식회사'},
        {title:'동해 효가 동아 The PRIME', date:'2010.12 ~ 2013.03', site:'강원도 동해시 효가동 371-1번지 일원 신축사업', company:'㈜한국토지신탁, 비이컴즈㈜'},
        {title:'광주전남혁신도시 B2블럭 아파트 건설공사', date:'2011. 12 ~ 2014. 04', site:'전남 나주시 금천면, 산포면 일원 혁신도시 내', company:'	한국토지주택공사'},
      ];
    
      var txt = '';
      var ind = $(this).index('.pop ul li');  // 0 1 2 3 4 5 

  $('#construction .pop ul li').click(function(e){
      e.preventDefault();
     
      $('.pop_btn').fadeIn('slow');

      $('.pop .modal_box').fadeIn('fast');
      $('.pop .popup').fadeIn('slow');
      $('.pop .popup img').attr('src','./images/civil00'+(ind+1)+'.jpg'); //이미지 바꾸기
      
      txt+= '<dl>';
      txt+= '<dt><span>공 사 명</sapn>:'+memo[ind].title+'</dt>';
      txt+= '<dd><span>공사기간</span>:'+memo[ind].date+'</dd>';
      txt+= '<dd><span>공사위치</span>:'+memo[ind].site+'</dd>';
      txt+= '<dd><span>발 주 처</span>:'+memo[ind].company+'</dd>';
      txt+= '</dl>';
      
      $('.pop .txt').html(txt);

    $('.close_btn,.pop .modal_box').click(function(e){
        e.preventDefault();
        $('.pop .modal_box').fadeOut('fast');
        $('.pop .popup').fadeOut('fast');
        $('.pop_btn').fadeOut('fast');
    });


    $('.pop_btn a').click(function(e){
         e.preventDefault();

         $('.pop .popup').hide().fadeIn('slow'); 

        if($(this).hasClass('pre')){ // 3 2 1 0 3 2 1 0
            if(ind==0)ind=memo.length; //여기서는 length=4
            ind--; //하나씩 감소
            popchange();
        }else if($(this).hasClass('next')){  // 0 1 2 3 0 1 2 3
            if(ind==memo.length-1)ind=-1;
            ind++;
            popchange();
        }

    });
  });
});



// $(document).ready(function(){
//   //객체배열(json)
//   var memo2 = [
//         {title:'태백장성 동아 like 10', date:'2018. 04. 27 ~', site:'강원도 태백시 장성동 167-15', company:'시행/시공 : 동아건설산업'},
//         {title:'오송역 동아 like 10', date:'2017. 06 ~', site:'청주시 흥덕구 오송 바이오폴리스지구 B6BL', company:'대한해운주식회사'},
//         {title:'동해 효가 동아 The PRIME', date:'2010.12 ~ 2013.03', site:'강원도 동해시 효가동 371-1번지 일원 신축사업', company:'㈜한국토지신탁, 비이컴즈㈜'},
//         {title:'광주전남혁신도시 B2블럭 아파트 건설공사', date:'2011. 12 ~ 2014. 04', site:'전남 나주시 금천면, 산포면 일원 혁신도시 내', company:'	한국토지주택공사'},
//       ];
    
 
//   $('.pop .pop_menu a').click(function(e){
//       e.preventDefault();
//       var txt2 ='';
//       var ind2 = $(this).index('.pop .pop_menu a');  // 0 1 2 3

//       $('.pop .modal_box').fadeIn('fast');
//       $('.pop .popup').fadeIn('slow');

//       $('.pop .popup img').attr('src','./images/big'+(ind+1)+'.jpg'); //이미지 바꾸기
      
//       txt+= '<dl>';
//       txt+= '<dt>공 사 명 : '+memo2[ind2].title+'</dt>';
//       txt+= '<dd>공사기간: '+memo2[ind2].date+'</dd>';
//       txt+= '<dd>공사위치 : '+memo2[ind2].site+'</dd>';
//       txt+= '<dd>발 주 처 : '+memo2[ind2].company+'</dd>';
//       txt+= '</dl>';
      
//       $('.pop .popup .txt').html(txt);

//   });

//   $('.close_btn,.pop .modal_box').click(function(e){
//       e.preventDefault();
//       $('.pop .modal_box').hide();
//       $('.pop .popup').hide();
//   });
// });