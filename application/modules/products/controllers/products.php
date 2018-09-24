<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH ."libraries/Page_Settings.php";


class products extends MX_Controller
{
   public function __construct()
   {
    parent::__construct();
    $this->load->module(["products","templates","admin"]);
    $this->load->helper('security');
    $this->load->library("pagination");
   }

    
  public function index()
  {
    $data["total_values"] = $this->return_total_new_buyers();
     $data["results"] = $this->products_category();
    if($this->admin->checkSessionOrCookie()==TRUE){
      $data_send = Page_Settings::set_page('add_products_body', $data, '' , 'Welcome Once Again', 'products');
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
     $this->load->model("products_mdl");
     $total_unseen = $this->products_mdl->return_total_buyers();
     return $total_unseen;
    }

    /*
     * FETCH ALL CATEGORY SECTION  
     * ========================================================================
     */

    public function products_category()
    {
     $this->load->model("products_mdl");
     $value = $this->products_mdl->fetch_categories();
     return $value;
    }
     
   
  public function view_products()
  { 
    
    $data = $this->fetch_paginated_products();
    $data["total_values"] = $this->return_total_new_buyers();
    if($this->admin->checkSessionOrCookie()==TRUE){
      $data_send = Page_Settings::set_page('view_products_body', $data, '' , 'Welcome Once Again', 'products');
      $this->templates->backend($data_send);
    }else if($this->admin->checkSessionOrCookie()==FALSE){
      redirect(base_url()."admin/login");      
      }
        
  }

  
   /*
     * FETCH ALL PAGINATED PRODUCTS  
     * ========================================================================
     */


  public function fetch_paginated_products()
  {

    $config = array();
      $this->load->model("products_mdl");
      $config["base_url"] = base_url() . "admin/view-products/";
      $config['total_rows'] = $this->products_mdl->count_products();
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
      $data['results'] = $this->products_mdl->fetch_products($config["per_page"], $offset);
      $data["links"] = $this->pagination->create_links();
       return $data;  

  }

  
   /*
     * FETCH ALL PRODUCTS TO THE UPDATE VIEW FOR THEM TO BE UPDATED 
     * ========================================================================
     */

     public function fetch_update_products($id)
     {
       $this->load->model("products_mdl");
      $data = $this->products_mdl->fetch_update_products_details($id);
      return $data;
     }



 /*
     * LOAD PRODUCT admin/update-products/$1 VIEW WITH PRODUCT CONTENT TO BE UPDATED AND CATEGORY FOR SELECTION 
     * ========================================================================================================
     */

  public function update_products($id)
  {
    $data["total_values"] = $this->return_total_new_buyers();
    $data["results"] = $this->products_category();
    $data["update_content"] = $this->fetch_update_products($id);
    if($this->admin->checkSessionOrCookie()==TRUE){
      $data_send = Page_Settings::set_page('update_products_body', $data, '' , 'Welcome Once Again', 'products');
      $this->templates->backend($data_send);
    }else if($this->admin->checkSessionOrCookie()==FALSE){
      redirect(base_url()."admin/login");      
      }

  }



   
 
   /*
     * AJAX FUNCTIONS 
     * ========================================================================
     */

     
   /*
     * ADD NEW PRODUCTS 
     * ========================================================================
     */

  public function add_products()
  {
      $product_name = $this->input->post("prod_name");
    $category = $this->input->post("cat");
    $price = $this->input->post("price");
    $currency = $this->input->post("currency");
    $description = $this->input->post("description");
    $seller_name = $this->input->post("seller_name");
    $seller_number = $this->input->post("seller_number");
    $seller_location = $this->input->post("seller_location");
     @$file_name = $_FILES["image"]["name"];
    @$tempoary_name = $_FILES["image"]["tmp_name"];
    @$file_size = $_FILES["image"]["size"];
    @$mime_type  = array("image/jpeg","image/png", "image/jpg");
    @$file_mime_type = mime_content_type(strtolower($tempoary_name));
    $timestamp = time();
    $product_name = $this->sanitize_string($product_name);
    $category = $this->sanitize_string($category);
    $price = $this->sanitize_string($price);
    $currency = $this->sanitize_string($currency);  
    $description = $this->sanitize_string($description);
    $seller_location = $this->sanitize_string($seller_location);
    $seller_name = $this->sanitize_string($seller_name);
    $seller_number = $this->sanitize_string($seller_number);
   if($product_name==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;product name cannot be left empty</b>";
    }else if($category=="" || $category=="Select A Category"){
      echo"<b><i class='fa fa-warning'></i>&nbsp;this category section cannot be left empty</b>";
    }else if($price==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;price section cannot be left empty</b>";
    }else if($currency=="" || $currency=="currency"){
      echo"<b><i class='fa fa-warning'></i>&nbsp;currency cannot be left empty</b>";
    }else if($description==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;product description  cannot be left empty</b>";
    }else if($seller_name==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;seller name cannot be left empty</b>";
    }else if($seller_number==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;seller number cannot be left empty</b>";
    }else if($seller_location==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;product description  cannot be left empty</b>";
    }else if(!(is_numeric($price))){
    echo "<b><i class='fa fa-warning'></i>&nbsp;price must be a number</b>";
    }else if(  !(in_array($file_mime_type, $mime_type)) ){
      echo"<b><i class='fa fa-warning'></i>&nbsp;oops! be sure its an image file of png jpg or jpeg</b>";
  }else if($file_size > 2097152){
      echo "<b><i class='fa fa-warning'></i>&nbsp;oops! file is too large please ensure is not more than 2mb</b>";
  }else{
    $temp = explode(".", $file_name);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $data = $this->product_add_array($product_name,$category,$price,$description,$currency,
    $seller_name,$seller_location,$seller_number,$newfilename);
    $this->load->model("products_mdl");
    $items = $this->products_mdl->add_products($data);
        if($items){
      move_uploaded_file($tempoary_name, "assets/prod_img/$newfilename");
      echo"<b><i class='fa fa-check-circle-o' aria-hidden='true'></i>&nbsp;new post has been added succesfully</b>";
    }else{
      echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;error adding products";
     }
  }


  }

     /*
     * UPDATE PRODUCT FROM UPDATE VIEW 
     * ========================================================================
     */
       
   public function update_table_products()
   {
     $id = $this->input->post("id");
    $product_name = $this->input->post("prod_name");
    $category = $this->input->post("cat");
    $price = $this->input->post("price");
    $currency = $this->input->post("currency");
    $description = $this->input->post("description");
    $seller_name = $this->input->post("seller_name");
    $seller_number = $this->input->post("seller_number");
    $seller_location = $this->input->post("seller_location");
     @$file_name = $_FILES["image"]["name"];
    @$tempoary_name = $_FILES["image"]["tmp_name"];
    @$file_size = $_FILES["image"]["size"];
    @$mime_type  = array("image/jpeg","image/png", "image/jpg");
    @$file_mime_type = mime_content_type(strtolower($tempoary_name));
    $timestamp = time();
    $id = $this->sanitize_string($id);
    $product_name = $this->sanitize_string($product_name);
    $category = $this->sanitize_string($category);
    $price = $this->sanitize_string($price);
    $currency = $this->sanitize_string($currency);  
    $description = $this->sanitize_string($description);
    $seller_location = $this->sanitize_string($seller_location);
    $seller_name = $this->sanitize_string($seller_name);
    $seller_number = $this->sanitize_string($seller_number);
   if($product_name==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;product name cannot be left empty</b>";
    }else if($category=="" || $category=="Select A Category"){
      echo"<b><i class='fa fa-warning'></i>&nbsp;this category section cannot be left empty</b>";
    }else if($price==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;price section cannot be left empty</b>";
    }else if($currency=="" || $currency=="currency"){
      echo"<b><i class='fa fa-warning'></i>&nbsp;currency cannot be left empty</b>";
    }else if($description==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;product description  cannot be left empty</b>";
    }else if($seller_name==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;seller name cannot be left empty</b>";
    }else if($seller_number==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;seller number cannot be left empty</b>";
    }else if($seller_location==""){
      echo"<b><i class='fa fa-warning'></i>&nbsp;product description  cannot be left empty</b>";
    }else if(!(is_numeric($price))){
    echo "<b><i class='fa fa-warning'></i>&nbsp;price must be a number</b>";
    }else if(  !(in_array($file_mime_type, $mime_type)) ){
      echo"<b><i class='fa fa-warning'></i>&nbsp;oops! be sure its an image file of png jpg or jpeg</b>";
  }else if($file_size > 2097152){
      echo "<b><i class='fa fa-warning'></i>&nbsp;oops! file is too large please ensure is not more than 2mb</b>";
  }else{
    $temp = explode(".", $file_name);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    $data = $this->product_add_array($product_name,$category,$price,$description,$currency,
    $seller_name,$seller_location,$seller_number,$newfilename);
    $this->load->model("products_mdl");
    $update_content = $this->products_mdl->update_products($data, $id);
    if($update_content){
      move_uploaded_file($tempoary_name, "assets/prod_img/$newfilename");
      echo"<b><i class='fa fa-check-circle-o' aria-hidden='true'></i>&nbsp;product was updated succesfully</b>";
    }else{
      echo"<b><i class='fa fa-warning' aria-hidden='true'></i>&nbsp;error updating products";
    }
 
  }
  
   }


  /*
     * DELETE SINGLE PRODUCT 
     * ========================================================================
     */

   public function delete_products()
   {
  $id = $this->input->get("id");
   if($id==""){
     echo "id cannot be left empty";
   }else{
    $id = $this->security->xss_clean($id);
    $this->load->model("products/products_mdl");
    $this->products_mdl->delete_products($id);
   echo "content was successfully deleted";
  
   }

   }

   /*
     * SEARCH FOR PRODUCT 
     * ========================================================================
     */

   public function search_products()
   {
    $search_content = $this->input->get("search");
    if($search_content==""){
      
    }else{
      $search_content = $this->security->xss_clean($search_content);
     $this->load->model("products_mdl");
    $data["results"] = $this->products_mdl->search_products($search_content);
     print json_encode($data);
    }
   }

   

   /*
     * END OF AJAX FUNCTIONS 
     * ========================================================================
     */

  /*
     * MAP TABLE NAME TO PRODUCTS CONTENT  
     * ========================================================================
     */
     
   public function product_add_array($prod_name,$category,$price,$description,
                                      $currency,$seller_name,$seller_location,
                                      $seller_number,$file_name)
      {
    $data = array(
      'prod_name' => $prod_name,
      'category' => $category,
      'price' => $price,
      "description"=>$description,
      "currency"=>$currency,
      "seller_name" => $seller_name,
      'seller_location' => $seller_location,
      'seller_number'=> $seller_number,
      'file_name'=>$file_name 
     );
     return $data;
       }


  /*
     * FILTER SANITIZE STRINGS  
     * ========================================================================
     */
  
 public function sanitize_string($input)
 {
  return filter_var($input, FILTER_SANITIZE_STRING);
 }




  //end of this class
}