<?php
  session_start();
  @ini_set('display_errors', '0');

?>
<html lang="en">
<link rel="shortcut icon" type="image/x-icon" href="pic/icon.ico">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการสมาชิก</title>
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
      
        <?php
          $host = "localhost";
          $user = "root";
          $pass = "12345678";
          $dbname = "house";

          $con = mysql_connect($host,$user,$pass);
          if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
              mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

              $sql = "select * from member";
              $result = mysql_query($sql,$con);
              $sql2 = "select * from typemember";
              $result2 = mysql_query($sql2,$con);
              $num = 1;
              ?>
              <br>
        <center> <h3>รายการสมาชิก</h3><br>

        <table>
          <tr>
            <form class="" action="member.php" method="post">
              <td><input type="text" name="search" value="<?=$_POST['search']?>" placeholder="ค้นหาโดย ชื่อ-นามสกุล" class="form-control"></td>
              <td><button type="submit" name="subbtn" class="btn btn-default" title="ค้นหาข้อมูล"><i class="fas fa-search"></i> ค้นหา</button></td>
            </form>
          </tr>
        </table>
        <?php
        //ถ้ามีการส่งค่าข้อมูล
        $search = $_POST['search'];  echo "<br>";
        ?>
      </center>
        <table>
          <tr>
            <td>
              <!-- Button trigger modal -->
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmodal" title="เพิ่มข้อมูล">
              <i class="fas fa-plus-circle"></i>
             เพิ่ม</button>

            <!-- Modal -->
            <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">เพิ่มสมาชิก</h3>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="insertmem2.php" method="post">
                    <table>
                      <tr>
                      <td>ชื่อ<font color="red">* &nbsp;</font></td>
                      <td>
                        <input type="text" size="40" name="firstname" class="form-control"></td>
                      </tr>
                      <td>นามสกุล<font color="red">* &nbsp;</font></td>
                      <td><input type="text" size="40" name="lastname" class="form-control"></td>
                      </td>
                      </tr>
                      <tr>
                      <td>ประเภทสมาชิก<font color="red">* &nbsp;</font></td>
                      <td><select name="type" class="form-control">
                        <?php
                        $host = "localhost";
                        $user = "root";
                        $pass = "12345678";
                        $dbname = "house";

                        $con = mysql_connect($host,$user,$pass);
                        if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
                            mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
                            $sql2 = "select * from typemember";
                            $result2 = mysql_query($sql2,$con);
                      while ($rs2 = mysql_fetch_array($result2))
                      {
                      ?>
                      <option value="<?php echo $rs2["type_id"];?>"
                      <?php if ($rs2["type_id"] == $rs["type_id"]) {
                              echo " selected";
                      }?>><?php echo $rs2["type_name"];?></option>
                      <?php
                      }
                      ?></select></td>
                      </tr>
                      <tr>
                      <td>เลขที่โฉนด<font color="red">* &nbsp;</font></td>
                      <td><input type="text" size="15" name="mtitle" class="form-control"></td>
                      </tr>
                      <tr>
                        <td>เลขบัตรประชาชน<font color="red">* &nbsp;</font></td>
                        <td><input type="text" size="15" name="identify" class="form-control"></td>
                      </tr>
                      <tr>
                      <td>ที่อยู่<font color="red">* &nbsp;</font></td>
                      <td><input type="text" size="8" name="maddr" class="form-control"></td>
                      </tr>
                      <tr>
                      <td>เบอร์โทรศัพท์<font color="red">* &nbsp;</font></td>
                      <td><input type="text" size="10" name="mtel" class="form-control" maxlength="10" ></td>
                      </tr>
                      <tr>
                      <td>วันเกิด<font color="red">* &nbsp;</font></td>
                      <td><input type="date" size="5" name="mbirthday" class="form-control"></td>
                      </tr>
                      <tr>
                      <td>วันที่ย้ายเข้า<font color="red">* &nbsp;</font></td>
                      <td><input type="date" size="5" name="min" class="form-control"></td>
                      </tr>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> เพิ่ม</button>

                  </div>
                  </form>
                </div>
              </div>
            </div>
            </td>
        </table>
        <center>
          
             <div class="container">
                  <div class="row">
                      <div class="col-md-12">
              <table class="table table-striped table-hover " >
              <tr align="center" class="text-white bg-dark">
                <td>ลำดับที่</td>
                <td>รหัสสมาชิก</td>
                <td>ชื่อ</td>
                <td>นามสกุล</td>
                <td>ประเภทสมาชิก</td>
                <td>เบอร์โทรศัพท์</td>
                <td>ดำเนินการ</td>
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
              $strSQL = "SELECT * FROM member where m_firstname like '%".$search."%' or m_lastname like '%".$search."%'";
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

