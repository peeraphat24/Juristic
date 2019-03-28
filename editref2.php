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
	if ($_POST["memid"] == null &&  $_POST["refstart"] == null && $_POST["refend"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลของกรรมการทั้งหมด');";
		echo "window.location.href = 'referee.php' ";
		echo"</script>";
	}
	elseif ($_POST["memid"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุชื่อของกรรมการ');";
		echo "window.location.href = 'referee.php' ";
		echo"</script>";
	}
	elseif ($_POST["refstart"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันที่เริ่มวาระของกรรมการ');";
		echo "window.location.href = 'referee.php' ";
		echo"</script>";
	}
	elseif ($_POST["refend"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันที่หมดวาระของกรรมการ');";
		echo "window.location.href = 'referee.php' ";
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
				$memid = $_POST["memid"];
        $status = $_POST["type"];
				$start = $_POST["refstart"];
				$end = $_POST["refend"];
        $sql = "update referee set member_id='$memid',job_id='$status' ,start_date='$start',end_date='$end' where ref_id = '$id'";
				echo"<script language=\"JavaScript\">";
				echo"alert('เเก้ไขข้อมูลกรรมการสำเร็จ');";
				echo "window.location.href = 'referee.php' ";
				echo"</script>";
				mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);}
?>
