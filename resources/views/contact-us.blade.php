@extends('layouts.main')
@section('content')
 <!-- MAIN-SLIDER START -->

<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid nofotomoto">
    </div>
    <div class="pagetitle__content">
 
        <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Contact Us','CONTACTHEADMAIN');?>

    </div>
</div>

<!-- Contact Us -->
<div class="contactUs">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <form action="{{route('contact-us-submit')}}" method="post" class="contactUs__form">
                    @csrf
                   
                    <label for="name">Your Name</label>
                    <input name="fullname" type="text" id="name">
                    <label for="email">E-mail</label>
                    <input name="email" type="email" id="email">
                    <label  for="message">Your Message</label>
                    <input name="message" type="text" id="message">
                    <button href="#" class="themeBtn">Send Message</button>
                </form>
            </div>
            <div class="col-12 col-lg-6">
                <div class="contactUs__content">
                    <div class="socialLinks">
                        <h5>Socials</h5>
                        <a href="{{$config['FACEBOOK']}}" class="ml-0"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="{{$config['INSTAGRAM']}}"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{$config['PINTEREST']}}"><i class="fa-brands fa-pinterest-p"></i></a>
                        <a href="{{$config['LINKDIN']}}"><i class="fa-brands fa-linkedin-in"></i></a>
                    </div>
                    <div class="contactLinks">
                        <h5>Phone</h5>
                        <a href="tel:{{$config['COMPANYPHONE']}}">{{$config['COMPANYPHONE']}}</a>
                        <h5 class="mt-5">Address</h5>
                        <p>{{$config['COMPANYADDRESS']}}</p>
                    </div>
                    <div class="openingHours">
                        <h5>Opening Hours</h5>
                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'10:00 AM to 5:00 PM','OPENINGHOURSTXT');?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contactMap">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d17773853.57450565!2d-110.10075922079372!3d41.655483255850314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2ski!4v1706289385129!5m2!1sen!2ski" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
  /*in page css here*/
})()
</script>
@endsection
