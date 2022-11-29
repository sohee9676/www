<?
	session_start();
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);


    if(!$userid) //세션변수
	{
?>
          <a href="./login/login_form.php">로그인</a>
		  <a href="./member/member_form.php">회원가입</a>
<?
	}
	else
	{
?>
		<a href="./login/logout.php">로그아웃</a>
		<a href="./login/member_form_modify.php">정보수정</a>
<?
	}
?>
	 </div>
