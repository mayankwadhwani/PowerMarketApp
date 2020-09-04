@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Default') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-primary border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Tasks completed</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">8/24</span>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-info border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Contacts</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">123/267</span>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-danger border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Items sold</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">200/300</span>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-default border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Notifications</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">50/62</span>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card border-0">
                    {{--                    <div id="map-custom" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 600px;"></div>--}}
                    <div id='map' class="map-canvas" style='height: 600px;'></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Location Data</h3>
                        <p class="text-sm mb-0">
                        </p>
                    </div>
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Roof Class</th>
                                <th>Area Sq.Mts</th>
                                <th>Panels</th>
                                <th>Capacity</th>
                                <th>Annual Gen</th>
                                <th>Annual GBP</th>
                                <th>System Cost</th>
                                <th>Breakeven Years</th>
                                <th>Lifetime ROI</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Roof Class</th>
                                <th>Area Sq.Mts</th>
                                <th>Panels</th>
                                <th>Capacity</th>
                                <th>Annual Gen</th>
                                <th>Annual GBP</th>
                                <th>System Cost</th>
                                <th>Breakeven Years</th>
                                <th>Lifetime ROI</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>Id</td>
                                <td>Latitude</td>
                                <td>Longitude</td>
                                <td>Roof Class</td>
                                <td>Area Sq.Mts</td>
                                <td>Panels</td>
                                <td>Capacity</td>
                                <td>Annual Gen</td>
                                <td>Annual GBP</td>
                                <td>System Cost</td>
                                <td>Breakeven Years</td>
                                <td>Lifetime ROI</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
@endpush
@push('js')
<script src="{{ asset('argon') }}/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
<script src="{{ asset('argon') }}/vendor/list.js/dist/list.min.js"></script>
<script>
    function renderMap(){
        mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v10',
            pitch: 45,
            bearing: -17.6,
            antialias: true
        });
        var jsonString = '{!! auth()->user()->jsonData !!}';
        var features = [];
        var bounds = new mapboxgl.LngLatBounds();
        if(jsonString.length>0) {
            var jsonData = JSON.parse(jsonString);
            $("#datatable-basic").DataTable().clear();
            var dataArray = jsonData['regions'];
            // for (var key in jsonData) {
            for (key=0; key<dataArray.length; key++) {
                var featureString = '{"type": "Feature", "properties": ' +
                    '{"description":"' +
                    '<div class=\\"card\\" style=\\"margin-bottom:5px;margin-top:5px;margin-right:5px;margin-left:5px;\\">' +
                    '   <div class=\\"card-header\\">' +
                    '       <h5 class=\\"h3 mb-0 \\">Area: '+dataArray[key].area_sqm+'</h5>' +
                    '   </div>' +
                    '   <div class=\\"card-body\\">' +
                    '       <p class=\\"card-text mb-4 \\">' +
                    '       Id: '+dataArray[key].id+'<br/> '+
                    '       Roof Class: '+dataArray[key].roofclass+'<br/> '+
                    '       Num of Panels: '+dataArray[key].numpanels+'<br/> '+
                    '       Capacity: '+dataArray[key].system_capacity_kWp+' kWp<br/> '+
                    '       Annual kWh: '+dataArray[key].annual_gen_kWh+'<br/> '+
                    '       Annual Cost: '+dataArray[key].annual_gen_GBP+' GBP<br/> '+
                    '       System Cost: '+dataArray[key].system_cost_GBP+' GBP<br/> '+
                    '       Breakeven Years: '+dataArray[key].breakeven_years+'<br/> '+
                    '       Annual CO2 Saved: '+dataArray[key].annual_co2_saved_kg+'<br/> '+
                    '       Lifetime CO2 Saved: '+dataArray[key].lifetime_co2_saved_kg+'<br/> '+
                    '       Lifetime ROI: '+dataArray[key].lifetime_return_on_investment_percent+'<br/> '+
                    '       </p>' +
                    '       <a href=\\"https://mapping.powermarket.ai\\" class=\\"btn btn-primary \\" ' +
                    '       target=\\"_blank\\" title=\\"Opens in a new window\\">View Details</a>' +
                    '   </div>' +
                    '</div>", ' +
                    '"breakeven_years": '+dataArray[key].breakeven_years+'}, ' +
                    '"geometry": {"type": "Point", "coordinates": ' +
                    '['+dataArray[key].centre_lon+','+ dataArray[key].centre_lat+']}}'
                features.push(JSON.parse(featureString));
                $('#datatable-basic').dataTable().fnAddData( [
                    dataArray[key].id,
                    dataArray[key].centre_lat,
                    dataArray[key].centre_lon,
                    dataArray[key].roofclass,
                    dataArray[key].area_sqm,
                    dataArray[key].numpanels,
                    dataArray[key].system_capacity_kWp,
                    dataArray[key].annual_gen_kWh,
                    dataArray[key].annual_gen_GBP,
                    dataArray[key].system_cost_GBP,
                    dataArray[key].breakeven_years,
                    dataArray[key].lifetime_return_on_investment_percent,
                ]);
            }
            features.forEach(function(feature) {
                bounds.extend(feature.geometry.coordinates);
            });
        }
        map.fitBounds(bounds);
        map.on('load', function() {
            var layers = map.getStyle().layers;

            var labelLayerId;
            for (var i = 0; i < layers.length; i++) {
                if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                    labelLayerId = layers[i].id;
                    break;
                }
            }
            map.addSource('places', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': features
                }
            });
            map.addLayer({
                'id': 'places',
                'type': 'circle',
                'source': 'places',
                'paint': {
                    // make circles larger as the user zooms from z12 to z22
                    'circle-radius': {
                        'base': 1.75,
                        'stops': [
                            [12, 2],
                            [22, 180]
                        ]
                    },
                    // color circles by breakeven_years, using a match expression
                    // https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-match
                    'circle-color': {
                        property: 'breakeven_years',
                        stops: [
                            [7, '#63c54f'],
                            [8, '#e0b542'],
                            [9, '#e0b542'],
                            [10, '#cf7f3e'],
                            [11, '#cf7f3e'],
                            [12, '#bd403a'],
                            [100, '#bd403a'],
                        ]
                    }
                }
            });
            // When a click event occurs on a feature in the places layer, open a popup at the
            // location of the feature, with description HTML from its properties.
            map.on('click', 'places', function(e) {
                var coordinates = e.features[0].geometry.coordinates.slice();
                var description = e.features[0].properties.description;

                // Ensure that if the map is zoomed out such that multiple
                // copies of the feature are visible, the popup appears
                // over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .setMaxWidth("500px")
                    .addTo(map);
            });

            // Change the cursor to a pointer when the mouse is over the places layer.
            map.on('mouseenter', 'places', function() {
                map.getCanvas().style.cursor = 'pointer';
            });

            // Change it back to a pointer when it leaves.
            map.on('mouseleave', 'places', function() {
                map.getCanvas().style.cursor = '';
            });
            map.addLayer(
                {
                    'id': '3d-buildings',
                    'source': 'composite',
                    'source-layer': 'building',
                    'filter': ['==', 'extrude', 'true'],
                    'type': 'fill-extrusion',
                    'minzoom': 15,
                    'paint': {
                        'fill-extrusion-color': '#aaa',
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            15,
                            0,
                            15.05,
                            ['get', 'height']
                        ],
                        'fill-extrusion-base': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            15,
                            0,
                            15.05,
                            ['get', 'min_height']
                        ],
                        'fill-extrusion-opacity': 0.6
                    }
                },
                labelLayerId
            );
        });
    }
    $( document ).ready(function() {
        renderMap();
    });
</script>
@endpush