$strSQL .=" order  by member_id ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
$offset=($Page-1)*$Per_Page; // ตรงนี้สำคัญครับ
$count=$offset;
      while($objResult = mysql_fetch_array($objQuery,MYSQLI_ASSOC)){

          $count++;
                    ?>
            <tr align="center" class="text-dark bg-white">
              <td><?php echo $count;?></td>
              <td><?php echo $objResult["member_id"];?></td>
              <td align="left"> <?php echo $objResult["m_firstname"];?></td>
              <td align="left"><?php echo $objResult["m_lastname"];?></td>
              <td align="left">
                <?php
                $sql2 = "select * from typemember";
                $result2 = mysql_query($sql2,$con);
                while ($rs2 = mysql_fetch_array($result2))
              {
              ?>
              <?php if ($rs2["type_id"] == $objResult["type_id"]) {
                      echo $rs2["type_name"];}?>
              <?php
              }
              ?></td>
              <td><?php echo $objResult["m_tel"];?></td>
              <td><a href="#delete<?php echo $objResult["member_id"];?>" data-toggle="modal">
                <button type="button" class="btn btn-danger" value="ลบ" title="ลบข้อมูล"><i class="fas fa-minus-circle"></i></button></a>

                <div class="modal fade" id="delete<?php echo $objResult["member_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">ลบข้อมูล</h3>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      </div>
                      <div class="modal-body">
                        <form action="deletemem.php?id=<?php echo $objResult["member_id"];?>" method="post">
                          คุณต้องการลบข้อมูลนี้หรือไม่
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" value="<?php echo $objResult["member_id"];?>"><i class="fas fa-eraser"></i> ลบ</button>

                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <a href="#edit<?php echo $objResult["member_id"];?>" data-toggle="modal">
                <button type="button" class="btn btn-dark" value="แก้ไข" title="แก้ไขข้อมูล"><i class="fas fa-cogs"></i></button></a>

                <div class="modal fade" id="edit<?php echo $objResult["member_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล</h3>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      </div>
                      <div class="modal-body">
                        <form action="editmem2.php?id=<?php echo $objResult["member_id"];?>" method="post">
                        <table>
                                <tr>
                                <td>ชื่อ<font color="red">*</font> &nbsp;</td>
                                <td><input type="text" value="<?php echo $objResult["m_firstname"];?>" size="70" name="firstname" class="form-control"></td>
                                </tr>
                                <td>นามสกุล<font color="red">*</font> &nbsp;</td>
                                <td><input type="text" value="<?php echo $objResult["m_lastname"];?>" size="70" name="lastname" class="form-control"></td>
                                </td>
                                </tr>
                                <tr>
                                <td>ประเภทสมาชิก<font color="red">*</font> &nbsp;</td>
                                <td><select name="type" class="form-control">

                                <?php
                                $host = "localhost";
                                $user = "root";
                                $pass = "12345678";
                                $dbname = "house";

                                $con = mysql_connect($host,$user,$pass);
                                if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
                                    mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

                                    $sql3 = "select * from member";
                                    $result3 = mysql_query($sql,$con);
                                    $sql4 = "select * from typemember";
                                    $result4 = mysql_query($sql2,$con);
                                while ($rs3 = mysql_fetch_array($result3))
                                {
                                  while ($rs4 = mysql_fetch_array($result4))
                                  {
                                ?>
                                <option value="<?php echo $rs4["type_id"];?>"
                                <?php if ($rs4["type_id"] == $rs3["type_id"]) {
                                        echo " selected";
                                }?>><?php echo $rs4["type_name"];?></option>
                                <?php
                                }
                              }
                                ?>
                                </select></td>
                                </tr>
                                <tr>
                                  <td>เลขที่โฉนด<font color="red">*</font> &nbsp;</td>
                                  <td><input type="text" value="<?php echo $objResult["numbertitle"];?>" size="10" name="mtitle" class="form-control"></td>
                                </tr>
                                <tr>
                                  <td>ที่อยู่<font color="red">*</font> &nbsp;</td>
                                  <td>
                                    <textarea name="maddr" rows="5" cols="50"  class="form-control"><?php echo $objResult["m_address"];?></textarea>
                                  </td>
                                </tr>
                                <tr>
                                  <td>เลขบัตรประชาชน</td>
                                  <td><input type="text" value="<?php echo $objResult["identify_id"];?>" class="form-control" name="iden"> </td>
                                </tr>
                                <tr>
                                  <td>เบอร์โทรศัพท์<font color="red">*</font> &nbsp;</td>
                                  <td><input type="text" value="<?php echo $objResult["m_tel"];?>" size="10" name="mtel" class="form-control"></td>
                                </tr>
                                <tr>
                                <td>วันเกิด<font color="red">*</font> &nbsp;</td>
                                <td><input type="date" value="<?php echo $objResult["m_birthday"];?>" size="5" name="mbirthday" class="form-control"></td>
                                </tr>
                                <tr>
                                <td>วันที่ย้ายเข้า<font color="red">*</font> &nbsp;</td>
                                <td><input type="date" value="<?php echo $objResult["m_in"];?>" size="5" name="min" class="form-control"></td>
                                </tr>
                                </table>
                      </div>
                      <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $objResult["member_id"];?>">
                        <button type="submit" value="<?php echo $objResult["member_id"];?>" class="btn btn-success"><i class="fas fa-check"></i> ยืนยันการแก้ไข</button>

                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </td>
              <td><a href="#detail<?php echo $objResult["member_id"];?>" data-toggle="modal" >
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-info view_data" value="รายละเอียด" title="รายละเอียด">
                <i class="fas fa-info-circle"></i>
                 รายละเอียด</button></a>

        <!-- Modal -->
        <div class="modal fade" id="detail<?php echo $objResult["member_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h3>
                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              </div>
              <div class="modal-body">
              <center>
                      <table>
                        <tr>
                          <td>รหัส</td>
                          <td><?php echo $objResult["member_id"];?></td>
                        </tr>
                      <tr>
                        <td>เลขที่โฉนด</td>
                        <td><?php echo $objResult["numbertitle"];?></td>
                      </tr>
                      <tr>
                        <td>ชื่อ - นามสกุล</td>
                        <td><?php echo $objResult["m_firstname"];echo " ";echo $objResult["m_lastname"];?></td>
                      </tr>
                      <tr>
                        <td>ประเภทสมาชิก</td>
                        <td><?php
                            $host = "localhost";
                            $user = "root";
                            $pass = "12345678";
                            $dbname = "house";

                            $con = mysql_connect($host,$user,$pass);
                            if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
                                mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

                                $sql2 = "select * from typemember";
                                $result2 = mysql_query($sql2,$con);

                        while ($rs3 = mysql_fetch_array($result2))
                        {
                        ?>
                        <?php if ($rs3["type_id"] == $objResult["type_id"]) {
                                echo $rs3["type_name"];}?>
                        <?php
                        }
                        ?></td>
                      </tr>
                      <tr>
                      <td>เลขบัตรประชาชน</td>
                        <td><?php echo $objResult["identify_id"];?></td>
                      </tr>
                      <tr>
                        <td>เบอร์โทรศัพท์</td>
                        <td><?php echo $objResult["m_tel"];?></td>
                      </tr>
                      <tr>
                        <td>ที่อยู่</td>
                        <td><?php echo $objResult["m_address"];?></td>
                      </tr>
                      <tr>
                        <td>วันที่ย้ายเข้า</td>
                        <td><?php echo date("d/m/Y", strtotime($objResult["m_in"]));?></td>
                      </tr>
                      <tr>
                        <td>วันเกิด</td>
                        <td><?php echo date("d/m/Y", strtotime($objResult["m_birthday"]));?></td>
                      </tr>
                  </table>
                </center>
              </div>
            </div>
          </div>
        </div>
        </td>
      <? }?>
            </tr>
            <?php
            mysql_close($con);
        ?>
          </table>
          มีข้อมูลทั้งหมด <?php echo $Num_Rows; ?> ข้อมูล:
          <?php
          if($Prev_Page)
          {
          	echo " <a href='member.php?Page=$Prev_Page'><< Back</a> ";
          }

          for($i=1; $i<=$Num_Pages; $i++){
          	if($i != $Page)
          	{
          		echo " <a href='member.php?Page=$i'>$i</a> ";
          	}
          	else
          	{
          		echo "[<b> $i </b>]";
          	}
          }
          if($Page!=$Num_Pages)
          {
          	echo " <a href ='member.php?Page=$Next_Page'>Next>></a> ";
          }
          mysql_close($objConnect);
          ?>
        </center>
              </div>
              </div>
              </div>

    </div>

  </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
