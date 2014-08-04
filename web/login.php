<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.js"></script>

<script type="text/javascript">
	$(function(){
		$("#dialog").dialog();
		});
</script>

<div id="dialog" title="LOGIN" align="center">

    <p align="center">
      <label for="pass"></label>
    </p>
          <table width="26%" height="66" border="1" align="center">
            <tr>
              <td>USERNAME </td>
              <td align="center"><input name="user" type="text" id="user" size="25" /></td>
            </tr>
            <tr>
              <td>PASSWORD </td>
              <td align="center"><input name="pass" type="text" id="pass" size="25" /></td>
            </tr>
          </table>
          <p align="center">
            <input type="submit" name="button" id="button" value="LOGIN"  />
            </p>
          <h5 align="center"><a href="user_form.php">&gt;>>REGISTER<<&lt;</a></h5>

</div>