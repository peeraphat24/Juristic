<?php
	session_start();
	@ini_set('display_errors', '0');

	if (!isset($_SESSION["status"]))
	{
		?>
		<script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
		location="login.php";</script>
		<?php
	}

		$host = "localhost";
        $user = "root";
        $pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
        $id = $_GET["id"];
        $sql = "delete from referee where ref_id = '$id'";
				echo"<script language=\"JavaScript\">";
				echo"alert('ลบข้อมูลกรรมการสำเร็จ');";
				echo "window.location.href = 'referee.php' ";
				echo"</script>";
        mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);
?>
