<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    	<!-- Meta, title, CSS, favicons, etc. -->
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Log in</title>
    	<!-- Bootstrap -->
    	<link href="<?php echo base_url(); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    	<!-- Font Awesome -->
	    <link href="<?php echo base_url(); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	    <!-- NProgress -->
	    <link href="<?php echo base_url(); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
	    <!-- Animate.css -->
	    <link href="<?php echo base_url(); ?>vendors/animate.css/animate.min.css" rel="stylesheet">
	    <!-- Custom Theme Style -->
	    <link href="<?php echo base_url(); ?>build/css/custom.min.css" rel="stylesheet">
	    <!--  -->
	    <style type="text/css">
	    	.login_content form input[type="text"], 
	    	.login_content form input[type="password"]{
	    		margin: 0 0 10px;
	    	}
	    	.parsley-errors-list{
	    		text-align: left;
	    	}
	    </style>
  	</head>

  	<body class="login">
  		<div class="login_wrapper">
    		<div class="form login_form">
      			<section class="login_content">
        			<?php echo form_open(base_url().'login/login', 'class="form-horizontal form-label-left" id="login-form" data-parsley-validate role="form"'); ?>
          				<h1>Security Login</h1>
          				<?php if($this->session->flashdata("err_msg")){ ?>
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
								<?php echo $this->session->flashdata("err_msg"); ?>
							</div>
		    			<?php } ?>
          				<div>
          					<?php echo form_input('username', '', 'class="form-control" placeholder="Username" data-parsley-required-message="Username field is required"  required=""'); ?>
          				</div>
          				<div>
          					<?php echo form_password('password', '', 'class="form-control" placeholder="Password" data-parsley-required-message="Password field is required"  required=""'); ?>
          				</div>
          				<div>
							<?php echo form_submit('login', 'Log In', 'class="btn btn-sm btn-default"'); ?>
            				<a class="reset_pass" href="#">Lost your password?</a>
          				</div>
          				<div class="clearfix"></div>
          				<div class="separator">
            				<p class="change_link">
              					<a href="<?php echo base_url(); ?>business_application" target="_blank" class="to_register"> Business Permit Application Here </a>
            				</p>
                			<div class="clearfix"></div>
                			<br>
                			<div>
                  				<h1><i class="fa fa-paw"></i> Municipality of La Trinidad</h1>
                  				<p>Copyright &copy; <?php echo date('Y'); ?>. All rights reserved.</p>
                			</div>
          				</div>
        			<?php echo form_close(); ?>
      			</section>
    		</div>
  		</div>
    	<!-- jQuery -->
		<script src="<?php echo base_url(); ?>vendors/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap -->
    	<script src="<?php echo base_url(); ?>vendors/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Parsley -->
		<script src="<?php echo base_url(); ?>vendors/parsleyjs/dist/parsley.min.js"></script>
		<!--  -->
		<script type="text/javascript">
			$(function(){
				$('button[name="login"]').on('click', function(e){
					e.preventDefault();
					var form = $('#login-form');
					form.parsley().validate();
				});
			});
		</script>
  	</body>
</html>
