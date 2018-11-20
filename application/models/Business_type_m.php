<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_type_m extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function get_all_business_type($limit, $start, $col, $dir){
		$query = $this->db->select('*')
			->from('business_type')
			->limit($limit, $start)
			->order_by($col, $dir)
			->get();
        return ($query->num_rows() > 0) ? $query->result() : null;
	}
    public function count_all_business_type(){
        $query = $this->db->select('*')
			->from('business_type')
			->get();
        return $query->num_rows();
    }
    public function posts_search($limit, $start, $search, $col, $dir){
        $query = $this->db->select('*')
			->from('business_type')
			->like('type', $search)
			->or_like('description', $search)
            ->limit($limit, $start)
            ->order_by($col, $dir)
            ->get();
		return ($query->num_rows() > 0) ? $query->result() : null;
    }
    public function posts_search_count($search){
        $query = $this->db->select('*')
			->from('business_type')
			->like('type', $search)
			->or_like('description', $search)
			->get();
		return $query->num_rows();
    }

	public function create($type, $description){
		$data = array(
				'type' => $type,
				'description' => $description
			);
		return $this->db->insert('business_type', $data);
	}

	public function read(){
		$query = $this->db->get('business_type');
		return $query->result();
	}
	
	public function update($id, $type, $description){
		$data = array(
				'type' => $type,
				'description' => $description
			);
		return $this->db->update('business_type', $data, array('id' => $id));
	}

	public function delete($id){
		return $this->db->delete('business_type', array('id' => $id));
	}


}