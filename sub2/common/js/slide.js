var activeCont = '';
var tabList = document.querySelectorAll('.sub2_tab ul li');
var contents = document.querySelectorAll('.gall>div');
tabList[0].querySelector('.btn').classList.add('current');
contents[0].style.display = 'block';  

for(var i = 0; i < tabList.length; i++){
   tabList[i].querySelector('.btn').addEventListener('click', function(e){
      e.preventDefault();
      
       for(var j = 0; j < tabList.length; j++){
            // 나머지 버튼 클래스 제거
           tabList[j].querySelector('.btn').classList.remove('current');
           // 나머지 컨텐츠 display:none 처리
           contents[j].style.display = 'none';
       }

     // 버튼 관련 이벤트
     this.classList.add('current');  
     activeCont = this.getAttribute('href');
     document.querySelector(activeCont).style.display = 'block';
   });
}
