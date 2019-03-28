<!DOCTYPE html>
<html >
<head><title>Log in</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="formCss1.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/regular.css" integrity="sha384-R7FIq3bpFaYzR4ogOiz75MKHyuVK0iHja8gmH1DHlZSq4tT/78gKAa7nl4PJD7GP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/brands.css" integrity="sha384-KtmfosZaF4BaDBojD9RXBSrq5pNEO79xGiggBxf8tsX+w2dBRpVW5o0BPto2Rb2F" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">

</head>
 <script>
  // public function checklogin(){
  //   <?

  //    mysql_connect("localhost","root","12345678");
	// 		mysql_select_db("house");
	// 		$strUsername = mysql_real_escape_string($_POST['user']);
	// 		$strPassword = mysql_real_escape_string($_POST['password']);
	// 		$strSQL = "SELECT * FROM member WHERE member_id = '".$strUsername."'
	// 		and m_tel = '".$strPassword."'";
	// 		$objQuery = mysql_query($strSQL);
	// 		$objResult = mysql_fetch_array($objQuery);

	// 		$SQL = "SELECT * FROM employee WHERE emp_id = '".$strUsername."'
	// 		and emp_tel = '".$strPassword."'";
	// 		$Query = mysql_query($SQL);
	// 		$Result = mysql_fetch_array($Query);

	// 		if ($_POST["user"] == null && $_POST["password"] == null ) {
	// 			echo"<script language=\"JavaScript\">";
	// 			echo"alert('กรุณาใส่ ID และรหัสผ่าน');";
	// 			echo "window.location.href = 'login.php' ";
	// 			echo"</script>";
	// 		}
	// 		elseif ($_POST["password"] == null) {
	// 			echo"<script language=\"JavaScript\">";
	// 			echo"alert('กรุณาใส่รหัสผ่าน');";
	// 			echo "window.location.href = 'login.php' ";
	// 			echo"</script>";
	// 		}
	// 		elseif ($_POST["user"] == null) {
	// 			echo"<script language=\"JavaScript\">";
	// 			echo"alert('กรุณาใส่ ID');";
	// 			echo "window.location.href = 'login.php' ";
	// 			echo"</script>";
	// 		}
	// 		elseif ($strUsername == "admin" || $strPassword == "admin") {
	// 			$_SESSION["status"] = "1";
	// 			session_write_close();
	// 			header("location:adminpage.php");
	// 		}

	// 		if(!$objResult and !$Result)
	// 		{
	// 			echo"<script language=\"JavaScript\">";
	// 			echo"alert('id หรือ รหัสผ่านผิด!');";
	// 			echo "window.location.href = 'login.php' ";
	// 			echo"</script>";

			// }
	// 		else
	// 		{
	// 			$_SESSION["user"] = $objResult["user"];
	// 			$_SESSION["status"] = $objResult["status"];

	// 			if($objResult["status"] == "0")
	// 			{
	// 				$_SESSION["member_id"] = $objResult["member_id"];
	// 				session_write_close();
	// 				header("location:index.php");
	// 			}
	// 			else if($objResult["status"] == "1")
	// 			{
	// 				$_SESSION["status"];
	// 				$_SESSION["member_id"] = $objResult["member_id"];
	// 				session_write_close();
	// 				header("location:index.php");
	// 			}
	// 			else if($objResult["status"] == "")
	// 			{
	// 				$_SESSION["emp_id"] = $Result["emp_id"];
	// 				session_write_close();
	// 				header("location:index_emp.php");
	// 			}

	// 		}
  // ?>
 </script>
<body>
  <?php
@ini_set('display_errors', '0');
$host   = "localhost";
$user   = "root";
$pass   = "12345678";
$dbname = "house";
$sub    = $_POST['login'];
session_start();
?>
  <form action="CheckLogin.php" method="post" >
   <div class="login-card"  >
    <h1>เข้าสู่ระบบ</h1><br>
    <form>
      <input type="text" name="user" placeholder="Username">
      <input type="password" name="password" placeholder="Password" maxlength="10">
      <input type="submit" name="login" class="login login-submit " value="login" onclick="checklogin()">
    </form>

  </form>
</body>
</html>
