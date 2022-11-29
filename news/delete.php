<?
   session_start();

   @extract($_GET); 
   @extract($_POST); 
   @extract($_SESSION); 
   
   include "../lib/dbconn.php";

   $sql = "select * from $table where num = $num";
   $result = mysql_query($sql, $connect);

   $row = mysql_fetch_array($result);

   $copied_name[0] = $row[file_copied_0];
   $copied_name[1] = $row[file_copied_1];
   $copied_name[2] = $row[file_copied_2];

   for ($i=0; $i<3; $i++)
   {
		if ($copied_name[$i])  //첨부된 파일이 있으면
	   {
			$image_name = "./data/".$copied_name[$i];
			unlink($image_name);  //서버 안에 있는 파일을 실제로 삭제
	   }
   }

   $sql = "delete from $table where num = $num";
   mysql_query($sql, $connect);

   mysql_close();

	echo "
	   <script>
	      location.href = 'list.php?table=$table&page=$page';
	   </script>
	";
?>

