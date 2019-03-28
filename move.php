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
    <title>ขออนุญาตนำของเข้า - ออก</title>
	<head>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/regular.css" integrity="sha384-R7FIq3bpFaYzR4ogOiz75MKHyuVK0iHja8gmH1DHlZSq4tT/78gKAa7nl4PJD7GP" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/brands.css" integrity="sha384-KtmfosZaF4BaDBojD9RXBSrq5pNEO79xGiggBxf8tsX+w2dBRpVW5o0BPto2Rb2F" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta charset="utf-8">
	
     <script type="text/javascript">

$(document).ready(function(){

    var counter = 2;
    
  $("#AddButton").click(function () {
        
  if(counter>10){
            alert("จำกัดแค่ 10 เท่านั้น");
            return false;
  }   
    
  var newbox = $(document.createElement('div'))
      .attr("id", 'item' + counter);
      newbox.after().html('<div class="form-row col-md"><div class="col-md-6">รายการ #'+counter+'<font color="red">*</font> &nbsp;<input type="text" name="item'+counter+'" class="form-control"></div><div class="col-md-2"><br><input type="text" name="amount'+counter+'"  placeholder="จำนวน" class="form-control"></div><div class="col-md-3">หมายเหตุ<input type="text" name="note'+counter+'" class="form-control"></div> <div class="col"><br><input type="button" id="RemoveButton'+counter+'" value="-" class="btn btn-danger"></div>');
      newbox.appendTo("#items");
    
  counter++;
     });

$("#RemoveButton").click(function () {
	if(counter==1){
          alert("ไม่สามารถลบได้");
          return false;
       }   
        
	counter--;
			
        $("#item"+counter).remove();

     });
 $("#RemoveButton"+counter).click(function () {
	if(counter==1){
          alert("ไม่สามารถลบได้");
          return false;
       }   
        
	counter--;
			
        $("#item"+counter).remove();

     });
  });

 
     
</script> 

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
                 บันทึกขออนุญาตนำของเข้า - ออก
               </div>
                </div>
                </center>
                <div class="panel-body">
               <form enctype="multipart/form-data" action="insertmove.php" method="post" >
               <div class="form-group">
                    <?php
                      while ($rs = mysql_fetch_array($result1)) {

                    ?>  <div class="form-row"> 
                          <div class="form-group col-md">
                          ชื่อ
                          <input type="text"  size="30" name="memid" value="<?php
                            echo $rs['m_firstname']." ".$rs['m_lastname'];
                              ?>" class="form-control" readonly>
                              </div>
                              <div class="form-group col-md">
                              <input type="hidden" name="mem_id" value="<?php echo $_SESSION["member_id"];?>">
                              สถานที่
                          <input type="text"  size="10" name="place" value="<?php
                            echo $rs['m_address'];
                              ?>" class="form-control" readonly>
                              </div>
                             <br>
                          </div>
                          <div class="form-row">
                            <div class="col-sm">
                         วันที่เริ่ม<font color="red">*</font>
                              <input type="date" name="startdate" class="form-control" >
                            </div>
                            <div class="col-sm">
                         วันที่สิ้นสุด<font color="red">*</font>
                              <input type="date" name="enddate" class="form-control" >
                            </div>
                         </div><br>
                         <div class="form-row col-md">
                           <div class="col-md-6">
                             รายการ<font color="red">*</font> &nbsp;
                            <input type="text" name="item" class="form-control">
                           </div>
                          <div class="col-md-2"><br>
                           <input type="text" name="amount"  placeholder="จำนวน" class="form-control">
                           </div>
                           <div class="col-md-3">
                           หมายเหตุ
                              <input type="text" name="note" class="form-control">
                           </div>
                           <div class="col"><br>
                           <input type="button" id="RemoveButton" value="-" class="btn btn-danger">
                           </div>
                         </div>
                           <div class="form" id="items">
                           </div>
                            <br>
                              <!-- <td><input type="button" id="removeButton" value="ลบรายการ" class="btn btn-default"></td> -->
                          <center>
                          <div class="form-row">
                          <div class="col-md">
                          <button type="submit" value="บันทึก" class="btn btn-success" name="submit"><i class="far fa-save"></i> บันทึก</button>
                          <button type="reset" value="ล้าง" class="btn btn-danger" name="reset"><i class="fas fa-eraser"></i> ล้างข้อความ</button>
                          <input type="button" id="AddButton" value="เพิ่มรายการ" class="btn btn-default">
                          <button class="btn btn-info"><i class="fas fa-print"></i></button>
                          </div>
                          </center>
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
