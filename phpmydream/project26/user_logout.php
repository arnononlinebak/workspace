<?php
session_start();
unset($_SESSION['user_id'], $_SESSION['user_name']);

header("Refresh: 3; url=index.php");
echo "��ҹ�͡�ҡ�к����� ��ШС�Ѻ���˹����ѡ� 3 �Թҷ�";
exit;
?>