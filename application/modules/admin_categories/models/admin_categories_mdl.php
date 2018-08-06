<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_categories_mdl extends CI_Model
{
 
    public function __construct()
    {
        parent::__construct();
    }
      public function return_table()
      {
        $table = "categories";
        return $table;
      } 

      public function return_buyers_table()
  {
     $table ="purchase_details";
     return $table;
  }


    public function add_categories($category)
    {
        $table = $this->return_table();
      $this->db->insert($table,$category);
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

     public function check_category($category)
     {
        $this->db->select("*");
        $this->db->from("categories");
        $this->db->where("cat_name", $category);
        $total_val = $this->db->count_all_results();
        return $total_val;
     }

     public function count_categories()
     {
       $table = $this->return_table();
      return $this->db->count_all($table);
     }
  
     public function fetch_categories($limit,$start)
     {
       $table = $this->return_table();
      $this->db->limit($limit, $start);
      $query = $this->db->get($table);

      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[] = $row;
          }
          return $data;
      }
      return false;
     }

     public function delete_category($id)
     {
       $table = $this->return_table();
       $this->db->where('id', $id);
       return $this->db->delete($table);
     }

     








}