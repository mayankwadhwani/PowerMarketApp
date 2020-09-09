@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">{{ __('Privacy Policy') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="d-flex justify-content-lg-center px-3 mt-8 mb-6">
{{--            <div>--}}
{{--                <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">--}}
{{--                    <i class="ni ni-check-bold text-primary"></i>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-6">
                <p class="text-white">PowerMarket is 100% compliant with the General Data Protection Regulation.</p>
            </div>
        </div>
    </div>
@endsection
