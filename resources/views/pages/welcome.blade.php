@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-5 pb-7 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-9 pt-5">
                        <h1 class="text-white">{{ __('PowerMarket Solar Mapping') }}</h1>
                        <!-- <h3 class="text-white">
                            {{ __('Beta') }}
                        </h3> -->

                        <h3 class="text-lead text-light mt-3 mb-0">
                            {{ __('Your HQ for Solar Project Management') }}
                            @include('alerts.migrations_check')
                        </h3>
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

    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image-button">
              <a href="{{ route('register') }}">
                <img src="{{ asset('argon') }}/img/theme/team-4.jpg" class="rounded-circle border-secondary">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="pricing card-group flex-column flex-md-row mb-3">
            <div class="card card-pricing border-0 text-center mb-4">
              <div class="card-header bg-transparent">
                <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">Consultant</h4>
              </div>
              <div class="card-body px-lg-7">
                <button type="button" class="btn btn-primary mb-3">Start free trial</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div class="container mt--10 pb-8"></div>
@endsection
