<?php
	session_start();
	if(!isset($_SESSION['nickname'])) {
		echo "<script> window.location = 'chatroom_start.php'; </script>";
		exit();
	}
?>
<html>
<title><?php echo $_SESSION['nickname']; ?></title>
<frameset cols="*, 25%" onUnload = "exit_chatroom()">	   
<frameset rows="75%, *">
	<frame name="frame_show_msg" src="chatroom_show_msg.php">
	<frame name="frame_send_msg" src="chatroom_send_msg.php">
</frameset>
<frame name="frame_show_nick" src="chatroom_show_nick.php" 
 	scrolling="no" noResize>
</frameset>
</html>

<script language="javascript">
function exit_chatroom() {		
 	w =  "width=10, height=10, menubar=no, toolbar=no, "
 	w += "location=no, directories=no, scrollbars=no, status=no, resizable=no"
 	<?php	
 		$nickname = urlencode($_SESSION['nickname']);
		$qry_str = "nickname=" . $nickname;
		$qry_str .= "&sid=" . session_id();
		$url = "chatroom_exit.php" . "?" . $qry_str;
		
	?>

	winexit = window.open("<?php echo $url; ?>", "winexit", w);
}
</script>