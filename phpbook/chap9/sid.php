<?php
	session_start();

	echo session_id();

	session_id("1234567890abcd");

	echo "<br>". session_id();
?>