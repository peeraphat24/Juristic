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
	if ($_POST["name"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุชื่อประเภทการจ่ายเงิน');";
		echo "window.location.href = 'typepay.php' ";
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
        $sql = "select type_id from typepay";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["type_id"];
		}
		}
		$id++;
		$name = $_POST["name"];
    	$sql = "INSERT INTO typepay VALUES ('$id','$name')";
			echo"<script language=\"JavaScript\">";
			echo"alert('เพิ่มข้อมูลประเภทการชำระเงินสำเร็จ');";
			echo "window.location.href = 'typepay.php' ";
			echo"</script>";
			mysql_query($sql,$con) or die("ERROR");
    	mysql_close($con);}
?>
