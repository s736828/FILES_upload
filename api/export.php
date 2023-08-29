<?php include_once "../DB.php";

$sql="select * from `factory` where id in (".join(",",$_POST['data']).")";
$data=$db->q($sql);
$file=fopen("../exports.csv",'w+');
fwrite($file, "\xEF\xBB\xBF");

fwrite($file,"哈囉");
foreach($data as $row){
    $str=join(",",$row);
    fwrite($file,$str);
}
fclose($file);

?>
<a href="export.csv" download>請下載</a>