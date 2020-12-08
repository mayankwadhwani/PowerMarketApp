@extends('layouts.app', [
'title' => __('Account Management'),
'parentSection' => 'laravel',
'elementName' => 'something'
])

@section('content')
@component('layouts.headers.auth')
@component('layouts.headers.breadcrumbs')
@slot('title')
{{ __('Accounts') }}
@endslot

<li class="breadcrumb-item"><a href="{{ route('account.index') }}">{{ __('Account Management') }}</a></li>
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
                            <h3 class="mb-0">{{ __('Accounts') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('account.create') }}" class="btn btn-sm btn-primary">{{ __('Add account') }}</a>
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
                                <th scope="col">{{ __('Id') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Lat') }}</th>
                                <th scope="col">{{ __('Long') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $account->id }}</td>
                                <td>{{ $account->name }}</td>
                                <td>{{ $account->lat }}</td>
                                <td>{{ $account->lon }}</td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('account.edit', $account) }}">{{ __('Edit') }}</a>
                                            <form action="{{ route('account.destroy', $account) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this account?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
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
<script src="{{ asset('argon') }}/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
@endpush