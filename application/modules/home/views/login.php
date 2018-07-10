<style>
body{position:fixed;width:100%;height:100%;z-index: 10;
top: 0; bottom: 0;right:0;background-size: cover;}
.overall-white{background:white;z-index:25;bottom:0;top:0;left:0;right:0;background:white;opacity:.8;
position:fixed;}
button {outline: none !important;border: none;background: transparent;}


</style>
<div class="overall-white"></div>
<div class="login-form" style="">
<form  class="form-area"action="" method="post">

<div class="text-center">
<center> <div class="img-circle" style="background:white; border-radius:50%;width:70px; margin:auto;margin-top:10px; margin-bottom:10px; padding:10px;padding-bottom:15px;">
 <i   style="font-size: 3em; color:#26a69a;" class="fa fa-institution" aria-hidden="true"></i>
 </div> </center>    
<h1 class="resize-h-element" style="font-family: spinnaker;
font-weight: bolder;
font-size: 30px;color:white;"><b> Login Here</b></h1>
</div>

<div class="input-field col s12">
                <input id="user_email"  type="email" required="required" name="email">
                <label for="user_email" class=""> <i class="fa fa-envelope    "></i> email</label>
              </div>

              <div class="input-field col s12">
                <input id="user_password" type="password" required="required" name="password">
                <label for="user_password" class="">  <i class="fa fa-key "></i> password</label>
              </div>
              <div class="col s12  show-content" style="display:none;">
 <div class='alert alert-info'><b><i class='fa fa-warning change-warning'></i>&nbsp;</b></div>
 </div>
 
 
 <center>
 
 <button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
                        <b><a href="javascript:void(0)" class="modal-trigger click-this-modal" data-target="modal1"   style="margin-bottom:30px;color:white !important">Forgot Password?</a></b>

 </center>
 


</form>












</div>

<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer" style="height:50% !important;">
  <div class="modal-content" style="background:#26a69a !important;">
   
  <form  class="form-area"action="" method="post">

<div class="text-center">
<center> <div class="img-circle" style="background:white;; border-radius:50%;width:70px; margin:auto;margin-top:10px; margin-bottom:10px; padding:10px;padding-bottom:15px;">
 <i   style="font-size: 3em; color:#26a69a" class="fa fa-institution" aria-hidden="true"></i>
 </div> </center>    
<h1 class="resize-h-element" style="font-family: spinnaker;
font-weight: bolder;
font-size: 30px;color:white;"><b>Enter Your Email Here</b></h1>
</div>

<div class="input-field col s12">
                <input id="user_email" style="color: white;
border-bottom: 1px solid white;" type="email" required="required">
                <label for="user_email" style="color:white;" class=""> <i class="fa fa-envelope    "></i> email</label>
              </div>
              <div class="col s12  show-content" style="display:none;">
 <div class='alert alert-info'><b><i class='fa fa-warning change-warning'></i>&nbsp;</b></div>
 </div>
 
  </div>
  <div class="modal-footer" style="background:white;">
  <a href="javascript:void(0)" style="font-weight:bolder;" class="modal-close  waves-effect waves-green btn btn-primary">Submit</a>&nbsp;&nbsp;&nbsp;
  <a href="javascript:void(0)" style="font-weight:bolder;" class="modal-close close-modal-now waves-effect waves-green btn btn-primary">Close</a>
   
  </div>
</div>