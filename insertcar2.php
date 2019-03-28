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
	if($_POST["number"] == null && $_POST["brand"] == null && $_POST["color"] == null && $_POST["caddr"] == null){
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลรถยนต์ทั้งหมด');";
		echo "window.location.href = 'car.php' ";
		echo"</script>";
}
elseif ($_POST["number"] == null){
	echo"<script language=\"JavaScript\">";
	echo"alert('กรุณาระบุเลขทะเบียนรถยนต์');";
	echo "window.location.href = 'car.php' ";
	echo"</script>";
	 }
		elseif ($_POST["type"] == null){
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุเจ้าของรถยนต์');";
			echo "window.location.href = 'car.php' ";
			echo"</script>";
			 }
		elseif ($_POST["brand"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุยี่ห้อรถยต์');";
			echo "window.location.href = 'car.php' ";
			echo"</script>";

			}
		elseif ($_POST["color"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุสีรถยนต์');";
			echo "window.location.href = 'car.php' ";
			echo"</script>";

		}
		elseif ($_POST["caddr"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุจังหวัดของรถยนต์');";
			echo "window.location.href = 'car.php' ";
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
        $sql = "select car_id from car";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["car_id"];
		}
		}
		$id++;
		$carnum = $_POST["number"];
		$memid = $_POST["type"];
		$brand = $_POST["brand"];
		$color = $_POST["color"];
		$caddr = $_POST["caddr"];
			$sql = "INSERT INTO car VALUES ('$id','$carnum', '$memid','$brand','$color','$caddr')";
			echo"<script language=\"JavaScript\">";
			echo"alert('เพิ่มข้อมูลรถยนต์สำเร็จ');";
			echo "window.location.href = 'car.php' ";
			echo"</script>";
			mysql_query($sql,$con) or die("ERROR");
    	mysql_close($con);}
?>
