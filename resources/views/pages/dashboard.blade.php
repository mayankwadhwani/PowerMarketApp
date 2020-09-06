@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Dashboard') }}
            @endslot

{{--            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>--}}
{{--            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>--}}
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
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Projects
                                    <i class="ni ni-chart-pie-35" style="margin-left: 10px;"></i>
{{--                                    <div class="icon icon-shape text-white rounded-circle">--}}
                                        {{--                                    <i class="ni ni-active-40"></i>--}}

{{--                                    </div>--}}
                                </h5>

                                <span class="h2 font-weight-bold mb-0 text-white">1</span>
{{--                                <div class="progress progress-xs mt-3 mb-0">--}}
{{--                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-auto">

                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to add more projects</a>
                                </div>
                            </div>
                        </div>
{{--                        <p class="mt-3 mb-0 text-sm">--}}
{{--                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>--}}
{{--                        </p>--}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-info border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Solar Potential
                                    <i class="ni ni-atom" style="margin-left: 10px;"></i>
                                </h5>
                                <span class="h2 font-weight-bold mb-0 text-white" id="potential-card"></span>
{{--                                <div class="progress progress-xs mt-3 mb-0">--}}
{{--                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
                                </div>
                            </div>
                        </div>
{{--                        <p class="mt-3 mb-0 text-sm">--}}
{{--                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>--}}
{{--                        </p>--}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-danger border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Lifetime savings
                                    <i class="fas fa-pound-sign" style="margin-left: 10px;"></i>
                                </h5>
                                <span class="h2 font-weight-bold mb-0 text-white" id="savings-card"></span>
{{--                                <div class="progress progress-xs mt-3 mb-0">--}}
{{--                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
                                </div>
                            </div>
                        </div>
{{--                        <p class="mt-3 mb-0 text-sm">--}}
{{--                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>--}}
{{--                        </p>--}}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-default border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Lifetime CO<sub>2</sub> savings
                                    <i class="fas fa-smog" style="margin-left: 10px;"></i>
                                </h5>
                                <span class="h2 font-weight-bold mb-0 text-white" id="co2-card"></span>
{{--                                <div class="progress progress-xs mt-3 mb-0">--}}
{{--                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
                                </div>
                            </div>
                        </div>
{{--                        <p class="mt-3 mb-0 text-sm">--}}
{{--                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>--}}
{{--                        </p>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-right" style="margin-bottom: 10px;">
                <span class="text-nowrap" style="font-size: .75rem">You are browsing by &nbsp;</span>
                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Break Even Time
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to enable more filters</a>
                </div>
{{--                <a href="#" class="btn btn-sm btn-neutral">{{ __('New') }}</a>--}}
{{--                <a href="#" class="btn btn-sm btn-neutral">{{ __('Filters') }}</a>--}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card border-0">
                    {{--                    <div id="map-custom" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 600px;"></div>--}}
                    <div id='map' class="map-canvas" style='height: 600px;'></div>
                    <nav id="filter-group" class="filter-group">
                        <span style="background-color: #4ea0da;margin-bottom: 0px;display: block;border-bottom: 1px solid rgba(0, 0, 0, 0.25);padding: 10px;">
                            Breakeven Years</span>
                    </nav>
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
                                <th>System Capacity (kWp)</th>
                                <th>Annual Generation (kWh)</th>
                                <th>Annual Generation (£)</th>
                                <th>Lifetime Generation (£) </th>
                                <th>System Cost (£)</th>
                                <th>Breakeven Time</th>
                                <th>Annual CO<sub>2</sub> Savings (kg)</th>
                                <th>Lifetime CO<sub>2</sub> Savings (kg) </th>
                                <th>ROI (%)</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>System Capacity (kWp)</th>
                                <th>Annual Generation (kWh)</th>
                                <th>Annual Generation (£)</th>
                                <th>Lifetime Generation (£) </th>
                                <th>System Cost (£)</th>
                                <th>Breakeven Time</th>
                                <th>Annual CO<sub>2</sub> Savings (kg)</th>
                                <th>Lifetime CO<sub>2</sub> Savings (kg) </th>
                                <th>ROI (%)</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>Id</td>
                                <td>Latitude</td>
                                <td>Longitude</td>
                                <td>System Capacity (kWp)</td>
                                <td>Annual Generation (kWh)</td>
                                <td>Annual Generation (£)</td>
                                <td>Lifetime Generation (£) </td>
                                <td>System Cost (£)</td>
                                <td>Breakeven Time</td>
                                <td>Annual CO<sub>2</sub> Savings (kg)</td>
                                <td>Lifetime CO<sub></sub>2 Savings (kg) </td>
                                <td>ROI (%)</td>
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
    mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/light-v10',
        pitch: 45,
        bearing: -17.6,
        antialias: true
    });
    var layerPrefix = 'layer-years-';
    var yearColors = [
        [5, '#63c54f'],
        [6, '#63c54f'],
        [7, '#63c54f'],
        [8, '#e0b542'],
        [9, '#e0b542'],
        [10, '#cf7f3e'],
        [11, '#cf7f3e'],
        [12, '#bd403a'],
        [13, '#bd403a'],
        [14, '#bd403a']];
    var yearColorMap = new Map(yearColors);
    function renderMap(){
        var jsonString = '{!! auth()->user()->jsonData !!}';
        var features = [];
        var bounds = new mapboxgl.LngLatBounds();
        var filterGroup = document.getElementById('filter-group');
        if(jsonString.length>0) {
            var jsonData = JSON.parse(jsonString);
            var dataArray = jsonData['regions'];
            dataArray.sort(function (a, b) {
                return a['breakeven_years']- b['breakeven_years'];
            });
            var potential = 0;
            var savings = 0;
            var co2 = 0;

            // for (var key in jsonData) {
            for (key=0; key<dataArray.length; key++) {
                var featureString = '{"type": "Feature", "properties": ' +
                    '{"description":"' +
                    '<div class=\\"card\\" style=\\"margin-bottom:5px;margin-top:5px;margin-right:5px;margin-left:5px;\\">' +
                    '   <div class=\\"card-header\\" style=\\"padding-top:0.5rem;padding-bottom:0.5rem;padding-left:1rem; padding-right:1rem;\\">' +
                    // '       <h5 class=\\"h3 mb-0 \\">Area: '+dataArray[key].area_sqm+'</h5>' +
                    '       <h5 class=\\"h3 mb-0 \\">Break Even: '+dataArray[key].breakeven_years+' years</h5>' +
                    '   </div>' +
                    '   <div class=\\"card-body\\" style=\\"padding-top:0.5rem;padding-bottom:0.5rem; padding-left:1rem; padding-right:1rem;\\">' +
                    '       <p class=\\"card-text\\">' +
                    // '       Id: '+dataArray[key].id+'<br/> '+
                    // '       Roof Class: '+dataArray[key].roofclass+'<br/> '+
                    // '       Num of Panels: '+dataArray[key].numpanels+'<br/> '+
                    '       <strong>Capacity:</strong> '+dataArray[key].system_capacity_kWp+' kWp<br/> '+
                    '       <strong>Annual Gen:</strong> '+dataArray[key].annual_gen_kWh+' kWh<br/> '+
                    '       <strong>Annual Gen:</strong> '+dataArray[key].annual_gen_GBP+' £<br/> '+
                    '       <strong>System Cost:</strong> '+dataArray[key].system_cost_GBP+' £<br/> '+
                    // '       Breakeven Years: '+dataArray[key].breakeven_years+'<br/> '+
                    '       <strong>Annual CO<sub>2</sub> saving:</strong> '+dataArray[key].annual_co2_saved_kg+' kgs<br/> '+
                    '       <strong>Lifetime CO<sub>2</sub> saving:</strong> '+dataArray[key].lifetime_co2_saved_kg+' kgs<br/> '+
                    '       <strong>Lifetime RoI:</strong> '+dataArray[key].lifetime_return_on_investment_percent+'%<br/> '+
                    '       </p>' +
                    '       <a href=\\"https://mapping.powermarket.ai\\" class=\\"btn btn-primary \\" ' +
                    '       target=\\"_blank\\" title=\\"Opens in a new window\\">View Details</a>' +
                    '   </div>' +
                    '</div>", ' +
                    '"years": '+dataArray[key].breakeven_years+', ' +
                    '"id": "'+dataArray[key].id+'", ' +
                    '"area": '+dataArray[key].area_sqm+', ' +
                    '"panels": '+dataArray[key].numpanels+', ' +
                    '"roi": '+dataArray[key].lifetime_return_on_investment_percent+'}, ' +
                    '"geometry": {"type": "Point", "coordinates": ' +
                    '['+dataArray[key].centre_lon+','+ dataArray[key].centre_lat+']}}'
                features.push(JSON.parse(featureString));
                $('#datatable-basic').dataTable().fnAddData( [
                    dataArray[key].id,
                    dataArray[key].centre_lat,
                    dataArray[key].centre_lon,
                    dataArray[key].system_capacity_kWp,
                    dataArray[key].annual_gen_kWh,
                    dataArray[key].annual_gen_GBP,
                    dataArray[key].annual_gen_GBP,
                    dataArray[key].system_cost_GBP,
                    dataArray[key].breakeven_years,
                    dataArray[key].annual_co2_saved_kg,
                    dataArray[key].lifetime_co2_saved_kg,
                    dataArray[key].lifetime_return_on_investment_percent
                ]);
                potential = potential+dataArray[key].system_capacity_kWp;
                savings = savings+dataArray[key].annual_gen_GBP;
                co2 = co2+dataArray[key].lifetime_co2_saved_kg;
            }
            features.forEach(function(feature) {
                bounds.extend(feature.geometry.coordinates);
            });
            $('#potential-card').text(potential+" kWp");
            $('#savings-card').text(savings+" £");
            $('#co2-card').text(co2+" kgs");
        }
        map.on('load', function() {
            map.addSource('places', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': features
                }
            });
            features.forEach(function(feature) {
                var symbol = feature.properties['years'];
                var layerID = layerPrefix + symbol;

                // Add a layer for this symbol type if it hasn't been added already.
                if (!map.getLayer(layerID)) {
                    map.addLayer({
                        'id': layerID,
                        'type': 'circle',
                        'source': 'places',
                        'filter': ['==', 'years', symbol],
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
                                property: 'years',
                                stops: yearColors
                            }
                        }
                    });

                    // Add checkbox and label elements for the layer.
                    var input = document.createElement('input');
                    input.type = 'checkbox';
                    input.id = layerID;
                    input.checked = true;
                    filterGroup.appendChild(input);

                    var label = document.createElement('label');
                    label.setAttribute('for', layerID);
                    label.setAttribute('style', 'margin-bottom:0px;background-color:'+yearColorMap.get(symbol));
                    label.textContent = symbol;
                    filterGroup.appendChild(label);

                    // When the checkbox changes, update the visibility of the layer.
                    input.addEventListener('change', function(e) {
                        map.setLayoutProperty(
                            layerID,
                            'visibility',
                            e.target.checked ? 'visible' : 'none'
                        );
                    });
                    map.on('click', layerID, function(e) {
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
                    // Change the cursor to a pointer when the mouse is over the layer.
                    map.on('mouseenter', layerID, function() {
                        map.getCanvas().style.cursor = 'pointer';
                    });

                    // Change it back to a pointer when it leaves.
                    map.on('mouseleave', layerID, function() {
                        map.getCanvas().style.cursor = '';
                    });
                }
            });
            // map.addLayer({
            //     'id': 'places',
            //     'type': 'circle',
            //     'source': 'places',
            //     'paint': {
            //         // make circles larger as the user zooms from z12 to z22
            //         'circle-radius': {
            //             'base': 1.75,
            //             'stops': [
            //                 [12, 2],
            //                 [22, 180]
            //             ]
            //         },
            //         // color circles by breakeven_years, using a match expression
            //         // https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-match
            //         'circle-color': {
            //             property: 'years',
            //             stops: [
            //                 [7, '#63c54f'],
            //                 [8, '#e0b542'],
            //                 [9, '#e0b542'],
            //                 [10, '#cf7f3e'],
            //                 [11, '#cf7f3e'],
            //                 [12, '#bd403a'],
            //                 [100, '#bd403a'],
            //             ]
            //         }
            //     }
            // });


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
            var layers = map.getStyle().layers;

            var labelLayerId;
            for (var i = 0; i < layers.length; i++) {
                if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                    labelLayerId = layers[i].id;
                    break;
                }
            }
            map.fitBounds(bounds);
        });
    }
    $( document ).ready(function() {
        var table = $('#datatable-basic').DataTable();
        table.clear();
        table.select.info( false);
        table.select.style('single');
        new $.fn.dataTable.Buttons( table, {
            buttons: [
                {text: 'Reset Selection',
                    action: function ( e, dt, node, config ) {
                        table.rows('.selected').deselect();
                    }
                }
            ]
        } );
        table.buttons().container().appendTo( $('.dataTables_length:eq(0)', table.table().container() ) );
        $('.dt-buttons .btn').removeClass('btn-secondary').addClass('btn-sm btn-default');
        renderMap();

        table.on( 'select', function ( e, dt, type, indexes ) {
            if ( type === 'row' ) {
                var data = table.rows( indexes ).data();
                var id = data[0][0];
                var years = data[0][8];
                var layerId = layerPrefix + years;
                var layers = map.getStyle().layers;
                layers.forEach(function(layer) {
                    if(layer.id.startsWith(layerPrefix)){
                        if(layer.id == layerId)
                            map.setLayoutProperty(layer.id, 'visibility', 'visible');
                        else
                            map.setLayoutProperty(layer.id, 'visibility', 'none');
                    }
                });
                map.setFilter(layerId, ['==', 'id', id]);
            }
        } );
        table.on( 'deselect', function ( e, dt, type, indexes ) {
            if ( type === 'row' ) {
                var data = table.rows( indexes ).data();
                var id = data[0][0];
                var years = data[0][8];
                var layerId = layerPrefix + years;
                var layers = map.getStyle().layers;
                layers.forEach(function(layer) {
                    if (layer.id.startsWith(layerPrefix)) {
                        layers.forEach(function (layer) {
                            map.setLayoutProperty(layer.id, 'visibility', 'visible');
                        });
                    }
                });
                map.setFilter(layerId, null);
            }
        } );

    });
</script>
<style>
    .filter-group {
        font: 12px/20px 'Helvetica Neue', Arial, Helvetica, sans-serif;
        font-weight: 600;
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1;
        border-radius: 3px;
        width: 120px;
        color: #fff;
    }

    .filter-group input[type='checkbox']:first-child + label {
        border-radius: 3px 3px 0 0;
    }

    .filter-group label:last-child {
        border-radius: 0 0 3px 3px;
        border: none;
    }

    .filter-group input[type='checkbox'] {
        display: none;
    }

    .filter-group input[type='checkbox'] + label {
        background-color: #3386c0;
        display: block;
        cursor: pointer;
        padding: 10px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.25);
    }

    .filter-group input[type='checkbox'] + label {
        background-color: #3386c0;
        text-transform: capitalize;
    }

    .filter-group input[type='checkbox'] + label:hover,
    .filter-group input[type='checkbox']:checked + label {
        background-color: #4ea0da;
    }

    .filter-group input[type='checkbox']:checked + label:before {
        content: '✔';
        margin-right: 5px;
    }
</style>
@endpush
