@extends('layouts.main')
@section('content')


<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
       <img src="{{asset('Uploads/banners/181183035811414/sr4ZysCB9o2mC2MoIcCNe9psdLYqqNleNXBZiC6r.jpg')}}" alt="image" class="imgFluid nofotomoto">
    </div>
    <div class="pagetitle__content">
     
     <h2>{{$title->name}}</h2>
     
    </div>

</div>



     <!-- Category Section Start -->
    <section class="category-sec gal-page">
        <div class="container">
            <div class="row">
                @foreach($photos as $value)
                
                    <div class="col-lg-4">
                    <div class="category-img">
                        <a href="{{asset('images/blogs-card-img-1.png')}}" data-fancybox="gallery" data-caption="Image 1">
                            <img src="{{asset($value->img_path)}}" alt="img">
                        </a>
                    </div>
                </div>
                @endforeach
                {{--<div class="col-lg-4">
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
                </div>--}}
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