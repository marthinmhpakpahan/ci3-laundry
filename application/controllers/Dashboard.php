<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->model("DashboardModel");
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$this->load->view('dashboard');
	}

}
