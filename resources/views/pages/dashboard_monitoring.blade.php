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
                                    <span class="h2 font-weight-bold mb-0" id="potential-card">{{ number_format($total_capacity) }}</span>
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
                                    <span class="h2 font-weight-bold mb-0" id="savings-card">{{ number_format($total_generation) }}</span>
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
                                    <span class="h2 font-weight-bold mb-0" id="co2-card">{{ number_format($total_co2) }}</span>
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
                @if(count($geopoint_organization_vendors) > 0)
                    <div class="rounded py-2 px-3   bg-organization">
                        <div class=" d-flex align-items-center justify-content-end">
                            <i class="fa fa-spinner fa-spin mr-4 " style="color:white" id="loading_data"></i>
                            <div class="btn btn-primary action_period" data-period="day">D</div>
                            <div class="btn btn-primary action_period" data-period="week">W</div>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Solar Sites</h3>
                    </div>
                    <div class="table-responsive" style="padding-top:10px;">
                        <table class="table" id="datatable-monitoring">
                            <thead class="thead-light">
                            <tr>
                                <th></th>
                                <th>Address</th>
                                <th>Capacity</th>
                                <th>Daily Generation</th>
                                <th>CO2 Impact To Date (lifetime_co2_saved_kg)</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <!-- Title -->
                        <h5 class="h3 mb-0">Location Details</h5>
                    </div>
                    <!-- Card body -->
                    <div class="card-body" style="height:500px;">
                        <div id="map" style="width: 100%; height: 450px;" class="map-border"></div>
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
        let mapData = {!! json_encode($mapData) !!};
        let colors = [
            {
                border: 'rgba(55,155,155,1)',
                bg: 'rgba(55,155,155,0.3)'
            },
            {
                border: 'rgba(255,155,155,1)',
                bg: 'rgba(255,155,155,0.3)'
            },
            {
                border: 'rgba(255,255,155,1)',
                bg: 'rgba(255,255,155,0.3)'
            },
            {
                border: 'rgba(0,63,9,1)',
                bg: 'rgba(0,63,9,0.3)'
            },
            {
                border: 'rgba(47,75,124,1)',
                bg: 'rgba(47,75,124,0.3)'
            },
            {
                border: 'rgba(102,81,145,1)',
                bg: 'rgba(102,81,145,0.3)'
            },
            {
                border: 'rgba(160,81,149,1)',
                bg: 'rgba(160,81,149,0.3)'
            },
            {
                border: 'rgba(212,80,135,1)',
                bg: 'rgba(212,80,135,0.3)'
            },
            {
                border: 'rgba(249,93,106,1)',
                bg: 'rgba(249,93,106,0.3)'
            },
            {
                border: 'rgba(255,124,67,1)',
                bg: 'rgba(255,124,67,0.3)'
            },
            {
                border: 'rgba(255,166,0,1)',
                bg: 'rgba(255,166,0,0.3)'
            },
        ]
        let dataSets = [];
        let geo_vendor_id = {{count($geopoint_organization_vendors) > 0 ? $geopoint_organization_vendors[0]['id'] : 'null'}};
        let cluster_id = {{$cluster_id}};
        let start_date = moment().startOf('year').format('YYYY-MM-DD');
        let end_date = moment().format('YYYY-MM-DD');
        let active_sites = [];
        let features = []
        let clicked_layer, clicked_popup;
        const getData = (data_id, start = null, end = null, cluster = null) => {
            return new Promise(((resolve, reject) => {
                $.get(`/monitoringData/${data_id}${cluster ? '/summary' : ''}?date_start=${start ? start : start_date}&date_end=${end ? end : end_date}`).then((data) => {
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
                pitch: 10,
                bearing: -17.6,
                antialias: true,
            });

            let bounds = new mapboxgl.LngLatBounds();
            mapData.forEach(item => {
                if (item.breakeven_years == 0) {
                    let feature = {
                        type: "Feature",
                        properties: {
                            description: `
                      <div class="card popup-card">
                      <div class="card-body" style="padding-top:0.5rem;padding-bottom:0.5rem; padding-left:1rem; padding-right:1rem;">
                        <p class="card-text card-empty-error">
                          There is no solar data for this location, either because the site is unsuitable (e.g. due to shadowing), or the available area is too small to be financially viable.
                        </p>
                      </div>
                      </div>`,
                            years: item.breakeven_years,
                            id: item.id,
                            area: item.area_sqm,
                            panels: item.numpanels,
                            roi: item.lifetime_return_on_investment_percent,
                            existingSolar: item.existingsolar,
                            solarData: 'Y'
                        },
                        geometry: {
                            type: item.latLon.type,
                            coordinates: item.latLon.coordinates
                        }
                    };
                    features.push(feature);
                } else {
                    let feature = {
                        type: "Feature",
                        properties: {
                            description: `
                      <div class="card popup-card">
                      <div class="card-body" style="padding-top:0.5rem;padding-bottom:0.5rem; padding-left:1rem; padding-right:1rem;">
                      <p class="card-text">
                      <strong>Break-even:</strong> ${item.breakeven_years} years</br>
                      <strong>System Size:</strong> ${numeral(item.system_capacity_kWp).format('0,0.0a')} kWp<br/>
                      <strong>System Cost:</strong> {{ $orgdata['currencysymbol'] }} ${numeral(item.system_cost_GBP).format('0,0.0a')}<br/>
                      <strong>Lifetime Savings:</strong> {{ $orgdata['currencysymbol'] }} ${numeral(item.lifetime_gen_GBP).format('0,0.0a')}<br/>
                      <strong>Lifetime CO<sub>2</sub> saving:</strong> ${numeral(item.lifetime_co2_saved_kg).format('0,0.0a')} kgs<br/>
                      <strong>IRR: </strong> ${item.irr_discounted_percent ? item.irr_discounted_percent : 0}%<br/>
                      </p>
                      </div>
                      </div>`,
                            years: item.breakeven_years,
                            id: item.id,
                            area: item.area_sqm,
                            panels: item.numpanels,
                            roi: item.lifetime_return_on_investment_percent,
                            existingSolar: item.existingsolar,
                            solarData: 'N'
                        },
                        geometry: {
                            type: item.latLon.type,
                            coordinates: item.latLon.coordinates
                        }
                    };
                    features.push(feature);
                }

                bounds.extend(item.latLon.coordinates);
            })
            map.on('load', function () {
                map.loadImage('../../svg/map-marker-alt-solid.png', function (error, image) {
                    if (error) throw error;
                    map.addImage('marker-icon', image, {
                        'sdf': true
                    });
                    map.addSource('places', {
                        'type': 'geojson',
                        'data': {
                            'type': 'FeatureCollection',
                            'features': features
                        },
                        cluster: true,
                        clusterMaxZoom: 16, // Max zoom to cluster points on
                        clusterRadius: 60
                    });
                    map.addLayer({
                        'id': 'places',
                        'type': 'symbol',
                        'source': 'places',
                        'layout': {
                            'icon-image': 'marker-icon',
                            'icon-allow-overlap': true,
                            "icon-size": ['interpolate', ['linear'],
                                ['zoom'], 10, 1.2, 15, 1
                            ]
                        },
                        'paint': {
                            'icon-color': '#F6A22B'
                        }
                    })

                    map.on('click', 'places', function (e) {
                        if (e.originalEvent.cancelBubble) {
                            return;
                        }
                        clicked_layer = 'places';
                        let coordinates = e.features[0].geometry.coordinates.slice();
                        let description = e.features[0].properties.description;

                        // Ensure that if the map is zoomed out such that multiple
                        // copies of the feature are visible, the popup appears
                        // over the copy being pointed to.
                        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                        }

                        let popup = new mapboxgl.Popup()
                            .setLngLat(coordinates)
                            .setHTML(description)
                            .setMaxWidth("500px")
                            .on('open', function (e) {
                                clicked_popup = e.target
                            })
                            .addTo(map);
                        e.originalEvent.cancelBubble = true;
                    });
                    // Change the cursor to a pointer when the mouse is over the layer.
                    map.on('mouseenter', 'places', function () {
                        map.getCanvas().style.cursor = 'pointer';
                    });

                    // Change it back to a pointer when it leaves.
                    map.on('mouseleave', 'places', function () {
                        map.getCanvas().style.cursor = '';
                    });
                })
            })

            map.fitBounds(bounds)
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
                    legend: {
                        position: 'top',
                        display: true
                    }
                }
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
            if (active_sites.length > 0) {

                let sets = [];
                let labels = [];
                let i = 1;
                active_sites.forEach(async (site, ind) => {
                    let data = await getData(site.org_vendor_id)
                    labels = Object.keys(data);
                    let values = Object.values(data);
                    sets.push({
                        label: site.name ? site.name : site.id,
                        data: values,
                        org_vendor_id: site.org_vendor_id,
                        // backgroundColor: colors[ind].bg,
                        borderColor: colors[ind].border,
                    })
                    if (i === active_sites.length) {
                        chart.data.labels = labels;
                        chart.data.datasets = sets;
                        chart.update();
                        $('#loading_data').hide();
                    }
                    i++;
                })
            } else {
                getData(cluster_id, null, null, 'cluster').then((data) => {
                    let labels = Object.keys(data);
                    let values = Object.values(data);
                    chart.data.labels = labels;
                    chart.data.datasets = [{
                        label: 'Summary',
                        data: values,
                        // backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                    }]
                    chart.update();
                    $('#loading_data').hide();
                })
            }
        }
        let graph_add = (site) => {
            $('#loading_data').show();
            getData(site.org_vendor_id).then((data) => {
                let labels = Object.keys(data);
                let values = Object.values(data);
                if (active_sites.length === 1) {
                    chart.data.datasets = [{
                        label: site.name ? site.name : site.id,
                        data: values,
                        org_id: site.id,
                        // backgroundColor: colors[0].bg,
                        borderColor: colors[0].border,
                    }]
                } else {
                    chart.data.datasets.push({
                        label: site.name ? site.name : site.id,
                        data: values,
                        org_id: site.id,
                        // backgroundColor: colors[active_sites.length].bg,
                        borderColor: colors[active_sites.length].border,
                    })
                }
                chart.data.labels = labels;
                chart.update();
                $('#loading_data').hide();
            })
        }
        let graph_remove = (site) => {
            chart.data.datasets = chart.data.datasets.filter(ds => ds.org_id != site.id)
            console.log(chart.data.datasets)
            chart.update();
            if(chart.data.datasets.length === 0){
                $('#loading_data').show();
                getData(cluster_id, null, null, 'cluster').then((data) => {
                    let labels = Object.keys(data);
                    let values = Object.values(data);
                    chart.data.labels = labels;
                    chart.data.datasets = [{
                        label: 'Summary',
                        data: values,
                        // backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                    }]
                    chart.update();
                    $('#loading_data').hide();
                })
            }
        }
        let initTable = () => {
            let table = $('#datatable-monitoring').DataTable({
                "processing": true,
                "serverSide": true,
                responsive: true,
                "ajax": "/dashboard/monitoring/{{$cluster_id}}/sites",
                sAjaxDataProp: 'data',
                // paging: false,
                // searching: false,
                // ordering: false,
                rowId: 'id',
                info: false,
                language: {
                    paginate: {
                        previous: "<i class='fas fa-angle-left'>",
                        next: "<i class='fas fa-angle-right'>"
                    }
                },
                columns: [
                    {
                        data: 'id',
                        render: (data, index, row) => {
                            let checked = !!active_sites.find(item => item.id == data)
                            return '<div class="flex align-items-center"><i class="fa fa-map-marker mr-2 fa-2x location_pin" data-id="' + row.id + '"></i>' + (row.geopoint_organization_vendor.length > 0 ? '<input type="checkbox" ' + (checked ? 'checked' : '') + ' class="site_toggle" ' +
                                'value="' + data + '" ' +
                                'data-org_vendor_id="' + row.geopoint_organization_vendor[0].id + '" ' +
                                'data-name="' + row.site_name + '">' : '') + '</div>';
                        }
                    },
                    {
                        data: 'address',
                        render: (data, index, row) => {
                            return '<a href="/dashboard/monitoring/{{$cluster}}/geopoint/' + row.id + '">' + data + '</a>';
                        }
                    },
                    {data: 'system_capacity_kWp'},
                    {
                        data: 'id',
                        className: 'graph_column',
                        sortable: false,
                        orderable: false,
                        render: (data, index, row) => {
                            return row.geopoint_organization_vendor.length ? '<i class="fa fa-spinner fa-spin " style="color:gray"></i><canvas id="line_chart_' + row.id + '" style="height: 75px;width: 500px;display: none" data-id="' + row.geopoint_organization_vendor[0].id + '" class="line_chart">' : '';
                        }
                    },
                    {data: 'lifetime_co2_saved_kg'},
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [0]
                }],

                drawCallback: () => {
                    $('.line_chart').each(function (index) {
                        let start_date = moment().subtract('1', 'days').format('YYYY-MM-DD');
                        let end_date = moment().format('YYYY-MM-DD');
                        getData($(this).data('id'), start_date, end_date).then((data) => {
                            $(this).parent('td').find('.fa').remove();
                            $(this).show();
                            let ctx_line = $(this).get(0).getContext('2d');
                            new Chart(ctx_line, {
                                type: 'line',
                                data: {
                                    labels: Object.keys(data),
                                    datasets: [{
                                        label: '',
                                        data: Object.values(data),
                                        borderColor: 'rgba(0,0,0,0.2)',
                                    }],
                                },
                                options: {
                                    scales: {
                                        xAxes: [{
                                            display: false,
                                        }],
                                        yAxes: [{
                                            display: false,
                                        }],
                                    }
                                }
                            });
                        })
                    });
                }
            });
            table.buttons().container().appendTo($('.dataTables_length:eq(0)', table.table().container()));
            $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-default');
            table.on('change', '.site_toggle', function () {
                let check = $(this).prop("checked");
                let val = $(this).val();
                if (check) {
                    active_sites.push({
                        id: val,
                        name: $(this).data('name'),
                        org_vendor_id: $(this).data('org_vendor_id'),
                    });
                    graph_add({
                        id: val,
                        name: $(this).data('name'),
                        org_vendor_id: $(this).data('org_vendor_id'),
                    })
                } else {
                    let ind = active_sites.findIndex(elem => elem === val);
                    active_sites.splice(ind, 1);
                    graph_remove({id: val})
                }
                // changeGraph();
            })

        }

        $(document).ready(function () {
            renderMap();
            initTable();
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

            body.on('click', '.location_pin', function () {
                let point = $(this).data('id')
                let feature = features.find(item => item.properties.id == point);
                let coordinates = feature.geometry.coordinates;
                let description = feature.properties.description;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                map.flyTo({
                    center: coordinates
                });
                $('html, body').animate({
                    scrollTop: $("#map").offset().top
                }, 2000);
                let popup = new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .setMaxWidth("500px")
                    .addTo(map);

            })

        });
    </script>
@endpush
