<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller
{

    public function __construct()
    {
	parent::__construct();
	$this->load->model('mdl_category');
	$this->load->module(['templates','configurations']);
	//$this->configurations->isUserLoggedIn();
    }

    /*
     *  SITE PAGES
     */

    function index()
    {
	//$this->configurations->isUserLoggedIn();
	$data = $this->page_settings('default', NULL, NULL, 'Category manager');
	$this->templates->backend($data);
    }

    function view()
    {
	$data['categorys'] = $this->mdl_category->get();
	$this->load->view('view', $data);
    }

    function add()
    {
	$this->validate_form();
	if ($this->form_validation->run() == TRUE) {
	    $this->submit_data();
	}
	
	$this->load->view('add');
    }

    function edit($id)
    {
	$this->validate_form();
	if ($this->form_validation->run() == TRUE) {
	    $this->submit_data();
	} else {
	    $data = $this->page_settings('default', $this->get_profile_from_db($id), NULL, 'Category manager');
	    $this->templates->backend($data);
	}
    }

    function delete($id)
    {
	if (!is_numeric($id)) {
	    redirect('category/', 'refresh');
	}
	$this->_delete($id);
	redirect('category/', 'refresh');
    }

    function profile($id)
    {
	if (!is_numeric($id)) {
	    redirect('');
	}
	$data['customer'] = $this->get_where($id);
	$data['view_file'] = 'profile';
	$this->templates->admin($data);
    }

    function submit_data()
    {
	//get data from post
	$data = $this->get_data_from_post();
	$id = $this->uri->segment(3);
	$this->db->or_where($data);
	$count = $this->db->get('categories')->num_rows();
	if ( $count > 0 && ! is_numeric($id) ) {
	    $this->session->set_flashdata('error','This category already exist.');
	    redirect('category/', 'refresh');
	}
	if (is_numeric($id)) {
	    $this->_update($id, $data);
	    $this->_set_default($id);
	    redirect('category/', 'refresh');
	} else {
	    $this->_insert($data);
	    $this->_set_default($this->db->insert_id() );
	    redirect('category/', 'refresh');
	}
//            }
    }

    /*
     *  HELPER FUNCTIONS
     */    
    function _set_default( $id, $defaultPostName = 'default' )
    {
	if ( $this->input->post($defaultPostName) == 1 || $defaultPostName == 1) {
	    $this->db->where('is_default', 1);
	    $this->db->update('category', ['is_default' => NULL]);

	    $this->db->where('cat_id', $id);
	    return $this->db->update('category', ['is_default' => 1]);
	}
    }
    
    function set_default( $id )
    {
	if ( $this->_set_default($id, 1) )
	{
	    $this->session->set_flashdata('success','Category was set to default succesfully');
	}else{
	    $this->session->set_flashdata('error','Category was not set to default please try again');
	}
	redirect('category/', 'refresh');
    }
    
    function can_category_do( $id, $action )
    {
	$this->db->where('cat_id', $id);
	$category = $this->db->get('category')->row();
	return in_array($action, unserialize($category->priv));
    }
    
    function get_category_privilege( $cat_id )
    {
	$category = $this->_get_where($cat_id)->row();
	return unserialize($category->priv);
    }
    
    function get_category_name( $cat_id )
    {
	$category = $this->_get_where($cat_id)->row();
//	$this->debug($category->catname);
	if ( count($category) > 0 ){
	    return $category->catname;
	}else{
	    return false;
	}
    }
    
    function get_default_category()
    {
	$this->db->where('is_default', 1);
	$category = $this->db->get('category')->row();
	return $category->cat_id;
    }
    
    function get_data_from_post()
    {
	$data['catname'] = $this->input->post('category');
	$data['slug'] = url_title($data['catname'].' '. random_string());
	
	if ( !empty( $this->input->post('parent') ) )
	{
	    $data['parent_id'] = $this->input->post('parent');
	}
	
	if ( !empty( $this->input->post('icon') ) )
	{
	    $data['icon'] = $this->input->post('icon');
	}

	return $data;
    }

    function get_profile_from_db($id)
    {
	$this->load->model('mdl_category');
	$returned = $this->mdl_category->get_where($id)->row();

	$data['category'] = $returned->catname;
	$data['parent'] = $returned->parent_id;
	$data['icon'] = $returned->icon;
	$data['slug'] = $returned->slug;
	$data['id'] = $id;

	return $data;
    }
    
    /*
     * AJAX APIs
     */
    function ajax_view_children()
    {
	$id = $this->input->post( 'parent_id' ); //change this to match your data-id from ajax call
	if ( !is_numeric( $id ) ) {
	    echo json_encode( ['status' => FALSE] );
	    return;
	}

	$result = $this->_get_where_custom('parent_id', $id )->result();
	if ( count( $result ) > 0 ) {
	    foreach ( $result as $col )
	    {
		//do the extraction here and assign to $data
		$data[] = ['itemValue' => $col->catname, 'itemID' => $col->cat_id, 'slug' => $col->slug];
	    }
	    echo json_encode( $data );
	    return;
	}
	echo json_encode( ['status' => FALSE] );
	return;
    }

  /*
   * CRUD OPERATIONS
   * ==========================================================================
   */
    function _insert($data)
    {
	$this->load->model('mdl_category');
	if ($this->mdl_category->_insert($data)) {
	    $this->session->set_flashdata('success', 'New category was added successfully');
	} else {
	    $this->session->set_flashdata('error', 'No category was added.');
	}
    }

    function _update($id, $data)
    {
	$this->load->model('mdl_category');
	if ($this->mdl_category->_update($id, $data)) {
	    $this->session->set_flashdata('success', 'update successfully');
	} else {
	    $this->session->set_flashdata('error', 'update failed.');
	}
    }

    function _delete($id)
    {
	$this->load->model('mdl_category');
	if ($this->mdl_category->_delete($id)) {
	    $this->session->set_flashdata('success', 'Deletion was successful');
	} else {
	    $this->session->set_flashdata('error', 'Data was not deleted.');
	}
    }
    
    private function _get_where($id, $col = 'cat_id' )
    {
	$this->load->model('mdl_category');
	$result = $this->mdl_category->get_where($id, $col);
	return $result;
    }

    function count_where($column, $value)
    {
	$this->load->model('mdl_category');
	$count = $this->mdl_category->count_where($column, $value);
	return $count;
    }
    
    function _get_where_custom($col, $value) {
	$this->load->model('mdl_category');
	$query = $this->mdl_category->get_where_custom($col, $value);
	return $query;
    }

    function get_max()
    {
	$this->load->model('mdl_category');
	$max_id = $this->mdl_category->get_max();
	return $max_id;
    }

    function _custom_query($mysql_query)
    {
	$this->load->model('mdl_category');
	$query = $this->mdl_category->_custom_query($mysql_query);
	return $query;
    }

    function get_dropdown_option($name, $selected, $extra, $where = NULL, $model = 'mdl_category')
    {
	$items = [];
	if ($where != NULL) {
	    $this->db->where($where);
	    $items = $this->$model->get()->result();
	} else {
	    $items = $this->$model->get()->result();
	}
	//$this->debug($items);
	if (count($items) > 0) {
	    $data[NULL] = '-choose category-';
	    foreach ( $items as $item )
	    {
		$data[$item->cat_id] = $item->catname;
	    }
	} else {
	    $data[] = 'No option has been added';
	}
	
	return form_dropdown($name, $data, $selected, $extra);
    }
    
    function test()
    {
	$this->get_dropdown_option( 'parent', NULL, NULL, ['parent_id'=>NULL]);
    }

    /*
     * PAGE SETTINGS
     * ========================================================================
     */
    function validate_form()
    {	
//	$this->load->library('form_validation');
	$this->form_validation->set_rules('category', 'Category', 'required');
    }

    function page_settings($view_file, $view_data, $data_name = 'result', $page_title = NULL, $module = 'category')
    {
	if ($data_name == NULL) {
	    $data = $view_data;
	} else {
	    $data[$data_name] = $view_data;
	}
	$data['view_file'] = $view_file;
	$data['page_title'] = $page_title;
	if ($module != NULL) {
	    $data['module'] = $module;
	}
	return $data;
    }

    function debug($array)
    {
	echo '<pre>' . print_r($array, 1) . '</pre>';
	die();
    }

}
