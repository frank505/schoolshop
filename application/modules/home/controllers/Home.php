<?php
class Home extends MX_controller{

public function __construct(){
    parent::__construct();
    $this->load->module("templates");
}

public function index(){
$this->load->view("templates/header");
$this->load->view("body");
$this->load->view("templates/footer");
}

public function login(){
    $this->load->view("templates/header_login");
  $this->load->view("login");
}



}





?>