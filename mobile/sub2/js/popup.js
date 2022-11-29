$.ajax({
  url:'./js/popjason.json',
  dataType:'json',
  success:function(data){
    var result = data.memo;
    var ind = 0; 
    var txt = '';
    function popchange(ind){
      txt='';
      txt+='<img src="../images/result0'+(ind+1)+'x2.png" alt="'+result[ind].title+'">'
      txt+= '<dl>';
      txt+= '<dt>'+result[ind].title+'</dt>';
      txt+= '<dd>기 간 : '+result[ind].date+'</dd>';
      txt+= '<dd>위 치 : '+result[ind].site+'</dd>';
      txt+= '<dd>발주처 : '+result[ind].company+'</dd>';
      txt+= '</dl>';

    $('.pop .popup .txt').html(txt);

    };

    // click
    $('.pop ul li a').click(function(e){
        e.preventDefault();

        ind=$(this).index('.pop ul li a');

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
       if(ind==0)ind=result.length; 
       ind--;
       popchange(ind);
    }else if($(this).hasClass('next')){
       if(ind==result.length-1)ind=-1;
       ind++;
       popchange(ind);
    };
  });
}

});

