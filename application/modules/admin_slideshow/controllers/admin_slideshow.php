<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH ."libraries/Page_Settings.php";

class admin_slideshow extends MX_controller
{

public function __construct()
{
    parent::__construct();
    $this->load->module(["templates","admin"]);
    $this->load->helper('security');
    $this->load->library("pagination");
}

/*
     * THIS ADDS NEW SLIDESHOW TO THE AVAIALABLE SLIDESHOWS
     * ========================================================================
     */
public function index()
{
    $data["total_values"] = $this->return_total_new_buyers();
    $data["results"] = $this->fetch_slideshow();
    if($this->admin->checkSessionOrCookie()==TRUE){
        $data_send = Page_Settings::set_page('admin_slideshow', $data, '' , 'Welcome Once Again', 'admin_slideshow');
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
     $this->load->model("admin_slideshow_mdl");
     $total_unseen = $this->admin_slideshow_mdl->return_total_buyers();
     return $total_unseen;
    }
   /*
     * THIS WILL FETCH THE SLIDESHOW CONTENT
     * ========================================================================
     */
   public function fetch_slideshow()
 {
    $this->load->model("admin_slideshow_mdl");
    $value = $this->admin_slideshow_mdl->fetch_slideshow();
    return $value; 
 }

 /*
     * AJAX FUNCTIONS BEGINS HERE
     * ========================================================================
     */

 /*
     * THIS ADDS NEW SLIDESHOW TO THE AVAIALABLE SLIDESHOWS
     * ========================================================================
     */
public function add_slider_img()
{
    $header1 = $this->input->post("header1");
    $header2 = $this->input->post("header2");
    $link = $this->input->post("link");
    @$file_name = $_FILES["image"]["name"];
    @$tempoary_name = $_FILES["image"]["tmp_name"];
    @$file_size = $_FILES["image"]["size"];
    @$mime_type  = array("image/jpeg","image/png", "image/jpg");
    @$file_mime_type = mime_content_type(strtolower($tempoary_name));
    $timestamp = time();
    if($header1==""){
        echo "<b><i class='fa fa-warning'></i>&nbsp;please header one section is empty</b>";
    }else if($header2==""){
        echo "<b><i class='fa fa-warning'></i>&nbsp;please header two section is empty</b>";
    }else if($link==""){
        echo "<b><i class='fa fa-warning'></i>&nbsp;please be sure to enter a url</b> ";
    }else if(  !(in_array($file_mime_type, $mime_type)) ){
        echo"<b><i class='fa fa-warning'></i>&nbsp;oops! be sure its an image file of png jpg or jpeg</b>";
    }else if($file_size > 2097152){
        echo "<b><i class='fa fa-warning'></i>&nbsp;oops! file is too large please ensure is not more than 2mb</b>";
    }
    else {
            $header1 = $this->filter_sanitize_string($header1);
            $header2 = $this->filter_sanitize_string($header2);
            $link =  $this->security->xss_clean($link);
            $temp = explode(".", $file_name);
    $newfilename = round(microtime(true)) . '.' . end($temp);
            $this->load->model("admin_slideshow_mdl");
              $data = array(
                 'header_one'=>$header1,
                 'header_two'=>$header2,
                 'link'=>$link,
                 'time_sent'=>$timestamp,
                 'file_name'=>$newfilename,
               );
               $this->admin_slideshow_mdl->add_slideshow($data);
              move_uploaded_file($tempoary_name, "assets/slideshow_img/$newfilename");
              echo"<b><i class='fa fa-check-circle-o' aria-hidden='true'></i>&nbsp;new post has been added succesfully</b>";
           }
        }


        /*
     * THIS WILL DELETE SLIDESHOW CONTENT
     * ========================================================================
     */
    public function delete_slideshow()
    {
        $id =  $this->input->get("id");
        if($id==""){
         echo "there seems to be a problem";    
        }else{
         $id = $this->security->xss_clean($id);
         $this->load->model("admin_slideshow_mdl");
         $this->admin_slideshow_mdl->delete_slideshow($id);
        echo "content was successfully deleted";       
    }

    }
    /*
     * AJAX FUNCTIONS ENDS HERE
     * ========================================================================
     */


 /*
     * THIS FUNCTION SANITIZES CONTENT FROM SQL INJECTIONS
     * ========================================================================
     */
public function filter_sanitize_string($variable)
{
    return html_escape($variable);
}

//end of this class
}