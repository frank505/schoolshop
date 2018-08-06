<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends MX_controller
{

public function __construct()
{
    parent::__construct();
    $this->load->module("templates");
    $this->load->module("home");
    $this->load->helper('security');
    $this->load->library("pagination");
}

public function index()
{ 
     $data["slide_show"] = $this->slideshow_display();
    $products_category["categories"] =  $this->products_category();//this fetches categories used in the navigation link
    $data["products"] = $this->fetch_limit_products();
    $data["category"] = $this->products_category();//this fetches the categories used in the home page for animation of products avaialable
$this->load->view("templates/header",$products_category);
$this->load->view("body_index",$data);
$this->load->view("templates/footer");
}


 /*
     * THIS LOADS THE PRODUCTS VIEW WITH PAGINATED CONTENTS
     * ========================================================================
     */

     public function products()
     {
        $data = $this->fetch_paginated_products();
        $products_category["categories"] =  $this->products_category();
         $this->load->view("templates/header",$products_category);
         $this->load->view("body_product",$data);
         $this->load->view("templates/footer");
     }


     /*
     * THIS LOADS THE PRODUCTS-CATEGORY VIEW WITH PAGINATED CONTENTS
     * ========================================================================
     */

   public function products_category_section($content)
   {
     $data = $this->fetch_category_product_pagination($content);
    $products_category["categories"] =  $this->products_category();
    $this->load->view("templates/header",$products_category);
    $this->load->view("body_cat_products",$data);
    $this->load->view("templates/footer");
   }

    /*
     * THIS LOADS THE BUY PRODUCTS VIEW
     * ========================================================================
     */




 public function product_details($id)
 {
   $data["content"] = $this->fetch_single_detail_product($id);
   $data["more_products"] = $this->fetch_related_products_limit($id);
  $products_category["categories"] =  $this->products_category();
 $this->load->view("templates/header", $products_category);
 $this->load->view("body_product_details",$data);
 $this->load->view("templates/footer");

 }

 

 



 public function fetch_related_products_limit($id)
 {
   $limit = 8;
   $this->load->model("home_mdl");
$data = $this->home_mdl->fetch_related_products_limit($limit,$id);
return $data;
 }

 public function fetch_single_detail_product($id)
 {
   $id = html_escape($id);
   if($id==""){

   }else{
    $this->load->model("home_mdl");
    $content_display = $this->home_mdl->fetch_single_detail_product($id);  
    return $content_display; 
   }
  
 }


public function login()
{
    $this->load->view("templates/header_login");
  $this->load->view("login");
}

 /*
     * THIS FETCHES PRODUCTS ON THE HOME PAGE WITH LIMIT
     * ========================================================================
     */

public function fetch_limit_products()
{
$limit = 16;
$this->load->model("home_mdl");
$data = $this->home_mdl->fetch_products($limit);
return $data;
}



/*
     * THIS FETCHES ALL CATEGORIES 
     * ========================================================================
     */
    public function products_category()
    {
     $this->load->model("home_mdl");
     $value = $this->home_mdl->fetch_categories();
     return $value;
    }

  
    
/*
     * THIS FETCHES ALL PRODUCTS CONTENT WITH PAGINATION
     * ========================================================================
     */
  public function fetch_paginated_products()
  {

    $config = array();
      $this->load->model("home_mdl");
      $config["base_url"] = base_url() . "home/products/";
      $config['total_rows'] = $this->home_mdl->count_products();
      $config['per_page'] = 8;
      $config['use_page_numbers'] = TRUE;     
      $config['uri_segment'] = 3; 
     $this->pagination->initialize($config);   
      if($this->uri->segment(3) > 0){
        $offset = ($this->uri->segment(3) + 0)*$config['per_page'] - $config['per_page'];
      }
      else{
        $offset = $this->uri->segment(3);
      }
      $data['results'] = $this->home_mdl->fetch_paginated_products($config["per_page"], $offset);
      $data["links"] = $this->pagination->create_links();
       return $data;  

  }
  /*
     * THIS FETCHES SPECIFIC CATEGORY PRODUCTS CONTENT WITH PAGINATION
     * ========================================================================
     */
  public function fetch_category_product_pagination($products_category)
  {
    $config = array();
      $this->load->model("home_mdl");
      $config["base_url"] = base_url() . "home/products-category/$products_category/";
      $config['total_rows'] = $this->home_mdl->count_products();
      $config['per_page'] = 8;
      $config['use_page_numbers'] = TRUE;     
      $config['uri_segment'] = 3; 
     $this->pagination->initialize($config);   
      if($this->uri->segment(3) > 0){
        $offset = ($this->uri->segment(3) + 0)*$config['per_page'] - $config['per_page'];
      }
      else{
        $offset = $this->uri->segment(3);
      }
      $data['results'] = $this->home_mdl->fetch_paginated_products_categories($config["per_page"], $offset,$products_category);
      $data["links"] = $this->pagination->create_links();
       return $data;  

  }
     /*
     * THIS FETCHES THE SLIDESHOW CONTENT TO BE DISPLAYED
     * ========================================================================
     */

  public function slideshow_display()
  {
    $this->load->model("home_mdl");
    $data = $this->home_mdl->fetch_slideshow();
    return $data;    
  }
   /*
     * THIS DISPLAYS THE IMAGE ON PARTIAL VIEW DETAILS
     * ========================================================================
     */
  public function immidiate_view()
  {
    $id = $this->input->get("id");
    $this->load->model("home_mdl");
    $data = $this->home_mdl->immidiate_view($id);
    print json_encode($data);
  }

 

//end of this class
}





?>