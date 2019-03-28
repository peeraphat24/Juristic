<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>

	</head>
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
					<h2>Blog Heading</h2>
					<table class="table table-striped table-hover ">
					<tr align="center" class="text-white bg-dark">
						<td>ลำดับที่</td>
						<td>รหัสบันทึกข้อความ</td>
						<td>ชื่อ</td>
						<td>1</td>
						<td>บ้านเลขที่</td>
						<td>วันที่</td>
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
						$strSQL = "SELECT * FROM reply re,member mem where re.member_id = mem.member_id and (mem.m_firstname like '%".$search."%' or mem.m_lastname like '%".$search."%') ";
						$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

		while($objResult = mysql_fetch_array($objQuery)){
				$count++;
					?>
					<tr align="center" class="text-dark bg-white">
						<td><?php echo $objResult["status"];?></td>
								</div>
							</div>
						</div>
					</td>
					</tr>
			<?  }?>
					<tr>
					</tr>
					<?php

					mysql_close($con);
		?>
			</table>
	Total <?php echo $Num_Rows;?> Record : <?php echo $Num_Pages;?> Page :
	<?php
	if($Prev_Page)
	{
	echo " <a href='replay.php?Page=$Prev_Page'><< Back</a> ";
	}

	for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
	echo "[ <a href='replay.php?Page=$i'>$i</a> ]";
	}
	else
	{
	echo "<b> $i </b>";
	}
	}
	if($Page!=$Num_Pages)
	{
	echo " <a href ='replay.php?Page=$Next_Page'>Next>></a> ";
	}
	mysql_close($objConnect);
	?>

		</center>
		</div>
	</div>
</div>
			</body>
		</html>
