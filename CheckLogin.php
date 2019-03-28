
		<?php
			session_start();
			mysql_connect("localhost","root","12345678");
			mysql_select_db("house");
			$strUsername = mysql_real_escape_string($_POST['user']);
			$strPassword = mysql_real_escape_string($_POST['password']);
			$strSQL = "SELECT * FROM member WHERE member_id = '".$strUsername."'
			and m_tel = '".$strPassword."'";
			$objQuery = mysql_query($strSQL);
			$objResult = mysql_fetch_array($objQuery);

			$SQL = "SELECT * FROM employee WHERE emp_id = '".$strUsername."'
			and emp_tel = '".$strPassword."'";
			$Query = mysql_query($SQL);
			$Result = mysql_fetch_array($Query);

			if ($_POST["user"] == null && $_POST["password"] == null ) {
				echo"<script language=\"JavaScript\">";
				echo"alert('กรุณาใส่ ID และรหัสผ่าน');";
				echo "window.location.href = 'login.php' ";
				echo"</script>";
			}
			elseif ($_POST["password"] == null) {
				echo"<script language=\"JavaScript\">";
				echo"alert('กรุณาใส่รหัสผ่าน');";
				echo "window.location.href = 'login.php' ";
				echo"</script>";
			}
			elseif ($_POST["user"] == null) {
				echo"<script language=\"JavaScript\">";
				echo"alert('กรุณาใส่ ID');";
				echo "window.location.href = 'login.php' ";
				echo"</script>";
			}
			elseif ($strUsername == "admin" || $strPassword == "admin") {
				$_SESSION["status"] = "1";
				session_write_close();
				header("location:adminpage.php");
			}

			if(!$objResult and !$Result)
			{
				echo"<script language=\"JavaScript\">";
				echo"alert('ID หรือ รหัสผ่านผิด!');";
				echo "window.location.href = 'login.php' ";
				echo"</script>";

			}
			else
			{
				$_SESSION["user"] = $objResult["user"];
				$_SESSION["status"] = $objResult["status"];

				if($objResult["status"] == "0")
				{
					$_SESSION["member_id"] = $objResult["member_id"];
					session_write_close();
					header("location:index.php");
				}
				else if($objResult["status"] == "1")
				{
					$_SESSION["status"];
					$_SESSION["member_id"] = $objResult["member_id"];
					session_write_close();
					header("location:index.php");
				}
				else 
				{
					$_SESSION["emp_id"] = $Result["emp_id"];
					session_write_close();
					header("location:index_emp.php");
				}

			}
			mysql_close();
			?>
