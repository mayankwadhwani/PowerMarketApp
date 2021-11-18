@extends('layouts.app', [
'title' => ($user_is_admin ? __('Organization vendors Management') : __('Vendors Management')),
'parentSection' => 'laravel',
'elementName' => 'organization-vendor-management'
])

@section('content')
@component('layouts.headers.auth')
@component('layouts.headers.breadcrumbs')
@slot('title')
{{ ($user_is_admin ? __('Organization vendors') : __('Vendors')) }}
@endslot

<li class="breadcrumb-item"><a href="{{ route('organization_vendor.index') }}">{{ ($user_is_admin ? __('Organization vendors Management') : __('Vendors Management')) }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('Add Vendor') }}</li>
@endcomponent
@endcomponent

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Vendor Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('organization_vendor.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('organization_vendor.store') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf

                        <h6 class="heading-small text-muted mb-4">{{ __('Vendor information') }}</h6>
                        <div class="pl-lg-4">
                            @if($user_is_admin)
                                <h4>Organization</h4>
                                <div class="form-group">
                                    <select class="form-control" name="organisation_id" id="organisation_id">
                                        @foreach($organisations as $organisation)
                                            <option value="{{ $organisation->id }}">{{ $organisation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <h4>Vendor</h4>
                            <div class="form-group">
                                <select class="form-control" name="vendor_id" id="vendor_id">
                                    @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="auth_data_container"></div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="active" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Enable
                                </label>
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
    @include('organization_vendors.dynamic_fields_js')
    @include('layouts.footers.auth')
</div>
@endsection
