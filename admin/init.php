<?php 
    session_start();
    include '../connect.php';
    if(!isset($_SESSION['admin'])){
        header('location:login.php');
    }

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
    include '../'. $App . 'function.php';
    include $App . 'head.php';
    include $App . 'nav.php';
    include $App . 'aside.php';
    //include $App . 'querys.php';