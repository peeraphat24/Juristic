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
				$id = $_POST["id"];
				$fname = $_POST["firstname"];
				$lname = $_POST["lastname"];
				$type = $_POST["type"];
				$title = $_POST["mtitle"];
				$maddr = $_POST["maddr"];
				$iden = $_POST["iden"];
				$tel = $_POST["mtel"];
				$birthdate = $_POST["mbirthday"];
				$indate = $_POST["min"];
				$sql = "update member set numbertitle='$title' ,m_firstname='$fname',m_lastname = '$lname',type_id ='$type',identify_id='$iden',m_address = '$maddr',m_tel='$tel',m_birthday='$birthdate' ,m_in='$indate' where member_id = '$id'";
				
					
				
				// echo"var_dump($id,$fname,$lname,$type,$title,$maddr,$tel,$birthdate,$indate,$status);";
				echo"<script language=\"JavaScript\">";
				echo"alert('แก้ไขข้อมูลสมาชิกสำเร็จ');";
				echo "window.location.href = 'member.php' ";
				echo"</script>";
				mysql_query($sql,$con) or die("ERROR");
        mysql_close($con);}

?>
