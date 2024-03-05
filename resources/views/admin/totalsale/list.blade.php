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
                <h2>Total Sale</h2>
              </div>
            </div>
            
          </div>

        
              <div class="table-responsive">
                <table  class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                    
                      
                      <th width="20%">S.no #</th>
                      <th>Title</th>
                      <th>Sales</th>
                      
                  </thead>
               
                  
                 <?php
           $sale = explode(",",$abc);
         
    
           
        
           ?>
                  
                    
               <tbody>
  <tr></tr>
  <tr>
    <td>1</td>
    <td>January</td>
    <td>{{$sale[0]}}</td>
  </tr>
  <tr>
  <td>2</td>
    <td>February</td>
    <td>{{$sale[1]}}</td>
  </tr>
  <tr>
  <td>3</td>
    <td>March</td>
    <td>{{$sale[2]}}</td>
  </tr>
  <tr>
  <td>4</td>
    <td>April</td>
    <td>{{$sale[3]}}</td>
  </tr>
  <tr>
  <td>5</td>
    <td>May</td>
    <td>{{$sale[4]}}</td>
  </tr>
  <tr>
  <td>6</td>
    <td>June</td>
    <td>{{$sale[5]}}</td>
  </tr>
  <tr>
  <td>7</td>
    <td>July</td>
    <td>{{$sale[6]}}</td>
  </tr>
  <tr>
  <td>8</td>
    <td>August</td>
    <td>{{$sale[7]}}</td>
  </tr>
  <tr>
  <td>9</td>
    <td>September</td>
    <td>{{$sale[8]}}</td>
  </tr>
  <tr>
  <td>10</td>
    <td>October</td>
    <td>{{$sale[9]}}</td>
  </tr>
  <tr>
  <td>11</td>
    <td>November</td>
    <td>{{$sale[10]}}</td>
  </tr>
  <tr>
  <td>12</td>
    <td>December</td>
    <td>{{$sale[11]}}</td>
  </tr>
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