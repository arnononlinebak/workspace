<?php
@mysql_connect("localhost", "root", "leaf") or die(mysql_error());
@mysql_select_db("poll") or die(mysql_error());
?>