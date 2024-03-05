@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
@php
use App\Http\Controllers\Admin\GalleryController;
$albums = GalleryController::get_albums();
@endphp
<div class="main-sec">
      <div class="main-wrapper">
        <div class="row align-items-center mc-b-3">
          <div class="col-lg-6 col-12">
            <div class="primary-heading color-dark">
              <h2>Add Photos</h2>
            </div>
          </div>
         
        </div>
        <form action="{{route('admin.create_photos')}}" method="POST" enctype="multipart/form-data" class="main-form create_user_form">
            @csrf
        
          <div class="row">
            <div class="col-lg-12 col-md-12 col-6">
              <div class="form-group">
                <label> Photos title*:</label>
                <input type="text" name="name"  class="form-control" placeholder="Enter Name / Title">
              </div>
              
              <div class="form-group">
                <label> Album*:</label>
                
                <select name="album_name" id="albums" style="width: 100%;">
                  @foreach($albums as $value)
                    <option value="{{$value->id}}">{{$value->name}}</option>
                  @endforeach
                </select>
              </div>
              
              @if ($errors->has('name'))
    <span class="error">{{ $errors->first('name') }}</span>
@endif
            </div>
          
            <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>Album Thumbnail</h3>
                              <figure><img src="{{asset('images/user-details.png')}}" class="thumbnail-img" alt="user-img"></figure>
                              <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file" required onchange="thumb(this);" name="thumbnails" id="thumbnail-img" class="d-none"  accept="image/jpeg, image/png">
                           
                                @if ($errors->has('thumbnails'))
    <span class="error">{{ $errors->first('thumbnails') }}</span>
@endif
                            </div>
                          
                           </div>
      
            <div class="col-lg-12 col-12">
            <div class="text-center">
              <button type="submit" class="primary-btn primary-bg add-user">Add</button>
            </div>
          </div>
          </form>
          </div>
        
      </div>
    </div>

  </section>
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
  .thumbnail-img {
    max-width: 288px;
    height: 113px;
   
}
.picture {
    max-width: 288px;
    height: 113px;
   
}
.recommend{
    color:#D75DB2;
}
.error{
  color: #f10000 !important;
}
</style>
@endsection
@section('js')
<script type="text/javascript">
    function thumb(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.thumbnail-img')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
(()=>{
    
})()
</script>
@endsection