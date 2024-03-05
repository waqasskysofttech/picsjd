@extends('layouts.main')
@section('content')

<section class="check-out-box-2">
    <img src="{{asset('images/dynasore4.png')}}" class="dynasor-2" alt="">
    <div class="map-anim-wrapper">
        <img src="{{asset('images/map-anim.png')}}" class="map-pic" alt="">
        <img src="{{asset('images/map-anim-path.png')}}" alt="map-anim-path">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center py-4">
                
                <h3 class="dark-gren-46 mb-3">{{$content->page_heading}}</h3>
            </div>
        </div>

        <div class="row pb-4">
            <div class="col-lg-12">
            <?php echo html_entity_decode($content->content1);?>
            </div>
        </div>
       
        <div class="row pb-4">
            <div class="col-lg-12">
                <div class="text-center">
                    <a href="#" class="pink-btn mr-2">CREATE A LESSON… Coming Soon!!!”</a>
                </div>
            </div>
        </div>
        <div class="row pb-4">
            <div class="col-lg-12">
            <?php echo html_entity_decode($content->content2);?>
            </div>
        </div>
    </div>
    <img src="{{asset('images/carton.png')}}" class="carton-pic2" alt="">
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
