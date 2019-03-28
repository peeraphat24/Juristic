<?php
	session_start();
	@ini_set('display_errors', '0');

	if (!isset($_SESSION["status"]))
	{
		?>
		<script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
		location="index.html";</script>
		<?php
	}
	if ($_POST["type"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุชื่อประเภทของเครื่องมือ');";
		echo "window.location.href = 'typetools.php' ";
		echo"</script>";
	}
	else {
		$host = "localhost";
    $user = "root";
    $pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
				$id = $_POST["id"];
				$type = $_POST["type"];
        $sql = "update typetools set type_name = '$type' where type_id = '$id'";
				echo"<script language=\"JavaScript\">";
				echo"alert('แก้ไขข้อมูลประเภทเครื่องมือสำเร็จ');";
				echo "window.location.href = 'typetools.php' ";
				echo"</script>";
			  mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);}
?>
