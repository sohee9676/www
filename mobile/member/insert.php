<meta charset="utf-8">
<?

  @extract($_POST);
  /* 
  id
  pass
  name
  nick
  hp1, hp2, hp3
  email, email2
  */

   $hp = $hp1."-".$hp2."-".$hp3; // 010-0000-0000
   $email = $email1."@".$email2; // abc@naver.com

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $ip = $REMOTE_ADDR;         // 방문자의 IP 주소를 저장(여기에서는 사용하지 않았음!)

   include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

   $sql = "select * from member where id='$id'";
   $result = mysql_query($sql, $connect);
   $exist_id = mysql_num_rows($result);

   if($exist_id) {
     echo("
           <script>
             window.alert('해당 아이디가 존재합니다.')
             history.go(-1)
           </script>
         ");
         exit;
   }
   else
   {            // 레코드 삽입 명령을 $sql에 입력
	    $sql = "insert into member(id, pass, name, nick, hp, email, regist_day, level) ";
		  $sql .= "values('$id', password('$pass'), '$name', '$nick', '$hp', '$email', '$regist_day', 9)"; //게시글 접근 권한에 사용

		mysql_query($sql, $connect);  // $sql 에 저장된 명령 실행
   }

   mysql_close();                // DB 연결 끊기
   echo "
	   <script>
     alert('환영합니다! 회원가입 처리가 완료되었습니다.');
	    location.href = '../index.html'; 
	   </script>
	";
?>

   
