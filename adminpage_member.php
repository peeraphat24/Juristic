<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="css/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="css/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Paper Dashboard by Creative Tim</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="css/assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="css/assets/css/themify-icons.css" rel="stylesheet">


</head>
<body>

<div class="wrapper">
    <?php 
    include('adminpage_side.php');
    ?>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">หน้าหลัก</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
                                    <p>แจ้งเตือน</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li >
                            <a href="#" >
                                <i class="ti-power-off"></i>
                                <p>ออกจากระบบ</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


               <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

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
              <td><button type="submit" name="subbtn" class="btn btn-default" title="ค้นหาข้อมูล"><i class="ti-search"></i> ค้นหา</button></td>
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
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addmodal" title="เพิ่มข้อมูล">
              <i class="ti-plus"></i>
             เพิ่ม</button>

            <!-- Modal -->

            <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                     <div class="modal-header">
                        <center><h3 class="modal-title" id="exampleModalLongTitle">เพิ่มสมาชิก</h3></center>

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
            <br>
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


$Per_Page = 5;   // Per Page

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
                <button type="button" class="btn btn-danger" value="ลบ" title="ลบข้อมูล"><i class="ti-eraser"></i></button></a>

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
                <button type="button" class="btn btn-dark" value="แก้ไข" title="แก้ไขข้อมูล"><i class="ti-pencil"></i></button></a>

                <div class="modal fade" id="edit<?php echo $objResult["member_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล</h3>
                        
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
                <i class="ti-agenda"></i>
                 รายละเอียด</button></a>

        <!-- Modal -->
        <div class="modal fade" id="detail<?php echo $objResult["member_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h3>
                  
              </div>
              <div class="modal-body">
              <center>
                      <table class="table table-striped">
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
          Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
          <?php
          if($Prev_Page)
          {
            echo " <a href='member.php?Page=$Prev_Page'><< Back</a> ";
          }

          for($i=1; $i<=$Num_Pages; $i++){
            if($i != $Page)
            {
                echo "[ <a href='member.php?Page=$i'>$i</a> ]";
            }
            else
            {
                echo "<b> $i </b>";
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>
        


    <!--   Core JS Files   -->
    <script src="css/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="css/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="css/ssets/js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="css/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="css/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="css/assets/js/paper-dashboard.js"></script>

    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="css/assets/js/demo.js"></script>

    <!-- <script type="text/javascript">
        $(document).ready(function(){

            demo.initChartist();

            $.notify({
                icon: 'ti-gift',
                message: "Welcome to <b>Paper Dashboard</b> - a beautiful Bootstrap freebie for your next project."

            },{
                type: 'success',
                timer: 4000
            });

        });
    </script> -->

</html>
