<?php $base_url = base_url(); ?>
		<!-- Modal Search -->
		
		

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
			  <?php 
			 foreach ($slide_show as $key => $values) {
				  $base_url = base_url();
				  $file_name = $values->file_name;
				  $link_url = $values->link;
				  $header_one = $values->header_one;
				  $header_two = $values->header_two;
		       ?>

				<div class="item-slick1" style="background-image: url(<?php echo $base_url."assets/slideshow_img/$file_name";?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								<?php  echo $header_one; ?>
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									<?php echo $header_two;?>
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="<?php echo $link_url; ?>" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			 <?php   }   //foreach loop ends here ?>

			</div>
		</div>
	</section>


	


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>
            
			  
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>
					<?php
			   
			   foreach ($category as $key => $value) {
				  
			       ?>
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $value->cat_name;?>">
					<?php  echo $value->cat_name; ?>
					</button>
					<?php
			   } //end foreach loop
				 ?>	
				</div>
				
				
			</div>
			<div class="row isotope-grid">
			<?php
			  
			  foreach ($products as $key => $value) {
				  $image_name = $value->file_name;
				  $product_name = $value->prod_name;
				  $currency = $value->currency;
				  $price = $value->price;
				  $id = $value->id;
				  $category_section = $value->category;
			  ?>
			 
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $category_section; ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0" style="height:300px;">
			<?php  echo "<img src='{$base_url}assets/prod_img/$image_name'  alt='$product_name'/>"  ?>				

							<a href="#" id="<?php echo $id;?>" class="view-short-details block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?php echo $base_url."home/product-details/$id";?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								  <?php echo $product_name;?>
								</a>

								<span class="stext-105 cl3">
									<?php echo $currency."".$price;?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			  <?php } //end of the foreach loop;?>
				</div>
			<!-- Load more -->
			
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="<?php echo base_url()."home/products";?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>

