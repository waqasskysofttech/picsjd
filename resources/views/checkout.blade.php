@extends('layouts.main')
@section('content')

<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset('images/pagetitle-img.jpg')}}" alt="image" class="imgFluid">
    </div>
    <div class="pagetitle__content">
        <h2>Checkout</h3>
    </div>
</div>

<!-- Checkout -->
<div class="container checkout">
        <div class="row">
            <div class="col-12 col-lg-7 wow zoomIn">
            <form method="POST" action="{{route('placeorder')}}">
                    @csrf
                <div class="checkout__billingForm">
                    <h4>Billing Information</h4>
                    <div>
                        <label for="firstName">First Name <span>*</span></label>
                        <input type="text" name="fname" id="firstName" />
                    </div>
                    <div>
                        <label for="lastName">Last Name <span>*</span></label>
                        <input type="text" name="lname" id="lastName" />
                    </div>
                    <div>
                        <label for="email">Email <span>*</span></label>
                        <input type="email" name="email" id="email" />
                    </div>
                    <div>
                        <label for="phone">Phone <span>*</span></label>
                        <input type="text" name="phone" id="phone" />
                    </div>
                    <div>
                        <label for="company">Company (optional)</label>
                        <input type="text" name="company" id="company" />
                    </div>
                    <div>
                        <label for="address">Address <span>*</span></label>
                        <input type="text" name="address" id="address" />
                    </div>
                    <div>
                        <label for="postal">Postal Code <span>*</span></label>
                        <input type="text" name="zip" id="postal" />
                    </div>
                    <div>
                        <label for="city">City</label>
                        <input type="text" name="town" id="city" />
                    </div>

                    <div>
                        <label for="country">Country</label>
                        <select name="country" id="country">
                            <option value="USA">USA</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 wow fadeInUp">
            <?php $num =01; $total =0;?>
                    @foreach($cart_data as $key => $value)
                       
                        <?php
						$total += $value['sub_total'];
                        $num++?>
                       @endforeach

                <div class="checkout__orderOverview">
                    <h4>Order Overview</h4>
                    <div>
                        <span>Sub Total</span>
                        <span>${{number_format($total,2)}}</span>
                    </div>
                    <!-- <div>
                        <span>Discount Vouchers</span>
                        <span>$0.00</span>
                    </div> -->
                    <div>
                        <span>Shipping</span>
                        <span>Free</span>
                    </div>
                    <div class="checkout__orderOverviewTotal">
                        <span>Total</span>
                        <span>${{number_format($total,2)}}</span>
                    </div>
                </div>
                <div class="checkout__paymentMethod">
                    <!-- <h4>Payment Method</h4>
                    <ul class="checkout__paymentMethodRadios">
                        <li>
                            <input type="radio" name="payment" id="cod" />
                            <label for="cod">Cash on delivery</label>
                        </li>
                        <li>
                            <input type="radio" name="payment" id="paypal" />
                            <label for="paypal">Paypal <img src="{{asset('images/paypal.png')}}" alt="" /></label>
                        </li>
                    </ul> -->
                    
                    <?php $num =01; $total =0;?>
                    @foreach($cart_data as $key => $value)
                       
                        <?php
						$total += $value['sub_total'];
                        $num++?>
                       @endforeach
                    <?php $ser=serialize($cart_data);
                            Session::put('ser',$ser);?>
                    <input type="hidden" name="total_amount" value="{{$total}}">
                    <input type="hidden" name="order_amount" value="{{$total}}">
                    <button>Place Your Order</button>
                </div>
            </div>
        </div>
    </form>
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



})()
</script>
@endsection