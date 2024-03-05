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
               
                     <div class="table-responsive">
                        <table id="example" class="table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                          <th scope="col" class="text-center dark-gren-12">Links</th>
                            <th scope="col" class="text-center dark-gren-12">Description</th>
                             <th scope="col" class="text-center dark-gren-12">Add To Wish List</th>
                        </tr>
                    </thead>
                   <tbody>
                        @foreach($keywords->keywordHasCrawls as $key => $value)
                         
                         <?php $filtered_url = parse_url($value->result_url);
                            $host = $filtered_url['host'];
                          
                         ?>
                        <tr>
                            <th scope="row"><a href="{{$value->result_url}}" target="_blank"><a href="{{$value->result_url}}" target="_blank"
                                        class="dark-gren-8">{{$host}}</a></a></th>
                            <td>{{$value->result_description}}</td>
                            <?php $check_wishlist = App\Models\Wishlist::where('user_id',Auth::id())->where('crawl_id',$value->id)->first(); ?>
                            
                            @if(!$check_wishlist)
                             <td><a class="wishlist" href="javascript:void(0)" data-val-id="{{$value->id}}"  data-val-parent-id="{{$value->keyword_id}}" data-val-url="{{$value->result_url}}" data-val-result_description="{{$value->result_description}}" ><i class="far fa-heart" aria-hidden="true"></i></a></td>
                            @else
                             <td><a class="notwishlist" href="javascript:void(0)" data-val-id="{{$value->id}}"  data-val-parent-id="{{$value->keyword_id}}" ><i class="fas fa-heart" aria-hidden="true"></i></a></td>
                            @endif
                        </tr>
                       @endforeach
                     
                    </tbody>
                
            </table>
                    </div>
               
            </div>

            <!-- <img src="images/ballon.png" class="arow-2" alt="">
            <img src="images/doll.png" class="doll-pic" alt="">
            <img src="images/airplane.png" class="arow-2" alt=""> -->
        </div>
    </div>
    
    <img src="{{asset('images/carton.png')}}" class="carton-pic" alt="">
</section>


@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
	.table-bordered{
	    border: 3px solid #dee2e6;
	}
</style>
@endsection
@section('js')

<script data-cfasync="false" defer type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script data-cfasync="false" defer type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();        
    });
</script>
<script type="text/javascript">

(()=>{
  /*in page css here*/
  $(".wishlist").click(function () {    
      
      @if(Auth::check())
      {
          
      
      var user_id = {{Auth::id()}};
      var keyword_id =  $(this).data('val-parent-id');
      var url =  $(this).data('val-url');
       var result_description =  $(this).data('val-result_description');
      // var ship_value = $('.dhl_shipping_all :selected').val();
      
         // var ship_value = $('.usps_shipping_all :selected').val();
          var link_id  = $(this).data('val-id');
        //   console.log('ship_val =' +ship_value);
        //   console.log('service =' +service);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
            $.ajax({

            type: "POST",

            url: "{{route('add.to.wishlist')}}",

            data: {user_id: user_id, crawl_id: link_id, keyword_id:keyword_id,crawl_url:url,result_description:result_description },

        

            success: function (msg) {
               $.toast({
              heading: 'Success!',
              position: 'bottom-right',
              text:  'Added To Wish List!',
              loaderBg: '#ff6849',
              icon: 'success',
              hideAfter: 1000,
              stack: 6
            });
              setInterval(() => {
                location.reload();
              }, 1100);
               
            },
            beforeSend: function () {
                
            }
        });
        
      }
      @else
      {
            $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  'Please Login First!',
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 4000,
              stack: 6
            });
      }
      @endif
       
   });
   
   
   
   $(".notwishlist").click(function () {    
      
      @if(Auth::check())
      {
          
      
      var user_id = {{Auth::id()}};
      var keyword_id =  $(this).data('val-parent-id');
     
      var link_id  = $(this).data('val-id');
        //   console.log('ship_val =' +ship_value);
        //   console.log('service =' +service);
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
            $.ajax({

            type: "POST",

            url: "{{route('remove.from.wishlist')}}",

            data: {user_id: user_id, crawl_id: link_id, keyword_id:keyword_id},

        

            success: function (msg) {
               $.toast({
              heading: 'Success!',
              position: 'bottom-right',
              text:  'Removed From Wish List!',
              loaderBg: '#ff6849',
              icon: 'success',
              hideAfter: 1000,
              stack: 6
            });
              setInterval(() => {
                location.reload();
              }, 1100);
               
            },
            beforeSend: function () {
                
            }
        });
        
      }
      @else
      {
            $.toast({
              heading: 'Error!',
              position: 'bottom-right',
              text:  'Please Login First!',
              loaderBg: '#ff6849',
              icon: 'error',
              hideAfter: 4000,
              stack: 6
            });
      }
      @endif
       
   });
  
  
  
})()
</script>
@endsection
