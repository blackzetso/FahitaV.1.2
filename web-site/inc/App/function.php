<?php 

    function gettitle(){
        global $title;
        if(isset($title)){
            $result =  $title;
        } else {
            $result = 'Default';
        }
        return $result;
    }
    
    function login_link($translate1,$translate2){ 
        if(isset($_SESSION['id'])){
            $link = '<li><a href="logout.php"> '.$translate1.' </a> </li>';
        }else{
            $link = '<li><a href="login.php"> '.$translate2.' </a> </li>';
        } 
        return $link;
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
    
    // Js Redirect To Url Finction 
    function redirect($url){
        echo "<script>document.location.href='".$url."'</script>";
    }
    // discount 
    function discount ($price,$discount){
        $result = ($discount/$price)*100;
        
        if($result > 0){
            $a  = '<div class="flash">
                        <span class="onnew">
                            <span class="text">
                                '.ceil($result).'%
                            </span>
                        </span>
                    </div>';
        }else{
            $a = '';
        }
        
        return $a;
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

 
    function previousPage($page){ 
        if(($page - 1) > 0 ){ 
            $result = $page - 1; 
        }else{ 
            $result = '1'; 
        } 
        
        return $result;
    }

    function nextPage($page,$totalPage) {
        if(($page + 1) < $totalPage){ 
            $result = $page + 1;
        }elseif(($page + 1) >= $totalPage){ 
            $result = $totalPage;
        } 
        return $result;
    }

 