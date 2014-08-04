<?php
header("Content-Type: application/vnd.ms-excel");
header('Content-Disposition: attachment; filename="product.xls"');

echo "
<table border=1>
<tr bgcolor=#dddddd>
	<th>ลำดับ</th><th>ชื่อสินค้า</th><th>ราคา</th>
</tr>
<tr><td>1</td><td>aaa</td><td>123</td></tr>
<tr><td>2</td><td>bbb</td><td>456</td></tr>
<tr><td>3</td><td>ccc</td><td>789</td></tr>
</table>";
?>