<!-- Product -->
<<<<<<< Updated upstream
	<section class="bg0 p-t-23 p-b-140">
=======
<section class="bg0 p-t-23 p-b-140">
>>>>>>> Stashed changes
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

				</div>


			</div>
			<div class="row isotope-grid">
            <?php foreach ($users as $user) {echo "<p>{$user}</p>";}?>

            </div>
			<!-- Load more -->

			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="<?php echo base_url() . "home/products"; ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>