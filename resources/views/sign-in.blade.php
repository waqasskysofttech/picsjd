@extends('layouts.main')
@section('content')
 <!-- MAIN-SLIDER START -->


    <!-- MAIN-SLIDER END -->



    <!-- LOGIN-SEC START -->

    <section class="login-sec padding-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-12 col-center">
            <div class="log-sign">
                    <div class="primary-heading color-dark text-center mc-b-4">
                        <?php App\Helpers\Helper::inlineEditable("h3",["class"=>""],'Login','LOGINTXT2');?>
                    </div>

                    <form id="contact-form" method="POST" action="{{route('sign-in-submit')}}" class="main-form">
                        @csrf
                        <div class="form-group">
                            <label>Email address <span>*</span></label>
                            <input type="email" id="email" required name="email" value="{{old('email')}}" class="form-control"
                                            placeholder="Email">
                                            @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                        </div>
                        <div class="form-group">
                            <label>Password <span>*</span></label>
                            <input type="password" id="password" required name="password" class="form-control"
                                            placeholder="Password">
                                            @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                        </div>
                        <div class="d-flex align-items-center justify-content-between remember-wrapper mc-b-2">
                           
                            <a href="{{route('forget.password.get')}}">Fogot your Password?</a>
                        </div>
                        <button type="submit" class="primary-btn primary-bg lg-btn text-uppercase themeBtn">Sign In</button>
                        <a href="{{route('sign-up')}}" class="mc-t-2 text-center d-block color-primary a-link">Don't have an Account ? Sign Up</a>
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
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
