<? 
	session_start(); 
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION); 
	
	include "../lib/dbconn.php";

	$sql = "select * from $table where num=$num";
	$result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);       
      // 하나의 레코드 가져오기

	$item_num     = $row[num];
	$item_id      = $row[id];
	$item_name    = $row[name];
  	$item_nick    = $row[nick];
	$item_hit     = $row[hit];

	$image_name[0]   = $row[file_name_0];
	$image_name[1]   = $row[file_name_1];
	$image_name[2]   = $row[file_name_2];


	$image_copied[0] = $row[file_copied_0];
	$image_copied[1] = $row[file_copied_1];
	$image_copied[2] = $row[file_copied_2];

    $item_date    = $row[regist_day];
	$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	$item_content = $row[content];
	$is_html      = $row[is_html];


	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}


	//첨부된 이미지 가져오기

	for ($i=0; $i<3; $i++)
	{
		if ($image_copied[$i]) //첨부된 이미지가 있으면
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			//배열로 리턴[이미지 너비, 이미지 높이, 이미지 타입]

			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else  //첨부된 이미지가 없으면
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

	$new_hit = $item_hit + 1;

	$sql = "update $table set hit=$new_hit where num=$num";   // 글 조회수 증가시킴
	mysql_query($sql, $connect);

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>홍보센터-보도자료</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="../common/css/sub_common.css">
    <link rel="stylesheet" href="../sub4/common/css/sub4common.css">
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
        if(confirm("정말 삭제하시겠습니까?\n삭제된 게시글은 복구할 수 없습니다.")) {
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
                    <strong> 보도자료</strong>
            </div>
                <h2>보도자료</h2>
                <p>We always share dongah's news and stories</p>
                <p>회사의 소식과 이야기를 빠르고 정확하게 전해드립니다.</p>
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
			<?
				for ($i=0; $i<3; $i++)
				{
					if ($image_copied[$i])
					{
						$img_name = $image_copied[$i];
						$img_name = "./data/".$img_name;
						$img_width = $image_width[$i];
						
						echo "<img src='$img_name' width='$img_width'>"."<br><br>";
					}
				}
			?>
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
					if($userid)
					{
				?>
					<a class="write" href="write_form.php?table=<?=$table?>&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
				<?
					}
				?>
				<? 
					if($userid==$item_id || $userlevel==1 || $userid=="admin")
					{
				?>
					<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>">수정</a>
					<a class="del" href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>&page=<?=$page?>&scale=<?=$scale?>')">삭제</a>
				<?
					}
				?>
				<a class="list" href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
  </article><!-- end of wrap -->
 <? include "../common/sub_footer.html" ?>   

</body>
</html>
