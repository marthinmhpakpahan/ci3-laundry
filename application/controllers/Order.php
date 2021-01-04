<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("OrderModel");
		$this->load->model("ItemModel");
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

        $data = $this->OrderModel->index();
		$this->load->view('order/index', ["data" => $data]);
	}

    public function create() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$booking_code = $this->OrderModel->generateRandomString(6);
		$items = $this->ItemModel->index();

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');

			if($this->form_validation->run() == TRUE) {
				$data = [];
				$data['name'] = $this->input->post('name');
				$data['status'] = 1;
				$this->OrderModel->save($data);
				redirect('order');
			} else {
				$this->load->view('order/tambah', [
					'booking_code' => $booking_code,
					'items' => $items
				]);
			}
		} else {
			$this->load->view('order/tambah', [
				'booking_code' => $booking_code,
				'items' => $items
			]);
		}
    }

}
