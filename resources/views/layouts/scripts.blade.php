<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/wow.min.js')}}"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/jquery.toast.js')}}"></script>
<script src="{{asset('js/fontawesome5.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script> 
<script src="{{asset('js/app.js')}}"></script>


  <!-- <script>

      $('.slider-title').slick({

          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          fade: true,
          asNavFor: '.slider-images'
      });

      $('.slider-images').slick({

          infinite: false,
          speed: 300,
          slidesToShow: 4,
          slidesToScroll: 1,

          // centerMode: true,
          focusOnSelect: true,
          asNavFor: '.slider-title',
          responsive: [{
                  breakpoint: 1024,
                  settings: {
                      slidesToShow: 3,
                      slidesToScroll: 3,
                      infinite: true

                  }
              },
              {
                  breakpoint: 600,
                  settings: {
                      slidesToShow: 2,
                      slidesToScroll: 2
                  }
              },
              {
                  breakpoint: 480,
                  settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1
                  }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
          ]
      });
  </script>
   -->

<script src="{{asset('js/jquery.toast.js')}}"></script>
<script src="{{asset('js/bootstrap-notify.min.js')}}"></script> 

<!-- <script src="{{asset('js/function.js')}}"></script> -->
<script src="{{asset('js/hcommon.js')}}"></script>
<script type="text/javascript">

(function($){
    
  $.fn.visible = function(partial){
      var $t        = $(this),
        $w        = $(window),
        viewTop     = $w.scrollTop(),
        viewBottom    = viewTop + $w.height(),
        _top      = $t.offset().top,
        _bottom     = _top + $t.height(),
        compareTop    = partial === true ? _bottom : _top,
        compareBottom = partial === true ? _top : _bottom;  
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    };
})(jQuery);
$(document).ready(function(){
showvisible();
$(window).scroll(function(){
        setTimeout(function(){ showvisible() }, 100);
    });
});
function showvisible(){
$('img').each(function(){
var visible = $(this).visible('partial');
// console.log(visible);
var elem = $(this);
if (!elem.prop('complete')) {
  elem.on('load', function() {
    // console.log(this.complete);
  });
} else {
}

  // console.log($(this).data('url'));
  
$(this).attr('src',$(this).data('url'));

});
}
</script>
@if(is_admin())
  <script src="{{asset('admin/js/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="{{ asset('admin/js/content-management.js') }}"></script>
@endif
<script>
new WOW().init();
</script>
<script>

$( document ).ready(function() {
    // console.log( "ready!" );


$( "#newsletter" ).click(function(e) {


    

    e.preventDefault();
    // e.preventDefault();
        
      //var data = $(".create_user_form").serialize();
      var data = new FormData(document.getElementById("newsletterform"));
     
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'POST',
    			url:'{{route('newsletterstore')}}',
    			data:data,
			    enctype: 'multipart/form-data',
                processData: false,  // tell jQuery not to process the data
                contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
    
                  
                   
                if(data.status == 1){
                        $.toast({
                        heading: 'Success!',
                        position: 'top-right',
                        text:  data.msg,
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 2500,
                        stack: 6
                    });
    
                    $('#newsletterform')[0].reset();
                    // setInterval(() => {
                        
                    //     location.reload();
                    // }, 2500);
                     
                    // $("#change-password-modal").modal("hide"); 
                }
    
           
            if(data.status == 2){
                $.toast({
    				heading: 'Error!',
    				position: 'bottom-right',
    				text:  data.error,
    				loaderBg: '#ff6849',
    				icon: 'error',
    				hideAfter: 5000,
    				stack: 6
    			});
            }
            // $('#updatepwd')[0].reset();
    	    }
    
    			});
    });

});
</script>


