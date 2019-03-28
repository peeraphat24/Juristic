<?php
	session_start();
	@ini_set('display_errors', '0');

		?>

		<?php
		if ($_POST["topic"] == null || $_POST["detail"] == null || $_POST["place"] == null || $_POST["startdate"] == null || $_POST["enddate"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่ข้อมูล');";
			echo "window.location.href = 'place.php' ";
			echo"</script>";
        }
        else if($_POST["topic"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่หัวข้อที่จะขออนุญาต');";
			echo "window.location.href = 'place.php' ";
			echo"</script>";
        }
        else if($_POST["detail"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่รายละเอียด');";
			echo "window.location.href = 'place.php' ";
			echo"</script>";
        }
        else if($_POST["place"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่สถานที่');";
			echo "window.location.href = 'place.php' ";
			echo"</script>";
        }
        else if($_POST["startdate"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่วันที่เริ่ม');";
			echo "window.location.href = 'place.php' ";
			echo"</script>";
        }
        else if($_POST["enddate"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่วันที่สิ้นสุด');";
			echo "window.location.href = 'place.php' ";
			echo"</script>";
        }else{
		$host = "localhost";
		$user = "root";
		$pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
        $sql = "select * from place";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["place_id"];
		}
		}
		$id++;
		$memid = $_POST["mem_id"];
		$topic = $_POST["topic"];
        $detail = $_POST["detail"];
        $place = $_POST["place"];
        $start = $_POST["startdate"];
        $end = $_POST["enddate"];
        date_default_timezone_set('Asia/Bangkok');
  	    $sql = "INSERT INTO place VALUES ('$id', '$memid','$place', '$start', '$end','$topic','$detail', 0)";
            echo"var_dump($id,$memid,$place,$start,$end,$topic,$detail)";
			echo"<script language=\"JavaScript\">";
			echo"alert('บันทึกรายการสำเร็จ');";
			echo "window.location.href = 'place.php' ";
			echo"</script>";
    	mysql_query($sql,$con) or die("ERROR");
		mysql_close($con);
	}
?>
