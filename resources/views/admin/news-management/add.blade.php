@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Add News</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.create_news')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Title*:</label>
                                    <input type="text" name="name" id="name" value="{{old('name')}}" required class="form-control" placeholder="Enter Title">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Slug*:</label>
                                    <input type="text" name="slug" id="slug" value="{{old('slug')}}" required class="form-control" placeholder="Enter Slug">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Short Description:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor1"  placeholder="Enter Short Description">{{old('short_desc')}}</textarea>
                                    <input type="hidden" id="message1"  name="short_desc">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Long Description:</label>
                                    <textarea rows="5" class="form-control ckeditor" id="editor2"  placeholder="Enter Long Description">{{old('long_desc')}}</textarea>
                                    <input type="hidden" id="message2" name="long_desc">
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                              <h3>Thumbnail Image</h3>
                              <figure><img src="{{asset('images/user-details.png')}}" class="thumbnail-img" alt="user-img"></figure>
                              <label for="thumbnail-img" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file" required onchange="thumb(this);" name="thumbnails" id="thumbnail-img" class="d-none"  accept="image/jpeg, image/png">
                                <h5 class="recommend">Recommended Image Size Is: 432 X 304</h5>
                            </div>
                          
                           </div>
                           <div class="col-lg-12 text-center">
                            <div class="img-upload-wrapper  mc-b-3">
                            <h3>Main Image</h3>
                              <figure><img src="{{asset('images/user-details.png')}}" class="picture" alt="user-img"></figure>
                              <label for="picture" class="user-img-btn"><i class="fa fa-camera"></i></label>
                              <input type="file" required onchange="mainpic(this);" name="pictures" id="picture" class="d-none"  accept="image/jpeg, image/png">
                                <h5 class="recommend">Recommended Image Size Is: 1176 X 541</h5>
                            </div>
                             
                           </div>
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                            <button id="add-record" type="button" class="primary-btn primary-bg">Create</button>
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
</style>
@endsection
@section('js')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
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

    function mainpic(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('.picture')
                    .attr('src', e.target.result);
                   
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


(()=>{

  $('#name').change(function(e) {
    $.get('{{ route('admin.check_slug') }}', 
      { 'title': $(this).val() }, 
      function( data ) {
        $('#slug').val(data.slug);
      }
    );
  });


    $('#add-record').click(function(e)
    {
        e.preventDefault();
        var value1 = CKEDITOR.instances['editor1'].getData();
        var val1 = $("#message1").val(value1);
        var value2 = CKEDITOR.instances['editor2'].getData();
        var val2 = $("#message2").val(value2);
                //console.log(val1.attr('value'));
                if(val1.attr('value') == '')
                {
                    $.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  'Short Description Field Is Required!',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 2000,
						stack: 6
					});
                }
                if(val1.attr('value') == '')
                {
                    $.toast({
						heading: 'Error!',
						position: 'bottom-right',
						text:  'Long Description Field Is Required!',
						loaderBg: '#ff6849',
						icon: 'error',
						hideAfter: 2000,
						stack: 6
					});
                }

                if(val1.attr('value') != '' && val1.attr('value') != '')
                {
                    $('#add-record-form').submit();
                }
    });
    
})()
</script>
@endsection