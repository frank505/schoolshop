<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class buy_products extends MX_Controller
{
   public function __construct()
   {
    parent::__construct();
    $this->load->module("products");
    $this->load->helper('security');
    $this->load->library("pagination");
   }

  public function index($product_id)
  {  
    $products_category["categories"] =  $this->products_category();
    $this->load->view("templates/header",$products_category);
    $this->load->view("body_buy_products");
    $this->load->view("templates/footer");
  }


  /*
     * THIS FETCHES ALL CATEGORIES 
     * ========================================================================
     */
    public function products_category()
    {
     $this->load->model("buy_product_mdl");
     $value = $this->buy_product_mdl->fetch_categories();
     return $value;
    }

    public function add_purchase()
    {
        $id = $this->input->post("id");
  $name = $this->input->post("name");
   $email = $this->input->post("email");
   $location = $this->input->post("location");
   $phone = $this->input->post("phone");
   $id = $this->input->post("id");
   $name = $this->sanitize_string($name);
   $email = $this->check_email($email);
   $location = $this->sanitize_string($location);
   $phone = $this->sanitize_string($phone);
    if($name==""){
        echo "name section cannot be left empty";
    }else if($email==""){
        echo "email cannot be left empty";
    }else if($location==""){
      echo"location is required";
    }else if($phone==""){
     echo "user phone number is required";
    }else if(!(is_numeric($phone))){
        echo "this phone number is invalid";
    }else{
        $this->load->model("buy_product_mdl");
       $seller_number = $this->buy_product_mdl->return_seller_number($id);
         $seller_location = $this->buy_product_mdl->return_seller_location($id);
         $price = $this->buy_product_mdl->return_price($id);
         $not_seen = "0";
        $user_data = $this->mapped_buy_product_details($name,$email,$phone,
        $location,$seller_number,$seller_location,$not_seen,$price);
         $this->buy_product_mdl->insert_buyer($user_data);
        echo "thanks for your purchase we will give you a call or send a message in the next 24 hours";
        }
    }

    public function mapped_buy_product_details($name,$email,$phone,$location,
    $seller_number,$seller_location,$not_seen,$price)
    {
          $data = array(
              "name"=>$name,
              "email"=> $email,
              "phone"=> $phone,
              "location" =>$location,
              "seller_number"=>$seller_number,
              "seller_location" => $seller_location,
              "seen"=> $not_seen,
              "price"=>$price,
          );
          return $data;   
    }


    public function sanitize_string($string)
    {
        return filter_var($string, FILTER_SANITIZE_STRING);
    }


    public function check_email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}