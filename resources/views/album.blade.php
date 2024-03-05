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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Album','ALBUMTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->
    <!-- Our Sponsors start -->
    <section class="Sponsor-sec pdy-30">
        <div class="container">
      
            <div class="gallery">
            @foreach($albums->albumHasPhotos as $photo)
            
                <figure class="gallery__item gallery__item--{{$loop->iteration}}">
                    <a href="{{asset($photo->img_path)}}" title="{{$photo->name}}" data-fancybox="gallery"> <img src="{{asset($photo->img_path)}}" alt="Gallery image 1" class="gallery__img"></a>
                </figure>
                @endforeach   
                
               

            </div>


        </div>
    </section>
    <!-- Our Sponsors end -->

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<!-- <script src="{{asset('js/calendar.js')}}"></script> -->
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection