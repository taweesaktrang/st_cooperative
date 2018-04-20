<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person_model extends CI_Model{

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
						$data = array(
														'title' => '-:- ส่วนของการจัดการระบบ => '.SYSTEM_NAME_TH.' -:-','user_name'=>$this->Person_model->get_logon_user()
												);
						$data['query'] = $this->Person_model->get_person();
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

  public function user_authen($username,$userpass){
			$newuserpass=md5($userpass);
			$sql="select p_cardid from tbl_person where (p_loginname='".$username."') AND (p_password='".$newuserpass."') AND (p_status='1')";
			$query=$this->db->query($sql);
			$row = $query->row_array();
			if($query->num_rows()!=0){
				$sql1="select * from tbl_users where (p_cardid='".$row['p_cardid']."')";
				$query1=$this->db->query($sql1);
				$row1 = $query1->row_array();
				if($row1['user_system']=='1')
					$found=TRUE;
				else
					$found=FALSE;
			}else
				$found=FALSE;
			return $found;
  }

	public function insert_session(){
			$session_id=$this->session->userdata('session_id');
			$username=$this->session->userdata('username');
			$sql="INSERT INTO tbl_session_admin_log(session_id,username,loginDate,logStatus) VALUES('".$session_id."','".$username."',now(),'login')";

			$this->db->query($sql);
			return;
	}

	public function update_session($session_id,$status){
		$sql="UPDATE tbl_session_admin_log SET logoffDate=now(),logStatus='".$status."' WHERE (session_id='".$session_id."')";
		$this->db->query($sql);
		return;
	}

	public function get_person(){
		$query = $this->db->query('SELECT * FROM tbl_person order by p_cardid');
        return $query->result();
  }

	public function get_logon_user(){
		$username=$this->session->userdata('username');
		$query = $this->db->query('SELECT * FROM tbl_person where p_cardid="'.$username.'"');
		$row = $query->row_array();
        return $row['p_prefix'].$row['p_name'].' '.$row['p_surname'];
	}
}
