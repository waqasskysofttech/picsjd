@extends('layouts.main')
@section('content')
 
 <!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid nofotomoto">
    </div>
    <div class="pagetitle__content">

        <?php App\Helpers\Helper::inlineEditable("h2",["class"=>"heading"],'My Gallery','PHOTOGRAHPHYHEAD1');?>

    </div>
</div>


      <!-- Gallery Section Start -->
    <section class="gallery-sec">
        <div class="container">
            <div class="row justify-content-center">
                @foreach(App\Models\Album::allAlbums() as $album)
                    
                    <div class="col-lg-6">
                        <div class="gallerycategory photo-new-cate">
                            <h4 class="die">{{ $album->name }}</h4>
                        <div class="photography-slider">
                              @foreach($album->albumHasPhotos as $photo)
                                    <img src="{{ asset($photo->img_path) }}" alt="{{ $photo->description }}" class="imgFluid nofotomoto">
                              @endforeach
                        </div>
                            <div class="category-btn">
                                <a href="{{url('gallery/'. $album->id) }}" class="themeBtn">View more</a>    
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
       <!-- Gallery Section END -->






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