<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_type extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model(array('business_type_m'));
	}

	public function index(){
		if(!$this->session->userdata('loggedIn')) redirect('login');

		$this->title = 'Type of Business';
	    $this->content = '<div class="">';
	        $this->content .= '<div class="page-title">';
	            $this->content .= '<div class="title_left">'.heading('Type of Business Manager', 3).'</div>';
	            $this->content .= '</div>';
	        $this->content .= '</div>';
	        $this->content .= '<div class="clearfix"></div>';
	        $this->content .= '<div class="row">';
	            $this->content .= '<div class="col-md-12 col-sm-12 col-xs-12">';
	                $this->content .= '<div class="x_panel">';
	                    $this->content .= '<div class="x_title">';
	                        $this->content .= heading('Types', 2);
	                        $this->content .= '<ul class="nav navbar-right panel_toolbox">';
	                        	$this->content .= '<li><a id="create-type"><i class="fa fa-plus-circle"></i> Create New Type</a></li>';
	                        $this->content .= '</ul>';
							$this->content .= '<div class="clearfix"></div>';
						$this->content .= '</div>';
						$this->content .= '<div class="x_content">';
							$this->content .= '<table class="table table-striped table-bordered" id="my-datatable">';
								$this->content .= '<thead>';
									$this->content .= '<tr>';
										$this->content .= '<th>Type</th>';
										$this->content .= '<th>Description</th>';
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
						$this->content .= heading('Create New Business Type', 4, 'lass="modal-title"');
					$this->content .= '</div>';
					$this->content .= '<div class="modal-body">';
						$this->content .= '<div class="form-group">';
                        	$this->content .= form_label('Type of Business : <span class="required">*</span>', 'business-type', 'class="control-label col-md-4 col-sm-4 col-xs-12"');
                        	$this->content .= '<div class="col-md-8 col-sm-8 col-xs-12">';
                          		$this->content .= form_input('business-type', '', 'id="business-type" required="required" class="form-control" data-parsley-required-message="Business type is required"');
                        	$this->content .= '</div>';
                      	$this->content .= '</div>';
						$this->content .= '<div class="form-group">';
                        	$this->content .= form_label('Description : <span class="required">*</span>', 'type-description', 'class="control-label col-md-4 col-sm-4 col-xs-12"');
                        	$this->content .= '<div class="col-md-8 col-sm-8 col-xs-12">';
                          		$this->content .= form_textarea('type-description', '', 'id="type-description" required="required" class="form-control" data-parsley-required-message="Business type description is required"');
                        	$this->content .= '</div>';
                      	$this->content .= '</div>';
					$this->content .= '</div>';
					$this->content .= '<div class="clearfix"></div>';
					$this->content .= '<div class="modal-footer">';
						$this->content .= form_button('createBtn', 'Ok', 'class="btn btn-sm btn-primary"');
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
						$this->content .= heading('Update Business Type', 4, 'class="modal-title"');
					$this->content .= '</div>';
					$this->content .= '<div class="modal-body">';
						$this->content .= '<div class="form-group">';
                        	$this->content .= form_label('Type of Business : <span class="required">*</span>', 'business-type', 'class="control-label col-md-4 col-sm-4 col-xs-12"');
                        	$this->content .= '<div id="type-container" class="col-md-8 col-sm-8 col-xs-12"></div>';
                      	$this->content .= '</div>';
						$this->content .= '<div class="form-group">';
                        	$this->content .= form_label('Description : <span class="required">*</span>', 'type-description', 'class="control-label col-md-4 col-sm-4 col-xs-12"');
                        	$this->content .= '<div id="description-container" class="col-md-8 col-sm-8 col-xs-12"></div>';
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
						$this->content .= heading('Delete Business Type', 4, 'class="modal-title"');
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

	    $this->js = 'business_type_js';

		$data['title'] = $this->title;
		$data['content'] = $this->content;
		$data['js'] = $this->js;

		$this->load->view('index', $data);

	}

	public function business_type_json(){
		$columns = array( 0 => 'id', 1 => 'type', 2 => 'description' );
		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];

        $totalData = $this->business_type_m->count_all_business_type();
        $totalFiltered = $totalData;

        if(empty($this->input->post('search')['value'])) {
            $posts = $this->business_type_m->get_all_business_type($limit, $start, $order, $dir);
        }else {
            $search = $this->input->post('search')['value'];
            $posts =  $this->business_type_m->posts_search($limit, $start, $search, $order, $dir);
            $totalFiltered = $this->business_type_m->posts_search_count($search);
        }

        $data = array();
        if(!empty($posts)){
            foreach ($posts as $post){
                $nestedData['id'] = $post->id;
                $nestedData['type'] = $post->type;
                $nestedData['description'] = $post->description;

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
		$type = ucfirst(strtolower(trim(htmlentities($postData[0]))));
		$description = ucfirst(strtolower(trim(htmlentities($postData[1]))));

		$this->business_type_m->create($type, $description);
	}

	public function update(){
		$id = $this->uri->segment(3,0);
		$postData = $this->input->post('postData');
		$type = ucfirst(strtolower(trim(htmlentities($postData[0]))));
		$description = ucfirst(strtolower(trim(htmlentities($postData[1]))));

		$this->business_type_m->update($id, $type, $description);
	}

	public function delete(){
		$id = $this->uri->segment(3,0);
		$this->business_type_m->delete($id);
	}


}