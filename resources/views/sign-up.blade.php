@extends('layouts.main')
@section('content')
 <!-- MAIN-SLIDER START -->


    <!-- MAIN-SLIDER END -->

    <!-- LOGIN-SEC START -->

    <section class="login-sec  padding-top pc-p-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12 col-center">
                <div class="log-sign">
                    <div class="primary-heading color-dark text-center mc-b-4">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],'Sign Up','SIGNUPTXT2');?>
                    </div>

                    <form id="contact-form" method="POST" action="{{route('sign-up')}}" class="main-form">
                    @csrf
                        <div class="form-group">
                            <label>Name <span>*</span></label>
                            <input type="text" id="fullname" name="fullname" value="{{old('fullname')}}" required class="form-control" placeholder="Full Name">
                                @if ($errors->has('fullname'))
                                        <span class="text-danger">{{ $errors->first('fullname') }}</span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <label>Email Address <span>*</span></label>
                            <input type="email" id="email" name="email" value="{{old('email')}}" required  class="form-control" placeholder="Email">
                                @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <label>Password <span>*</span></label>
                            <input type="password" id="password" name="password" required class="form-control"  placeholder="Password">
                                @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <label>Password <span>*</span></label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required class="form-control"  placeholder="Password Confirmation">
                                @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                        </div>
                        <div class="d-flex align-items-center justify-content-between remember-wrapper mc-b-2">
                           
                            <a href="{{route('forget.password.get')}}">Fogot your Password?</a>
                        </div>
                        <button type="submit"  class="primary-btn primary-bg lg-btn text-uppercase themeBtn">Sign Up</button>
                        <a href="{{route('sign-in')}}" class="mc-t-2 text-center d-block color-primary a-link">Already have an Account ? Sign In</a>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section>

    <!-- LOGIN-SEC END -->
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
    .img-fluid {
    max-width: 113px;
    height: 113px;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
    //  function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         console.log('sad');
    //         var reader = new FileReader();
            
    //         reader.onload = function (e) {
    //             $('.user-details-img')
    //                 .attr('src', e.target.result);
    //                 console.log(e.target.result);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
(()=>{
  /*in page css here*/
//   $('.signup').click(function(e)
//   {
//     if($("#user-update").val() != "")
//     {
     
//     }
//     else{
//         e.preventDefault();
//         $.toast({
// 					heading: 'Error!',
// 					position: 'bottom-right',
// 					text:  'Please Attach Profile Image!',
// 					loaderBg: '#ff6849',
// 					icon: 'error',
// 					hideAfter: 4000,
// 					stack: 6
// 				});
//            }

//   });
})()
</script>
@endsection
