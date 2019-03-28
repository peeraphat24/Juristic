<?php
	session_start();
	@ini_set('display_errors', '0');

	if (!isset($_SESSION["status"]))
	{
		?>
    <script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
        location = "index.html";</script>
        <?php
    }
	if($_POST["detail"] == null && $_POST["place"] == null && $_POST["datestart"] == null && $_POST["timestart"] == null && $_POST["timeend"] == null){
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลทั้งหมด');";
		echo "window.location.href = 'meeting.php' ";
		echo"</script>";
    }
        elseif ($_POST["detail"] == null){
	    echo"<script language=\"JavaScript\">";
	    echo"alert('กรุณาระบุรายละเอียด');";
	    echo "window.location.href = 'meeting.php' ";
	    echo"</script>";
	}
		elseif ($_POST["place"] == null){
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุสถานที่');";
			echo "window.location.href = 'meeting.php' ";
			echo"</script>";
	}
		elseif ($_POST["datestart"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุวันที่เริ่ม');";
			echo "window.location.href = 'meeting.php' ";
			echo"</script>";

	}
		elseif ($_POST["timestart"] == null) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาระบุเวลาที่เริ่ม');";
			echo "window.location.href = 'meeting.php' ";
			echo"</script>";
    }	
        elseif ($_POST["timeend"] == null) {
            echo"<script language=\"JavaScript\">";
            echo"alert('กรุณาระบุเวลาที่สิ้นสุด');";
            echo "window.location.href = 'meeting.php' ";
            echo"</script>";
	}
		else{
			if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
		{
		$host = "localhost";
		$user = "root";
		$pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
        $sql = "select meet_id from meeting";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["meet_id"];
		}
		}
        $id++;          
		$deatil = $_POST["detail"];
		$place = $_POST["place"];
        $datestart = $_POST["datestart"];
        $starttime = $_POST["timestart"];
		$endtime = $_POST["timeend"];
			$sql1 = "INSERT INTO meeting ";
			$sql1 .= "VALUES ('$id','$deatil', '$place','$datestart','$starttime','$endtime','".$_FILES["filUpload"]["name"]."')";
			mysql_query($sql1,$con) or die("ERROR");
			echo"<script language=\"JavaScript\">";
			echo"alert('เพิ่มข้อมูลสำเร็จ');";
			echo "window.location.href = 'meeting.php' ";
			echo"</script>";
		}
		elseif(!move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
		{
				echo"<script language=\"JavaScript\">";
				echo"alert('เพิ่มข้อมูลไม่สำเร็จ');";
				echo "window.location.href = 'meeting.php' ";
				echo"</script>";
		}

		mysql_close($con);
	}
?>