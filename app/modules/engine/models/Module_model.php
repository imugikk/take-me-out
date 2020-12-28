<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module_model extends Core_model {

	function __construct() {

        parent::__construct();
		$this->set_table('office_module');
		$this->set_pk('id_office_module');
		$this->set_log(false);
    }
	function get_module_by_user($id)
	{
		$sql = 
<<<EOT
SELECT tbl.*,mop.id,mop.st FROM (
	SELECT
		am0.id_office_module,
		am0.title_en,
		am0.title_id,
		am0.url,
		am0.fid_office_module,
		am0.order_by,
		substr( am0.order_by + 1000, 2 ) AS neworder
	FROM
		office_module am0 
	WHERE
		am0.fid_office_module = 0 UNION
	SELECT
		am1.id_office_module,
		am1.title_en,
		am1.title_id,
		am1.url,
		am1.fid_office_module,
		am1.order_by,
		substr( am1.fid_office_module + 1000, 2 ) AS neworder
	FROM
		office_module am1
	WHERE
		am1.fid_office_module != 0
) tbl
LEFT JOIN ( SELECT * FROM user_privilege WHERE fid_user = $id ) mop ON tbl.id_office_module = mop.fid_module
ORDER BY 
		neworder,fid_office_module
EOT;
	$query = $this->db->query($sql);
	// echo $this->db->last_query();exit;
	return $query;
	}
}
