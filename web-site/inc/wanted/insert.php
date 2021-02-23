<?php
    include '../../connect.php';

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        
        $stmt = $con->prepare("INSERT INTO `wanted` (`name`) VALUES (?)");
        $stmt->execute([$name]);
        if($stmt){ ?>
        <script>
            toastr.success('<?php echo $name; ?>');
        </script>
<?php } } ?>
