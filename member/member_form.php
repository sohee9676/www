<? 
	session_start(); 
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="css/member_form.css">
		
    <script src="./js/jquery-1.12.4.min.js"></script>
    <script src="./js/jquery-migrate-1.4.1.min.js"></script>
    <script src="./js/member_check.js"></script>
	
	<script>
	 $(document).ready(function() {
  
        //id 중복검사
        $("#id").keyup(function() {    // id입력 상자에 id값 입력시
            var id = $('#id').val(); //aaa

            $.ajax({
                type: "POST",
                url: "check_id.php",
                data: "id="+ id,  
                cache: false, 
                success: function(data)
                {
                    $("#loadtext").html(data);
                }
            });
        });
                
        //nick 중복검사		 
        $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
            var nick = $('#nick').val();

            $.ajax({
                type: "POST",
                url: "check_nick.php",
                data: "nick="+ nick,  
                cache: false, 
                success: function(data)
                {
                    $("#loadtext2").html(data);
                }
            });
        });		 

    });
	
	</script>

	<script>

    function check_input()
    {
        if (!document.member_form.id.value)
        {
            alert("아이디를 입력하세요");    
            document.member_form.id.focus();
            return false;
        }

        if (!document.member_form.pass.value)
        {
            alert("비밀번호를 입력하세요");    
            document.member_form.pass.focus();
            return false;
        }

        if (!document.member_form.pass_confirm.value)
        {
            alert("비밀번호 확인을 입력하세요");    
            document.member_form.pass_confirm.focus();
            return false;
        }

        if (!document.member_form.name.value)
        {
            alert("이름을 입력하세요");    
            document.member_form.name.focus();
            return false;
        }

        if (!document.member_form.nick.value)
        {
            alert("닉네임을 입력하세요");    
            document.member_form.nick.focus();
            return false;
        }


        if (!document.member_form.hp2.value || !document.member_form.hp3.value )
        {
            alert("휴대폰 번호를 입력하세요");    
            document.member_form.nick.focus();
            return false;
        }

        if (document.member_form.pass.value != 
                document.member_form.pass_confirm.value)
        {
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
            document.member_form.pass.focus();
            document.member_form.pass.select();
            return false;
        }

        document.member_form.submit(); 
            // insert.php 로 변수 전송
    }

    function reset_form()
    {
        document.member_form.id.value = "";
        document.member_form.pass.value = "";
        document.member_form.pass_confirm.value = "";
        document.member_form.name.value = "";
        document.member_form.nick.value = "";
        document.member_form.hp1.value = "010";
        document.member_form.hp2.value = "";
        document.member_form.hp3.value = "";
        document.member_form.email1.value = "";
        document.member_form.email2.value = "";
        
        document.member_form.id.focus();

        return;
    }
    </script>
        
</head>
<body>

    <header>
        <h1><span class="hidden">SM동아건설산업 로고</span><a class="logo" href="../index.html"></a></h1>
    </header>  
	 
	<article id="content">  
	  
	  <h2>회원가입</h2>
	  <form  name="member_form" method="post" action="insert.php"> 
		
     <table>
      <caption class="hidden">회원가입</caption>
     	<tr>
     		<th scope="col"><label for="id">아이디</label></th>
     		<td>
     			 <input type="text" name="id" id="id" placeholder="아이디를 입력하세요" required >
			     <span id="loadtext"></span>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass">비밀번호</label></th>
     		<td>
     			 <input type="password" name="pass" id="pass" placeholder="비밀번호를 입력하세요"  required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass_confirm">비밀번호 확인</label></th>
     		<td>
     			<input type="password" name="pass_confirm" id="pass_confirm" placeholder="비밀번호를 입력하세요" required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="name">이름</label></th>
     		<td>
     			<input type="text" name="name" id="name" placeholder="이름을 입력하세요"  required> 
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="nick">닉네임</label></th>
     		<td>
     			 <input type="text" name="nick" id="nick" placeholder="닉네임을 입력하세요" required>
			     <span id="loadtext2"></span>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col">휴대폰</th>
     		<td>
     			<label class="hidden" for="hp1">전화번호 앞 3자리</label>
     			<select class="hp" name="hp1" id="hp1"> 
              <option value='010'>010</option>
              <option value='011'>011</option>
              <option value='016'>016</option>
              <option value='017'>017</option>
              <option value='018'>018</option>
              <option value='019'>019</option>
          </select>  - 
          <label class="hidden" for="hp2">전화번호 중간 4자리</label><input type="text" class="hp" name="hp2" id="hp2" maxlength="4" placeholder="ex) 0000" required> - <label class="hidden" for="hp3">전화번호 끝 4자리</label><input type="text" class="hp" name="hp3" id="hp3" maxlength="4" placeholder="ex) 0000" required>
     			
     		</td>
     	</tr>
     	<tr>
     		<th scope="col">이메일</th>
     		<td>
     		  <label class="hidden" for="email1">이메일아이디</label>
     			<input type="text" id="email1" name="email1" placeholder="abc123" required> @ 
     			<label class="hidden" for="email2">이메일주소</label>
     			<input type="text" name="email2" id="email2" placeholder="naver.com" required>
     		</td>
     	</tr>
     	<tr>
     		<td class="last" colspan="2">
     			<a href="#">
                    <button class="ok" type="button" onclick="check_input()"><span>확인</span>
                </a>&nbsp;&nbsp;
				 <a href="#">
                    <button class="cancel" type="button" onclick="reset_form()"><span>취소</span>
                </a>
     		</td>
     	</tr>
     </table>

	 </form>
	  
	</article>

</body>
</html>



