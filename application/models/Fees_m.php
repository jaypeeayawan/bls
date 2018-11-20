<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fees_m extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_all_fees($limit, $start, $col, $dir){
		$query = $this->db->select('*')
			->from('fees')
			->limit($limit, $start)
			->order_by($col, $dir)
			->get();
        return ($query->num_rows() > 0) ? $query->result() : null;
	}
    public function count_all_fees(){
        $query = $this->db->select('*')
			->from('fees')
			->get();
        return $query->num_rows();
    }
    public function posts_search($limit, $start, $search, $col, $dir){
        $query = $this->db->select('*')
			->from('fees')
			->like('local_taxes', $search)
			->or_like('amount_due', $search)
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
    }
    public function posts_search_count($search){
        $query = $this->db->select('*')
			->from('fees')
			->like('local_taxes', $search)
			->or_like('amount_due', $search)
			->get();
		return $query->num_rows();
    }	

	public function create($local_taxes, $amount_due){
		$data = array(
				'local_taxes' => $local_taxes,
				'amount_due' => $amount_due
			);
		return $this->db->insert('fees', $data);
	}

	public function read(){
		$query = $this->db->get('fees');
		return $query->result();
	}

	public function update($id, $local_taxes, $amount_due){
		$data = array(
				'local_taxes' => $local_taxes,
				'amount_due' => $amount_due
			);
		return $this->db->update('fees', $data, array('id' => $id));
	}

	public function delete($id){
		return $this->db->delete('fees', array('id' => $id));

	}

}