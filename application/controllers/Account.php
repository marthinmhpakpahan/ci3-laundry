<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("AccountModel");
        $this->load->library('form_validation');
	}

	public function index() {
		if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$data = $this->AccountModel->getKaryawan();
		$this->load->view('account/index', [
			"data" => $data,
		]);
	}

	public function enableAccount() {
		$account_id = $this->input->get("account_id");
		$this->AccountModel->enableAccount($account_id);
		redirect('karyawan');
	}

	public function disableAccount() {
		$account_id = $this->input->get("account_id");
		$this->AccountModel->disableAccount($account_id);
		redirect('karyawan');
	}

	public function login() {
		if(!empty($this->session->userdata('is_login')) && $this->session->userdata('is_login')) {
			redirect('dashboard');
		}

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() == TRUE) {
				if($this->AccountModel->validUser($this->input->post('username'), $this->input->post('password'))) {
					redirect('dashboard');
				} else {
					$this->load->view('account/login');
				}
			} else {
				$this->load->view('account/login');
			}
		} else {
			$this->load->view('account/login');
		}
	}

    public function logout() {
		$this->session->unset_userdata('login_username');
		$this->session->unset_userdata('login_id');
		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('login_role');
		redirect('login');
    }

    public function detail($id) {
		if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}
		$user = $this->AccountModel->detail($id);
		$this->load->view('account/view', [
			"data" => $user
		]);
    }

	public function update($id) {
		if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[account.username]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');

			$data = [];
			$data['full_name'] = $this->input->post('full_name');
			$data['username'] = $this->input->post('username');
			$data['email'] = $this->input->post('email');
			$data['phone'] = $this->input->post('phone');
			$data['address'] = $this->input->post('address');
			$data['image'] = $this->AccountModel->uploadProfileImage($id);
			$this->AccountModel->update($data, $id);
			redirect('karyawan/' . $id);
		} else {
			$user = $this->AccountModel->detail($id);
			$this->load->view('account/ubah', [
				"data" => $user
			]);
		}
    }

	public function updatePassword($id) {
		if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[password]');

			$this->load->library('encryption');
			$key = bin2hex($this->encryption->create_key(16));
			$options = [
				'cost' => 12,
				'salt' => $key,
			];
			$secure_code = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

			$data = [];
			$data['password'] = $secure_code;
			$this->AccountModel->updatePassword($data, $id);
			redirect('karyawan/' . $id);
		} else {
			$user = $this->AccountModel->detail($id);
			$this->load->view('account/ubahpassword', [
				"data" => $user
			]);
		}
	}

	public function delete($id) {
		$this->AccountModel->delete($id);
		redirect('karyawan');
	}

    public function register() {
		if(!empty($this->session->userdata('is_login')) && $this->session->userdata('is_login')) {
			redirect('dashboard');
		}

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[account.username]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');

			if($this->form_validation->run() == TRUE) {
				$this->load->library('encryption');
				$key = bin2hex($this->encryption->create_key(16));
				$options = [
					'cost' => 12,
					'salt' => $key,
				];
				$secure_code = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

				$data = [];
				$data['full_name'] = $this->input->post('full_name');
				$data['username'] = $this->input->post('username');
				$data['email'] = $this->input->post('email');
				$data['password'] = $secure_code;
				$data['phone'] = $this->input->post('phone');
				$data['address'] = $this->input->post('address');
				$data['status'] = 1;
				$data['role_id'] = 2;
				$this->AccountModel->save($data);
				redirect('karyawan');
			} else {
				$this->load->view('account/register');
			}
		} else {
			$this->load->view('account/register');
		}
    }

	public function tambah() {
		if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		if($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->form_validation->set_rules('full_name', 'Full Name', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[account.username]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('confirm-password', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_rules('phone', 'Phone Number', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');

			if($this->form_validation->run() == TRUE) {
				$this->load->library('encryption');
				$key = bin2hex($this->encryption->create_key(16));
				$options = [
					'cost' => 12,
					'salt' => $key,
				];
				$secure_code = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);

				$data = [];
				$data['full_name'] = $this->input->post('full_name');
				$data['username'] = $this->input->post('username');
				$data['email'] = $this->input->post('email');
				$data['password'] = $secure_code;
				$data['phone'] = $this->input->post('phone');
				$data['address'] = $this->input->post('address');
				$data['status'] = 1;
				$data['role_id'] = 2;
				$this->AccountModel->save($data);
				redirect('karyawan');
			} else {
				$this->load->view('account/tambah');
			}
		} else {
			$this->load->view('account/tambah');
		}
	}

}
