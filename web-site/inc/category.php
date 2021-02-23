<?php 
    include '../connect.php';

    if($_SERVER['REQUEST_METHOD'] == "POST") { 
        $stmt = $con->prepare("SELECT * FROM subcategories WHERE category = ? ");
        $stmt->execute([$_POST['category']]);
        $subCat = $stmt->fetchAll();
        foreach($subCat as $cat){ ?>
        <option value="<?php echo $cat['id'] ?>" ><?php echo $cat['name'] ?></option>
        <?php } } ?>