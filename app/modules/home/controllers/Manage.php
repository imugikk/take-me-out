<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Manage extends Core_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('jadwal/Jadwal_model');
		$this->load->model('pesanan/Pesanan_model');
		$this->load->model('pesanan/Pesanan_detail_model');
		$this->load->model('bandara/Bandara_model');
		$this->load->model('maskapai/Maskapai_model');
		$this->load->model('maskapai/Maskapai_detail_model');
	}
	public function index()
	{
		$language = get_language();
		$data = array();
		$data['content'] = 'manage';
		$this->load->view($data['content'], $data);
	}
}
