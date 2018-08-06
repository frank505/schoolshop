
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Purchase details</h3>
					<div class="row">
						<div class="col-md-12">
							<!-- BASIC TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">purchase details</h3>

<center><input id="live_search_here_buyer" style="width:60%;margin-left:20%;margin-right:20%;" class="form-control search-me-please" placeholder="🔎" name="" type="text"></center>


								</div>
								<div class="panel-body" style="overflow:auto;">

                                
									<table class="table table-responsive">
										<thead>
											<tr>
												<th>#</th>
												<th>name</th>
												<th>email</th>
                                                <th>location</th>
                                                <th>phone</th>
                                                <th>seller number</th>
                                                <th>seller location</th>
                                                <th>price</th>
                                                <th>pending</th>
                                                <th>delete</th>
											</tr>
										</thead>

										
										<tbody id="display_content" style="overflow:auto;" >
                                  
                            <?php foreach ($results as $key => $value) {
                                $base_url = base_url();
								$id = $value->id;
								$seen = $value->seen;
							  echo  "<tr>
							   <td>$value->id</td> 
                                <td>$value->name</td>
                                <td>$value->email</td>
                                <td>$value->location</td>
                                <td>$value->phone</td>
                                <td>$value->seller_number</td>
                                <td>$value->seller_location</td>
                                <td>$value->price</td>
								<td>";
							
							?>	
								<?php
								if($seen==0){
								echo "<a class='btn btn-primary purchase-update-pending'href='#' id-pending='$id'><i class='fa fa-clock-o'></i></a></td>";	
								}else{
									echo "<a class='btn btn-primary'href='#'><i class='fa fa-eye'></i></a></td>";
								}
								
                       echo" <td><button class='btn btn-primary delete_content_products' id='$id'><i class='fa fa-trash-o'></i></button></td>";							
							}  //end of the foreach loop  ?>
								
								
                               
							  </tr>";
							
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

