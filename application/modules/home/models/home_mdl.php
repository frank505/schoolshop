<?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class home_mdl extends CI_Model
{
 
   public function __construct()
    {
        parent::__construct();
    }


     /*
     * THIS RETURNS THE PRODUCTS TABLE
     * ========================================================================
     */
    public function return_products_table()
    {
      $table = "products";
      return $table;
    } 
/*
     * THIS RETURNS THE PRODUCT TABLE
     * ========================================================================
     */

   public function return_slideshow_table()
   {
    $table ="slide_show";
        return $table;
   }

    /*
     * THIS RETURNS THE CATEFGORY TABLE
     * ========================================================================
     */

    public function return_cat_table()
    {
        $table ="categories";
        return $table;
    }
     /*
     * THIS FETCHES PRODUCTS WITH A LIMIT ON THE HOME PAGE
     * ========================================================================
     */
    public function fetch_products($limit)
    {
      $table = $this->return_products_table();
      $this->db->order_by('id', 'DESC');
      $this->db->limit($limit);
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
     * THIS FETCHES THE PAGINATED PRODUCT FOR HOME PAGE FROM THE DATABASE
     * ========================================================================
     */
    public function fetch_paginated_products($limit,$start)
    {
        $table = $this->return_products_table();
        $this->db->order_by('id', 'DESC');
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
     * THIS COUNTS THE TOTAL NUMBER OF ALL PRODUCTS
     * ========================================================================
     */

    public function count_products()
    {
      $table = $this->return_products_table();
     return $this->db->count_all($table);
    }

    /*
     * THIS COUNTS THE PRODUCTS IN CERTAIN CATEGORIES IN THE PRODUCTS-CATEGORY VIEW  AVAILABLE
     * =================================================================================================
     */

     public function count_products_categories($product_category)
     {
         $table = $this->return_products_table();
        $this->db->where('category', $product_category);
        $this->db->from($table);
        return $this->db->count_all_results();
     }

      /*
     * THIS RETURNS THE PRODUCTS IN CERTAIN CATEGORIES IN THE PRODUCTS-CATEGORY VIEW  AVAILABLE
     * =================================================================================================
     */
     public function fetch_paginated_products_categories($limit,$start,$product_category)
     {
         $table = $this->return_products_table();
         $this->db->where('category', $product_category);
         $this->db->order_by('id', 'DESC');
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
     * THIS RETURNS THE CATEGORIES
     * ================================================================================
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

  /*
     * THIS RETURNS THE SLIDESHOW CONTENT
     * =================================================================================
     */
    public function fetch_slideshow()
    {
        $table = $this->return_slideshow_table();
        $query = $this->db->get($table);
        foreach ($query->result() as $key => $value) {
           $data[] = $value;
        }
        return  $data;
    }


    public function fetch_single_detail_product($id)
 {
   $table = $this->return_products_table();
   $this->db->where("id", $id);
   $query = $this->db->get($table);
   if ($query->num_rows() > 0) {
    foreach ($query->result() as $row) {
        $data[] = $row;
    }
    return $data;
}
return false;
 }


 function fetch_related_products_limit($limit,$id)
 {
  $table = $this->return_products_table();
  $this->db->where("id<", $id);
  $this->db->order_by('id', 'DESC');
 $this->db->limit($limit);
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
     * THIS RETURNS THE IMMIDIATE VIEW OR BRIEF DESCRIPTION OF THE PRODUCTS
     * =================================================================================
     */
 
    public function immidiate_view($id)
    {
        $table = $this->return_products_table();
        $this->db->where("id", $id);
       $query = $this->db->get($table); 
  
       if ($query->num_rows() > 0) {
           foreach ($query->result() as $row) {
               $data[] = $row;
           }
           return $data;
       }
       return false;
    }

//end of this class
}