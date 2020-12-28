<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Engine_model extends Core_model {

	function __construct() {

        parent::__construct();
		// $this->set_schema('public');
		// $this->set_table('AppMenus');
		// $this->set_pk('idAppMenu');
		// $this->set_log(false);
    }	
	function syncData()
	{
		$sql = 
<<<EOT
DO $$ BEGIN
PERFORM public._sync_ssu();
PERFORM public._get_rcv();
END $$;
EOT;
	$query = $this->db->query($sql);
	return $query;
	}
}
