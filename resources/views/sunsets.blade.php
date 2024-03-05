@extends('layouts.main')
@section('content')


<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid">
    </div>
    <div class="pagetitle__content">
     <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Beach','ABOUTTXT1');?>
    </div>

</div>



     <!-- Category Section Start -->
    <section class="category-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="category-img">
                        <a href="{{asset('images/blogs-card-img-1.png')}}" data-fancybox="gallery" data-caption="Image 1">
                            <img src="{{asset('images/blogs-card-img-1.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="category-img">
                        <a href="{{asset('images/blogs-card-img-2.png')}}" data-fancybox="gallery" data-caption="Image 2">
                            <img src="{{asset('images/blogs-card-img-2.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="category-img">
                        <a href="{{asset('images/blogs-card-img-3.png')}}" data-fancybox="gallery" data-caption="Image 3">
                            <img src="{{asset('images/blogs-card-img-3.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->












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