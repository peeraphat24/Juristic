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
	if ($_POST["memid"] == null  && $_POST["refstart"] == null && $_POST["refend"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลของกรรมการทั้งหมด');";
		echo "window.location.href = 'referee.php' ";
		echo"</script>";
	}
	elseif ($_POST["memid"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุชื่อของกรรมการ');";
		echo "window.location.href = 'referee.php' ";
		echo"</script>";
	}
	elseif ($_POST["refstart"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันที่เริ่มวาระของกรรมการ');";
		echo "window.location.href = 'referee.php' ";
		echo"</script>";
	}
	elseif ($_POST["refend"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันที่หมดวาระของกรรมการ');";
		echo "window.location.href = 'referee.php' ";
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
        $sql = "select ref_id from referee";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["ref_id"];
		}
		}
		$id++;
		$memid = $_POST["memid"];
		$refstat = $_POST["type"];
		$start = $_POST["refstart"];
		$send = $_POST["refend"];
		function validuser($memid,$refstat){
		$sql_select_user ="select * from referee where member_id = '$memid' || job_id = '$refstat' ";
		$result_select_user = mysql_query($sql_select_user);
		$nums_user = mysql_num_rows($result_select_user);
		if($nums_user > 0)
		return true;
		else
		return false;

		}

		if(!empty($memid) && !empty($refstat)){

		   if(validuser($memid,$refstat)){
				echo"<script language=\"JavaScript\">";
 				echo"alert('ชื่อ-นามสกุลหรือตำแหน่งซ้ำ กรุณาใส่ข้อมูลใหม่');";
 				echo "window.location.href = 'referee.php' ";
 				echo"</script>";
								}
				else{
					$sql = "INSERT INTO referee VALUES ('$id','$memid', '$start','$send','$refstat')";

						echo"<script language=\"JavaScript\">";
						echo"alert('เพิ่มช้อมูลกรรมการสำเร็จ');";
						echo "window.location.href = 'referee.php' ";
						echo"</script>";

						mysql_query($sql,$con) or die("ERROR");
			    	mysql_close($con);
								}
							}
}

?>
