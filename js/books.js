$(document).ready(function(){	

	var bookRecords = $('#bookListing').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,		
		"bFilter": false,		
		'serverMethod': 'post',		
		"order":[],
		"ajax":{
			url:"books_action.php",
			type:"POST",
			data:{action:'listBook'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 9, 10],
				"orderable":false,
			},
		],
		"pageLength": 10
	});	
	
	$('#addBook').click(function(){
		$('#bookModal').modal({
			backdrop: 'static',
			keyboard: false
		});		
		$("#bookModal").on("shown.bs.modal", function () {
			$('#bookForm')[0].reset();				
			$('.modal-title').html("<i class='fa fa-plus'></i> Add book");					
			$('#action').val('addBook');
			$('#save').val('Save');
		});
	});		
	
	$("#bookListing").on('click', '.update', function(){
		var bookid = $(this).attr("id");
		var action = 'getBookDetails';
		$.ajax({
			url:'books_action.php',
			method:"POST",
			data:{bookid:bookid, action:action},
			dataType:"json",
			success:function(respData){				
				$("#bookModal").on("shown.bs.modal", function () { 
					$('#bookForm')[0].reset();
					respData.data.forEach(function(item){						
						$('#bookid').val(item['bookid']);						
						$('#name').val(item['name']);
						$('#isbn').val(item['isbn']);
						$('#no_of_copy').val(item['no_of_copy']);
						$('#category').val(item['categoryid']);
						$('#rack').val(item['rackid']);
						$('#publisher').val(item['publisherid']);
						$('#author').val(item['authorid']);							
						$('#status').val(item['status']);						
					});														
					$('.modal-title').html("<i class='fa fa-plus'></i> Edit book");
					$('#action').val('updateBook');
					$('#save').val('Save');					
				}).modal({
					backdrop: 'static',
					keyboard: false
				});			
			}
		});
	});
	
	$("#bookModal").on('submit','#bookForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"books_action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#bookForm')[0].reset();
				$('#bookModal').modal('hide');				
				$('#save').attr('disabled', false);
				bookRecords.ajax.reload();
			}
		})
	});		

	$("#bookListing").on('click', '.delete', function(){
		var bookid = $(this).attr("id");		
		var action = "deleteBook";
		if(confirm("Are you sure you want to delete this record?")) {
			$.ajax({
				url:"books_action.php",
				method:"POST",
				data:{bookid:bookid, action:action},
				success:function(data) {					
					bookRecords.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});
	
});