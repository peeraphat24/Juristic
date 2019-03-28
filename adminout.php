<?php
session_start();
session_destroy();
echo"<script language=\"JavaScript\">";
echo"alert('คุณได้ออกจากระบบ');";
echo "window.location.href = 'login.php' ";
echo"</script>";
?>
