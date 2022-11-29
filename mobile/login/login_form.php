<? session_start(); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
    <link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="../../common/css/common.css">
    <script src="https://kit.fontawesome.com/e960e8ad99.js" crossorigin="anonymous"></script>
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
</head>

<body>

    <header>
       <h1><a class="logo" href="../index.html"><span class="hidden">sm동아건설산업</span><i class="fa-solid fa-house"></i></a></h1>
    </header>  
    
    <div class="wrap">
        <div id="content">
            <h3>LOGIN</h3>
            <form name="member_form" method="post" action="login.php"> 

                <div id="id_pw_input">
                    <ul>
                        <li><input type="text" name="id" class="login_input" placeholder="아이디를 입력하세요" required></li>
                        <li><input type="password" name="pass" class="login_input" placeholder="비밀번호를 입력하세요" required></li>
                    </ul>						
                </div>
                <div id="login_button">
                    <button type="submit">로그인</button>
                </div>

                <ul class="find">
                    <li>
                        <span><a href="id_find.php">아이디 찾기</a></span>
                        <span><a href="pw_find.php">비밀번호 찾기</a></span>
                    </li>
                </ul>

                <div id="join_button">
                    <a href="../member/join.html"><strong>아직 회원이 아니신가요?</strong><span>회원가입</span></a>
                </div>


            </form>
        <div>
    </div>


</body>
</html>