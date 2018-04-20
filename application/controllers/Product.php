<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
 function __construct() { 
         parent::__construct(); 
		$this->load->model('Product_Model');
        $this->load->helper('url'); 
		$this->load->helper('form');
         $this->load->database(); 
    } 

    public function index(){
		$this->Product_Model->chk_session('product_list_view');
    }
 
    public function add_product(){
		$this->Product_Model->chk_session('product_add_view');
    }

    public function save_product(){
    $data = array( 
            'prd_id' => $this->input->post('prd_id'), 
            'prd_barcode' => $this->input->post('prd_barcode'), 
            'prd_name' => $this->input->post('prd_name'),
            'prd_detail' => $this->input->post('prd_detail'),
            'prd_cat_id' => $this->input->post('prd_cat_id'),
            'prd_cost_price' => $this->input->post('prd_cost_price'),
            'prd_sale_price' => $this->input->post('prd_sale_price'),
            'prd_unit' => $this->input->post('prd_unit'),
            'prd_qt' => '0',
            'prd_status' => $this->input->post('prd_status'),
			'prd_created_date' => date('Y-m-d h:i:sa'),
			'prd_created_by' => $this->session->userdata('username')
         ); 
        if($this->Product_Model->haveRecord($this->input->post('prd_id'))==0){
	    	$this->Product_Model->insert($data); 
			$data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'index.php/product/index',
						'success_msg' => 'เพิ่มข้อมูลสินค้าเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);

		}else{
			$data = array(
						'title' => 'MySQL error page',
						'redirect_url' => base_url().'index.php/product/add_product',
						'error_msg' => 'รหัสสินค้านี้มีอยู่แล้ว ไม่สามารถเพิ่มซ้ำกันได้ <br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อให้เพิ่มข้อมูลอีกครั้ง'
				);
			$this->load->view('error_page_view',$data);
		}
    }

    public function edit_product(){
		$this->Product_Model->chk_session('product_edit_view');

    }
    
    public function save_edit_product(){
    $data = array( 
             'prd_barcode' => $this->input->post('prd_barcode'), 
            'prd_name' => $this->input->post('prd_name'),
            'prd_detail' => $this->input->post('prd_detail'),
            'prd_cat_id' => $this->input->post('prd_cat_id'),
            'prd_cost_price' => $this->input->post('prd_cost_price'),
            'prd_sale_price' => $this->input->post('prd_sale_price'),
            'prd_unit' => $this->input->post('prd_unit'),
            'prd_status' => $this->input->post('prd_status')
         ); 
         $id = $this->input->post('prd_id');
         $this->Product_Model->update($data,$id); 
		 $data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'index.php/product/index',
						'success_msg' => 'แก้ไขข้อมูลสินค้าเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);
    }

    public function delete_product(){
         $id = $this->uri->segment('3'); 
         $this->Product_Model->delete($id); 
			$data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'index.php/product/index',
						'success_msg' => 'ลบข้อมูลสินค้าเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);  
	}


    public function stock_product(){
		$this->load->model('Stock_Model');
		$this->Stock_Model->chk_session('stock_list_view');
    }


    public function save_stock_product(){
    $data = array( 
            'prd_id' => $this->input->post('prd_id'), 
            'prd_stock_add_qt' => $this->input->post('prd_stock_add_qt'), 
            'prd_stock_status' => '1',
			'prd_stock_add_date' => date('Y-m-d H:i:sa'),
			'prd_stock_add_by' => $this->session->userdata('username')
         ); 
		$this->load->model('Stock_Model');

    	$this->Stock_Model->insert($data); 
		$data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'product/stock_product/'.$this->input->post('prd_id'),
						'success_msg' => 'เพิ่มจำนวนสินค้าเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);

    }

    public function delete_stock_product(){
		$this->load->model('Stock_Model');

         $para1 = $this->uri->segment('3'); 
		 $para2 = $this->uri->segment('4'); 
         $this->Stock_Model->delete($para2); 
			$data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'index.php/product/stock_product/'.$para1,
						'success_msg' => 'ลบข้อมูลเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);  
	}


    public function update_stock_product(){
		$this->load->model('Stock_Model');

         $para1 = $this->uri->segment('3'); 
		 $para2 = $this->uri->segment('4'); 
         $this->Stock_Model->update_stock($para1,$para2); 
			$data = array(
						'title' => 'MySQL success page',
						'redirect_url' => base_url().'index.php/product/stock_product/'.$para1,
						'success_msg' => 'ปรับปรุงข้อมูลเรียบร้อย<br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อแสดงข้อมูลหมวดหมู่สินค้า'
				);
			$this->load->view('success_page_view',$data);  
	}


}
