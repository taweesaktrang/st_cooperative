<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->helper('url');
 	}

	public function index(){
		$this->load->model('student_model');
		$this->student_model->chk_session('student_list_view');

	}
}
