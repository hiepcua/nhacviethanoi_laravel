<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('seo_title')</title>
    <meta property="og:url"           content="@yield('seo_url')" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="@yield('seo_title')" />
	<meta property="og:description"   content="@yield('seo_desc')" />
	<meta property="og:image"         content="@yield('seo_image')" />

    <link rel="stylesheet" href="{{asset('assets/clients/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/plugins/icheck-bootstrap/icheck-bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">
</head>
<body id="body">
    <div id="notification" style="display:none;"></div>
    <div class="wrapper">
        <!-- Header -->
        @include('clients.blocks.header')
		<!-- /.Header -->

        <!-- Content Wrapper. Contains page content -->
		<div id="main-content">
			<div class="content-wrapper">
                @section('sidebar')
                    @include('clients.blocks.home-banner')
                @show

				@yield('main_content')
			</div>
		</div>
		<!-- /.content-wrapper -->

		<!-- Footer -->
        @include('clients.blocks.footer')
		<?php 
		// if($com=='frontpage'){
		// 	echo '<div class="frontpage">';
		// 	include 'modules/footer.php';
		// 	include 'modules/cart_sidebar.php';
		// 	echo '</div>';
		// }else{
		// 	include 'modules/footer.php';
		// 	include 'modules/cart_sidebar.php';
		// }
		?>
		<!-- /.Footer -->
    </div>
    
    @include('clients.blocks.mobile-main-menu')

	<div id="myModalPopup" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"></h4>
				</div>
				<div class="modal-body"></div>
			</div>
		</div>
	</div>
	<div class="loading"></div>

    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/clients/js/jquery-1.11.2.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/clients/plugins/bootstrap/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    
    <!-- Custom js -->
    <script src="{{asset('assets/clients/js/custom.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" type="text/javascript"></script>

    {{-- <script type="text/javascript">
		$(document).ready(function(){
			loadCart();
			/* Thêm sản phẩm vào giỏ hàng */
			$('.add_to_cart').click(function(){
				var _this=$(this);
				var product_id = $(this).attr('data-productid');
				var number_product=1;
				url = '{{url()}}ajaxs/product/add_cart.php';
				$.ajax({
					type: "POST",
					url: url,
					data: {
						'product_id':product_id,
						'number_product':number_product
					},
					success: function(res){
						$('#count_item_pr').html(parseInt(res));
						$('#notification').fadeIn('slow').html("Thêm mới sản phẩm vào giỏ hàng thành công!");
						window.setTimeout(function(){
							$('#notification').fadeOut('slow');
						},1500);
						loadCart();
					}
				});
				return false;
			});

			$('#btn_buy_now').click(function(){
				var _this=$(this);
				var product_id = $(this).attr('data-productid');
				var number_product=1;
				url = '{{url()}}ajaxs/product/add_cart.php';
				$.ajax({
					type: "POST",
					url: url,
					data: {
						'product_id':product_id,
						'number_product':number_product
					},
					success: function(res){
						$('#count_item_pr').html(parseInt(res));
						window.location.href="{{url()}}checkout";
					}
				});
				return false;
			});

			$("#btn_order").click(function(){	
				if(validForm()==true) {
					var url = "{{url()}}ajaxs/product/process_save_order.php";
					$.ajax({
						type: "POST",
						url: url,
						data: $("#frmcontact").serialize(),
						success: function(req){
							console.log(req);
							if(req=="error") showMess("Lỗi trong quá trình lưu dữ liệu!","error");
							else if(req==="success") {
								showMess("Đơn đặt hàng đã được đặt thành công, chúng tôi sẽ phải hồi lại bạn trong thời gian sớm nhất. Xin cảm ơn",""); 
								setTimeout(function(){ 
									window.location.reload(); 
								}, 3000);
							}
							else if(req==="empty") {
								showMess("Bạn chưa chọn sản phẩm nào","error");
							}
						}
					});
				} return false;
			})
		});

		function showLoading() {
			$(".loading").show();
		}
		function hideLoading() {
			$(".loading").hide();
		}

		function showMess(mess,type){
			var _title='';
			var _html="";
			switch(type){
				case 'error': 
				_title="<span>Lỗi</span>"; 
				_html="<p class='alert alert-danger'>"+mess+"</p>";
				break;
				case 'alert': 
				_title="<span>Cảnh báo</span>"; 
				_html="<p class='alert alert-warning'>"+mess+"</p>";
				break;
				default:  
				_title="<span>Thông báo</span>"; 
				_html="<p class='alert alert-info'>"+mess+"</p>";	
				break;
			}
			$('#myModalPopup .modal-dialog').removeClass('modal-sm');
			$('#myModalPopup .modal-dialog').removeClass('modal-lg');
			$('#myModalPopup .modal-dialog').addClass('modal-sm');
			$('#myModalPopup .modal-header .modal-title').html(_title);
			$('#myModalPopup .modal-body').html(_html);
			$('#myModalPopup').modal('show');
		}

		function loadCart(){
			var _url = '{{url()}}ajaxs/product/loadCart.php';
			$.post(_url, {}, function(res){
				$('#cart_body').html(res);
			});
		}

		function truSP(pro_id){
			var result = document.getElementById("qtyItem"+pro_id); 
			var qtyItem = result.value; 
			if( !isNaN( qtyItem ) && qtyItem > 1 ){
				qtyItem--;
				result.value = qtyItem;
				/* Update SESSION CART */
				updateCart(pro_id, qtyItem);
			}
			return false;
		}

		function congSP(pro_id){
			var result = document.getElementById("qtyItem"+pro_id); 
			var qtyItem = result.value; 
			if( !isNaN( qtyItem)) {
				qtyItem++;
				result.value = qtyItem;
				/* Update SESSION CART */
				updateCart(pro_id, qtyItem);
			}
			return false;
		}

		function updateCart(pro_id, number){
			var pro_id = parseInt(pro_id);
			var number = parseInt(number);
			var _url = '{{url()}}ajaxs/product/updateCart.php';
			$.post(_url, {'pro_id': pro_id, 'number': number}, function(res){
				let total_price = parseInt(res) > 0 ? res + ' ₫' : '0 ₫';
				$('#cart_body .cart-footer .total-price').html(total_price);
			});
		}

		function removeItemCart(e){
			if(confirm('Bạn có chắc muốn xóa sản phẩm này?')){
				var _pro_id = e.getAttribute('data-id');
				updateCart(_pro_id, 0);
				var list_product = document.getElementsByClassName("cart_product");
				for (var i = 0; i < list_product.length; i++) {
					let id = list_product.item(i).getAttribute('data-id');
					if(_pro_id == id) list_product.item(i).remove();
				}
			}
		}

		function validForm(){
			var flag = true;
			$('#frmcontact .required').each(function(){
				var val = $(this).val();
				if(!val || val=='' || val=='0') {
					$(this).parents('.form-group').addClass('error');
					flag = false;
				}

				if(flag==false) {
					$('#message').html('Những mục có đánh dấu * là những thông tin bắt buộc.');
				}
			});
			return flag;
		}

		function removeProduct(e){
			if(confirm('Bạn có chắc muốn xóa sản phẩm này?')){
				var _pro_id = e.getAttribute('data-id');
				var tr_parent = e.parentElement.parentElement;
				tr_parent.remove();
				updateCart(_pro_id, 0);
			}
		}
	</script> --}}
</body>
</html>