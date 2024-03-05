@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
            <div class="main-wrapper">
                <div class="row align-items-center mc-b-3">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="primary-heading color-dark">
                            <h2>Add Review</h2>
                        </div>
                    </div>
                   
                </div>
                <div class="user-wrapper">
                    <form id="add-record-form" action="{{route('admin.create_reviews')}}" enctype="multipart/form-data" method="POST" class="main-form mc-b-3">

                            @csrf
                        <div class="row align-items-end">
                       
                        <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Customer Name*:</label>
                                    <input type="text" name="name" id="name" required class="form-control" placeholder="Enter Name">
                                    @if ($errors->has('name'))
                                        <span class="error">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-6">
                                <div class="form-group">
                                    <label>Email*:</label>
                                    <input type="text" name="email" id="email" required class="form-control" placeholder="Enter Email">
                                    @if ($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="col-lg-6 col-md-6 col-6"> 
                                 <div class="form-group">
                                    <label>Ratings*:</label>
                                    <select class="form-control" name="rating[]">
                                      @for($i = 1; $i <= 5; $i++)
                                       <option value="{{$i}}">{{$i}}</option>
                                       @endfor
                                    </select>
                                    </div>
                            </div>
                                 <div class="col-lg-6 col-md-6 col-6"> 
                                    <div class="form-group">
                                    <select class="form-control" name="item_id">
                                      <option value="">- Select Products - </option>
                                      <?php
                                      $allpro = App\Models\Products::where('is_active',1)->get();
                                      
                                      ?>
                                      @foreach($allpro as $pro)
                                       <option value="{{$pro->id}}"> {{$pro->name}} </option>
                                       @endforeach
                                    </select>
                                    </div>
                                </div>

                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>Review*:</label>
                                    <textarea name="review" rows="5" id="review" required class="form-control" placeholder="Enter Description">{{old('review')}}</textarea>
                                    @if ($errors->has('review'))
                                        <span class="error">{{ $errors->first('review') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                            
                            
                        </div>
                       
                         
                        <div class="col-lg-12 col-md-12 col-12">
                        <div class="text-center">
                          
                            <button  type="submit" class="primary-btn primary-bg">Create</button>
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

/* STARS  */


.rate {
  float: left;
  height: 46px;
  padding: 0 10px;
  }
  .rate:not(:checked) > input {
  position:absolute;
  /*top:-9999px;*/
  visibility: hidden;
  }
  .email-no-t {
  text-transform: lowercase;
  }
  .rate:not(:checked) > label {
  float:right;
  width:1em;
  overflow:hidden;
  white-space:nowrap;
  cursor:pointer;
  font-size:30px;
  color:#ccc;
  }
  .rate:not(:checked) > label:before {
  content: '★ ';
  }
  .rate > input:checked ~ label {
  color: #ffc700;    
  }
  .rate:not(:checked) > label:hover,
  .rate:not(:checked) > label:hover ~ label {
  color: #deb217;  
  }
  .rate > input:checked + label:hover,
  .rate > input:checked + label:hover ~ label,
  .rate > input:checked ~ label:hover,
  .rate > input:checked ~ label:hover ~ label,
  .rate > label:hover ~ input:checked ~ label {
  color: #c59b08;
  }  
  .glyphicon-star {
  color:gold;
  }
  span.glyphicon-calendar {
  padding-left:20px;
  }


/* STARS  */
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
// function thumb(input) {
//         if (input.files && input.files[0]) {
            
//             var reader = new FileReader();
            
//             reader.onload = function (e) {
//                 $('.thumbnail-img')
//                     .attr('src', e.target.result);
                   
//             };

//             reader.readAsDataURL(input.files[0]);
//         }
//     }


(()=>{

//   $('#name').change(function(e) {
//     $.get('{{ route('admin.check_slug') }}', 
//       { 'title': $(this).val() }, 
//       function( data ) {
//         $('#slug').val(data.slug);
//       }
//     );
//   });


//     $('#add-record').click(function(e)
//     {
//         e.preventDefault();
//         var value1 = CKEDITOR.instances['editor1'].getData();
//         var val1 = $("#message1").val(value1);
//         var value2 = CKEDITOR.instances['editor2'].getData();
//         var val2 = $("#message2").val(value2);
       
//                 //console.log(val1.attr('value'));
               

//                 if(val1.attr('value') != '' && val2.attr('value') != '')
//                 {
//                     $('#add-record-form').submit();
//                 }
//                 else
//                 {
//                     $.toast({
//               heading: 'Error!',
//               position: 'bottom-right',
//               text:  'Short & Long Description Is Required!',
//               loaderBg: '#ff6849',
//               icon: 'error',
//               hideAfter: 5000,
//               stack: 6
//             });
//                 }
//     });
    
})()
</script>
@endsection