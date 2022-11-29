$.ajax({
    url:'./js/civiljason.json',
    dataType:'json',
    success:function(data){
      var civil = data.memo;
      var ind = 0; 
      var txt = '';
      function popchange(ind){
        txt='';
        txt+= '<img src="../images/civil0'+(ind+1)+'x2.png" alt="'+civil[ind].title+'" width="100%">'
        txt+= '<dl>';
        txt+= '<dt>'+civil[ind].title+'</dt>';
        txt+= '<dd>공사기간 : '+civil[ind].date+'</dd>';
        txt+= '<dd>공사위치 : '+civil[ind].site+'</dd>';
        txt+= '<dd>발 주 처 : '+civil[ind].company+'</dd>';
        txt+= '</dl>';
  
      $('.pop .popup .txt').html(txt);
  
      };
  
      // click
      $('.pop ul li').click(function(e){
          e.preventDefault();
  
          ind=$(this).index('.pop ul li');
  
          $('.pop_btn').fadeIn('fast');
          $('.pop .modal_box').fadeIn('fast');
          $('.pop .popup').fadeIn('fast');
        
          popchange(ind);
  
        })
  
      $('.close_btn,.pop .modal_box').click(function(e){
          e.preventDefault();
  
          $('.pop_btn').fadeOut('fast');
          $('.pop .modal_box').fadeOut('fast');
          $('.pop .popup').fadeOut('fast');
    });
  
  
  $('.pop_btn a').click(function(e){
      e.preventDefault();
  
      if($(this).hasClass('pre')){
         if(ind==0)ind=civil.length; 
         ind--;
         popchange(ind);
      }else if($(this).hasClass('next')){
         if(ind==civil.length-1)ind=-1;
         ind++;
         popchange(ind);
      };
    });
  }
  
  });
  