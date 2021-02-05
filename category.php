<?php 
      
      include 'init.php'; 
      

      $stmt = $con->prepare("SELECT * FROM  categories ORDER BY id ASC");
      $stmt->execute();
      $rows = $stmt->fetchAll(); 
    
      $stmt = $con->prepare("SELECT * FROM  slides ORDER BY number DESC");
      $stmt->execute();
      $slides = $stmt->fetchAll();

      $stmt = $con->prepare("SELECT slide_speed FROM settings ");
      $stmt->execute();
      $setting = $stmt->fetch();
?>
    <div class="serch">
        <form id="search">
            <div class="container">
                <div class="row">
                    <input type="search" name="search" id="myInput" class="col-12" placeholder="ادخل المنتج الذي تريد البحث">
                </div>
            </div>
        </form>
    </div>
 
    <div class="container">
        
        <div class="row">
            <div class="col-12" style="padding-right: unset;padding-left: unset;" >
                <ul id="slides">
                  <?php foreach($slides as $slide){ ?>
                  <li class="slide showing">
                    <a href="<?php echo $slide['url']; ?>" >
                        <img style="width:100%;height:150px;" src="img/slides/<?php echo $slide['img'] ?>" >  
                    </a>
                  </li>
                  <?php } ?>
                </ul> 
            </div>
        </div>
    </div>
    <section class="category">
        <div class="container">
            
            <div class="row" id="result" >
                <?php foreach($rows as $row){ ?>
                <div class=" col-12  p-0">
                    <div class="item">
                        <a href="subcategory.php?id=<?php echo $row['id']; ?>">
                            <div class="photo">
                                <img height="350px" class="lazy" src="img/categories/<?php echo $row['img']; ?>" alt="">
                            </div>
                           <div class="name">
                                <span> <?php  mb_internal_encoding("UTF-8"); echo mb_substr($row['name'],0,25); ?> </span>
                           </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php include $App . 'footer.php'; ?>
<script>
    // Kineto.create('#carousel', { stream: true });
 
    var slides = document.querySelectorAll('#slides .slide');
    var currentSlide = 0;
    var slideInterval = setInterval(nextSlide,<?php echo $setting['slide_speed']; ?>);

    function nextSlide(){
      slides[currentSlide].className = 'slide';
      currentSlide = (currentSlide+1)%slides.length;
      slides[currentSlide].className = 'slide showing';
    }  
</script>