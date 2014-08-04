<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'puremath';
    $dbname = 'test';
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $description = $_POST['description'];
    $cnn = new mysqli($host,$username,$password,$dbname);
    if(mysqli_connect_errno ()){
        echo("Connect Failed : ".mysqli_connect_error());
        exit ();
    }
    $cmd =<<<sqlcmd
        CALL SET_DATA_CATEGORIES($category_id,'$category_name','$description');
sqlcmd;
    $resultSet = $cnn->query($cmd);
    if($resultSet){
        while($row = $resultSet->fetch_object()){
            $have_error = $row->Have_Error;
            $error_code = $row->MySql_Error_Code;
            $error_desc = $row->Short_Description;
        }
    }
?>
<table style="border-collapse: collapse;" align="center" cellpadding="5" cellspacing="0" border="1">
    <tr>
        <td><div align="center" style="font-weight: bold; font-size: 12px;">Have Error</div></td>
        <td><div align="center" style="font-weight: bold; font-size: 12px;">Error Code</div></td>
        <td><div align="center" style="font-weight: bold; font-size: 12px;">Error Description</div></td>
    </tr>
    <tr>
        <td><div align="center" style="font-size: 10px;"><?php echo($have_error); ?></div></td>
        <td><div align="center" style="font-size: 10px;"><?php echo($error_code); ?></div></td>
        <td><div align="center" style="font-size: 10px;"><?php echo($error_desc); ?></div></td>
    </tr>
    <tr>
        <td colspan="3"><div align="center"><a href="ex04_01.htm">Try Again</a></div></td>
    </tr>
</table>