<?php
class templates extends MX_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function header(){
     $this->load->view("header");
    }

    public function footer(){
    $this->load->view("footer");
    }
  public function header_login(){
      $this->load->view("header_login");
  }




}