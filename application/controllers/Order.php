<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("OrderModel");
		$this->load->model("ItemModel");
		$this->load->model("OrderStatusListModel");
		$this->load->model("OrderStatusModel");
	}

	public function index() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

        $data = $this->OrderModel->index();
		$order_status = $this->OrderStatusListModel->index();
		$this->load->view('order/index', ["data" => $data, "order_status" => $order_status]);
	}

	public function updatestatus() {
		$data = [];
		$data['order_id'] = $this->input->post('order_id');
		$data['status_id'] = $this->input->post('status_id');
		$data['user_id'] = $this->input->post('user_id');
		$this->OrderStatusModel->save($data);
		redirect('order');
	}

	public function getorderstatus() {
		$order_id = $this->input->get('order_id');
		$data = $this->OrderStatusModel->get($order_id);
		header('Content-Type: application/json');
		echo json_encode($data); exit;
	}

	public function tracking() {
		$booking_code = $this->input->get("booking_code");
		$order_status = [];
		$order_status = $this->OrderStatusModel->getByBookingCode($booking_code);
		$this->load->view('order/tracking', [
			'booking_code' => $booking_code,
			'order_status' => $order_status
		]);
	}

    public function create() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$booking_code = $this->OrderModel->generateRandomString(6);
		$items = $this->ItemModel->index();

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('owner_name', 'Nama Pelanggan', 'required');
			$this->form_validation->set_rules('owner_email', 'Email Pelanggan', 'required|valid_email');
			$this->form_validation->set_rules('owner_phone', 'No Telp Pelanggan', 'required');
			$this->form_validation->set_rules('item_id', 'Item Pesanan', 'required');
			$this->form_validation->set_rules('weight', 'Total Berat', 'required');

			if($this->form_validation->run() == TRUE) {
				$data = [];
				$data['booking_code'] = $this->input->post('booking_code');
				$data['owner_name'] = $this->input->post('owner_name');
				$data['owner_email'] = $this->input->post('owner_email');
				$data['owner_phone'] = $this->input->post('owner_phone');
				$data['item_id'] = $this->input->post('item_id');
				$data['weight'] = $this->input->post('weight');
				$data['total_price'] = $this->input->post('total_price');
				$data['user_id'] = $this->input->post('user_id');
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
