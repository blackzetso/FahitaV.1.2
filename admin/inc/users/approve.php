<?php
    include '../../../connect.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

    $stmt = $con->prepare("UPDATE users SET approve = '1' WHERE id = ? ");
    $stmt->execute([$id]);
    if($stmt){ ?> 
        <i class="fa fa-check text-success" ></i>
    <?php }
    