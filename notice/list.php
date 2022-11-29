<? 
	session_start(); 
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

	if(!$scale)$scale = 10;			// 한 화면에 표시되는 글 수

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

		$sql = "select * from notice where $find like '%$search%' order by num desc";	//서치를 포힘하는 $find 변수를 내림차순으로 정렬
	}
	else
	{
		$sql = "select * from notice order by num desc";		//아니면 전체 글목록 내림차순으로 정렬
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수 

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     //10의 배수면(scale이 10일때)
		$total_page = floor($total_record/$scale);      //총페이지개수
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
                <p>회사의 소식과 이야기를 빠르고 정확하게 전해드립니다.</p>
        </div>

	<div class="contentArea">

		<div class="top_section">
			<div id="total_list">총 <span><?= $total_record ?></span> 개의 게시물이 있습니다.</div>
			<div class="list_count">
				<label for="scale" class="hidden">리스트개수</label>
				<select id="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
					<option class="back" value='10' <? if ($scale=='') echo 'selected' ?>>10개</option>
					<option value='10' <? if ($scale=='10') echo 'selected' ?>>10개</option>
					<option value='15' <? if ($scale=='15') echo 'selected' ?>>15개</option>
					<option value='20' <? if ($scale=='20') echo 'selected' ?>>20개</option>
				</select>		
			</div>
		</div>
		
		<div class="main_board">
			<ul id="list_top_title">
				<li id="list_title1">번호</li>
				<li id="list_title2">제목</li>
				<li id="list_title3">작성자</li>
				<li id="list_title4">작성일자</li>
				<li id="list_title5">조회수</li>
			</ul>		

			<div id="list_content">
			<?		
			for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)          //제일 마지막 페이지 처리         
			{
				mysql_data_seek($result, $i);       
				// 가져올 레코드로 위치(포인터) 이동  
				$row = mysql_fetch_array($result);       
				// 하나의 레코드 가져오기
				
				$item_num = $row[num];
				$item_id = $row[id];
				$item_name = $row[name];
				$item_nick = $row[nick];
				$item_hit = $row[hit];

				$item_date = $row[regist_day];
				$item_date = substr($item_date, 0, 10);  //0번부터 10자만 뽑아내기

				$item_subject = str_replace(" ", "&nbsp;", $row[subject]);	//제목의 공백을 &nbsp로 바꿈

			?>
				<ul id="list_item">
					<li id="list_item1"><?= $number ?></li>
					<li id="list_item2">
						<a href="view.php?num=<?=$item_num?>&page=<?=$page?>&scale=<?=$scale?>"><?= $item_subject?></a>
					</li>
					<!-- mum = primary key value -->
					<li id="list_item3"><?= $item_nick ?></li>
					<li id="list_item4"><?= $item_date ?></li>
					<li id="list_item5"><?= $item_hit ?></li>
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
							echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
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
					<a class="write" href="write_form.php?page=<?=$page?>&scale=<?=$scale?>">글쓰기</a>
					<?
						}
					?>
					<a href="list.php?page=<?=$page?>&scale=<?=$scale?>">목록</a>
				
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

        	</div> <!-- end of list content -->
		</div> <!-- main board -->
	</div> 
</article> <!-- end of content -->
<? include "../common/sub_footer.html" ?>   
</body>
</html>
