<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Auth {

	var $CI = null;

	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->database();
	}
	
	function do_login($login = NULL)
	{
		$result['login'] = false;
		$result['message'] = '';
	
		// A few safety checks
		// Our array has to be set
		if(!isset($login))
			return $result;
	
		// get user info
		$this->CI->db->select('*');
		// $this->CI->db->select('CURRENT_DATE as "CurDate"',false);
		$this->CI->db->from('user');
		if (isset($login['id_user']))
		{
			// untuk switch user
			$this->CI->db->where('id_user',$login['id_user']);
		}else{
			//Our array has to have 2 values
			//No more, no less!
			if(count($login) != 2)
				return $result;
			//
			$username = $login['username'];
			$password = $login['password'];
			$date_default = date('Ymd');
			$this->CI->db->where('username', $username);
			$this->CI->db->where('is_active =', '1');
		}
		// execute
		$query = $this->CI->db->get();
		$auth = $query->row_array();
		if ($auth['id'])
		{
			if (password_verify($password, $auth["password"])){
				// Our user exists, set session.
				$newdata = array();
				$newdata['LoggedIn'] = true;
				$newdata['Auth'] = $auth;
				$this->CI->session->set_userdata($newdata);	  
				// done
				$result['login'] = true;
				$result['message'] = 'Login success';
			}else{
				$result['message'] = 'username or password is incorrect';
			}
		}else{
			$result['message'] = 'unregistered';
		}
		return $result;

	}
	
	
	/**
	 *
	 * This function restricts users from certain pages.
	 * use restrict(TRUE) if a user can't access a page when logged in
	 *
	 * @access	public
	 * @param	boolean	wether the page is viewable when logged in
	 * @return	void
	 */	
	function restrict($logged_out = FALSE)
	{
		// If the user is logged in and he's trying to access a page
		// he's not allowed to see when logged in,
		// redirect him to the index!
		if ($logged_out && is_logged_in())
		{
				redirect('');
				exit;
				//echo $this->CI->fungsi->warning('Maaf, sepertinya Anda sudah login...',site_url());
				//die();
		}
		
		// If the user isn' logged in and he's trying to access a page
		// he's not allowed to see when logged out,
		// redirect him to the login page!
		if ( ! $logged_out && !is_logged_in()) 
		{
				echo $this->CI->fungsi->warning('Anda diharuskan untuk Login bila ingin mengakses halaman ini.',site_url());
				die();
		}
	}
	
	function logout() 
	{
		$this->CI->session->sess_destroy();	
		return TRUE;
	}
	
}
// End of library class
// Location: system/application/libraries/Auth.php
