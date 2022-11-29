$.ajax({
  url: './js/popjason.json',
  dataType : 'json',
  success : function(data){
      var trailer = data.trailer;
      var ind = 0;  
          
      function popchange(i){

          var txt = `<div class="youtube_box">
                      <div>
                        <iframe src="${trailer[i].url}" title="Tangled trailer" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    </div>
                  <dl><dt>${trailer[i].title}</dt>
                  <dd> ${trailer[i].text}</dd></dl>`
          $('.sub_popup .txt').html(txt);
      };

      // popup-youtube
      $('.subPop .subPop_menu li a').click(function(e){
          e.preventDefault();
          
          ind = $(this).index('.subPop .subPop_menu li a');  // 0 1 2 3
          console.log(ind);

          $('.subPop .modal_box').fadeIn('fast');
          $('.subPop .sub_popup').fadeIn('slow');
          $('.subPop .sub_popup').css('display','flex');
    
          popchange(ind);
    
      });
     // popClose
      $('.close_btn,.subPop_menu .modal_box').click(function(e){
          e.preventDefault();
          $('.subPop .modal_box').fadeOut('fast');
          $('.subPop .sub_popup').hide('fast',function(){
              $('.sub_popup .txt').html('');
          });
      });
  }
});



    // songs
    var trailerSongs;
    $.ajax({
        url:'./js/trailer.json',
        dataType: 'json',
        success: function(data){
            music = data.music;

            $('.music_list li a').click(function(e){
                e.preventDefault();

                var ind = $(this).index('.music_lst li a');

                $('.music .youtube iframe').attr('src', music[ind].url);
                $('.music .youtube_wrap p').html(music[ind].title);
                $('.music .youtube_wrap span:eq(1)').html(music[ind].text);

            });
        }
        
    });