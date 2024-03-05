@extends('layouts.main')
@section('content')


<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid">
    </div>
    <div class="pagetitle__content">
     <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Sunset','ABOUTTXT1');?>
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