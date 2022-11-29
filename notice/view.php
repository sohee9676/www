<? 
	session_start(); 
	
	@extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

	include "../lib/dbconn.php";

	$sql = "select * from notice where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기
	
	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];
		
    $item_date    = $row[regist_day];

	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	$new_hit = $item_hit + 1;

	$sql = "update notice set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);

	// $content_before  = $row[num]-1;
	// $content_next  = $row[num]+1;	
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
    <link rel="stylesheet" href="./css/view.css">
	
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://kit.fontawesome.com/e960e8ad99.js" crossorigin="anonymous"></script>
    <script src="../common/js/prefixfree.min.js"></script>
<script>
		function check_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");    
			document.ripple_form.ripple_content.focus();
			return false;
		}
		document.ripple_form.submit();
    }

	
    function del(href) 
    {
        if(confirm("정말 삭제하시겠습니까?\n삭제된 게시글은 복구할 방법이 없습니다.")) {
                document.location.href = href;
        }
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

		<div class="selected_content">
			<div id="view_title">
				<div id="view_title1">
					<?= $item_subject ?>
				</div>
				<ul id="view_title2">
					<li><?= $item_nick ?></li>
					<li><?= $item_date ?></li>
					<li><i class="fa-regular fa-eye"></i> <?= $item_hit ?></li>
				</ul>	
			</div>
			<div id="view_content">
				<?= $item_content ?>
			</div>

			<div id="ripple">
			<?
			$sql = "select * from free_ripple where parent='$item_num'";
			$ripple_result = mysql_query($sql);

			while ($row_ripple = mysql_fetch_array($ripple_result))
			{
				$ripple_num     = $row_ripple[num];
				$ripple_id      = $row_ripple[id];
				$ripple_nick    = $row_ripple[nick];
				$ripple_content = str_replace("\n", "<br>", $row_ripple[content]);
				$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
				$ripple_date    = $row_ripple[regist_day];
			?>
			<div id="ripple_writer_title">
				
				<ul>
					<li id="writer_title1"><?=$ripple_nick?></li>
					<li id="writer_title2"><?=$ripple_date?></li>
					<li id="ripple_content"><?=$ripple_content?></li>
					<li id="writer_title4"> 
						<? 
								if($userid=="admin" || $userid==$ripple_id)
								echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'><i class='fa-solid fa-trash-can'></i></a>"; 
						?>
					</li>
				</ul>
			</div>
				<?
						}
				?>			
			<form class="form" name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>">  
				<ul id="ripple_box">
					<li id="ripple_box1">
						<textarea rows="4" cols="130" placeholder="댓글을 입력해주세요" name="ripple_content"></textarea>
					</li>
					<li id="ripple_box2">
						<a href="#" onclick="check_input()">댓글달기</a>
					</li>
				</ul>
			</form>
		</div> <!-- end of ripple -->

			<div id="view_button">
				<? 
					if($userid )
					{
				?>
					<a class="write" href="write_form.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
				<?
					}
				?>
				<? 
					if($userid==$item_id || $userlevel==1 || $userid=="admin")
					{
				?>
					<a href="modify_form.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a>
					<a class="del" href="javascript:del('delete.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>')">삭제</a>
				<?
					}
				?>
				<a class="list" href="list.php?num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">목록</a>
			</div>
		</div>
	</div> 
</article><!-- end of wrap -->
 <? include "../common/sub_footer.html" ?>   
</body>
</html>
