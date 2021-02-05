<?php 
      
      include 'init.php'; 
      $stmt = $con->prepare("SELECT * FROM locations ORDER BY id ASC");
      $stmt->execute();
      $rows = $stmt->fetchAll(); 
      
      setcookie('location','value',time()+(86400 * 365),"/");

      if(isset($_COOKIE['location'])){
        redirect('category.php');
      } 
?>

    <section class="category">
        <div class="container">
            <div class="row" >
                <div class=" col-12  p-0">
                    <div class="item"> 
                        <div class="name">
                            <h4>الأماكن المدعومة</h4>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row" id="result" >
                <?php foreach($rows as $row){ ?>
                <div class=" col-12  p-0">
                    <div class="item">
                           
                           <div class="name">
                                <span> <?php  mb_internal_encoding("UTF-8"); echo mb_substr($row['name'],0,25); ?> </span>
                           </div> 
                    </div>
                </div>
                <?php } ?>
            </div>
            <div  class="row" style="margin:0 10px 25px 0;position: fixed;bottom: 50px;" >
                <a href="category.php" class="btn btn-success btn-block" >التالى</a>
            </div>
        </div>
    </section>
<?php include $App . 'footer.php'; ?>