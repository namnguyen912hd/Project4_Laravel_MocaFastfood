<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style type="text/css">
    .highcharts-figure,
        .highcharts-data-table table {
          min-width: 360px;
          max-width: 800px;
          margin: 1em auto;
        }

        .highcharts-data-table table {
          font-family: Verdana, sans-serif;
          border-collapse: collapse;
          border: 1px solid #EBEBEB;
          margin: 10px auto;
          text-align: center;
          width: 100%;
          max-width: 500px;
        }

        .highcharts-data-table caption {
          padding: 1em 0;
          font-size: 1.2em;
          color: #555;
        }

        .highcharts-data-table th {
          font-weight: 600;
          padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
          padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
          background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
          background: #f1f7ff;
        }
  </style>
  <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<body>

  <figure class="highcharts-figure" style="float: left;width: 48%">
      <div id="container"></div>
      <p class="highcharts-description">
        messi
      </p>
      <script type="text/javascript">

            var result = <?php echo json_encode($result)?>;
            //alert(result[1]);

          var userData = <?php echo json_encode($userData)?>;
          Highcharts.chart('container', {

              title: {
                text: 'Doanh thu năm 2021'
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
                  data:result
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
                  pointStart: result[0]
                }
              },

              series: [{
                name: 'Doanh thu',
                data: userData
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

<figure class="highcharts-figure1" style="float: left;width: 40%">
  <div id="container1"></div>
  <p class="highcharts-description">
    Chart demonstrating the use of a 3D pie layout.
    The "Chrome" slice has been selected, and is offset from the pie.
    Click on slices to select and unselect them.
    Note that 3D pies, while decorative, can be hard to read, and the
    viewing angles can make slices close to the user appear larger than they
    are.
  </p>
  <script type="text/javascript">
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
        text: 'Browser market shares at a specific website, 2014'
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
             '#50B432',
             '#ED561B'
         ],
        data: [
          ['Firefox', 80],
          ['IE', 20]
          
        ]
      }]
    });
  </script>
</figure>

<figure class="highcharts-figure2" style="float: left;width: 40%">
  <div id="container2"></div>
    <p class="highcharts-description">
      Chart designed to highlight 3D column chart rendering options.
      Move the sliders below to change the basic 3D settings for the chart.
      3D column charts are generally harder to read than 2D charts, but provide
      an interesting visual effect.
    </p>
    <div id="sliders">
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
    </div>
  
  <script type="text/javascript">
    const chart = new Highcharts.Chart({
        chart: {
          renderTo: 'container2',
          type: 'column',
          options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
          }
        },
        title: {
          text: 'Chart rotation demo'
        },
        subtitle: {
          text: 'Test options by dragging the sliders below'
        },
        plotOptions: {
          column: {
            depth: 25
          }
        },
        series: [{
          data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
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



</body>
</html>