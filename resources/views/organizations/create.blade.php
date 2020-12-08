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