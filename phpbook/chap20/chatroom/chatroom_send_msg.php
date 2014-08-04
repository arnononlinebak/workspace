<?php	session_start(); 	?>

<html>
<body bgcolor="powderblue" onUnload="exit_chatroom()">	
<form name="f" method="post" action="chatroom_add_msg.php" 
 		target="iframe1">   
	<input type="hidden" name="nickname" 
 		value="<?php echo urldecode($_SESSION['nickname']); ?>">		
	<input type="hidden" name="color" value="<?php echo $_SESSION['color']; ?>">

	ข้อความ:<input type="text" name="message" size="50" maxlength="100" >
	<input type="button"  value=" ส่ง  " onclick="f.submit(); f.message.value=''">
	<p>
	<input type="button" value="ออก" 
 	onclick="exit_chatroom(); parent.window.location='chatroom_start.php'">  
 								
</form>
<iframe name="iframe1" style="display:none">		
</iframe>
</body>
</html>

<script language="javascript">
function exit_chatroom() {		
 	if(window.winexit==null) {
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
}

</script> 

<?php
	unset($_SESSION['nickname']);
	unset($_SESSION['color']);
?>
