@extends('layouts.main')
@section('content')
<section class="check-out-box-2">
    <img src="{{asset('images/dynasore4.png')}}" class="dynasor-2" alt="">
    <div class="map-anim-wrapper">
        <img src="{{asset('images/map-anim.png')}}" class="map-pic" alt="">
        <img src="{{asset('images/map-anim-path.png')}}" alt="map-anim-path">
    </div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-12 text-center mb-4">
                <h3 class="dark-gren-46">{{$content->page_heading}}</h3>
            </div>
              <form action="{{route('search_news')}}" method="GET" class="form-inline justify-content-center my-2 my-lg-0 position-relative">
            <div class="col-lg-6 col-md-6">
              
                    @csrf
                    <input class="form-control search-bar mr-sm-2" type="search" name="search" value="{{isset($search) ? $search : ''}}" required placeholder="Search News" aria-label="Search">
                  
               
            </div>
           <div class="col-lg-3 col-md-3">
                  <button class="pink-btn">Search</button>
            </div>
            @if(isset($search))
             <div class="col-lg-3 col-md-3">
                  <a href="{{route('news')}}" class="pink-btn reset">Reset Filter</a>
            </div>
            @endif
             </form>
        </div>

        @foreach($news as $new)
        <div class="row my-2">
            <div class="col-lg-8">
                <img src="{{asset($new->thumbnail->img_path)}}" class="img-fluid" alt="">
                <div class="news-card">
                    <div class="card">
                       
                        <div class="card-body">
                            <h5 class="card-title black-txt-18"><?php echo html_entity_decode($new->title)?></h5>
                            <p class="card-text"><?php echo html_entity_decode($new->short_desc)?></p>
                            <a href="{{route('news-detail',$new->slug)}}" class="card-link btn yellow-btn mt-2">Read More</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    @endforeach
       



        <img src="{{asset('images/airplane.png')}}" class="arow-2" alt="">
    </div>
    <img src="{{asset('images/carton.png')}}" class="carton-pic" alt="">
</section>


@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
	.reset{
	    display: inline-block;
    cursor: pointer;
    background: #D75DB2;
  padding: 7px 35px;
    border-radius: 100px;
    color: white;
    text-transform: capitalize;
    font-family: 'Luckiest Guy', cursive;
    font-weight: 500;
    border: 0;
    min-width: 150px;
    text-align: center;
	}
</style>
@endsection
@section('js')
<script type="text/javascript">
(()=>{
  /*in page css here*/
})()
</script>
@endsection
