@extends('layouts.main')
@section('content')
 
<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid">
    </div>
    <div class="pagetitle__content">
        <h2>Wishlist</h3>
    </div>
</div>

<div class="container cart">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-12 wow fadeInUp">
            <div class="row">
               
    
            <div class="col-12">
            @forelse($wishlist as $value)
            
                    <div class="cart__product">
                        <div class="cart__productImg">
                            <img src="{{asset($value->product_img)}}" alt="Product Image" />
                        </div>
                        <div class="cart__productContent">
                            <div>
                              
                                <div class="cart__productDescription">
                                    <h4>{{$value->product_title}}</h4>
                                    <p>
                                    <?php echo html_entity_decode($value->short_desc) ?>   
                                    </p>
                                    <p> SKU #  {{ $value->sku }} </p>
                                </div>
                              
                            </div>
                            <div>
                                <div class="cart__productOptions">
                                   
                                <form action="{{route('remove.from.wishlist')}}" method="post">
                                    <input type="hidden" name="id" value="{{$value->product_id}}">
                                    @csrf
                                    <button type="submit">
                                        <i class="fa fa-heart"></i> Move to Wishlist
                                    </button>
                                </form>
                                </div>
                                <span class="cart__productPrice">&dollar;{{ number_format($value->sale_price,2)}}</span>
                            </div>
                        </div>
                    </div>
                    @empty
    
                    <section class="cart-page pc-p-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>Wishlist Is Empty!</h3>
                    <li class="list-inline-item"><i class="fa fa-heart"></i>
                    <a href="{{route('home')}}" class="themeBtn" tabindex="-1">Shopping Continue</a>
                </div>
            </div>
        </div>
        </section>
@endforelse
                </div>
               
            </div>
           
        </div>

     
   
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