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
    <title>บันทึกข้อความ</title>

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
      $id = $_GET["id"];
      $host = "localhost";
      $user = "root";
      $pass = "12345678";
      $dbname = "house";

      $con = mysql_connect($host,$user,$pass);
      if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
          mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");

          $sql1 = "select * from replay where replay_id = '$id'";
          $result1 = mysql_query($sql1,$con);
          while($rs = mysql_fetch_array($result1)) {
          ?>
<body>
  <center>
    <br><br>
    <div class="container">
       <div class="row">
           <div class="col-md-12">
   <div class="panel-group">
   <div class="panel panel-info">
   <div class="panel-heading">
     <div class="alert alert-primary" role="alert">
     บันทึกข้อความ
   </div>
    </div>
    <div class="panel-body">
   <form enctype="multipart/form-data" action="editsavereplay2.php" method="post">
   <div class="form-group">
      <table style="table table-striped table-hover">
                  <tr>
                  <td>รายละเอียด &nbsp;</td>
                  <td> <input type="text" value="<?php echo $rs["re_detail"];?>" name="detail" class="form-control" size="50"></td>
                  </tr>
      </table><?php }?>
                  <table>
                    <tr align=center>
                            <td colspan="2"> <br>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                           <input type="submit" value="บันทึก" name="submit" class="btn btn-success">
                           <input type="reset" value="ยกเลิก" name="reset" class="btn btn-default">
                          </td>
                     </tr>
                     <tr>
                       <td align="center"><a href="savereplay.php"><button type="button" class="btn btn-danger" value="แก้ไข">
                    กลับ
                    </button></a></td>
                     </tr>
                  </table>
    </form>


          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        </body>
        </html>
