<script type="text/javascript">
	$(function(){

		$('button[name="newApplicationBtn"]').on('click', function(e){
			window.open('<?php echo base_url(); ?>business_application/new_application');
		});

		$('button[name="renewApplicationBtn"]').on('click', function(e){
			var form = $('#renew-application-form');
			form.parsley().validate();
			if(form.parsley().isValid()){
				var trade_name = $('#renew-application').val();
				window.open('<?php echo base_url(); ?>business_application/renew_application/'+trade_name);
			}
		});	

	});
</script>