<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI PLEASE NOTE*/
defined('BASEPATH') or exit('No direct script access allowed');
class templates extends MX_Controller
{
 
    public $cookie_name  = "__sch";

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * backend method handles the rendering of the dashboard view for administrator
     *
     * @param array $data
     * @return void
     */
    public function backend(array $data)
    {
        $this->load->view('backend', $data);
    }
     public function frontend(array $data)
     {
        $this->load->view('frontend', $data);
     }
    /**
     * middleend handles rendering of view such as login and register view
     *
     * @param array $data
     * @return void
     */
    public function middleend(array $data)
    {
        $this->load->view('middleend', $data);
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
        redirect(base_url() . "admin/login");
    }

    public function destroyCookie($cookie_value)
    {
        $cookie = array(
            'name' => $this->cookie_name,
            'value' => $cookie_value,
            'expire' => '-86500',
            'path' => '/',
        );
        $this->input->set_cookie($cookie);
    }

    //end of this class
}
