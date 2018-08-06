
<!-- MAIN -->
<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">


<div class="content-section-all" style="margin-bottom:40px !important; ">

<div class="header-section-cont">
<center><h3>Edit Your Details</h3></center>
</div><br><br>

<div class="form-area-container">


<div class="row">
              <div class="col-md-9" style="margin-left:15%;">

              <center>
              <button id="add-admin" class="btn-personal total active-btn">Add New Admin</button>
              <button id="update-admin-profile" class="btn-personal total ">Update Admin Profile</button>
             </center><br><br>




             <div data-id="update-admin-profile" class="hide-area" style="display:none;">
                  
                
             <form action="" method="post" role="form" class="contactForm" >
             <div class="notification-registration" id="sent_indicator_update">  </div>     

             <div class="notification-registration" id="add-indicator">  </div>          
                <?php    
                 foreach ($details as $key => $value) {
                  
                ?>            
             <div class="form-group">
<input id="update_username" placeholder="enter your username" class="form-control" value="<?php echo $value->username;?>" type="text">
   </div>
   
   <div class="form-group">

   <input id="update_password" placeholder="enter your password" class="form-control" type="password">
   </div>


   <div class="form-group">
   <input id="update_confirm" class="form-control" placeholder="confirm password here" type="password">
   </div>

                 <?php  } ?>                                                        
          
                                      <button type="button" id="update-admin" class="btn btn-primary ">Submit</button>
                                      <button type="button" id="clear-update" class="btn btn-primary pull-right ">clear</button>
                                  </form>


             </div>





















              
              <div data-id="add-admin" class="hide-area" style="display:block;">
              
              <form action="" method="post" role="form" class="contactForm" >

<div class="notification-registration" id="sent_indicator_additional">  </div>          
               
<div class="form-group">
<input id="add_username" placeholder="enter your username" class="form-control"  type="text">
</div>

<div class="form-group">
<input id="add_email" placeholder="enter your email" class="form-control"  type="email">
</div>

<div class="form-group">
<input id="add_password" placeholder="enter your password" class="form-control" type="password">
</div>


<div class="form-group">
<input id="add_confirm" class="form-control" placeholder="confirm password here" type="password">
</div>
                                                            

                         <button type="button" id="btn-add-admin" class="btn btn-primary ">Submit</button>
                         <button type="button" id="btn-clear-admin" class="btn btn-primary pull-right ">clear</button>
                     </form>


              
              
              </div>

              














              </div>
          </div>




</div>


</div>





</div>


</div>


</div>


</div>