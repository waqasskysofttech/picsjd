@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<div class="main-sec">
      <div class="main-wrapper">
        <div class="chart-wrapper">
        
         
        <div class="user-wrapper">
          <div class="row align-items-center mc-b-3">
            <div class="col-lg-6 col-12">
              <div class="primary-heading color-dark">
                <h2>Top Selling Category</h2>
              </div>
            </div>
            
          </div>

        
              <div class="table-responsive">
                <table id="user-table" class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                    <th width="20%">S.no #</th>
                      
                      <th>Title</th>
                      
                  </thead>
                  <tbody>
                  
                  <?php 
                  
                  ?>
             @foreach($topcat as $key => $value)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                
                    <td>{{$value->title}}</td>
               
          
                </tr>
               
              @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>

  </section>

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