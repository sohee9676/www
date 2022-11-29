

// JavaScript Document
var cnt=$('.tab ul li a').size();  //탭메뉴 개수 ***
// $('.historyAll div').hide(); //모든 탭내용을 안보이게...
$('.historyAll div:eq(0)').fadeIn(); // 첫번째 탭 내용만 열어라
$('.tab ul li a:eq(0)').addClass('current');
   
   //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***

$('.tab ul li a').click(function(e){
   e.preventDefault();   // <a> href="#" 값을 강제로 막는다  
   
   var ind = $(this).index('.tab ul li a');  // 클릭시 해당 index를 뽑아준다
   //console.log(ind);

     $('.tab ul li a').removeClass('current');
     $('.tab ul li a:eq('+ind+')').addClass('current');

   //   $('.historyAll div').hide(); //모든 탭내용을 안보이게...
   //   $('.historyAll div:eq('+ind+')').fadeIn(); // 첫번째 탭 내용만 열어라

})


// tab

// var cnt=$('.tab ul li a').size();  //탭메뉴 개수 ***
// $('.historyAll div').hide(); //모든 탭내용을 안보이게...
// $('.historyAll div:eq(0)').fadeIn(); // 첫번째 탭 내용만 열어라
// $('.tab ul li a:eq(0)').addClass('current');
   
//자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***

// $('.tab ul li a').click(function(e){
//    e.preventDefault();   // <a> href="#" 값을 강제로 막는다  
   
//    var ind = $(this).index('.tab ul li a');  // 클릭시 해당 index를 뽑아준다
//    //console.log(ind);

//      $('.tab ul li a').removeClass('current');
//      $('.tab ul li a:eq('+ind+')').addClass('current');

//      $('.historyAll div').hide(); //모든 탭내용을 안보이게...
//      $('.historyAll div:eq('+ind+')').fadeIn(); // 첫번째 탭 내용만 열어라

// })


