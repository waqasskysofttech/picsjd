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
                <h2>Pending Orders Payments</h2>
              </div>
            </div>
            
          </div>

        
              <div class="table-responsive">
                <table id="user-table" class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                    <th width="5%">S.no #</th>
                      
                      <th width="25%">Name </th>
                      <th width="30%">E-mail</th>
                      <th width="15%">Phone</th>
                      <th width="15%">Order Amount</th>
                      <th width="5%">Payment Status</th>
                      
                  </thead>
                  <tbody>
                  
                  <?php 
                  
                  ?>
             @foreach($unpaid as $key => $value)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                
                    <td>{{$value->fname}} {{$value->lname}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone}}</td>
                    <td>${{ number_format($value->total_amount,2)}}</td>
                    <td>{{ $value->pay_status == 0 ?  "Pending" : ""}}</td>
               
          
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