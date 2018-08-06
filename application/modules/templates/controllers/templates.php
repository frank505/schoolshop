<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');
class templates extends MX_Controller
{
    public $cookie_name  = "__sch";

    public function __construct()
    {
        parent::__construct();
      
    }

    public function header()
    {
     $this->load->view("header");
    }

    public function footer()
    {
    $this->load->view("footer");
    }
  public function header_login()
  {
      $this->load->view("header_login");
  }

public function clear_session_cookies()
{
    $cookie_value = "";
    session_destroy();
    $this->destroyCookie($cookie_value);
    redirect(base_url()."admin/login");
}

public function destroyCookie($cookie_value)
  {
   $cookie= array(
       'name'   => $this->cookie_name,
       'value'  => $cookie_value,
        'expire' => '-86500',
        'path'   => '/',
           );
   $this->input->set_cookie($cookie);
    }

  //end of this class
  }
