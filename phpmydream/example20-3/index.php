<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Example 20-3</title>
<link rel="stylesheet" href="../css/style.css"  />

<script src="../ajax/framework.js"> </script>
<script>
function ajaxCall() {
	var data = getFormData('form1');
	var url = 'check_login.php';
	
	ajaxLoad('post', url, data, 'displayAJAX');
}

function displayResult(valid) {
	var el = document.getElementById('displayAJAX');
	if(!valid) {
		el.style.color = 'red';
		el.innerHTML = 'ชื่อนี้ใช้ไม่ได้้ หรือมีผู้ใช้แล้ว กรุณาเปลี่ยนใหม่';
		document.getElementById('login').select();
	}
	else {
		el.style.color = 'black';
		el.innerHTML = 'ชื่อนี้สามารถใช้ได้่';
	}
}
</script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  Login: 
  <label>
  <input name="login" type="text" id="login" onblur="ajaxCall()" /> 
  <span id="displayAJAX"> </span>
  </label>
  <br />
Pswd:
<label>
<input name="pswd" type="password" id="pswd" />
</label>
</form>
</body>
</html>