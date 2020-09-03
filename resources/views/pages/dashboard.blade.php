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
                                <th>Roof Class</th>
                                <th>Area Sq.Mts</th>
                                <th>Panels</th>
                                <th>Capacity</th>
                                <th>Annual Gen</th>
                                <th>Annual GBP</th>
                                <th>System Cost</th>
                                <th>Payback Years</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Roof Class</th>
                                <th>Area Sq.Mts</th>
                                <th>Panels</th>
                                <th>Capacity</th>
                                <th>Annual Gen</th>
                                <th>Annual GBP</th>
                                <th>System Cost</th>
                                <th>Payback Years</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>Roof Class</td>
                                <td>Area Sq.Mts</td>
                                <td>Panels</td>
                                <td>Capacity</td>
                                <td>Annual Gen</td>
                                <td>Annual GBP</td>
                                <td>System Cost</td>
                                <td>Payback Years</td>
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
    $( document ).ready(function() {
        var jsonString = '{!! auth()->user()->jsonData !!}';
        var features = [];
        var bounds = new mapboxgl.LngLatBounds();
        if(jsonString.length>0) {
            var jsonData = JSON.parse(jsonString);
            $("#datatable-basic").DataTable().clear();
            for (var key in jsonData) {
                features.push(JSON.parse('{"type": "Feature", "properties": ' +
                    '{"description":"<p><strong>Area: '+jsonData[key].area_sqm+'</strong><br/>' +
                    'Roof Class: '+jsonData[key].roofclass+'<br/> '+
                    'Num of Panels: '+jsonData[key].numpanels+'<br/> '+
                    'Capacity: '+jsonData[key].system_capacity_kWp+' kWp<br/> '+
                    'Annual kWh: '+jsonData[key].annual_gen_kWh+'<br/> '+
                    'Anuual Cost: '+jsonData[key].annual_gen_GBP+' GBP<br/> '+
                    'System Cost: '+jsonData[key].system_cost_GBP+' GBP<br/> '+
                    'Payback Years: '+jsonData[key].payback_years+'<br/> '+
                    '<a href=\\"https://mapping.powermarket.ai/\\" target=\\"_blank\\" title=\\"Opens in a new window\\">' +
                    'View details</a></p>", ' +
                    '"numpanels": '+jsonData[key].numpanels+'}, ' +
                    '"geometry": {"type": "Point", "coordinates": ' +
                    '['+jsonData[key].lon+','+ jsonData[key].lat+']}}'));
                $('#datatable-basic').dataTable().fnAddData( [
                    jsonData[key].roofclass,
                    jsonData[key].area_sqm,
                    jsonData[key].numpanels,
                    jsonData[key].system_capacity_kWp,
                    jsonData[key].annual_gen_kWh,
                    jsonData[key].annual_gen_GBP,
                    jsonData[key].system_cost_GBP,
                    jsonData[key].payback_years,
                ]);
            }
            features.forEach(function(feature) {
                bounds.extend(feature.geometry.coordinates);
            });
        }
        mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v10',
            pitch: 45,
            bearing: -17.6,
            antialias: true
        });
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
                    // color circles by numpanels, using a match expression
                    // https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-match
                    'circle-color': {
                        property: 'numpanels',
                        stops: [
                            [0, '#f1f075'],
                            [10, '#e55e5e'],
                            [100, '#fbb03b']
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
    });
</script>
@endpush
