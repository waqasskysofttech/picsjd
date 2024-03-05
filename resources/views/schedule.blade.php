@extends('layouts.main')
@section('content')
 <!-- MAIN-SLIDER START -->

 <section class="banner-section">
        <div class="banner-img">
            <img src="{{asset($banner->img_path)}}" alt="">
        </div>
        <div class="banner-content">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6">
                        <div class="primary-heading color-light">
                            <?php App\Helpers\Helper::inlineEditable("h2",["class"=>""],'Schedule','SCHEDULETXT1');?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MAIN-SLIDER END -->
    <!-- CALENDAR SECTION START -->

    <section class="calendar-section offer-sec pc-p-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="calendar">
                        <div id="container" class="calendar-container"></div>
                    </div>
                </div>
            </div>
            
            <?php App\Helpers\Helper::inlineEditable("div",array('data-ckeditor' => "true",'class'=>""),'<p>"<span>Programs Disclosure:</span> The nature of our programs are avocational, meaning it does not equip an individual for specific employment opportunities. However, our program is intended for personal enrichment or supplemental to one
                knowledge base".
            </p>','SCHEDULETXT2'); ?>
        </div>
    </section>

  

@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')
<!-- <script src="{{asset('js/calendar.js')}}"></script> -->
<script type="text/javascript">
     var $calendar;
     
(()=>{
    // var matches;
    var myevents = [];
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
    			type:'GET',
    			url:'{{route('get-schedule')}}',
    			// data:data,
			    // enctype: 'multipart/form-data',
                // processData: false,  // tell jQuery not to process the data
                // contentType: false,   // tell jQuery not to set contentType
               
    			success:function(data) {
                   
                    $(data.matches).each(function(index,element) {
                        console.log(element.live_stream != '');
                        var startDate = element.dated;
                        var endDate = element.dated;
                        var summary= 'Match B/W '+ element.match_belongs_to_team1.name + ' & ' + element.match_belongs_to_team2.name + ((element.live_stream !== null && element.live_stream != '' )  ?  ' <a href="'+element.live_stream+'" target="_blank">Watch Here Live</a> '  : '');
                        myevents.push({startDate:startDate,endDate:endDate,summary:summary});

                    });
                    let container = $("#container").simpleCalendar({
            months: ['january','february','march','april','may','june','july','august','september','october','november','december'],
        days: ['sunday','monday','tuesday','wednesday','thursday','friday','saturday'],
        displayYear: true,              // Display year in header
        fixedStartDay: true,            // Week begin always by monday or by day set by number 0 = sunday, 7 = saturday, false = month always begin by first day of the month
        displayEvent: true,             // Display existing event
        disableEventDetails: false, // disable showing event details
        disableEmptyDetails: false, 
            events:myevents
            
            // events: [
            //     // $(data).each(function() {
            //     // generate new event after tomorrow for one hour
            //     {
            //         startDate: new Date(new Date().setHours(new Date().getHours() + 24)).toDateString(),
            //         endDate: new Date(new Date().setHours(new Date().getHours() + 25)).toISOString(),
            //         summary: 'Working Together In Summer'
            //     },
            //     // )};
            //     // // generate new event for yesterday at noon
            //     // {
            //     //     startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
            //     //     endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).getTime(),
            //     //     summary: 'Working Together In Summer'
            //     // },
            //     // // generate new event for the last two days
            //     // {
            //     //     startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
            //     //     endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
            //     //     summary: 'Working Together In Summer'
            //     // }
            // ]
            // onInit: function (calendar) {}, // Callback after first initialization
    

        });
        // console.log(events);
        $calendar = container.data('plugin_simpleCalendar');
                    // console.log(myevents);

                //    var matches = data;
                    // console.log(data);
                    // Loader.hide();
                   
                // if(data.status == 1){
                //         $.toast({
                //         heading: 'Success!',
                //         position: 'top-right',
                //         text:  data.msg,
                //         loaderBg: '#ff6849',
                //         icon: 'success',
                //         hideAfter: 2500,
                //         stack: 6
                //     });
    
                    // $('#add-record-form')[0].reset();
                    // 
                        
                    //      window.location.href = "{{route('admin.products_listing')}}";
                    // 
                     
                }

    	    });
    
           
            
            // setInterval(() => {
        
    // }, 2500);
        
})()
</script>
@endsection