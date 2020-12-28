<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Engine extends Core_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('authentication/Authentication_model');
		// $this->load->model('hr.user/User_model');
		$this->load->model('Engine_model');
		$this->load->model('Module_model');
	}
	
	public function index()
	{
		$data = array();
		$where = array();
		$data['content'] = 'main';
		$user = $this->session->userdata('Auth');
		$arr = explode(' ', $user['name']);
		$singkatan = "";
		foreach ($arr as $kata) {
			$singkatan .= substr($kata, 0, 1);
		}
		$nama_singkat = substr($singkatan, -4);
		$data['nama'] = $user['name'];
		$data['nama_singkat'] = $nama_singkat;
		$data['email'] = $user['email'];
		$data['role'] = $user['role_id'];
		
		$this->load('desktop/core', $data['content'], $data);
	}

	function dashboard()
	{
		$data = array();
		$data['name'] = $this->session->userdata('Operator')('LoginName');
		$data['content'] = 'utilities/dashboard/main';
		$data['title'] = 'Dashboard';
		
		$this->load->view($data['content'], $data);
	}
	function list_module($id)
	{
		$where = array();
		$menu_list = array();
		$where['fid_user'] = decode($id);
		$auth = $this->Authentication_model->get($where);
		$data['auth'] = $auth;
		$menu_list = $this->Module_model->get_module_by_user($auth['id_auth']?:0);

		$i = 0;
		$arr=array();
		foreach($menu_list->result_array() as $menu)
		{
			$i++;
			$checked = '';
			$idMenu = $menu['id_office_menu'];
			if($this->session->userdata('Auth')['id_auth'] != 1) {
				if($idMenu == 102 || $idMenu == 103) {
					continue;
				}
			}
			if ($menu['id']&&$menu['st'])
			{
				$checked = 'checked';
			}
			if ($menu['MenuLevel']==1){
				$title = $menu['menu_title'];
				$children = "false";
			}else{
				$title = $menu['menu_title'];
				$children = "true";
			}
			$id = $idMenu;
			$temp=array(
				"id"=>$id,
				"text"=>$title,
				"children"=>$children
			);
			array_push($arr,$temp);
		}
		$datas = json_encode($arr);
		echo "{$datas}";
	}
}

