<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->helper('url');
 	}

	public function index(){
		$this->load->model('Person_model');
     	$this->Person_model->chk_session('person_list_view');
	}

	public function add(){
		$this->load->view('person_add_view');
	}


	public function add_process(){
		$this->load->model('Person_model');
		$this->person_model->add_person();

		$data['query'] = $this->person_model->get_person();
		$this->load->view('person_list_view',$data);

	}
}
