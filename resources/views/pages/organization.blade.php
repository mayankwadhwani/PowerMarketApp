@extends('layouts.app')

@section('content')
<script src="{{ asset('js') }}/mapbox-gl.js"></script>
<div class="header bg-primary">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">
                        {{ __('Dashboard') }}
                    </h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 orgname">
            <span class="h1">{{ $org_name }}</span>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p class="h2">Users:</p>
        </div>
        @foreach($members as $member)
        <div class="user">
            <img src="{{ asset('argon') }}/img/theme/team-4.jpg" title="{{ $member }}" data-toggle="tooltip" class="rounded-circle border-secondary">
        </div>
        @endforeach
        <div class="user">
            <img src="{{ asset('svg') }}/add-button.svg" class="rounded-circle border-secondary">
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-12 pb-3">
            <p class="h2">Accounts:</p>
        </div>
        @foreach($accounts as $account)
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="face"></div>
            <div class="card account" id="{{ isset($account) ? $account->id : '' }}">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0 account-header">{{ isset($account) ? $account->name : '' }}</h5>
                    <a href="/dashboard/{{ $account->name }}" target="_blank"><img id="icon-{{ $account->id }}" src="{{ asset('svg') }}/map.svg" class="map-icon" /></a>
                </div>
                <!-- Card body -->
                <div class="card-body" style="height:300px;">
                    <div id="map-account-{{ $account->id }}" style="width: 100%; height: 250px;"></div>
                </div>
                <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
                    var lat = '{!! $account->lat ?? '
                    ' !!}';
                    var lon = '{!! $account->lon ?? '
                    ' !!}';
                    var id = '{!! $account->id ?? '
                    ' !!}';
                    var map = new mapboxgl.Map({
                        container: 'map-account-' + id,
                        style: 'mapbox://styles/mapbox/satellite-streets-v11',
                        bearing: -17.6,
                        antialias: true,
                        zoom: 10,
                        center: [lon, lat]
                    });
                    var marker = new mapboxgl.Marker({
                            color: '#F6A22B'
                        })
                        .setLngLat([lon, lat])
                        .addTo(map);
                </script>
            </div>
        </div>
        @endforeach
    </div>
    @foreach($accounts as $account)
    <div class="row" id="account-{{ $account->id }}" style="display: none;">
        <div class="col-12 pb-3">
            <p class="h2">Data Sets:</p>
        </div>
        @foreach($account->regions as $region)
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card region" id="{{ $region->id }}">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0 account-header">{{ $region->name }}</h5>
                    <a href="/dashboard/{{ $account->name }}/{{ $region->name }}" target="_blank"><img src="{{ asset('svg') }}/map.svg" class="map-icon" /></a>
                </div>
                <!-- Card body -->
                <div class="card-body" style="height:300px;">
                    <div id="map-region-{{ $region->id }}" style="height: 250px;"></div>
                </div>
                <script>
                    mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
                    var lat = '{!! $region->lat ?? '
                    ' !!}';
                    var lon = '{!! $region->lon ?? '
                    ' !!}';
                    var id = '{!! $region->id ?? '
                    ' !!}';
                    var map = new mapboxgl.Map({
                        container: 'map-region-' + id,
                        style: 'mapbox://styles/mapbox/satellite-streets-v11',
                        bearing: -17.6,
                        antialias: true,
                        zoom: 10,
                        center: [lon, lat],
                        attributionControl: false
                    });
                    var marker = new mapboxgl.Marker({
                            color: '#F6A22B'
                        })
                        .setLngLat([lon, lat])
                        .addTo(map);
                </script>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row" id="account-{{ $account->id }}" style="display: none;">
        <div class="col-12 pb-3">
            <p class="h2">Clusters:</p>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card cluster">
                <a href="{{ route('page.pricing') }}" target="_blank" class="cluster-button"><img src="{{ asset('svg') }}/add-button.svg" class="rounded-circle border-secondary"></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('css') }}/report.css" />
<link rel="stylesheet" href="{{ asset('css') }}/mapbox-gl.css" />
@endpush
@push('js')
<script src="{{ asset('js') }}/mapbox-gl.js"></script>
<script>
    var active_account = 0;
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $(".card.account").click(function(event) {
            if (active_account == event.currentTarget.id) return;
            //setting styles for previous active account
            $("[id=account-" + active_account + "]").css('display', 'none');
            var account_card = $("#" + active_account + ".card.account");
            account_card.css('color', 'black');
            var face = account_card.prev();
            face.css('display', 'none');
            account_card.find("img").first().attr('src', '{!! asset('svg') !!}/map.svg');
            //setting styles for new active account
            active_account = event.currentTarget.id;
            $("[id=account-" + active_account + "]").css({
                'display': 'flex'
            });
            account_card = $("#" + active_account + ".card.account");
            account_card.css('color', 'white');
            face = account_card.prev();
            face.css('display', 'flex');
            account_card.find("img").first().attr('src', '{!! asset('svg') !!}/map-white.svg');
        });
    });
</script>
@endpush