// $(document).ready(function(){
//     $('.video_content li:eq(0)').fadeIn();

//     $('.video ul li a').click(function(e){
//         e.preventDefault();
//         var ind = $(this).index('.video li a');
//         //console.log(ind);

//         $('.video_content').attr('src','./images/sm'+(ind+1)+'.jpg').attr(title);
//         $('.video_content').hide().fadeIn('fast');

//         $('.video_content li a').
//         $(this).css('border','3px solid rgba(255,0,0,1)').children().css('filter','grayscal(100%)')
//     });
// });

$('.video li a:eq(0)').click(function (e) {
    e.preventDefault();
    $('.video_content iframe').attr('src','https://www.youtube.com/embed/QyG27OHYzew').attr('title','');
  });
  
  $('.video li a:eq(1)').click(function (e) {
    e.preventDefault();
    $('.video_content iframe').attr('src','https://www.youtube.com/embed/Ylty6l-Izmg').attr('title','');
  });
  
  $('.video li a:eq(2)').click(function (e) {
    e.preventDefault();
    $('.video_content iframe').attr('src','https://www.youtube.com/embed/meypdKYFxSQ').attr('title','');
  });
  
  $('.video li a:eq(3)').click(function (e) {
    e.preventDefault();
    $('.video_content iframe').attr('src','https://www.youtube.com/embed/gvnV2-f64nQ').attr('title','');
  });

