<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_privilege_model extends Core_Model {

	function __construct() {

        parent::__construct();
		$this->set_table('user_privilege');
		$this->set_pk('id');
		$this->set_log(false);
    }	

}
