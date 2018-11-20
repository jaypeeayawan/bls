<script type="text/javascript">
	$(function(){

		var dataTable = $('table#my-datatable').DataTable({
			"processing" : true,
			"serverSide" : true,
			"ajax" : {
				"url" : "<?php echo base_url(); ?>fees/fees_json",
				"type" : "POST",
				"dataType": "json"
			},
			"columns" : [
				{ "data" : "local_taxes" },
				{ "data" : "amount_due" },
	            { "data" : null,
	                "render" : function (row) {
	                    return '<a href="javascript:;" id="'+row.id+'_'+row.local_taxes+'_'+row.amount_due+'" class="btn btn-default btn-xs update-fees"><i class="fa fa-edit"></i> Edit</a><a href="javascript:;" id="'+row.id+'_'+row.local_taxes+'_'+row.amount_due+'" class="btn btn-danger btn-xs delete-fees"><i class="fa fa-times"></i> Delete</a>';
	                }
	            },				
			],
			"columnDefs" : [
	            { "searchable": false, "targets": [1] }
			],
          	"order": [[1, "asc"]]			
		});

		// create
		$(document).on('click', '#create-fee', function(){
			$('#create-modal').modal({ show: 'show', backdrop: 'static' });
			$('button[name="saveBtn"]').unbind('click').bind('click', function(e){
				e.preventDefault();

				var form = $('#create-form');
				form.parsley().validate();

				if(form.parsley().isValid()){
					var postData = new Array();
					postData.push($('#local-taxes').val());
					postData.push($('#amount-due').val());

					$.ajax({
						url: '<?php echo base_url(); ?>fees/create',
						type: 'post',
						data: { postData : postData },
						success: function(){
							$('#create-modal').modal('hide');
							// reset form
							form[0].reset();
							form.parsley().reset();
							form.trigger('reset');
							// refresh datatable
							dataTable.ajax.reload()
						},
						error: function(){

						}
					});
				}

			});
		});

		// update
		$(document).on('click', '.update-fees', function(){
			$('#update-modal').modal({ show: 'show', backdrop: 'static' });
			
			var ids = new String($(this).attr('id'));
			ids = ids.split('_');
			var id = ids[0];
			var local_taxes = ids[1];
			var amount_due = ids[2];

			$('#local-taxes-container').html($('<input type="text" name="local-taxes" class="form-control" id="local-taxes" value="'+local_taxes+'" data-parsley-required-message="Local taxes is required" required="required">'));
			$('#amount-due-container').html($('<input type="text" name="amount-due" class="form-control" id="amount-due" value="'+amount_due+'" data-parsley-required-message="Amount due is required" required="required">'));

			$('button[name="updateBtn"]').unbind('click').bind('click', function(e){
				e.preventDefault();

				var form = $('#update-form');
				form.parsley().validate();

				if(form.parsley().isValid()){
					var postData = new Array();
					postData.push($('#local-taxes-container #local-taxes').val());
					postData.push($('#amount-due-container #amount-due').val());

					$.ajax({
						url: '<?php echo base_url(); ?>fees/update/'+id,
						type: 'post',
						data: { postData : postData },
						success: function(){
							$('#update-modal').modal('hide');
							// reset form
							form[0].reset();
							form.parsley().reset();
							form.trigger('reset');
							// refresh datatable
							dataTable.ajax.reload();
						},
						error: function(){

						}
					});
				}
			});
		});

		// delete
		$(document).on('click', '.delete-fees', function(){
			$('#delete-modal').modal({ show: 'show', backdrop: 'static' });
			
			var ids = new String($(this).attr('id'));
			ids = ids.split('_');
			var id = ids[0];
			var local_taxes = ids[1];
			var amount_due = ids[2];

			$('#delete-info-container').html($('<p>{ '+local_taxes+' - '+amount_due+' }</p>'));
			$('button[name="deleteBtn"]').unbind('click').bind('click', function(e){
				e.preventDefault();
				$.ajax({
					url: '<?php echo base_url(); ?>fees/delete/'+id,
					type: 'post',
					data: {},
					success: function(){
						$('#delete-modal').modal('hide');
						// refresh datatable
						dataTable.ajax.reload();
					},
					error: function(){

					}
				});
			});
		});
	});
</script>