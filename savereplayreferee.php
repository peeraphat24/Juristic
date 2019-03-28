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
    <title>บันทึกข้อความ</title>
	<head>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/regular.css" integrity="sha384-R7FIq3bpFaYzR4ogOiz75MKHyuVK0iHja8gmH1DHlZSq4tT/78gKAa7nl4PJD7GP" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/brands.css" integrity="sha384-KtmfosZaF4BaDBojD9RXBSrq5pNEO79xGiggBxf8tsX+w2dBRpVW5o0BPto2Rb2F" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta charset="utf-8">
		<title></title>

    <!-- <script type="text/javascript">

$(document).ready(function(){

    var counter = 2;
    
  $("#addButton").click(function () {
        
  if(counter>2){
            alert("จำกัดแค่ 2 เท่านั้น");
            return false;
  }   
    
  var newText = $(document.createElement('td'))
       .attr("id", 'htitle' + counter);
                
  newText.after().html('หัวข้อ '+ counter +'<font color="red">*</font> &nbsp;');

  newText.appendTo("#htitle");

  var newarea = $(document.createElement('td'))
      .attr("id", 'htitle' + counter);
      newarea.after().html('<input type="text" name="headtext' + counter + '" id="headtext' + counter + '" class="form-control">');
  newarea.appendTo("#htitle");

  var newdetail = $(document.createElement('td'))
       .attr("id", 'hdetail' + counter);
                
  newdetail.after().html('รายละเอียด<font color="red">*</font> &nbsp;');
  newdetail.appendTo('#hdetail');

  var newdetail = $(document.createElement('td'))
       .attr("id", 'hdetail' + counter);
                
  newdetail.after().html('<textarea name="detail' + counter + '" id="detail' + counter + '" class="form-control"></textarea>');
  newdetail.appendTo('#hdetail');

  counter++;
     });

  });
