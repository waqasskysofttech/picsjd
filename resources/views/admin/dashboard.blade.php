@extends('admin.dash_layouts.main')
@section('content')
@include('admin.dash_layouts.sidebar')
<!-- <div class="main-sec">
      <div class="main-wrapper">
        <div class="quick-stats-wrapper">
          <div class="row align-items-center mc-b-3">
            <div class="col-lg-6 col-12">
              <div class="primary-heading color-dark">
                <h2>Quick Links</h2>
              </div>
            </div> -->
            <!--<div class="col-lg-6 col-12">-->
            <!--  <div class="text-right">-->
            <!--    <a href="javascript:void(0)" class="primary-btn primary-bg">Download CSV Report</a>-->
            <!--  </div>-->
            <!--</div>-->
          <!-- </div>
          <div class="row">
              
               
              
              
            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{route('admin.showLogo')}}">
              <div class="status-thumbnail"> -->
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <!-- <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-1.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>LOGO MANAGEMENT</h3> -->
                  <!--<p>00</p>-->
                <!-- </div>
              </div>
              </a>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <a href="{{route('admin.socialInfo')}}">
              <div class="status-thumbnail"> -->
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <!-- <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-2.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>CONTACT / SOCIAL INFO</h3> -->
                  <!--<p>00</p>-->
                <!-- </div>
              </div>
              </a>
            </div> -->
            
           
            <!-- <div class="col-lg-4 col-md-6 col-12">
            <a href="{{route('admin.blog_listing')}}">
              <div class="status-thumbnail"> -->
                <!--<span><i class="fa fa-long-arrow-up"></i> 00.0%</span>-->
                <!-- <div class="status-img">
                  <img src="{{asset('admin/images/status-icon-5.svg')}}" alt="status-icon">
                </div>
                <div class="status-content">
                  <h3>NEWS MANAGEMENT</h3> -->
                  <!--<p>00</p>-->
                <!-- </div>
              </div>
              </a>
            </div>
           
            
          </div>
        </div>
       

        </div>
      </div>
    </div>

  </section> -->
  <style>
 .income-monthly {
    background: linear-gradient(to bottom, #b52ea4 0%, #f13800 100%)
}

.orders-monthly {
    background: linear-gradient(to bottom, #ad6c7c 0%, #d800ff 100%)
}

.visitor-monthly {
    background: linear-gradient(to bottom, #039477 0%, #2dda7a 100%)
}

.user-monthly {
    background: linear-gradient(to bottom, #b96f77 0%, #ca0e0e 100%)
}

.income-title {
    padding: 15px 20px;
    border-bottom: 1px solid rgba(233, 157, 128, .18)
}

.income-dashone-pro {
    padding: 20px;
    height:100px;
}
.main-income-head {
    position: relative
}

.income-title h2 {
    font-size: 20px;
    color: #fff;
    margin: 0
}

.income-title p {
    position: absolute;
    right: 0;
    top: 0;
    font-size: 13px;
    color: #fff;
    padding: 2px 10px;
    background: #1c84c6;
    border-radius: 2px;
    margin: 0
}

.main-income-phara.visitor-cl p {
    background: #1ab394
}

.income-rate-total h3 {
    color: #fff;
    font-size: 23px
}

.income-range p {
    font-size: 14px;
    color: #fff;
    margin: 0;
    float: left
}

.income-range .income-percentange {
    font-size: 14px;
    color: #fff;
    float: right
}

.income-range.visitor-cl .income-percentange {
    color: #fff
}

.income-rate-total {
    position: relative
}

.price-graph {
    position: absolute;
    top: 0;
    right: 0
}

.main-income-phara.order-cl p {
    background: #23c6c8
}

.main-income-phara.low-value-cl p {
    background: #ed5565
}
.income-order-visit-user-area {
    padding: 20px 0px;
}
.dashtwo-order-list {
    background: #fff;
    padding: 20px
}

.flot-chart-dashtwo .legendLabel {
    padding-left: 5px !important
}

.flot-chart-dashtwo table {
    margin-top: -14px
}

.flot-chart-dashtwo tbody tr {
    padding: 5px 0
}

.flot-chart-dashtwo tbody tr {
    padding: 2px 0;
    display: block
}

.skill-content-3 {
    overflow: hidden
}

.skill .progress .lead-content {
    left: 0;
    position: absolute;
    top: -50px;
    z-index: 99;
    width: 100%
}

.skill .progress .lead-content h3 {
    font-size: 20px;
    margin: 0 0
}

.skill .progress .lead-content p {
    font-size: 14px;
    margin: 5px 0
}

.skill .progress {
    background-color: #f0f0f0;
    border-radius: 0;
    box-shadow: none;
    height: 5px;
    overflow: visible;
    position: relative;
    margin: 60px 0
}

.skill .progress.progress-bt {
    margin-bottom: 0
}

.skill .progress-bar>span {
    background: #333 none repeat scroll 0 0;
    float: right;
    font-size: 11px;
    position: relative;
    padding: 0 5px;
    margin: 0px auto 29px 200px;
}

.skill .progress-bar>span:before,
.skill .progress-bar>span:after {
    border: medium solid transparent;
    content: " ";
    height: 0;
    pointer-events: none;
    position: absolute;
    top: 100%;
    width: 0
}

.skill .progress-bar>span:before {
    border-top-color: #333;
    border-width: 5px;
    left: 50%;
    margin-left: -5px
}

.holax-shop h3,
.we-are-good-at h3 {
    font-size: 18px;
    margin-bottom: 25px
}

.skill .progress:nth-child(1) .progress-bar {
    background: linear-gradient(to right, #33f 0%, #f67aa2 100%)
}

.skill .progress:nth-child(2) .progress-bar {
    background: linear-gradient(to right, #ff33d3 0%, #b5f67a 100%)
}

.skill .progress:nth-child(3) .progress-bar {
    background: linear-gradient(to right, #fff933 0%, #ef8f00 100%)
}


  </style>
  <section class="income-order-visit-user-area">
    <div class="container-fluid">
        <div class="row">
          <div class="offset-lg-2 col-lg-10">
          <div class="row">
            <div class="col-lg-3">
                <div class="income-dashone-total income-monthly shadow-reset nt-mg-b-30">
                    <div class="income-title">
                        <div class="main-income-head">

                      
                            <h2>Income</h2>
                            <div class="main-income-phara">
                                <p>Monthly</p>
                            </div>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3><span>$</span><span class="counter">{{ $orderscount }}</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline1"><canvas width="27" height="19" style="display: inline-block; width: 27px; height: 19px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="income-range">
                            <p>Total income</p>
                    
                            <!-- <span class="income-percentange">% <i class="fa fa-bolt"></i></span> -->
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="income-dashone-total orders-monthly shadow-reset nt-mg-b-30">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2>Orders</h2>
                            <div class="main-income-phara order-cl">
                                <p>Monthly</p>
                            </div>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3><span class="counter">{{ $currentmonthorders }}</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline6"><canvas width="56" height="19" style="display: inline-block; width: 56px; height: 19px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="income-range order-cl">
                            <p>New Orders</p>
                            <!-- <span class="income-percentange">66% <i class="fa fa-level-up"></i></span> -->
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="income-dashone-total visitor-monthly shadow-reset nt-mg-b-30">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2>Users</h2>
                            <div class="main-income-phara visitor-cl">
                                <p>Over all</p>
                            </div>
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3><span class="counter">{{count($users)}}</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline2"><canvas width="39" height="19" style="display: inline-block; width: 39px; height: 19px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="income-range visitor-cl">
                            <p>Total Users</p>
                             <!-- <span class="income-percentange">55% <i class="fa fa-level-up"></i></span> -->
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="income-dashone-total user-monthly shadow-reset nt-mg-b-30">
                    <div class="income-title">
                        <div class="main-income-head">
                            <h2>Inquiries</h2>
                            <!-- <div class="main-income-phara low-value-cl">
                                <p>Low Value</p>
                            </div> -->
                        </div>
                    </div>
                    <div class="income-dashone-pro">
                        <div class="income-rate-total">
                            <div class="price-adminpro-rate">
                                <h3><span class="counter">{{count($inquiry)}}</span></h3>
                            </div>
                            <div class="price-graph">
                                <span id="sparkline5"><canvas width="59" height="19" style="display: inline-block; width: 59px; height: 19px; vertical-align: top;"></canvas></span>
                            </div>
                        </div>
                        <div class="income-range low-value-cl">
                            <p> Total Inquiries</p>
                            <!-- <span class="income-percentange">33% <i class="fa fa-level-down"></i></span> -->
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<div class="dashtwo-order-area">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-11">
              <div class="main-header-chart">
                <div class="row align-items-center">
                  <div class="col-lg-9">
                  <div><canvas id="myChart"></canvas></div>
                  </div>
                  <div class="col-lg-3">
                            <div class="skill-content-3">
                                <div class="skill">
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3>2,346</h3>
                                            <p>Total orders in period</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%;" data-wow-duration="1.5s" data-wow-delay="1.2s">
                                            <span>95%</span>
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="lead-content">
                                            <h3>9,346</h3>
                                            <p>Orders in last month</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="92%" style="width: 92%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>92%</span> </div>
                                    </div>
                                    <div class="progress progress-bt">
                                        <div class="lead-content">
                                            <h3>2,34,600</h3>
                                            <p>Monthly income from order</p>
                                        </div>
                                        <div class="progress-bar wow fadeInLeft" data-progress="91%" style="width: 93%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>93%</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                </div>
                
            </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('css')
<style type="text/css">
	/*in page css here*/
</style>
@endsection
@section('js')

<script data-cfasync="false" defer type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script data-cfasync="false" defer type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#user-table').DataTable();        
    });
</script>

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script type="text/javascript">
   
    const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
  ];
  var abca  = [<?php  echo $abc ?>];
  console.log(abca);
  const data = {
    labels: labels,
    datasets: [{
      label: 'Orders',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [<?php  echo $abc ?>],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
  </script>
  <script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<script type="text/javascript">
(()=>{
  
  /*in page css here*/


})()
</script>
@endsection
