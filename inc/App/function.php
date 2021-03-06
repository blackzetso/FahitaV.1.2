<?php 
    
    function login_link(){
        if(isset($_SESSION['id'])){
            $link = '<li><a href="account.php"> الحساب </a> </li>';
        }else{
            $link = '<li><a href="login.php"> الدخول </a> </li>';
        } 
        return $link;
    }

    function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    // Get User Data
    function user($id,$column){
        global $con;
        
        $stmt = $con->prepare("SELECT * FROM `users` WHERE id = '$id' ");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row[$column];
    }

    // Get Row Count Function
    function getRowCount($table,$column,$value) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT id FROM `$table` WHERE $column = '$value' ");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        return $count;
    } 

    function getAllRowCount($table) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT id FROM `$table`");
        $stmt->execute();
        $count = $stmt->rowCount();
        
        return $count;
    }
    // Get Row Count Function
    function getColumn($select,$table,$column,$value) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT $select FROM `$table` WHERE $column = '$value' ");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row[$select];
    }

    function getCategoryName($id) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT * FROM `categories` WHERE id = '$id' ");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row['name'];
    }

    function getLanguageName($id) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT * FROM `language` WHERE id = '$id' ");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row['name'];
    }

    

    function getSubCategoryName($id) {
        
        global $con;
        
        $stmt = $con->prepare("SELECT * FROM `subcategories` WHERE id = '$id' ");
        $stmt->execute();
        $row = $stmt->fetch();
        
        return $row['name'];
    }

    // Error Message Function
    function errorMessage($content){
        $msg = '<div class="alert alert-danger text-center" >'.$content.'</div>';
        return $msg;
    }
    
    // Success Message Function
    function successMessage($content){
        $msg = '<div class="alert alert-success text-center" >'.$content.'</div>';
        return $msg;
    }
    
    // Success Message Function
    function warningMessage($content){
        $msg = '<div class="alert alert-warning text-center" >'.$content.'</div>';
        return $msg;
    }

    // Js Redirect To Url Finction 
    function redirect($url){
        echo "<script>document.location.href='".$url."'</script>";
    }
    // discount 
    function discount ($price,$discount){
        $result = $price - $discount;
        return $result;
    }

    //logout nav link 

    function account(){
        if(isset($_SESSION['id'])){
            $link = '<li><a href="logout.php"><i class="fas fa-sign-out-alt icon"></i> خروج </a></li>';
        } else {
            $link = '<li><a href="login.php"><i style="font-size: 28px;" class="fas fa-sign-in-alt"></i>دخول</a></li>';
        }
        
        return $link;
    }
    // Go to previos page
    function goBack(){
        if(isset($_SERVER['HTTP_REFERER'])){
            $url = $_SERVER['HTTP_REFERER'];
        }else{
            $url = '/';
        }
        return $url;
    }
    // badge
 
    function Availability($value){
        if($value == 'متوفر فى المخزن'){
            $a = '<b class="text-success" >متوفر فى المخزن</b>';
        } else {
            $a = '<b class="text-warning" >غير متوفر فى المخزن</b>';
        }
        
        return $a;
    }