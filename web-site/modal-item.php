<?php 
  //  include 'connect.php'; 
  //  $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0; 
?>
<!--
<div class="modal-container" id="commentsModal" style=" padding: 0 !important;overflow: hidden;border-radius: 20px;">
     <div class="row" >
         <!-- modal body --><!--
         <div class="modal-body  col-md-12 m-auto modal-md">
              <form id="addForm" >
                <div class="modal-body text-right" dir="rtl"> 
                    <div class="row" >
                         
                        <div class="col-lg-12 col-sm-12" >
                            <div class="form-group" >
                                <label>البيان</label>
                                <input type="text" class="form-control" name="stmt" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12" >
                            <div class="form-group" >
                                <label>نوع العمليه</label>
                                <select class="form-control text-right" name="fixtype" required>
                                    <?php $siana = 'صيانة'; $eslah = 'اصلاح'; ?>
                                    <option value="<?php echo $siana; ?>" >صيانة</option>
                                    <option value="<?php echo $eslah; ?>" >اصلاح</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12" >
                            <div class="form-group" >
                                <label> الكمية </label>
                                <input type="number" class="form-control" name="qty" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12" >
                            <div class="form-group" >
                                <label> سعر الوحدة </label>
                                <input type="number" class="form-control" name="price" >
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12" >
                            <div class="form-group" >
                                <label> الحالة  </label>
                                <select class="form-control text-right" name="status" required>
                                    <?php $new = 'جديد'; $used = 'مستعمل'; ?>
                                    <option value="<?php echo $new; ?>" >جديد</option>
                                    <option value="<?php echo $used; ?>" >مستعمل</option>
                                </select>
                            </div>
                        </div>
                        <!--
                        <div class="col-lg-6 col-sm-12" >
                            <div class="form-group" >
                                <label> مبلغ الخصم </label>
                                <input type="number" class="form-control" name="discount" >
                            </div>
                        </div>--><!--
                    </div> 
                </div><!-- modal-body --><!--
                <div class="modal-footer"> 
                    <input type="hidden" value="<?php echo $id; ?>" name="id" >
                    <button type="submit" class="btn btn-success del-btn" data-id=""  > اضافة </button>
                 </div>
            </form>
         </div> 
    </div>
</div>  
<script>

    function CKupdate(){
        for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
    }
    $("#addForm").on('submit',function(event){ 
        event.preventDefault();
        var Form = $(this);
        $.ajax({
            type: 'POST',
            url: 'inc/invoice-single/insert.php',
            beforeSend: function(){
               Form.find("button[type='submit']").prepend('<i class="fa fa-spinner fa-spin"></i>');
            }, 
            data: new FormData(this),
            contentType: false,
            processData: false, 
            success: function(data){
                $('#getAjax').html(data);  
            },
            error: function(data){ 
                toastr.error('حدث خطأ ما');
            },
            complete: function (data){
            $(".fa-spin").remove();
            $('#add').modal('hide');
           } 
        })
    });
</script> -->