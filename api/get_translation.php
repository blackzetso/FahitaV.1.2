<?php
include '../connect.php'; 
include '../inc/App/function.php';
$response=array();
header('Content-Type: JSON');
$id=$_GET['key_id'];
$stmt2 = $con->prepare("SELECT * FROM translation WHERE key_id = '$id' ");
$stmt2->execute();
$rows = $stmt2->fetchAll();
foreach($rows as $k=>$v){
    $response[$k]['id']=$v['id'];
    $response[$k]['word']=$v['word'];
    $response[$k]['lang']=getLanguageName($v['lang']);
}
echo json_encode($response);
?>