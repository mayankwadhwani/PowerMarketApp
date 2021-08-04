@extends('layouts.app', [
'title' => __('Region Management'),
'parentSection' => 'laravel',
'elementName' => 'region-management'
])

@section('content')
@component('layouts.headers.auth')
@component('layouts.headers.breadcrumbs')
@slot('title')
{{ __('Regions') }}
@endslot

<li class="breadcrumb-item"><a href="{{ route('region.index') }}">{{ __('Region Management') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('Add Region') }}</li>
@endcomponent
@endcomponent

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Region Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('region.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('region.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Region information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <div class="form-group{{ $errors->has('account_id') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-role">{{ __('Account') }}</label>
                                <select name="account_id" id="input-role" class="form-control{{ $errors->has('account_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Account') }}" required>
                                    <option value="">-</option>
                                    @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}" {{ $account->id == old('account_id') ? 'selected' : '' }}>{{ $account->name }}</option>
                                    @endforeach
                                </select>

                                @include('alerts.feedback', ['field' => 'account_id'])
                            </div>
                            <div class="form-group{{ $errors->has('lat') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Latitude') }}</label>
                                <input type="text" name="lat" id="input-name" class="form-control{{ $errors->has('lat') ? ' is-invalid' : '' }}" placeholder="{{ __('Latitude') }}" value="{{ old('lat') }}" required autofocus>

                                @include('alerts.feedback', ['field' => 'lat'])
                            </div>
                            <div class="form-group{{ $errors->has('lon') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Longitude') }}</label>
                                <input type="text" name="lon" id="input-name" class="form-control{{ $errors->has('lon') ? ' is-invalid' : '' }}" placeholder="{{ __('Longitude') }}" value="{{ old('lon') }}" required autofocus>

                                @include('alerts.feedback', ['field' => 'lon'])
                            </div>

    



                            <div class="form-group{{ $errors->has('geodata') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Json geodata') }}</label>
                                <textarea class="form-control" type="text" name="geodata" id="exampleFormControlTextarea1" rows="13" placeholder="Input JSON data here">{{ old('geodata') }}</textarea>

                                @include('alerts.feedback', ['field' => 'geodata'])
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