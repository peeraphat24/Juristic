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
		echo"alert('กรุณาระบุชื่อตำแหน่ง');";
		echo "window.location.href = 'job.php' ";
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
        $sql = "select job_id from job";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["job_id"];
		}
		}
		$id++;
		$namejob = $_POST["name"];
    	$sql = "INSERT INTO job VALUES ('$id','$namejob')";
			echo"<script language=\"JavaScript\">";
			echo"alert('เพิ่มข้อมูลตำแหน่งสำเร็จ');";
			echo "window.location.href = 'job.php' ";
			echo"</script>";
			mysql_query($sql,$con) or die("ERROR");
    	mysql_close($con);}
?>
