<?php
	session_start();
	@ini_set('display_errors', '0');

	if (!isset($_SESSION["status"]))
	{
		?>
		<script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
		location="index.php";</script>
		<?php
	}
	if($_POST["detail"] == null){
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุรายละเอียด');";
		echo "window.location.href = 'savereplay.php' ";
		echo"</script>";
	}
		else{
		$host = "localhost";
    $user = "root";
    $pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

				$id = $_POST["id"];
        $detail = $_POST["detail"];
        $sql = "update reply set re_detail = '$detail' where reply_id = '$id'";
				echo"<script language=\"JavaScript\">";
				echo"alert('เเก้ไขบันทึกข้อความสำเร็จ');";
				echo "window.location.href = 'savereplay.php' ";
				echo"</script>";
				mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);}
?>
