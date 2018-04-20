<?php
class Student_model extends CI_Model {

  public function get_student(){
		$query = $this->db->query('SELECT * FROM tbl_students ORDER BY stu_id ASC');
    return $query->result();
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
					$data['query'] = $this->student_model->get_student();
						$this->load->view($page_view,$data);
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