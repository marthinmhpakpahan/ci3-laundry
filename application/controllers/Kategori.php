<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("KategoriModel");
		$this->load->model("DashboardModel");
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

        $data = $this->KategoriModel->index();
		$karyawan_total = $this->DashboardModel->getTotalKaryawan();
		$order_total = $this->DashboardModel->getTotalOrder();
		$income_total = $this->DashboardModel->getTotalIncome();
		$finished_total = $this->DashboardModel->getTotalFinishedOrder();
		$this->load->view('kategori/index', [
			"karyawan_total" => $karyawan_total,
			"order_total" => $order_total,
			"income_total" => $income_total,
			"finished_total" => $finished_total,
			"data" => $data
		]);
	}

    public function create() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$karyawan_total = $this->DashboardModel->getTotalKaryawan();
		$order_total = $this->DashboardModel->getTotalOrder();
		$income_total = $this->DashboardModel->getTotalIncome();
		$finished_total = $this->DashboardModel->getTotalFinishedOrder();

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() == TRUE) {
				$data = [];
				$data['name'] = $this->input->post('name');
				$data['description'] = $this->input->post('description');
				$data['status'] = 1;
				$this->KategoriModel->save($data);
				redirect('kategori');
			} else {
				$this->load->view('kategori/tambah', [
					"karyawan_total" => $karyawan_total,
					"order_total" => $order_total,
					"income_total" => $income_total,
					"finished_total" => $finished_total,
				]);
			}
		} else {
			$this->load->view('kategori/tambah', [
				"karyawan_total" => $karyawan_total,
				"order_total" => $order_total,
				"income_total" => $income_total,
				"finished_total" => $finished_total
			]);
		}
    }

}
