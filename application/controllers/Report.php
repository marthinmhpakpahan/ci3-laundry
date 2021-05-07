<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

        $data = [];
		$this->load->view('report/index', [
			"data" => $data
		]);
	}

}
