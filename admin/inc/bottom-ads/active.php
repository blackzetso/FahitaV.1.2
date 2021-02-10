<?php 
    include '../../../connect.php';
    include '../../../inc/App/function.php';

    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;


    $stmt = $con->prepare("SELECT * FROM top_ads WHERE id = ? ");
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    $stmt = $con->prepare("SELECT * FROM top_ads where active = '1' ");
    $stmt->execute();
    $Count = $stmt->rowCount();
    
    if($row['active'] == '1') { 
        $stmt = $con->prepare("UPDATE `top_ads` SET active = '0' WHERE id = ? ");
        $stmt->execute([$id]);
        if($stmt){ ?>
            <a href="javascript:void(0)" onclick="getinfo('inc/top-ads/active.php?id=<?php echo $row['id'] ?>','#id<?php echo $row['id'] ?>')" class="btn btn-success" ><i class="fa fa-check" ></i></a>
            <a href="top-ads-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info" ><i class="fa fa-edit" ></i></a>
            <a href="javascript:void(0)" class="btn btn-danger delete" data-toggle="modal" data-target="#item" data-id="<?php echo $row['id']; ?>" ><i class="fa fa-trash" ></i> </a>
    <?php }
    } else {
        if($Count < 2){
            $stmt = $con->prepare("UPDATE `top_ads` SET active = '1' WHERE id = ? ");
            $stmt->execute([$id]);
            if($stmt){ ?>
                <a href="javascript:void(0)" onclick="getinfo('inc/top-ads/active.php?id=<?php echo $row['id'] ?>','#id<?php echo $row['id'] ?>')" class="btn btn-warning" ><i class="fa fa-times" ></i></a>
                <a href="top-ads-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info" ><i class="fa fa-edit" ></i></a>
                <a href="javascript:void(0)" class="btn btn-danger delete" data-toggle="modal" data-target="#item" data-id="<?php echo $row['id']; ?>" ><i class="fa fa-trash" ></i> </a>    
    <?php } }else{ ?>
                <a href="javascript:void(0)" onclick="getinfo('inc/top-ads/active.php?id=<?php echo $row['id'] ?>','#id<?php echo $row['id'] ?>')" class="btn btn-success" ><i class="fa fa-check" ></i></a>
                <a href="top-ads-edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info" ><i class="fa fa-edit" ></i></a>
                <a href="javascript:void(0)" class="btn btn-danger delete" data-toggle="modal" data-target="#item" data-id="<?php echo $row['id']; ?>" ><i class="fa fa-trash" ></i> </a>    
            <script>
                toastr.warning('لايمكن تفعيل أكثر من إعلانين في نفس الوقت');
            </script>
    <?php  }
    }