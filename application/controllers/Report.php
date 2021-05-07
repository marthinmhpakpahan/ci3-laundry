<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("LaporanModel");
	}

	public function orderReport() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$type = isset($_GET['type']) && $_GET['type'] != "" ? $_GET['type'] : "harian";
		$start_date = isset($_GET['start-date']) && $_GET['start-date'] != "" ? $_GET['start-date'] : "";
		$end_date = isset($_GET['end-date']) && $_GET['end-date'] != "" ? $_GET['end-date'] : "";

        $data = $this->LaporanModel->indexPesananReport($type, $start_date, $end_date);
		$this->load->view('laporan/pesanan', [
			"data" => $data,
			"type" => $type
		]);
	}

	public function employeeReport() {
        if(empty($this->session->userdata('is_login'))) {
			redirect('login');
		}

		$start_date = isset($_GET['start-date']) && $_GET['start-date'] != "" ? $_GET['start-date'] : "";
		$end_date = isset($_GET['end-date']) && $_GET['end-date'] != "" ? $_GET['end-date'] : "";

        $data = $this->LaporanModel->indexKaryawanReport($start_date, $end_date);
		$this->load->view('laporan/karyawan', [
			"data" => $data
		]);
	}

	public static function convertDateTime($type, $datetime) {
		$result = $datetime;
		$obj_date = date_create($datetime);
		$obj_day = [
			"Sun" => "Minggu", "Mon" => "Senin", "Tue" => "Selasa",
			"Wed" => "Rabu", "Thu" => "Kamis", "Fri" => "Jumat", "Sat" => "Sabtu"
		];
		$obj_month = [
			"01" => "Januari", "02" => "Februari", "03" => "Maret", "04" => "April",
			"05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus",
			"09" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"
		];

		if($type == "harian") {
			$arr_date = explode("-", date_format($obj_date, "D-d-m-Y"));
			$result = $obj_day[$arr_date[0]] . ", " . $arr_date[1] . " " . $obj_month[$arr_date[2]] . " " . $arr_date[3];
		} else if($type == "bulanan") {
			$arr_date = explode("-", $datetime);
			$result = $obj_month[$arr_date[1]] . " " . $arr_date[0];
		}

		return $result;
	}

}
