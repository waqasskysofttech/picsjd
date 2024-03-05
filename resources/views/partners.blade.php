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
            <div class="col-lg-12 text-center py-5">
                <h3 class="dark-gren-46 mb-4">{{$content->page_heading}}</h3>
                <div class="text-center">
                    <a type="button" class="btn pink-btn text-white">Join our community</a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <?php echo html_entity_decode($content->content1);?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h5 class="dark-gren-24 py-4 text-center">Got Any Questions? Need Support?<a href="{{route('contact-us')}}" class="orng-txt">
                        Contact Us</a> Here</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10000">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10000" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10000" class="collapse show" aria-labelledby="headingOne10000"
                        data-parent="#accordionExample10000">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p1.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10011">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10011" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10011" class="collapse show" aria-labelledby="headingOne10011"
                        data-parent="#accordionExample10011">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p2.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10022">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10022" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10022" class="collapse show" aria-labelledby="headingOne10022"
                        data-parent="#accordionExample10022">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p3.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10033">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10033" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10033" class="collapse show" aria-labelledby="headingOne10033"
                        data-parent="#accordionExample10033">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p4.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10044">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10044" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10044" class="collapse show" aria-labelledby="headingOne10044"
                        data-parent="#accordionExample10044">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p5.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10055">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10055" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10055" class="collapse show" aria-labelledby="headingOne10055"
                        data-parent="#accordionExample10055">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p6.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10066">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10066" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10066" class="collapse show" aria-labelledby="headingOne10066"
                        data-parent="#accordionExample10066">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p7.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10077">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10077" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10077" class="collapse show" aria-labelledby="headingOne10077"
                        data-parent="#accordionExample10077">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p8.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card partnr-card">
                    <div class="card-header" id="headingOne10088">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-center" type="button" data-toggle="collapse"
                                data-target="#collapseOne10088" aria-expanded="true" aria-controls="collapseOne">
                                Promotional Link 1
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne10088" class="collapse show" aria-labelledby="headingOne10088"
                        data-parent="#accordionExample10088">
                        <div class="card-body p-0">
                            <img src="{{asset('images/p9.png')}}" class="img-fluid w-100" alt="">
                        </div>
                    </div>
                    <div class="dark-gren-15">
                        <h6>Sub Category abc</h6>
                    </div>
                </div>
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
