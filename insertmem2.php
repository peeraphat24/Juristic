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
	if ($_POST["firstname"] == null && $_POST["lastname"] == null  && $_POST["mtitle"] == null && $_POST["maddr"] == null && $_POST["mtel"] == null && $_POST["mbirthday"] == null && $_POST["min"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุข้อมูลของสมาชิกทั้งหมด');";
		echo "window.location.href = 'member.php' ";
		echo"</script>";
	}
	elseif ($_POST["firstname"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุชื่อของสมาชิก');";
		echo "window.location.href = 'member.php' ";
		echo"</script>";
	}
	elseif ($_POST["lastname"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุนามสกุลของสมาชิก');";
		echo "window.location.href = 'member.php' ";
		echo"</script>";
	}
	elseif ( $_POST["type"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุประเภทของสมาชิก');";
		echo "window.location.href = 'member.php' ";
		echo"</script>";
	}
	elseif ($_POST["mtitle"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุเลขที่โฉนดของสมาชิก');";
		echo "window.location.href = 'member.php' ";
		echo"</script>";
	}
	elseif ($_POST["maddr"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุบ้านเลขที่ของสมาชิก');";
		echo "window.location.href = 'member.php' ";
		echo"</script>";
	}
	elseif ($_POST["mtel"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุเบอร์โทรศัพท์ของสมาชิก');";
		echo "window.location.href = 'member.php' ";
		echo"</script>";
	}
	elseif ($_POST["mbirthday"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันเกิดของสมาชิก');";
		echo "window.location.href = 'member.php' ";
		echo"</script>";
	}
	elseif ($_POST["min"] == null) {
		echo"<script language=\"JavaScript\">";
		echo"alert('กรุณาระบุวันที่เข้าพักของสมาชิก');";
		echo "window.location.href = 'member.php' ";
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
        $sql = "select * from member ";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["member_id"];
		}
		}
		$id++;
		$fname = $_POST["firstname"];
		$lname = $_POST["lastname"];
		$type = $_POST["type"];
		$title = $_POST["mtitle"];
		$iden = $_POST["identify"];
		$maddr = $_POST["maddr"];
		$tel = $_POST["mtel"];
		$birthdate = $_POST["mbirthday"];
		$indate = $_POST["min"];
		$status = 0;

		function validuser($fname,$lname){
		$sql_select_user ="select * from member where m_firstname = '$fname' && m_lastname = '$lname' ";
		$result_select_user = mysql_query($sql_select_user);
		$nums_user = mysql_num_rows($result_select_user);
		if($nums_user > 0)
		return true;
		else
		return false;

		}

		if(!empty($fname) && !empty($lname)){

		   if(validuser($fname,$lname)){
				echo"<script language=\"JavaScript\">";
 				echo"alert('ชื่อและนามสกุลซ้ำ กรุณาใส่ข้อมูลใหม่');";
 				echo "window.location.href = 'member.php' ";
 				echo"</script>";
								}
				else{
									$sql = "INSERT INTO member VALUES ('$id','$title','$fname', '$lname','$type','$iden','$maddr', '$tel', '$birthdate', '$indate','$status')";
									echo"<script language=\"JavaScript\">";
									echo"alert('เพิ่มข้อมูลสมาชิกสำเร็จ');";
									echo "window.location.href = 'member.php' ";
									echo"</script>";
										mysql_query($sql,$con) or die("ERROR");
										mysql_close($con);
								}
							}
		}
?>
