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
	if ($_POST["firstname"] == null && $_POST["lastname"] == null && $_POST["maddr"] == null && $_POST["mtel"] == null && $_POST["mbirthday"] == null && $_POST["min"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลของพนักงานทั้งหมด');";
		echo "window.location.href = 'employee.php' ";
		echo"</script>";
	}
	elseif ($_POST["firstname"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุชื่อของพนักงาน');";
		echo "window.location.href = 'employee.php' ";
		echo"</script>";
	}
	elseif ($_POST["lastname"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุนามสกุลของพนักงาน');";
		echo "window.location.href = 'employee.php' ";
		echo"</script>";
	}
	elseif ($_POST["maddr"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุที่อยู่ของพนักงาน');";
		echo "window.location.href = 'employee.php' ";
		echo"</script>";
	}
	elseif ($_POST["mtel"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุเบอร์โทรศัพท์ของพนักงาน');";
		echo "window.location.href = 'employee.php' ";
		echo"</script>";
	}
	elseif ($_POST["mbirthday"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันเกิดของพนักงาน');";
		echo "window.location.href = 'employee.php' ";
		echo"</script>";
	}
	elseif ($_POST["min"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันที่เริ่มทำงานของพนักงาน');";
		echo "window.location.href = 'employee.php' ";
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
        $sql = "select emp_id from employee";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["emp_id"];
		}
		}
		$id++;
		$fname = $_POST["firstname"];
		$lname = $_POST["lastname"];
		$type = $_POST["type"];
		$maddr = $_POST["maddr"];
		$tel = $_POST["mtel"];
		$birthday = $_POST["mbirthday"];
		$startdate = $_POST["min"];
		$status= 0;
    	$sql = "INSERT INTO employee VALUES ('$id','$fname', '$lname','$type','$maddr', '$tel', '$birthday', '$startdate','$status')";
			echo"<script language=\"JavaScript\">";
			echo"alert('เพิ่มข้อมูลพนักงานสำเร็จ');";
			echo "window.location.href = 'employee.php' ";
			echo"</script>";
			mysql_query($sql,$con) or die("ERROR");
    	mysql_close($con);}
?>
