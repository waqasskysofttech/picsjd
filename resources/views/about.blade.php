@extends('layouts.main')
@section('content')
 
    
<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid nofotomoto">
    </div>
    <div class="pagetitle__content">
     <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'About Us','ABOUTTXT1');?>
    </div>

</div>

<!-- About -->
<div class="about mar-y py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="about__img">

                <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/about-img-2.png',array("data-width"=>"540","data-height"=>"507","class"=>"imgFluid nofotomoto"),'ABOUTIMG1'); ?>
             
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="about__content">
                    <div class="sectionContent">
                        <!--<?php App\Helpers\Helper::inlineEditable("h6",["class"=>"subHeading"],'About Us','ABOUTSUBHEADTXT');?>-->
                        <?php App\Helpers\Helper::inlineEditable("h2",["class"=>"heading"],'J David Marks','ABOUTHEADTXT');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam possimus iste aspernatur
                            obcaecati necessitatibus tempora, cum delectus! Nam, eos a.','ABOUTPARAHTXT1');?>
                    </div>
                    <div class="experience">
                   
                        <?php App\Helpers\Helper::inlineEditable("span",["class"=>""],'25','ABOUTEXPERIENCETXT1');?>
                        <?php App\Helpers\Helper::inlineEditable("small",["class"=>""],'Years of experience','ABOUTEXPERIENCETXT2');?>

                        
                    </div>
                    <div class="sign">
                       
                        <?php App\Helpers\Helper::inlineEditable("span",["class"=>""],'J David Marks','ABOUTEXPERIENCETXT3');?>

                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="about__content">
                    <div class="sectionContent">
                
                            <!--<?php App\Helpers\Helper::inlineEditable("h6",["class"=>"subHeading"],'About Us','ABOUTSUBHEADTXT2');?>-->
                        <?php App\Helpers\Helper::inlineEditable("h2",["class"=>"heading"],'J David Marks','ABOUTHEADTXT2');?>
                        <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam possimus iste aspernatur
                            obcaecati necessitatibus tempora, cum delectus! Nam, eos a.','ABOUTPARAHTXT2');?>
                            
                    </div>
                    <div class="experience">
              

                        <?php App\Helpers\Helper::inlineEditable("span",["class"=>""],'25','ABOUTEXPERIENCETXT2');?>
                        <?php App\Helpers\Helper::inlineEditable("small",["class"=>""],'Years of experience','ABOUTEXPERIENCETXT3');?>
                    </div>
                    <div class="sign">
                        <?php App\Helpers\Helper::inlineEditable("span",["class"=>""],'J David Marks','ABOUTEXPERIENCETXT4');?>

                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="about__img">
                <?php App\Helpers\Helper::dynamicImages(asset(''),'/images/about-img-3.png',array("data-width"=>"540","data-height"=>"507","class"=>"imgFluid nofotomoto"),'ABOUTIMG2'); ?>

          
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <a href="{{route('photography')}}" class="themeBtn">Explore My Work</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery -->
<div class="galleryWrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="sectionContent sectionContent--sm text-center">
               
                    <?php App\Helpers\Helper::inlineEditable("h1",["class"=>"heading"],'My Best Photos','ABOUTBESTHEAD1');?>
                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>"heading"],'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ','ABOUTBESTPARAH1');?>
                    
                    <p></p>
                </div>
            </div>
        </div>
        {{--<div class="gallery gallery--sm">

        <?php 
            $gallery = App\Models\Photos::where('is_active',1)->orderby('id','DESC')->limit(5)->get();
         
            ?>
          
          
        
            @foreach($gallery as $key => $value)
            <a href="#" class="gallery__img">
                <img src="{{asset($value->img_path)}}" alt="image" class="imgFluid">
            </a>
            @endforeach
            
        </div>--}}
        
        <div class="gallery-slider">
           @foreach(App\Models\Album::allAlbums() as $album)
          @foreach($album->albumHasPhotos as $photo)
          <div>
                                    <img src="{{ asset($photo->img_path) }}" alt="{{ $photo->description }}" class="imgFluid nofotomoto">
                                    </div>
          @endforeach
          @endforeach
        </div> 
        
        <div class="col-12">
            <a href="{{route('photography')}}" class="themeBtn themeBtn--center">View More</a>
        </div>
    </div>
</div>

<!-- People Say -->
<div class="comments mar-y">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="sectionContent sectionContent--sm text-center">
                    
                    <?php App\Helpers\Helper::inlineEditable("h1",["class"=>"heading"],'What People Say','PEOPLESAYTXT');?>
                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>"heading"],'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','PEOPLESAYPARATXT');?>


                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="comments__single">
                    <div class="sectionContent text-center">
                        <h5 class="heading heading--sm"></h5>
                    <?php App\Helpers\Helper::inlineEditable("h5",["class"=>"heading heading--sm"],'You Take the Best Photos!','COMMENTTXT');?>
                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquat dolore magna aliqua. ','COMMENTTXTPARA');?>


                        <div class="sign">
                          
                    <?php App\Helpers\Helper::inlineEditable("span",["class"=>""],'Lorem Ipsum Dolor','COMMENTTXTSIGN');?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="comments__single">
                    <div class="sectionContent text-center">
                    <?php App\Helpers\Helper::inlineEditable("h5",["class"=>"heading heading--sm"],'You Take the Best Photos!','COMMENTTXT2');?>
                    <?php App\Helpers\Helper::inlineEditable("p",["class"=>""],'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquat dolore magna aliqua. ','COMMENTTXTPARA2');?>


                        <div class="sign">
                            
                    <?php App\Helpers\Helper::inlineEditable("span",["class"=>""],'Lorem Ipsum Dolor','COMMENTTXTSIGN2');?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <a href="#" class="themeBtn">See More</a>
                </div>
            </div>
        </div>
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