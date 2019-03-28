<?php
	session_start();
	@ini_set('display_errors', '0');

		?>

		<?php
		if ($_POST["startdate"] == null && $_POST["enddate"] == null && $_POST["item"] && $_POST["amount"]) {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่ข้อมูล');";
			echo "window.location.href = 'move.php' ";
			echo"</script>";
        }
        else if($_POST["startdate"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่วันที่เริ่ม');";
			echo "window.location.href = 'move.php' ";
			echo"</script>";
        }
        else if($_POST["enddate"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่วันที่สิ้นสุด');";
			echo "window.location.href = 'move.php' ";
			echo"</script>";
        }
        else if($_POST["item"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่รายการ);";
			echo "window.location.href = 'move.php' ";
			echo"</script>";
        }
        else if($_POST["amount"] == null)
        {
			echo"<script language=\"JavaScript\">";
			echo"alert('กรุณาใส่จำนวนสิ่งของ');";
			echo "window.location.href = 'move.php' ";
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
        $sql = "select * from move";
        $result = mysql_query($sql,$con);
        $num = mysql_num_rows($result);
		$count =0;
		
		while($rs = mysql_fetch_array($result)) {
		if (++$count == $num) {
		$id = $rs["move_id"];
		}
		}
		$id++;
		$memid = $_POST["mem_id"];
		$place = $_POST["place"];
		$item = $_POST["item"];
        $amount = $_POST["amount"];
        $note = $_POST["note"];
        $start = $_POST["startdate"];
        $end = $_POST["enddate"];
        date_default_timezone_set('Asia/Bangkok');
  	    $sql = "insert into move values ('$id', '$memid','$item', '$amount' , '$start', '$end','$place','$note', 0)";
            echo"var_dump($id,$memid,$item,$amount,$start,$end,$note)";
			echo"<script language=\"JavaScript\">";
			echo"alert('บันทึกรายการสำเร็จ');";
			echo "window.location.href = 'move.php' ";
			echo"</script>";
    	mysql_query($sql,$con) or die("ERROR");
		mysql_close($con);
	}
?>
