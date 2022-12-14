<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>SM동아건설산업-아이디찾기</title>
<link rel="stylesheet" href="css/member1.css">
<link rel="stylesheet" href="../common/css/common.css">
<script src="https://kit.fontawesome.com/e960e8ad99.js" crossorigin="anonymous"></script>
<script src="../common/js/jquery-1.12.4.min.js"></script>
<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
<script>
	$(document).ready(function() {

         $(".find").click(function() {    // id입력 상자에 id값 입력시
            var name = $('#name').val(); //홍길동
            var hp1 = $('#hp1').val(); //010
            var hp2 = $('#hp2').val(); //1111
            var hp3 = $('#hp3').val(); //2222

            $.ajax({
                type: "POST",
                url: "find.php", 
                data: "name="+ name+ "&hp1="+hp1+ "&hp2="+hp2+ "&hp3="+hp3,  /*매개변수id도 같이 넘겨줌*/
                cache: false, 
                success: function(data) /*이 메소드가 완료되면 data라는 변수 안에 echo문이 들어감*/
                {
                     $("#loadtext").html(data); /*span안에 있는 태그를 사용할것이기 때문에 html 함수사용*/
                }
            });
             
            $("#loadtext").addClass('loadtexton'); // css 변경
        }); 

    });
</script>
</head>

<body>

    <header>
       <h1><span class="hidden">SM동아건설산업</span><a class="logo" href="../index.html"></a></h1>
    </header>  


    <div id="content">


	<div id="col2">
        <form name="find" method="post" action="find.php"> 
		<div id="title">
			<h2>아이디찾기</h2>
			<p>가입 시 입력하신 정보로 아이디를 찾아드립니다</p>
		</div>
       
		<div id="login_form">
			 <div class="clear"></div>

			 <div id="login2">
				<div id="id_input_button">
					<fieldset>
                        <input type="text" name="name" class="find_input" id="name" placeholder="이름을 입력하세요">
                        <div class="telBox">
                            <label class="hidden" for="hp1">연락처 앞3자리</label>
                            <select name="hp1" id="hp1" title="휴대폰 앞3자리를 선택하세요." class="find_input">
                                <option>010</option>
                                <option>011</option>
                                <option>016</option>
                                <option>017</option>
                                <option>018</option>
                                <option>019</option>
                            </select> - 
                            <label class="hidden" for="hp2">연락처 가운데 3자리</label>
                            <input class="find_input" type="text" id="hp2" name="hp2" title="연락처 가운데3자리를 입력하세요." maxlength="4" placeholder="ex) 1111"> - 
                            <label class="hidden" for="hp3">연락처 마지막 3자리</label>
                            <input class="find_input" type="text" id="hp3" name="hp3" title="연락처 마지막3자리를 입력하세요." maxlength="4" placeholder="ex) 2222">
                        </div>
                        <input type="button" value="아이디찾기" class="find">
                    </fieldset>

                    <span id="loadtext">


                    </span>

                    <ul class="go">
                        <li>
                            <a href="login_form.php">로그인</a>
                            <a href="pw_find.php">비밀번호 찾기</a>
                        </li>
            </ul>

				</div>
				<div class="clear"></div>
				
                <div id="login_line"></div>
                <div id="join_button">
                    <a href="../member/join.html"><span>아직 회원이 아니신가요?</span>회원가입</a>
                </div>
		</div> <!-- end of form_login -->

	    </form>
	</div> <!-- end of col2 -->

</div> <!-- end of wrap -->
</body>
</html>