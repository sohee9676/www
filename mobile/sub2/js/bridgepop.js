$.ajax({
    url:'./js/bridgejason.json',
    dataType:'json',
    success:function(data){
      var bridge = data.memo2;
      var ind = 0; 
      var txt = '';
      function popchange(ind){
        txt='';
        txt+= '<img src="../images/bridge0'+(ind+1)+'x2.png" alt="'+bridge[ind].title+'" width="100%">'
        txt+= '<dl>';
        txt+= '<dt>'+bridge[ind].title+'</dt>';
        txt+= '<dd>공사기간 : '+bridge[ind].date+'</dd>';
        txt+= '<dd>공사위치 : '+bridge[ind].site+'</dd>';
        txt+= '<dd>발 주 처 : '+bridge[ind].company+'</dd>';
        txt+= '</dl>';
  
      $('.pop2 .popup .txt').html(txt);
  
      };
  
      // click
      $('.pop2 ul li').click(function(e){
          e.preventDefault();
  
          ind=$(this).index('.pop2 ul li');
  
          $('.pop2 .modal_box').fadeIn('fast');
          $('.pop2 .popup').fadeIn('fast');
        
          popchange(ind);
  
        })
  
      $('.close_btn,.pop2 .modal_box').click(function(e){
          e.preventDefault();
  
          $('.pop2 .modal_box').fadeOut('fast');
          $('.pop2 .popup').fadeOut('fast');
    });
  
  }
  
  });
  