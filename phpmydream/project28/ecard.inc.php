<?php
$CARD_CATS = array("birth"=>"�ѹ�Դ", "love"=>"�����ѡ", "congrat"=>"�ʴ������Թ��", 
 							"sorry"=>"�ʴ����������", "bless"=>"��¾�", "spirit"=>"�����ѧ�", 
							"festival"=>"�ȡ������ѹ�Ӥѭ", "misc"=>"�����");

function my_connect() {
	@mysql_connect("localhost", "root", "") or die(mysql_error());
	@mysql_select_db("ecard") or die(mysql_error());
}
?>