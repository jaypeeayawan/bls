<script type="text/javascript">
	$(function(){

		var dataTable = $('table#my-datatable').DataTable({
			"processing" : true,
			"serverSide" : true,
			"ajax" : {
				"url" : "<?php echo base_url(); ?>business_type/business_type_json",
				"type" : "POST",
				"dataType": "json"
			},
			"columns" : [
				{ "data" : "type" },
				{ "data" : "description" },
	            { "data" : null,
	                "render" : function (row) {
	                    return '<a href="javascript:;" id="'+row.id+'_'+row.type+'_'+row.description+'" class="btn btn-default btn-xs update-type"><i class="fa fa-edit"></i> Edit</a><a href="javascript:;" id="'+row.id+'_'+row.type+'_'+row.description+'" class="btn btn-danger btn-xs delete-type"><i class="fa fa-times"></i> Delete</a>';
	                }
	            },				
			],
          	"order": [[1, "asc"]]			
		});

		// create
		$(document).on('click', '#create-type', function(){
			$('#create-modal').modal({ show: 'show', backdrop: 'static' });
			$('button[name="createBtn"]').unbind('click').bind('click', function(e){
				e.preventDefault();

				var form = $('#create-form');
				form.parsley().validate();

				if(form.parsley().isValid()){
					var postData = new Array();
					postData.push($('#business-type').val());
					postData.push($('#type-description').val());

					$.ajax({
						url: '<?php echo base_url(); ?>business_type/create',
						type: 'post',
						data: { postData : postData },
						success: function(){
							$('#create-modal').modal('hide');
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

		// update
		$(document).on('click', '.update-type', function(){
			$('#update-modal').modal({ show: 'show', backdrop: 'static' });
			
			var ids = new String($(this).attr('id'));
			ids = ids.split('_');
			var id = ids[0];
			var type = ids[1];
			var description = ids[2];

			$('#type-container').html($('<input type="text" name="business-type" class="form-control" id="business-type" value="'+type+'" data-parsley-required-message="Business type is required" required="required">'));
			$('#description-container').html($('<textarea name="type-description" class="form-control" id="type-description" data-parsley-required-message="Business type description is required" required="required">'+description+'</textarea>'));

			$('button[name="updateBtn"]').unbind('click').bind('click', function(e){
				e.preventDefault();

				var form = $('#update-form');
				form.parsley().validate();

				if(form.parsley().isValid()){
					var postData = new Array();
					postData.push($('#type-container #business-type').val());
					postData.push($('#description-container #type-description').val());

					$.ajax({
						url: '<?php echo base_url(); ?>business_type/update/'+id,
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
		$(document).on('click', '.delete-type', function(){
			$('#delete-modal').modal({ show: 'show', backdrop: 'static' });
			
			var ids = new String($(this).attr('id'));
			ids = ids.split('_');
			var id = ids[0];
			var type = ids[1];
			var description = ids[2];

			$('#delete-info-container').html($('<p>{ '+type+' - '+description+' }</p>'));
			$('button[name="deleteBtn"]').unbind('click').bind('click', function(e){
				e.preventDefault();
				$.ajax({
					url: '<?php echo base_url(); ?>business_type/delete/'+id,
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