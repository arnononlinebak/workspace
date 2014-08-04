<html>
<body>
<?php
	echo "ภาษาสคริปต์ที่เขียนได้: ";
	if(isset($_GET['php'])) {
		echo $_GET['php'] . " ";
	}
	if(isset($_GET['asp'])) {
		echo $_GET['asp']. " ";
	}
	echo "<p>ระบบฏิบัติการที่เคยใช้: ";
	if(isset($_GET['win2k'])) {
		echo $_GET['win2k']. " ";
	}
	if(isset($_GET['winxp'])) {
		echo $_GET['winxp']. " ";
	}
	if(isset($_GET['winvista'])) {
		echo $_GET['winvista']. " ";
	}
?>
</body>
</html>
