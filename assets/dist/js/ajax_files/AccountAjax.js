
    <script>
    $(function(){
     showCompany();
		//function
		function showCompany(){
        //alert('ok');
			$.ajax({
				type: 'ajax',
				url: '<?php echo site_url('Test/acountList')?>',
				async: false,
				dataType: 'json',
				success: function(data){

					var html = '';
					var i;
					for(i=0; i<data.length; i++){
					
						html +='<tr>'+
								'<td>'+data[i].ac_name+'</td>'+
		                        '<td>'+data[i].area_name+'</td>'+
		                        '<td>'+data[i].acount_name+'</td>'+
                                '<td>'+data[i].ac_fname+'</td>'+
		                        '<td>'+data[i].ac_cnic+'</td>'+
		                        '<td>'+data[i].ac_address+'</td>'+
                                '<td>'+data[i].ac_cellno+'</td>'+
		                        '<td>'+data[i].ac_balance+'</td>'+
		                        '<td>'+data[i].ac_salary+'</td>'+
                                '<td>'+data[i].ac_email+'</td>'+
				                '<td>'+
				                '<a href="javascript:;" class="zmdi zmdi-edit  item_edit" title="Edit" style="color:green; margin:15px" data="'+data[i].id+'">Edit</a>'+
				               '<a href="javascript:;" class="zmdi zmdi-delete item-delete"  title="Delete"  style="color:red;" data="'+data[i].id+'">Delete</a>'+
									'</td>'+
	
                           
							    '</tr>';
					}
					$('#showCompany').html(html);
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}
        
        
		//delete- 
		$('#showCompany').on('click', '.item-delete', function(){
			var id = $(this).attr('data');
			$('#deleteModal').modal('show');
			//prevent previous handler - unbind()
			$('#btnDelete').unbind().click(function(){
				$.ajax({
					type: 'ajax',
					method: 'get',
					async: false,
					url: '<?php echo site_url('Test/deleteAccount')?>',
					data:{id:id},
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#deleteModal').modal('hide');

							$('.alert-success').html('Account Deleted successfully').fadeIn().delay(4000).fadeOut('slow');
							showCompany();
						}else{
							alert('There is Error Error');
						}
					},
					error: function(){
						alert('Error deleting');
					}
				});
			});
		});
        
        
        
		//edit
		$('#showCompany').on('click', '.item_edit', function(){
			var id = $(this).attr('data');
			$('#Modal_Edit').modal('show');
			$('#myForm')[0].reset();
			$('#myForm').attr('action', '<?php echo site_url('Test/updateAccount')?>');
			$.ajax({
				type: 'ajax',
				method: 'get',
				url:'<?php echo site_url('Test/editAccount')?>',
				data: {id: id},
				async: false,
				dataType: 'json',
				success: function(data){
					$('input[name=txtId]').val(data.id);
					$('input[name=name]').val(data.name);
					$('input[name=f_name]').val(data.father_name);
					$('input[name=cnic]').val(data.cnic);
					$('input[name=address]').val(data.address);
                    $('input[name=cell_no]').val(data.cell_no);
					$('input[name=balance]').val(data.balance);
					$('input[name=salary]').val(data.salary);
					$('input[name=email]').val(data.email);
				},
				error: function(){
					alert('Could not Edit Data');
				}
			});
		});
        
       
		$('#btnUpdate').click(function(){
			var url = $('#myForm').attr('action');
			var data = $('#myForm').serialize();
	
            
				$.ajax({
					type: 'ajax',
					method: 'post',
					url: '<?php echo site_url('Test/updateAccount')?>',
					data: data,
					async: false,
					dataType: 'json',
					success: function(response){
						if(response.success){
							$('#Modal_Edit').modal('hide');
							$('#myForm')[0].reset();
							if(response.type=='add'){
								var type = 'added'
							}else if(response.type=='update'){
								var type ="updated"
							}
							$('.alert-success').html('Account '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
							showCompany();
						}else{
							alert('Error');
						}
					},
					error: function(){
						alert('Could not add data');
					}
				});
		});

    }); 

    </script>