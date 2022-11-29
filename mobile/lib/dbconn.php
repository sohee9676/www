<?
    $connect=mysql_connect( "localhost", "sh", "1234") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("sh_db",$connect);
?>
