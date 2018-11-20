<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('password'));
	}

	public function index(){
		if($this->session->userdata('loggedIn')) redirect(base_url().''.$this->session->userdata('controller'));

		$this->load->view('login');
	}

	public function login(){
		$username = htmlentities($this->input->post('username'));
		$password = htmlentities($this->input->post('password'));

		$sql = 'SELECT 
			u.id as user_id, 
			ut.usertype as controller 
			FROM users u
			JOIN usertype ut ON u.usertype_id = ut.id
			WHERE u.username = ? AND u.password = ? AND u.is_active = ?';
		$query = $this->db->query($sql, array($username, hash_password($password), 1));	

		if($query->num_rows() == 1){
			$row = $query->row();

			$CI =& get_instance();
			$CI->load->library('session');
			$data = array(
				'userId'  => $row->user_id,
				'controller'  => $row->controller,
				'loggedIn' => TRUE
			);
			$CI->session->set_userdata($data);
			redirect(base_url().strtolower($row->controller));
		}else{
			$this->session->set_flashdata("err_msg", "Incorrect username or password.");
            redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		return redirect('login');
	}
}