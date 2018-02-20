<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index(){
		$data = array(
										'title' => '-:- ตรวจสอบผู้ใช้งาน'.SYSTEM_NAME_TH.' -:-'
								);
		$this->load->view('login_view',$data);
	}

	public function admin(){
		if(!empty($this->session->userdata('session_id'))){
					$hour=0;
					$min =0;
					$logtime=date("U",mktime( date("H")+$hour, date("i")+$min ));
					$time = $this->session->userdata('sestime');
					if (($logtime-$time)>(SES_TIMEOUT*60)) {
							$this->load->model('Person_model');
							$this->person_model->update_session($this->session->userdata('session_id'),'timeout');
							redirect(base_url().'index.php/main/logoff');
					} else {
						$this->session->set_userdata('sestime' , $logtime);
						$data = array(
														'title' => '-:- ส่วนของการจัดการระบบ => '.SYSTEM_NAME_TH.' -:-'
												);
						$this->load->view('admin_view',$data);
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

	public function do_login(){
		$username=$this->input->post('username');
		$userpass=$this->input->post('userpass');
		$this->load->model('Person_model');

		if($this->Person_model->user_authen($username,$userpass)) {
			$hour=0;
			$min =0;
			$logtime=date("U",mktime( date("H")+$hour, date("i")+$min ));
			$session_id=uniqid(session_id());

			$this->session->set_userdata('username' , $username);
			$this->session->set_userdata('sestime' , $logtime);
			$this->session->set_userdata('session_id' , $session_id);
				echo "pass";
		}else{
			  echo "fail";
		}
	}

	public function process_login(){
			$this->load->model('Person_model');
			if(!empty($this->session->userdata('session_id'))){
					$this->Person_model->insert_session();
			}
			redirect(base_url().'index.php/main/admin');
	}
	public function do_logoff(){
		$this->load->model('Person_model');
		$this->Person_model->update_session($this->session->userdata('session_id'),'logoff');
		redirect(base_url().'index.php/main/logoff');
	}

	public function logoff(){
		$this->session->sess_destroy();
		redirect(base_url().'index.php/main/index');
	}
}
