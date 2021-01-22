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
<!-- Modal for adding clusters -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="card bg-secondary shadow border-0 mb-0">
                    <div class="card-header bg-white">
                        <div class="text-muted text-left mb-3">
                            <h2>Create cluster</h2>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <form method="post" action="{{ route('invitation.store') }}" role="form">
                            @csrf
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}" required autofocus>
                            </div>
                            <div id="response-status" class="alert" role="alert"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-default my-4">Create cluster</button>
                            </div>
                        </form>
                    </div>
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
    @if(!auth()->user()->isMember())
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
            <a data-toggle="modal" data-target="#modal-form">
                <img src="{{ asset('svg') }}/add-button.svg" class="rounded-circle border-secondary">
            </a>
            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card bg-secondary shadow border-0 mb-0">
                                <div class="card-header bg-white">
                                    <div class="text-muted text-left mb-3">
                                        <h2>Invite User</h2>
                                    </div>
                                </div>
                                <div class="card-body bg-white">
                                    <form method="post" action="{{ route('invitation.store') }}" role="form">
                                        @csrf
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}" required autofocus>

                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                        <h4>Admin</h4>
                                        <div class="form-group{{ $errors->has('is_admin') ? ' has-danger' : '' }}">
                                            <label class="custom-toggle custom-toggle-success">
                                                <input type="checkbox" name="is_admin" value="1" checked>
                                                <span class="custom-toggle-slider rounded-circle" data-label-off="NO" data-label-on="YES"></span>
                                            </label>
                                            @include('alerts.feedback', ['field' => 'is_admin'])
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Email') }}" value="{{ old('email') }}" required>

                                            @include('alerts.feedback', ['field' => 'email'])
                                        </div>
                                        <h4>Accounts</h4>
                                        @foreach($accounts as $account)
                                        <div class="custom-control custom-checkbox mb-3">
                                            <input class="custom-control-input" name="accounts[]" value="{{ $account->id }}" id="customCheck{{ $account->id }}" type="checkbox">
                                            <label class="custom-control-label" for="customCheck{{ $account->id }}">{{ $account->name }}</label>
                                        </div>
                                        @endforeach
                                        @include('alerts.feedback', ['field' => 'accounts'])
                                        <div class="text-left">
                                            <button type="submit" class="btn btn-default my-4">Invite</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @include('alerts.success')
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
                    <a href="/dashboard/{{ $account->name }}" target="_blank"><img id="icon-{{ $account->id }}-black" src="{{ asset('svg') }}/map.svg" class="map-icon-black" /></a>
                    <a href="/dashboard/{{ $account->name }}" target="_blank"><img id="icon-{{ $account->id }}-white" src="{{ asset('svg') }}/map-white.svg" class="map-icon-white" /></a>
                </div>
                <!-- Card body -->
                <div class="card-body" style="height:300px;">
                    <div id="map-account-{{ $account->id }}" class="map-border" style="width: 100%; height: 250px;"></div>
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
                    <a href="/dashboard/{{ $account->name }}/{{ $region->name }}" target="_blank"><img src="{{ asset('svg') }}/map.svg" class="map-icon-black" /></a>
                </div>
                <!-- Card body -->
                <div class="card-body" style="height:300px;">
                    <div id="map-region-{{ $region->id }}" class="map-border" style="height: 250px;"></div>
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
    @endforeach
    @if(!auth()->user()->isMember())
    <div class="row" id="cluster-row">
        <div class="col-12 pb-3">
            <p class="h2">Clusters:</p>
        </div>
        @if(isset($clusters))
        @foreach($clusters as $cluster)
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card cluster" id="{{ $cluster->id }}">
                <!-- Card header -->
                <div class="card-header">
                    <!-- Title -->
                    <h5 class="h3 mb-0 account-header">{{ $cluster->name }}</h5>
                    <a href="/clusters/{{ $cluster->name }}" target="_blank"><img src="{{ asset('svg') }}/map.svg" class="map-icon-black" /></a>
                </div>
                <!-- Card body -->
                <div class="card-body add-cluster" style="height:300px; background-color:#1B2B4B;">
                    <a href="{{ route('page.pricing') }}" target="_blank" class="cluster-button"><i class="ni ni-curved-next" style="color:white;font-size:50px;"></i></a>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="card add-cluster">
                <a data-toggle="modal" data-target="#modal-form" target="_blank" class="cluster-button"><img src="{{ asset('svg') }}/add-button.svg" class="rounded-circle border-secondary"></a>
            </div>
        </div>
    </div>
    @endif
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
    var errors_empty = '{!! $errors->isEmpty() !!}';
    $(document).ready(function() {
        if (errors_empty != 1) {
            $('#modal-form').modal('show');
        }
        $('[data-toggle="tooltip"]').tooltip();
        $(".card.account").click(function(event) {
            if (active_account == event.currentTarget.id) return;
            //setting styles for previous active account
            $("[id=account-" + active_account + "]").css('display', 'none');
            var account_card = $("#" + active_account + ".card.account");
            account_card.css('color', 'black');
            var face = account_card.prev();
            face.css('display', 'none');
            $('#icon-' + active_account + '-black').css('display', 'inline-block')
            $('#icon-' + active_account + '-white').css('display', 'none')
            //setting styles for new active account
            active_account = event.currentTarget.id;
            $("[id=account-" + active_account + "]").css({
                'display': 'flex'
            });
            account_card = $("#" + active_account + ".card.account");
            account_card.css('color', 'white');
            face = account_card.prev();
            face.css('display', 'flex');
            $('#icon-' + active_account + '-black').css('display', 'none')
            $('#icon-' + active_account + '-white').css('display', 'inline-block')
        });
        $(".card.account").first().click();
        window.dispatchEvent(new Event('resize'));
        $('#modal-form').submit(function(event) {
            event.preventDefault();
            var visiblePoints = [];
            var formData = {
                'name': $('input[name=name]').val(),
                '_token': $('input[name=_token]').val(),
                'geopoints': JSON.stringify(visiblePoints)
            };
            $.ajax({
                type: 'POST',
                url: '/clusters',
                data: formData,
                dataType: 'json',
                encode: true
            }).done(function(data) {
                $('#response-status').text(data.message).css('display', 'block').addClass('alert-success').removeClass('alert-danger').delay(2000).fadeOut();
                $('#cluster-row').children().last().before(`
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="card cluster" id="${data.cluster.id}">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h3 mb-0 account-header">${data.cluster.name}</h5>
                                <a href="/clusters/${data.cluster.name}" target="_blank"><img src="{{ asset('svg') }}/map.svg" class="map-icon-black" /></a>
                            </div>
                            <!-- Card body -->
                            <div class="card-body add-cluster" style="height:300px; background-color:#1B2B4B;">
                                <a href="{{ route('page.pricing') }}" target="_blank" class="cluster-button"><i class="ni ni-curved-next" style="color:white;font-size:50px;"></i></a>
                            </div>
                        </div>
                    </div>
                `)
            }).fail(function(data) {
                $('#response-status').text(data.responseJSON.message).css('display', 'block').addClass('alert-danger').removeClass('alert-success').delay(2000).fadeOut();
            });
        });
    });
</script>
@endpush