@extends('layouts.main')
@section('content')
<section class="check-out-box-2">
    <img src="{{asset('images/dynasore4.png')}}" class="dynasor-2" alt="">
    <div class="map-anim-wrapper">
        <img src="{{asset('images/map-anim.png')}}" class="map-pic" alt="">
        <img src="{{asset('images/map-anim-path.png')}}" alt="map-anim-path">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 text-center py-5">
                <h3 class="dark-gren-46">{{$content->page_heading}}</h3>
            </div>
        </div>

        <div class="row my-2">
            <div class="col-lg-12">
                <img src="{{asset($news->picture->img_path)}}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="row my-2">
            <div class="col-lg-12">
                <p class="black-28"><?php echo html_entity_decode($news->title)?> </p>
            </div>
        </div>
        <div class="row my-2">
            <div class="col-lg-12">
                <?php echo  html_entity_decode($news->long_desc)?>
            </div>
        </div>
        <img src="{{asset('images/airplane.png')}}" class="arow-2" alt="">
    </div>
    <img src="{{asset('images/carton.png')}}" class="carton-pic" alt="">
</section>


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
