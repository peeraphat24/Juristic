<?php
  session_start();
  @ini_set('display_errors', '0');

?>
<html lang="en">
<link rel="shortcut icon" type="image/x-icon" href="pics/icon.ico">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการประภทกิจกรรม</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/tooplate_style.css">
    <link rel="stylesheet" href="css/responsive.css">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<?php
  if (!isset($_SESSION["status"]))
  {
    ?>
    <script>alert("คุณไม่มีสิทธิ์เข้าถึงส่วนนี้");
    location="admin.html";</script>
    <?php
  }
?>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="adminpage.php">หน้าแรก</a>
  <button class="navbar-toggler active" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
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
            echo $rs["m_firstname"];  echo " "; echo $rs["m_lastname"];
    ?> &nbsp;
    <button class="btn btn-danger my-2 my-sm-0" data-toggle="modal" data-target="#exit">ออกจากระบบ</button>
</nav><!-- End  NAV -->
<div class="modal fade" id="exit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h1 class="modal-title" id="exampleModalLabel">ออกจากระบบ</h1>
</div>
<div class="modal-body">
  <form class="form-inline my-2 my-lg-0" action="adminout.php">
  คุณต้องการออกจากระบบหรือไม่ ?
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">ปิด</button>
  <button type="submit" class="btn btn-success">ออกจากระบบ</button>
</div>
</div>
</div>
</div>
</form>
</div>



	<?php
    $id = $_GET["id"];
		$host = "localhost";
		$user = "root";
		$pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
        $sql = "select * from typeact where type_id='$id'";
        $result = mysql_query($sql,$con);
        ?>
        <?php
        while($rs = mysql_fetch_array($result)) {
        ?>
        <br><br>
        <center>
          <div class="container">
            <div class="row">
                <div class="col-md-12">
        <div class="panel panel-info">
        <div class="panel-heading">
        <h1>แก้ไข</h1>
         </div>
         <div class="panel-body">
        <form enctype="multipart/form-data" action="edittypetools2.php" method="post">
        <div class="form-group">
        <table style="padding-top:30px;" class="text-dark">
                <tr>
                <td>ชื่อประเภท &nbsp;</td>
                <td><input type="text" value="<?php echo $rs["type_name"];?>" size="30" name="type" class="form-control"></td>
                </tr>
                <tr align=center>
                        <td colspan="2"> <br>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                       <input type="submit" value="บันทึก" name="submit" class="btn btn-success">
                        <input type="reset" value="ยกเลิก" name="reset" class="btn btn-default"></td>

                 </tr>
        </table>
        <table>
          <tr>
         <td align="center"><a href="typeact.php">
           <button type="button" class="btn btn-danger" value="กลับ">
        กลับ
      </button></a>
         </td>
          </tr>
        </table>
        </div>
        </form>
        </div>
        </div>
        </div>
        <?php
      }
        ?>
	</center>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>
</html>
