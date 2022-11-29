<? 
	session_start(); 

	//새글쓰기 = $table='news'만 넘김

	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION); 
	
	include "../lib/dbconn.php";

	//modify 같이 넘어오면 수정글쓰기...
	//$table='news' , $num=1 , $mode='modify'
	if ($mode=="modify")
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>홍보센터-보도자료</title>
	<link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../common/css/sub_common.css">
	<link rel="stylesheet" href="../sub4/common/css/sub4common.css">
	<link rel="stylesheet" href="./css/write_form.css">


	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://kit.fontawesome.com/e960e8ad99.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
	<script>
	function check_input()
	{
		if (!document.board_form.subject.value)
		{
			alert("제목을 입력하세요!");    
			document.board_form.subject.focus();
			return false;
		}

		if (!document.board_form.content.value)
		{
			alert("내용을 입력하세요!");    
			document.board_form.content.focus();
			return false;
		}
		document.board_form.submit();
	}
	</script>
</head>

<body>

	<div id="skipNav">
			<a href="#content">본문바로가기</a>
			<a href="#gnb">글로벌네비게이션바로가기</a>
		</div>
		<? include "../common/sub_header.html" ?>
		<div class="main">
			<img src="../sub4/common/images/sub4_main.jpg" alt="서브4메인이미지">
			<h3>홍보센터</h3>
		</div>
		
		<div class="subNav">
			<ul>
				<li><a class="current" href="../news/list.php">보도자료</a></li>
				<li><a href="../sub4/sub4_2.html">홍보영상</a></li>
			</ul>
		</div>
	<article id="content">
			<div class="titleArea">
				<div class="lineMap">
						<span> <i class="fa-solid fa-house"></i> </span>&gt;
						<span> 홍보센터 </span>&gt;
						<strong> 보도자료 </strong>
				</div>
					<h2>보도자료</h2>
					<p>We always share dongah's news and stories</p>
					<p>SM동아건설의 소식을 빠르게 전달합니다.</p>
			</div>

		<div class="contentArea">

		<?
			if($mode=="modify")
			{

		?>
				<form name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
		<?
			}
			else
			{
		?>
			<form name="board_form" method="post" action="insert.php?page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
		<?
			}
		?>
				<div class="write_content">
					<div id="write_form">
							<dl class="user_info">
								<dt> 닉네임 </dt>
								<dd> <?=$usernick?> </dd>				
							</dl>

							<dl id="subject">
								<dt>제목</dt>
								<dd><input id="title_box" type="text" name="subject" value="<?=$item_subject?>">
								</dd>
							</dl>

								<dl class="textBox">
									<dt>내용</dt>
									<dd>
									<?
										if( $userid && ($mode!="modify") )
										{
									?>
										<div class="col3">
											<label for="html_ok">html쓰기</label>	
											<input type="checkbox" name="html_ok" value="y">
										</div>
									<?
										}
									?>		
										<textarea id="board_content" rows="15" cols="100" name="content"><?=$item_content?></textarea>
									</dd>
								</dl>

								<div id="img_box" class="box1">
									<div class="col1"> 파일첨부1 </div>
									<div class="col2">
										<input type="file" name="upfile[]">
									</div>
							
										<? 	if ($mode=="modify" && $item_file_0)
											{
										?>
									<div class="delete_ok">
										<?=$item_file_0?> 파일이 등록되어 있습니다. 
										<input type="checkbox" name="del_file[]" value="0"> 삭제
									</div>
									<div class="clear"></div>
										<?
											}
										?>
								</div>

								<div id="img_box" class="box2">
										<div class="col1"> 파일첨부2  </div>
										<div class="col2">
											<input type="file" name="upfile[]">
										</div>
								

								<? 	if ($mode=="modify" && $item_file_1)
									{
								?>
									<div class="delete_ok">
										<?=$item_file_1?> 파일이 등록되어 있습니다. 
										<input type="checkbox" name="del_file[]" value="1"> 삭제
									</div>
									<div class="clear"></div>
								<?
									}
								?>
								</div>

								<div id="img_box" class="box3">
										<div class="col1"> 파일첨부3 </div>
										<div class="col2"><input type="file" name="upfile[]">
										</div>
									
									<? 	if ($mode=="modify" && $item_file_2)
										{
									?>
										<div class="delete_ok">
											<?=$item_file_2?> 파일이 등록되어 있습니다. 
											<input type="checkbox" name="del_file[]" value="2"> 삭제
										</div>
									<?
										}
									?>
								</div>


					</div>
					<div id="write_button">
							<a href="list.php?page=<?=$page?>">취소</a>
							<input class="compalte" type="submit" value="완료" onclick="list.php?table=<?=$table?>&page=<?=$page?>">
					</div>
				</div>
			</form>
		</div>
	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</article> <!-- end of wrap -->

</body>
</html>
