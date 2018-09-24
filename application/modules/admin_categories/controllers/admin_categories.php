<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH ."libraries/Page_Settings.php";

class admin_categories extends MX_Controller
{
   public function __construct()
   {
    parent::__construct();
    $this->load->module(["admin_categories","templates","admin"]);
    $this->load->helper('security');
    $this->load->library("pagination");
   }

    
  public function index()
  {      
       $data = $this->category();
       $data["total_values"] = $this->return_total_new_buyers();
    if($this->admin->checkSessionOrCookie()==TRUE){
      $data_send = Page_Settings::set_page('category_body', $data, '' , 'Welcome Once Again', 'admin_categories');
      $this->templates->backend($data_send); 
    }else if($this->admin->checkSessionOrCookie()==FALSE){
      redirect(base_url()."admin/login");      
      }
    
  }
  
     /*
     * THIS RETURNS THE TOTAL NUMBER NUMBER OF BUYERS WHO HAVE NOT BEEN  VIEWED OR APPROVED
     * =====================================================================================
     */

    public function return_total_new_buyers()
    {
     $this->load->model("admin_categories_mdl");
     $total_unseen = $this->admin_categories_mdl->return_total_buyers();
     return $total_unseen;
    }

  /*
     * PAGINATING CATEGORIES CONTENT FOR THE INDEX CATEGORY PAGE
     * ========================================================================
     */

    public function category()
    {
      $config = array();
      $this->load->model("admin_categories_mdl");
      $config["base_url"] = base_url() . "admin/categories/";
      $config['total_rows'] = $this->admin_categories_mdl->count_categories();
      $config['per_page'] = 5;
      $config['use_page_numbers'] = TRUE;     
      $config['uri_segment'] = 3; 
     $this->pagination->initialize($config);   
      if($this->uri->segment(3) > 0){
        $offset = ($this->uri->segment(3) + 0)*$config['per_page'] - $config['per_page'];
      }
      else{
        $offset = $this->uri->segment(3);
      }
      $data['results'] = $this->admin_categories_mdl->fetch_categories($config["per_page"], $offset);
      $data["links"] = $this->pagination->create_links();
       return $data;  

    }


    /*
     * AJAX FUNCTIONS
     * ========================================================================
     */

  public function add()
  {
    $categories = $this->input->post("cat");
    if($categories==""){
      echo "please category section is empty";
    }else{
        $categories = $data = $this->security->xss_clean($categories);
        $this->load->model("admin_categories/admin_categories_mdl");
        $total = $this->admin_categories_mdl->check_category($categories);
        if($total==0){
          $data = array(
            'cat_name' => $categories,
           );
           $this->admin_categories_mdl->add_categories($data);
          echo "new category successfully added"; 
        }else{
          echo "this category already exist";
        }
       }
    
  }


  public function delete_categories()
  {
   $id =  $this->input->get("id");
   if($id==""){
    echo "there seems to be a problem";    
   }else{
    $id = $this->security->xss_clean($id);
    $this->load->model("admin_categories/admin_categories_mdl");
    $this->admin_categories_mdl->delete_category($id);
   echo "content was successfully deleted";
  
   }
  
  }





}