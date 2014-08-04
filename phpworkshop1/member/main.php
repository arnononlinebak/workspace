<?
include "chksession.php";
?>
<HTML>
<HEAD><TITLE>Member ระบบสมาชิก</TITLE></HEAD>
<BODY>
<h1>:: Logined In System ::</h1>
<p>ยินดีต้อนรับคุณ <b><?=$sess_username?></b> ท่านกำลังอยู่ในระบบสมาชิก</p>
<p> [ <a href="edit.php">แก้ไขข้อมูลส่วนตัว</a> ] 
[ <a href="changepw.php">เปลี่ยนรหัสผ่าน</a> ]
[ <a href="logout.php">ออกจากระบบ</a> ]</p>
</BODY>
</HTML>