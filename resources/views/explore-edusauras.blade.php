@extends('layouts.main')
@section('content')
<section class="check-out-box-3">
    <img src="{{asset('images/dynasore4.png')}}" class="dynasor-2" alt="">
    <div class="map-anim-wrapper">
        <img src="{{asset('images/map-anim.png')}}" class="map-pic" alt="">
        <img src="{{asset('images/map-anim-path.png')}}" alt="map-anim-path">
    </div>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center py-5">
                    <h3 class="dark-gren-46 mb-3">{{$content->page_heading}}</h3>
                </div>
            </div>
            <form method="get" action="{{route('search_edusauras')}}">
                @csrf
                <div class="row align-items-center">
                    <div class="col-lg-9">
                        
                            <input name="search_query" required class="form-control search-bar w-100 mr-sm-2" type="search" placeholder="Search..."
                                aria-label="Search">
                        
                    </div>
                    <div class="col-lg-3">
                        <div class="text-md-right"><button type="submit" class="btn yellow-btn">Search</button></div>
                    </div>
                </div>
            </form>
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <select class="form-control web-select" id="exampleFormControlSelect1">
                            <option {{!isset($category) ? 'selected' : '' }} disabled>Select One</option>
                            <option {{isset($category) && $category == "to-do" ? 'selected' : '' }} value="to-do">To Do</option>
                            <option {{isset($category) && $category == "to-know" ? 'selected' : '' }} value="to-know">To Know</option>
                            <option {{isset($category) && $category == "to-be" ? 'selected' : '' }} value="to-be">To Be</option>
                           
                        </select>
                </div>
                <div class="col-lg-3">
                    <form>
                        <select class="form-control web-select" id="exampleFormControlSelect1">
                            <option>Filters</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="view d-flex align-items-center justify-content-end">
                        <p>View as:</p>
                        <a href="#" class="icon-grid">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="64" height="64" viewBox="0 0 64 64">
                                <defs>
                                    <filter id="Ellipse_46" x="0" y="0" width="64" height="64"
                                        filterUnits="userSpaceOnUse">
                                        <feOffset dy="3" input="SourceAlpha" />
                                        <feGaussianBlur stdDeviation="3" result="blur" />
                                        <feFlood flood-opacity="0.161" />
                                        <feComposite operator="in" in2="blur" />
                                        <feComposite in="SourceGraphic" />
                                    </filter>
                                </defs>
                                <g id="Group_24768" data-name="Group 24768" transform="translate(-1248 -438)">
                                    <g transform="matrix(1, 0, 0, 1, 1248, 438)" filter="url(#Ellipse_46)">
                                        <circle id="Ellipse_46-2" data-name="Ellipse 46" cx="23" cy="23" r="23"
                                            transform="translate(9 6)" fill="#fff" />
                                    </g>
                                    <path id="Icon_awesome-list-ul" data-name="Icon awesome-list-ul"
                                        d="M1.808,3.375A1.808,1.808,0,1,0,3.615,5.183,1.808,1.808,0,0,0,1.808,3.375Zm0,6.025a1.808,1.808,0,1,0,1.808,1.808A1.808,1.808,0,0,0,1.808,9.4Zm0,6.025a1.808,1.808,0,1,0,1.808,1.808,1.808,1.808,0,0,0-1.808-1.808Zm16.87.6H6.628a.6.6,0,0,0-.6.6v1.205a.6.6,0,0,0,.6.6h12.05a.6.6,0,0,0,.6-.6V16.63A.6.6,0,0,0,18.678,16.028Zm0-12.05H6.628a.6.6,0,0,0-.6.6V5.785a.6.6,0,0,0,.6.6h12.05a.6.6,0,0,0,.6-.6V4.58A.6.6,0,0,0,18.678,3.978Zm0,6.025H6.628a.6.6,0,0,0-.6.6V11.81a.6.6,0,0,0,.6.6h12.05a.6.6,0,0,0,.6-.6V10.605A.6.6,0,0,0,18.678,10Z"
                                        transform="translate(1270.004 456.01)" fill="#222" />
                                </g>
                            </svg>

                        </a>
                        <a href="#" class="icon-list">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="64" height="64" viewBox="0 0 64 64">
                                <defs>
                                    <filter id="Ellipse_45" x="0" y="0" width="64" height="64"
                                        filterUnits="userSpaceOnUse">
                                        <feOffset dy="3" input="SourceAlpha" />
                                        <feGaussianBlur stdDeviation="3" result="blur" />
                                        <feFlood flood-opacity="0.161" />
                                        <feComposite operator="in" in2="blur" />
                                        <feComposite in="SourceGraphic" />
                                    </filter>
                                </defs>
                                <g id="Group_24768" data-name="Group 24768" transform="translate(-1318 -438)">
                                    <g transform="matrix(1, 0, 0, 1, 1318, 438)" filter="url(#Ellipse_45)">
                                        <circle id="Ellipse_45-2" data-name="Ellipse 45" cx="23" cy="23" r="23"
                                            transform="translate(9 6)" fill="#fe9571" />
                                    </g>
                                    <g id="menu" transform="translate(1342.689 459.385)">
                                        <path id="Path_3568" data-name="Path 3568"
                                            d="M3.162,0H.632A.633.633,0,0,0,0,.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632V.632A.633.633,0,0,0,3.162,0Z"
                                            transform="translate(0)" fill="#fff" />
                                        <path id="Path_3569" data-name="Path 3569"
                                            d="M3.162,9H.632A.633.633,0,0,0,0,9.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632V9.632A.633.633,0,0,0,3.162,9Z"
                                            transform="translate(0 -3.308)" fill="#fff" />
                                        <path id="Path_3570" data-name="Path 3570"
                                            d="M3.162,18H.632A.633.633,0,0,0,0,18.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632v-2.53A.633.633,0,0,0,3.162,18Z"
                                            transform="translate(0 -6.615)" fill="#fff" />
                                        <path id="Path_3571" data-name="Path 3571"
                                            d="M12.162,0H9.632A.633.633,0,0,0,9,.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632V.632A.633.633,0,0,0,12.162,0Z"
                                            transform="translate(-3.307)" fill="#fff" />
                                        <path id="Path_3572" data-name="Path 3572"
                                            d="M12.162,9H9.632A.633.633,0,0,0,9,9.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632V9.632A.633.633,0,0,0,12.162,9Z"
                                            transform="translate(-3.307 -3.308)" fill="#fff" />
                                        <path id="Path_3573" data-name="Path 3573"
                                            d="M12.162,18H9.632A.633.633,0,0,0,9,18.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632v-2.53A.633.633,0,0,0,12.162,18Z"
                                            transform="translate(-3.307 -6.615)" fill="#fff" />
                                        <path id="Path_3574" data-name="Path 3574"
                                            d="M21.162,0h-2.53A.633.633,0,0,0,18,.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632V.632A.633.633,0,0,0,21.162,0Z"
                                            transform="translate(-6.615)" fill="#fff" />
                                        <path id="Path_3575" data-name="Path 3575"
                                            d="M21.162,9h-2.53A.633.633,0,0,0,18,9.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632V9.632A.633.633,0,0,0,21.162,9Z"
                                            transform="translate(-6.615 -3.308)" fill="#fff" />
                                        <path id="Path_3576" data-name="Path 3576"
                                            d="M21.162,18h-2.53a.633.633,0,0,0-.632.632v2.53a.633.633,0,0,0,.632.632h2.53a.633.633,0,0,0,.632-.632v-2.53A.633.633,0,0,0,21.162,18Z"
                                            transform="translate(-6.615 -6.615)" fill="#fff" />
                                    </g>
                                </g>
                            </svg>

                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="products category">
                                <div class="row">
                                @foreach($keywords as $k)
                                
                                    <div class="col-lg-3">
                                        <img src="{{asset('images/dynasore3.png')}}" class="img-fluid" alt="">
                                        <div class="dark-gren-15">
                                            <a href="{{route('explore_edusauras_detail',$k->id)}}" class="dark-gren-15">{{$k->keywords}}</a>
                                        </div>
                                    </div>
                                @endforeach
                                 
                                </div>
                                
                                 
                    </div>
                    
                  
                </div>
                <div class="paginat">
                 {{$keywords->links("pagination::bootstrap-4")}}
                 </div>
                 
            </div>
          
            <img src="{{asset('images/ballon.png')}}" class="arow-2" alt="">
            <img src="{{asset('images/doll.png')}}" class="doll-pic" alt="">

           

            <img src="{{asset('images/airplane.png')}}" class="arow-2" alt="">


           
        </div>
    </div>
    </div>
    <img src="{{asset('images/carton.png')}}" class="carton-pic" alt="">
</section>
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
	.paginat{
	    margin: 0 auto;
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
