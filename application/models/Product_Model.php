<?php
class Product_Model extends CI_Model {
	function __construct() { 
         parent::__construct(); 
      } 

      public function selectOne($id){
         $query = $this->db->get_where("tbl_product",array("prd_id"=>$id));
         $data = $query->result(); 
         return $data;
      }

	 public function haveRecord($id){
         $query = $this->db->get_where("tbl_product",array("prd_id"=>$id));
		 $num=$query->num_rows();
		return $num;
      }
   
      public function insert($data) { 
         if ($this->db->insert("tbl_product", $data)) { 
            return true; 
         } 
      } 
   
      public function delete($id) { 
         if ($this->db->delete("tbl_product", "prd_id = '".$id."'")) { 
            return true; 
         } 
      } 
   
      public function update($data,$id) { 
         $this->db->set($data); 
         $this->db->where("prd_id", $id); 
         $this->db->update("tbl_product", $data); 
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
						if($page_view=='product_list_view'){
								$query = $this->db->get("tbl_product"); 
								$data['result'] = $query->result(); 
								$this->load->view($page_view,$data);			
						}elseif($page_view=='product_add_view'){
								$query = $this->db->get("tbl_product_cat"); 
								$data['result'] = $query->result(); 
								$this->load->view($page_view,$data);			
						}elseif($page_view=='product_edit_view'){
									 $id = $this->uri->segment('3'); 
									 $data['result'] = $this->Product_Model->selectOne($id);
									 $query = $this->db->get("tbl_product_cat"); 
									 $data['result1'] = $query->result(); 
									 $this->load->view($page_view,$data);			
						}elseif($page_view=='stock_list_view'){
								$query = $this->db->get("tbl_product"); 
								$data['result'] = $query->result(); 
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

