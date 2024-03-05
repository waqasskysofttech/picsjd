@extends('layouts.main')
@section('content')

<style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</style>
<!-- Banner -->
<div class="bannerWrapper bannerSlider">

@foreach($banner as $key => $value)

<div class="banner">
        <img src="{{asset($value->img_path)}}" alt="image" class="imgFluid banner__img nofotomoto">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="banner__content">
                        <div class="sectionContent mb-0">
                           <?php echo html_entity_decode($value->headings)?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach 
</div>


<!-- About -->
<div class="about py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="about__img">
                
                <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/about-img-1.png',array("data-width"=>"540","data-height"=>"507","class"=>"imgFluid nofotomoto"),'WELCOMEIMG11'); ?>

                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="about__content">
                    <div class="sectionContent">
                       
                            <?php App\Helpers\Helper::inlineEditable("h6",["class"=>"subHeading"],'About Us','WELCOMESUBHEADTXT2');?>
                        <?php App\Helpers\Helper::inlineEditable("h2",["class"=>"heading"],'J David Marks','WELCOMEHEADTXT2');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam possimus iste aspernatur
                            obcaecati necessitatibus tempora, cum delectus! Nam, eos a.','WELCOMEPARAHTXT2');?>
                    </div>
                    <div class="experience">
                    <?php App\Helpers\Helper::inlineEditable("span",["class"=>""],'25','WELCOMEEXPERIENCETXT2');?>
                        <?php App\Helpers\Helper::inlineEditable("small",["class"=>""],'Years of experience','WELCOMEEXPERIENCETXT3');?>
                    </div>
                    <a href="{{route('photography')}}" class="themeBtn">Explore My Work</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Feature -->
<!--<div class="featured py-5">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <div class="sectionContent text-center">-->
<!--                    <?php App\Helpers\Helper::inlineEditable("h1",["class"=>"heading"],'Featured Photography','WELCOMEFEATUREETXT');?>-->
<!--                </div>-->
<!--            </div>-->
     
<!--            @foreach($products as $value)-->
<!--            <div class="col-12 col-lg-4">-->
<!--                <a href="{{route('product-detail',$value->slug)}}" class="featured__card">-->
<!--                    <div class="featured__cardImg">-->
<!--                        <img src="{{asset($value->productsHasMainImage[0]->img_path)}}" alt="image" class="imgFluid">-->
<!--                    </div>-->
<!--                    <div class="featured__cardContent">-->
<!--                        <h6>{{$value->name}}</h6>-->
<!--                        <div class="price">${{number_format($value->sale_price,2)}}</div>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </div>-->
<!--            @endforeach-->
            
<!--            <div class="col-12">-->
<!--                <a href="{{route('photography')}}" class="themeBtn themeBtn--center">View More</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Gallery -->
<div class="galleryWrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sectionContent text-center">
                  
                    <?php App\Helpers\Helper::inlineEditable("h1",["class"=>"heading"],'My Gallery','WELCOMEGALLERYHEADETXT');?>

                </div>
            </div>
        </div>
       {{-- <div class="gallery">
            <?php 
            $gallery = App\Models\Photos::where('is_active',1)->orderby('id','DESC')->limit(5)->get();
         
            ?>
        
            @foreach($gallery as $key => $value)
            <div class="gallery__img" data-wow-duration="1s"><a href="{{asset($value->img_path)}}"
                                data-fancybox="gallery"><img src="{{asset($value->img_path)}}" alt="image" class="imgFluid"></a></div>
            @endforeach
        </div>--}}
        <div class="gallery-slider">
          @foreach(App\Models\Album::allAlbums() as $album)
          @foreach($album->albumHasPhotos as $photo)
                                    <img src="{{ asset($photo->img_path) }}" alt="{{ $photo->description }}" class="imgFluid nofotomoto">
          @endforeach
          @endforeach
          <div><img src="https://picsbyjd.dev.digtalsdesigns.com/public/images/blogs-card-img-1.png" alt="image" class="imgFluid nofotomoto"></div>
          <div><img src="https://picsbyjd.dev.digtalsdesigns.com/public/images/blogs-card-img-1.png" alt="image" class="imgFluid nofotomoto"></div>
          <div><img src="https://picsbyjd.dev.digtalsdesigns.com/public/images/blogs-card-img-1.png" alt="image" class="imgFluid nofotomoto"></div>
          <div><img src="https://picsbyjd.dev.digtalsdesigns.com/public/images/blogs-card-img-1.png" alt="image" class="imgFluid nofotomoto"></div>
        </div>        
            <!--<a href="#" class="gallery__img">-->
            <!--    <img src="{{asset($value->img_path)}}" alt="image" class="imgFluid">-->
            <!--</a>-->
        <div class="col-12">
            <a href="{{route('photography')}}" class="themeBtn themeBtn--center">View More</a>
        </div>
    </div>
</div>

<!--<section class="main-gallery">-->
<!--    <div class="container">-->
      
<!--    </div>-->
<!--</section>-->


<!-- Testimonials -->
<div class="testimonials">
    <div class="container testimonialSlider">
    

        @foreach($testimonial as $key => $value)
    
        <div class="testimonial">
            <div class="row">
                <div class="col-lg-7">
                    <div class="testimonial__content">
                        <img src="{{asset('images/qoutes.png')}}" alt="image" class="imgFluid">
                        <p>{{$value->description}}</p>
                        <h6>{{$value->name}}</h6>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <img src="{{asset($value->img_path)}}" alt="image" class="imgFluid testimonial__img nofotomoto">
                </div>
            </div>
            
        </div>
      @endforeach
      
    </div>
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