<? 
	session_start();

	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION); 
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>고객지원-공지사항</title>
	<link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../common/css/sub_common.css">
    <link rel="stylesheet" href="../sub6/common/css/sub6common.css">
	<link rel="stylesheet" href="./css/write_form.css">

	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://kit.fontawesome.com/e960e8ad99.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
</head>
<body>
	<div id="skipNav">
		<a href="#content">본문바로가기</a>
		<a href="#gnb">글로벌네비게이션바로가기</a>
	</div>
    <? include "../common/sub_header.html" ?>
	<div class="main">
          <img src="../sub6/common/images/main000_01.jpg" alt="서브6이미지">
          <h3>고객지원</h3>
      </div>
      
      <div class="subNav">
          <ul>
              <li><a class="current" href="../notice/list.php">공지사항</a></li>
              <li><a href="../sub6/sub6_2.html">FAQ</a></li>
          </ul>
      </div>
	<article id="content">
        <div class="titleArea">
            <div class="lineMap">
                    <span> <i class="fa-solid fa-house"></i> </span>&gt;
                    <span> 고객지원 </span>&gt;
                    <strong> 공지사항 </strong>
            </div>
                <h2>공지사항</h2>
                <p>We always share dongah's news and stories</p>
                <p>SM동아건설산업은 한계를 뛰어넘어 세계로 도약합니다.</p>
        </div>
		<div class="contentArea">

				<div class="write_content">
					<form  name="board_form" method="post" action="insert.php"> 
						<div id="write_form">
							<dl class="user_info">
								<dt>닉네임</dt>
								<dd> <?=$usernick?> </dd>
							</dl>
							<dl>
								<dt>제목</dt>
								<dd><input id="title_box" type="text" name="subject" placeholder="게시글의 제목을 입력해주세요"></dd>
							</dl>
							<dl class="textBox">
							<dt>내용</dt>
							<dd>
								<div>
									<label for="html_ok">html쓰기</label>
									<input type="checkbox" name="html_ok" id="html_ok" value="y">
								</div>
								<textarea id="board_content" rows="15" cols="79" name="content"></textarea>
							</dd>
							</dl>
						</div>
						<div id="write_button">
							<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">취소</a>
							<!-- <button class="compalte" type="button" onclick="list.php?page=<?=$page?>&scale=<?=$scale?>">완료</button> -->
							<input class="compalte" type="submit" value="완료" onclick="list.php?page=<?=$page?>&scale=<?=$scale?>">

						</div>
					</form>
				</div>
		</div>
	</article>
	
<? include "../common/sub_footer.html" ?>   
</body>
</html>