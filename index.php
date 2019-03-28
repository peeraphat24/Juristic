<?php
  session_start();
  @ini_set('display_errors', '0');

?>
<!DOCTYPE html>
<html>
<html lang="en">
<link rel="shortcut icon" type="image/x-icon" href="pic/icon.ico">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/regular.css" integrity="sha384-R7FIq3bpFaYzR4ogOiz75MKHyuVK0iHja8gmH1DHlZSq4tT/78gKAa7nl4PJD7GP" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/brands.css" integrity="sha384-KtmfosZaF4BaDBojD9RXBSrq5pNEO79xGiggBxf8tsX+w2dBRpVW5o0BPto2Rb2F" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta charset="utf-8">
		<title>Welcome to Buasarin Village</title>
	</head>
  <?php
    if (!isset($_SESSION["status"]))
    {
      ?>
      <script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
      location="login.php";</script>
      <?php
    }
  ?>
	<body>
		<?php
include('header.php');
?>
		<?php
		include('main_menu.php');
		?>

    	  <div class="lg-card">
					<div class="wrap">
						<div class="content">
										<center>
							<h2>ยินดีต้อนรับ</h2>
							<?php
			                    $hostname = "localhost";
			                    $username = "root";
			                    $password = "12345678";
			                    $db   = "house";
			                    $con = mysql_connect($hostname,$username,$password);
			                        if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
			                        mysql_select_db ($db, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
			                        $sql = "select * from member where member_id='".$_SESSION["member_id"]."' ";
			                        $result = mysql_query($sql,$con);
			                        $rs = mysql_fetch_array($result);
			                      echo "คุณ ";  echo $rs["m_firstname"];  echo " "; echo $rs["m_lastname"];
			                ?>
						</center>
				</div>
			</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
