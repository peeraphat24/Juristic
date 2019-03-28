<?php
	session_start();
	@ini_set('display_errors', '0');

		?>

		<?php
		if ($_POST["detail"] == null && $_POST["headtext"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่รายละเอียด');";
			echo "window.location.href = 'savereplay.php' ";
			echo"</script>";
		}
		else if($_POST["detail"] == null){
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่รายละเอียด');";
			echo "window.location.href = 'savereplay.php' ";
			echo"</script>";
		}
		else if($_POST["headtext"] == NULL){
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่รายละเอียด');";
			echo "window.location.href = 'savereplay.php' ";
			echo"</script>";
		}else{
		$host = "localhost";
		$user = "root";
		$pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
        $sql = "select reply_id from reply";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["reply_id"];
		}
		}
		$id++;
		$memid = $_POST["mem_id"];
		$title = $_POST["headtext"];
    	$detail = $_POST["detail"];
    	date_default_timezone_set('Asia/Bangkok');
    	$date = date('Y/m/d');
  		$sql = "INSERT INTO reply VALUES ('$id', '$memid','$title', '$detail', '$date', 0)";

			echo"<script language=\"JavaScript\">";
			echo"alert('บันทึกรายการสำเร็จ');";
			echo "window.location.href = 'savereplay.php' ";
			echo"</script>";
    	mysql_query($sql,$con) or die("ERROR");
		mysql_close($con);
	}
?>
