<?php 
    include '../../connect.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id    = $_POST['id'];
        $limit = $_POST['limit'];
        //$stmt = $con->prepare("SELECT * FROM products WHERE category = ? LIMIT ? ");
        //$stmt->execute([$id,$limit]);
        //$rows = $stmt->fetchAll();
        //$Count = $stmt->rowCount();
        
        echo $id.'<br>'.$limit;
    }