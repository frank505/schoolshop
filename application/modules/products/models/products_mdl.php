<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class products_mdl extends CI_Model
{
 
    public function __construct()
    {
        parent::__construct();
    }
      public function return_table()
      {
        $table = "products";
        return $table;
      } 

      public function return_buyers_table()
      {
          $table ="purchase_details";
          return $table;
      }
     
      public function return_cat_table()
      {
          $table = "categories";
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

    public function add_products($product_details)
    {
        $table = $this->return_table();
     return  $this->db->insert($table,$product_details);
    }
     
    /*
     * THIS FUNCTION FETCHES ALL PRODUCT DETAILS TO BE USED IN THE UPDATE SECTION ONCE THE UPDATE 
     * VIEW IS CALLED
     * ==========================================================================================
     */

      public function fetch_update_products_details($id)
      {
        $table = $this->return_table();
        $this->db->where("id", $id);
        $query = $this->db->get($table);
        foreach ($query->result() as $key => $value) {
           $data[] = $value;
        }
        return  $data;
    }

     /*
     * 
     * THIS FUNCTION UPDATES PRODUCTS IN THE DATABASE
     * ==========================================================================================
     */

    public function update_products($data,$id)
    {
      $table = $this->return_table();
      $this->db->where("id", $id);
      return $this->db->update($table, $data);  
    }
    /*
     *  
     * THIS FUNCTION DELETES PRODUCTS CONTENT IN THE DATABASE
     * ==========================================================================================
     */
    public function delete_products($id)
    {
        $table = $this->return_table();
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }

    public function count_products()
    {
      $table = $this->return_table();
     return $this->db->count_all($table);
    }
 
   
 public function search_products($search_term)
 {
     $table = $this->return_table();
     $filter = $this->input->post('prod_name');
     if($filter == 'prod_name')
     {
         $this->db->like('prod_name',$search_term);
     }
      else if($filter == 'seller_number')
     {
         $this->db->like('seller_number',$search_term);
     }
      else if($filter == 'seller_location')
     {
         $this->db->like('seller_location',$search_term);
     
     }
      else
     {
     
         $this->db->like('prod_name',$search_term);
         $this->db->or_like('seller_number',$search_term);
         $this->db->or_like('seller_location',$search_term);
          // Execute the query.
     
         }
         $this->db->order_by("id","DESC");
         $query = $this->db->get($table);
         return $query->result_array();
  }   
  
    public function fetch_products($limit,$start)
    {
      $table = $this->return_table();
      $this->db->order_by("id","DESC");
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

   /*
     * THIS FUNCTION FETCHES  CATEGORIES FROM THE CATEGORY SECTION !
     * ========================================================================
     */


      public function fetch_categories()
      {
          $table = $this->return_cat_table();
          $query = $this->db->get($table);
          foreach ($query->result() as $key => $value) {
             $data[] = $value;
          }
          return  $data;
      }



}