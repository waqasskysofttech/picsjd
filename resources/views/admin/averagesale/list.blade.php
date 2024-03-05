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
                <h2>Average Sale</h2>
              </div>
            </div>
            
          </div>

        
              <div class="table-responsive">

              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                  <form action="{{route('admin.averagesearch')}}" method="post" class="form-inline">
                    @csrf
                      <div class="form-group">
                          <label for="startDate">Start Date</label>
                          <input id="startDate" name="startDate" type="date" required class="form-control" />
                          &nbsp;
                          <label for="endDate">End Date</label>
                          <input id="endDate" name="endDate" type="date" required class="form-control" />
                          <button type="submit">search</button>
                      </div>
                    
                  </form>

                  </div>
                </div>

              </div>
                  
                <table id="user-table" class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                 
                      
                      <th>Months</th>
                      <th>Average Sale</th>
                      
                  </thead>
                  <tbody>
                  
                  
           
                    <tr>
                        @if(isset($from) && isset($to))
                    <td><?php echo  date('j-M-Y', strtotime($from))   . " to " . date('j-M-Y', strtotime($to))    ?></td>
                    @else
                    
                    <td>
                        NULL
                    </td>
                    @endif
                    <td>{{ isset($final) ? $final : "NULL" }}</td>
                
              
               
          
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