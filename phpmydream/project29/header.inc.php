<table border="0" cellspacing="1" cellpadding="3" bgcolor="#CCFFCC" align="center" style="border: solid 1px green;">
  <tr align="left">
    <td colspan="5" bgcolor="#CC99FF" style="font-size: 18pt; color: #FFFF00;">Basic Auction Project</td>
  </tr>
  <tr align="center">
    <td width="120"><a href="index.php">Index</a></td>
	<?php
	if(!isset($_SESSION['user_id'])) {
	?>
	 <td width="100"><a href="user_subscribe.php">Subscribe</a></td>
    <td width="120"><a href="user_login.php">Login</a></td>
	<td width="200">&nbsp;</td>
	<?php
	}
	else {
	?>
	 <td width="120"><a href="new_item.php">	New Item</a></td>
	 <td width="100"><a href="user_logout.php">Logout</a></td>
	 <td width="200" align="right">User: <?php echo $_SESSION['user_name']; ?></td>
	 <?php
	 }
	 ?>
  </tr>
</table>
<br />