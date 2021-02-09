<?php 
    
      if(isset($_COOKIE['langauge'])) {
          $code  = $_COOKIE['langauge'];
      }else {
          $code = 'en';
      } 
    function translate($id){
       global $con;
       global $code;     

       $stmt = $con->prepare("SELECT * FROM `language` WHERE code = ? ");
       $stmt->execute([$code]);
       $language = $stmt->fetch();
        
       $stmt = $con->prepare("SELECT * FROM `translation` WHERE lang = ? and key_id = ? ");
       $stmt->execute([$language['id'],$id]);
       $trans = $stmt->fetch(); 
        
       return ucfirst($trans['word']);
    }