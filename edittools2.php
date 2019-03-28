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
	if ($_POST["name"] == null && $_POST["amount"] == null  && $_POST["unit"] == null && $_POST["status"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลของเครื่องมือทั้งหมด');";
		echo "window.location.href = 'tools.php' ";
		echo"</script>";
	}
	elseif ($_POST["name"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุชื่อของเครื่องมือ');";
		echo "window.location.href = 'tools.php' ";
		echo"</script>";
	}
	elseif ($_POST["amount"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุจำนวนของเครื่องมือ');";
		echo "window.location.href = 'tools.php' ";
		echo"</script>";
	}
	elseif ( $_POST["unit"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุหน่วยนับของเครื่องมือ');";
		echo "window.location.href = 'tools.php' ";
		echo"</script>";
	}
	elseif ($_POST["status"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุสถานะของเครื่องมือ');";
		echo "window.location.href = 'tools.php' ";
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
				$fname = $_POST["name"];
				$type = $_POST["type"];
				$amount = $_POST["amount"];
        $unit = $_POST["unit"];
				$astat = $_POST["status"];
				date_default_timezone_set('Asia/Bangkok');
		    $date = date('Y/m/d');
				$note= $_POST["note"];
        $sql = "update tools set tools_name='$fname',type_id = '$type',tools_amount='$amount',tools_unit='$unit' ,tools_status='$astat',tools_get='$date',note='$note' where tools_id = '$id'";
				echo"<script language=\"JavaScript\">";
				echo"alert('เเก้ไขข้อมูลเครื่องมือสำเร็จ');";
				echo "window.location.href = 'tools.php' ";
				echo"</script>";
			  mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);}
?>
