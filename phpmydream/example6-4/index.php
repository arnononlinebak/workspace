<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 6-4</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<?php
$path = "/AppServ";
$dir = opendir($path);

while($file = readdir($dir)) {
 	if($file == "." || $file == "..") {
		continue;
	}
	
	echo $file . "<br />";
}

closedir($dir);
?>
</body>
</html>
