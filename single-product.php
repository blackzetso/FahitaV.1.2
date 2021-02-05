<?php 
    session_start();
    include 'connect.php';
    include 'inc/App/lang.php';
    if(isset($_SESSION['id'])){
     $stmt = $con->prepare("SELECT * FROM cart WHERE user = ?");
     $stmt->execute([$_SESSION['id']]);
     $Count = $stmt->rowCount(); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome CDN -->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
    <link rel="stylesheet" href="./css/producer.css">
    <link rel="stylesheet" href="./css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo&display=swap">
    <link rel="stylesheet" href="css/color.css">
    <title><?php echo translate('15'); ?></title>
</head>
<body> 
    <nav>
        <div class="title">
            <h4><?php echo translate('15'); ?></h4>
        </div>
        <div class="icon">
            <a href="basket.php" ><i class="fas fa-cart-arrow-down"></i><span id="Success" class="badge" ><?php if(isset($_SESSION['id'])){ echo $Count; }else{ echo '0'; } ?></span></a>
            <a href="/" class="mr-3" ><i class="fas fa-chevron-left"></i></a>
        </div>
    </nav>
    <?php 
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
        $stmt = $con->prepare("SELECT * FROM products WHERE id = $id");
        $stmt->execute();
        $row = $stmt->fetch(); 
     include 'inc/pages/nav.php'; ?>
    <section class="product">
        <div class="container">
            <div class="info mt-3"> 
                <div class="photo">
                    <img style="height: 100px;" src="img/products/<?php echo $row['img']; ?>" alt=""> 
                </div>
            </div>
            <div class="Weight"> 
                <form id="addToCart" >
                    <div class="title">
                        <div class="item">
                            <?php if($row['price2'] == 'empty'){ ?> 
                            <div > <?php echo translate('16'); ?> (<?php echo $row['unite']; ?>)</div>
                            <input type="hidden" name="unit" value="unite1" >
                            <?php }else{ ?> 
                            <label><?php echo translate('16'); ?></label>
                            <select id="unite" name="unit" class="form-control" >
                                <option value="unite1" > <?php echo $row['unite']; ?>  </option>
                                <option value="unite2" > <?php echo $row['unite2']; ?>  </option>
                            </select>
                            <?php } ?>
                        </div> 
                    </div> 
                    <div class="calculate">
                        <button type="button" class="btn-reduce"><i class="fas fa-chevron-right"></i></button>
                        <input type="text" name="qty" class="Weight-value"  >
                        <button type="button" class="btn-plus"><i class="fas fa-chevron-left"></i></button>
                    </div> 
                    <div class="datils"> 
                    <div class="salary">
                        <div class="item">
                            <div  > <?php echo translate('17'); ?> </div>
                            <div id="ajax" >
                                <input type="number" min="0" class="salary-item" value="<?php echo $row['price']-$row['discount']; ?>" disabled> ج
                            </div>
                        </div>
                        <div class="item">
                            <div><?php echo translate('20'); ?></div>
                            <div><input type="text" class="salary-all" value="" disabled> ج</div>
                        </div>
                        <div class="item">
                            <div><?php echo translate('18'); ?></div>
                            <div><?php echo Availability($row['Availability']); ?></div>
                        </div>
                    </div> 
                    </div>
                    <div class="btn-add">  
                        <input type="hidden" name="id" value="<?php echo $id; ?>" >
                        <input type="hidden" name="name" value="<?php echo $row['name']; ?>" >
                        <input type="hidden" name="price" class="salary-item" value="<?php echo $row['price']-$row['discount']; ?>" >
                        <?php if(isset($_SESSION['id'])){ ?>
                        <button type="submit" > <i class="fas fa-plus icon"></i> <?php echo translate('19'); ?> </button>
                        <?php }else{ ?>
                        <a href="login.php" > <i class="fas fa-plus icon"></i><?php echo translate('19'); ?></a>
                        <?php } ?>
                    </div> 
                </form>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script >
         $(document).on('submit','#addToCart',function(event){
            event.preventDefault(); 
            var Form = $(this);
            $.ajax({
                type:'POST',
                url:'inc/cart/insert.php',
                beforeSend:function(){
                    $('.fa-plus').remove();
                    Form.find("button[type='submit']").prepend('<i class="fas fa-circle-notch fa-spin"></i>');
                    Form.find("button[type='submit']").attr('disabled','true');
                },
                data:new FormData(this),
                contentType:false,
                processData:false, 
                success:function(data){
                    $("#Success").html(data);
                },
                complete:function(data){
                    $('.fa-circle-notch').remove();
                    Form.find("button[type='submit']").prepend('<i class="fas fa-plus icon"></i>');
                    Form.find("button[type='submit']").removeAttr('disabled');
                }
            })
        });
        
        // get element in make function plus ab reducse
        let Weight = document.querySelector(".Weight-value"),
        btnPlus = document.querySelector(".btn-plus"),
        btnReduce = document.querySelector(".btn-reduce");
        let i = 1;

        Weight.value = 1;
        btnPlus.onclick = ()=>{plus()}
        btnReduce.onclick = ()=>{reduce()}

        const plus = ()=>{
            Weight.value = i = i + <?php echo $row['Decimal_number']; ?>;
            calculate()
        }
        const reduce = ()=>{
            if(Weight.value <= <?php echo $row['Decimal_number']; ?>){
            }
            else{
                Weight.value = i = i - <?php echo $row['Decimal_number']; ?>;
                calculate()
            }
        }
        //get element use in calculate Weight
        let salaryItem = document.querySelector(".salary-item"),
        salaryAll = document.querySelector(".salary-all");



        //calculate Weight
        const calculate = ()=>{ 
            salaryAll.value = salaryItem.value * Weight.value
        }
        calculate(); 
    </script>
     
    <script>
       
        
        $(document).ready(function(){
                    $('#unite').on('change',function(){
                        var unite = $(this).val();
                        var ID = <?php echo $id; ?>;
                        if(unite){
                            $.ajax({
                                type:'GET',
                                url:'inc/unite.php',
                                data:'unite='+unite+'&id='+ID,
                                success:function(html){
                                    $('#ajax').html(html);

                                }
                            }); 
                        }else{
                            $('#Price').html('<option value="">Select Category first</option>'); 
                        }
                    });  
                })
    </script> 
    <script src="js/all.min.js"></script>
</body>
</html>