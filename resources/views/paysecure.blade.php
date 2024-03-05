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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Payment','PAYSECURETXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
 <section class="checkout-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">

                <div class="account-wrapper">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span></span>
                                        Pay with credit/debit card
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show fade" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                      <div id="paypal-button-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-summary-section shipping-section">
                  <div class="table-responsive">
                    <table class="table order-summary-table shipping-table">
                        <thead>
                          <tr>
                            <th scope="row" colspan="3">
                              Order Summary
                            </th>
                          </tr>
                        </thead>   
                        <tbody>
                           <tr class="checkout-item-label">
                              <td colspan="2">
                                <a id="checkout-toggle" href="#" onclick="$('#checkout-item-box').slideToggle(500);">1 Item in Cart <i class="fa fa-angle-down float-right" aria-hidden="true"></i></a>
                              </td>
                           </tr> 
                           <tr id="checkout-item-box">
                            
                               @if(!empty($itemsss)) 
                                <?php $total = 0;?>
                                    @foreach($itemsss as $key => $value)
                                
                            
                             <tr class="checkout-item">
                               <td class="checkout-product-image"><img src="{{ asset($value['image'])}}" class="img-responsive lazyload" alt="Product Image"></td>
                               <td colspan="3">
                                 <div class="checkout-item-detail">
                                   <p>{{$value['name']}}</p> 
                                   <span>Qty : {{$value['quantity']}}</span>
                                   <span> ${{$value['price'] * $value['quantity']}}</span>
                                 </div>
                                </td>
                             </tr>
                                <?php $total += $value['price'];?>
                              @endforeach
                            @endif
                            </tr>
                           <tr class="order-summary-detail border-top">
                              <td>Subtotal</td>
                              <td>${{$total}}</td>
                           </tr>
                           <tr class="order-total">
                              <td>Total</td>
                              <td class="get_total">${{$total}}</td>
                            </tr>
                        </tbody>                
                    </table>
                  </div>
                </div>
              </div>
        </div>
    </div>
</section>
                       
    
        
  <script src="https://www.paypalobjects.com/api/checkout.js"></script>
<!-- Paypal script start -->
<script>


    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout',
            size: 'responsive', // small | medium | large | responsive
            shape: 'rect',  // pill | rect
            color: 'blue'    // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox: 'AUmHB_5SuVcp75BKtDpmELANcg1XmEvFG8SvvuYQa-cngWOXSSmRfXBnt15_TGkcJtpsnFjMBzpxzE6F',
            production: 'AUmHB_5SuVcp75BKtDpmELANcg1XmEvFG8SvvuYQa-cngWOXSSmRfXBnt15_TGkcJtpsnFjMBzpxzE6F'
        },

        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: '{{$amount}}',
                        currency: 'USD',
                        //currency: 'GBP',
                        details: {
                            subtotal: '{{$amount}}',
                           
                            shipping: '0.00',
                            handling_fee: '0.00',
                            shipping_discount: '0.00',
                            insurance: '0.00'
                        }
                    },

                    description: 'The payment transaction description.',
                    custom: '{{$order_id}}',
                    //invoice_number: '12345', Insert a unique invoice number

                    payment_options: {
                        allowed_payment_method: 'INSTANT_FUNDING_SOURCE'
                    },

                    soft_descriptor: 'Grovecityhockeyllc',
                    // item_list: {
                    //     items: <?php echo json_encode($itemsss); ?>,
                    //     // shipping_address: {
                    //     //   recipient_name: '<?=$orders['fname']?>',
                    //     //   line1: '',
                    //     //   line2: '',
                    //     //   city: '',
                    //     //   country_code: 'US',
                    //     //   postal_code: '',
                    //     //   phone: '',
                    //     //   state: '',
                    //     //   email: '<?=$orders['email']?>'
                    //     // }
                    // }

                }],

                note_to_payer: 'Contact us for any questions on your order.'

            });

        },

        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
                // AdminToastr.success('Your Payment has been Charged Successfully', 'Payment Success');
               
                // console.log(data);
                // console.log(actions);

                // return false;

                var EXECUTE_URL = "{{route('paystatus')}}";

                var params = {
                    payment_status: 'Completed',
                    custom: '{{$custom}}',// ORDER ID,
                    paymentID: data.paymentID,
                    payerID: data.payerID
                };

                if (paypal.request.post(EXECUTE_URL, params)) {
                    // return false;
                    if (params.payment_status == 'Completed') {

                        $.toast({
                            heading: 'Success!',
                            position: 'bottom-right',
                            text:  'Your Payment has been Charged Successfully',
                            loaderBg: '#ff6849',
                            icon: 'success',
                            hideAfter: 2000,
                            stack: 6
                        });
                        // console.log(data);
                        setInterval(function () {
                            window.location = "{{route('checkout_landing')}}";
                        }, 2000);
                    } else {
                        // console.log
                        $.toast({
                            heading: 'Error!',
                            position: 'bottom-right',
                            text:  'Payment Failed',
                            loaderBg: '#ff6849',
                            icon: 'error',
                            hideAfter: 2000,
                            stack: 6
                        });

                        // AdminToastr.error('Error', 'Payment Failed');
                    }
                }
            }).catch(function (error) {
                // console.log(error);
                // AdminToastr.error('Error', 'Payment Failed');
             
                $.toast({
				heading: 'Error!',
				position: 'bottom-right',
				text:  'Payment Failed',
				loaderBg: '#ff6849',
				icon: 'error',
				hideAfter: 2000,
				stack: 6
			});
            });
        },

        validate: function (actions) {},

        onCancel: function (data, actions) {
            // AdminToastr.error('Some Error occured', 'Error');
            $.toast({
				heading: 'Error!',
				position: 'bottom-right',
				text:  'Some Error occured',
				loaderBg: '#ff6849',
				icon: 'error',
				hideAfter: 2000,
				stack: 6
			});
            var EXECUTE_URL = "{{route('paystatus')}}";
            var params = {
                payment_status: 'Failed',
                custom: '<?=$custom; // ORDER ID?>',
                paymentID: data.paymentID
            };
            if (paypal.request.post(EXECUTE_URL, params)) {}
        },

        onError: function (data) {
            // AdminToastr.error('Error', 'Payment Failed');
            $.toast({
				heading: 'Error!',
				position: 'bottom-right',
				text:  'Payment Failed',
				loaderBg: '#ff6849',
				icon: 'error',
				hideAfter: 2000,
				stack: 6
			});
            // console.debug(data);
        }
    }, '#paypal-button-container');

</script>
<!-- Paypal script end -->
                          
                       

@endsection
@section('css')
<style type="text/css">
 
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{

})()
</script>
@endsection