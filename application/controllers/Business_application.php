<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Business_application extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('password'));
		$this->load->model('business_type_m');
	}

	public function index(){

		$this->js = 'business_application_js';
		
		$this->content = '<div class="x_title">';
            $this->content .= heading('APPLICATION TYPE', 2);
			$this->content .= '<div class="clearfix"></div>';
		$this->content .= '</div>';
		$this->content .= '<div class="x_content">';
			$this->content .= '<div class="x_content"><div class="col-md-3 col-sm-3 col-xs-3">';
				$this->content .= '<ul class="nav nav-tabs tabs-left">';
					$this->content .= '<li class="active"><a href="#new" data-toggle="tab" aria-expanded="true">New Application</a></li>';
					$this->content .= '<li class=""><a href="#renew" data-toggle="tab" aria-expanded="false">Renew Application</a></li>';
				$this->content .= '</ul>';
			$this->content .= '</div>';
			$this->content .= '<div class="col-md-9 col-sm-9 col-xs-9">';
				$this->content .= '<div class="tab-content">';
					$this->content .= '<div class="tab-pane active" id="new">';
						$this->content .= '<p class="lead">New Application</p>';
						$this->content .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
						$this->content .= form_open('', 'class="form-horizontal" id="new-application-form" data-parsley-validate=""');;
							$this->content .= '<div class="form-group">';
								$this->content .= form_button('newApplicationBtn', 'Submit', 'class="btn btn-sm btn-success"');
							$this->content .= '</div>';							
						$this->content .= form_close();							
					$this->content .= '</div>';
					$this->content .= '<div class="tab-pane" id="renew">';
						$this->content .= '<p class="lead">Renew Application</p>';
						$this->content .= '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
						$this->content .= form_open('', 'class="form-horizontal" id="renew-application-form" data-parsley-validate=""');
							$this->content .= '<div class="form-group">';
								$this->content .= '<label>Trade Name / Franchise</label>';
								$this->content .= '<div class="input-group">';
									$this->content .= form_input('renewApplication', '', 'class="form-control" id="renew-application" data-parsley-required-message="Trade Name or Franchise is required." required=""');
								$this->content .= '</div>';
							$this->content .= '</div>';
							$this->content .= '<div class="form-group">';
								$this->content .= form_button('renewApplicationBtn', 'Submit', 'class="btn btn-sm btn-success"');
							$this->content .= '</div>';
						$this->content .= form_close();
					$this->content .= '</div>';
				$this->content .= '</div>';
			$this->content .= '</div>';						
		$this->content .= '</div>';

        $data['js'] = $this->js;
        $data['content'] = $this->content;

        $this->load->view('business_application', $data);
	}

	public function new_application(){

		$this->load->helper('date');

		$this->js = 'new_application_js';
		$this->content = '';

		$this->content .= '<div class="x_title">';
            $this->content .= heading('NEW APPLICATION', 2);
			$this->content .= '<div class="clearfix"></div>';
		$this->content .= '</div>';
		$this->content .= '<div class="x_content">';
			// new application form
			$this->content .= form_open('', 'class="form-horizontal"');
				// owner information
				$this->content .= '<div class="x_panel">';	
					$this->content .= '<div class="x_title">';
			            $this->content .= heading('Owner Information', 2);
						$this->content .= '<div class="clearfix"></div>';
					$this->content .= '</div>';
					$this->content .= '<div class="x_content">';
						$this->content .= '<div class="row">';		
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('Date of Application : ', 'date-of-application');
		                    	$this->content .= '<span><strong></strong></span>';
		                    $this->content .= '</div>';
	                    $this->content .= '</div>';
						$this->content .= '<div class="row">';		
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Last Name', 'last-name');
								$this->content .= form_input('lastname', '', 'class="form-control" id="last-name"');
		                    $this->content .= '</div>'; 
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('First Name', 'first-name');
								$this->content .= form_input('firstname', '', 'class="form-control" id="first-name"');
		                    $this->content .= '</div>';  
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Middle Name', 'middle-name');
								$this->content .= form_input('middlename', '', 'class="form-control" id="middle-name"');
		                    $this->content .= '</div>';
	                    $this->content .= '</div>'; 
	                    $this->content .= '<div class="row">'; 
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('E-mail Address', 'owner-email');
								$this->content .= form_input('owneremail', '', 'class="form-control" id="owner-email"');
		                    $this->content .= '</div>';
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Telephone No.', 'owner-telephone-no');
								$this->content .= form_input('ownertelephoneno', '', 'class="form-control" id="owner-telephone-no"');
		                    $this->content .= '</div>'; 
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Mobile No.', 'owner-mobile-no');
								$this->content .= form_input('ownermobileno', '', 'class="form-control" id="owner-mobile-no"');
		                    $this->content .= '</div>';
						$this->content .= '</div>';
						$this->content .= '<div class="row">';		
							$this->content .= '<div class="col-md-4 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Contact Person', 'contact-person');
								$this->content .= form_input('lastname', '', 'class="form-control" id="last-name"');
		                    $this->content .= '</div>'; 
							$this->content .= '<div class="col-md-4 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Telephone / Mobile No.', 'contact-person-no');
								$this->content .= form_input('contactpersonno', '', 'class="form-control" id="contact-person-no"');
		                    $this->content .= '</div>';  
	                    $this->content .= '</div>'; 
	            		$this->content .= '<div class="row">';
	            			$this->content .= '<div class="col-md-12 col-sm-12 col-xs-12">';
	            				$this->content .= heading('Home Address :', 3, 'class="x_title_sub"');
	            			$this->content .= '</div>';
							$this->content .= '<div class="col-md-2 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Postal Code', 'owner-postal-code-add');
								$this->content .= form_input('ownerpostalcodeadd', '', 'class="form-control" id="owner-postal-code-add"');
		                    $this->content .= '</div>'; 
							$this->content .= '<div class="col-md-2 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('St. No.', 'owner-street-no-add');
								$this->content .= form_input('ownerstreetno', '', 'class="form-control" id="owner-street-no"');
		                    $this->content .= '</div>'; 	                        
	                    $this->content .= '</div>';
	                    $this->content .= '<div class="row">'; 
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Barangay', 'owner-barangay-add');
								$this->content .= form_input('ownerbarangayadd', '', 'class="form-control" id="owner-barangay-add"');
		                    $this->content .= '</div>';	
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Municipality', 'owner-municipality-add');
								$this->content .= form_input('ownermunicipalityadd', '', 'class="form-control" id="owner-municipality-add"');
		                    $this->content .= '</div>';	
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Province', 'owner-province-add');
								$this->content .= form_input('ownerprovinceadd', '', 'class="form-control" id="owner-province-add"');
		                    $this->content .= '</div>';
	                    $this->content .= '</div>';			
					$this->content .= '</div>';
				$this->content .= '</div>';
				// end of owner information
				// start of business information
				$this->content .= '<div class="x_panel">';	
					$this->content .= '<div class="x_title">';
			            $this->content .= heading('Business Information', 2);
						$this->content .= '<div class="clearfix"></div>';
					$this->content .= '</div>';
					$this->content .= '<div class="x_content">';
	                    $this->content .= '<div class="row">';
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('Trade Name / Franchise', 'trade-name');
								$this->content .= form_input('tradename', '', 'class="form-control" id="trade-name"');
		                    $this->content .= '</div>';  
							$this->content .= '<div class="col-md-6 col-sm-6 col-xs-12 form-group">';
								$this->content .= form_label('Business Name', 'business-name');
								$this->content .= form_input('businessname', '', 'class="form-control" id="business-name"');
		                    $this->content .= '</div>';
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('Business Type', 'business-type');
								$this->content .= '<select class="form-control" id="business-type">';
									$this->content .= '<option value="">Please Choose...</option>';
									$business_types = $this->business_type_m->read();
									foreach($business_types as $business_type):
										$this->content .= '<option value="'.$business_type->id.'">'.$business_type->type.'</option>';
									endforeach;
								$this->content .= '</select>';
		                    $this->content .= '</div>'; 
	                    $this->content .= '</div>'; 
	            		$this->content .= '<div class="row">';
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('DTI/SEC/CDA Registration No.', 'dti-registration-no');
								$this->content .= form_input('dtiregistrationno', '', 'class="form-control" id="dti-registration-no"');
		                    $this->content .= '</div>';  
							$this->content .= '<div class="col-md-3 col-sm-5 col-xs-12 form-group has-feedback">';
								$this->content .= form_label('DTI/SEC/CDA Date of Registration', 'dti-date-of-registration');
								$this->content .= form_input('dtidateofregistration', '', 'class="form-control has-feedback-left" id="dti-date-of-registration"');
		                    	$this->content .= '<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>';
		                    $this->content .= '</div>';		                         
	                    $this->content .= '</div>';
	                    $this->content .= '<div class="row">'; 
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('E-mail Address', 'business-email');
								$this->content .= form_input('businessemail', '', 'class="form-control" id="business-email"');
		                    $this->content .= '</div>';
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('Telephone No.', 'business-telephone-no');
								$this->content .= form_input('businesstelephoneno', '', 'class="form-control" id="business-telephone-no"');
		                    $this->content .= '</div>'; 
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('Mobile No.', 'business-mobile-no');
								$this->content .= form_input('businessmobileno', '', 'class="form-control" id="business-mobile-no"');
		                    $this->content .= '</div>';
						$this->content .= '</div>';
	            		$this->content .= '<div class="row">';
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('Business Area (in sq. m.)', 'business-area');
								$this->content .= form_input('businessarea', '', 'class="form-control" id="business-area"');
		                    $this->content .= '</div>'; 
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('No. of Employees', 'no-of-employees');
								$this->content .= form_input('noofemployees', '', 'class="form-control" id="no-of-employees"');
		                    $this->content .= '</div>'; 
							$this->content .= '<div class="col-md-3 col-sm-3 col-xs-12 form-group">';
								$this->content .= form_label('No. of Employees Residing in La Trinidad', 'no-of-employees-in-la-trinidad');
								$this->content .= form_input('noofemployeesinlatrinidad', '', 'class="form-control" id="no-of-employees-in-la-trinidad"');
		                    $this->content .= '</div>'; 	                        
	                    $this->content .= '</div>';
	            		$this->content .= '<div class="row">';
	            			$this->content .= '<div class="col-md-12 col-sm-12 col-xs-12">';
	            				$this->content .= heading('Business Address :', 3, 'class="x_title_sub"');
	            			$this->content .= '</div>';
							$this->content .= '<div class="col-md-2 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Postal Code', 'business-postal-code-add');
								$this->content .= form_input('businesspostalcodeadd', '', 'class="form-control" id="business-postal-code-add"');
		                    $this->content .= '</div>'; 
							$this->content .= '<div class="col-md-2 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('St. No.', 'business-street-no-add');
								$this->content .= form_input('businessstreetno', '', 'class="form-control" id="business-street-no"');
		                    $this->content .= '</div>'; 	                        
	                    $this->content .= '</div>';
	                    $this->content .= '<div class="row">'; 
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Barangay', 'business-barangay-add');
								$this->content .= form_input('businessbarangayadd', '', 'class="form-control" id="business-barangay-add"');
		                    $this->content .= '</div>';	
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Municipality', 'business-municipality-add');
								$this->content .= form_input('businessmunicipalityadd', '', 'class="form-control" id="business-municipality-add"');
		                    $this->content .= '</div>';	
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Province', 'business-province-add');
								$this->content .= form_input('businessprovinceadd', '', 'class="form-control" id="business-province-add"');
		                    $this->content .= '</div>';
	                    $this->content .= '</div>';
	            		$this->content .= '<div class="row">';
	            			$this->content .= '<div class="col-md-12 col-sm-12 col-xs-12">';
	            				$this->content .= heading('Note: Fill up only if business place is rented', 3, 'class="x_title_sub"');
	            			$this->content .= '</div>';
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Lessor\'s Full Name:', 'lessors-full-name');
								$this->content .= form_input('lessorsfullname', '', 'class="form-control" id="lessors-full-name"');
		                    $this->content .= '</div>';	
							$this->content .= '<div class="col-md-5 col-sm-5 col-xs-12 form-group">';
								$this->content .= form_label('Lessor\'s Full Address', 'lessors-full-address');
								$this->content .= form_input('lessorsfulladdress', '', 'class="form-control" id="lessors-full-address"');
		                    $this->content .= '</div>';	
	                    $this->content .= '</div>';	
	            		$this->content .= '<div class="row">';
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Lessor\'s Full Telephone / Mobile No.', 'lessors-contact-no');
								$this->content .= form_input('lessorscontactno', '', 'class="form-control" id="lessors-contact-no"');
		                    $this->content .= '</div>';	
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Lessor\'s E-mail Address', 'lessors-email');
								$this->content .= form_input('lessorsemail', '', 'class="form-control" id="lessors-email"');
		                    $this->content .= '</div>';	
							$this->content .= '<div class="col-md-3 col-sm-4 col-xs-12 form-group">';
								$this->content .= form_label('Monthly Rental', 'monthly-rental');
								$this->content .= form_input('monthlyrental', '', 'class="form-control" id="monthly-rental"');
		                    $this->content .= '</div>';	
	                    $this->content .= '</div>';	                    			
					$this->content .= '</div>';
				$this->content .= '</div>';
				// end of business information 
				$this->content .= '<div class="x_panel">';	
					$this->content .= '<div class="x_content">';
						$this->content .= '<div class="col-md-12 col-sm-12 col-xs-12">';
							$this->content .= '<p><strong>I DECLARE UNDER PENALTY OF PERJURY</strong> that the foregoing information are true based on my personal knowledge and authentic records. Further, I agree to comply with the regulatory requirement and other deficiencies within 30 days from release of the business permit.</p>';
						$this->content .= '</div>';
						$this->content .= '<div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-8 col-sm-offset-6">';
							$this->content .= form_button('submitBtn', '<i class="fa fa-save"></i> Submit Application', 'class="btn btn-sm btn-block btn-success"');
						$this->content .= '</div>';
					$this->content .= '</div>';
				$this->content .= '</div>';
			$this->content .= form_close();	
		$this->content .= '</div>';

		$data['js'] = $this->js;
		$data['content'] = $this->content;

		$this->load->view('business_application', $data);
	}

	public function renew_application(){
		$trade_name = $this->uri->segment(3,0);
		
		$this->js = 'renew_application_js';
		$this->content = '';

		$this->content .= '<div class="x_title">';
            $this->content .= heading('RENEW APPLICATION', 2);
			$this->content .= '<div class="clearfix"></div>';
		$this->content .= '</div>';
		$this->content .= '<div class="x_content">';
			$this->content .= '<p>'.$trade_name.'</p>';		
		$this->content .= '</div>';

		$data['js'] = $this->js;
		$data['content'] = $this->content;

		$this->load->view('business_application', $data);
	}	
}