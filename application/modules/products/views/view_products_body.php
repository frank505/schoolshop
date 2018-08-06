
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Products</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">products</h3>

<center><input id="live_search_here_prod" style="width:60%;margin-left:20%;margin-right:20%;" class="form-control search-me-please" placeholder="🔎" name="" type="text"></center>


								</div>
								<div class="panel-body">

                                
									<table class="table">
										<thead>
											<tr>
												<th>#</th>
												<th>product</th>
												<th>category</th>
                                                <th>image</th>
                                                <th>price</th>
                                                <th>seller number</th>
                                                <th>seller location</th>
                                                <th>update</th>
                                                <th>delete</th>
											</tr>
										</thead>
										<tbody id="display_content">
                                  
                            <?php foreach ($results as $key => $value) {
                                $file_name = $value->file_name;
                                $base_url = base_url();
                                $id = $value->id;
							  echo  "<tr>
							   <td>$value->id</td> 
                                <td>$value->prod_name</td>
                                <td>$value->category</td>
                                <td><img style='width:50px;height:50px;'src='{$base_url}assets/prod_img/$file_name'/></td>
                                <td>$value->currency $value->price</td>
                                <td>$value->seller_number</td>
                                <td>$value->seller_location</td>
                                <td><a class='btn btn-primary'href='{$base_url}admin/update-products/$id'><i class='fa fa-reply'></i></a></td>
                                <td><button class='btn btn-primary delete_content_products' id='$id'><i class='fa fa-trash-o'></i></button></td>
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
					</div>
				
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>

