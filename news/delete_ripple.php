<?
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

      /*
        table='free' (부모의 테이블이 들어온다)
        num=1 (부모번호)
        ripple_num=1 (댓글번호)
      */
      
      include "../lib/dbconn.php";

      $sql = "delete from free_ripple where num=$ripple_num";
      mysql_query($sql, $connect);

      mysql_close();

      echo "
	   <script>
      alert='댓글이 삭제되었습니다.'
	    location.href = 'view.php?table=$table&num=$num';
	   </script>
	  ";
?>
