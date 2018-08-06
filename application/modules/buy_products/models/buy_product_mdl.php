    <?php
/* THIS CLASS WAS WRITTEN BY AKPU FRANKLIN CHIMAOBI*/
defined('BASEPATH') OR exit('No direct script access allowed');

class buy_product_mdl extends CI_Model
{
 
    public function __construct()
    {
        parent::__construct();
    }
  
    public function return_cat_table()
    {
        $table = "categories";
        return $table;
    }
  
    public function return_buy_product_table()
    {
        $table = "purchase_details";
        return $table;
    }
  public function return_product_table()
  {
      $table = "products";
      return $table;
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

    public function insert_buyer($data)
    {
        $table = $this->return_buy_product_table();
       return $this->db->insert($table,$data);
    }

    public function return_seller_number($id)
    {
    
        $table = $this->return_product_table();
        $this->db->where("id", $id);
       $query = $this->db->get($table);
        foreach ($query->result() as $key => $value) {
            $seller_number = $value->seller_number;
            return $seller_number;
        }
       
    }

    public function return_price($id)
    {
        $table = $this->return_product_table();
        $this->db->where("id", $id);
       $query = $this->db->get($table);
        foreach ($query->result() as $key => $value) {
            $price = $value->price;
            $currency = $value->currency;
            $total_cost = $currency."".$price;
            return $total_cost;
        }
    }

   

    public function return_seller_location($id)
    {
        $table = $this->return_product_table();
        $this->db->where("id", $id);
       $query = $this->db->get($table);
        foreach ($query->result() as $key => $value) {
            $seller_location = $value->seller_location;
            return $seller_location;
        }
    }

    //end of this class
}