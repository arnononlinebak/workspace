<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.js"></script>

<script type="text/javascript">
        $(function(){
                $("#Tab").tabs();       
        });
</script>

<script type="text/javascript">
        $(function(){
                $("#accordiancontents").accordion({collapsible: true});      
        });
</script>

<script type="text/javascript">
	$(function(){
	$( "#dialog-form" ).dialog( "open" );
	});
</script>

<title>Airsoft Talk</title>

<style type="text/css">
.welcome {
        font-size: xx-large;
        color: #FFF;
        font-weight: bold;      
}
body,td,th {
	font-family: "Courier New", Courier, monospace;
	font-size: 24px;
	color: #FFF;
}
body {
        background-image: url(2.jpg);
        background-repeat: repeat;
}
.detail {
	text-align: justify;
	font-size: 18px;
	font-family: "Arial Black", Gadget, sans-serif;
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
<script type="text/javascript" src="cbjscbinsmenu0.js"></script>
<script type="text/javascript" src="cbjscbinsmenu.js"></script>

<table width="75%" border="1" align="center" bgcolor="#000000">
  <tr>
    <td bgcolor="#000000">
        <marquee behavior="alternate" direction="left" class="welcome" scrolldelay="200"  >WELCOME TO AIRSOFT TALK</marquee>
    </td>
  </tr>
  <tr>
    <td width="20%"><img src="pic.gif" width="100%" /></td>
  </tr>
  <tr>
    <td>
    <p><center><form id="form4" method="post" action="insert_user.php">
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
            <td width="37%">E - MAIL :</td>
            <td width="63%"><p>
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
        </form></center></p>
    <p><a href="home.php">&lt;&lt;&lt;&lt;Go To Homepage</a></p></td>
  </tr>
</table>
</body>
</html>
