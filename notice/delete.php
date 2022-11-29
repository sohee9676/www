<?
   session_start();
   
   @extract($_POST);
	@extract($_GET);
	@extract($_SESSION);

   include "../lib/dbconn.php";

   $sql = "delete from notice where num = $num";
   mysql_query($sql, $connect);

   mysql_close();

   echo "
	   <script>
	    location.href = 'list.php';
	   </script>
	";
?>

