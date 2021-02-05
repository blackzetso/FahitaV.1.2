<?php 
    session_start();
    include 'connect.php';

    ini_set('display_errors','on');

    $App = 'inc/App/';
    $lang = 'inc/lang/';
    
    /* 
    include function file
    */
    //include $App  . 'function.php';  
    //include $lang . 'en.php';
    /* 
    ========================================== 
    include head and nave 
    ========================================== 
    */ 
    include $App . 'function.php';
    include 'inc/App/lang.php';
    include $App . 'head.php';
    include $App . 'nav.php';

    if(isset($_GET['lang'])){
        setcookie('langauge',$_GET['lang'],time()+(86400 * 365),"/");
        header('location:'.$_SERVER['PHP_SELF']);
    } 
    
    //include $App . 'querys.php';
/*
    function isMobileDevice() { 
     return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
    |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i" 
        , $_SERVER["HTTP_USER_AGENT"]); 
    } 
    if(isMobileDevice()){ 
        echo "Mobile Browser Detected"; 
    } 
    else { 
        echo "Mobile Browser Not Detected"; 
    } */