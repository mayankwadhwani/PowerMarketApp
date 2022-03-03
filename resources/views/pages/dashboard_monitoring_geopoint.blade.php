@extends('layouts.app')

@section('content')
    <div class="container-fluid-org">
        <div class="container">
            <div class="row py-4">
                <div class="col-12">
                    <span class="h1"
                          style="color: RGBA(248, 249, 254, 1.00) !important;">{{ $orgdata['name'] }} | {{$cluster}}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-muted mb-0">Total Sites</h5>
                                    <span class="h2 font-weight-bold mb-0"
                                          id="total-sites">{{ number_format($sites_count) }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <div class="icon icon-shape bg-gradient-pm text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"
                                                style="padding-right: 1.0rem;padding-left: 1.0rem;">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to add
                                                more projects</a>
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
                                    <h5 class="card-title text-muted mb-0">Total Capacity (AC)</h5>
                                    <span class="h2 font-weight-bold mb-0"
                                          id="potential-card">{{ number_format($total_capacity) }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <div class="icon icon-shape bg-gradient-pm text-white rounded-circle shadow">
                                            <i class="ni ni-atom"></i>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"
                                                style="padding-right: 1.0rem;padding-left: 1.0rem;">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view
                                                by Weekly, Monthly, Annually</a>
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
                                    <h5 class="card-title text-muted mb-0">Total Generation</h5>
                                    <span class="h2 font-weight-bold mb-0"
                                          id="savings-card">{{ number_format($total_generation) }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <div class="icon icon-shape bg-gradient-pm text-white rounded-circle shadow">
                                            <i class="fas fa-pound-sign"></i>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"
                                                style="padding-right: 1.0rem;padding-left: 1.0rem;">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view
                                                by Weekly, Monthly, Annually</a>
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
                                    <h5 class="card-title text-muted mb-0">Total CO<sub>2</sub>
                                        Impact</h5>
                                    <span class="h2 font-weight-bold mb-0"
                                          id="co2-card">{{ number_format($total_co2) }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="row">
                                        <div class="icon icon-shape bg-gradient-pm text-white rounded-circle shadow">
                                            <i class="fas fa-smog"></i>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"
                                                style="padding-right: 1.0rem;padding-left: 1.0rem;">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view
                                                by Weekly, Monthly, Annually</a>
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
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                @if(count($geopoint['geopoint_organization_vendor']) > 0)
                    <div class="rounded py-2 px-3   bg-organization">
                        <div class=" d-flex align-items-center justify-content-end">
                            <i class="fa fa-spinner fa-spin mr-4 " style="color:white" id="loading_data"></i>
                            <div class="btn btn-primary action_period" data-period="day">D</div>
                            <div class="btn btn-primary action_period active" data-period="week">W</div>
                            <div class="btn btn-primary action_period" data-period="month">M</div>
                            <div class="btn btn-primary action_period" data-period="year">Y</div>
                            <div class="form-group mb-0">
                                <input type="text" name="chart_picker" class="form-control"/>
                            </div>
                        </div>
                        <div id="chart" class="position-relative">
                            <canvas id="geo_chart" class="w-100"></canvas>
                        </div>
                    </div>
                @endif
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
                                <img style="width: 2rem;" class="mx-auto"
                                     src="{{ asset('argon') }}/img/icons/common/factory.svg"/>
                            </div>
                            <div class="col-md-8 col-sm-7 col-8 pl-0">
                                <b class="h5">Tonnes of carbon eliminated per year</b>
                            </div>
                            <div class="col-md-2 col-sm-3 col-12 text-right">
                                <strong>{{ isset($tons) ? number_format($tons, 2) : '' }}</strong>
                            </div>
                        </div>
                        <div class="row h-25 align-items-center">
                            <div class="col-md-2 col-sm-2 col-4">
                                <img style="width: 2rem;" class="mx-auto"
                                     src="{{ asset('argon') }}/img/icons/common/road.svg"/>
                            </div>
                            <div class="col-md-8 col-sm-7 col-8 pl-0">
                                <b class="h5">Cars taken off the road per year</b>
                            </div>
                            <div class="col-md-2 col-sm-3 col-12 text-right">
                                <strong>{{ isset($cars) ? number_format($cars, 2) : '' }}</strong>
                            </div>
                        </div>
                        <div class="row h-25 align-items-center">
                            <div class="col-md-2 col-sm-2 col-4">
                                <img style="width: 2rem;" class="mx-auto"
                                     src="{{ asset('argon') }}/img/icons/common/tree.svg"/>
                            </div>
                            <div class="col-md-8 col-sm-7 col-8 pl-0">
                                <b class="h5">Equivalent of new trees planted</b>
                            </div>
                            <div class="col-md-2 col-sm-3 col-12 text-right">
                                <strong>{{ isset($trees)  ? number_format($trees) : ''}}</strong>
                            </div>
                        </div>
                        <div class="row h-25 align-items-center">
                            <div class="col-md-2 col-sm-2 col-4">
                                <img style="width: 2rem;" class="mx-auto"
                                     src="{{ asset('argon') }}/img/icons/common/gas.svg"/>
                            </div>
                            <div class="col-md-8 col-sm-7 col-8 pl-0">
                                <b class="h5">Litres of petrol/gas saved</b>
                            </div>
                            <div class="col-md-2 col-sm-3 col-12 text-right">
                                <strong>{{ isset($oil) ? number_format($oil) : ''}}</strong>
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
                        <div id="map" style="width: 100%; height: 250px;" class="map-border"></div>
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
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('css') }}/report.css"/>
    <link rel="stylesheet" href="{{ asset('css') }}/mapbox-gl.css"/>
    <link rel="stylesheet" href="{{ asset('css') }}/dashboard.css"/>
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <style>
        .mapboxgl-popup-close-button {
            color: black;
            font-size: 2rem;
        }

        div#datatable-monitoring_wrapper td {
            vertical-align: middle;
        }
    </style>
@endpush
@push('js')
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('js') }}/mapbox-gl.js"></script>
    <script>
      let colors = [
        {
          border: 'rgba(55,155,155,1)',
          bg: 'rgba(55,155,155,0.3)'
        },
        {
          border: 'rgba(255,155,155,1)',
          bg: 'rgba(255,155,155,0.3)'
        },
      ]
      let dataSets = [];
      let geo_vendor_id = {{count($geopoint['geopoint_organization_vendor']) > 0 ? $geopoint['geopoint_organization_vendor'][0]['id'] : 'null'}};
      let start_date = moment().subtract(1, 'week').format('YYYY-MM-DD')
      let end_date = moment().format('YYYY-MM-DD');

      let lat = '{!! $lat ?? '' !!}';
      let lon = '{!! $lon ?? '' !!}';

      const getData = (data_id, start = null, end = null) => {
        return new Promise(((resolve, reject) => {
          $.get(`/monitoringData/${data_id}?date_start=${start ? start : start_date}&date_end=${end ? end : end_date}`).then((data) => {
            resolve(data)
          }).catch((err) => {
            reject(err);
          })
        }))
      }

      function renderMap() {
        mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
        map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/satellite-streets-v11',
          // bearing: -17.6,
          antialias: true,
          zoom: 16.5,
          center: [lon, lat]
        });
        let marker = new mapboxgl.Marker({
          color: '#F6A22B'
        })
            .setLngLat([lon, lat])
            .addTo(map);
      }


      let ctx = null;
      let chart = null;
      let datePick = null;
      let construct_chart = () => {
        ctx = document.getElementById('geo_chart').getContext('2d');
        chart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [],
          },
          options: {
            elements: {
              line: {
                tension: 0 // disables bezier curves
              }
            },
            legend: {
              position: 'top',
              display: false
            },

            tooltips: {
              callbacks: {
                title: (item, data) => {
                  return moment(data.labels[item[0].index], 'YYYY-MM-DD-HH-mm').format('YYYY-MM-DD HH:mm')
                }
              }
            },
            scales: {
              xAxes: [{
                ticks: {
                  maxRotation: 20,
                  callback: function (value, index, values) {
                    let vals = value.split('-');
                    let res = '';
                    switch (vals.length) {
                      case 5:
                        if (moment(end_date).diff(start_date, 'days') <= 2) {
                          res = moment(value, 'YYYY-MM-DD-HH-mm').format('HH:mm')
                        } else if (moment(end_date).diff(start_date, 'days') <= 7) {
                          res = moment(value, 'YYYY-MM-DD-HH-mm').format('ddd HH:mm')
                        } else if (moment(end_date).diff(start_date, 'days') <= 31) {
                          res = moment(value, 'YYYY-MM-DD-HH-mm').format('YYYY-MM-DD HH:mm')
                        }
                        break;
                      case 3:
                        res = moment(value, 'YYYY-MM-DD').format('YYYY-MM-DD')
                        break;
                      case 2:
                        res = moment(value, 'YYYY-MM').format('MMM YYYY')
                        break;
                    }
                    return res ? res : value //moment().parse(value).format('YYYY MMM DD,  HH:mm');
                  }
                }
              }],
              yAxes: [{
                ticks: {
                  beginAtZero: true,
                  callback: function (value) {
                    return value + ' kWh'
                  }
                }
              }]
            }
          },
        });
        datePick = $('input[name="chart_picker"]').daterangepicker({
          startDate: moment().startOf('year').toDate(),
          endDate: moment().toDate(),
          opens: 'left'
        }, function (start, end, label) {
          start_date = start.format('YYYY-MM-DD')
          end_date = end.format('YYYY-MM-DD')
          changeGraph();
          $('.action_period').removeClass('active');
        });
        changeGraph();
      }
      let changeGraph = () => {
        $('#loading_data').show();
        getData(geo_vendor_id).then((data) => {
          let labels = Object.keys(data);
          let values = Object.values(data);
          chart.data.labels = labels;
          chart.data.datasets = [{
            label: 'Summary',
            data: values,
            backgroundColor: 'transparent',//'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
          }]
          chart.update();
          $('#loading_data').hide();
        })
      }

      $(document).ready(function () {
        renderMap();
        let body = $('body');
        if (geo_vendor_id) {
          construct_chart();
        }
        $('[data-toggle="tooltip"]').tooltip();
        window.dispatchEvent(new Event('resize'));

        body.on('click', '.action_period', function () {
          $('.action_period').removeClass('active');
          let period = $(this).data('period');
          end_date = moment().format('YYYY-MM-DD')
          $(this).addClass('active');
          let chart_picker = $('input[name="chart_picker"]').data('daterangepicker')
          switch (period) {
            case 'day':
              start_date = moment().subtract(1, 'day').format('YYYY-MM-DD')
              chart_picker.setStartDate(moment().toDate());
              break
            case 'week':
              start_date = moment().subtract(1, 'week').format('YYYY-MM-DD')
              chart_picker.setStartDate(moment().subtract(1, 'week').toDate());
              break
            case 'month':
              start_date = moment().subtract(1, 'month').format('YYYY-MM-DD')
              chart_picker.setStartDate(moment().subtract(1, 'month').toDate());
              break
            case 'year':
              start_date = moment().subtract(1, 'year').format('YYYY-MM-DD')
              chart_picker.setStartDate(moment().subtract(1, 'year').toDate());
              break
          }
          chart_picker.setEndDate(moment().toDate());
          changeGraph()
        })


      });
    </script>
@endpush
