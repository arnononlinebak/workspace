<?php
$CARD_CATS = array("birth"=>"วันเกิด", "love"=>"ความรัก", "congrat"=>"แสดงความยินดี", 
 							"sorry"=>"แสดงความเสียใจ", "bless"=>"อวยพร", "spirit"=>"ให้กำลังใจ", 
							"festival"=>"เทศกาลและวันสำคัญ", "misc"=>"เบ็ดเตล็ด");

function my_connect() {
	@mysql_connect("localhost", "root", "") or die(mysql_error());
	@mysql_select_db("ecard") or die(mysql_error());
}
?>