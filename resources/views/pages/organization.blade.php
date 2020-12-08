@extends('layouts.app')

@section('content')
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
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0 account-header">{{ isset($account) ? $account->name : '' }}</h5>
                    <a href="/dashboard/{{ $account->name }}" target="_blank"><img src="{{ asset('svg') }}/map.svg" class="map-icon" /></a>
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
    <div class="row">

    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('css') }}/report.css" />
<link rel="stylesheet" href="{{ asset('css') }}/mapbox-gl.css" />
@endpush
@push('js')
<script src="{{ asset('js') }}/mapbox-gl.js"></script>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>