<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage extends Core_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('pesanan/Pesanan_model');
		$this->load->model('jadwal/Jadwal_model');
	}
	public function index()
	{
        $language = get_language();
        $data = array();
		$data['content'] = 'manage';
		$data['pesanan'] = $this->Pesanan_model->list();
		$data['jadwal'] = $this->Jadwal_model->list();
        if($language == "id"){
            $data['title'] = 'Master Data | Provinsi';
            $data['header'] = 'Master Data';
            $data['sub_header'] = 'Daftar Pesanan';
            $data['label_filter'] = 'Cari';
            $data['tombol_show'] = 'Tampilkan Filter';
        }elseif($language == "en"){
            $data['title'] = 'Data Master | Schedule';
            $data['header'] = 'Data Master';
            $data['sub_header'] = 'List Order';
            $data['label_filter'] = 'Search';
            $data['tombol_show'] = 'Show Filter';
        }
		$this->load->view($data['content'],$data);
	}
    function page($pg=1)
	{
        $language = get_language();
		$limit = 10;
		// filter 
		$filter = array();
		$filter['filter'] = $this->input->post('f_search');
		// condition 
		$where = array();
		if ($filter['filter']){
			$where['(
				UPPER(tbl."name") ~* \''.$filter['filter'].'\'
			)'] = null;
        }
		$this->Pesanan_model->set_where($where);
        // order by
        $order = array();
        $order['id_pesanan'] = "ASC";
		$this->Pesanan_model->set_order($order);
		// limit
		$this->Pesanan_model->set_limit($limit);
		$this->Pesanan_model->set_offset($limit * ($pg - 1));
		// paging
		$paging = array();
		//
		$paging = array();
		$paging['limit'] 		= $limit;
		$paging['count_row'] 	= $this->Pesanan_model->count_list();
		$paging['current'] 		= $pg;
		$paging['load_func_name'] = 'page_Pesanan';
		$paging['list'] 		= $this->gen_paging($paging);
		$list = $this->Pesanan_model->list();
		//
		$data = array();
		$data['paging'] = $paging;
		$data['content'] = 'list';
		$data['list'] 	= $list;
		$data['filter'] = $filter;
		$data['key'] = $filter;
		if($language == "id"){
            $data['title'] = 'Master Data | Pesanan';
            $data['header'] = 'Master Data';
            $data['sub_header'] = 'Daftar Pesanan';
            $data['label_filter'] = 'Cari';
            $data['tombol_aksi'] = 'Aksi';
            //$data['tombol_tambah'] = 'Tambah Data Baru';
            $data['tombol_edit'] = 'Perbarui Data';
            $data['tombol_hapus'] = 'Hapus Data';
            $data['label_satu'] = 'Nomor Pesanan';
        }elseif($language == "en"){
            $data['title'] = 'Data Master | Schedule';
            $data['header'] = 'Data Master';
            $data['sub_header'] = 'Schedule';
            $data['label_filter'] = 'Search';
            $data['tombol_aksi'] = 'Action';
            //$data['tombol_tambah'] = 'Add New Data';
            $data['tombol_edit'] = 'Update Data';
            $data['tombol_hapus'] = 'Delete Data';
            $data['label_satu'] = 'Order Number';
        }
        // $data['label_st'] = 'Status';
		$this->load->view($data['content'],$data);
	}
    function input($id)
    {
		$language = get_language();

		$data = array();
		$data['content'] = 'input';
		$data['pesanan'] = $this->Pesanan_model->get(decode($id)?:'');
		if($language == "id"){
            $data['title'] = 'Master Data | Pesanan';
            $data['header'] = 'Master Data';
            $data['sub_header'] = 'Pesanan';
            $data['tombol_kembali'] = 'Kembali';
            $data['tombol_batal'] = 'Batal';
            $data['tombol_simpan'] = 'Simpan';
        }elseif($language == "en"){
            $data['title'] = 'Data Master | Schedule';
            $data['header'] = 'Data Master';
            $data['sub_header'] = 'Schedule';
			$data['tombol_kembali'] = 'Back';
			$data['tombol_batal'] = 'Cancel';
            $data['tombol_simpan'] = 'Save';
        }
		$this->load->view($data['content'],$data);
	}
	function save(){
		$data = array();
		$this->db->trans_start();
		$data['id_pesanan'] = decode($this->input->post('id')) ? : 0;
		$data['name'] = $this->input->post('name');
		$save = true;
		$save = $this->Pesanan_model->save($data);
		$this->db->trans_complete();
		if($this->db->trans_status()==false){
			$this->error('Error');
		}else{
			$this->success('Save');
		}
	}
	function delete()
	{
		$this->db->trans_start();
		$this->Pesanan_model->delete(decode($this->input->post('id')));
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() == false) {
			$this->error('Proses gagal dijalankan.');
		} else {
			$this->success('Data telah dihapus');
		}
	}
}