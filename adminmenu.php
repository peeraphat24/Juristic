<ul class="main_menu">
	<nav class="navbar fixed-top navbar-expand navbar-light"  style="background-color: #011f4b;">
	  <a class="navbar-brand text-light " href="adminpage.php"><h3>หน้าแรก</h3></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">ข้อมูลพื้นฐาน</a>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="job.php">ตำแหน่ง</a>
        <a class="dropdown-item" href="typemem.php">ประเภทสมาชิก</a>
        <a class="dropdown-item" href="typetools.php">ประเภทเครื่องมือ</a>
        <a class="dropdown-item" href="typeact.php">ประเภทกิจกรรม</a>
			  <a class="dropdown-item" href="typepay.php">ประเภทการจ่ายเงิน</a>
		  	<a class="dropdown-item" href="work.php">ข้อมูลงาน</a>
			  <a class="dropdown-item" href="province.php">ข้อมูลจังหวัด</a>
			  <a class="dropdown-item" href="unit.php">ข้อมูลหน่วยนับ</a>
    </div>
  </li>
  
  <li class="nav-item dropdown">
	  <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">เอกสาร</a>
	  <div class="dropdown-menu">
	    <a class="dropdown-item" href="<?php echo $base_path; ?>placedata.php">ขอใช้สถานที่</a>
	    <a class="dropdown-item" href="<?php echo $base_path; ?>movedata.php">อนุญาตนำของเข้า - ออก</a>
	    <a class="dropdown-item" href="<?php echo $base_path; ?>buildingdata.php">บันทึกต่อเติมบ้าน</a>
	    <a class="dropdown-item" href="<?php echo $base_path; ?>replay.php">บันทึกข้อความ</a>
	  </div>
  </li>
  
  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">บุคคล</a>
	  <div class="dropdown-menu">
      <a class="dropdown-item" href="<?php echo $base_path; ?>member.php">สมาชิก</a>
      <a class="dropdown-item" href="<?php echo $base_path; ?>employee.php">พนักงาน</a>
      <a class="dropdown-item" href="<?php echo $base_path; ?>referee.php">กรรมการ</a>
	    <a class="dropdown-item" href="<?php echo $base_path; ?>car.php">รถยนต์</a>
	  </div>
  </li>

  <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">อุปกรณ์และเครื่องมือ</a>
  <div class="dropdown-menu">
  <a class="dropdown-item" href="<?php echo $base_path; ?>tools.php">เครื่องมือ</a>
	<a class="dropdown-item" href="#">เบิกเครื่องมือ</a>

  </div>
  </li>
  <a class="navbar text-light" href="repairdata.php">ซ่อมบำรุง</a>
  <a class="navbar text-light" href="#">กิจกรรม</a>
	<a class="navbar text-light" href="meeting.php">ประชุม</a>
	<a class="navbar text-light" href="#">สาธารณูปโภค</a>
	<a class="navbar text-light" href="#">รายงาน</a>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	    </ul>
			                        <font color="white"> ผู้จัดการ </font>

&nbsp;&nbsp;
      <button class="btn btn-danger my-2 my-sm-0 " data-toggle="modal" data-target="#exit"><i class="fas fa-sign-out-alt"></i>  </button>
  </nav><!-- End  NAV -->
  <div class="modal fade" id="exit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
    <h3 class="modal-title" id="exampleModalLabel">ออกจากระบบ</h3>
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>

  </div>
  <div class="modal-body">
    <form class="form-inline my-2 my-lg-0" action="adminout.php">
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
