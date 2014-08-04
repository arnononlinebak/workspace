<div align="center" style="font-weight: bold">
    Data From Table TBL_CATEGORIES As Below
</div><br/><br/>
<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'puremath';
    $dbname = 'test';
    $cnn = new mysqli($host,$username,$password,$dbname);
    if(mysqli_connect_errno ()){
        echo("Connect Failed : ".mysqli_connect_error());
        exit ();
    }
?>
<table style="border-collapse: collapse;" align="center" cellspacing="0" cellpadding="5" border="1">
    <tr>
        <td><div align="center" style="font-weight: bold; font-size: 12px;">Category ID</div></td>
        <td><div align="center" style="font-weight: bold; font-size: 12px;">Category Name</div></td>
        <td><div align="center" style="font-weight: bold; font-size: 12px;">Description</div></td>
    </tr>
<?php
    if($resultSet = $cnn->query("CALL GET_DATA_CATEGORIES()")){
        while($row = $resultSet->fetch_object()){
?>
    <tr>
        <td><div align="center" style="font-size: 10px;"><?php echo($row->CategoryID); ?></div></td>
        <td><div align="center" style="font-size: 10px;"><?php echo($row->CategoryName); ?></div></td>
        <td><div align="center" style="font-size: 10px;"><?php echo($row->Description); ?></div></td>
    </tr>
<?php
        }
        $resultSet->close();
        $cnn->close();
    }
?>
</table>