<?php
  session_start();
  @ini_set('display_errors', '0');

?>
<!DOCTYPE html>
<html lang="en">
<link rel="shortcut icon" type="image/x-icon" href="pic/icon.ico">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ขอใช้สถานที่</title>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/regular.css" integrity="sha384-R7FIq3bpFaYzR4ogOiz75MKHyuVK0iHja8gmH1DHlZSq4tT/78gKAa7nl4PJD7GP" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/brands.css" integrity="sha384-KtmfosZaF4BaDBojD9RXBSrq5pNEO79xGiggBxf8tsX+w2dBRpVW5o0BPto2Rb2F" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta charset="utf-8">
		<title></title>
	</head>
  <?php
    $host = "localhost";
    $user = "root";
    $pass = "12345678";
    $dbname = "house";

    $con = mysql_connect($host,$user,$pass);
    if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

        $sql1 = "select * from member where member_id = '".$_SESSION["member_id"]."'";
        $result1 = mysql_query($sql1,$con);
        $num = 1;


        ?>
	<body>


		<?php
include('header.php');
?>
		<?php
		include('main_menu.php');
		?>

    	  <div class="bgg-card">
					<div class="wrap">
						<div class="content">
              <center>
                <div class="container">
                   <div class="row">
                       <div class="col-md">
               <div class="panel-group">
               <div class="panel panel-info">
               <div class="panel-heading">
                 <div class="alert alert-primary" role="alert">
                 บันทึกขอใช้สถานที่
               </div>
                </div>
                </center>
                <div class="panel-body">
               <form enctype="multipart/form-data" action="insertplace.php" method="post">
               <div class="form-group">
                    <?php
                      while ($rs = mysql_fetch_array($result1)) {

                    ?>
                    <div class="form-row col-md">
                      <div class="col-md">
                      ชื่อ
                          <input type="text"  size="30" name="memid" value="<?php
                            echo $rs['m_firstname']." ".$rs['m_lastname'];
                              ?>" class="form-control" readonly></td>
                              <input type="hidden" name="mem_id" value="<?php echo $_SESSION["member_id"];?>">
                      </div>
                      <div class="col-md">
                      บ้านเลขที่
                          <input type="text"  size="10" name="housenum" value="<?php
                            echo $rs['m_address'];
                              ?>" class="form-control" readonly>
                      </div>
                    </div><br>

                            <div class="form-row">
                              <div class="col-md">
                            สถานที่ที่ขอใช้งาน<font color="red">*</font>
                                <select select name="place" class="form-control"> 
                                  <option>โปรดเลือกสถานที่</option>
                                  <option>ซอย 1</option>
                                  <option>ซอย 2</option>
                                  <option>ซอย 3</option>
                                  <option>ซอย 4</option>
                                  <option>ซอย 5</option>
                                </select>
                              </div>
                              <div class="col-md">
                            เริ่อง<font color="red">*</font> &nbsp;</td>
                              <input type="text" class="form-control" name="topic" autofocus>
                              </div>
                            </div>                      
                            รายละเอียด<font color="red">*</font> &nbsp;
                              <textarea name="detail" class="form-control" ></textarea>
                           
                            <div class="form-row">
                              <div class="col-md">
                                  วันที่เริ่ม<font color="red">*</font> 
                              <input type="date" name="startdate" class="form-control">
                              </div>
                              <div class="col-md">
                              วันที่สิ้นสุด<font color="red">*
                              <input type="date" name="enddate" class="form-control">
                              </div>
                            </div>   
                                      <br>
                                      <center>
                                   <div class="form-row">
                                      <div class="col-md">
                                     <button type="submit" value="บันทึก" class="btn btn-success" name="submit"><i class="far fa-save"></i> บันทึก</button>
                                     &nbsp;
                                     <button type="reset" value="ล้าง" class="btn btn-danger" name="reset"><i class="fas fa-eraser"></i> ล้างข้อความ</button>
                                     </div>
                </form>
            <? }?>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
            </div>
				</div>
			</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
