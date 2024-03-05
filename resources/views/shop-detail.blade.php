@extends('layouts.main')
@section('content')

<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset('images/pagetitle-img.jpg')}}" alt="image" class="imgFluid">
    </div>
    <div class="pagetitle__content">
        <h2>Single Product</h3>
    </div>
</div>

<!-- Single Product -->
<div class="container wow zoomIn">
    <div class="singleProduct">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-5 offset-lg-1">
                <div class="singleProduct__img">
                    @foreach($product->productsHasMultiImages as $g)
                    <img src="{{asset($g->img_path)}}" alt="product" class="imgFluid" />
                @endforeach
                </div>
                <ul class="singleProduct__pictures">
                @foreach($product->productsHasMultiImages as $g)  
                    <li>
                        <img src="{{asset($g->img_path)}}" alt="product" class="imgFluid" />
                    </li>
                    @endforeach
                  
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-5">
                <div class="singleProduct__content">
                    <h5 class="singleProduct__contentSubtitle">Lorem</h5>
                    <h4 class="singleProduct__contentTitle">{{$product->name}}</h4>
                    <p class="singleProduct__contentDescription">
                        <?php
                        echo html_entity_decode($product->short_desc)
                        ?>
                    </p>
                    <?php $avg = App\Models\Review::where('item_id',$product->id)->where('is_active',1)->avg('rating');
                    
                    $sstr = round($avg);
                
                    // echo $sstr;
                    $str = intval($sstr);
                    // dd($str);
                    $remainig = 5 - $str;
                    ?>
                    <div class="singleProduct__review">
                        
                        <div>
                            <?php
                                for ($i=1; $i <= $str; $i++) { 
                            ?>
                                <i class="fas fa-star"></i>
                            <?php
                                }
                                if($remainig > 0)
                                {
                                    for ($i=1; $i <= $remainig; $i++) { 
                            ?>
                                <i class="far fa-star"></i>
                            <?php
                                }
                            }
                            ?>
                            
                        </div>
                        <span>
                        <?php $count = App\Models\Review::where('item_id',$product->id)->where('is_active',1)->count();?>
                          
                            <a href="#reviews">{{$count >= 1 ? $count.' '.'Reviews' : 'No Reviews Yet'}}</a> &#8226;
                            <a href="#reviews">Write a Review</a>
                        </span>
                    </div>
                    <ul class="singleProduct__info">
                        <li>
                            <p>SKU</p>
                            <p>{{$product->sku}}</p>
                        </li>
                        <li>
                            <p>Category</p>
                            <p>{{$product->productBelongsToCategory->title}}</p>
                        </li>
                        <li>
                            <p>Availability</p>
                           
                            <?php
                            if($product->qty > 0){
                               ?> 
                            <p>Available</p>
                         <?php
                            }else{
                            ?>

                            <p>Out of Stock</p>
                            <?php
                            }
                            ?>

                        </li>
                    </ul>
                    <div class="singleProduct__price">
                        <ins>&dollar;{{number_format($product->sale_price,2)}}</ins>
                        <del>&dollar;{{number_format($product->price,2)}}</del>
                    </div>

                    <form id="cart-form" action="{{route('save-cart')}}" method="POST">
                                @csrf
                    <input type="hidden" name="product_id" id="productid">
                    <input type="hidden" name="quantity" id="qty">

                    </form>
                    <div class="singleProduct__quantity">
                        <p>Quantity</p>
                        <div>
                            <div class="singleProduct__quantityCounter">
                                
                                <button><i class="fas fa-minus"></i></button>
                                <input type="number" id="quantity" name="quantity_selected" class="form-control input-number" value="1" min="1" max="{{ $product->qty }}">
                                <button><i class="fas fa-plus"></i></button>
                            </div>
                            <a href="javascript:void(0)" id="cart-btn" data-id="{{$product->id}}" class="themeBtn"><i class="bx bx-cart-alt bx-sm"></i> Add to Cart</a>
                        </div>
                        <a href="cart.php" class="themeBtn">Buy It Now</a>
                        <ul>
                            <li>
                                <form action="{{route('add.to.wishlist')}}" id="form-wishlist" method="post">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    @csrf
                                <button type="button" class="myheart"><i class="far fa-heart"></i> Add to wishlist</button>
                                </form>
                            </li>
                           
                        </ul>
                    </div>
                    <ul class="singleProduct__social">
                        <li>Share this Product:</li>
                        <li>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="singleProduct__reviews" id="reviews">
                    <h2>Reviews (<span>{{$count >= 1 ? $count  : 'No Reviews Yet'}}</span>)</h2>
                    <ul>
                    @foreach($reviews as $review)
                        <li>
                            <h4>{{$review->name}}</h4> 
                            
                            <span><i class="far fa-calendar-alt"></i> {{ $review->created_at->format('M')}} , {{ $review->created_at->format('Y') }}</span>
                            
                            @for ($i = 0; $i < $review->rating; $i++)
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            @endfor
                            <p>{{$review->review}}</p>
                        </li>

                        @endforeach

                        
                        <!-- <li>
                            <h4>John Doe</h4>
                            <span><i class="far fa-calendar-alt"></i> November 1, 2021</span>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit, enim. Ut,
                                necessitatibus deleniti quis assumenda provident suscipit facilis sed non illo in
                                recusandae ab alias temporibus quasi eveniet, velit, tempore et rem molestiae
                                laborum sapiente quisquam impedit! Adipisci, nemo et. Alias, facilis aliquid.
                                Architecto reprehenderit, sequi maxime debitis aliquid molestias.</p>
                        </li> -->
                    </ul>
                    <form id="add-record-form">
                    @csrf
                    <input type="hidden" name="item_id" value="{{$product->id}}">
                        <h3>Leave a Comment</h3>
                        <input type="text" name="name" placeholder="Your Name *" required>
                        @if ($errors->has('name'))
                           <span class="error">{{ $errors->first('name') }}</span>
                          @endif
                        <input type="email" name="email" placeholder="Your E-mail *" required>
                        @if ($errors->has('email'))
                             <span class="error">{{ $errors->first('email') }}</span>
                        @endif
                         <div class="start">
                                            <div class="rate">
                                            <input type="radio" id="star5" name="rating[]" value="5">
                                            <label for="star5">5 stars</label>
                                            <input type="radio" id="star4" name="rating[]" value="4">
                                            <label for="star4">4 stars</label>
                                            <input type="radio" id="star3" name="rating[]" value="3">
                                            <label for="star3">3 stars</label>
                                            <input type="radio" id="star2" name="rating[]" value="2">
                                            <label for="star2">2 stars</label>
                                            <input type="radio" id="star1" name="rating[]" value="1">
                                            <label for="star1">1 star</label>
                                            </div>
                                        </div>
                     
                        <textarea rows="5" name="review" placeholder="Your Message *" required></textarea>
                        @if ($errors->has('review'))
                            <span class="error">{{ $errors->first('review') }}</span>
                        @endif
                        <button id="add-record" type="button">Submit</button>
                    </form>
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

    $('.myheart').click(function(e){
        e.preventDefault();
        @if(Auth::check())
        $('#form-wishlist').submit();
        @else
        $.toast({
    				heading: 'Error!',
    				position: 'bottom-right',
    				text:  "Please Login First!",
    				loaderBg: '#ff6849',
    				icon: 'error',
    				hideAfter: 2500,
    				stack: 6
    			});
                setInterval(() => {
                        
                        window.location = "{{route('sign-in')}}";
                    }, 2510);
        @endif
    });
    var Loader = function () {

return {

    show: function () {
        jQuery("#preloader").show();
    },

    hide: function () {
        jQuery("#preloader").hide();
    }
};

}();
  /*in page css here*/

    $('#cart-btn').click(function()
        {
         
            var id = $(this).data("id");
            $('#productid').val(id);
            var qt = parseInt($('#quantity').val());
            var stock = parseInt($('#quantity').attr('max'));
            if(qt > stock)
            {
              generateNotification('0','Quantity Must be less than or equals to ' + stock);
            }
            else{
              $('#qty').val(qt);
              $('#cart-form').submit();
            }
            
         
      });

      $( "#add-record" ).click(function(e) {
    Loader.show();
        // console.log('hhh');
    e.preventDefault();
    // e.preventDefault();
        
      //var data = $(".create_user_form").serialize();
      var data = new FormData(document.getElementById("add-record-form"));
       //console.log(data);
    //   return 0;
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'POST',
    			url:'{{route('user.create-review')}}',
    			data:data,
			    enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
    
                    Loader.hide();
                   
                if(data.status == 1){
                        $.toast({
                        heading: 'Success!',
                        position: 'top-right',
                        text:  data.msg,
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2500,
                        stack: 6
                    });
    
                    $('#add-record-form')[0].reset();
                    setInterval(() => {
                        
                        location.reload();
                    }, 2500);
                     
                    // $("#change-password-modal").modal("hide"); 
                }
    
           
            if(data.status == 2){
                $.toast({
    				heading: 'Error!',
    				position: 'bottom-right',
    				text:  data.error,
    				loaderBg: '#ff6849',
    				icon: 'error',
    				hideAfter: 5000,
    				stack: 6
    			});
            }
            // $('#updatepwd')[0].reset();
    	    }
    
    			});
    });
})()
</script>
<script type="text/javascript">
(()=>{

    })();
</script>
@endsection