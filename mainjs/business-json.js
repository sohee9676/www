

$(function(){
  var i = 0;    //배열 인덱스 번호 잡기위함 (클릭이벤트에서도 사용하니까 전역변수로)
  var useData=[];

  function dataPrint(){
   $.ajax({
       method: 'get',
       url: './business.json',
       dataType: 'json',
       success: function(data){
            useData = data.sam;
            var img = '<div>';

            var $img = useData[i].img;   
            txt+='<img src="'+$img+'.jpg">'
            
            img += '</div>';
           
            var txt = '<ul>';
            
            var $title = useData[i].title;
            var $text = useData[i].text;
            var $link = useData[i].link;

            txt+='<li>';
            txt+='<h4>'+$title+'</h4>';
            txt+='<p>'+$text+'</p>'; 
            txt+='<dd>'+$link+'</dd>';
            txt +='</li>';
            
            txt += '</ul>';

            $('.boxInner').html(img).html(txt).hide().stop().fadeIn('fast');
       } 
   });
};
           
dataPrint();//초기실행, 함수호출

$('.bussiness a').click(function(e){
    e.preventDefault();

    if($(this).hasClass('left_btn')){
       if(i==0)i=useData.length; 
       i--;
       dataPrint();
    }else if($(this).hasClass('right_btn')){
       if(i==useData.length-1)i=-1;
       i++;
       dataPrint();
    }
    
});
    
});