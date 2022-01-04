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
<li class="breadcrumb-item active" aria-current="page">{{ __('List') }}</li>
@endcomponent
@endcomponent

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ ($user_is_admin ? __('Organization vendors') : __('Vendors')) }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('organization_vendor.create') }}" class="btn btn-sm btn-primary">{{ __('Add vendor') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    @include('alerts.success')
                    @include('alerts.errors')
                </div>

                <div class="table-responsive py-4">
                    <table class="table align-items-center table-flush" id="datatable-basic">
                        <thead class="thead-light">
                            <tr>
                                @if($user_is_admin)
                                    <th scope="col">{{ __('Organization') }}</th>
                                @endif
                                <th scope="col">{{ __('Vendor') }}</th>
                                <th scope="col">{{ __('Active') }}</th>
                                <th scope="col">{{ __('Last run') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($organization_vendors as $orgVendor)
                                <tr>
                                    @if($user_is_admin)
                                        <td>{{ $orgVendor->organization->name }}</td>
                                    @endif
                                    <td>{{ $orgVendor->vendor->name }}</td>
                                    <td>{{ ($orgVendor->active === 1 ? 'Yes' : 'No') }}</td>
                                    <td>{{ $orgVendor->last_run }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-sm btn-default" href="{{ route('organization_vendor.edit', $orgVendor) }}">{{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
@endpush
