<?php
include '../connect.php'; 
$response=array();
header('Content-Type: JSON');
$stmt2 = $con->prepare("SELECT * FROM attributes");
$stmt2->execute();
$rows = $stmt2->fetchAll();
foreach($rows as $k=>$v){
    $response[$k]['id']=$v['id'];
    $response[$k]['key_name']=$v['key_name'];
}
echo json_encode($response);
?>