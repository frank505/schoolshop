<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends MX_Controller
{
    
  public $cookie_key = "dre45354e";
  public $cookie_name  = "__sch";
  public $tm_password_key = "jesusislord";
    public function __construct()
    {
        parent::__construct();
        $this->load->module("admin");
        $this->load->helper('cookie');
        $this->load->library(array('session'));
        $this->load->helper('security');
    }
 
      
    /*
     * THIS IS THE INDEX PAGE BUT CHECKS IF SESSION OR COOKIE EXIST TO LOGIN USER IN
     * ==============================================================================
     */
    public function index()
    {
      $counter["count_products"] = $this->count_products();
      $counter["count_categories"] = $this->count_categories();
      $counter["count_purchased_products"] = $this->count_purchased_products();
      $counter["count_pending_products"] = $this->count_pending_products();
      $total["total_values"] = $this->return_total_new_buyers();
     if($this->checkSessionOrCookie()==TRUE){
      $this->load->view("templates/header_admin", $total);
      $this->load->view("body", $counter);
      $this->load->view("templates/footer_admin");
     }else if($this->checkSessionOrCookie()==FALSE){
      redirect(base_url()."admin/login");      
      }

    }

    /*
     * THIS RETURNS THE TOTAL NUMBER NUMBER OF BUYERS WHO HAVE NOT BEEN  VIEWED OR APPROVED
     * =====================================================================================
     */

    public function return_total_new_buyers()
    {
     $this->load->model("admin_mdl");
     $total_unseen = $this->admin_mdl->return_total_buyers();
     return $total_unseen;
    }
   /*
     * THIS RETURNS THE HASHED EMAIL
     * ==============================================================================
     */

    public function get_email()
    {
     $email = $_SESSION["email"];
     return $email;
    }
     /*
     * THIS RETURNS THE USER DETAILS TO BE UPDATED IN THE SETTINGS PAGE
     * ==============================================================================
     */
    public function return_user_detail()
    {
      $email = $this->get_email();
      $this->load->model("admin_mdl");
     $user_check_hash =  $this->admin_mdl->select_result_session($email);
     $fetch_content = $this->admin_mdl->fetch_content_session($user_check_hash);
     return $fetch_content;
    }

    public function settings()
    {
      $user_detail["details"] = $this->return_user_detail();
      $total["total_values"] = $this->return_total_new_buyers();
      if($this->checkSessionOrCookie()==TRUE){
        $this->load->view("templates/header_admin",$total);
        $this->load->view("body_settings",$user_detail);
        $this->load->view("templates/footer_admin");
       }else if($this->checkSessionOrCookie()==FALSE){
        redirect(base_url()."admin/login");      
        }
    
    }

 /*
     * THIS FUNCTIONS CHECKS FOR COOKIE OR SESSION
     * ==============================================================================
     */
      public function checkSessionOrCookie()
    {
      $this->load->model("admin/admin_mdl");
     @$logged_in = $_SESSION["logged_in"];
      @$email  = $_SESSION["email"];
          if(isset($email) && isset($logged_in) ){
           if($logged_in==TRUE){
           return TRUE; 
           }else{
            return FALSE;       
           }  
          }else{
            $cookieData = get_cookie($cookie_name);
             if($cookieData==""){
               return FALSE;
             }else{
              $total = $this->admin_mdl->check_admin_cookie($cookieData);
              if($total==0){
                return FALSE;
              }else{
                $data = $this->admin_mdl->select_results($cookieData);
                foreach ($data as $key => $value) {
                  $user_email = $value->email;
                } 
                $hashed_username = md5($user_email);
                $session_credentials = $this->setSession($hashed_username);
                $this->session->set_userdata($session_credentials);
                return TRUE;
              }
             }
            
          }
    }


     /*
     * THIS LOGS IN USER TO THE HOME PAGE
     * ==============================================================================
     */
  
  public function login()
  {
    $this->load->model("admin/admin_mdl");
    $this->form_validation->set_rules('email', 'email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[6]');
    if($this->form_validation->run()==FALSE){
    $this->load->view("templates/header_admin_login");
    $this->load->view("login_body");
    $this->load->view("templates/footer_admin_login");
    }else{
      $username = $this->input->post("email");
      $password = $this->input->post("password");
     $val =  $this->admin_mdl->login($username,$password);
     if($val==FALSE){
    echo "<script>alert('incorrect email or password entered')</script>";
    $this->load->view("templates/header_admin_login");
    $this->load->view("login_body");
    $this->load->view("templates/footer_admin_login");
     }
     else if($val==NULL){
      $this->load->view("templates/header_admin_login");
      $this->load->view("login_body");
      $this->load->view("templates/footer_admin_login");
     echo "<script>alert('incorrect username or email entered')</script>";
     }else{
       $hashed_username = md5($username);
  $session_credentials = $this->setSession($hashed_username);
$this->session->set_userdata($session_credentials);
       $check = $this->input->post("check_me");
       if($check == TRUE){
        $cookie_key = $this->cookie_key;
        $cookie_value = md5($username)."".$cookie_key.""; 
        $this->admin_mdl->insertCookie($cookie_value,$username);   
       $this->setCookie($cookie_value);  
       redirect(base_url()."admin");
       } else{
        redirect(base_url()."admin");
       }    
          }

    }
  }

 /*
     * SENDS AN AJAX REQUEST TO ADD A NEW ADMIN
     * ==============================================================================
     */
  public function add_new_admin()
  {
   $username = $this->input->post("username");
   $email = $this->input->post("email");
   $password = $this->input->post("password");
   $confirm = $this->input->post("confirm");
   $username = $this->sanitize_string($username);
   $email = $this->validate_email($email);
   $password = trim($password);
   $confirm = trim($confirm);
   if($username==""){
    echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;username cannot be left empty</b>";
   }else if($email ==""){
      echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;email cannot be left empty</b>";
   }else if($password==""){
    echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;password cannot be left empty</b>";
   }else if($confirm ==""){
     echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;confirm cannot be left empty</b>";
   }else if($password !=$confirm){
    echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;password and confirm password dont match</b>";
   }
   else if(!$email){
    echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;email seems to be incorrect</b>"; 
   }else{
    $this->load->model("admin_mdl");
    $email_checker = $this->admin_mdl->check_email($email);
    if($email_checker > 0 ){
     echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;this user already exist</b>";    
    }else{
      $data = $this->admin_add_array($username,$email,$password,$confirm);
     $items = $this->admin_mdl->add_new_admin($data);
    echo "<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;registration complete</b>";
    }
   }

  }

  public function update_admin_profile()
  {
    $username = $this->input->post("username");
   $password = $this->input->post("password");
   $confirm = $this->input->post("confirm");
   $username = $this->sanitize_string($username);
   $password = trim($password);
   $confirm = trim($confirm);
    if($username==""){
      echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;username cannot be left empty</b>";
     }else if($password==""){
      echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;password cannot be left empty</b>";
     }else if($confirm ==""){
       echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;confirm cannot be left empty</b>";
     }else if($password !=$confirm){
      echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;password and confirm password dont match</b>";
     }else{
      $this->load->model("admin_mdl");
     $hashed_email = $this->get_email();
     $user_check_hash =  $this->admin_mdl->select_result_session($hashed_email);
     if($user_check_hash==""){
      echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;user seems not to exist</b>";
     }else{
      $data = $this->admin_update_array($username,$password,$confirm);
      $update = $this->admin_mdl->update_admin_profile($user_check_hash,$data);
    echo"<b>&nbsp;profile sucessfully updated</b>";
     }
     
     }
  }
   /*
     * THIS FUNCTION IS TO SET COOKIE VARIABLES
     * ==============================================================================
     */
  
     /*
     * ADMIN TABLES ARE MAPPED TO CONTENTS AS CONTENT WILL BE ADDED
     * ==============================================================================
     */
  
    public function admin_add_array($username,$email,$password,$confirm)
{
  $cookie_key = $this->cookie_key;
  $admin_cookie = md5($email)."".$cookie_key;
  $tm_password = md5($username)."".$this->tm_password_key;
  $password = $this->hash_password($password);
  $confirm = $this->hash_password($confirm);
$data = array(
'username' => $username,
'email' => $email,
'password' => $password,
"confirm"=>$confirm,
"tm_password"=>$tm_password,
"admin_cookie" => $admin_cookie,
);
return $data;
}

public function admin_update_array($username,$password,$confirm)
{
  $password = $this->hash_password($password);
  $confirm = $this->hash_password($confirm);
  $data = array(
    "username"=> $username,
    "password"=> $password,
    "confirm"=>$confirm
  );
  return $data;
}


  public function setCookie($cookie_value)
  {
   $cookie= array(
       'name'   => $this->cookie_name,
       'value'  => $cookie_value,
        'expire' => '86500',
        'path'   => '/',
           );
   $this->input->set_cookie($cookie);
    }

     /*
     * THIS FUNCTION IS TO SET THE SESSION VARIABLES
     * ==============================================================================
     */
   public function setSession($email)
   {
   return  $session_data = array(
      'email'     => $email,
      'logged_in' => TRUE
);     
   }
   /*
     * STRING SANITIZER
     * ==============================================================================
     */
   public function sanitize_string($input)
 {
  return filter_var($input, FILTER_SANITIZE_STRING);
 }
 /*
     * EMAIL VALIDATION
     * ==============================================================================
     */
public function validate_email($email)
{
return filter_var($email, FILTER_VALIDATE_EMAIL);
}
/*
     * PASSWORD HASHING
     * ==============================================================================
     */
public function hash_password($password)
{
  return password_hash($password,PASSWORD_DEFAULT);
}


/*
     * RETURNING TOTAL NUMBER OF PRODUCTS CATEGORIES PENDING AND PURCHASES
     * ==============================================================================
     */


     public function count_products()
     {
     $this->load->model("admin_mdl");
     return $this->admin_mdl->count_products();
     }

     public function count_categories()
     {
      $this->load->model("admin_mdl");
      return $this->admin_mdl->count_categories();
     }
     
     public function count_pending_products()
     {
      $this->load->model("admin_mdl");
      return $this->admin_mdl->count_purchase_pending();
     }
     public function count_purchased_products()
     {
      $this->load->model("admin_mdl");
      return $this->admin_mdl->count_purchased_products();
     }

//end of this class
}