// var activeCont = '';
// var tabList = document.querySelectorAll('.sub2_tab ul li');
// var contents = document.querySelectorAll('.gall>div');
// tabList[0].querySelector('.btn').classList.add('current');
// contents[0].style.display = 'block';  

// for(var i = 0; i < tabList.length; i++){
//    tabList[i].querySelector('.btn').addEventListener('click', function(e){
//       e.preventDefault();
      
//        for(var j = 0; j < tabList.length; j++){
//             // 나머지 버튼 클래스 제거
//            tabList[j].querySelector('.btn').classList.remove('current');
//            // 나머지 컨텐츠 display:none 처리
//            contents[j].style.display = 'none';
//        }

//      // 버튼 관련 이벤트
//      this.classList.add('current');  
//      activeCont = this.getAttribute('href');
//      document.querySelector(activeCont).style.display = 'block';
//    });
// }

// JavaScript Document
var cnt=$('.sub2_tab ul li').size();  //탭메뉴 개수 ***
$('.gall>div').hide(); //모든 탭내용을 안보이게...
$('.gall>div:eq(0)').fadeIn(); // 첫번째 탭 내용만 열어라
$('.sub2_tab li:eq(0)').css('background','#bd0202');
$('.sub2_tab li:eq(0)').css('color','#fff');//첫번째 탭메뉴 활성화
   
   //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***

$('.sub2_tab ul li a').click(function(e){
   e.preventDefault();   // <a> href="#" 값을 강제로 막는다  
   
   var ind = $(this).index('.sub2_tab ul li a');  // 클릭시 해당 index를 뽑아준다
   //console.log(ind);

   $('.gall>div').hide(); //모든 탭내용을 안보이게...
   $('.gall>div:eq('+ind+')').fadeIn(); //클릭한 해당 탭내용만 보여라


   $('.sub2_tab .btn').css('background','#fff');
   $('.sub2_tab .btn').css('color','#666');//모든 탭메뉴를 비활성화
   $('.sub2_tab ul li:eq('+ind+')').css('background','#bd0202');
   $('.sub2_tab ul li:eq('+ind+') a').css('color','#fff');
   
   if(ind==1){
       $('.sub2_tab').css('background','url(./images/content2/background02.jpg) 0 0 no-repeat');
   }else{
       $('.sub2_tab').css('background','url(./images/content2/background01.jpg) 0 0 no-repeat');
   }

})