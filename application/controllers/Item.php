<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("ItemModel");
		$this->load->model("KategoriModel");
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$data = $this->ItemModel->index();
		$this->load->view('item/index', ["data" => $data]);
	}

	public function create() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$kategori = $this->KategoriModel->index();

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
				$this->load->view('item/tambah', ['kategori' => $kategori]);
			}
		} else {
			$this->load->view('item/tambah', ['kategori' => $kategori]);
		}
    }

}
