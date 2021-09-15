@extends('layouts.app', [
'title' => __('Organization Management'),
'parentSection' => 'laravel',
'elementName' => 'organization-management'
])

@section('content')
@component('layouts.headers.auth')
@component('layouts.headers.breadcrumbs')
@slot('title')
{{ __('Organizations') }}
@endslot

<li class="breadcrumb-item"><a href="{{ route('organization.index') }}">{{ __('Organization Management') }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('Add Organization') }}</li>
@endcomponent
@endcomponent

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Organization Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('organization.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('organization.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Organization information') }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                            <h4>Accounts</h4>
                            @foreach($accounts as $account)
                            <div class="custom-control custom-checkbox mb-3">
                                <input class="custom-control-input" name="accounts[]" value="{{ $account->id }}" id="customCheck{{ $account->id }}" type="checkbox">
                                <label class="custom-control-label" for="customCheck{{ $account->id }}">{{ $account->name }}</label>
                            </div>
                            @endforeach


                            <!-- New fields on the region -->

                            <div class="form-group{{ $errors->has('captiveuse') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-captiveuse">{{ __('Captive Use') }}</label>
                                <input type="text" name="captiveuse" id="input-captiveuse" class="form-control{{ $errors->has('captiveuse') ? ' is-invalid' : '' }}" placeholder="{{ __('80') }}" value="{{ old('captiveuse') }}"  autofocus>

                                @include('alerts.feedback', ['field' => 'captiveuse'])
                            </div>
                            <div class="form-group{{ $errors->has('exporttariff') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-exporttariff">{{ __('Export Tariff') }}</label>
                                <input type="text" name="exporttariff" id="input-exporttariff" class="form-control{{ $errors->has('exporttariff') ? ' is-invalid' : '' }}" placeholder="{{ __('0.055') }}" value="{{ old('exporttariff') }}"  autofocus>

                                @include('alerts.feedback', ['field' => 'exporttariff'])
                            </div>

                            <div class="form-group{{ $errors->has('residentialtariff') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-residentialtariff">{{ __('Residential Tariff') }}</label>
                                <input type="text" name="residentialtariff" id="input-residentialtariff" class="form-control{{ $errors->has('residentialtariff') ? ' is-invalid' : '' }}" placeholder="{{ __('0.146') }}" value="{{ old('residentialtariff') }}"  autofocus>

                                @include('alerts.feedback', ['field' => 'residentialtariff'])
                            </div>

                            <div class="form-group{{ $errors->has('nonresidentialtariff') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-nonresidentialtariff">{{ __('Non-Residential Tariff') }}</label>
                                <input type="text" name="nonresidentialtariff" id="input-nonresidentialtariff" class="form-control{{ $errors->has('nonresidentialtariff') ? ' is-invalid' : '' }}" placeholder="{{ __('0.12') }}" value="{{ old('nonresidentialtariff') }}" autofocus>

                                @include('alerts.feedback', ['field' => 'nonresidentialtariff'])
                            </div>

                            <div class="form-group{{ $errors->has('currencysymbol') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-currencysymbol">{{ __('Currency Symbol') }}</label>
                                <input type="text" name="currencysymbol" id="input-currencysymbol" class="form-control{{ $errors->has('currencysymbol') ? ' is-invalid' : '' }}" placeholder="{{ __('£') }}" value="{{ old('currencysymbol') }}" autofocus>

                                @include('alerts.feedback', ['field' => 'currencysymbol'])
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