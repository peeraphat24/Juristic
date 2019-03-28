<?php
  session_start();
	ob_start();

	require_once "mpdf/mpdf.php";
		$host = "localhost";
		$user = "root";
		$pass = "12345678";
		$dbname = "house";

		$con = mysql_connect($host,$user,$pass);
		if(!$con) die ("ไม่สามารถติดต่อ mysql ได้");
        mysql_select_db ($dbname, $con) or die ("ไม่สามารถเลือกฐานข้อมูลได้");
?>

<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>

<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
</head>

<body>
    <div class=Section2>
        <table width="704" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td width="291" align="center">
                    <h3>รายงานสรุปงานซ่อมตามประเภทอุปกรณ์</h3>
                </td>
            </tr>
            <tr>
                <td height="25" align="center"><span class="style2">สำนักคอมพิวเตอร์และเทคโนโลยีสารสนเทศ
                        มหาวิทยาลัยเทคโนโลยีพระจอมเกล้าพระนครเหนือ วิทยาเขตปราจีนบุรี</span></td>
            </tr>
        </table>

        <br>
        <table bordercolor="#424242" width="100%" height="100%" border="1" align="center" cellpadding="0"
            cellspacing="0" class="style3">
            <tr bgcolor="#84cdce">
                <td width="7%" height="40px" align="center"><strong>ลำดับ</strong></td>
                <td width="7%" height="32" align="center"><strong>รหัสการซ่อม</strong></td>
                <td width="7%" height="32" align="center"><strong>ชื่อผู้แจ้ง</strong></td>

            </tr>


            <tr>
                <?php
		$sql="SELECT * FROM member";
    $result = mysql_query($sql);
    $i = 1;
    while($objResult =mysql_fetch_array($result)){
     ?>
            <tr>
                <td height="35px" align="center"><?php echo $i; ?></td>
                <td align="center"><?php echo $objResult[member_id]; ?></td>
                <td align="center"><?php echo $objResult[m_firstname]; ?></td>
                <td align="center"><?php echo $objResult[m_lastname]; ?></td>
                <? $i+=1 ; }?>
            </tr>
        </table>
        <table width="200" border="0">
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>

    </div>
</body>

</html>
<?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4', '0', 'THSaraban');
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();         // เก็บไฟล์ html ที่แปลงแล้วไว้ใน MyPDF/MyPDF.pdf ถ้าต้องการให้แสดง

?>