<? 
	session_start(); 
	$table = 'news';
	$ripple = "free_ripple";
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
		<link rel="stylesheet" href="./css/list.css">

		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
		<script src="https://kit.fontawesome.com/e960e8ad99.js" crossorigin="anonymous"></script>
		<script src="../common/js/prefixfree.min.js"></script>
	</head>

<?
	@extract($_GET); 
	@extract($_POST); 
	@extract($_SESSION); 

	include "../lib/dbconn.php";
	$scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);
	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;
?>


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

		<div class="top_section">
			<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
				<div id="list_search">
					<div id="total_list"> 총 <span><?= $total_record ?></span> 개의 게시물이 있습니다.  
				</div>
					
				<div class="list_count">
					<label for="scale" class="hidden">리스트개수</label>
					<select id="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
						<option class="back" value='10' <? if ($scale=='') echo 'selected' ?>>10개</option>
						<option value='10' <? if ($scale=='10') echo 'selected' ?>>10개</option>
						<option value='15' <? if ($scale=='15') echo 'selected' ?>>15개</option>
						<option value='20' <? if ($scale=='20') echo 'selected' ?>>20개</option>
					</select>		
				</div>
			</form>
		</div>

		<div id="list_content">
		<?		
			for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
			{
			mysql_data_seek($result, $i);       
			// 가져올 레코드로 위치(포인터) 이동  
			$row = mysql_fetch_array($result);       
			// 하나의 레코드 가져오기
			
			$item_num     = $row[num];
			$item_id      = $row[id];
			$item_name    = $row[name];
			$item_nick    = $row[nick];
			$item_hit     = $row[hit];
			$item_date    = $row[regist_day];
			$item_content = $row[content];
			$item_date = substr($item_date, 0, 10);  
			$item_subject = str_replace(" ", "&nbsp;", $row[subject]);

			$sql = "select * from $ripple where parent=$item_num";
			$result2 = mysql_query($sql, $connect);
			$ripple_num = mysql_num_rows($result2);

		if($row[file_copied_0]){
			$item_img = './data/'.$row[file_copied_0];
			}else{
				$item_img = './data/default.jpg';
				}
		?>

			<ul id="list_item">
				<li>
					<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
						<div id="list_img"><img src="<?= $item_img ?>"></div>
						<dl id="list_con">
							<dt id="list_item1"><?= $item_subject ?></dt>
							<dd id="list_item2"><?=$item_content ?></dd>
							<dd id="list_item3"><?= $item_date ?></dd>
							<dd id="list_item4">
								<span><i class="fa-regular fa-eye"></i></span><?= $item_hit ?>
							</dd>
							<dd id="list_item5">
								<?
									if ($ripple_num)
										echo " 	<span><i class='fa-regular fa-comments'></i></span>
 										$ripple_num";
								?>
							</dd>
						</dl>
					</a>
				</li>
			</ul>

		<?
			$number--;
			}
		?>

		<div id="page_button">
			<div id="page_num"> <i class="fa-solid fa-caret-left"></i> 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
		<?
		// 게시판 목록 하단에 페이지 링크 번호 출력
		for ($i=1; $i<=$total_page; $i++)
		{
				if ($page == $i)     // 현재 페이지 번호 링크 안함
				{
					echo "<b> $i </b>";
				}
				else
				{ 
					echo "<a href='list.php?page=$i&scale=$scale'>$i</a>";
				}      
		}
	?>			
		&nbsp;&nbsp;&nbsp;&nbsp;다음 <i class="fa-solid fa-caret-right"></i>
			</div>
		</div>	
		<div id="button">
			<? 
				if($userid)
				{
			?>
				<a class="write" href="write_form.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
			<?
				}
			?>
			<a href="list.php?table=<?=$table?>&page=<?=$page?>&scale=<?=$scale?>">목록</a>
		
		</div>
		</div> <!-- end of page_button -->

		<form class="board" name="board_form" method="post" action="list.php?mode=search"> 
			<select name="find" id="find">
					<option value='subject' class="subject">제목</option>
					<option value='content' class="content">내용</option>
					<option value='nick' class="nick">별명</option>
					<option value='name' class="name">이름</option>
			</select>
			<input type="text" name="search" id="search" placeholder="검색어를 입력하세요">
			<input type="submit" value="검색" id="searchBtn">
		</form>

	</div> <!-- end of contentArea -->
</article>

	<? include "../common/sub_footer.html" ?>

</body>
</html>
