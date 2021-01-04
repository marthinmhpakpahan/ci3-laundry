<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("KategoriModel");
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

        $data = $this->KategoriModel->index();
		$this->load->view('kategori/index', ["data" => $data]);
	}

    public function create() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

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
				$this->load->view('kategori/tambah');
			}
		} else {
			$this->load->view('kategori/tambah');
		}
    }

}
