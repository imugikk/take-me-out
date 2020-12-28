<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication_model extends Core_Model {

	function __construct() {

        parent::__construct();
		$this->set_table('user');
		$this->set_pk('id');
		$this->set_log(true);
    }	

}
