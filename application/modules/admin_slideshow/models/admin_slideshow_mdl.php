<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_slideshow_mdl extends CI_Model
{
 
    public function __construct()
    {
        parent::__construct();
    }
      public function return_table()
      {
        $table = "slide_show";
        return $table;
      } 

      public function return_buyers_table()
     {
     $table ="purchase_details";
     return $table;
    }

    public function return_total_buyers()
 {
     $number = 0;
     $table = $this->return_buyers_table();
   $this->db->select("*");
     $this->db->from($table);
  $where = "seen='$number'";
    $this->db->where($where);
   $total_val = $this->db->count_all_results();
   return $total_val;
 }

      /*
     * THIS ADDS NEW SLIDESHOW TO THE AVAIALABLE SLIDESHOWS
     * ========================================================================
     */
      public function add_slideshow($content_slider)
      {
          $table = $this->return_table();
        $this->db->insert($table,$content_slider);
      }
    
     /*
     * THIS FETCHES THE CONTENT OF THE SLIDESHOW
     * ========================================================================
     */
      public function fetch_slideshow()
      {
        $table = $this->return_table();
        $query = $this->db->get($table);
        foreach ($query->result() as $key => $value) {
           $data[] = $value;
        }
        return  $data;
      }
   /*
     * THIS DELETES THE SLIDESHOW CONTENT
     * ========================================================================
     */
      public function delete_slideshow($id)
      {
        $table = $this->return_table();
        $this->db->where('id', $id);
        return $this->db->delete($table);
      }
    //end of this class
    }