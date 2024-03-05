@extends('layouts.main')
@section('content')
 
<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid">
    </div>
    <div class="pagetitle__content">
        <h2>Cart</h3>
    </div>
</div>

<!-- Cart -->
<div class="container cart">
    <div class="row justify-content-center">
    @if(Session::has('cart') && !empty(Session::get('cart')))
        <div class="col-12 col-lg-8 wow fadeInUp">
            <div class="row">
               
            
            
                    <div class="col-12">
                    <?php $cart = Session::get('cart');
                    // dd(Session::get('cart')); 
                    ?>
                    <?php $total = 0; ?>
                    @foreach($cart as $k => $v) 

                    <div class="cart__product">
                        <div class="cart__productImg">
                            <img src="{{asset($v['image'])}}" alt="Product Image" />
                        </div>
                        <div class="cart__productContent">
                            <div>
                                <div class="cart__productDescription">
                                    <h4>{{ $v['name']}}</h4>
                                 
                                    <p>SKU # {{ $v['sku']}}</p>
                                </div>
                                <div class="cart__productQuantity">
                             
                                    
                                    <input type="hidden" id="stock_qty" name="stock_qty" value="{{$v['stock_qty']}}">
                                        <input type="text" id="update-qty" name="qty" class="in-num" value="{{ $v['quantity_selected'] }}" >                     
                                       
                                   <div class="cart-update">

                                       <a href="javascript:void(0)" data-id="{{ $k }}" class="update">Update Cart</a>
                                   </div>

                                    
                                </div>
                            </div>
                            <div>
                                <div class="cart__productOptions">
                                    <a data-id="{{ $k }}" class="cart-delete">
                                        
                                        <i class="fa fa-trash"></i> Remove from Cart
                                    </a>
                                    <button>
                                        <i class="fa fa-heart"></i> Move to Wishlist
                                    </button>
                                </div>
                                <span class="cart__productPrice">&dollar;{{ number_format($v['sale_price'],2)}}</span>
                            </div>
                        </div>
                    </div>

                    <?php
						$total += $v['sub_total'];
					?>
                       @endforeach
                </div>
            
            </div>
        </div>

      
     
        <div class="col-12 col-lg-4 wow zoomIn">
            <div class="cart__summary">
                <h4>Cart Summary</h4>
                <div>
                    <span>Sub Total</span>
                    <span>&dollar;{{number_format($total,2)}}</span>
                </div>
                <div>
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
             
                <div class="cart__summaryTotal">
                    <span>Total</span>
                    <span>&dollar;{{number_format($total,2)}}</span>
                </div>
                <a href="{{route('checkout')}}">Proceed to Checkout</a>
            </div>
        </div>
    
        @else
    
    <section class="cart-page pc-p-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Cart Is Empty!</h3>
                    <li class="list-inline-item"><i class="fa fa-shopping-basket"></i>
                    <a href="{{route('home')}}" class="themeBtn" tabindex="-1">Shopping Continue</a>
                </div>
            </div>
        </div>
        </section>
    @endif
    </div>

 
</div>

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
    
    // $('#proceed-btn').click(function(){
    //    @if(Auth::check()) 
    //     window.location = "{{route('checkout')}}";
    //     @else
    //     $.toast({
    //             heading: 'Error!',
    //             position: 'bottom-right',
    //             text:  'Please Login First!',
    //             loaderBg: '#ff6849',
    //             icon: 'error',
    //             hideAfter: 2000,
    //             stack: 6
    //         });
            
    //         setInterval(() => {
    //              window.location = "{{route('sign-in')}}"
    //           }, 2000);    
    //     @endif
       
    // });

    $('.update').click(function ()
		{
			var id = $(this).data("id");
            var qt = parseInt($(this).closest("div.cart__productQuantity").find("input[name='qty']").val());
            console.log(qt);
                    if(qt <= 0){
                        qt = 1;
                    }
            
            var stock =  parseInt($(this).closest("div.cart__productQuantity").find("input[name='stock_qty']").val());
            
           
            if(qt > stock)
            {
                    $.toast({
                        heading: 'Error!',
                        position: 'bottom-right',
                        text:  'Quantity Must be less than or equals to ' + stock,
                        loaderBg: '#ff6849',
                        icon: 'error',
                        hideAfter: 2000,
                        stack: 6
                    });
            }
            else{

                qt = parseInt(qt);
                    var token = $('meta[name="csrf-token"]').attr("content");

                    var url = '{{ url('update-cart') }}';
                    $.ajax({
                        url: url,
                        type: 'post',
                        data: {rowid: id, qty:qt, _token:token},
                        success: function(){
                            $.toast({
                                heading: 'Success!',
                                position: 'bottom-right',
                                text:  'Quantity Updated',
                                loaderBg: '#ff6849',
                                icon: 'success',
                                hideAfter: 2000,
                                stack: 6
                            });
                                    //console.log('her');
                      setInterval(() => {
                        location.reload();
                      }, 2000);
                                    
                    return false;
                        },
                        // On fail
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                        }
                    });
            }
                });

                // Remove Cart
		$('.cart-delete').click(function () {
			var id = $(this).data('id');
			var token = $('meta[name="csrf-token"]').attr("content");
			var url = '{{ url('remove-cart') }}';
			$.ajax({
				url: url,
				type: 'post',
				data: {rowid: id, _token: token},
				success: function () {
					$.toast({
						heading: 'Success!',
						position: 'bottom-right',
						text:  'Item removed!',
						loaderBg: '#ff6849',
						icon: 'success',
						hideAfter: 3000,
						stack: 6
					});
                    setInterval(() => {
                        location.reload();
                      }, 2900);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(textStatus, errorThrown);
				}
			});
		});

})()
</script>
@endsection