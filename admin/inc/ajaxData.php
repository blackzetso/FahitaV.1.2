<?php
//Include database configuration file
include('../../connect.php');

if(isset($_POST["category"]) && !empty($_POST["category"])){
    //Get all state data
    $query = $con->prepare("SELECT * FROM subcategories WHERE category = ".$_POST['category']."  ");
    $query->execute();
    $subCats = $query->fetchAll();
    //Count total number of rows
    $rowCount = $query->rowCount();
    
    //Display states list
    if($rowCount > 0){ 
        foreach($subCats as $row){ 
            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">لا يوجد اقسام فرعيه لهذا القسم</option>';
    }
}

 
?>