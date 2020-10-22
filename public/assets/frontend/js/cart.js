jQuery(document).ready(function($){
	CART.deleteCart();
});

CART={
	deleteCart:function (){
		jQuery('.remove-cart').click(function(){
			var url = BASE_URL + 'xoa-mot-san-pham';
			var pid = jQuery(this).attr('data-product_id');
			var _token = jQuery('input[name="_token"]').val();
			jConfirm('Bạn có muốn xóa không [OK]:Đồng ý [Cancel]:Bỏ qua ?', 'Xác nhận', function(r) {
			if(r){
			jQuery.ajax({
				type: "POST",
				url: url,
				data: {pid:pid , _token:_token},
				success: function(data){
					if(data != ''){
						window.location.reload();
					}
				},
				error: function (data){
					alert('khong the xoa');
				}
			});
			}
		});
			return true;
		});
	
	},


}