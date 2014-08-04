<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M.A.Airsoft Register</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.js"></script>
<link href="jquery-ui.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 18px;
	color: #FFF;
}
body {
	background-image: url(2.jpg);
	background-repeat: no-repeat;
}
.welcome {
	color: #000000;
	font-size: larger;
	font-weight: bold;
	font-family: "Comic Sans MS", cursive;
}
a:link {
	color: #FFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFF;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
</style>
</head>

<body>
<table width="75%" border="1" bgcolor="#333333" align="center" >
  <tr>
    <td><table width="100%" height="100%" border="0">
      <tr>
        <td width="30%" height="42" bgcolor="#CCCCCC"><font color="#0066CC"><marquee behavior="alternate" direction="right" class="welcome" scrolldelay="200"  >WELCOME TO OUR SITE</marquee></font></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td>
        <img src="banner.jpg" width="100%" />
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="1">
      <tr>
        <th width="25%" scope="col"><a href="main.php"><img src="home.gif" width="100%" height="47" alt="" /></a></th>
        <th width="25%" scope="col"><img src="product.gif" width="100%" height="47" alt="" /></th>
        <th width="25%" scope="col"><img src="howto.gif" width="100%" height="47" alt="" /></th>
        <th width="25%" scope="col"><img src="contact.gif" width="100%" height="47" alt="" /></th>
        </tr>
      <tr>
        <td colspan="4"><form id="form4" method="post" action="insert_user.php">
        <p>&nbsp;</p>
        <table width="50%" border="1" align="center">
          <tr>
            <td colspan="2" align="center"><font color="#FFFFFF" size="5"><strong>REGISTER</strong></font></td>
          </tr>
          <tr>
            <td>USERNAME :</td>
            <td><p>
              <label for="user2"></label>
              <input name="user" type="text" id="user2" size="40" />
            </p></td>
          </tr>
          <tr>
            <td>PASSWORD :</td>
            <td><p>
              <label for="pass"></label>
              <input name="pass" type="text" id="pass" size="40" />
            </p></td>
          </tr>
          <tr>
            <td width="31%">E - MAIL :</td>
            <td width="69%"><p>
              <label for="email"></label>
              <input name="email" type="text" id="email" size="40" />
            </p></td>
          </tr>
        </table>
        <p align="center">
          <input type="submit" name="button" id="button" value="OK"  />
          <input type="reset" name="button2" id="button2" value="Cancle" />
        </p>
        <p align="center">&nbsp;</p>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
