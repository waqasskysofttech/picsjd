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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'News/Opportunties Details','OPDETTXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- MAIN-SLIDER END -->
    <!-- Our Sponsors start -->
    <!-- ABOUT SECTION START -->
  
    <section class="about-sec pdt-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{asset($blog->blog_img)}}" alt="blog-img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content primary-heading color-dark">
                    <h5>{{$blog->title}}</h5>
                    <?php echo html_entity_decode($blog->long_desc)?>
                    </div>
                </div>
            </div>
           
        </div>
    </section>





    <!-- ABOUT SECTION END -->


    <!-- about-section 2 start -->
    <section class="about-sec2 pdy-30">
        <div class="container">
            <div class="row">
                @foreach($showcase as $sc)
                <div class="col-lg-4">
                    <div class="about-main">
                        <div class="ab-img">
                            <img src="{{asset($sc->blog_img)}}" alt="">
                        </div>
                        <div class="ab-content">
                        <h5>{{$sc->title}}</h5>
                        <?php echo mb_strimwidth(html_entity_decode($sc->long_desc), 0, 150, "...")?>
                                <div class="pages-link  pdy-10">
                                    <a href="{{route('opportunities-detail',$sc->slug)}}" class="p-link">READ MORE
                                        
                                    </a>
                                </div>
                                </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- about-section 2 end -->
    <!-- Our Sponsors end -->
  
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