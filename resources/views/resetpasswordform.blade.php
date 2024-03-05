@extends('layouts.main')
@section('content')
 <!-- MAIN-SLIDER START -->

 <section class="banner-section">
        <div class="banner-img">
            <img src="{{asset('images/banner-sec.jpg')}}" alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                            <h2>Reset Password</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->

    <!-- CONTACT-PAGE START -->

    <section class="contact-page pc-p-6">
        <div class="container">
            <div class="contact-sec-content">
                <div class="row align-items-center">

                    <div class="col-lg-12 ">

                        <div class="primary-heading color-dark mc-b-3 text-center">
                      <h3>Enter Your New Password</h3>
                        </div>
                        <form action="{{route('reset.password.post')}}" method="post" class="main-form">
                            @csrf
                            <div class="row">
                               
                                <div class="col-lg-12 ">
                                    <div class="form-group">
                                        <input name="password" required type="password" class="form-control" placeholder="Your New Password">
                                         @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                        <input name="email" value="{{$reset_email->email}}" required type="hidden" class="form-control" >
                                        <input name="token" value="{{$token}}" required type="hidden" class="form-control"  >
                                    </div>
                                </div>
                              
                                <div class="col-lg-12 text-center">
                                <button type="submit" class="primary-btn primary-bg">Submit</button>
                                </div>

                              
                            </div>
                            </form>

                    </div>
                </div>
               
                           
            </div>
        </div>
    </section>

   
    <!-- CONTACT-PAGE END -->

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