</script> -->
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

    	  <div class="bg-card">
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
                 บันทึกข้อความ
               </div>
                </div>
                <div class="panel-body">
               <!-- <form enctype="multipart/form-data" action="insertsavereplay.php" method="post"> -->
               <div class="form-group">
                  <!-- <table >
                    <?php
                      while ($rs = mysql_fetch_array($result1)) {

                    ?>
                          <tr>
                          <td>ชื่อ<font color="red">*</font></td>
                          <td><input type="text"  size="30" name="memid" value="<?php
                            echo $rs['m_firstname']." ".$rs['m_lastname'];
                              ?>" class="form-control-plaintext" readonly></td>
                              <input type="hidden" name="mem_id" value="<?php echo $_SESSION["member_id"];?>">
                          </tr>
                          <tr>
                            <td>บ้านเลขที่<font color="red">*</font> </td>
                            <td><input type="text"  size="10" name="housenum" value="<?php
                            echo $rs['m_address'];
                            ?>" class="form-control-plaintext" readonly></td>
                          </tr>
                          <tr>
                           <td>หัวข้อ<font color="red">*</font> &nbsp;</td>
                           <td> <input type="text" name="headtext" id="headtext" class="form-control"></td>
                         </tr>
                          <tr>
                             <td>รายละเอียด<font color="red">*</font> &nbsp;</td>
                             <td> <textarea name="detail" id="detail" class="form-control" autofocus></textarea></td>
                           </tr>
                           <tr id="htitle">
                             
                           </tr>
                           <tr id="hdetail">
                             
                           </tr>
                              <tr align=center>
                                      <td colspan="2"> <br>
                                     <button type="submit" value="บันทึก" class="btn btn-success" name="submit"><i class="far fa-save"></i> บันทึก</button>
                                     &nbsp;
                                     <button type="reset" value="ล้าง" class="btn btn-danger" name="reset"><i class="fas fa-eraser"></i> ล้างข้อความ</button>
                                      &nbsp;
                                     <input type='button' value='Add Button' id='addButton' class="btn btn-default">

                                    </td>
                               </tr>

                </form>
              </table>
            <? }?>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
            </div> -->

               <table class="table"  id="myTable2">
               <tr align="center" class="text-white bg-primary">
                 <td >รหัสบันทึกข้อความ</td>
                 <td >ชื่อ</td>
                 <td >วันที่</td>
                 <td >สถานะ</td>
                 <td >หัวข้อ</td>
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

                     $sql_tt = "select * from member where member_id = '".$_SESSION["member_id"]."'";
                     $result_tt = mysql_query($sql1,$con);
                     $show = mysql_fetch_array($result_tt);
                     $name_check = $show['member_id'];

                 $sql2 = "SELECT  reply.reply_id,member.m_firstname,member.m_lastname,reply.re_title,reply.re_detail,reply.re_date,reply.re_status FROM `reply` JOIN member WHERE reply.member_id = member.member_id AND reply.re_status = 4 order by reply_id DESC";
                 $result2 = mysql_query($sql2,$con);
                 while ($rs2 = mysql_fetch_array($result2) ) {

               ?>
               <tr align="center" class="text-dark bg-white">
                 <td><?php echo $rs2["reply_id"];?></td>
                 <td align="left"><?php echo $rs2["m_firstname"]; echo " "; echo $rs2["m_lastname"];?></td>
                 <td><?php echo date("d/m/Y", strtotime($rs2["re_date"]));?></td>
                 <td><?php if($rs2['re_status'] == "3"){?>
                    <font color="red">ไม่สามารถดำเนินการได้</font>
                 <?}else if($rs2['re_status'] == "2"){?>
                     <font color="Green">ดำเนินการสำเร็จ</font>
                 <?php }else if($rs2['re_status'] == "1"){ ?>
                      <font color="blue">กำลังดำเนินการ</font>
                 <?php } else {?><font color="red">รอการพิจารณา</font>  <?php }?>

                 </td>
                 <td><?php echo $rs2["re_title"];?></td>
                 <td><a href="#detail<?php echo $rs2["reply_id"];?>" data-toggle="modal">
                   <!-- Button trigger modal -->
                 <button type="button" class="btn btn-info view_data" value="รายละเอียด">
                 <i class="fas fa-info-circle"></i>รายละเอียด
                 </button></a>
                 <!-- Modal -->
                 <div class="modal fade bd-example-modal-lg" id="detail<?php echo $rs2["reply_id"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                   <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                         </button>
                       </div>
                       <div class="modal-body">
                       <center>
                               <table class="">
                               <tr>
                               <td align="center">รายละเอียด</td>
                               </tr>
                               <tr>
                                 <td align="center"><?php echo $rs2["re_detail"];?></td>
                               </tr>
                           </table>
                         </center>
                       </div>
                       <div class="modal-footer">
                       <?php 
                      if($rs2['re_status'] == "4")
                      { ?>
                        สถานะปัจจุบัน : &nbsp;<button  class="btn btn-default" name="check"  disabled><i class="fas fa-clipboard-check"></i> รอการพิจารณา</button>
                          <a href="updatereplyreferee.php?id=<?php echo $rs2["reply_id"];?>&check=<?php echo "1";?>">
                        <button type="submit" value="1" class="btn btn-success" name="check" ><i class="fas fa-clipboard-check"></i> ยืนยันการดำเนินการ</button>
                      </a>
                      <a href="updatereplyreferee.php?id=<?php echo $rs2["reply_id"];?>&check=<?php echo "3";?>">
                    <button type="submit" value="3" class="btn btn-danger" name="check" ><i class="fas fa-clipboard-check"></i> ไม่สามารถกระทำได้</button>
                  </a>
                      <?php } ?>
                       
                         <!-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button> -->
                       </div>
                     </div>
                   </div>
                 </div>
               </td>
               </tr>
               <?php
               $num++;

             }
               mysql_close($con);
              ?>
              </table>
               </center>
              </center>

				</div>
			</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
