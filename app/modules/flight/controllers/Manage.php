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
		$data['kota_asal'] = $this->Bandara_model->list();
		$data['kota_tujuan'] = $this->Bandara_model->list();
		$this->load->view($data['content'], $data);
	}
	function page($pg = 1)
	{
		$data = array();
		$limit = 10;
		// filter 
		$filter = array();
		$filter['tanggal'] = getSQLDate($this->input->post('tanggal'));
		$filter['kota_asal'] = $this->input->post('kota_asal');
		$filter['kota_tujuan'] = $this->input->post('kota_tujuan');
		if ($filter['kota_asal'] == $filter['kota_tujuan']) {
			$data['error'] = "Kota asal dan Kota tujuan tidak boleh sama";
		}
		// condition 
		$where = array();
		if (!$this->input->post('tanggal')) {
			$where['(
				tanggal >= \'' . date("Y-m-d") . '\'
			)'] = null;
		} else {
			$where['(
				tbl.tanggal = \'' . $filter['tanggal'] . '\'
			)'] = null;
		}
		if ($filter['kota_asal'] and $filter['kota_tujuan']) {
			$where['(
				tbl.kota_asal = \'' . $filter['kota_asal'] . '\' AND
				tbl.kota_tujuan = \'' . $filter['kota_tujuan'] . '\'
			)'] = null;
			$this->Jadwal_model->set_where($where);
			// order by
			$order = array();
			$order['id_jadwal'] = "ASC";
			$this->Jadwal_model->set_order($order);
			// limit
			$this->Jadwal_model->set_limit($limit);
			$this->Jadwal_model->set_offset($limit * ($pg - 1));
			// paging
			$paging = array();
			$paging['limit'] 		= $limit;
			$paging['count_row'] 	= $this->Jadwal_model->count_list();
			$paging['current'] 		= $pg;
			$paging['load_func_name'] = 'page_flight';
			$paging['list'] 		= $this->gen_paging($paging);
			$list = $this->Jadwal_model->list();
			$data['paging'] = $paging;
			$data['list'] 	= $list;
			$data['filter'] = $filter;
			$data['key'] = $filter;
			$data['content'] = 'list';
			$this->load->view($data['content'], $data);
		}
	}
	function pesan($id)
	{
		$data = array();
		$data['content'] = 'pesan';
		$data['jadwal'] = $this->Jadwal_model->get($id ?: '');
		$data_order = array();
		$data_order['id_pesanan'] = 0;
		$data_order['type'] = 'Pesawat';
		$data_order['nomor_pesanan'] = $this->Pesanan_model->getNewCode("ORDER");
		$data_order['fid_jadwal'] = $id;
		$data_order['total'] = 0;
		$data_order['st'] = 0;
		$data_order['created_at'] = date("Y-m-d H:i:s");
		$get_id_order = $this->Pesanan_model->saveGetLastID($data_order);
		$get = $this->Pesanan_model->get($get_id_order);
		$data['pesanan'] = $get;
		$data['total'] = $this->Pesanan_model->updateSummary($id);
		$this->load->view($data['content'], $data);
	}
	function detail_list()
	{
		$id = $this->input->post('id');
		$pesanan =  $this->Pesanan_model->get($id);

		$where['fid_pesanan'] = $id;
		$this->Pesanan_detail_model->set_where($where);
		$order_by['id_pesanan_detail'] = 'ASC';
		$this->Pesanan_detail_model->set_order($order_by);
		$pesanan_detail = $this->Pesanan_detail_model->list();
		$data = array();
		$data['content'] = 'list_detail';
		$data['pesanan'] = $pesanan;
		$data['pesanan_detail'] = $pesanan_detail;
		$this->load->view($data['content'], $data);
	}
	function tambah_penumpang()
	{
		$data = array();

		$this->db->trans_start();

		$id_jadwal = $this->input->post('id_jadwal');
		$id_pesanan = $this->input->post('id_pesanan');
		$id_pesanan_detail = $this->input->post('id_pesanan_detail');
		$list_jadwal =  $this->Jadwal_model->get($id_jadwal);
		$count_penumpang =  $this->Jadwal_model->count_penumpang($id_jadwal);
		$jumlah_max = $list_jadwal['jumlah_max'];
		$wdetail = array();
		$wdetail['fid_pesanan'] = $id_pesanan ?: NULL;
		$detail =  $this->Pesanan_detail_model->get($wdetail);

		if (!$this->input->post('no_ktp') or !$this->input->post('name')) {
			$this->error('Input');
		}
		if ($id_pesanan_detail) {
			$stoknya = $jumlah_max - $count_penumpang['total'];
			if ($count_penumpang['total'] >= $jumlah_max) {
				$this->error('jadwal Tanggal ' . tanggal($list_jadwal['tanggal']) . ' tersisa ' . $stoknya);
			} else {
				$data['id_pesanan_detail'] = $id_pesanan_detail;
			}
		} else {
			$stoknya = $jumlah_max - $count_penumpang['total'];
			if ($count_penumpang['total'] >= $jumlah_max) {
				$this->error('jadwal Tanggal ' . tanggal($list_jadwal['tanggal']) . ' tersisa ' . $stoknya);
			} else {
				$data['id_pesanan_detail'] = 0;
			}
		}
		$data['fid_pesanan'] = $id_pesanan;
		$data['no_ktp_pemesan'] = $this->input->post('no_ktp');
		$data['nama_pemesan'] = $this->input->post('name');

		$this->db->trans_complete();
		if ($this->db->trans_status() == false) {
			$this->error('Failed');
		} else {
			$save = true;
			$save = $this->Pesanan_detail_model->save($data);
			$this->success('Success');
		}
	}
	function delete_detail()
	{
		$this->db->trans_start();
		$this->Pesanan_detail_model->delete($this->input->post('id_detail'));

		$this->db->trans_complete();

		if ($this->db->trans_status() == false) {
			$this->error('Failed');
		} else {
			$this->success('Success');
		}
	}
	function posting()
	{
		$this->db->trans_start();
		$data = array();
		$data_jurnal = array();
		$where = array();
		$id = $this->input->post('id');
		$where['fid_pesanan'] = $id;
		$this->Pesanan_detail_model->set_where($where);
		$transactiondetail = $this->Pesanan_detail_model->get($where);
		$transaction_detail = $this->Pesanan_detail_model->list();
		if ($transactiondetail['fid_pesanan']) {
			$transaction = $this->Pesanan_model->get($id);
			if (!$transactiondetail['id_pesanan_detail'])
				$this->error('Tidak ada data');
			if ($transaction['st'] == 1)
				$this->error('Data sudah Diposting');

			if ($this->db->trans_status()) {
				$data['id_pesanan'] = $id;
				$data['st'] = 0;
				$this->Pesanan_model->save($data);
				$this->success('Posting berhasil');
			} else {
				$this->error('Posting GAGAL.');
			}
		} else {
			$this->error('Belum ada penumpang');
		}
		$this->db->trans_complete();
	}
}
