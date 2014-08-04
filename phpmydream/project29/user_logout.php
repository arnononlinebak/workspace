<?php
session_start();
unset($_SESSION['user_id'], $_SESSION['user_name']);

header("Refresh: 1; url=index.php");
exit;
?>