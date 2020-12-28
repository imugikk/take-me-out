<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan_model extends Core_Model
{
    function __construct()
    {
        parent::__construct();
        $this->set_table('pesanan');
        $this->set_pk('id_pesanan');
        $this->set_log(false);
    }
    function count_list()
	{
        $this->db->select('count(tbl.id_pesanan) as num_rows');
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
    function getNewCode($shortCode){
		$preff = $shortCode;
		// $preff = $shortCode.'-'.date('y');
		$preffLen = strlen($preff)+1;
		$value = '';
		$this->db->select('nomor_pesanan');
		$this->db->order_by('nomor_pesanan','desc');
		$where = array();
		$where['(
			nomor_pesanan LIKE \'%'.$preff.'%\'
		)'] = null;
		$this->db->where($where);
		$query = $this->db->get($this->table.' tbl',1);
		// echo $this->db->last_query();exit;
        $row = $query->row_array();
		$counter = 0;
		if ($row){
			$counter = substr($row['nomor_pesanan'],$preffLen);
		}
		$counter = substr($counter + 100001,1);
		$value = $preff.$counter;
		return $value;
	}

	function updateSummary($id_pesanan)
	{
		$myquery = 
<<<EOT
	SELECT SUM( maskapai_detail.harga ) FROM pesanan_detail INNER JOIN pesanan ON pesanan_detail.fid_pesanan = pesanan.id_pesanan INNER JOIN jadwal ON pesanan.fid_jadwal = jadwal.id_jadwal INNER JOIN maskapai_detail ON jadwal.fid_maskapai_detail = maskapai_detail.id_maskapai_detail WHERE pesanan_detail.fid_pesanan = $id_pesanan;
EOT;
		return $this->db->query($myquery);
    }
}