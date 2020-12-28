<?php

class Module
{
	private $lang = '';
	private $id_user = '';
	private $baseUrl = '';

	function __construct()
	{
		$this->CI = &get_instance();
		$this->id_user = $this->CI->session->userdata('Auth')['id'];
		$this->lang = get_language();
		$this->baseUrl = base_url();
	}
	/*
	function build()
	{
		// load header menu		
		$where['fid_office_module'] = 0; // 0 = menu header
		// $where['AppType'] = 1; 
		$where['om.id_office_module IN 
				(SELECT fid_module
						FROM user_privilege ap
						WHERE ap.fid_user ='.$this->id_user.'
							AND ap.st = 1
		)'] = null;
		$this->CI->db->join('icon ikon', 'ikon.id_icon = om.fid_icon' , 'left');
		$this->CI->db->where($where);
		$this->CI->db->order_by('order_by', 'ASC');
		$menu = $this->CI->db->get('office_module om');
		$result = '';
		$language = get_language();
		// print_r($this->CI->db->last_query());exit;
		foreach ($menu->result_array() as $mn) {
			if($language == "en"){
				$title = $mn['title_en'];
			}else{
				$title = $mn['title_id'];
			}
			// load sub menu
			$result_sub = $this->build_sub($mn['id_office_module']);
			$submenu = '';
			if ($result_sub) {
				$submenu = 	' menu-item-submenu';
			}
			$result .='<li class="menu-item ' . $submenu . '" aria-haspopup="true" data-menu-toggle="hover">';
			$onclick = ($mn['url'] ? 'onclick="load_content(\'' . $mn['url'] . '\')"' : '');
			$result .= '
			<a href="javascript:;" '. $onclick .' data-toggle="tooltip" data-placement="right" title="' . $title . '" class="menu-link menu-toggle">
			<span class="svg-icon menu-icon"><i class="' . $mn['name'] . '"></i></span>
			<span class="menu-text">' . $title . '</span>
			';
			if ($result_sub) {
				$result .= 	'<i class="menu-arrow"></i>';
			}
			$result .= 	'</a>';
			$result .= $result_sub;
			$result .= '</li>';
			//
			// $groupMenu = $mn['group_module'];
		}
		echo $result;
	}

	private function build_sub($idMenu)
	{
		$result = '';
		$this->CI->db->where('om.fid_office_module = ' . $idMenu);
		$this->CI->db->where('om.id_office_module IN 
								(SELECT fid_module
									FROM user_privilege ap
									WHERE ap.st = 1
										AND ap.fid_user = ' . $this->id_user . ')');
		$this->CI->db->join('icon ikon', 'ikon.id_icon = om.fid_icon' , 'left');
		$this->CI->db->order_by('order_by', 'ASC');
		$menu_sub = $this->CI->db->get('office_module om');
		
		if ($menu_sub->num_rows() > 0) {
			$result .= '
			<div class="menu-submenu">
				<i class="menu-arrow"></i>
				<ul class="menu-subnav">
			';
			$language = get_language();
			foreach ($menu_sub->result_array() as $mn) {
				if($language == "en"){
					$title = $mn['title_en'];
				}else{
					$title = $mn['title_id'];
				}
				$result_sub = '';
				$onclick = ($mn['url'] ? 'load_content(\'' . $mn['url'] . '\')' : 'alert(\'Module ' . $title . ' belum aktif\')');
				$result .= '
					<li class="menu-item menu-item-parent" aria-haspopup="true">
						<span class="menu-link">
							<span class="menu-text">' . $title . '</span>
						</span>
					</li>
					<li class="menu-item" aria-haspopup="true">';
				$result .= '<a href="javascript:void(0);" data-toggle="tooltip" data-placement="right" onclick="' . $onclick . '" title="' . $title . '"  class="menu-link">';
				// $icon = $mn['IconImg'];
				// if (!$mn['IconImg']) $icon = 'fa-genderless'; // jika baris ini diaktikan, default icon akan diisi bulet
				if($mn['fid_icon'] != 0){
					$result .= '<span class="svg-icon menu-icon"><i class="' . $mn['name'] . '"></i></span>';
				}else{
					$result .= '<i class="menu-bullet menu-bullet-dot"><span></span></i>';
				}
				$result .= '<span class="menu-text">' . $title . '</span>';
				// load sub menu
				$result_sub = $this->build_sub($mn['id_office_module']);
				if ($result_sub) {
					$result .= '<i class="kt-menu__ver-arrow la la-angle-right"></i>';
				}
				$result .= $result_sub;
				$result .= '</a></li>';
			}
			$result .= '</ul></div>';
		}
		return $result;
	}
	*/
	function config($where = array())
	{
		$template = array();
		$this->CI->db->select('tbl.*');

		$this->CI->db->where($where);

		$this->CI->db->order_by('id_config', 'ASC');

		$query = $this->CI->db->get('config tbl');

		if ($query->num_rows() == 1) {
			$template = $query->row_array();
		} else {
			$fields = $this->CI->db->list_fields('config');

			foreach ($fields as $field) {

				$template[$field] = '';
			}
		}

		return $template['value'];
	}
}