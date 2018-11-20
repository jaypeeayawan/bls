<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fees extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(array('fees_m'));
	}

	public function index(){
		if(!$this->session->userdata('loggedIn')) redirect('login');

		$this->title = 'Fees';
	    $this->content = '<div class="">';
	        $this->content .= '<div class="page-title">';
	            $this->content .= '<div class="title_left">'.heading('Fees Manager', 3).'</div>';
	            $this->content .= '</div>';
	        $this->content .= '</div>';
	        $this->content .= '<div class="clearfix"></div>';
	        $this->content .= '<div class="row">';
	            $this->content .= '<div class="col-md-12 col-sm-12 col-xs-12">';
	                $this->content .= '<div class="x_panel">';
	                    $this->content .= '<div class="x_title">';
	                        $this->content .= heading('Fees', 2);
	                        $this->content .= '<ul class="nav navbar-right panel_toolbox">';
	                        	$this->content .= '<li><a id="create-fee"><i class="fa fa-plus-circle"></i> Create New Fee</a></li>';
	                        $this->content .= '</ul>';
							$this->content .= '<div class="clearfix"></div>';
						$this->content .= '</div>';
						$this->content .= '<div class="x_content">';
							$this->content .= '<table class="table table-striped table-bordered" id="my-datatable">';
								$this->content .= '<thead>';
									$this->content .= '<tr>';
										$this->content .= '<th>Local Taxes</th>';
										$this->content .= '<th>Amount Due</th>';
										$this->content .= '<th>Action</th>';
									$this->content .= '</tr>';
								$this->content .= '</thead>';
							$this->content .= '</table>';
	                    $this->content .= '</div>';
	                $this->content .= '</div>';
	            $this->content .= '</div>';
	        $this->content .= '</div>';
	    $this->content .= '</div>';

	    // create modal

		$this->content .= '<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="false">';
			$this->content .= '<div class="modal-dialog">';
				$this->content .= '<div class="modal-content">';
					$this->content .= form_open('', 'id="create-form" class="form-horizontal form-label-left" data-parsley-validate role="form"');
					$this->content .= '<div class="modal-header">';
						$this->content .= '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>';
						$this->content .= heading('Create New Fee', 4, 'lass="modal-title"');
					$this->content .= '</div>';
					$this->content .= '<div class="modal-body">';
						$this->content .= '<div class="form-group">';
                        	$this->content .= form_label('Local Taxes : <span class="required">*</span>', 'local-taxes', 'class="control-label col-md-3 col-sm-3 col-xs-12"');
                        	$this->content .= '<div class="col-md-9 col-sm-9 col-xs-12">';
                          		$this->content .= form_input('local-taxes', '', 'id="local-taxes" required="required" class="form-control" data-parsley-required-message="Local taxes is required"');
                        	$this->content .= '</div>';
                      	$this->content .= '</div>';
						$this->content .= '<div class="form-group">';
                        	$this->content .= form_label('Amount Due : <span class="required">*</span>', 'amount-due', 'class="control-label col-md-3 col-sm-3 col-xs-12"');
                        	$this->content .= '<div class="col-md-9 col-sm-9 col-xs-12">';
                          		$this->content .= form_input('amount-due', '', 'id="amount-due" required="required" class="form-control" data-parsley-required-message="Amount due is required"');
                        	$this->content .= '</div>';
                      	$this->content .= '</div>';
					$this->content .= '</div>';
					$this->content .= '<div class="clearfix"></div>';
					$this->content .= '<div class="modal-footer">';
						$this->content .= form_button('saveBtn', 'Save', 'class="btn btn-sm btn-primary"');
						$this->content .= form_button('cancelBtn', 'Cancel', 'class="btn btn-sm btn-default" data-dismiss="modal" aria-hidden="true"');
					$this->content .= '</div>';
				$this->content .= '</div>';
				$this->content .= form_close();
			$this->content .= '</div>';
		$this->content .= '</div>';

		// update modal

		$this->content .= '<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="false">';
			$this->content .= '<div class="modal-dialog">';
				$this->content .= '<div class="modal-content">';
					$this->content .= form_open('', 'id="update-form" class="form-horizontal form-label-left" data-parsley-validate role="form"');
					$this->content .= '<div class="modal-header">';
						$this->content .= '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>';
						$this->content .= heading('Update Fee', 4, 'class="modal-title"');
					$this->content .= '</div>';
					$this->content .= '<div class="modal-body">';
						$this->content .= '<div class="form-group">';
                        	$this->content .= form_label('Local Taxes : <span class="required">*</span>', 'local-taxes', 'class="control-label col-md-4 col-sm-4 col-xs-12"');
                        	$this->content .= '<div id="local-taxes-container" class="col-md-8 col-sm-8 col-xs-12"></div>';
                      	$this->content .= '</div>';
						$this->content .= '<div class="form-group">';
                        	$this->content .= form_label('Amount Due : <span class="required">*</span>', 'amount-due', 'class="control-label col-md-4 col-sm-4 col-xs-12"');
                        	$this->content .= '<div id="amount-due-container" class="col-md-8 col-sm-8 col-xs-12"></div>';
                      	$this->content .= '</div>';
					$this->content .= '</div>';
					$this->content .= '<div class="clearfix"></div>';
					$this->content .= '<div class="modal-footer">';
						$this->content .= form_button('updateBtn', 'Ok', 'class="btn btn-sm btn-primary"');
						$this->content .= form_button('cancelBtn', 'Cancel', 'class="btn btn-sm btn-default" data-dismiss="modal" aria-hidden="true"');
					$this->content .= '</div>';
				$this->content .= '</div>';
				$this->content .= form_close();
			$this->content .= '</div>';
		$this->content .= '</div>';

		// delete modal

		$this->content .= '<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="defModalHead" aria-hidden="false">';
			$this->content .= '<div class="modal-dialog">';
				$this->content .= '<div class="modal-content">';
					$this->content .= form_open('', 'id="delete-form" class="form-horizontal form-label-left"role="form"');
					$this->content .= '<div class="modal-header">';
						$this->content .= '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>';
						$this->content .= heading('Delete Fees', 4, 'class="modal-title"');
					$this->content .= '</div>';
					$this->content .= '<div class="modal-body">';
						$this->content .= '<div id="delete-confirmation-container"><span id="question">Are you sure to delete?</span></div>';
						$this->content .= '<div id="delete-info-container"></div>'; 
					$this->content .= '</div>';
					$this->content .= '<div class="clearfix"></div>';
					$this->content .= '<div class="modal-footer">';
						$this->content .= form_button('deleteBtn', 'Ok', 'class="btn btn-sm btn-danger"');
						$this->content .= form_button('cancelBtn', 'Cancel', 'class="btn btn-sm btn-default" data-dismiss="modal" aria-hidden="true"');
					$this->content .= '</div>';
				$this->content .= '</div>';
				$this->content .= form_close();
			$this->content .= '</div>';
		$this->content .= '</div>';

		$this->js = 'fees_js';

		$data['title'] = $this->title;
		$data['content'] = $this->content;
		$data['js'] = $this->js;
		$this->load->view('index', $data);

	}

	public function fees_json(){
		$columns = array( 0 => 'id', 1 => 'local_taxes', 2 => 'amount_due' );
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->fees_m->count_all_fees();
        $totalFiltered = $totalData;

        if(empty($this->input->post('search')['value'])) {
            $posts = $this->fees_m->get_all_fees($limit, $start, $order, $dir);
        }else {
            $search = $this->input->post('search')['value'];
            $posts =  $this->fees_m->posts_search($limit, $start, $search, $order, $dir);
            $totalFiltered = $this->fees_m->posts_search_count($search);
        }

        $data = array();
        if(!empty($posts)){
            foreach ($posts as $post){
                $nestedData['id'] = $post->id;
                $nestedData['local_taxes'] = $post->local_taxes;
                $nestedData['amount_due'] = $post->amount_due;

                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );
		header ( "Content-type: application/json" );
		echo json_encode($json_data);
	}

	public function create(){
		$postData = $this->input->post('postData');
		$local_taxes = ucfirst(strtolower(trim(htmlentities($postData[0]))));
		$amount_due = trim(htmlentities($postData[1]));

		$this->fees_m->create($local_taxes, $amount_due);
	}

	public function update(){
		$id = $this->uri->segment(3,0);
		$postData = $this->input->post('postData');
		$local_taxes = ucfirst(strtolower(trim(htmlentities($postData[0]))));
		$amount_due = ucfirst(strtolower(trim(htmlentities($postData[1]))));

		$this->fees_m->update($id, $local_taxes, $amount_due);
	}

	public function delete(){
		$id = $this->uri->segment(3,0);
		$this->fees_m->delete($id);
	}
	
}