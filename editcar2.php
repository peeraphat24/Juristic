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
	if($_POST["carnum"] == null && $_POST["brand"] == null && $_POST["color"] == null && $_POST["caddr"] == null){
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลรถยนต์ทั้งหมด');";
		echo "window.location.href = 'car.php' ";
		echo"</script>";
	}
	elseif ($_POST["carnum"] == null){
	echo"<script language=\"JavaScript\">";
	echo"alert('กรุณาระบุเลขทะเบียนรถยนต์');";
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

				$id = $_POST["id"];
				$carnum = $_POST["carnum"];
				$addr = $_POST["caddr"];
				$brand = $_POST["brand"];
				$color = $_POST["color"];
        $sql = "update car set car_number = '$carnum',car_brand='$brand' ,car_color='$color' ,car_add='$addr' where car_id = '$id'";
				echo"<script language=\"JavaScript\">";
				echo"alert('เเก้ไขข้อมูลรถยนต์สำเร็จ');";
				echo "window.location.href = 'car.php' ";
				echo"</script>";
				mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);}
?>
