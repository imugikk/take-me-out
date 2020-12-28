<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Jadwal_model extends Core_Model
{
    function __construct()
    {
        parent::__construct();
        $this->set_table('jadwal');
        $this->set_pk('id_jadwal');
        $this->set_log(false);
    }
    function count_list()
	{
        $this->db->select('count(tbl.id_jadwal) as num_rows');
        $this->db->join('list_maskapai', 'tbl.fid_maskapai_detail = list_maskapai.id_maskapai_detail', 'left', false);
		if ($this->where)
		{
			if (count($this->like)>0)
			{
				$like = '( 1=0 ';
				foreach ($this->like as $key => $value)
				{
					$like .= ' OR '.$key." LIKE '%".$value."%'";
				}
				$like .= ')';
				$this->where[$like] = null;
			}
			$this->db->where($this->where);
		}else
		{
			$this->db->or_like($this->like);
		}
		
		$query = $this->db->get($this->table.' tbl');
		$data = $query->row_array();
		return $data['num_rows'];
	}

    function list()
    {
        $this->db->select('tbl.*');
        $this->db->select('list_maskapai.*');
        $this->db->join('list_maskapai', 'tbl.fid_maskapai_detail = list_maskapai.id_maskapai_detail', 'left', false);
        $this->db->where($this->where);

        foreach ($this->order_by as $key => $value) {
            $this->db->order_by($key, $value);
        }

        if (!$this->limit and !$this->offset)
            $query = $this->db->get($this->table . ' tbl');
        else
            $query = $this->db->get($this->table . ' tbl', $this->limit, $this->offset);
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            $query->free_result();
            return $query;
        }
    }
    function count_penumpang($id_transaction)
	{
		$sql = 
<<<EOT
	SELECT
	COUNT( id_pesanan_detail ) AS total
FROM
	pesanan_detail
	INNER JOIN pesanan ON pesanan_detail.fid_pesanan = pesanan.id_pesanan 
WHERE
	pesanan.fid_jadwal = '$id_transaction';
EOT;
		$query = $this->db->query($sql);
		$data = $query->row_array();
		// echo $this->db->last_query(); exit;
		return $data;
    }
}