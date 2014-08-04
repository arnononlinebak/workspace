<style type="text/css">
body {
	background-image: url();
	background-color: #333;
}
</style>
<?
	$link = mysql_connect("localhost", "root", "1234");
	$sql = "use usedb";
	$result = mysql_query($sql);
	$encrypted_mypassword=md5($pass);
	
	$sql="SELECT count(*) FROM user WHERE user='$user'
	AND password='$encrypted_mypassword'";
	$result=mysql_query($sql);
	$row = mysql_fetch_row($result);

	if ($row[0] == 1)
	{
		echo "<h2><font color='#FFFFFF'><center>Username and Password Correct</center></font></h2>";
		$sql="SELECT * FROM user WHERE user='$user'
		AND password='$encrypted_mypassword'";
		$result=mysql_query($sql);
		$row = mysql_fetch_array($result);
		echo "<h2><font color='#FFFFFF'><center>Welcome ".$row['user']. "</center></font><br></h2>";
		echo "<h2><a href='chatpage.php'><center><font color='#0066FF'>-----Go To Chat Room-----</font><center></a></h2>";
		
	}
	else
	{
		echo "<h2><font color='#FFF'><center>Username or Password Incorrect!</center></font></h2>";
		echo "<h2><a href='home.php'><center><font color='#0066FF'>-----Go To Home-----</font><center></a></h2>";
	}
?>

<title>Airsoft Talk</title>

