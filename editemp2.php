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
if ($_POST["empfirstname"] == null && $_POST["emplastname"] == null && $_POST["empaddr"] == null && $_POST["emptel"] == null && $_POST["empbirthday"] == null && $_POST["empstart"] == null) {
	echo"<script language=\"JavaScript\">";
	echo"alert('กรุณาระบุข้อมูลของพนักงานทั้งหมด');";
	echo "window.location.href = 'employee.php' ";
	echo"</script>";
}
elseif ($_POST["empfirstname"] == null) {
	echo"<script language=\"JavaScript\">";
	echo"alert('กรุณาระบุชื่อของพนักงาน');";
	echo "window.location.href = 'employee.php' ";
	echo"</script>";
}
elseif ($_POST["emplastname"] == null) {
	echo"<script language=\"JavaScript\">";
	echo"alert('กรุณาระบุนามสกุลของพนักงาน');";
	echo "window.location.href = 'employee.php' ";
	echo"</script>";
}
elseif ($_POST["empaddr"] == null) {
	echo"<script language=\"JavaScript\">";
	echo"alert('กรุณาระบุที่อยู่ของพนักงาน');";
	echo "window.location.href = 'employee.php' ";
	echo"</script>";
}
elseif ($_POST["emptel"] == null) {
	echo"<script language=\"JavaScript\">";
	echo"alert('กรุณาระบุเบอร์โทรศัพท์ของพนักงาน');";
	echo "window.location.href = 'employee.php' ";
	echo"</script>";
}
elseif ($_POST["empbirthday"] == null) {
	echo"<script language=\"JavaScript\">";
	echo"alert('กรุณาระบุวันเกิดของพนักงาน');";
	echo "window.location.href = 'employee.php' ";
	echo"</script>";
}
elseif ($_POST["empstart"] == null) {
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

				$id = $_POST["id"];
				$fname = $_POST["empfirstname"];
				$lname = $_POST["emplastname"];
				$type = $_POST["type"];
				$maddr = $_POST["empaddr"];
				$tel = $_POST["emptel"];
				$birthday = $_POST["empbirthday"];
				$startdate = $_POST["empstart"];
        $sql = "update employee set emp_firstname='$fname',emp_lastname = '$lname',job_id = '$type',emp_addr = '$maddr',emp_tel='$tel',emp_birthday='$birthday' ,emp_start='$startdate' where emp_id = '$id'";
				echo"<script language=\"JavaScript\">";
				echo"alert('เเก้ไขข้อมูลพนักงานสำเร็จ');";
				echo "window.location.href = 'employee.php' ";
				echo"</script>";
				mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);}
?>
