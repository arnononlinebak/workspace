<html>
<body>
<?php
	if(isset($_GET['script'])) {
		$script = $_GET['script'];
		echo "ท่านกำลังศึกษาการเขียนสคริปต์: $script";
	}
	if(!empty($_GET['os'])) {
		$os = $_GET['os'];
		echo "<p>ท่านกำลังใช้ระบบปฏิบัติการ:  $os";
	}
?>
</body>
</html>
