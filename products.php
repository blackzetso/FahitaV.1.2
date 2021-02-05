<?php include 'init.php';  

      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
      $stmt = $con->prepare("SELECT * FROM products WHERE subcategory = ? ORDER BY order_product ASC");
      $stmt->execute([$id]);
      $rows = $stmt->fetchAll(); ?>

    <div class="serch">
        <form id="search" >
            <div class="container">
                <div class="row">
                    <input type="search" id="myInput" name="search" class="col-12" placeholder="ادخل المنتج الذي تريد البحث">
                </div>
            </div>
        </form>
    </div>

    <section class="product">
        <div class="container">
            <div class="row" id="result" >
                <?php foreach($rows as $row){ ?>
                <div class=" col-6  p-0"> 
                    <div class="item"> 
                        <?php if($row['Availability'] == 'غير متوفر فى المخزن'){ ?>
                        <span class="notvalible" > غير متوفر </span>
                        <?php } ?>
                        <a href="single-product.php?id=<?php echo $row['id'] ?>">
                            <div class="photo">
                                <img class="ratio__content lazyload" data-src="img/products/<?php echo $row['img']; ?>" />
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://unpkg.com/lazysizes@4.0.1/lazysizes.js"></script>
    <script src="./js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        var countries = [<?php foreach($rows as $row){ ?> "<?php echo $row['name'] ?>", <?php } ?>];
        
        function autocomplete(inp, arr) {
          /*the autocomplete function takes two arguments,
          the text field element and an array of possible autocompleted values:*/
          var currentFocus;
          /*execute a function when someone writes in the text field:*/
          inp.addEventListener("input", function(e) {
              var a, b, i, val = this.value;
              /*close any already open lists of autocompleted values*/
              closeAllLists();
              if (!val) { return false;}
              currentFocus = -1;
              /*create a DIV element that will contain the items (values):*/
              a = document.createElement("DIV");
              a.setAttribute("id", this.id + "autocomplete-list");
              a.setAttribute("class", "autocomplete-items");
              /*append the DIV element as a child of the autocomplete container:*/
              this.parentNode.appendChild(a);
              /*for each item in the array...*/
              for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].includes(val) === true) {
                  /*create a DIV element for each matching element:*/
                  b = document.createElement("DIV");
                  /*make the matching letters bold:*/
                  b.innerHTML = arr[i];
                  /*insert a input field that will hold the current array item's value:*/
                  b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                  /*execute a function when someone clicks on the item value (DIV element):*/
                      b.addEventListener("click", function(e) {
                      /*insert the value for the autocomplete text field:*/
                      inp.value = this.getElementsByTagName("input")[0].value;
                      /*close the list of autocompleted values,
                      (or any other open lists of autocompleted values:*/
                      closeAllLists();
                  });
                  a.appendChild(b);
                }
              }
          });
          /*execute a function presses a key on the keyboard:*/
          inp.addEventListener("keydown", function(e) {
              var x = document.getElementById(this.id + "autocomplete-list");
              if (x) x = x.getElementsByTagName("div");
              if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
              } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                  /*and simulate a click on the "active" item:*/
                  if (x) x[currentFocus].click();
                }
              }
          });
          function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
          }
          function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
              x[i].classList.remove("autocomplete-active");
            }
          }
          function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
              if (elmnt != x[i] && elmnt != inp) {
              x[i].parentNode.removeChild(x[i]);
            }
          }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
        }
        autocomplete(document.getElementById("myInput"), countries);
    </script>
    <script >
        $(document).on('change','#search',function(event){
            event.preventDefault(); 
            var Form = $(this);
            $.ajax({
                type:'POST',
                url:'inc/search/search.php',
                beforeSend:function(){
                    Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                    Form.find("button[type='submit']").attr('disabled','true');
                },
                data:new FormData(this),
                contentType:false,
                processData:false, 
                success:function(data){
                    $("#result").html(data);
                },
                complete:function(data){
                    $('.spinner-border').remove();
                    Form.find("button[type='submit']").removeAttr('disabled');
                }
            })
        });
    </script>
</body>
</html>