<?
$savepoll = $_POST['savepoll'];
if ($savepoll=="") {  
	echo "<h3> ERROR : ��س����͡�ѧ��Ѵ�����������ҡ����ش</h3>";
	exit();
}
$filename="poll.txt";
$fp=fopen($filename,"r");
$get_poll=fread($fp,filesize($filename));
fclose($fp);

$data_poll=explode("-",$get_poll);
$data_poll[$savepoll]=$data_poll[$savepoll]+1;
$total=array_sum($data_poll);

$set_poll=implode("-",$data_poll);

$fp=fopen($filename,"w");
fwrite($fp, $set_poll);
fclose($fp);

echo "<h3> �ѧ��Ѵ�˹���������ҡ����ش</h3>";
echo "��§���� $data_poll[0] ��<BR>";
echo "�ҭ������ $data_poll[1] ��<BR>";
echo "���� $data_poll[2] ��<BR>";
echo "��к�� $data_poll[3] ��<BR><BR>";
echo "�ӹǹ������͡������ $total ��";
?>
