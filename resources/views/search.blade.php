@extends('layouts.main')
@section('content')
  
<!-- Pagetitle -->
<div class="pagetitle">
    <div class="pagetitle__img">
        <img src="{{asset('images/pagetitle-img.jpg')}}" alt="image" class="imgFluid">
    </div>
    <div class="pagetitle__content">
        <h2>Search Result : <b><?php echo $_GET['search']  ?></b></h3>
    </div>
</div>


<!-- Feature -->
<div class="featured py-5">
    <div class="container">
        <div class="row">
            <!-- <div class="col-12">
                <div class="sectionContent text-center">
                    <h1 class="heading">Featured Photography</h1>
                </div>
            </div> -->
         
             @forelse ($searchproduct as $product)

             <div class="col-12 col-lg-4">
                <a href="{{route('product-detail',$product->slug)}}" class="featured__card">
                    <div class="featured__cardImg">
                        <img src="{{asset($product->productsHasMainImage[0]->img_path)}}" alt="image" class="imgFluid">
                    </div>
                    <div class="featured__cardContent">
                        <h6>{{$product->name}}</h6>
                        <div class="price">${{ number_format($product->sale_price,2)}}</div>
                    </div>
                </a>
            </div>
    
    
    @empty
  

    <div class="col-12">

    <h2 class="text-center"> <b>No Result Found </b>
    
    </h2>
                <a href="{{ route('home') }}" class="themeBtn themeBtn--center">Back to Home</a>
            </div>
    
    
    @endforelse
         
          
            
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