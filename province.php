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
  <title>จัดการข้อมูลจังหวัด</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/solid.css" integrity="sha384-HTDlLIcgXajNzMJv5hiW5s2fwegQng6Hi+fN6t5VAcwO/9qbg2YEANIyKBlqLsiT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/regular.css" integrity="sha384-R7FIq3bpFaYzR4ogOiz75MKHyuVK0iHja8gmH1DHlZSq4tT/78gKAa7nl4PJD7GP" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/brands.css" integrity="sha384-KtmfosZaF4BaDBojD9RXBSrq5pNEO79xGiggBxf8tsX+w2dBRpVW5o0BPto2Rb2F" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/fontawesome.css" integrity="sha384-8WwquHbb2jqa7gKWSoAwbJBV2Q+/rQRss9UXL5wlvXOZfSodONmVnifo/+5xJIWX" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style2.css">

  <?php
  if (!isset($_SESSION["status"])) {
    ?>
    <script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
  location="login.php";</script>
  <?php
}
?>

<body>
  <?php
  include 'adminheader.php';
  ?>
  <?php include 'adminmenu.php';?>
  <div class="wrap">
    <?php
    // include 'adminsub_menu.php';
    ?>

    <div class="content">
      <!-- <div class="wg-card"> -->
       <?php
       $host   = "localhost";
       $user   = "root";
       $pass   = "12345678";
       $dbname = "house";

       $con = mysql_connect($host, $user, $pass);
       if (!$con) {
        die("ไม่สามารถติดต่อ mysql ได้");
      }

      mysql_select_db($dbname, $con) or die("ไม่สามารถเลือกฐานข้อมูลได้");

      $sql    = "select * from province ";
      $result = mysql_query($sql, $con);
      $num    = 1;
      ?>
    <br>
<center> <h3>รายการจังหวัด</h3><br>
  <table>
    <tr>
      <form class="" action="province.php" method="post">
        <td><input type="text" name="search" value="<?=$_POST['search']?>" placeholder="ชื่อจังหวัด" class="form-control"></td>
        <td><button type="submit" name="subbtn" class="btn btn-default" title="ค้นหาข้อมูล"><i class="fas fa-search"></i> ค้นหา</button></td>
      </form>
    </tr>
  </table>
  <?php
//ถ้ามีการส่งค่าข้อมูล
  $search = $_POST['search'];

  ?>
<?   echo "<br>";?>
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
              <h3 class="modal-title" id="exampleModalLongTitle">เพิ่มจังหวัด</h3>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
              <form action="insertprovince2.php" method="post">
                <table>
                  <tr>
                    <td>ชื่อจังหวัด<font color="red">*&nbsp;</font></td>
                    <td><input type="text" size="40" name="name" class="form-control"></td>
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
  </tr>
</table>
<center>
 <div class="container">
  <div class="row">
    <div class="col-md-12">
      <table class="table table-striped table-hover ">
        <tr align="center" class="text-white bg-dark">
         <td>ลำดับที่</td>
         <td>ชื่อจังหวัด</td>
         <td>ดำเนินการ</td>
       </tr>
       <?php
      $objConnect = mysql_connect("localhost", "root", "12345678") or die("Error Connect to Database");
      $objDB      = mysql_select_db("house");
      $strSQL     = "SELECT * FROM  province where (province.PROVINCE_NAME like '%".$search."%' )";
      $objQuery   = mysql_query($strSQL) or die("Error Query [" . $strSQL . "]");
      $Num_Rows   = mysql_num_rows($objQuery);
      

$Per_Page = 10; // Per Page

$Page = $_GET["Page"];
if (!$_GET["Page"]) {
  $Page = 1;
}

$Prev_Page = $Page - 1;
$Next_Page = $Page + 1;

$Page_Start = (($Per_Page * $Page) - $Per_Page);
if ($Num_Rows <= $Per_Page) {
  $Num_Pages = 1;
} else if (($Num_Rows % $Per_Page) == 0) {
  $Num_Pages = ($Num_Rows / $Per_Page);
} else {
  $Num_Pages = ($Num_Rows / $Per_Page) + 1;
  $Num_Pages = (int) $Num_Pages;
}

$strSQL .= " order  by PROVINCE_ID ASC LIMIT $Page_Start , $Per_Page";
$objQuery = mysql_query($strSQL);
$offset   = ($Page - 1) * $Per_Page; // ตรงนี้สำคัญครับ
$count    = $offset;
        if ($objQuery) {
          while ($objResult = mysql_fetch_array($objQuery)) {
            $count++;
            ?>
            <tr align="center" class="text-dark bg-white">
             <td><?php echo $count; ?></td>
             <td align="left"><?php echo $objResult["PROVINCE_NAME"]; ?></td>
             <td><a href="#delete<?php echo $objResult["PROVINCE_ID"]; ?>" data-toggle="modal">
              <button type="button" class="btn btn-danger" value="ลบ" title="ลบข้อมูล">
                <i class="fas fa-minus-circle"></i>
              </button></a><div class="modal fade" id="delete<?php echo $objResult["PROVINCE_ID"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h3 class="modal-title" id="exampleModalLongTitle">ลบข้อมูล</h3>
                      <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                      <form action="deleteprovincce.php?id=<?php echo $objResult["PROVINCE_ID"]; ?>" method="post">
                        คุณต้องการลบข้อมูลนี้หรือไม่
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success" value="<?php echo $objResult["PROVINCE_ID"]; ?>"><i class="fas fa-eraser"></i> ลบ</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <a href="#edit<?php echo $objResult["PROVINCE_ID"]; ?>" data-toggle="modal">
                <button type="button" class="btn btn-dark" value="แก้ไข" title="แก้ไขข้อมูล">
                  <i class="fas fa-cogs"></i>
                </button></a>
                <div class="modal fade" id="edit<?php echo $objResult["PROVINCE_ID"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">แก้ไขข้อมูล</h3>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      </div>
                      <div class="modal-body">
                        <form action="editprovince2.php?id=<?php echo $objResult["PROVINCE_ID"]; ?>" method="post">
                          <table>
                            <tr>
                              <td>ชื่อจังหวัด &nbsp;</td>
                              <td><input type="text" value="<?php echo $objResult["PROVINCE_NAME"]; ?>" size="30" name="type" class="form-control"></td>
                            </tr>
                          </table>
                        </div>
                        <div class="modal-footer">
                          <input type="hidden" name="id" value="<?php echo $objResult["PROVINCE_ID"]; ?>">
                          <button type="submit" value="<?php echo $objResult["PROVINCE_ID"]; ?>" class="btn btn-success"><i class="fas fa-check"></i> ยืนยันการแก้ไข</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </td>
              <?}}?>
            </tr>
            <?php
            $num++;
          
          mysql_close($con);
          ?>

        </table>
        มีข้อมูลทั้งหมด <?php echo $Num_Rows; ?> ข้อมูล:
        <?php
        if ($Prev_Page) {
          echo " <a href='province.php?Page=$Prev_Page'><< Back</a> ";
        }

        for ($i = 1; $i <= $Num_Pages; $i++) {
          if ($i != $Page) {
            echo " <a href='province.php?Page=$i'>$i</a> ";
          } else {
            echo " [<strong>$i</strong>]";
          }
        }
        if ($Page != $Num_Pages) {
          echo " <a href ='province.php?Page=$Next_Page'>Next>></a> ";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
