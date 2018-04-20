<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_cate extends CI_Controller {

 function __construct() { 
         parent::__construct(); 
		$this->load->model('Product_cate_Model');
        $this->load->helper('url'); 
		$this->load->helper('form');
         $this->load->database(); 
    } 

    public function index(){
		$this->Product_cate_Model->chk_session('product_cate_list_view');
    }
 
    public function add_product_cate(){
		$this->Product_cate_Model->chk_session('product_cate_add_view');
    }
    
    public function save_product_cate(){
    $data = array( 
            'prd_cat_id' => $this->input->post('prd_cat_id'), 
            'prd_cat_name' => $this->input->post('prd_cat_name') 
         ); 
        if($this->Product_cate_Model->haveRecord($this->input->post('prd_cat_id'))==0){
	    	$this->Product_cate_Model->insert($data); 
			$data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'index.php/product_cate/index',
						'success_msg' => 'เพิ่มข้อมูลหมวดหมู่สินค้าเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);

		}else{
			$data = array(
						'title' => 'MySQL error page',
						'redirect_url' => base_url().'index.php/product_cate/add_product_cate',
						'error_msg' => 'รหัสหมวดหมู่นี้มีอยู่แล้ว ไม่สามารถเพิ่มซ้ำกันได้ <br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อให้เพิ่มข้อมูลอีกครั้ง'
				);
			$this->load->view('error_page_view',$data);
		}
    }
    
    public function edit_product_cate(){
		$this->Product_cate_Model->chk_session('product_cate_edit_view');

    }
    
    public function save_edit_product_cate(){
    $data = array( 
            'prd_cat_name' => $this->input->post('prd_cat_name') 
         ); 
         $id = $this->input->post('prd_cat_id');
         $this->Product_cate_Model->update($data,$id); 
		 $data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'index.php/product_cate/index',
						'success_msg' => 'แก้ไขข้อมูลหมวดหมู่สินค้าเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);
    }
    
    public function delete_product_cate(){
         $id = $this->uri->segment('3'); 
         $this->Product_cate_Model->delete($id); 
			$data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'index.php/product_cate/index',
						'success_msg' => 'ลบข้อมูลหมวดหมู่สินค้าเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);  
	}
}
