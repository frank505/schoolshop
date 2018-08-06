
<div class="main">


<div class="main-content">





<div class="content-section-all">

<div class="header-section-cont">
<center><h3 style="font-weight: bolder;font-size: 23px;">Add A New Product</h3></center>

</div>

<div class="form-area-container">

              <div class="col-md-10" style="margin-left:10%;">

              
              <form action="" method="post" role="form" class="contactForm">
                            
                 <center>
                 <div class="notification-registration" id="sent_indicator">
                  </div>
                 </center> 
              <div class="form-group">
                            <input class="form-control" id="product_name" placeholder="enter product name" required="required" type="text">
                        <div class="validation"><center class="design_center"></center></div>
                     </div>
                                <div class="form-group">             
                                        <div class="validation"><center class="design_center"></center></div>
                                </div>
                                <div class="form-group">
                                  <select name="" class="form-control" id="category-option">
                                <option value="" selected="selected">Select A Category</option>
                                
                               <?php 
                                foreach ($results as $key => $value) {
                                        echo "<option value='$value->id'>$value->cat_name</option>";
                                }
                               
                               
                               ?>
                                       </select>      
                                        <div class="validation"><center class="design_center"></center></div>
                                </div>

                                <div class="form-group">
                            <input class="form-control" id="seller_name" placeholder="enter the seller name" required="required" type="text">
                        <div class="validation"><center class="design_center"></center></div>
                     </div>
                            
                     <div class="form-group">
                            <input class="form-control" id="seller_location" placeholder="enter seller location" required="required" type="text">
                        <div class="validation"><center class="design_center"></center></div>
                     </div>

                      <div class="form-group">
                            <input class="form-control" id="seller_number" placeholder="enter seller number" required="required" type="text">
                        <div class="validation"><center class="design_center"></center></div>
                     </div>

                                <div class="form-group">             
                                        <div class="validation"><center class="design_center"></center></div>
                                </div>        
                                <div class="form-group">
                                        <div class="row">
                                        <div class="col-md-6">
                                        <select name="" class="form-control" id="select-control">
                                      <option value="">currency</option>
                                      <option value="">$</option>
                                      <option value="">£</option>
                                      <option value="">euro</option>
                                      <option value="">Naira</option>
                              </select>
                                        </div>
                                        <div class="col-md-6">
                                         <input placeholder="enter figure of price" name="" id="price_value" class="form-control" type="text"> 
                                        </div>

                                        </div>
                              

                        <div class="validation"><center class="design_center"></center></div>
                     </div>
                                <div class="form-group">
                                       <label for="file-content" id="file-label" class="form-control btn btn-primary label-file">&nbsp; <i class="fa fa-file-picture-o" aria-hidden="true"></i> PLease Select An Image For Product</label>
                                       <input id="file-content" style="display:none;" required="required" class=" file-hide" type="file">        
                                       <div class="validation"><center class="design_center"></center></div>
                                </div>
                                                       

                                  <div class="form-group">
                                  <textarea class="form-control" id="message" name="message" required="required" rows="5" data-rule="required" placeholder="
                                enter product description here"></textarea>
                                <div class="validation"><center class="design_center"></center></div>
                                  </div>
                                                
                                                                  
<button type="button" id="btn-add-product" style="padding:1%;" class="btn btn-primary header-bg change-theme ">Submit</button>
<button type="button" id="btn-clear" class="btn header-bg btn-primary change-theme pull-right custom_btn">clear</button><br><br>
                        </form>





              </div>
         




</div>


</div>








</div>





</div>
