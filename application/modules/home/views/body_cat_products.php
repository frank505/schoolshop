	
	<?php $base_url = base_url();?>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140" style="margin-top:40px;">
		<div class="container">
		

			<div class="row isotope-grid" style="margin-top:70px;">

			<?php foreach ($results as $key => $value) {
                                $file_name = $value->file_name;
								$id = $value->id;
								$product = $value->prod_name;
								$currency = $value->currency;
								$price = $value->price;
				                  ?>
			        
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo "{$base_url}assets/prod_img/$file_name";?>" alt="IMG-PRODUCT">

							<a href="#" id="<?php echo $id;?>" class="block2-btn view-short-details flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>

						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?php echo "{$base_url}home/product-details/$id"?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $product;?>
								</a>

								<span class="stext-105 cl3">
								<?php echo "{$currency}{$price}";?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="<?php echo base_url();?>assets/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?php echo base_url();?>assets/images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>

			
			
			
			
				
				

				
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<b class="pagination_links_created"><?php echo $links;?></b>
							</div>
		</div>
	</div>
		



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

