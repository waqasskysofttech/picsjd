@extends('layouts.main')
@section('content')
<!-- MAIN-SLIDER START -->

<section class="banner-section">
        <div class="banner-img">
            <img src="{{asset($banner->img_path)}}" alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'MERCHANDISE DETAILS','MERCHDETTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->


    <!-- SHOP-DETAIL-PAGE START -->

    <section class="shop-detail-sec pc-p-6">
        <div class="container">
            <div class="row mc-b-4">
                <div class="col-lg-6 col-12">
                    <div class="for-slider mc-b-1">
                        @foreach($merchandise->merchandiseHasMultiImages as $p)
                     
                        <div class="items mc-1">
                            <img src="{{asset($p->img_path)}}" alt="shop-detail-1">
                        </div>
                        @endforeach
                       
                    </div>
                    <div class="nav-slider">
                    @foreach($merchandise->merchandiseHasMultiImages as $p)
                        <div class="items mc-1">
                            <img src="{{asset($p->img_path)}}" alt="product-1">
                        </div>
                        @endforeach
                       
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="product-detail-content">
                        <h3 class="mc-b-1">{{ucfirst($merchandise->name)}}</h3>
                        <div class="review-wrapper d-flex align-items-center mc-b-2">
                            <!-- <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                            </ul> -->
                            <?php $count = App\Models\Review::where('item_id',$merchandise->id)->where('type',2)->count();?>
                            <span class="color-primary">({{$count >= 1 ? $count.' '.'reviews' : 'No Reviews Yet'}})</span>
                        </div>
                        <h4 class=" mc-b-2">${{$merchandise->price}}</h4>
                      
                       <?php echo html_entity_decode($merchandise->short_desc)?>
                        <div class="row align-items-center mc-b-3">
                            <div class="col-md-3 col-xs-12">
                                <div class="num-block skin-1">
                                <div class="input-group">
                                <!-- <span class="input-group-btn">
                                    <button type="button" id="minus" class="quantity-left-minus btn  btn-number" data-type="minus" data-field="">
                                      <span class="glyphicon glyphicon-minus"></span>
                                    </button>
                                </span> -->
                                <form id="cart-form" action="{{route('save-cart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" id="productid">
                                <input type="hidden" name="quantity" id="qty">
                                <input type="hidden" name="type" value="2">
                                </form>
                                <input type="number" id="quantity" name="quantity_selected" class="form-control input-number" value="1" min="1" max="{{ $merchandise->qty }}">
                                <!-- <span class="input-group-btn">
                                    <button type="button" id="plus" class="quantity-right-plus btn btn-number" data-type="plus" data-field="">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </span> -->
                               
                              </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-xs-12">
                                <a href="javascript:void(0)" id="cart-btn" class="primary-btn primary-bg" data-id="{{$merchandise->id}}">Add To Cart</a>
                                <!--<a href="#" class="wishlist-btn"><i class="fa fa-heart-o"></i></a>-->
                            </div>
                        </div>
                        <div class="product-detail-list">
                            <div class="product-detail-list-item">
                                <p>Availability:</p>
                                @if($merchandise->qty > 0)
                                <span>In Stock</span>
                                @else
                                <span>Out of Stock</span>
                                @endif

                            </div>
                            <div class="product-detail-list-item">
                                <p>Dimension:</p>
                                <span>W {{$merchandise->width}}” D {{$merchandise->depth}}” H {{$merchandise->height}}”</span>
                            </div>
                            <div class="product-detail-list-item">
                                <p>Weight:</p>
                                <span>{{$merchandise->weight_pound}} lbs. ({{$merchandise->weight_kg}} kgs.)</span>
                            </div>
                            <div class="product-detail-list-item">
                                <p>Share on:</p>
                                <span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mc-b-4">
                <div class="col-lg-12 col-12">
                    <div class="shop-detail-tabs">
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false">Information</a>
                            <a class="nav-item nav-link" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Review</a>
                        </div>
                        <div class="tab-content mc-b-5">
                            <div class="tab-pane active show fade" id="description" role="tabpanel">
                                <div class="primary-heading color-dark">
                                <?php echo html_entity_decode($merchandise->long_desc)?>
                                        <?php App\Helpers\Helper::inlineEditable("h2",["class"=>"mc-b-2"],'MERCHANDISE 2021/22','MERCHDETTXT2');?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="information" role="tabpanel">
                                <div class="primary-heading color-dark">
                                <?php echo html_entity_decode($merchandise->info_desc)?>
                                       
                                </div>

                            </div>
                            <div class="tab-pane fade" id="review" role="tabpanel">
                                <div class="primary-heading color-dark">
                                <?php App\Helpers\Helper::inlineEditable("h4",["class"=>"mc-b-2"],'Merchandise Reviews','MERCHDETTXT3');?>
                                <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Write a Review','MERCHDETTXT4');?>
                               
                                @foreach($reviews as $review)
                                <div class="review-box">
                                    <div class="d-flex align-items-center">
                                        <h5 class="mc-b-1">{{$review->name}}</h5>
                                        <ul class="list-inline mc-l-2">
                                            @for ($i = 0; $i < $review->rating; $i++)
                                            <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <p>{{$review->review}}</p>
                                </div>
                                @endforeach
                                       
                                </div>
                                <div class="main-form">
                                <form id="add-record-form" >
                                @csrf
                                    <div class="row">
                                       
                                       <input type="hidden" name="type" value="{{$merchandise->type}}">
                                       <input type="hidden" name="item_id" value="{{$merchandise->id}}">
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <input type="text" name="name" required class="form-control" placeholder="Name">
                                               @if ($errors->has('name'))
                                                    <span class="error">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <input type="email" name="email" required class="form-control" placeholder="Email Address">
                                               @if ($errors->has('email'))
                                                    <span class="error">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                       </div>
                                       <div class="col-lg-6">
                                           <div class="form-group">
                                               <input type="text" name="phone" required class="form-control" placeholder="Phone Number">
                                               @if ($errors->has('phone'))
                                                    <span class="error">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                       </div>
                                       <div class="col-lg-6">
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
                                       </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="review" required placeholder="Write here.." rows="5"></textarea>
                                                @if ($errors->has('review'))
                                                    <span class="error">{{ $errors->first('review') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mc-t-2">
                                                <button id="add-record" type="button" class="primary-btn primary-bg">Submit Response</button>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                </div>
            </div>
            </div>
        </section>
        
        
        
        
          <section class="sec-shop">
            <div class="shop-main pdy-40">
                    <div class="container">
                    <div class="row">
                        @foreach($merchandises as $m)
   
               
               <div class="col-lg-3">
                    <div class="product-sec text-center ">
                        <div class="j-shirt pdy-30">
                            <div class="js-img">
                                <img src="{{asset($m->merchandiseHasMainImage[0]->img_path)}}" alt="">
                
                            </div>
                
                            <div class="product-shop-content">
    <ul>
        <li>{{ucfirst($m->name)}}</li>
        <li>${{$m->price}}</li>
    </ul>
    
                                

                                

                            </div>
                        </div>
                        <div class="js-btn">
                            <a href="#" class="btn btn-pri" tabindex="0">Buy Now</a>
                        </div>
                    </div>
               </div>
               
                        @endforeach

                
               </div>
                    
               </div>
           </div>
        </section>
 
            
              
            
      
    <!-- SHOP-DETAIL-PAGE END -->
  
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
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
  $('.for-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.nav-slider',
        arrows: false,
        dots: false,
    });
    $('.nav-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.for-slider',
        focusOnSelect: true
    });
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
@endsection