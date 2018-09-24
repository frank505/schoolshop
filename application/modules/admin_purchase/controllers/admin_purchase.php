<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH ."libraries/Page_Settings.php";

class admin_purchase extends MX_Controller
{
   public function __construct()
   {
    parent::__construct();
    $this->load->helper('security');
    $this->load->library("pagination");
    $this->load->module(["admin","templates"]);
   }

public function index()
{
    $data = $this->fetch_paginated_purchase();
    $data["total_values"] = $this->return_total_new_buyers();
    if($this->admin->checkSessionOrCookie()==TRUE){
      $data_send = Page_Settings::set_page('body_admin_purchase', $data, '' , 'Welcome Once Again', 'admin_purchase');
      $this->templates->backend($data_send); 
      }else if($this->admin->checkSessionOrCookie()==FALSE){
        redirect(base_url()."admin/login");      
        }
}

public function return_total_new_buyers()
{
 $this->load->model("admin_purchase_mdl");
 $total_unseen = $this->admin_purchase_mdl->return_total_number_buyers();
 return $total_unseen;
}


public function update_from_pending()
{
  $data = $this->map_product_detail_update();
  $id = $this->input->get("id");
  $id = html_escape($id);
  $this->load->model("admin_purchase_mdl");
  $this->admin_purchase_mdl->update_from_pending($data,$id);
}


public function map_product_detail_update()
{
$seen = "1";
$data = array(
 "seen"=>$seen,
);
return $data;
}

public function fetch_paginated_purchase()
{

    $config = array();
    $this->load->model("admin_purchase_mdl");
    $config["base_url"] = base_url() . "admin/purchase-details/";
    $config['total_rows'] = $this->admin_purchase_mdl->return_total_number_buyers();
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
    $data['results'] = $this->admin_purchase_mdl->fetch_purchase($config["per_page"], $offset);
    $data["links"] = $this->pagination->create_links();
     return $data;  


}




  /*
     * DELETE SINGLE PRODUCT 
     * ========================================================================
     */

    public function delete_purchase_details()
    {
   $id = $this->input->get("id");
    if($id==""){
      echo "id cannot be left empty";
    }else{
     $id = $this->security->xss_clean($id);
     $this->load->model("admin_purchase_mdl");
     $this->admin_purchase_mdl->delete_purchase_details($id);
    echo "content was successfully deleted";
   
    }
 
    }
 
    /*
      * SEARCH FOR PRODUCT 
      * ========================================================================
      */
 
    public function search_purchase()
    {
     $search_content = $this->input->get("search");
     if($search_content==""){
       
     }else{
       $search_content = $this->security->xss_clean($search_content);
      $this->load->model("admin_purchase_mdl");
     $data["results"] = $this->admin_purchase_mdl->search_purchase($search_content);
      print json_encode($data);
     }
    }
 
    
 
 


}