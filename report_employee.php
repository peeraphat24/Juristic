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
    <title>แจ้งซ่อมบำรุง</title>
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
    <script type="text/javascript">
   $(document).ready(function(){

var counter = 2;

$("#plus").click(function () {
    
if(counter>10){
        alert("จำกัดแค่ 10 เท่านั้น");
        return false;
}   
      var newbox = $(document.createElement('div'))
      .attr("id", 'item' + counter);
      newbox.after().html('<div class="form-row"><div class="col-md">อะไหล่ที่ใช้ซ่อม'+counter+'<select  id="part'+counter+'"><option>1</option></select></div></div>');
      newbox.appendTo("#items");
      counter++;
        });
     });
    </script>
  <?php
    $host = "localhost";
    $user = "root";
    $pass = "12345678";
    $dbname = "house";

    $con = mysql_connect($host,$user,$pass);
    if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

        $sql1 = "select * from employee where emp_id = '".$_SESSION["emp_id"]."'";
        $result = mysql_query($sql1,$con);
        $num = 1;
        $sql2 = "select * from report_repair ";
        $result1 = mysql_query($sql2,$con);

        ?>
	<body>


		<?php
include('header.php');
?>
		<?php
		include('main_menu_emp.php');
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
                 แจ้งซ่อมบำรุง
               </div>
                </div>
                </center>
                <div class="panel-body">
               
               <div class="form-group">
                    <?php
                      while ($rs = mysql_fetch_array($result)) {

                    ?>
                    <div class="form-row col-md">
                              <input type="hidden" name="mem_id" value="<?php echo $_SESSION["emp_id"];?>">
                    </div><br>
                    <? }?>
                 
                          <table  class="table table-hover">
                        <tr>
                          <td align="center">#</td>
                          <td align="center">รหัสการแจ้ง</td>
                          <td align="center">เรื่อง</td>
                          <td align="center">ผู้แจ้ง</td>
                          <td align="center">วันที่แจ้ง</td>
                          <td align="center">รายละเอียด</td>
                        </tr>

                        <? $count = 0;
                    while ($rs1 = mysql_fetch_array($result1)) {
                      $count++;
                    ?>
                    <tr>
                    
                      <td><? echo $count; ?></td>
                      <td><? $id = $rs1["report_id"]; echo $id ?></td>
                      <td><? echo $rs1["report_name"];?></td>
                      <td><?php
                            $sql3 = "select * from member";
                            $result3 = mysql_query($sql3,$con);
                            while ($rs3 = mysql_fetch_array($result3))
                            {
                              ?>
                                  <?php if ($rs3["member_id"] == $rs1["member_id"]) {
                                        echo $rs3["m_firstname"]; echo " ";
                                        echo $rs3["m_lastname"]; }?>
                                  <?php
                            }
                              ?></td>
                      <td><? echo date("d/m/Y", strtotime($rs1["repair_sdate"]));;?></td>
                      
                      <td align="center"> 
                      <form action="report_employee.php" method="post"> 
                      <button class="btn btn-info" name="doo" value="<?echo $rs1["report_id"] ?>">รายละเอียด</button>
                      </td>
                    </tr>
                    
                     
                          <?} $detail = $_POST["doo"]; ?>
                    
                    </form>
                          </table>
                   
                            <!-- <div class="form-row">
                              <div class="col-md">
                            เริ่องที่แจ้ง<font color="red">*</font> &nbsp;
                              <input type="text" class="form-control" name="topic" autofocus>
                              </div>
                              <div class="col-md">
                                 สถานที่<font color="red">*</font> &nbsp;
                                <input type="text" name="place" class="form-control">
                              </div>
                            </div>                      
                              หมายเหตุ
                              <textarea name="note" class="form-control" ></textarea>
                                      <br>
                                      <center>
                                   <div class="form-row">
                                      <div class="col-md">
                                      
                                     <button type="submit" value="บันทึก" class="btn btn-success" name="submit"><i class="far fa-save"></i> บันทึก</button>
                                     &nbsp;
                                     <button type="reset" value="ล้าง" class="btn btn-danger" name="reset"><i class="fas fa-eraser"></i> ล้างข้อความ</button>
                                     </div>
                                     </div> </center> --><br>
                   <div class="container">
                     <div class="row">
                       <div class="col-md">
                          <div class="panel-group">
                             <div class="panel panel-info">
                               <div class="panel-heading">
                                 <div class="alert alert-primary" role="alert">
                                 <center>
                                     รายละเอียดแจ้งซ่อมบำรุง
                                     </center>
                                 </div>
                                </div>
                              </div>
                             </div>
                          </div>
                       </div>
                    </div>
                          <form action="">
                    <? 
                    $sqlreport = "SELECT * from report_repair where report_id = ".$detail."";
                    $resultreport = mysql_query($sqlreport,$con);
                    while ($rs4 = mysql_fetch_array($resultreport))
                    {
                    ?>
                    <div class="form-row">
                      <div class="col-md">
                        สถานที่
                        <input type="text" class="form-control" value="<? echo $rs4["address"]; ?>">
                      </div>
                    </div>
                    <? }?>
                    สาเหตุการชำรุด
                    <input type="text" class="form-control">
                    รายละเอียด
                    <textarea class="form-control"> </textarea><br>

                    <div class="form-row">
                        <div class="col-md">
                        ชื่อองค์กรภายนอก
                        <input type="text" class="form-control">
                        </div>
                        <div class="col-md">
                        เบอร์ติดต่อ
                        <input type="text" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-md">
                        ผู้รับผิดชอบ
                        <input type="text" class="form-control">
                        </div>
                    </div><br>
                    
                        <div class="form-row">
                            <div class="col-md">
                            อะไหล่ที่ใช้ซ่อม
                        <select>
                        <option>1111</option>
                        </select>
                            <input type="button" value="+" id="plus" name="plus">
                            </div>
                        </div>
                        <div id="items">
                        </div>
                        <center>
                        <div class="form-row">
                          <div class="col-md">
                          <button type="submit" value="บันทึก" class="btn btn-success" name="submit"><i class="far fa-save"></i> บันทึก</button>
                                     &nbsp;
                                     <button type="reset" value="ล้าง" class="btn btn-danger" name="reset"><i class="fas fa-eraser"></i> ล้างข้อความ</button>
                          </div>
                        </div>
                        </center>
                        </form>
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
