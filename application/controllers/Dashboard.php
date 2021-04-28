<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("DashboardModel");
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$karyawan_total = $this->DashboardModel->getTotalKaryawan();
		$order_total = $this->DashboardModel->getTotalOrder();
		$income_total = $this->DashboardModel->getTotalIncome();
		$finished_total = $this->DashboardModel->getTotalFinishedOrder();

		$this->load->view('dashboard', [
			"karyawan_total" => $karyawan_total,
			"order_total" => $order_total,
			"income_total" => $income_total,
			"finished_total" => $finished_total
		]);
	}

}
