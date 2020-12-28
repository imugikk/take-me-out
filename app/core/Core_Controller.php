<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Core_Controller extends CI_Controller 
{
	var $template_data = array();
	var $update = array();
	var $blocked_object = array();
	var $title = 'CORE';
	var $secure = true;
	public function __construct()
	{
		parent::__construct();
		if($this->secure==false){
			
		}else
		{
			if (!$this->is_logged_in())
			{
				redirect(get_language().'/authentication');
			}
		}
		
		
	}
	// function ini untuk mengConvert inputan tanggal dari jQuery ke format database
	function convert_date($value)
	{
		$value = trim($value);
		$year = substr($value, 6,4);
		$month = substr($value, 3,2);
		$day = substr($value, 0,2);
		$value = $year.$month.$day;
		if (!$value)
			$value = null;
		return $value;
	}
	// function ini berfungsi untuk memvalidasi data secara operator
	function validation_input($objName,$min=0,$max=0)
	{
		$value = $this->input->post($objName);
		$isBlocked = false;
		$msg = '';
		// value-nya empty / kosong
		if (!$value)
		{
			$isBlocked = true;
			$msg = 'Please enter';
		}else
		{
			// jumlah digit dibawah minimum
			if ($min)
			{
				if (strlen($value) < $min)
				{
					$isBlocked = true;
					$msg = 'Minimum lenght is '.$min;
				}	
			}
			// jumlah digit dibawah maximum
			if ($max)
			{
				if (strlen($value) > $max)
					$isBlocked = true;
			}
		}
		// here we goes
		if ($isBlocked)
		{
			$obj_blocked['obj_name'] = $objName;
			$obj_blocked['obj_msg'] = $msg;
			$this->blocked_object[] = $obj_blocked;
		}

		return $value;
	}
	function set($name, $value)
	{
		$this->template_data[$name] = $value;
	}

	function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
	{               
		if (!isset($view_data['title']))
			$view_data['title'] = $this->title;
			
		$this->CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
		return $this->CI->load->view($template, $this->template_data, $return);
	}
		
	public function is_logged_in()
	{
		return is_logged_in();
	}
	
	function success($msg='',$uri='')
	{
		$this->update['error']='';
		$this->update['message']=$msg;
		echo json_encode($this->update);
	}
	function error($err)
	{
		$this->update['blocked_object']=$this->blocked_object;
		$this->update['error']=$err;
		$this->update['message']='';
		echo json_encode($this->update);
		exit;
	}
	
	function success_redirect($msg='',$uri='')
	{
		redirect(get_language().'/'.$uri);
	}
	function gen_paging($page_data=array(), $tp=0)
	{
		// $display = lang('display_page',array((($limit*($page_data['current']-1))+1),$last_row,$page_data['count_row']));
		$language = get_language();
		if($language == "id"){
			$teks = "Menampilkan";
			$teks_1 = "hingga";
			$teks_2 = "dari";
			$teks_3 = "data";
		}elseif($language == "en"){
			$teks = "Displaying";
			$teks_1 = "to";
			$teks_2 = "of";
			$teks_3 = "records";
		}
		$func_name = "page_load";
		if (isset($page_data['load_func_name']))
		{
			if ($page_data['load_func_name'])
				$func_name = $page_data['load_func_name'];
		}
		$limit = $page_data['limit'];
		$limit = $limit?$limit:1;
		$count = ceil($page_data['count_row'] / $limit) ;
		$last_row = $limit*$page_data['current'];
		if ($last_row > $page_data['count_row'])
			$last_row = $page_data['count_row'];
			$page_result = '<div class="d-flex justify-content-between align-items-center flex-wrap">';
				$page_result .= '<div class="d-flex flex-wrap py-2 mr-3">';
					$page_result .= '<a href="javascript:void(0);" onclick="'.$func_name.'(1)" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 '.($page_data['current']==1?'active':'').'">
						<i class="ki ki-bold-double-arrow-back icon-xs"></i>
					</a>';
					$page_result .= '<a href="javascript:void(0);" '.($page_data['current']==1?'':' onclick="'.$func_name.'('.($page_data['current']-1).')"').' class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 '.($page_data['current']==1?'active':'').'"><i class="ki ki-bold-arrow-back icon-xs"></i></a>';
					$paging_show = 2;
					$page_start = $page_data['current'] - $paging_show;
					$page_start = $page_start<1?1:$page_start;
					//$page_end	= $count;
					$page_end = $page_data['current'] + $paging_show;
					$page_end = $count > $page_end ? $page_end : $count;
					$page_end = $count > 1 ? $page_end : 1;
					//
					if ($page_start > 1)
					{
						$page_result .= '<a href="javascript:void(0);" onclick="'.$func_name.'('.($page_data['current']-3).');" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>';
					}
					// before current
					for($i=$page_start; $i<=$page_end; $i++)
					{
						$page_result .= '<a href="javascript:void(0);" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1  '.($page_data['current']==$i?'active':'').'" '.($page_data['current']==$i?'':'onclick="'.$func_name.'('.$i.')"').'>'.$i.'</a>';
					}
					// after current
					if ($page_end < $count)
					{
						$page_result .= '<a href="javascript:void(0);" onclick="'.$func_name.'('.($page_data['current']+3).');" class="btn btn-icon btn-sm border-0 btn-hover-primary mr-2 my-1">...</a>';
					}
					$page_result .= '
					<a href="javascript:void(0);" onclick="'.$func_name.'('.($page_data['current']+1).')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 '.($page_data['current']==$page_end?'active':'').'"><i class="ki ki-bold-arrow-next icon-xs"></i></a>';
					
					$page_result .= '<a href="javascript:void(0);" onclick="'.$func_name.'('.$count.')" class="btn btn-icon btn-sm btn-light-primary mr-2 my-1 '.($page_data['current']==$page_end?'active':'').'">
						<i class="ki ki-bold-double-arrow-next icon-xs"></i>
					</a>';
				$page_result .= '</div>';
				$page_result .= '<div class="d-flex align-items-center py-3">';
					$page_result .= '<span class="text-muted"> '.$teks.' '.(($limit*($page_data['current']-1))+1).' '.$teks_1.' '.$last_row.' '.$teks_2.' '.$page_data['count_row'].' '.$teks_3.'</span>';
				$page_result .= '</div>';
			$page_result .= '</div>';
			return $page_result;
	}
	function gen_pagingsss($page_data=array(), $hide='')
	{
		$language = get_language();
		if($language == "id"){
			$teks = "Menampilkan";
			$teks_1 = "hingga";
			$teks_2 = "dari";
			$teks_3 = "catatan";
		}elseif($language == "en"){
			$teks = "Displaying";
			$teks_1 = "to";
			$teks_2 = "of";
			$teks_3 = "records";
		}
		$func_name = "page_load";
		if (isset($page_data['load_func_name']))
		{
			if ($page_data['load_func_name'])
				$func_name = $page_data['load_func_name'];
		}
		$limit = $page_data['limit'];
		$limit = $limit?$limit:1;
		$count = ceil($page_data['count_row'] / $limit) ;
		$last_row = $limit*$page_data['current'];
		if ($last_row > $page_data['count_row'])
			$last_row = $page_data['count_row'];
			$page_result = '<div class="kt-section">';
				$page_result .= '<div class="kt-pagination kt-pagination--brand kt-pagination--circle">';
					$page_result .= '<ul class="kt-pagination__links">';
						$page_result .= '<li class="kt-pagination__link--first '.($page_data['current']==1?'active':'').'" ><a href="javascript:void(0);" '.($page_data['current']==1?'':'onclick="'.$func_name.'(1)"').'><i class="fa fa-angle-double-left kt-font-brand"></i></a></li>';
						// if(!$hide) {
						// 	$page_result .= '<div class="col-sm-2" style="left:10%;right:0;width:12%"><input type="number" min="0" max="'.$last_row.'" class="form-control" placeholder="Page..." value="" onkeydown="if (event.keyCode == 13) '.$func_name.'(this.value)"></div>';
						// }
						$paging_show = 2;
						$page_start = $page_data['current'] - $paging_show;
						$page_start = $page_start<1?1:$page_start;
						//$page_end	= $count;
						$page_end = $page_data['current'] + $paging_show;
						$page_end = $count > $page_end ? $page_end : $count;
						$page_end = $count > 1 ? $page_end : 1;
						//
						if ($page_start > 1)
						{
							$page_result .= '<li><a href="javascript:void(0);">...</a></li>';
							// $page_result .= '<li class="kt-pagination__link--next"><a href="javascript:void(0)" onclick="'.$limit*($page_data['current']-1).'."><i class="fa fa-angle-left kt-font-brand"></i></a></li>';
						}
						// before current
						for($i=$page_start; $i<=$page_end; $i++)
						{
							// $page_result .= '<li '.($page_data['current']==$i?'class="kt-pagination__link--active"':'').'>'.'<a href="javascript:void(0)" '.($page_data['current']==$i?'':'onclick="'.$func_name.'('.$i.')"').'>'.$i.'</a></li>';
							$page_result .= '<li '.($page_data['current']==$i?'class="kt-pagination__link--active"':'').'>'.'<a href="javascript:void(0)" '.($page_data['current']==$i?'':'onclick="'.$func_name.'('.$i.')"').'>'.$i.'</a></li>';
						}
						// after current
						if ($page_end < $count)
						{
							$page_result .= '<li><a href="javascript:void(0);">...</a></li>';
						}
						$page_result .= '<li class="kt-pagination__link--last '.($page_data['current']==$page_end?'active':'').'"><a href="javascript:void(0);" onclick="'.$func_name.'('.$count.')"><i class="fa fa-angle-double-right kt-font-brand"></i></a></li>';
					$page_result .= '</ul>';
					$page_result .= '<div class="kt-pagination__toolbar">';
						$page_result .= '<span class="pagination__desc"> '.$teks.' '.(($limit*($page_data['current']-1))+1).' '.$teks_1.' '.$last_row.' '.$teks_2.' '.$page_data['count_row'].' '.$teks_3.'</span>';
					$page_result .= '</div>';
				$page_result .= '</div>';
			$page_result .= '</div>';
			return $page_result;
	}
	
	function reject()
	{
		$this->load->view('rejected');
	}
	
	/*
	 * untuk mencari no transaksi yang baru	
	 */
	function _get_tr_no($pref=null,$model=null,$date=true)
	{
		if (!$pref)
			$pref = '';
		else
			$pref .= '.';			
		
		if ($date)
			$pref .= date('ym').'.';
			
		$pref_ln = strlen($pref);
		
		$tr_no = '';
		$no_last = $model->get_last_no($pref);
		$no_next = 1;
		if ($no_last)
		{
			$no_next = substr($no_last,$pref_ln,5)+1;
		}

		$tr_no = $pref.sprintf('%05s', $no_next);
		return $tr_no;
	}
	
		function getMonthList()
	{
		$month_list=array(
					1=>'Januari'
					,2=>'Februari'
					,3=>'Maret'
					,4=>'April'
					,5=>'Mei'
					,6=>'Juni'
					,7=>'Juli'
					,8=>'Agustus'
					,9=>'September'
					,10=>'Oktober'
					,11=>'November'
					,12=>'Desember'
					);
		return $month_list;
	}
	function getYearList($start=0,$end=0)
	{
		$year_list = array();
		for($x = $start; $x < $end; $x++) {
			$year_list[] = $x;
		}
		return $year_list;
	}
	
	function gen_xml($data,$model)
	{
		$data_start="<![CDATA["; 
		$data_end="]]>";
		$cr=chr(13).chr(10);
		$xmldump="";
		$xmldump.='<?xml version = "1.0" encoding="Windows-1252" standalone="yes"?>';
		$xmldump.=$cr."<VFPData>";
		$xmldump.=$model->gen_xml_structure();
		foreach($data->result_array() as $row)
		{
			$xmldump = $xmldump."<crsoheader>";
			foreach($row as $field=>$value)
			{
				$xmldump = $xmldump."<".$field.">".str_replace('&','_amp',$value)."</".$field.">".chr(13);
			}
			$xmldump = $xmldump.$cr."</crsoheader>".chr(13);
				
		}
		
		$xmldump = $xmldump.$cr."</VFPData>";
		
		return $xmldump;
	}
} 