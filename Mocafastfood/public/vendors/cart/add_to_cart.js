 function addToCart(event) {
    event.preventDefault();

    let urlCart = $(this).data('url');
    
    $.ajax({
      type: "GET",
      url: urlCart,
      dataType: 'json',
      success: function(data){

        if (data.code === 200) {
          Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Đã thêm vào giỏ hàng',
            showConfirmButton: false,
            timer: 1500
          });
        }
      },
      error: function(){

      }

    });

  }
  $(function () {
    $('.add_to_cart').on('click', addToCart);
  });