<?php 

    include '../../connect.php';

   
    //$cat1 = isset($_POST['cat1']) ? $_POST['cat1'] : '';
    //$cat2 = isset($_POST['cat2']) ? $_POST['cat2'] : '';
    //$cat3 = isset($_POST['cat3']) ? $_POST['cat3'] : '';

    $stmt = $con->prepare("SELECT * FROM categories ");
    $stmt->execute();
    $cats = $stmt->fetchAll();

    $i = '1';
    $l = '1';

    foreach($cats as $cat){
        
       
        
    }

