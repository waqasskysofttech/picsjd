@extends('layouts.main')
@section('content')
  
<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset($banner->img_path)}}" alt="image" class="imgFluid nofotomoto">
    </div>
    <div class="pagetitle__content">
        <?php App\Helpers\Helper::inlineEditable("h2",["class"=>"heading"],'Blogs','BLOGHEAD1');?>

    </div>
</div>

<!-- Blogs -->
<div class="blogs mar-y">
    <div class="container">
        <div class="row">
            <?php
            $blog = App\Models\Blog::where('is_active',1)->get();
         
            
            ?>
        @foreach( $blog as $key => $value )
            <div class="col-12 col-lg-4">
                <div class="blogs__card">
                    <div class="blogs__cardImg">
                        <a href="#"><img src="{{asset($value->blog_img)}}" alt="image" class="imgFlud nofotomoto"></a>
                        <div class="blogs__cardImgDate">
                            <span><?php echo date('d/m/Y', strtotime($value->created_at));?> </span>
                        </div>
                    </div>
                    <div class="blogs__cardcontent">
                        <a href="#">{{$value->title}}</a>
                        <p>{{$value->short_desc}}</p>
                        <a href="{{route('blog.detail',$value->slug)}}" class="themeBtn">VIEW DETAILS</a>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-10">
                <div class="sectionContent text-center">
                    <p>try's standard dummy text ever since the 1500s, when an unemaining essentially unchanged. It was popularised desktop publishing software like
                    </p>
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