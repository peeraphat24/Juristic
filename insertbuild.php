<?php
	session_start();
	@ini_set('display_errors', '0');

	if (!isset($_SESSION["status"]))
	{
		?>
<script>
alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
location = "index.html";
</script>
<?php
	}
	if($_POST["mid"] == null && $_POST["telephone"] == null && $_POST["startdate"] == null && $_POST["enddate"] == null){
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลทั้งหมด');";
		echo "window.location.href = 'building.php' ";
		echo"</script>";
    }
        elseif ($_POST["mid"] == null){
	    echo"<script language=\"JavaScript\">";
	    echo"alert('กรุณาระบุเลขบัตรประชาชน');";
	    echo "window.location.href = 'building.php' ";
	    echo"</script>";
	}
		elseif ($_POST["telephone"] == null){
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุเบอร์โทรศัพท์');";
			echo "window.location.href = 'building.php' ";
			echo"</script>";
	}
		elseif ($_POST["startdate"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุวันที่เริ่ม');";
			echo "window.location.href = 'building.php' ";
			echo"</script>";

	}
		elseif ($_POST["enddate"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุวันที่สิ้นสุด');";
			echo "window.location.href = 'building.php' ";
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
        $sql = "select build_id from building";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["build_id"];
		}
		}
		$id++;
        // $mid = $_POST["mid"];
        $memid = $_POST["mem_id"];
		$housenum = $_POST["housenum"];
		$telephone = $_POST["telephone"];
        $startdate = $_POST["startdate"];
        $enddate = $_POST["enddate"];
        date_default_timezone_set('Asia/Bangkok');
    	$date = date('Y/m/d');
			$sql = "INSERT INTO building VALUES ('$id','$memid', '$housenum','$startdate','$enddate','$date','$telephone')";
			echo"<script language=\"JavaScript\">";
			echo"alert('เพิ่มข้อมูลสำเร็จ');";
			echo "window.location.href = 'building.php' ";
			echo"</script>";
            mysql_query($sql,$con) or die("ERROR");
            
    	mysql_close($con);}
?>