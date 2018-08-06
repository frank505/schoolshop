<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_purchase_mdl extends CI_Model
{
 
    public function __construct()
    {
        parent::__construct();
    }
    
      public function return_buyers_table()
     {
     $table ="purchase_details";
     return $table;
     }

    public function return_total_number_buyers()
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


 public function search_purchase($search_term)
 {
     $table = $this->return_buyers_table();
     $filter = $this->input->post('name');
     if($filter == 'name')
     {
         $this->db->like('name',$search_term);
     }
      else if($filter == 'email')
     {
         $this->db->like('email',$search_term);
     }
      else if($filter == 'location')
     {
         $this->db->like('location',$search_term);
     
     }else if($filter == 'seller_location')
     {
        $this->db->like('seller_location',$search_term);
     }else if($filter == 'seller_number')
     {
        $this->db->like('seller_number',$search_term);

     }
      else
     {
     
         $this->db->like('name',$search_term);
         $this->db->or_like('email',$search_term);
         $this->db->or_like('location',$search_term);
         $this->db->or_like('seller_location',$search_term);
         $this->db->or_like('seller_number', $search_term);
          // Execute the query.
     
         }
         $this->db->order_by("id","DESC");
         $query = $this->db->get($table);
         return $query->result_array();
  }   
  
    public function fetch_purchase($limit,$start)
    {
      $table = $this->return_buyers_table();
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

    public function update_from_pending($data,$id)
    {
        $table = $this->return_buyers_table();
        $this->db->where("id", $id);
        $this->db->update($table, $data);  
        echo "this purchase is now considered seen and transaction successfull";
    }

    /*
     *  
     * THIS FUNCTION DELETES PRODUCTS CONTENT IN THE DATABASE
     * ==========================================================================================
     */
    public function delete_purchase_details($id)
    {
        $table = $this->return_buyers_table();
        $this->db->where('id', $id);
        return $this->db->delete($table);
    }



}
