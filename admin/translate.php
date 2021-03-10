<?php include 'init.php'; 
      
      $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
      
      function getTranslate($value) {
        global $con;
        global $id;
        $stmt = $con->prepare("SELECT * FROM `translation` WHERE lang = ? AND key_id = ? ");
        $stmt->execute([$id,$value]);
        $trans = $stmt->fetch(); 
        
        return $trans['word'];
      } ?>

				<div class="app-content">
					<section class="section">
                    	<ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li class="breadcrumb-item active" aria-current="page">  الترجمة</li>				 
                        </ol>

						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4> الترجمة </h4>
									</div>
									<div class="card-body">
                                        <div id="success" ></div>
                                          
                                        
                                        <form id="edit" >
                                            <div class="row text-right" dir="rtl" >  
                                                 <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <label><b>الكلمة</b></label>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                        <label><b>الترجمة</b></label>
                                                    </div>
                                                </div>
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('word','translation','key_id','1') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('1'); ?>" dir="rtl" name="name1"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','2') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('2'); ?>" dir="rtl" name="name2"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','3') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('3'); ?>" dir="rtl" name="name3"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','4') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('4'); ?>" dir="rtl" name="name4"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','5') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('5'); ?>" dir="rtl" name="name5"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','6') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('6'); ?>" dir="rtl" name="name6"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','7') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('7'); ?>" dir="rtl" name="name7"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','8') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('8'); ?>" dir="rtl" name="name8"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','9') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('9'); ?>" dir="rtl" name="name9"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','10') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('10'); ?>" dir="rtl" name="name10"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','11') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('11'); ?>" dir="rtl" name="name11"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','12') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('12'); ?>" dir="rtl" name="name12"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','13') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('13'); ?>" dir="rtl" name="name13"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','14') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('14'); ?>" dir="rtl" name="name14"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','15') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('15'); ?>" dir="rtl" name="name15"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','16') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('16'); ?>" dir="rtl" name="name16"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','17') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('17'); ?>" dir="rtl" name="name17"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','18') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('18'); ?>" dir="rtl" name="name18"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','19') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('19'); ?>" dir="rtl" name="name19"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','20') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('20'); ?>" dir="rtl" name="name20"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','21') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('21'); ?>" dir="rtl" name="name21"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','22') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('22'); ?>" dir="rtl" name="name22"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','23') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('23'); ?>" dir="rtl" name="name23"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','24') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('24'); ?>" dir="rtl" name="name24"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','25') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('25'); ?>" dir="rtl" name="name25"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','26') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('26'); ?>" dir="rtl" name="name26"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','27') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('27'); ?>" dir="rtl" name="name27"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','28') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('28'); ?>" dir="rtl" name="name28" required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','29') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('29'); ?>" dir="rtl" name="name29" required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','30') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('30'); ?>" dir="rtl" name="name30" required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','31') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('31'); ?>" dir="rtl" name="name31" required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','33') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('33'); ?>" dir="rtl" name="name33"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','34') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('34'); ?>" dir="rtl" name="name34"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','35') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('35'); ?>" dir="rtl" name="name35" required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','36') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('36'); ?>" dir="rtl" name="name36"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','37') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('37'); ?>" dir="rtl" name="name37"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','38') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('38'); ?>" dir="rtl" name="name38"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','39') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('39'); ?>" dir="rtl" name="name39"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','40') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('40'); ?>" dir="rtl" name="name40"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','41') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('41'); ?>" dir="rtl" name="name41"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','42') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('42'); ?>" dir="rtl" name="name42"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','43') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('43'); ?>" dir="rtl" name="name43"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','44') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('44'); ?>" dir="rtl" name="name44"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','45') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('45'); ?>" dir="rtl" name="name45"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','46') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('46'); ?>" dir="rtl" name="name46"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','47') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('47'); ?>" dir="rtl" name="name47"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','48') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('48'); ?>" dir="rtl" name="name48"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','49') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('49'); ?>" dir="rtl" name="name49"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','50') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('50'); ?>" dir="rtl" name="name50"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','51') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('51'); ?>" dir="rtl" name="name51"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','52') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('52'); ?>" dir="rtl" name="name52"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','53') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('53'); ?>" dir="rtl" name="name53"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','54') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('54'); ?>" dir="rtl" name="name54"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','55') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('55'); ?>" dir="rtl" name="name55"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','56') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('56'); ?>" dir="rtl" name="name56"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','57') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('57'); ?>" dir="rtl" name="name57"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','58') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('58'); ?>" dir="rtl" name="name58"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','59') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('59'); ?>" dir="rtl" name="name59"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','60') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('60'); ?>" dir="rtl" name="name60"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','61') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('61'); ?>" dir="rtl" name="name61"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','62') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('62'); ?>" dir="rtl" name="name62"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','63') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('63'); ?>" dir="rtl" name="name63"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','64') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('64'); ?>" dir="rtl" name="name64"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','65') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('65'); ?>" dir="rtl" name="name65"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','66') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('66'); ?>" dir="rtl" name="name66"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','67') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('67'); ?>" dir="rtl" name="name67"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','68') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('68'); ?>" dir="rtl" name="name68"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','69') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                             <input type="text" class="form-control text-right" value="<?php echo getTranslate('69'); ?>" dir="rtl" name="name69" required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','70') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('70'); ?>" dir="rtl" name="name70"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','71') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('71'); ?>" dir="rtl" name="name71"required > 
                                                    </div>
                                                </div>
                                                <!-- End -->  
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','73') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('73'); ?>" dir="rtl" name="name73"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','74') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('74'); ?>" dir="rtl" name="name74"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','75') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('75'); ?>" dir="rtl" name="name75"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','76') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('76'); ?>" dir="rtl" name="name76"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','77') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('77'); ?>" dir="rtl" name="name77"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','78') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('78'); ?>" dir="rtl" name="name78" required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','79') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('79'); ?>" dir="rtl" name="name79"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','80') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('80'); ?>" dir="rtl" name="name80"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                 <!-- Start -->
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" > 
                                                        <input type="text" class="form-control text-right" value="<?php echo getColumn('key_name','attributes','id','81') ?>" dir="rtl" disabled > 
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 col-sm-12" >
                                                    <div class="form-group text-right" >
                                                         <input type="text" class="form-control text-right" value="<?php echo getTranslate('81'); ?>" dir="rtl" name="name81"required > 
                                                    </div>
                                                </div>
                                                <!-- End --> 
                                                
                                                
                                                
                                            </div> 

                                            
                                        </form>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
                
    
				<?php include $App . 'footer.php'; ?>

			</div>
		</div>

		<!--Jquery.min js-->
		<script src="assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="assets/js/tooltip.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--Sidemenu js-->
		<script src="assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--Othercharts js-->
		<script src="assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!--mCustomScrollbar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!--DataTables js-->
		<script src="assets/plugins/Datatable/js/jquery.dataTables.js"></script>
		<script src="assets/plugins/Datatable/js/dataTables.bootstrap4.js"></script>

		<!--Scripts js-->
		<script src="assets/js/scripts.js"></script>
        <!-- Icon Picker -->
        <script type="text/javascript" src="assets/plugins/icon-picker/bootstrap-iconpicker.bundle.min.js"></script>

		<script>
			$(function(e) {
				$('#example').DataTable();
			} );
		</script>
        <script > 
                $(document).on('change','#edit',function(event){
                    event.preventDefault(); 
                    var Form = $(this);
                    $.ajax({
                        type:'POST',
                        url:'inc/lang/updateTranslate.php',
                        beforeSend:function(){
                            Form.find("button[type='submit']").prepend('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                            Form.find("button[type='submit']").attr('disabled','true');
                        },
                        data:new FormData(this),
                        contentType:false,
                        processData:false, 
                        success:function(data){
                            $("#success").html(data);
                        },
                        complete:function(data){
                            $('.spinner-border').remove();
                            Form.find("button[type='submit']").removeAttr('disabled');
                            $('#addCategory').modal('hide')
                        }
                    })
                });
            
         
            </script>

	</body>
</html>