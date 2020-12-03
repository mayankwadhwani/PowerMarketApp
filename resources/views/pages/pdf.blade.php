<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link href="{{ asset('css') }}/mapbox-gl.css" rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('css') }}/report.css" />

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body class="{{ $class ?? '' }}">
    <div class="main-content">
        <!-- Page content -->
        <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="pricing card-group mb-3">
                            <div class="card card-pricing border-0 mb-4">
                                <div class="card-header bg-transparent">
                                    <h4 class="text-uppercase ls-1 text-primary text-center py-3 mb-0">Report for: {{ $address ?? ''}}</h4>
                                </div>
                                <div class="card-body px-lg-12">
                                    <div class="row justify-content-center">
                                        <img class="pb-6 pt-4 col-7 col-sm-5 col-md-4 col-lg-2 col-xl-2" src="{{ asset('argon') }}/img/icons/common/powermarket.png" width="100%" class="" alt="...">
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-stats">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title text-muted mb-0">Size of System</h5>
                                                            <span class="h2 font-weight-bold mb-0" id="co2-card">{{ $size ? number_format($size) : '' }} kWp</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="row">
                                                                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                                    <i class="fas fa-bolt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-stats">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title text-muted mb-0">System Cost</h5>
                                                            <span class="h2 font-weight-bold mb-0" id="savings-card">&#163;{{ $cost ? number_format($cost) : ''}}</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="row">
                                                                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                                    <i class="fas fa-pound-sign"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-stats">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title text-muted mb-0">Lifetime Savings</h5>
                                                            <span class="h2 font-weight-bold mb-0">&#163;{{ $savings ? number_format($savings) : ''}}</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="row">
                                                                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                                                    <i class="fas fa-piggy-bank"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card card-stats">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <h5 class="card-title text-muted mb-0">Breakeven Time</h5>
                                                            <span class="h2 font-weight-bold mb-0" id="potential-card">{{ $breakeven ?? ''}} years</span>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="row">
                                                                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                                                    <i class="far fa-calendar-check"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="card">
                                                <!-- Card header -->
                                                <div class="card-header">
                                                    <!-- Title -->
                                                    <h5 class="h3 mb-0">Monthly Savings</h5>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <!-- Chart wrapper -->
                                                        <canvas id="chart-bar-savings"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="card">
                                                <!-- Card header -->
                                                <div class="card-header">
                                                    <!-- Title -->
                                                    <h5 class="h3 mb-0">Net Annual CO<sub>2</sub> Savings</h5>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <!-- Chart wrapper -->
                                                        <canvas id="chart-report" class="chart-canvas"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="card">
                                                <!-- Card header -->
                                                <div class="card-header">
                                                    <!-- Title -->
                                                    <h5 class="h3 mb-0">Environmental Impact</h5>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body" style="height:500px;">
                                                    <div class="row h-25 align-items-center">
                                                        <div class="col-md-2 col-sm-2 col-4">
                                                            <img style="width: 40px;" class="mx-auto" src="{{ asset('argon') }}/img/icons/common/factory.svg" />
                                                        </div>
                                                        <div class="col-md-8 col-sm-7 col-8 pl-0">
                                                            <b class="h5">Tonnes of carbon eliminated per year</b>
                                                        </div>
                                                        <div class="col-md-2 col-sm-3 col-12 text-right">
                                                            <strong>{{ $tons ?? '' }}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="row h-25 align-items-center">
                                                        <div class="col-md-2 col-sm-2 col-4">
                                                            <img style="width: 40px;" class="mx-auto" src="{{ asset('argon') }}/img/icons/common/road.svg" />
                                                        </div>
                                                        <div class="col-md-8 col-sm-7 col-8 pl-0">
                                                            <b class="h5">Cars taken off the road per year</b>
                                                        </div>
                                                        <div class="col-md-2 col-sm-3 col-12 text-right">
                                                            <strong>{{ $cars ?? '' }}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="row h-25 align-items-center">
                                                        <div class="col-md-2 col-sm-2 col-4">
                                                            <img style="width: 40px;" class="mx-auto" src="{{ asset('argon') }}/img/icons/common/tree.svg" />
                                                        </div>
                                                        <div class="col-md-8 col-sm-7 col-8 pl-0">
                                                            <b class="h5">Equivalent of new trees planted</b>
                                                        </div>
                                                        <div class="col-md-2 col-sm-3 col-12 text-right">
                                                            <strong>{{ $trees ?? ''}}</strong>
                                                        </div>
                                                    </div>
                                                    <div class="row h-25 align-items-center">
                                                        <div class="col-md-2 col-sm-2 col-4">
                                                            <img style="width: 40px;" class="mx-auto" src="{{ asset('argon') }}/img/icons/common/gas.svg" />
                                                        </div>
                                                        <div class="col-md-8 col-sm-7 col-8 pl-0">
                                                            <b class="h5">Litres of petrol/gas saved</b>
                                                        </div>
                                                        <div class="col-md-2 col-sm-3 col-12 text-right">
                                                            <strong>{{ $oil ?? ''}}</strong>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="card">
                                                <!-- Card header -->
                                                <div class="card-header">
                                                    <!-- Title -->
                                                    <h5 class="h3 mb-0">Location Details</h5>
                                                </div>
                                                <!-- Card body -->
                                                <div class="card-body" style="height:500px;">
                                                    <div id="map" style="width: 100%; height: 250px;"></div>
                                                    <div class="row p-3" style="height: 250px;">
                                                        <div class="col-12">
                                                            <h5 class="h3 text-muted">Address:</h5>
                                                            <h5 class="h3" id="google-address">{{ $address ?? '' }}</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="h3 text-muted">Lat:</h5>
                                                            <h5 class="h3">{{ $lat ?? ''}}</h5>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="h3 text-muted">Long:</h5>
                                                            <h5 class="h3">{{ $lon ?? ''}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Location Data</h3>
                                                    <p class="text-sm mb-0">
                                                    </p>
                                                </div>
                                                <div class="showing">
                                                    <h5>Showing <b id="count"></b> selected rooftops</h5>
                                                </div>
                                                <div class="table-responsive">
                                                    <table class="table" id="datatable-report">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>System Size (kWp)</th>
                                                                <th>System Cost (£)</th>
                                                                <th>Annual Generation (kWh)</th>
                                                                {{-- <th>Lifetime Generation (kWh)</th>--}}
                                                                <th>Annual Savings (£)</th>
                                                                <th>Lifetime Savings (£) </th>
                                                                <th>Breakeven (Years)</th>
                                                                <th>ROI (%)</th>
                                                                <th>Annual CO<sub>2</sub> Savings (kgs)</th>
                                                                <th>Lifetime CO<sub>2</sub> Savings (kgs) </th>
                                                                {{-- <th>Lifetime CO<sub>2</sub> Emissions (kgs) </th>--}}
                                                                {{-- <th>Latitude</th>--}}
                                                                {{-- <th>Longitude</th>--}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {{-- <tr>--}}
                                                            {{-- <td>System Size (kWp)</td>--}}
                                                            {{-- <td>Annual Generation (kWh)</td>--}}
                                                            {{-- <td>Annual Savings (£)</td>--}}
                                                            {{-- <td>Lifetime Savings (£) </td>--}}
                                                            {{-- <td>System Cost (£)</td>--}}
                                                            {{-- <td>Break-even Time (years)</td>--}}
                                                            {{-- <td>Annual CO<sub>2</sub> Savings (kg)</td>--}}
                                                            {{-- <td>Lifetime CO<sub></sub>2 Savings (kg) </td>--}}
                                                            {{-- <td>Lifetime CO<sub></sub>2 Emissions (kg) </td>--}}
                                                            {{-- <td>ROI (%)</td>--}}
                                                            {{-- <td>Latitude</td>--}}
                                                            {{-- <td>Longitude</td>--}}
                                                            {{-- </tr>--}}
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="card-body">
                                                    <h5>Disclaimer: The data presented are estimations based on standard, industry-wide assumption; but can differ from actual solar array for the rooftops displayed. Please consult a professional solar installations company for a cutomised proposal.</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="card-footer">
                              <a href="mailto: abhinav.jain@powermarket.net" target="_blank" class="text-light">Upgrade to generate your own</a>
                          </div> -->
                        </div>

                    </div>
                </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ asset('argon') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/lavalamp/js/jquery.lavalamp.min.js"></script>
    <!-- Optional JS -->
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <script src="{{ asset('js') }}/mapbox-gl.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/list.js/dist/list.min.js"></script>
    <script src="{{ asset('js') }}/numeral.min.js"></script>
    <script>
        var lat = '{!! $lat ?? '
        ' !!}';
        var lon = '{!! $lon ?? '
        ' !!}';

        function renderTable() {
            var jsonString = '{!! $geodata ?? '
            ' !!}';
            if (jsonString.length > 0) {
                //var jsonData = JSON.parse(jsonString);
                var dataArray = JSON.parse(jsonString);
                // dataArray.sort(function(a, b) {
                //     return a['breakeven_years'] - b['breakeven_years'];
                // });
                // for (var key in jsonData) {
                $('#count').append(dataArray.length);
                for (key = 0; key < dataArray.length; key++) {
                    $('#datatable-report').dataTable().fnAddData([
                        numeral(dataArray[key].system_capacity_kWp).format('0,0.0a'),
                        numeral(dataArray[key].system_cost_GBP).format('0,0.0a'),
                        numeral(dataArray[key].annual_gen_kWh).format('0,0.0a'),
                        numeral(dataArray[key].annual_gen_GBP).format('0,0.0a'),
                        numeral(dataArray[key].lifetime_gen_GBP).format('0,0.0a'),
                        dataArray[key].breakeven_years,
                        numeral(dataArray[key].lifetime_return_on_investment_percent).format('0,0.0a'),
                        numeral(dataArray[key].annual_co2_saved_kg).format('0,0.0a'),
                        numeral(dataArray[key].lifetime_co2_saved_kg).format('0,0.0a'),
                    ]);
                }
            }
        }

        function renderBarChart() {
            // Variables
            var $chart = $('#chart-bar-savings');
            // Methods
            function init($this) {
                // Chart data
                var data = {
                    labels: ['January', 'February', 'March', 'April',
                        'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December'
                    ],
                    datasets: [{
                        label: 'Savings',
                        backgroundColor: '#6074DD',
                        data: [
                            10, 23, 20, 22, 25, 22, 21, 42, 32, 13, 23, 4
                        ]
                    }, {
                        label: 'Export',
                        backgroundColor: '#1B2B4B',
                        data: [
                            12, 23, 24, 2, 22, 32, 12, 42, 32, 23, 13, 44
                        ]
                    }]
                };
                // Options
                var options = {
                    scales: {
                        xAxes: [{
                            stacked: true,
                            ticks: {
                                autoSkip: false
                            }
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    },
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            boxWidth: 50,
                        },
                    },
                }
                // Init chart
                var barStackedChart = new Chart($this, {
                    type: 'bar',
                    data: data,
                    options: options
                });
                // Save to jQuery object
                $this.data('chart', barStackedChart);
            };
            // Events
            if ($chart.length) {
                init($chart);
            }
        };

        function renderLineChart() {

            // Variables

            var $chart = $('#chart-report');
            var numOfYears = 25;
            var years = [];
            for (var i = 1; i <= numOfYears; i++) {
                years.push(i);
            }

            // Methods

            function init($this) {
                var salesChart = new Chart($this, {
                    type: 'line',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: '#6074DD',
                                    zeroLineColor: '#6074DD'
                                },
                                ticks: {}
                            }],
                            xAxes: [{
                                ticks: {
                                    autoskip: true,
                                }
                            }]
                        }
                    },
                    data: {
                        labels: years,
                        datasets: [{
                                label: 'Negative',
                                data: [-50, -20, -10],
                                borderColor: '#17192B'
                            },
                            {
                                label: 'Positive',
                                data: [-50, -20, -10, 1, 4, 8,
                                    10, 15, 19, 22, 26, 27, 29, 30,
                                    35, 39, 42, 48, 50, 52, 55, 56,
                                    59, 60, 61
                                ]
                            }
                        ],
                    }
                });

                // Save to jQuery object

                $this.data('chart', salesChart);

            };


            // Events

            if ($chart.length) {
                init($chart);
            }

        };
        mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
        $(document).ready(function() {
            var table = $('#datatable-report').DataTable({
                paging: false,
                searching: false,
                ordering: false,
                info: false
            });
            table.clear();
            table.select.info(false);
            table.select.style('single');
            table.buttons().container().appendTo($('.dataTables_length:eq(0)', table.table().container()));
            $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-default');

            renderBarChart();
            renderLineChart();
            renderTable();
        });
        var map = new mapboxgl.Map({ container: 'map',
            style: 'mapbox://styles/mapbox/satellite-streets-v11',
            bearing: -17.6,
            antialias: true,
            zoom: 16.5,
            center: [lon, lat],
            preserveDrawingBuffer: true
        });
        var marker = new mapboxgl.Marker({
                color: '#17192B'
            })
            .setLngLat([lon, lat])
            .addTo(map);
    </script>

    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    <script src="{{ asset('argon') }}/js/demo.min.js"></script>

</body>

</html>