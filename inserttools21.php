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
	if ($_POST["name"] == null && $_POST["amount"] == null  && $_POST["unit"] == null && $_POST["status"] == null && $_POST["get"] == null) {
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
	elseif ($_POST["get"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันที่ได้รับของเครื่องมือ');";
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
        $sql = "select * from tools";
        $result = mysql_query($sql,$con);
				$num = mysql_num_rows($result);
				$count =0;
				while($rs = mysql_fetch_array($result)) {
				if (++$count == $num) {$id = $rs["tools_id"];}

		$id++;
		$name = $_POST["name"];
		$type= $_POST["type"];
		$amount = $_POST["amount"];
		$unit = $_POST["unit"];
		$get = $_POST["get"];
		$status = $_POST["status"];
		$note = $_POST["note"];
		$result1 = mysql_query($sql,$con);

		while ($rs1 = mysql_fetch_array($result1) ) {
			$id1 = $rs1["tools_id"];
			$amt = $rs1["tools_amount"];
			$n = $rs1["tools_name"];}
		if($n == $name)
		{
			$sql = "update tools set type_id = '$type',tools_amount=tools_amount + $amount,tools_unit='$unit' ,tools_status='$status',tools_get='$get',note='$note' where tools_name = '$name'";
		}
		else {
			$sql = "INSERT  INTO tools VALUES ('$id', '$type' , '$name', '$amount', '$unit', '$get', '$status', '$note')";
		}
}
			echo"<script language=\"JavaScript\">";
			echo"alert('เพิ่มข้อมูลเครื่องมือสำเร็จ');";
			echo "window.location.href = 'tools.php' ";
			echo"</script>";
			mysql_query($sql,$con) or die("ERROR");
    	mysql_close($con);}
?>
