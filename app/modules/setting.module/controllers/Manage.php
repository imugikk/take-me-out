<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage extends Core_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Module_model');
		$this->load->model('master.icon/Icon_model');
	}
	public function index()
	{
        $language = get_language();
        $data = array();
		$data['content'] = 'manage';
		$data['module'] = $this->Module_model->list();
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
				UPPER(tbl.title_en) LIKE \'%'.$filter['filter'].'%\' OR
				UPPER(tbl.title_id) LIKE \'%'.$filter['filter'].'%\'
			)'] = null;
        }
		$this->Module_model->set_where($where);
        // order by
        $order = array();
        $order['fid_office_module'] = "ASC";
        $order['id_office_module'] = "ASC";
		$this->Module_model->set_order($order);
		// limit
		$this->Module_model->set_limit($limit);
		$this->Module_model->set_offset($limit * ($pg - 1));
		// paging
		$paging = array();
		$paging['limit'] 		= $limit;
		$paging['count_row'] 	= $this->Module_model->count_list() ;
		$paging['current'] 		= $pg;
		$paging['load_func_name'] = 'page_setting_module';
		$paging['list'] 		= $this->gen_paging($paging);
		$list = $this->Module_model->list();
		//
		$data = array();
		$data['paging'] = $paging;
		$data['content'] = 'list';
		$data['list'] 	= $list;
		$data['filter'] = $filter;
		$data['key'] = $filter;
		$this->load->view($data['content'],$data);
	}
    function input($id)
    {
		$data = array();
		$data['content'] = 'input';
		$data['module'] = $this->Module_model->get(decode($id)?:'');
		$where = array();
        $where['fid_office_module'] = 0;
        $this->Module_model->set_where($where);
        $list_module =  $this->Module_model->list();
		$icon =  $this->Icon_model->list();
		$data['list_module'] = $list_module;
        $data['icon'] = $icon;
		$this->load->view($data['content'],$data);
	}
	function save(){
		$data = array();

		$this->db->trans_start();

		if(!$this->input->post('title_en') OR !$this->input->post('title_id') OR !$this->input->post('order')){
			$this->error('Input');
		}

		$data['id_office_module'] = decode($this->input->post('id')) ? : 0;
		$data['title_en'] = $this->input->post('title_en');
		$data['title_id'] = $this->input->post('title_id');
		$data['url'] = $this->input->post('url');
		$data['fid_office_module'] = $this->input->post('parent_menu') ? : 0;
		$data['fid_icon'] = $this->input->post('icon_menu') ? : 0;
		$data['order_by'] = $this->input->post('order') ? : 0;

		$this->db->trans_complete();
		if($this->db->trans_status()==false){
			$this->error('Failed');
		}else{
			$save = true;
			$save = $this->Module_model->save($data);
			$this->success('Success');
		}
	}
	function delete()
	{
		$this->db->trans_start();
		$this->Module_model->delete(decode($this->input->post('id')));
		
		$this->db->trans_complete();
		
		if ($this->db->trans_status() == false) {
			$this->error('Failed');
		} else {
			$this->success('Success');
		}
	}
}