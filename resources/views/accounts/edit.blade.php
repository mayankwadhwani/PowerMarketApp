@extends('layouts.app', [
    'title' => __('Account Management'),
    'parentSection' => 'laravel',
    'elementName' => 'account-management'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Accounts') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ __('Account Management') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Add Account') }}</li>
        @endcomponent
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Account Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('account.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('account.update', $account) }}" autocomplete="off"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Account information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $account->name) }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('lat') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Latitude') }}</label>
                                    <input type="text" name="lat" id="input-name" class="form-control{{ $errors->has('lat') ? ' is-invalid' : '' }}" placeholder="{{ __('Latitude') }}" value="{{ old('lat', $account->lat) }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'lat'])
                                </div>
                                <div class="form-group{{ $errors->has('lon') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Longitude') }}</label>
                                    <input type="text" name="lon" id="input-name" class="form-control{{ $errors->has('lon') ? ' is-invalid' : '' }}" placeholder="{{ __('Longitude') }}" value="{{ old('lon', $account->lon) }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'lon'])
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
