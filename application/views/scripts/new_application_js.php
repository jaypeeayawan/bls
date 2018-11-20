<script type="text/javascript">
	$(function(){
    	$('#date-of-application, #dti-date-of-registration').daterangepicker({
		  	singleDatePicker: true,
		  	singleClasses: "picker_2"
		}, function(start, end, label) {
		  	console.log(start.toISOString(), end.toISOString(), label);
		});
	});
</script>