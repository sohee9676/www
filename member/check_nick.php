<meta charset="utf-8">
<?
   @extract($_POST);
   @extract($_GET);
   @extract($_SESSION);

   if(!$nick) 
   {
      echo("");
   }
   else
   {
      include "../lib/dbconn.php";
 
      $sql = "select * from member where nick='$nick' ";

      $result = mysql_query($sql, $connect);
      $num_record = mysql_num_rows($result);

      

      if ($num_record)
      {
         echo "<span style='color:red'>다른 닉네임을 사용하세요.</span>";
      }
      else
      {
         echo "<span style='color:blue'>사용가능한 닉네임입니다.</span>";
      }
		 
      mysql_close();
   }
?>

