<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php echo doctype(); ?>
<html>
  	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <!-- Meta, title, CSS, favicons, etc. -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Application</title>
	    <!-- Bootstrap -->
	    <link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Font Awesome -->
	    <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	    <!-- NProgress -->
	    <link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
	    <!-- bootstrap-daterangepicker -->
	    <link href="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	    <!-- bootstrap-datetimepicker -->
	    <link href="<?php echo base_url(); ?>vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	    <!-- Animate.css -->
	    <link href="<?php echo base_url(); ?>vendors/animate.css/animate.min.css" rel="stylesheet">
	    <!-- Custom Theme Style -->
	    <link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
	    <!--  -->
	    <style type="text/css">
      		body{
        		background-color: #f7f7f7;
        		color: rgba(34, 34, 34, 0.80);
      		}
      		input[type="checkbox"]{
      			cursor: pointer;
      		}
	      	#header{
		        background-color: #fff;
		        border-bottom: solid 2px #E6E9ED;
		        height: auto;
		        margin: 0px 0 10px 0;
		        padding: 10px 0 10px 0;
		        width: 100%;
	      	}
	      	#header img{
	        	height: 90px;
	        	width: auto;
	      	}
	      	#header #header-title span{
	        	display: block;
	      	}
	      	#header #header-title #header-title-main{
	      		font-size: 26px;
	      	}
	      	#header #header-title #header-title-sub-1{
	      		font-size: 20px;
	      	}
	      	#header #header-title #header-title-sub-2{
	      		font-size: 18px;
	      	}

	      	.application-options{
	      		cursor: pointer;
	      	}
	      	.x_title_sub{
				font-size: 14px;
			    font-weight: 700;
	      	}

	      	#footer{
	        	background-color: #fff;
	        	border-top: solid 2px #E6E9ED;
	      	}
	      	#footer p{
	        	padding: 10px 0 0 0;
	      	}
	    </style>
  	</head>
  	<body>

    	<div class="container">

			<section id="header-container">
				<div class="col-md-12" id="header">
					<div class="col-md-1">
						<img src="<?php echo base_url().'images/logo.png';?>">
					</div>
					<div class="col-md-11">
						<h1 id="header-title">
							<span id="header-title-main">Application for Business Permit</span>
							<span id="header-title-sub-1">Tax Year <?php echo date('Y'); ?></span>
							<span id="header-title-sub-2">Municipality of La Trinidad</span>
						</h1>
					</div> 
				</div> 
			</section>

      		<section id="content-container">

        		<div class="col-sm-12 col-md-12 col-xs-12" id="instructions">
          			<div class="x_panel">
            			<div class="x_title">
              				<h4>INSTRUCTIONS</h4>
              				<div class="clearfix"></div>
            			</div>
            			<div class="x_content">
              				<ul>
				                <li>Provide accurate information and print legibly to avoid delays. Incomplete application form will be returned to the applicant.</li>
				                <li>Ensure that all documents attached to this form (if any) are complete and properly filled out.</li>
				                <li>For RENEWAL APPLICATION , update information if that certain information have changed.</li>
              				</ul>
            			</div>
            			<!-- ./content -->
			        </div>
			        <!-- ./x_panel -->
        		</div>     

        		<div class="col-sm-12 col-md-12 col-xs-12" id="applicant-section">
            		<div class="x_panel">
              			<?php echo $content; ?>
            		</div>
            		<!-- ./x_panel -->
          		</div>
          		<!-- ./col-md-12 -->
      		</section>

      		<section id="footer-container">
        		<div class="col-md-12" id="footer">
          			<p>Copyright &copy; <?php echo date('Y'); ?>. Business Licensing Application. Municipality of La Trinindad. All rights reserved.</p>
        		</div>
      		</section>

    	</div>
    	<!-- jQuery -->
    	<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
    	<!-- Bootstrap -->
      	<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    	<!-- Parsley -->
    	<script src="<?php echo base_url(); ?>vendors/parsleyjs/dist/parsley.min.js"></script>
	    <!-- NProgress -->
	    <script src="<?php echo base_url(); ?>vendors/nprogress/nprogress.js"></script>
    	<!-- FastClick -->
    	<script src="<?php echo base_url(); ?>vendors/fastclick/lib/fastclick.js"></script>
	    <!-- bootstrap-daterangepicker -->
	    <script src="<?php echo base_url(); ?>vendors/moment/min/moment.min.js"></script>
	    <script src="<?php echo base_url(); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
	    <!-- bootstrap-datetimepicker -->    
	    <script src="<?php echo base_url(); ?>vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>    	
		<!-- Custom Theme Scripts -->
		<script src="<?php echo base_url(); ?>build/js/custom.js"></script>
    	<!--  -->
    	<?php $this->load->view('scripts/'.$js); ?>
  	</body>
</html>
