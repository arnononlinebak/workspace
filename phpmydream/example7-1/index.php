<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 7-1</title>
<link rel="stylesheet" href="../css/style.css"  />
</head>

<body>
<form id="form1" name="form1" method="post" action="process_data.php">
  <strong>ชื่อ:</strong><br /> 
  <label>
  <input name="name" type="text" id="name" size="43" />
  </label>
  <br />
  <strong>ที่อยู่:</strong><br />
<label>
<textarea name="address" cols="40" rows="2" id="address"></textarea>
</label>
<br />
<strong>วิธีชำระเงิน: 
<label> </label>
</strong>
<label><br />
<input name="payment" type="radio" value="ธนาณัติ" />
ธนาณัติ</label> <label>
 <input name="payment" type="radio" value="โอนผ่านธนาคาร" />
 โอนผ่านธนาคาร</label>
 <br />
 <label>
 <input name="payment" type="radio" value="บัตรเครดิต" />
 บัตรเครดิต</label>
  <label></label>
  <label>
  <select name="card" id="card">
    <option value="Visa" selected="selected">Visa</option>
    <option value="MasterCard">MasterCard</option>
    <option value="Amex">Amex</option>
  </select>
  </label>
  <br />
  <br />
  <label>
  <input type="submit" name="Submit" value="ขั้นตอนถัดไป &gt;&gt;" />
  </label>
  <br />
</form>
</body>
</html>