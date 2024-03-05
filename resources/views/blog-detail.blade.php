@extends('layouts.main')
@section('content')
 
    
<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid nofotomoto">
    </div>
    <div class="pagetitle__content">

     <h2>{{$blog_detail->title}}</h2>
    </div>

</div>

<!-- About -->
<div class="about mar-y py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6">
                <div class="about__img">

                <img src="{{asset($blog_detail->blog_img)}}" alt="{{$blog_detail->title}}" class="imgFluid nofotomoto">

             
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="about__content">
                    <div class="sectionContent">
                        <!-- <h6 class="subHeading">About Me</h6> -->
                        <h2 class="heading">{{$blog_detail->title}}</h2>
                        <?php
                        echo html_entity_decode($blog_detail->long_desc)
                        ?>
                    </div>
                  
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
       {{-- <div class="gallery gallery--sm">

        <?php 
            $gallery = App\Models\Photos::where('is_active',1)->orderby('id','DESC')->limit(5)->get();
         
            ?>
          
          
        
            @foreach($gallery as $key => $value)
            <a href="#" class="gallery__img">
                <img src="{{asset($value->img_path)}}" alt="image" class="imgFluid">
            </a>
            @endforeach 
            
        </div>
        --}}
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