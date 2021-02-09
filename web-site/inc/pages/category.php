<?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $limit = $_POST['limit'];
        
        setcookie('num_ber_page',$limit,time()+(86400 * 365),"/"); ?>
        <script>
            location.reload();
        </script>
<?php }