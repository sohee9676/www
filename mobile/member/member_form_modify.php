<?
    session_start();

    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="ko">
<head> 
<meta charset="utf-8">
<title>회원정보수정</title>
<link rel="stylesheet" href="../common/css/common.css">
<link rel="stylesheet" href="css/member_form.css">

<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return false;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
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

      return false;
   }
</script>
</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $hp = explode("-", $row[hp]);
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>

    <header>
        <h1><span class="hidden">SM동아건설산업 로고</span><a class="logo" href="../index.html"></a></h1>
    </header>  

<div id="wrap">
 
  <div id="content">
    
  <h2 class="long">회원정보수정</h2>
  
	<div id="col2">
        <form  name="member_form" method="post" action="modify.php"> 

        <table>
          <caption class="hidden">회원정보수정</caption>
            <tr>
                <th scope="col" class="lock"><label for="id">아이디</label></th>
                <td class="lock"> <span><?= $row[id] ?></span></td>
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
                    <input type="text" name="name" id="name" value="<?= $row[name] ?>" required > 
                </td>
            </tr>
            <tr>
                <th scope="col"><label for="nick">닉네임</label></th>
                <td>
                    <input type="text" name="nick" id="nick" value="<?= $row[nick] ?>" required >
                    <span id="loadtext2"></span>
                </td>
            </tr>
            <tr>
                <th scope="col">휴대폰</th>
                <td>
                    <label class="hidden" for="hp1">전화번호 앞 3자리</label>
                    <select class="hp" name="hp1" id="hp1"> 
                        <option value='010' <? if ($hp1=='010') echo 'selected' ?> >010</option>
                        <option value='011' <? if ($hp1=='011') echo 'selected' ?> >011</option>
                        <option value='016' <? if ($hp1=='016') echo 'selected' ?> >016</option>
                        <option value='017' <? if ($hp1=='017') echo 'selected' ?> >017</option>
                        <option value='018' <? if ($hp1=='018') echo 'selected' ?> >018</option>
                        <option value='019' <? if ($hp1=='019') echo 'selected' ?> >019</option>
                - <input type="text" class="hp" name="hp2" id="hp2" value="<?= $hp2 ?>"> - <input type="text" class="hp" name="hp3" id="hp3" value="<?= $hp3 ?>">

                </select>   

                </td>
            </tr>
            <tr>
                <th scope="col">이메일</th>
                <td>
                    <label class="hidden" for="email1">이메일아이디</label>

                    <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> @ <input type="text" name="email2" value="<?= $email2 ?>">
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
	</div>
  </div>
</div>

</body>
</html>
