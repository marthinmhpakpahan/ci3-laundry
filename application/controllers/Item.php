<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("ItemModel");
		$this->load->model("KategoriModel");
		$this->load->model("DashboardModel");
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$data = $this->ItemModel->index();
		$karyawan_total = $this->DashboardModel->getTotalKaryawan();
		$order_total = $this->DashboardModel->getTotalOrder();
		$income_total = $this->DashboardModel->getTotalIncome();
		$finished_total = $this->DashboardModel->getTotalFinishedOrder();
		$this->load->view('item/index', [
			"data" => $data,
			"karyawan_total" => $karyawan_total,
			"order_total" => $order_total,
			"income_total" => $income_total,
			"finished_total" => $finished_total
		]);
	}

	public function create() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$kategori = $this->KategoriModel->index();
		$karyawan_total = $this->DashboardModel->getTotalKaryawan();
		$order_total = $this->DashboardModel->getTotalOrder();
		$income_total = $this->DashboardModel->getTotalIncome();
		$finished_total = $this->DashboardModel->getTotalFinishedOrder();

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('category_id', 'Kategori', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');

			if($this->form_validation->run() == TRUE) {
				$data = [];
				$data['category_id'] = $this->input->post('category_id');
				$data['price'] = $this->input->post('price');
				$data['description'] = $this->input->post('description');
				$data['status'] = 1;
				$this->ItemModel->save($data);
				redirect('item');
			} else {
				$this->load->view('item/tambah', [
					'kategori' => $kategori,
					"karyawan_total" => $karyawan_total,
					"order_total" => $order_total,
					"income_total" => $income_total,
					"finished_total" => $finished_total
				]);
			}
		} else {
			$this->load->view('item/tambah', [
				'kategori' => $kategori,
				"karyawan_total" => $karyawan_total,
				"order_total" => $order_total,
				"income_total" => $income_total,
				"finished_total" => $finished_total
			]);
		}
    }

}
