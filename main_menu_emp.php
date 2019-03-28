<?php
session_start();
@ini_set('display_errors', '0');
?>
<ul class="main_menu">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="index.php"><?php
		$images      = "pic/busarin.jpg";
		$new_images  = "pic/busarin1.jpg";
		$width       = 80; //*** Fix Width & Heigh (Autu caculate) ***//
		$size        = GetimageSize($images);
		$height      = round($width * $size[1] / $size[0]);
		$images_orig = ImageCreateFromJPEG($images);
		$photoX      = ImagesX($images_orig);
		$photoY      = ImagesY($images_orig);
		$images_fin  = ImageCreateTrueColor($width, $height);
		ImageCopyResampled($images_fin, $images_orig, 0, 0, 0, 0, $width + 1, $height + 1, $photoX, $photoY);
		ImageJPEG($images_fin, $new_images);
		ImageDestroy($images_orig);
		ImageDestroy($images_fin);
		?>
		<img src="<?php echo $new_images; ?>"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="index_emp.php">หน้าแรก <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="index_emp.php">ตารางการทำงาน <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="report_employee.php">ซ่อมบำรุง <span class="sr-only">(current)</span></a>
				</li>
			</ul>
			<?php
			$hostname = "localhost";
			$username = "root";
			$password = "12345678";
			$db       = "house";
			$con      = mysql_connect($hostname, $username, $password);
			if (!$con) {
				die("ไม่สามารถติดต่อ mysql ได้");
			}

			mysql_select_db($db, $con) or die("ไม่สามารถเลือกฐานข้อมูลได้");
			$sql    = "select * from employee where emp_id='" . $_SESSION["emp_id"] . "' ";
			$result = mysql_query($sql, $con);
			$rs     = mysql_fetch_array($result);
			echo $rs["emp_firstname"];
			echo " ";
			echo $rs["emp_lastname"];
			?>
			&nbsp;&nbsp;
			<button class="btn btn-danger my-2 my-sm-0 " data-toggle="modal" data-target="#exit"><i class="fas fa-sign-out-alt"></i></button>
		</nav><!-- End  NAV -->
		<div class="modal fade" id="exit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title" id="exampleModalLabel">ออกจากระบบ</h3>
					</div>
					<div class="modal-body">
						<form class="form-inline my-2 my-lg-0" action="login.php">
							คุณต้องการออกจากระบบหรือไม่ ?
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-danger">ออกจากระบบ</button>
						</div>
					</div>
				</div>
			</div>
		</form>

	</div>
</nav>
</ul>
<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
