<?php
	session_start();
	@ini_set('display_errors', '0');

	if (!isset($_SESSION["status"]))
	{
		?>
		<script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
		location="login.php";</script>
		<?php
    }
    
	if ($_POST["detail"] == null && $_POST["place"] == null && $_POST["datestart"] == null && $_POST["timestart"] == null && $_POST["timeend"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลทั้งหมด');";
		echo "window.location.href = 'meeting.php' ";
		echo"</script>";
	}
	elseif ($_POST["detail"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุรายละเอียด');";
		echo "window.location.href = 'meeting.php' ";
		echo"</script>";
    }
    elseif ($_POST["place"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุสถานที่');";
		echo "window.location.href = 'meeting.php' ";
		echo"</script>";
    }
    elseif ($_POST["datestart"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวัน');";
		echo "window.location.href = 'meeting.php' ";
		echo"</script>";
    }
    elseif ($_POST["timestart"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุเวลาเริ่ม');";
		echo "window.location.href = 'meeting.php' ";
		echo"</script>";
    }
    elseif ($_POST["timeend"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุเวลาสิ้นสุด');";
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
				$id = $_POST["id"];
				$detail = $_POST["detail"];
				$place = $_POST["place"];
				$start = $_POST["datestart"];
				$tstart = $_POST["timestart"];
				$end = $_POST["timeend"];
        $files =  $_FILES["filUpload"]["name"];
				$sql = "UPDATE meeting SET meet_detail = '$detail',place = '$place',date_start = '$start',start_time = '$tstart',end_time = '$end',files = '$files' where meet_id = '$id'";
				mysql_query($sql,$con) or die("Connection failed: " . mysql_error());
				echo"<script language=\"JavaScript\">";
				echo"alert('แก้ไขข้อมูลสำเร็จ');";
				echo "window.location.href = 'meeting.php' ";
				echo"</script>";
                
                }
                elseif(!move_uploaded_file($_FILES["filUpload"]["tmp_name"],"myfile/".$_FILES["filUpload"]["name"]))
                {
                    echo"<script language=\"JavaScript\">";
                    echo"alert('แก้ไขข้อมูลไม่สำเร็จ');";
                    echo "window.location.href = 'meeting.php' ";
                    echo"</script>";
                }
        mysql_close($con);}

?>
