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
                <div class="card card-stats">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total Projects</h5>
                                <span class="h2 font-weight-bold mb-0">1</span>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
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
                                        <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to add more projects</a>
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
                                <h5 class="card-title text-uppercase text-muted mb-0">Solar Potential</h5>
                                <span class="h2 font-weight-bold mb-0" id="potential-card">1</span>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
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
                                        <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
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
                                <h5 class="card-title text-uppercase text-muted mb-0">Lifetime savings</h5>
                                <span class="h2 font-weight-bold mb-0" id="savings-card">1</span>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
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
                                        <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
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
                                <h5 class="card-title text-uppercase text-muted mb-0">Lifetime CO<sub>2</sub> savings</h5>
                                <span class="h2 font-weight-bold mb-0" id="co2-card">1</span>
                            </div>
                            <div class="col-auto">
                                <div class="row">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
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
                                        <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-left" style="margin-bottom: 10px;">
                <span class="text-nowrap" style="font-size: .75rem">
                    Showing
                    <span id="selected-count">1</span>
                    of <span id="total-count">1</span> entries</span>
            </div>
            <div class="col text-right" style="margin-bottom: 10px;">
                <span class="text-nowrap" style="font-size: .75rem">You are browsing by &nbsp;</span>
                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Break-even Time
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
                            Break-even</span>
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
                                <th>System Size (kWp)</th>
                                <th>System Cost (£)</th>
                                <th>Annual Generation (kWh)</th>
{{--                                <th>Lifetime Generation (kWh)</th>--}}
                                <th>Annual Savings (£)</th>
                                <th>Lifetime Savings (£) </th>
                                <th>Breakeven (Years)</th>
                                <th>ROI (%)</th>
                                <th>Annual CO<sub>2</sub> Savings (kgs)</th>
                                <th>Lifetime CO<sub>2</sub> Savings (kgs) </th>
{{--                                <th>Lifetime CO<sub>2</sub> Emissions (kgs) </th>--}}
{{--                                <th>Latitude</th>--}}
{{--                                <th>Longitude</th>--}}
                                <th>Id</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>System Size (kWp)</th>
                                <th>System Cost (£)</th>
                                <th>Annual Generation (kWh)</th>
                                {{--                                <th>Lifetime Generation (kWh)</th>--}}
                                <th>Annual Savings (£)</th>
                                <th>Lifetime Savings (£) </th>
                                <th>Breakeven (Years)</th>
                                <th>ROI (%)</th>
                                <th>Annual CO<sub>2</sub> Savings (kgs)</th>
                                <th>Lifetime CO<sub>2</sub> Savings (kgs) </th>
                                {{--                                <th>Lifetime CO<sub>2</sub> Emissions (kgs) </th>--}}
{{--                                <th>Latitude</th>--}}
{{--                                <th>Longitude</th>--}}
                                <th>Id</th>
                            </tr>
                            </tfoot>
                            <tbody>
{{--                            <tr>--}}
{{--                                <td>System Size (kWp)</td>--}}
{{--                                <td>Annual Generation (kWh)</td>--}}
{{--                                <td>Annual Savings (£)</td>--}}
{{--                                <td>Lifetime Savings (£) </td>--}}
{{--                                <td>System Cost (£)</td>--}}
{{--                                <td>Break-even Time (years)</td>--}}
{{--                                <td>Annual CO<sub>2</sub> Savings (kg)</td>--}}
{{--                                <td>Lifetime CO<sub></sub>2 Savings (kg) </td>--}}
{{--                                <td>Lifetime CO<sub></sub>2 Emissions (kg) </td>--}}
{{--                                <td>ROI (%)</td>--}}
{{--                                <td>Latitude</td>--}}
{{--                                <td>Longitude</td>--}}
{{--                                <td>Id</td>--}}
{{--                            </tr>--}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Disclaimer -->
        <h4>Disclaimer</h4>
        <h5>The data presented are estimations based on standard, industry-wide assumption; but can differ from actual solar array for the rooftops displayed. Please consult a professional solar installations company for a cutomised proposal.</h5>

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
<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-v9',
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
    var symbolCountMap = new Map();
    var totalCount = 0;
    var selectedCount = 0;
    function renderMap(){
        var jsonString = '{!! auth()->user()->jsonData() !!}';
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
                    '       <h5 class=\\"h3 mb-0 \\">Break-even: '+dataArray[key].breakeven_years+' years</h5>' +
                    '   </div>' +
                    '   <div class=\\"card-body\\" style=\\"padding-top:0.5rem;padding-bottom:0.5rem; padding-left:1rem; padding-right:1rem;\\">' +
                    '       <p class=\\"card-text\\">' +
                    // '       Id: '+dataArray[key].id+'<br/> '+
                    // '       Roof Class: '+dataArray[key].roofclass+'<br/> '+
                    // '       Num of Panels: '+dataArray[key].numpanels+'<br/> '+
                    '       <strong>System Size:</strong> '+numeral(dataArray[key].system_capacity_kWp).format('0,0.0a')+' kWp<br/> '+
                    // '       <strong>Annual Gen:</strong> '+numeral(dataArray[key].annual_gen_kWh).format('0,0.0a')+' kWh<br/> '+
                    // '       <strong>Annual Savings:</strong> £ '+numeral(dataArray[key].annual_gen_GBP).format('0,0.0a')+'<br/> '+
                    '       <strong>System Cost:</strong> £ '+numeral(dataArray[key].system_cost_GBP).format('0,0.0a')+'<br/> '+
                    '       <strong>Lifetime Savings:</strong> £ '+numeral(dataArray[key].lifetime_gen_GBP).format('0,0.0a')+'<br/> '+
                    // '       Break-even Years: '+dataArray[key].breakeven_years+'<br/> '+
                    // '       <strong>Annual CO<sub>2</sub> saving:</strong> '+numeral(dataArray[key].annual_co2_saved_kg).format('0,0.0a')+' kgs<br/> '+
                    '       <strong>Lifetime CO<sub>2</sub> saving:</strong> '+numeral(dataArray[key].lifetime_co2_saved_kg).format('0,0.0a')+' kgs<br/> '+
                    // '       <strong>Lifetime CO<sub>2</sub> emissions:</strong> '+numeral(dataArray[key].lifecycle_co2_emissions_kg).format('0,0.0a')+' kgs<br/> '+
                    '       <strong>Lifetime RoI:</strong> '+numeral(dataArray[key].lifetime_return_on_investment_percent).format('0,0.0a')+'%<br/> '+
                    '       </p>' +
                    '       <a href=\\"{{ route('page.reporting') }}\\" class=\\"btn btn-primary \\" ' +
                    '       target=\\"_blank\\" title=\\"Upgrade to download full building report.\\">Generate Report</a>' +
                    '       <button type=\\"button\\" class=\\"btn btn-primary disabled \\" data-toggle=\\"tooltip\\" data-placement=\\"top\\" ' +
                    '       title=\\"Upgrade to view detailed building ownership information, and tenancy details for commercial and industrial buildings.\\">Building Info</button>' +
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
                    numeral(dataArray[key].system_capacity_kWp).format('0,0.0a'),
                    numeral(dataArray[key].system_cost_GBP).format('0,0.0a'),
                    numeral(dataArray[key].annual_gen_kWh).format('0,0.0a'),
                    // numeral(dataArray[key].lifetime_gen_kWh).format('0,0.0a'),
                    numeral(dataArray[key].annual_gen_GBP).format('0,0.0a'),
                    numeral(dataArray[key].lifetime_gen_GBP).format('0,0.0a'),
                    dataArray[key].breakeven_years,
                    numeral(dataArray[key].lifetime_return_on_investment_percent).format('0,0.0a'),
                    numeral(dataArray[key].annual_co2_saved_kg).format('0,0.0a'),
                    numeral(dataArray[key].lifetime_co2_saved_kg).format('0,0.0a'),
                    // numeral(dataArray[key].lifecycle_co2_emissions_kg).format('0,0.0a'),
                    // dataArray[key].centre_lat,
                    // dataArray[key].centre_lon,
                    dataArray[key].id
                ]);
                potential = potential+dataArray[key].system_capacity_kWp;
                savings = savings+dataArray[key].lifetime_gen_GBP;
                co2 = co2+dataArray[key].lifetime_co2_saved_kg;
                if(symbolCountMap[dataArray[key].breakeven_years]==undefined)
                    symbolCountMap[dataArray[key].breakeven_years] = 0;
                symbolCountMap[dataArray[key].breakeven_years] += 1;
            }
            features.forEach(function(feature) {
                bounds.extend(feature.geometry.coordinates);
            });
            if (potential/1000000>=1)
            {
                potential = potential/1000000;
                $('#potential-card').text(numeral(potential).format('0,0.0a')+" GWp");
            }
            else if (potential/1000>=1){
                potential = potential/1000;
                $('#potential-card').text(numeral(potential).format('0,0.0a')+" MWp");
            }
            else
                $('#potential-card').text(numeral(potential).format('0,0.0a')+" kWp");
            $('#savings-card').text('£ ' + numeral(savings).format('(0.00a)'));
            $('#co2-card').text(numeral(co2).format('0,0.0a')+" kgs");
            totalCount = dataArray.length;
            selectedCount = totalCount;
            $('#total-count').text(numeral(dataArray.length).format('0,0'));
            $('#selected-count').text(numeral(dataArray.length).format('0,0'));
        }
        map.on('load', function() {
            map.loadImage('./svg/map-marker-alt-solid.png', function(error, image) {
                if (error) throw error;
                map.addImage('marker-icon', image, { 'sdf': true });
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
                        'type': 'symbol',
                        // 'type': 'circle',
                        'source': 'places',
                        'layout': {
                            // 'icon-image':  'marker-stroked-15',
                            // 'icon-image':  'triangle-stroked-15',
                            'icon-image':  'marker-icon',
                            'icon-allow-overlap': true,
                            'icon-size': 0.20,
                            // 'icon-color': yearColorMap.get(symbol)
                        },
                        'filter': ['==', 'years', symbol],
                        'paint': {
                            'icon-color': yearColorMap.get(symbol)
                        }
                        // 'paint': {
                        //     // make circles larger as the user zooms from z12 to z22
                        //     'circle-radius': {
                        //         'base': 1.75,
                        //         'stops': [
                        //             [12, 2],
                        //             [22, 180]
                        //         ]
                        //     },
                        //     // color circles by breakeven_years, using a match expression
                        //     // https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-match
                        //     'circle-color': {
                        //         property: 'years',
                        //         stops: yearColors
                        //     }
                        // }
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
                    label.textContent = symbol + ' Years';
                    filterGroup.appendChild(label);

                    // When the checkbox changes, update the visibility of the layer.
                    input.addEventListener('change', function(e) {
                        map.setLayoutProperty(
                            layerID,
                            'visibility',
                            e.target.checked ? 'visible' : 'none'
                        );
                        if(e.target.checked)
                            selectedCount = selectedCount + symbolCountMap[symbol];
                        else
                            selectedCount = selectedCount - symbolCountMap[symbol];
                        $('#selected-count').text(numeral(selectedCount).format('0,0'));
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

            var layers = map.getStyle().layers;

            var labelLayerId;
            for (var i = 0; i < layers.length; i++) {
                if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                    labelLayerId = layers[i].id;
                    break;
                }
            }
            if (! map.getSource('composite')) {
                map.addSource('composite', { type: 'vector', url: 'mapbox://mapbox.mapbox-streets-v7'});
            }
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

            map.fitBounds(bounds);
            });
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
                var id = data[0][data[0].length-1];
                var years = data[0][5];
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
                var id = data[0][data[0].length-1];
                var years = data[0][5];
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
    .dataTable tr {
        cursor: pointer;
    }
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

    .mapboxgl-popup-close-button {
        font-size: 22px;
    }

    .mapboxgl-popup-content {
        background-color: #ffffff;
    }


</style>
@endpush
