<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		if(!$this->session->userdata('loggedIn')) redirect('login');
		
		$this->home();
	}

	public function home(){
		$this->title = 'Home';
		$this->content = '';
		$this->js = 'home_js';

		$data['title'] = $this->title;
		$data['content'] = $this->content;
		$data['js'] = $this->js;
		$this->load->view('index', $data);

	}

	public function dashboard(){

	}

}