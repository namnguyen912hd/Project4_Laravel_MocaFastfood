
@extends('layouts.admin')

@section('title')
<title>Admin Mocafastfood</title>
@endsection

@section('css')
<link href="{{ asset('vendors/chart/chart.css') }}" rel="stylesheet" />
@endsection

@section('content')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  @include('partial.admin.content-header', ['name' => 'Bảng điều khiển', 'key'=>''])
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$result['newOrders']}}</h3>

                <p>đơn hàng mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('orders.index') }}" class="small-box-footer">chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$result['numberofProducts']}}</h3>

                <p>sản phẩm</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('products.index') }}" class="small-box-footer">chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$result['numberofUsers']}}</h3>

                <p>tài khoản</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('users.index') }}" class="small-box-footer">chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>3</h3>

                <p>tin nhắn mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
      <div class="row">
        <div class="md-col-12">
        </div>
        <div class="col-md-12" >
          <h3>Thống kê</h3>
          <figure class="highcharts-figure" style="float: left;width: 100%; margin-left:128px">
            <div id="container11"></div>
            <p class="highcharts-description">
              Mocafastfood
            </p>
            <script type="text/javascript">

              var turnover = <?php echo json_encode($result['turnover'])?>;
              Highcharts.chart('container11', {

                title: {
                  text: 'Doanh thu theo tháng trong năm 2021'
                },

                subtitle: {
                  text: 'Mocafastfood'
                },

                yAxis: {
                  title: {
                    text: 'tiền'
                  }
                },

                xAxis: {
                  accessibility: {
                    //rangeDescription: 'Range: 1 to 12'
                    categories: ['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12']
                  }
                },

                legend: {
                  layout: 'vertical',
                  align: 'right',
                  verticalAlign: 'middle'
                },

                plotOptions: {
                  series: {
                    label: {
                      connectorAllowed: false
                    },
                    pointStart: 1
                  }
                },

                series: [{
                  name: 'Doanh thu',
                  data: turnover
                }],

                responsive: {
                  rules: [{
                    condition: {
                      maxWidth: 500
                    },
                    chartOptions: {
                      legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                      }
                    }
                  }]
                }

              });

            </script>
          </figure>
        </div>
        <div class="col-md-12">
          <div class="col-md-6" style="float: left;margin: 0">
            <figure class="highcharts-figure1" >
              <div id="container1"></div>
              <p class="highcharts-description">
                Mocafastfood
              </p>
              <script type="text/javascript">
                var deliveredOrders = <?php echo json_encode($result['deliveredOrders'])?>;
                  var boomOrders = <?php echo json_encode($result['boomOrders'])?>;
                Highcharts.chart('container1', {



                  chart: {
                    type: 'pie',
                    options3d: {
                      enabled: true,
                      alpha: 75,
                      beta: 0
                    }
                  },
                  title: {
                    text: 'Tỉ lệ đơn hàng thành công và đơn hàng bị hủy'
                  },
                  accessibility: {
                    point: {
                      valueSuffix: '%'
                    }
                  },
                  tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                  },
                  plotOptions: {
                    pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      depth: 35,
                      dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                      }
                    }
                  },
                  series: [{
                    type: 'pie',
                    name: 'Browser share',
                    colors: [
                    '#3CF55A',
                    '#FF6476'
                    ],
                    data: [
                    ['Đơn hàng thành công', deliveredOrders],
                    ['Đơn hàng bị hủy', boomOrders]

                    ]
                  }]
                });
              </script>
            </figure>

          </div>
          <div class="col-md-6" style="float: left;margin: 0">
            <figure class="highcharts-figure2" >
              <div id="container2"></div>
              <p class="highcharts-description">
                Mocafastfood
              </p>
              {{-- <div id="sliders">
                <table>
                  <tbody><tr>
                    <td><label for="alpha">Alpha Angle</label></td>
                    <td><input id="alpha" type="range" min="0" max="45" value="15"> <span id="alpha-value" class="value"></span></td>
                  </tr>
                  <tr>
                    <td><label for="beta">Beta Angle</label></td>
                    <td><input id="beta" type="range" min="-45" max="45" value="15"> <span id="beta-value" class="value"></span></td>
                  </tr>
                  <tr>
                    <td><label for="depth">Depth</label></td>
                    <td><input id="depth" type="range" min="20" max="100" value="50"> <span id="depth-value" class="value"></span></td>
                  </tr>
                </tbody></table>
              </div> --}}

              <script type="text/javascript">
                var names = <?php echo json_encode($result['bestsellingproNames'])?>;
                var quantities = <?php echo json_encode($result['quantitysolds'])?>;
                const chart = new Highcharts.Chart({
                  chart: {
                    renderTo: 'container2',
                    type: 'column',
                    options3d: {
                      enabled: true,
                      alpha: 0,
                      beta: 0,
                      depth: 50,
                      viewDistance: 25
                    }
                  },
                  title: {
                    text: 'Top 6 sản phẩm bán chạy nhất'
                  },
                  subtitle: {
                    text: '-----'
                  },
                  xAxis: {
                    categories: names
                    //rangeDescription: 'Range: 1 to 6'
                    //data:['nam','nam','nam','nam','nam','nam']
                  
                  },
                  plotOptions: {
                    column: {
                      depth: 25
                    }
                  },
                  series: [{
                    name: 'số lượng',
                    data: quantities
                  }]
                });

                function showValues() {
                  document.getElementById('alpha-value').innerHTML = chart.options.chart.options3d.alpha;
                  document.getElementById('beta-value').innerHTML = chart.options.chart.options3d.beta;
                  document.getElementById('depth-value').innerHTML = chart.options.chart.options3d.depth;
                }

              // Activate the sliders
              document.querySelectorAll('#sliders input').forEach(input => input.addEventListener('input', e => {
                chart.options.chart.options3d[e.target.id] = parseFloat(e.target.value);
                showValues();
                chart.redraw(false);
              }));

              showValues();
              </script>
            </figure>
        </div>
</div>

<!-- /.col-md-6 -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection




