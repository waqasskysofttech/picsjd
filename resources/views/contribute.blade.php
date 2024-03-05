@extends('layouts.main')
@section('content')
<section class="green-back-2 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="card web-card px-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-12">
                    <h4 class="dark-gren-36 text-center mb-3">{{$content->page_heading}}</h4>
                    <?php echo html_entity_decode($content->content1);?>

                </div>
            </div>
            
            <div class="row align-items-end mb-4">
                <div class="col-lg-12">
                <?php echo html_entity_decode($content->content2);?>
                </div>
            </div>
            <div class="row align-items-end mb-4">
                <div class="col-lg-12">
                <?php echo html_entity_decode($content->content3);?>
                </div>
            </div>
            <div class="row align-items-end mb-4">
                <div class="col-lg-12">
                <?php echo html_entity_decode($content->content4);?>  
                </div>
            </div>
            <div class="row align-items-end mb-4">
                <div class="col-lg-12">
                <?php echo html_entity_decode($content->content5);?>  
                </div>
            </div>
            <div class="row py-4">
                <div class="col-lg-12 text-center">
                    <h5 class="dark-gren-24 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000"><a href="{{route('contact-us')}}" class="orng-txt">Contact Us</a> today so we might have a productive conversation.
                    </h5>
                </div>
            </div>
            <!-- <img src="images/dynasore3.png" class="dynasore-centr-pic" alt=""> -->
        </div>
    </div>
</section>

<div class="modal fade" id="secc" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{asset('images/checkmark.png')}}" alt="">
                <h6 class="dark-gren-28">Web Links Submitted Successfully!
                    You will receive an email if these links
                    are approved.</h6>
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
