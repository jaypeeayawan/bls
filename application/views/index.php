<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Business Licensing System">
	<meta name="author" content="Jaypee Ayawan">
	<title><?php echo $title; ?></title>
	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet" >
	<!-- Custom Theme Style -->
	<link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
	<!-- Datatables -->
	<link href="<?php echo base_url(); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

	<style type="text/css">
		.panel_toolbox li a{
			color: #fff;
    		background-color: #337ab7;
    		border-color: #2e6da4;
    		border-radius: 3px;
    		padding: 3px 9px;
    		cursor: pointer;
		}
		.panel_toolbox li a:hover{
    		background-color: #286090;
    		border-color: #204d74;
		}

		#delete-confirmation-container{
			font-size: 14px;
		}
		#delete-confirmation-container span#question{
			color: #d9534f;
			font-stretch: 700;
		}
		#delete-info-container p{
			margin-top: 15px;
			font-size: 14px;
			text-indent: 1em;
		}
	</style>

</head>
<body>

  	<body class="nav-md">
    	<div class="container body">
      	<div class="main_container">
        	<div class="col-md-3 left_col">
          		<div class="left_col scroll-view">
            		<div class="navbar nav_title" style="border: 0;">
              			<a href="<?php echo base_url(); ?>admin" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            		</div>

            		<div class="clearfix"></div>

					<!-- menu profile quick info -->
					<div class="profile clearfix">
						<div class="profile_pic">
							<img src="<?php echo base_url(); ?>images/img.jpg" alt="..." class="img-circle profile_img">
						</div>
						<div class="profile_info">
							<span>Welcome,</span>
							<h2>John Doe</h2>
						</div>
					</div>
					<!-- /menu profile quick info -->

            		<br />

	           		<!-- sidebar menu -->
	            	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	              		<div class="menu_section">
	                		<h3>General</h3>
	                		<ul class="nav side-menu">
	                  			<li><a href="<?php echo base_url().''.$this->session->userdata('controller'); ?>"><i class="fa fa-home"></i> Home</a></li>
	                  			<li><a><i class="fa fa-globe"></i> System Section <span class="fa fa-chevron-down"></span></a>
	                    			<ul class="nav child_menu">
	                      				<li><a href="<?php echo base_url(); ?>business_type">Business Type</a></li>
										<li><a href="<?php echo base_url(); ?>fees">Fees</a></li>
	                    			</ul>
	                  			</li>
	                  			<li><a><i class="fa fa-shopping-cart"></i> Application Section <span class="fa fa-chevron-down"></span></a>
	                    			<ul class="nav child_menu">
	                      				<li><a href="#">Approved Applications</a></li>
	                      				<li><a href="#">Pending Applications</a></li>
	                    			</ul>
	                  			</li>
	                  			<li><a href="#"><i class="fa fa-suitcase"></i> Activity Logs</a></li>        			
	                		</ul>
	              		</div>
	            	</div>
	            	<!-- /sidebar menu -->
          		</div>
        	</div>

	        <!-- top navigation -->
	        <div class="top_nav">
	          	<div class="nav_menu">
		            <nav>
		              	<div class="nav toggle">
		                	<a id="menu_toggle"><i class="fa fa-bars"></i></a>
		              	</div>
		              	<ul class="nav navbar-nav navbar-right">
							<li class="">
								<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<img src="<?php echo base_url(); ?>images/img.jpg" alt="">John Doe
									<span class=" fa fa-angle-down"></span>
								</a>
								<ul class="dropdown-menu dropdown-usermenu pull-right">
									<li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
									<li>
										<a href="#"><i class="fa fa-cog"></i> Settings</a>
									</li>
									<li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
								</ul>
							</li>
		                	<li role="presentation" class="dropdown">
		                  		<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
		                    		<i class="fa fa-envelope-o"></i>
		                    		<span class="badge bg-green">6</span>
		                  		</a>
		                  		<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
				                    <li>
				                      	<a>
				                        	<span>
				                          		<span>New Applications</span>
				                          		<span class="time">3</span>
				                        	</span>
				                      	</a>
				                    </li>
			                    	<li>
										<a>
											<span>
												<span>Renew Applications</span>
												<span class="time">3</span>
											</span>
										</a>
									</li>
									<li>
										<div class="text-center">
											<a>
												<strong>See All Applications</strong>
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</li>
		                  		</ul>
		                	</li>
		              	</ul>
		            </nav>
	          	</div>
	        </div>
	        <!-- /top navigation -->

	        <!-- page content -->
	        <div class="right_col" role="main"><?php echo $content; ?></div>
	        <!-- /page content -->

	        <!-- footer content -->
	        <footer>
	          	<div class="pull-right">
	         		Copyright &copy; 2018. All Rights Reserved. Municipality of La Trinidad.
	          	</div>
	          	<div class="clearfix"></div>
	        </footer>
	        <!-- /footer content -->
      	</div>
    </div>

	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- NProgress -->
	<script type="text/javascript" src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="<?php echo base_url(); ?>build/js/custom.js"></script>
	<!-- Datatables -->
	<script src="<?php echo base_url(); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/jszip/dist/jszip.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/pdfmake/build/vfs_fonts.js"></script>
	<!-- Parsley -->
	<script src="<?php echo base_url(); ?>vendors/parsleyjs/dist/parsley.min.js"></script>
	<!--  -->
	<?php !is_null($js) ? $this->load->view('scripts/'.$js) : null; ?>
</body>
</html>