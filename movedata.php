<?php
  session_start();
  @ini_set('display_errors', '0');

?>
<html lang="en">
<link rel="shortcut icon" type="image/x-icon" href="pic/icon.ico">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, height=device-height">
    <title>รายการบันทึกนำของเข้าออก</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/regular.css" integrity="sha384-R7FIq3bpFaYzR4ogOiz75MKHyuVK0iHja8gmH1DHlZSq4tT/78gKAa7nl4PJD7GP" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/brands.css" integrity="sha384-KtmfosZaF4BaDBojD9RXBSrq5pNEO79xGiggBxf8tsX+w2dBRpVW5o0BPto2Rb2F" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style2.css">

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
  include('adminheader.php');
   ?>
  <?php include('adminmenu.php');?>
  <div class="wrap">
    <?php
    // include('adminsub_menu.php');
    ?>

    <div class="content">
      <!-- <div class="rg-card"> -->
        <?php
          $host = "localhost";
          $user = "root";
          $pass = "12345678";
          $dbname = "house";

          $con = mysql_connect($host,$user,$pass);
          if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
              mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

              $sql = "select * from move";
              $result = mysql_query($sql,$con);
              $num = 1;
              ?>
              <?php

?><br>
        <center> <h3>รายการบันทึกนำของเข้าออก</h3>
        <table>
          <tr>
            <form class="" action="movedata.php" method="post">
              <td><input type="text" name="search" value="<?=$_POST['search']?>" placeholder="ชื่อ" class="form-control"></td>
              <td><button type="submit" name="subbtn" class="btn btn-default"><i class="fas fa-search"></i></button></td>
            </form>
          </tr>
        </table>
        <?php
        //ถ้ามีการส่งค่าข้อมูล
        $search = $_POST['search'];  echo "<br>";
        ?>
             <div class="container">
                  <div class="row">
                      <div class="col-md-12">
              <table class="table table-striped table-hover ">
              <tr align="center" class="text-white bg-dark">
                <td>ลำดับที่</td>
                <td>รหัสการขอใช้สถานที่</td>
                <td>ชื่อ-นามสกุล</td>
                <td>สถานที่</td>
                <td>วันที่เข้า</td>
                <td>วันที่ออก</td>
                <td>สถานะ</td>
                <td>รายละเอียด</td>
              </tr>
              <?php
              $host = "localhost";
              $user = "root";
              $pass = "12345678";
              $dbname = "house";

              $con = mysql_connect($host,$user,$pass);
              if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
                  mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
              $objConnect = mysql_connect("localhost","root","12345678") or die("Error Connect to Database");
                $objDB = mysql_select_db("house");
                $strSQL = "select * from move re,member mem where re.member_id = mem.member_id and (mem.m_firstname like '%".$search."%' or mem.m_lastname like '%".$search."%') ";
                $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                $Num_Rows = mysql_num_rows($objQuery);


$Per_Page = 10;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
  $Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
  $Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
  $Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
  $Num_Pages =($Num_Rows/$Per_Page)+1;
  $Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order by move_id ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
$offset=($Page-1)*$Per_Page; // ตรงนี้สำคัญครับ
              $count=$offset;
                if($objQuery){
				while($objResult = mysql_fetch_array($objQuery)){
				    $count++;
              ?>
              <tr class="text-dark bg-white">
                <td align="center"><?php echo $count;?></td>
                <td align="center"><?php echo $id2 = $objResult["move_id"];?></td>
                <td><?php
                    $host = "localhost";
                    $user = "root";
                    $pass = "12345678";
                    $dbname = "house";

                    $con = mysql_connect($host,$user,$pass);
                    if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
                        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

                        $sql2 = "select * from member";
                        $result2 = mysql_query($sql2,$con);

                while ($rs3 = mysql_fetch_array($result2))
                {
                ?>
                <?php if ($rs3["member_id"] == $objResult["member_id"]) {
                        echo $rs3["m_firstname"]." ".$rs3["m_lastname"];}?>
                <?php
                }
                ?></td>
                <td align="left"><?php echo $objResult["place"];?></td>
                <td  align="center"><?php echo date("d/m/Y", strtotime($objResult["start_date"]));;?></td>
                <td  align="center"><?php echo date("d/m/Y", strtotime($objResult["end_date"]));;?></td>
                <td  align="center"><?php if($objResult['permission'] == "2"){?>
                  <font color="red" title="ไม่อนุญาต"><i class="fas fa-clipboard-check"></i></font>
                <?}
                else if($objResult['permission'] == "1"){?>
                  <font color="Green" title="อนุญาต"><i class="fas fa-clipboard-check"></i></font>
              <?php }elseif($objResult['permission'] == "0"){ ?>
                    <font color="yellow" title="รอการพิจารณา"><i class="fas fa-clipboard-check"></i></font>
              <?}?>
              </td>
                <td><a href="#detail<?php echo $objResult["move_id"];?>" data-toggle="modal">
                  <!-- Button trigger modal -->
                <button type="button" class="btn btn-info view_data" value="รายละเอียด">
                <i class="fas fa-info-circle"> รายละเอียด</i>
                </button></a>
                <!-- Modal -->
                <div class="modal fade bd-example-modal-lg" id="detail<?php echo $objResult["move_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h3>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>

                      </div>
                      <div class="modal-body">
                      <center>
                        <table class="table table-hover">
                          <tr>
                              <td align="center">รายละเอียด</td>
                              <td align="center"><?php echo $objResult["move_detail"];?></td>
                          </tr>
                          <tr>
                           <td align="center">note</td>
                           <td align="center"><?php echo $objResult["note"];?></td>
                          </tr>
                        </table>

                        </center>
                      </div>
                      <div class="modal-footer">
                        <?php if($objResult['permission'] == "0")
                        {?>
                          สถานะปัจจุบัน :&nbsp;<button  class="btn btn-default" name="check" disabled><i class="fas fa-clipboard-check"></i> รอการพิจารณา</button>
                        <a href="updateplace.php?id=<?php echo $id2;?>&check=<?php echo "1";?>">
                          <button type="submit" value="1" class="btn btn-success" name="check" ><i class="fas fa-clipboard-check"></i> อนุญาต</button>
                        </a>
                        <a href="updateplace.php?id=<?php echo $id2;?>&check=<?php echo "2";?>">
                          <button type="submit" value="2" class="btn btn-danger" name="check" ><i class="fas fa-clipboard-check"></i> ไม่อนุญาต</button>
                        </a>
                      <?php }
                      else if($objResult['permission'] == "1")
                      { ?>
                        สถานะปัจจุบัน : &nbsp;<button  class="btn btn-success" name="check"  disabled><i class="fas fa-clipboard-check"></i> อนุญาต</button>
                      <?php }
                      else if($objResult['permission'] == "2" )
                      { ?>
                          สถานะปัจจุบัน : &nbsp;<button class="btn btn-danger" name="check" disabled><i class="fas fa-clipboard-check"></i> ไม่อนุญาต</button>
                        <?}?>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              </tr>
          <?  }?>
              <tr>
              </tr>
              <?php
              }
              mysql_close($con);
        ?>
          </table>
          มีข้อมูลทั้งหมด <?php echo $Num_Rows; ?> ข้อมูล:
<?php
if($Prev_Page)
{
	echo " <a href='movedata.php?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo " <a href='movadata.php?Page=$i'>$i</a> ";
	}
	else
	{
		echo "[<b> $i </b>]";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='movadata.php?Page=$Next_Page'>Next>></a> ";
}
mysql_close($objConnect);
?>

        </center>
              </div>
              </div>
              </div>
      </div>
      </div>
    <!-- </div> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>