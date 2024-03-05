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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Thank You','CHECKOUTLANDTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
 <?php 
        Session::forget('cart');
         Session::forget('ser');
         Session::forget('cartId');
         Session::forget('mail_data');
         Session::forget('order_id');
 ?>
                       
                        <section class="cart-page pc-p-6">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h2>Order Placed Successfully</h2>
                                    </div>
                                </div>
                            </div>
                            </section>
                       

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{

})()
</script>
@endsection