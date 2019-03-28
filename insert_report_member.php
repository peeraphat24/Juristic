<?php
	session_start();
	@ini_set('display_errors', '0');
?> <?
		if ($_POST["topic"] == null && $_POST["place"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่ข้อมูล');";
			echo "window.location.href = 'report_member.php' ";
			echo"</script>";
		}
		else if($_POST["topic"] == null){
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่เรื่องที่แจ้ง');";
			echo "window.location.href = 'report_member.php' ";
			echo"</script>";
		}
		else if($_POST["place"] == NULL){
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่สถานที่');";
			echo "window.location.href = 'report_member.php' ";
			echo"</script>";
		}
		else if($_POST["note"] == NULL){
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่รายละเอียด');";
			echo "window.location.href = 'report_member.php' ";
			echo"</script>";
		}else{
		$host = "localhost";
		$user = "root";
		$pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
        $sql = "select report_id from report_repair";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["report_id"];
		}
		}
		$id++;
        $memid = $_POST["mem_id"];
        $place = $_POST["place"];
		$topic = $_POST["topic"];
    	date_default_timezone_set('Asia/Bangkok');
        $date = date('Y/m/d');
        $note = $_POST["note"]; 
  		$sql = "INSERT INTO report_repair VALUES ('$id', '$memid','$topic','$place', '$date')";
			echo"<script language=\"JavaScript\">";
			echo"alert('บันทึกรายการสำเร็จ');";
			echo "window.location.href = 'report_member.php' ";
			echo"</script>";
    	mysql_query($sql,$con) or die("ERROR");
		mysql_close($con);
	}
?>
