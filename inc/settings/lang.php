<?php 
    session_start();
    include '../../connect.php';
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
 
        $code = $_POST['lang'];
        setcookie('langauge',$code,time()+(86400 * 365),"/");  ?>
    <script>
        location.reload();
    </script>
<?php } ?>