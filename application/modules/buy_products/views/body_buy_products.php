<?php $id = $this->uri->segment(3);  ?>
<div style="margin-top:150px;margin-bottom:100px;width:60%;margin-left:20%;margin-right:15%;">






                              <form class="w-full">
											
											<p class="stext-102 cl6">
												Your email address will not be published. Required fields are marked *
											</p><br>
                                            <p class="stext-102 cl6">
												please fill in your correct details
											</p><br><br>
											<p id="content_response"></p><br><br>
											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Your Location </label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="location" name="review"></textarea>
												</div>

												<input type="hidden" name=""  id="user_id" value="<?php echo $id; ?>">

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="name">Name</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" name="name">
												</div>

												<div class="col-sm-6 p-b-5">
													<label class="stext-102 cl3" for="email">Email</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email" type="text" name="email">
												</div>

                                                <div class="col-sm-12 p-b-5">
													<label class="stext-102 cl3" for="email">Phone number</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="phone" type="text" name="email">
												</div>
											</div>
                                         
											<button type="button" id="btn_products_buy" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Submit
											</button>
										</form>







</div>
