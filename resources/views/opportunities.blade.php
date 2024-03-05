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
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'News/Opportunties','OPPORTUNITYTXT1');?>
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


            <div class="new-opportunties">
                @foreach($blogs as $blog)
                <div class="opprtunties-box opprtunties-box-{{$loop->iteration}}">
                    <div class="about-main">
                        <div class="ab-img">
                            <img src="{{asset($blog->blog_img)}}" alt="blog-img">
                        </div>
                        <div class="ab-content">
                            <h5>{{$blog->title}}</h5>
                           <?php echo mb_strimwidth(html_entity_decode($blog->long_desc), 0, 150, "...")?>
                                <div class="pages-link  pdy-10">
                                    <a href="{{route('opportunities-detail',$blog->slug)}}" class="p-link">READ MORE
                                        
                                    </a>
                                </div>
                                </div>
                    </div>
                </div>
                @endforeach

                <!-- <div class="opprtunties-box opprtunties-box-2">
                    <div class="about-main">
                        <div class="ab-img">
                            <img src="images/hside.jpg" alt="">
                        </div>
                        <div class="ab-content">
                            <h5>Title Name </h5>
                            <h4>Your Text Heading is Here...</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur ad
                                ipiscing elit, sed do eiu</p>
                                <div class="pages-link  pdy-10">
                                    <a href="news-pportunties-detail.html" class="p-link">READ MORE
                                        
                                    </a>
                                </div>
                                </div>
                    </div>
                </div> -->
               
             
             
                

            </div>
        
       

            <!-- <div class="pages-link text-center pdy-20">
                <a href="#" class="p-link">VIEW MORE
                    
                </a>
            </div> -->
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
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection