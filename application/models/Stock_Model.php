<?php
class Stock_Model extends CI_Model {
	function __construct() { 
         parent::__construct(); 
      } 

      public function selectOne($id){
         $query = $this->db->get_where("tbl_product_stock",array("prd_stock_id"=>$id));
         $data = $query->result(); 
         return $data;
      }

      public function selectStock($id){
         $query = $this->db->get_where("tbl_product_stock",array("prd_id"=>$id));
         $data = $query->result(); 
         return $data;
      }
   
      public function insert($data) { 
         if ($this->db->insert("tbl_product_stock", $data)) { 
            return true; 
         } 
      } 
   
      public function delete($id) { 
         if ($this->db->delete("tbl_product_stock", "prd_stock_id = '".$id."'")) { 
            return true; 
         } 
      } 
   
      public function update_stock($p_id,$s_id) { 
		$stck = $this->Stock_Model->selectOne($s_id);
		$prd = $this->Product_Model->selectOne($p_id);
		$qt_new = $prd[0]->prd_qt + $stck[0]->prd_stock_add_qt;
		$data = array( 
            'prd_qt' => $qt_new 
         ); 
	     $this->db->set($data); 
         $this->db->where("prd_id", $p_id); 
         $this->db->update("tbl_product", $data); 

		$data1 = array( 
            'prd_stock_status' => '0' 
         ); 
	     $this->db->set($data1); 
         $this->db->where("prd_stock_id", $s_id); 
         $this->db->update("tbl_product_stock", $data1); 
      } 

public function chk_session($page_view){
		if(!empty($this->session->userdata('session_id'))){
					$hour=0;
					$min =0;
					$logtime=date("U",mktime( date("H")+$hour, date("i")+$min ));
					$time = $this->session->userdata('sestime');
					if (($logtime-$time)>(SES_TIMEOUT*60)) {
								$this->update_session($this->session->userdata('session_id'),'timeout');
								redirect(base_url().'index.php/main/logoff');
					} else {
						$this->session->set_userdata('sestime' , $logtime);
								$this->load->model('Person_model');
						$data = array(
														'title' => '-:- ส่วนของการจัดการระบบ => '.SYSTEM_NAME_TH.' -:-','user_name'=>$this->Person_model->get_logon_user()
												);
						if($page_view=='stock_list_view'){
									 $id = $this->uri->segment('3'); 
									 $data['stck'] = $this->Stock_Model->selectStock($id);
									 $data['prd'] = $this->Product_Model->selectOne($id);
									 $this->load->view($page_view,$data);			
						}
					}

		}else {
				$data = array(
						'title' => 'Session Error Page',
						'redirect_url' => base_url().'index.php/main/index',
						'error_msg' => 'Session หมดเวลาหรือการเข้าสู่ระบบไม่ถูกต้อง <br>กรุณารอสักครู่...ระบบจะ Redirect เพื่อให้เข้าสู่ระบบอีกครั้ง'
				);
				$this->load->view('error_page_view',$data);
		}
	}

		public function update_session($session_id,$status){
		$sql="UPDATE tbl_session_admin_log SET logoffDate=now(),logStatus='".$status."' WHERE (session_id='".$session_id."')";
		$this->db->query($sql);
		return;
	}


}
?>

