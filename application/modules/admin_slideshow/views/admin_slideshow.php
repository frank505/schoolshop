
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Slide Show</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Slide Show Section</h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>First Header</th>
												<th>Second Header</th>
												<th>link</th>
												<th>Image</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>

                            <?php foreach ($results as $key => $value) {
								$file_name = $value->file_name;
								$base = base_url();
							  echo  "<tr>
							   <td>$value->id</td> 
								<td>$value->header_one</td>
								<td>$value->header_two</td>
								<td>$value->link</td>
								<td><img src='{$base}assets/slideshow_img/$file_name' width='50' height='50'/></td>
								<td><button  delete-id='$value->id' class='btn btn-primary delete_cat_slider'> <i class='fa fa-trash-o'></i> </button></td>
							  </tr>";
							}
				                  ?>

										</tbody>
									</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
						 <center><p class="click_link"><?php //echo $links; ?></p></center>
                        <center>
<button class="btn header-bg custom_btn" data-toggle="modal" data-target="#myModal" style="background:#00AAFF;font-weight:bolder;color:white;">
Add New Slider Image</button>
</center>

					</div>
				
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>



        <div id="myModal" class="modal fade" role="dialog" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header header-content-modal" style="background:#00AAFF;font-weight:bolder;">
      <center><h5><b class="modal-title" style="color:white;font-size:15px;">ADD A NEW SLIDER IMAGE</b></h5></center>

        <button type="button" class="close" id="close_me" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i></button>
              </div>
      <div class="modal-body">
       <div class="notification">
           <center><b>Please enter a slider item</b></center>
       </div>
        <form action="" method="post">
      <div class="form-group">
     <input class="form-control" required="required" name="" id="slider_header1" placeholder="enter text for first header" data-rule="minlen:4" data-msg="Please enter at least 4 chars" type="text">
                    </div>

         <div class="form-group">
     <input class="form-control" required="required" name="" id="slider_header2" placeholder="enter text for second header" data-rule="minlen:4" data-msg="Please enter at least 4 chars" type="text">
                    </div>

      <div class="form-group">
     <input class="form-control" required="required" name="" id="product_link" placeholder="enter product link" data-rule="minlen:4" data-msg="Please enter at least 4 chars" type="text">
                    </div>

     <div class="form-group">
                                       <label for="file-content" id="file-label" class="form-control btn btn-primary label-file">&nbsp; <i class="fa fa-file-picture-o" aria-hidden="true"></i> PLease Select An Image For Product</label>
                                       <input id="file-content" style="display:none;" required="required" class=" file-hide" type="file">        
                                       <div class="validation"><center class="design_center"></center></div>
                                </div>  
                    <div class="validation" id="validation_slideshow" style="margin-top:15px;"></div>

      </form></div>
      <div class="modal-footer">
          <button class="btn header-bg custom_btn " id="add_slideshow" name="send_content" style="background:#00AAFF;font-weight:bolder;color:white;">Submit</button>
        <button type="button" class="btn header-bg custom_btn" id="data_close" style="background:#00AAFF;font-weight:bolder;color:white;" data-dismiss="modal">Close</button>
      </div>
      
    </div>

  </div>
</div>