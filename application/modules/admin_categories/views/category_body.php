
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Categories</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">product categories</h3>
								</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>Category</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody>

                            <?php foreach ($results as $key => $value) {
							  echo  "<tr>
							   <td>$value->id</td> 
								<td>$value->cat_name</td>
								<td><button  delete-id='$value->id' class='btn btn-primary delete_cat_btn'> <i class='fa fa-trash-o'></i> </button></td>
							  </tr>";
							}
				                  ?>

										</tbody>
									</table>
								</div>
							</div>
							<!-- END BASIC TABLE -->
						</div>
						 <center><p class="click_link"><?php echo $links; ?></p></center>
                        <center>
<button class="btn header-bg custom_btn" data-toggle="modal" data-target="#myModal" style="background:#00AAFF;font-weight:bolder;color:white;">
Add New Category</button>
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
      <center><h5><b class="modal-title" style="color:white;font-size:15px;">ADD A NEW CATEGORY</b></h5></center>

        <button type="button" class="close" id="close_me" data-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i></button>
              </div>
      <div class="modal-body">
       <div class="notification">
           <center><b>Please enter a new category item</b></center>
       </div>
        <form action="" method="post">
      <div class="form-group">
     <input class="form-control" required="required" name="" id="cat_text_area" placeholder="enter new category" data-rule="minlen:4" data-msg="Please enter at least 4 chars" type="text">
        <div class="validation" id="validation_category" style="margin-top:15px;"></div>
            </div>
                             

      </form></div>
      <div class="modal-footer">
          <button class="btn header-bg custom_btn " id="add_category" name="send_content" style="background:#00AAFF;font-weight:bolder;color:white;">Submit</button>
        <button type="button" class="btn header-bg custom_btn" id="data_close" style="background:#00AAFF;font-weight:bolder;color:white;" data-dismiss="modal">Close</button>
      </div>
      
    </div>

  </div>
</div>