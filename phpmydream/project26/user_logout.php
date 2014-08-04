<?php
session_start();
unset($_SESSION['user_id'], $_SESSION['user_name']);

header("Refresh: 3; url=index.php");
echo "ท่านออกจากระบบแล้ว และจะกลับสู่หน้าหลักใน 3 วินาที";
exit;
?>