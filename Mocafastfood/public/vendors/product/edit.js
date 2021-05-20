function actionDelete(event){
	event.preventDefault();
	let urlRequest = $(this).data('url');
	var that = $(this).parent().parent();
	Swal.fire({
		title: 'Ban co chac khong?',
		text: "ban khong the hoan tac!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'xoa!'
	}).then((result) => {
		if (result.isConfirmed) {	
			$.ajax({
				type: 'GET',
				url: urlRequest,
				success: function(data){
				
					if (data.code==200) {
						that.remove();
						Swal.fire(
							'Deleted!',
							'Xoa thanh cong',
							'success'
							)
						
						
					}
					
				},
				error:function(){
					alert('Deleted Fail !!');
				}
			});
			
		}
	})
}


$(function(){
	$(document).on('click','.action_delete', actionDelete);
});