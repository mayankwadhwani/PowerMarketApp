@extends('layouts.app', [
'parentSection' => 'dashboards',
'elementName' => 'dashboard'
])

@section('content')
@component('layouts.headers.auth')
@component('layouts.headers.breadcrumbs')
@slot('title')
{{ __('Dashboard') }}{{ isset($account) ? " | ".$account : "" }}{{ isset($region) ? " | ".$region : "" }}{{ isset($cluster) ? " | ".$cluster : "" }}
@endslot

{{-- <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>--}}
{{-- <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li> --}}
@endcomponent
@endcomponent

<?php
$remd = request()->segment(count(request()->segments()));
?>

<style type="text/css">
.mapboxgl-popup-close-button {outline: 0 !important;}
span.text-nowrap.zero-solar-span {
    position: relative;
    top: -7px;
}

button#reset-btn {
    position: absolute;
    right: 0;
    bottom: 0;
}
span.text-nowrap.active-solar {
    position: relative;
    top: -7px;
}
div#calculated-area {
    padding-top: 4px;
}
#calculated-area-container{
  display: none;
}
label[for="layer-years-0"] {
    display: none !important;
}
div#calculated-area {
    width: 50%;
    float: left;
}

span.text-nowrap.active-solar {
    position: relative;
    top: -7px;
}
div#calculated-area {
    padding-top: 4px;
}
#calculated-area-container{
  display: none;
}
label[for="layer-years-0"] {
    display: none !important;
}
div#calculated-area {
    width: 50%;
    float: left;
}

.create-new-pp {
    width: 50%;
    float: left;
    text-align: right;
}

.card-inner-body::after {content: "";display: block;clear: both;}
</style>
<div class="modal fade" id="delete-form" tabindex="-1" role="dialog" aria-labelledby="delete-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0 mb-0">
          <div class="card-header bg-white">
            <div class="text-muted text-left">
              <h2>Are you sure you want to remove the site?</h2>
            </div>
          </div>
          <div class="card-body bg-white">
            <div class="next-buttons">
              <button type="button" style="width:48%" id="remove-site" class="btn btn-primary">Yes</button>
              <button type="button" style="width:48%" data-dismiss="modal" class="btn btn-primary">No</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-form-polygon" tabindex="-1" role="dialog" aria-labelledby="modal-form-polygon" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0 mb-0">
          <div class="card-header bg-white">
            <div class="text-muted text-left mb-3">
              <h2>Create project from polygon</h2>
            </div>
          </div>
          <div class="card-body bg-white">
            <form method="post" action="{{ route('invitation.store') }}" role="form">
              @csrf
              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                <input maxlength="15" type="text" name="namepoly" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}" required autofocus>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-default my-4">Create project</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0 mb-0">
          <div class="card-header bg-white">
            <div class="text-muted text-left mb-3">
              <h2>Create project</h2>
            </div>
          </div>
          <div class="card-body bg-white">
            <form method="post" action="{{ route('invitation.store') }}" role="form">
              @csrf
              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                <input maxlength="15" type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Name') }}" value="{{ old('name') }}" required autofocus>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-default my-4">Create project</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="delete-next-form" tabindex="-1" role="dialog" aria-labelledby="delete-next-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0 mb-0">
          <div class="card-header bg-white">
            <h2 class="text-muted text-left">What next:</h2>
            <button id="close-button" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card-body bg-white">
            <div id="delete-next-response-status" class="alert" role="alert"></div>
            <div class="next-buttons">
              <button type="button" style="width:48%" data-dismiss="modal" class="btn btn-primary">Keep browsing</button>
              <a target="_blank" href="/dashboard" type="submit" style="width:48%" class="btn btn-default">Add more sites</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="next-form" tabindex="-1" role="dialog" aria-labelledby="next-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0 mb-0">
          <div class="card-header bg-white">
            <h2 class="text-muted text-left">What next:</h2>
            <button id="close-button" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="card-body bg-white">
            <div id="next-response-status" class="alert" role="alert"></div>
            <div class="next-buttons">
              <button type="button" style="width:48%" data-dismiss="modal" class="btn btn-primary">Keep browsing</button>
              <a id="cluster-href" target="_blank" href="/" type="submit" style="width:48%" class="btn btn-default">Go to Project</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="cluster-form" tabindex="-1" role="dialog" aria-labelledby="cluster-form" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card bg-secondary shadow border-0 mb-0">
          <div class="card-header bg-white">
            <div class="text-muted text-left">
              <h2>Add to</h2>
            </div>
          </div>
          <div class="card-body bg-white">
            <form method="post" action="{{ route('invitation.store') }}" role="form">
              @csrf
              <h5>Existing project</h5>
              <select class="form-control form-control-sm" id="cluster-select">
              </select>
              <h5 style="margin-top: .5rem;">or</h5>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="newClusterCheck" value="new_cluster">
                <label class="custom-control-label" for="newClusterCheck">
                  <h5>Create a new project</h5>
                </label>
              </div>
              <div class="form-group{{ $errors->has('new_name') ? ' has-danger' : '' }}">
                <input maxlength="15" style="margin-top: 1rem;" disabled type="text" name="new_name" id="new-name" class="form-control{{ $errors->has('new_name') ? ' is-invalid' : '' }} form-control-sm" placeholder="{{ __('Enter new project name') }}" value="{{ old('new_name') }}" required autofocus>
              </div>
              <!-- <div id="cluster-response-status" class="alert" role="alert"></div> -->
              <div class="text-center">
                <button type="submit" class="btn btn-default">Add to Project</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total number of sites</h5>
              <span class="h2 font-weight-bold mb-0" id="total-sites">{{ number_format(count($geodata)) }}</span>
            </div>
            <div class="col-auto">
              <div class="row">
                <div class="icon icon-shape bg-gradient-pm text-white rounded-circle shadow">
                  <i class="ni ni-chart-pie-35"></i>
                </div>
              </div>
              <div class="row mt-3">
                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 1.0rem;padding-left: 1.0rem;">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to add more projects</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total Solar Potential Discovered</h5>
              <span class="h2 font-weight-bold mb-0" id="potential-card">1</span>
            </div>
            <div class="col-auto">
              <div class="row">
                <div class="icon icon-shape bg-gradient-pm text-white rounded-circle shadow">
                  <i class="ni ni-atom"></i>
                </div>
              </div>
              <div class="row mt-3">
                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 1.0rem;padding-left: 1.0rem;">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total Lifetime savings</h5>
              <span class="h2 font-weight-bold mb-0" id="savings-card">1</span>
            </div>
            <div class="col-auto">
              <div class="row">
                <div class="icon icon-shape bg-gradient-pm text-white rounded-circle shadow">
                  <i class="fas fa-pound-sign"></i>
                </div>
              </div>
              <div class="row mt-3">
                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 1.0rem;padding-left: 1.0rem;">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6">
      <div class="card card-stats">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Total Lifetime CO<sub>2</sub> savings</h5>
              <span class="h2 font-weight-bold mb-0" id="co2-card">1</span>
            </div>
            <div class="col-auto">
              <div class="row">
                <div class="icon icon-shape bg-gradient-pm text-white rounded-circle shadow">
                  <i class="fas fa-smog"></i>
                </div>
              </div>
              <div class="row mt-3">
                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-right: 1.0rem;padding-left: 1.0rem;">
                  <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to view by Weekly, Monthly, Annually</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="back home">
    <!-- <a href="{{ route('home') }}"><i class="fas fa-home" style="font-size: 1.8rem; color: #191B2E; padding-bottom: 2rem; " data-toggle="tooltip" data-placement="top" title="Back home"></i></a> -->
    <a href="{{ route('home') }}"><i class="fas fa-home map-icon-black report-icon card-icons" style="font-size: 1.7rem; color: #191B2E; padding-bottom: 2rem;" data-toggle="tooltip" data-placement="top" title="Back Home"></i></a>
    <!-- if the cluster name is passed in (which means if we are at a project page) -->
    @if(!empty($cluster))
    <a href="/reporting/project/{{ $cluster}}" target="_blank"><i class="fas fa-file-alt map-icon-black report-icon card-icons" style="font-size: 1.6rem; color: #191B2E; padding-left: 1.2rem;" data-toggle="tooltip" data-placement="top" title="View Report"></i></a>
    @endif



  </div>
  <div class="row">

    <div class="col text-left" style="margin-bottom: 10px;" id="active_sites_data_wrp">
      <span class="text-nowrap active-solar" style="font-size: .75rem; margin-right: .5rem;">Show active solar sites &nbsp;</span>
      <label class="custom-toggle checkbox-inline btn-sm mr-0" style="">
        <input id="checkExisting" type="checkbox">
        <span class="custom-toggle-slider rounded-circle" style=""></span>
      </label>
    </div>

    <div class="col text-left" style="margin-bottom: 10px;" id="zero_solar_data_wrp">
      <span class="text-nowrap zero-solar-span" style="font-size: .75rem; margin-right: .5rem; margin-bottom: .5rem;">No Solar Data &nbsp;</span>
      <label class="custom-toggle checkbox-inline btn-sm mr-0" style="">
        <input id="zeroSolarData" name="zeroSolarData" type="checkbox">
        <span class="custom-toggle-slider rounded-circle" style=""></span>
      </label>
    </div>

    <div class="col text-right" style="margin-bottom: 10px;">
      <span class="text-nowrap" style="font-size: .75rem; margin-right: .5rem;">
        Showing
        <span id="selected-count">1</span>
        of <span id="total-count">1</span>
        sites
      </span>
      <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="modal" data-target="#modal-form" aria-haspopup="true" aria-expanded="false">
        Create project from active points
      </button>
    </div>
    <!-- show existing solar toggle -->
    <!-- end of show existing solar toggle -->
    <!-- <div class="col text-right" style="margin-bottom: 10px;">
    <span class="text-nowrap" style="font-size: .75rem">You are browsing by &nbsp;</span>
    <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Break-even Time
  </button>
  <div class="dropdown-menu dropdown-menu-right">
  <a class="dropdown-item" href="{{ route('page.pricing') }}">Upgrade to enable more filters</a>
</div>
{{-- <a href="#" class="btn btn-sm btn-neutral">{{ __('New') }}</a>--}}
{{-- <a href="#" class="btn btn-sm btn-neutral">{{ __('Filters') }}</a>--}}
</div> -->
</div>
<div class="row">
  <div class="col">
    <div class="card border-0">
      {{-- <div id="map-custom" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 600px;"></div>--}}
      <div id='map' class="map-canvas" style='height: 600px;'></div>
      <nav id="filter-group" class="filter-group">
        <span style="background-color: #1B2B4B;margin-bottom: 0px;display: block;border-bottom: 1px solid rgba(0, 0, 0, 0.25);padding: 10px;">
          Break-even</span>
        </nav>
      </div>
    </div>
  </div>

  <div class="card" id="calculated-area-container">
    <div class="card-body">
      <div class="card-inner-body">
        <div id="calculated-area">

        </div>
        <div class="create-new-pp">
          <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="modal" data-target="#modal-form-polygon" aria-haspopup="true" aria-expanded="false">
              Create project from polygon
         </button>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">

      <h3>Advanced Settings <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Advanced settings lets you re-run the solar mapper with different core assumption. This may impact your results for system cost, annual savings, lifetime savings, breakeven time, ROI, and IRR if applicable." /></h3>
      @if(!empty($cluster))
      <form class="pro-form mt-5" method="get" action="{{ route('home.cluster_pro', ['cluster' => $cluster]) }}" role="form">
        @csrf
        <div class="row">
          <div class="col-sm-4 form-group">
            <label class="form-control-label" for="input-system-cost-per-kwp">{{ __('System Cost per kWp') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Total system cost and price per kwp." /></label>
            <div class="input-group" id="input-system-cost-per-kwp">
              {{-- <div class="form-group{{ $errors->has('cost_of_small_system') ? ' has-danger' : '' }}"> --}}
                {{-- <label class="form-control-label" for="input-cost-of-small-system">{{ __('cost_of_small_system') }}</label> --}}
                <input type="number" step="any" min="500" name="cost_of_small_system" id="input-cost-of-small-system" class="pro-input form-control{{ $errors->has('cost_of_small_system') ? ' is-invalid' : '' }}" placeholder = "{{ $orgdata['system_cost'] }}" value="{{ $prev_inputs['cost_of_small_system'] }}">
                @include('alerts.feedback', ['field' => 'cost_of_small_system'])
                {{-- </div> --}}
                {{-- <div class="form-group{{ $errors->has('system_size_kwp') ? ' has-danger' : '' }}"> --}}
                  <input type="number" step="any" min="1" max="10" name="system_size_kwp" id="input-system-size-kwp" class="pro-input form-control{{ $errors->has('system_size_kwp') ? ' is-invalid' : '' }}" placeholder = "{{ $orgdata['system_size'] }}" value="{{ $prev_inputs['system_size_kwp'] }}">
                  @include('alerts.feedback', ['field' => 'system_size_kwp'])
                  {{-- </div> --}}
                </div>
              </div>
              <div class="col-sm-2 form-group{{ $errors->has('captive-use') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-captive-use">{{ __('Captive Use') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Captive Use." /></label>

                <input type="number" step="any" name="captive_use" min="1" max="100" id="input-captive-use" class="pro-input form-control{{ $errors->has('captive_use') ? ' is-invalid' : '' }}" placeholder="{{ $orgdata['captiveuse'] }}" value="{{ $prev_inputs['captive_use'] }}">

                @include('alerts.feedback', ['field' => 'captive_use'])
              </div>
              <div class="col-sm-2 form-group{{ $errors->has('export-tariff') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-export-tariff">{{ __('Export Tariff') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Export Tariff." /></label>
                <input type="number" step="any" min="0" name="export_tariff" id="input-export-tariff" class="pro-input form-control{{ $errors->has('export-tariff') ? ' is-invalid' : '' }}" placeholder = "{{ $orgdata['exporttariff'] }}" value="{{ $prev_inputs['export_tariff'] }}">
                @include('alerts.feedback', ['field' => 'export_tariff'])
              </div>
              <div class="col-sm-2 form-group{{ $errors->has('domestic-tariff') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-domestic-tariff">{{ __('Residential Tariff') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Residential Tariff." /></label>
                <input type="number" step="any" min="0.01" name="domestic_tariff" id="input-domestic-tariff" class="pro-input form-control{{ $errors->has('domestic-tariff') ? ' is-invalid' : '' }}" placeholder="{{ $orgdata['residentialtariff'] }}" value="{{ $prev_inputs['domestic_tariff'] }}">
                @include('alerts.feedback', ['field' => 'domestic_tariff'])
              </div>
              <div class="col-sm-2 form-group{{ $errors->has('commercial-tariff') ? ' has-danger' : '' }}">
                <label class="form-control-label" for="input-commercial-tariff">{{ __('Non-Residential Tariff') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Non-residential Tariff." /></label>
                <input type="number" step="any" min="0.01" name="commercial_tariff" id="input-commercial-tariff" class="pro-input form-control{{ $errors->has('commercial-tariff') ? ' is-invalid' : '' }}" placeholder = "{{ $orgdata['nonresidentialtariff'] }}" value="{{ $prev_inputs['commercial_tariff'] }}">
                @include('alerts.feedback', ['field' => 'commercial_tariff'])
              </div>
              <div class="col-sm-2 text-left">
                <button type="submit" class="btn btn-default my-4">Run</button>
              </div>
                <div class="col-sm-2 text-left">
                    <a href="#" class="btn btn-default my-4 my-2-2" data-toggle="modal" data-target="#modal-form" aria-haspopup="true" aria-expanded="false">Save as new project</a>
                </div>
              <div class="col-sm-2 offset-sm-8 text-right">
                <button id="reset-btn" name="reset" value="reset" onclick="window.location.replace(window.location.href.replace(window.location.search, '')); return false;" class="btn btn-default-outline my-4">Reset</button>
              </div>
            </div>
          </form>
          <br>
          <br>

          @else
          <form class="pro-form mt-5" method="get" action="{{ route('home.region_pro', ['account' => $account, 'region' => $region ?? '']) }}" role="form">

            @csrf
            <div class="row">
              <div class="col-sm-4 form-group">
                <label class="form-control-label" for="input-system-cost-per-kwp">{{ __('System Cost per kWp') }}<img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Total system cost and price per kwp." /></label>
                <div class="input-group" id="input-system-cost-per-kwp">
                  {{-- <div class="form-group{{ $errors->has('cost_of_small_system') ? ' has-danger' : '' }}"> --}}
                    {{-- <label class="form-control-label" for="input-cost-of-small-system">{{ __('cost_of_small_system') }}</label> --}}
                    <input type="number" step="any" min="500" name="cost_of_small_system" id="input-cost-of-small-system" class="pro-input form-control{{ $errors->has('cost_of_small_system') ? ' is-invalid' : '' }}"  placeholder = "{{ $orgdata['system_cost'] }}" value="{{ $prev_inputs['cost_of_small_system'] }}">
                    @include('alerts.feedback', ['field' => 'cost_of_small_system'])
                    {{-- </div> --}}
                    {{-- <div class="form-group{{ $errors->has('system_size_kwp') ? ' has-danger' : '' }}"> --}}
                      <input type="number" step="any" min="1" max="10" name="system_size_kwp" id="input-system-size-kwp" class="pro-input form-control{{ $errors->has('system_size_kwp') ? ' is-invalid' : '' }}" placeholder = "{{ $orgdata['system_size'] }}" value="{{ $prev_inputs['system_size_kwp'] }}">
                      @include('alerts.feedback', ['field' => 'system_size_kwp'])
                      {{-- </div> --}}
                    </div>
                  </div>
                  <div class="col-sm-2 form-group{{ $errors->has('captive-use') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-captive-use">{{ __('Captive Use') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Captive use." /></label>

                    <input type="number" step="any" min="1" max="100" name="captive_use" id="input-captive-use" class="pro-input form-control{{ $errors->has('captive_use') ? ' is-invalid' : '' }}" placeholder = "{{ $orgdata['captiveuse'] }}" value="{{ $prev_inputs['captive_use'] }}">
                    @include('alerts.feedback', ['field' => 'captive_use'])
                  </div>
                  <div class="col-sm-2 form-group{{ $errors->has('export-tariff') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-export-tariff">{{ __('Export Tariff') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Export tariff." /></label>
                    <input type="number" step="any" min="0" name="export_tariff" id="input-export-tariff" class="pro-input form-control{{ $errors->has('export-tariff') ? ' is-invalid' : '' }}" placeholder = "{{ $orgdata['exporttariff'] }}" value="{{ $prev_inputs['export_tariff'] }}">
                    @include('alerts.feedback', ['field' => 'export_tariff'])
                  </div>
                  <div class="col-sm-2 form-group{{ $errors->has('domestic-tariff') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-domestic-tariff">{{ __('Residential Tariff') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Residential tariff." /></label>
                      <input type="number" step="any" min="0.01" name="domestic_tariff" id="input-domestic-tariff" class="pro-input form-control{{ $errors->has('domestic-tariff') ? ' is-invalid' : '' }}" placeholder="{{ $orgdata['residentialtariff'] }}" value="{{ $prev_inputs['domestic_tariff'] }}">
                      @include('alerts.feedback', ['field' => 'domestic_tariff'])
                  </div>
                  <div class="col-sm-2 form-group{{ $errors->has('commercial-tariff') ? ' has-danger' : '' }}">
                    <label class="form-control-label" for="input-commercial-tariff">{{ __('Non-Residential Tariff') }} <img src="{{ asset('svg') }}/info.svg" style="width: 10px; margin-bottom: 15px;"data-toggle="tooltip" title="Non-residential tariff." /></label>
                    <input type="number" step="any" min="0.01" name="commercial_tariff" id="input-commercial-tariff" class="pro-input form-control{{ $errors->has('commercial-tariff') ? ' is-invalid' : '' }}" placeholder = "{{ $orgdata['nonresidentialtariff'] }}" value="{{ $prev_inputs['commercial_tariff'] }}">
                    @include('alerts.feedback', ['field' => 'commercial_tariff'])
                  </div>
                  <div class="col-sm-2 text-left">
                    <button type="submit" class="btn btn-default my-4 my-2-2">Run</button>
                  </div>

                  <div class="col-sm-2 text-left">
                    <a href="#" class="btn btn-default my-4 my-2-2" data-toggle="modal" data-target="#modal-form" aria-haspopup="true" aria-expanded="false">Save as new project</a>
                  </div>

                  <div class="col-sm-2 offset-sm-8 text-right">
                    <button id="reset-btn" name="reset" value="reset" class="btn btn-default-outline my-4" onclick="window.location.replace(window.location.href.replace(window.location.search, '')); return false;">Reset</button>
                  </div>
                </div>
              </form>
              @endif
            </div>

          </div>
          <!-- Disclaimer -->
          <div class="card">
            <div class="card-body">
              <h4>DISCLAIMER</h4>
              <br>
              <h5>The data presented are estimations based on standard, industry-wide assumption; but can differ from actual solar array for the rooftops displayed.   Please consult a professional solar installations company for a customised proposal.</h5>

              <br>
              <button type="button" class="btn btn-sm btn-neutral mr-0" aria-haspopup="true" aria-expanded="false">
                <a href="{{ route('page.faq') }}" target="_blank">FAQ</a>
              </button>
            </div>
          </div>
          @include('layouts.footers.auth')
        </div>
        @endsection

        @push('css')
        <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        <link rel="stylesheet" href="{{ asset('argon') }}/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
        <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css'>
        <link rel="stylesheet" href="{{ asset('css') }}/dashboard.css">
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.css" type="text/css" />
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
        <script src="{{ asset('js') }}/mapbox-gl.js"></script>
        <script src="{{ asset('argon') }}/vendor/list.js/dist/list.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.0/mapbox-gl-draw.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@turf/turf@5/turf.min.js"></script>
        <script>

        $(document).ready(function(){
           // $("input[name='captive_use']").change(function() {
           //  number = $("input[name='captive_use']").val()
           //   if( number <= 0 || number > 100 ) {
           //       $("input[name='captive_use']").val("");
           //     }
           //   });
        });


        mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
        var map = new mapboxgl.Map({
          container: 'map',
          style: 'mapbox://styles/mapbox/satellite-v9',
          pitch: 10,
          bearing: -17.6,
          antialias: true
        });

        //initialize the draw toolbox
        var draw = new MapboxDraw({
          displayControlsDefault: false,
          controls: {
            polygon:true,
            trash: true
          }
        });
        map.addControl(draw, 'top-left');
        // map.on('draw.create', this.updateArea);
        // map.on('draw.delete', this.updateArea);
        // map.on('draw.update', this.updateArea);

        var clicked_geopoint_id, clicked_layer, clicked_popup;
        var layerPrefix = 'layer-years-';
        var yearColors = [
          [0, '#FFFFFF'],
          [1, '#63c54f'],
          [2, '#63c54f'],
          [3, '#63c54f'],
          [4, '#63c54f'],
          [5, '#63c54f'],
          [6, '#e0b542'],
          [7, '#e0b542'],
          [8, '#e0b542'],
          [9, '#e0b542'],
          [10, '#e0b542'],
          [11, '#cf7f3e'],
          [12, '#cf7f3e'],
          [13, '#cf7f3e'],
          [14, '#cf7f3e'],
          [15, '#cf7f3e'],
          [16, '#bd403a'],
          [17, '#bd403a'],
          [18, '#bd403a'],
          [19, '#bd403a'],
          [20, '#bd403a']
        ];
        var yearColorMap = new Map(yearColors);
        var symbolCountMap = new Map();
        var totalCount = 0;
        var selectedCount = 0,
        dataArray;
        var filterYears = new Map();
        var cluster_route = `{!! $cluster ?? '' !!}`
        var features = [];
        var allpolyginptn = [];
        var checkExisting = document.querySelector("#checkExisting");
        var zeroSolarData = document.querySelector("#zeroSolarData");
        var feature = "";
        var showactivesites = 0;
        var totalshowingval  = 0;

        function renderMap() {

          var jsonString = `{!! $geodata ?? '' !!}`;
          // on production something breaks json data
          jsonString = jsonString.replace('"Lu Colciu Rocchi"',"'Lu Colciu Rocchi'");
          var bounds = new mapboxgl.LngLatBounds();
          var filterGroup = document.getElementById('filter-group');
          if (jsonString.length > 0) {
            dataArray = JSON.parse(jsonString);

            dataArray.sort(function(a, b) {
              return a['breakeven_years'] - b['breakeven_years'];
            });
            var potential = 0;
            var savings = 0;
            var co2 = 0;

            // for (var key in jsonData) {
            for (key = 0; key < dataArray.length; key++) {
              //determining header of point popup
              var header = `
              <h5 class="h3 mb-0" title="Remove the geopoint from project" data-toggle="tooltip" data-placement="top">Remove from project</h5>
              <a id="remove_from_cluster" data-toggle="modal" data-target="#delete-form" data-geopoint="${dataArray[key].id}">
              <img src="{{ asset('argon') }}/img/icons/minus.png" />
              </a>
              `
              if (cluster_route == "") {
                header = `
                <h5 class="h3 mb-0" title="Add this geopoint to a new or existing project" data-toggle="tooltip" data-placement="top">Add to Project</h5>
                <a id="add_cluster" data-toggle="modal" data-target="#cluster-form" data-geopoint="${dataArray[key].id}">
                <img src="{{ asset('argon') }}/img/icons/plus.png" />
                </a>
                `
              }

              var feature = "";

              if(dataArray[key].existingsolar == 'Y'){
                showactivesites++;
              }

              if(dataArray[key].breakeven_years == 0){
                 feature = {
                    type: "Feature",
                    properties: {
                      description: `
                      <div class="card popup-card">
                      <div id="cluster-header" class="card-header" style="display:table;padding-top:0.5rem;padding-bottom:0.5rem;padding-left:1rem;padding-right:0;">
                      ${header}
                      </div>
                      <div class="card-body" style="padding-top:0.5rem;padding-bottom:0.5rem; padding-left:1rem; padding-right:1rem;">
                        <p class="card-text card-empty-error">
                          There is no solar data for this location.
                        </p>
                      </div>
                      </div>`,
                      years: dataArray[key].breakeven_years,
                      id: dataArray[key].id,
                      area: dataArray[key].area_sqm,
                      panels: dataArray[key].numpanels,
                      roi: dataArray[key].lifetime_return_on_investment_percent,
                      existingSolar: dataArray[key].existingsolar,
                      solarData: 'Y'
                    },
                    geometry: {
                      type: dataArray[key].latLon.type,
                      coordinates: dataArray[key].latLon.coordinates
                    }
                  };

                  totalshowingval++;

              }
              else{

                 feature = {
                    type: "Feature",
                    properties: {
                      description: `
                      <div class="card popup-card">
                      <div id="cluster-header" class="card-header" style="display:table;padding-top:0.5rem;padding-bottom:0.5rem;padding-left:1rem;padding-right:0;">
                      ${header}
                      </div>
                      <div class="card-body" style="padding-top:0.5rem;padding-bottom:0.5rem; padding-left:1rem; padding-right:1rem;">
                      <p class="card-text">
                      <strong>Break-even:</strong> ${dataArray[key].breakeven_years} years</br>
                      <strong>System Size:</strong> ${numeral(dataArray[key].system_capacity_kWp).format('0,0.0a')} kWp<br/>
                      <strong>System Cost:</strong> {{ $orgdata['currencysymbol'] }} ${numeral(dataArray[key].system_cost_GBP).format('0,0.0a')}<br/>
                      <strong>Lifetime Savings:</strong> {{ $orgdata['currencysymbol'] }} ${numeral(dataArray[key].lifetime_gen_GBP).format('0,0.0a')}<br/>
                      <strong>Lifetime CO<sub>2</sub> saving:</strong> ${numeral(dataArray[key].lifetime_co2_saved_kg).format('0,0.0a')} kgs<br/>
                      <strong>IRR: </strong> ${dataArray[key].irr_discounted_percent}%<br/>
                      </p>
                      <a href="{{ route('page.reporting') }}?geopoint_id=${dataArray[key].id}" class="btn btn-primary"
                      target="_blank">Generate Report</a>
                      <a href="{{ route('page.building') }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top"
                      target="_blank" title="Upgrade to view detailed building ownership information, and tenancy details for commercial and industrial buildings.">Building Info</a>
                      </div>
                      </div>`,
                      years: dataArray[key].breakeven_years,
                      id: dataArray[key].id,
                      area: dataArray[key].area_sqm,
                      panels: dataArray[key].numpanels,
                      roi: dataArray[key].lifetime_return_on_investment_percent,
                      existingSolar: dataArray[key].existingsolar,
                      solarData : 'N'
                    },
                    geometry: {
                      type: dataArray[key].latLon.type,
                      coordinates: dataArray[key].latLon.coordinates
                    }
                  };


              }

              features.push(feature);
              potential = potential + dataArray[key].system_capacity_kWp;
              savings = savings + dataArray[key].lifetime_gen_GBP;
              co2 = co2 + dataArray[key].lifetime_co2_saved_kg;
              if (symbolCountMap[dataArray[key].breakeven_years] == undefined)
              symbolCountMap[dataArray[key].breakeven_years] = 0;
              symbolCountMap[dataArray[key].breakeven_years] += 1;
            }
            features.forEach(function(feature) {
              bounds.extend(feature.geometry.coordinates);
            });




            if (potential / 1000000 >= 1) {
              potential = potential / 1000000;
              $('#potential-card').text(numeral(potential).format('0,0.0a') + " GWp");
            } else if (potential / 1000 >= 1) {
              potential = potential / 1000;
              $('#potential-card').text(numeral(potential).format('0,0.0a') + " MWp");
            } else
            $('#potential-card').text(numeral(potential).format('0,0.0a') + " kWp");
            $('#savings-card').text('<?php if(!empty($orgdata['currencysymbol'])) { echo $orgdata['currencysymbol']; } else { echo "£"; } ?> ' + numeral(savings).format('(0.00a)'));
            $('#co2-card').text(numeral(co2).format('0,0.0a') + " kgs");
            totalCount = dataArray.length;
            selectedCount = totalCount;

            $('#total-count').text(numeral(dataArray.length).format('0,0'));
            $('#selected-count').text(numeral(totalshowingval).format('0,0'));

            //$('#total-count').text(numeral(dataArray.length).format('0,0'));
            //$('#selected-count').text(numeral(dataArray.length).format('0,0'));

            $('.poly-ms').text(numeral(dataArray.length).format('0,0'));



          }
          map.on('load', function() {
            map.loadImage('../../svg/map-marker-alt-solid.png', function(error, image) {
              if (error) throw error;
              map.addImage('marker-icon', image, {
                'sdf': true
              });
              map.addSource('places', {
                'type': 'geojson',
                'data': {
                  'type': 'FeatureCollection',
                  'features': features
                },
                cluster: true,
                clusterMaxZoom: 16, // Max zoom to cluster points on
                clusterRadius: 50
              });
              features.forEach(function(feature) {
                var symbol = feature.properties['years'];
                var layerID = layerPrefix + symbol;
                filterYears[symbol] = true;
                // Add a layer for this symbol type if it hasn't been added already.
                if (!map.getLayer(layerID)) {
                  map.addLayer({
                    'id': layerID,
                    'type': 'symbol',
                    'source': 'places',
                      'layout': {
                          'icon-image': 'marker-icon',
                          'icon-allow-overlap': true,
                          "icon-size": ['interpolate', ['linear'],
                              ['zoom'], 1, 0.5, 10, 1
                          ]
                      },
                      'filter': [
                          "all",
                          ["==", "years", symbol]

                          // ["==", "years", symbol],
                          // ["!=", "existingSolar", "Y"],
                          // ["!=", "solarData", "Y"]

                      ],
                  'paint': {
                    'icon-color': [
                      'match',
                      ['get', 'existingSolar'],
                      'Y', '#5F73E3',
                      yearColorMap.get(symbol)??'#6D0000',
                    ]
                  }
                });

                // Add checkbox and label elements for the layer.
                var input = document.createElement('input');
                input.type = 'checkbox';
                input.id = layerID;
                input.checked = true;
                filterGroup.appendChild(input);

                var label = document.createElement('label');
                label.setAttribute('for', layerID);
                label.setAttribute('style', 'margin-bottom:0px;background-color:' + (yearColorMap.get(symbol) ?? '#6D0000'));
                label.textContent = symbol + ' Years';
                filterGroup.appendChild(label);

                // When the checkbox changes, update the visibility of the layer.
                input.addEventListener('change', function(e) {
                  var features_temp = [];
                  var selectecheckboxes = [];

                  var templayer = layerID.split("layer-years-");
                  var yeartemp = templayer[1];
                  totalshowingval = 0;

                  yeartemp = parseInt(yeartemp);



                  $("#filter-group input:checkbox:checked").each(function(){
                      var slchec = $(this).attr("id");
                      var templayersl = slchec.split("layer-years-");
                      var yeartempsl = templayersl[1];
                      yeartempsl = parseInt(yeartempsl);
                      selectecheckboxes.push(yeartempsl);
                  });


                  features.forEach(function(feature) {
                   // console.log(feature.properties.years);
                    if(selectecheckboxes.includes(feature.properties.years)){
                      if($("#zeroSolarData").is(':checked')){
                           features_temp.push(feature);
                           totalshowingval++;
                      } else {
                         if(feature.properties.solarData == 'N'){
                          features_temp.push(feature);
                          totalshowingval++;
                        }
                      }

                    }
                  });

                  map.getSource('places').setData({
                    'type': 'FeatureCollection',
                    'features': features_temp
                  });

                 /* map.setLayoutProperty(
                    layerID,
                    'visibility',
                    e.target.checked ? 'visible' : 'none'
                  );
                  */
                  filterYears[symbol] = e.target.checked ? true : false;
                  if (e.target.checked)
                  selectedCount = selectedCount + symbolCountMap[symbol];
                  else
                  selectedCount = selectedCount - symbolCountMap[symbol];
                  $('#selected-count').text(numeral(totalshowingval).format('0,0'));
                  $('.poly-ms').text(numeral(selectedCount).format('0,0'));


                $("#calculated-area-container").slideDown();
                var fttemp = [];
                var totallength = 0;

                var srchwithin = [];
                allpolyginptn = [];

                var data = draw.getAll();

                //console.log(features_temp);


                var answer = document.getElementById('calculated-area');
                if (data.features.length > 0) {


                //console.log(data)

                features_temp.forEach(function(feature) {
                //  console.log(feature.solarData);
                  if(feature.solarData != 'Y'){
                    fttemp.push(feature.geometry.coordinates);
                  }
                });

                data.features.forEach(function(feature) {
                  srchwithin.push(feature.geometry.coordinates);
                });

                var points = turf.points(fttemp);

                srchwithin.forEach(function(srchin){

                  var searchWithin = turf.polygon(srchin);

                  var ptsWithin = turf.pointsWithinPolygon(points, searchWithin);

                  var ftms = ptsWithin.features;


                  totallength = totallength + ptsWithin.features.length;


                  //console.log('data22');

                  features_temp.forEach(function(featuremain) {

                      ftms.forEach(function(featuresingle) {


                              if(featuresingle.geometry.coordinates[0] == featuremain.geometry.coordinates[0] && featuresingle.geometry.coordinates[1] == featuremain.geometry.coordinates[1]){

                                //console.log(featuremain);
                                if(featuremain.properties.solarData != 'Y'){
                                  if(!allpolyginptn.includes(featuremain.properties.id)){
                                    allpolyginptn.push(featuremain.properties.id);
                                  }
                                }
                              }


                      });

                  });


                });

                //console.log("All polygon--");
                //console.log(allpolyginptn);

                $("#calculated-area").html("Polygon Selection " + numeral(allpolyginptn.length).format('0,0') + " of <span class='poly-ms'>" + $("#total-count").html() + "</span> sites.");


                }

                });
                map.on('click', layerID, function(e) {
                  if (e.originalEvent.cancelBubble) {
                    return;
                  }
                  clicked_layer = layerID;
                  var coordinates = e.features[0].geometry.coordinates.slice();
                  var description = e.features[0].properties.description;

                  // Ensure that if the map is zoomed out such that multiple
                  // copies of the feature are visible, the popup appears
                  // over the copy being pointed to.
                  while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                  }

                  var popup = new mapboxgl.Popup()
                  .setLngLat(coordinates)
                  .setHTML(description)
                  .setMaxWidth("500px")
                  .on('open', function(e) {
                    clicked_popup = e.target
                  })
                  .addTo(map);
                  $('[data-toggle="tooltip"]').tooltip();
                  e.originalEvent.cancelBubble = true;
                });
                // Change the cursor to a pointer when the mouse is over the layer.
                map.on('mouseenter', layerID, function() {
                  map.getCanvas().style.cursor = 'pointer';
                });

                // Change it back to a pointer when it leaves.
                map.on('mouseleave', layerID, function() {
                  map.getCanvas().style.cursor = '';
                });
              }
            });
            map.addLayer({
              id: 'clusters',
              type: 'circle',
              source: 'places',
              filter: ['has', 'point_count'],
              paint: {
                // Use step expressions (https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-step)
                // with three steps to implement three types of circles:
                //   * Blue, 20px circles when point count is less than 100
                //   * Yellow, 30px circles when point count is between 100 and 750
                //   * Pink, 40px circles when point count is greater than or equal to 750
                'circle-color': '#51bbd6',
                // 'circle-color': [
                //     'step',
                //     ['get', 'point_count'],
                //     '#51bbd6',
                //     100,
                //     '#f1f075',
                //     750,
                //     '#f28cb1'
                // ],
                'circle-radius': [
                  'step',
                  ['get', 'point_count'],
                  20,
                  100,
                  30,
                  750,
                  40
                ]
              }
            });
            map.addLayer({
              id: 'cluster-count',
              type: 'symbol',
              source: 'places',
              filter: ['has', 'point_count'],
              layout: {
                'text-field': '{point_count_abbreviated}',
                'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
                'text-size': 12
              }
            });

            var layers = map.getStyle().layers;

            var labelLayerId;
            for (var i = 0; i < layers.length; i++) {
              if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                labelLayerId = layers[i].id;
                break;
              }
            }
            var yearsArray = [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
            checkExisting.onclick = function (e) {
              layers.forEach(layer => {

                if(layer.type === "symbol" && layer.id !== "cluster-count"){
                  if(checkExisting.checked){

                    var year = layer.filter[1][2]

                    var include_existing =["==", "years", year];
                    map.setFilter(layer.id, include_existing);

                  } else {
                    var filter_existing =[
                      "all",
                      ["==", "years", layer.filter[1][2]],
                      ["!=", "existingSolar", "Y"]
                    ];
                    map.setFilter(layer.id, filter_existing);

                  }
                }
              })
            }



            map.on('draw.create', updateArea);
            map.on('draw.delete', updateArea);
            map.on('draw.update', updateArea);

            function updateArea(e) {

                $("#calculated-area-container").slideDown();
                var fttemp = [];

                allpolyginptn = [];

                var totallength = 0;

                var srchwithin = [];
                var data = draw.getAll();
                var answer = document.getElementById('calculated-area');
                if (data.features.length > 0) {

                var features_temp = [];
                var selectecheckboxes = [];
                totalshowingval = 0;



                $("#filter-group input:checkbox:checked").each(function(){
                    var slchec = $(this).attr("id");
                    var templayersl = slchec.split("layer-years-");
                    var yeartempsl = templayersl[1];
                    yeartempsl = parseInt(yeartempsl);
                    selectecheckboxes.push(yeartempsl);
                });


                features.forEach(function(feature) {
                 // console.log(feature.properties.years);
                  if(selectecheckboxes.includes(feature.properties.years)){
                    if($("#zeroSolarData").is(':checked')){
                         features_temp.push(feature);
                         totalshowingval++;
                    } else {
                       if(feature.properties.solarData == 'N'){
                        features_temp.push(feature);
                        totalshowingval++;
                      }
                    }

                  }
                });

                features_temp.forEach(function(feature) {

                //  console.log(feature.solarData);
                  if(feature.solarData != 'Y'){
                    fttemp.push(feature.geometry.coordinates);
                  }
                });

                data.features.forEach(function(feature) {
                  srchwithin.push(feature.geometry.coordinates);
                });

                var points = turf.points(fttemp);

                srchwithin.forEach(function(srchin){

                  var searchWithin = turf.polygon(srchin);

                  var ptsWithin = turf.pointsWithinPolygon(points, searchWithin);

                  var ftms = ptsWithin.features;

                  totallength = totallength + ptsWithin.features.length;


                  features_temp.forEach(function(featuremain) {

                      ftms.forEach(function(featuresingle) {

                              if(featuresingle.geometry.coordinates[0] == featuremain.geometry.coordinates[0] && featuresingle.geometry.coordinates[1] == featuremain.geometry.coordinates[1]){

                                //console.log(featuremain);
                                if(featuremain.properties.solarData != 'Y'){
                                  if(!allpolyginptn.includes(featuremain.properties.id)){
                                    allpolyginptn.push(featuremain.properties.id);
                                  }
                                }
                              }

                      });

                  });


                });

                $("#calculated-area").html("Polygon Selection " + numeral(allpolyginptn.length).format('0,0') + " of <span class='poly-ms'>" + $("#total-count").html() + "</span> sites.");
                //$("#calculated-area").html("Polygon Selection " + numeral(allpolyginptn.length).format('0,0') + " of <span class='poly-ms'>" + numeral(dataArray.length).format('0,0') + "</span> sites.");


                }

            }


            $(document).on('change', '[name="zeroSolarData"]', function() {
                features_temp = [];
                selectecheckboxes = [];
                var totalshowingval = 0;
                var checkbox = $(this), // Selected or current checkbox
                    value = checkbox.val(); // Value of checkbox

                  $("#filter-group input:checkbox:checked").each(function(){
                      var slchec = $(this).attr("id");
                      var templayersl = slchec.split("layer-years-");
                      var yeartempsl = templayersl[1];
                      yeartempsl = parseInt(yeartempsl);
                      selectecheckboxes.push(yeartempsl);
                  });

                 if (checkbox.is(':checked')){

                    features.forEach(function(feature) {
                     // console.log(feature.properties.years);
                        if(selectecheckboxes.includes(feature.properties.years)){
                            if(feature.properties.solarData === 'Y' || feature.properties.solarData === 'N'){
                              features_temp.push(feature);
                                totalshowingval++;
                            }
                        }
                    });

                    map.getSource('places').setData({
                      'type': 'FeatureCollection',
                      'features': features_temp
                    });

                    $('#total-count').text(numeral(dataArray.length).format('0,0'));
                    $('#selected-count').text(numeral(totalshowingval).format('0,0'));
                    $('.poly-ms').text($("#total-count").html());

                  }
                  else{

                    features.forEach(function(feature) {
                     // console.log(feature.properties.years);
                        if(selectecheckboxes.includes(feature.properties.years)){
                            if(feature.properties.solarData == 'N'){
                              features_temp.push(feature);
                                totalshowingval++;
                            }
                        }
                    });

                     $('#total-count').text(numeral(dataArray.length).format('0,0'));
                     $('#selected-count').text(numeral(totalshowingval).format('0,0'));
                     $('.poly-ms').text($("#total-count").html());

                    map.getSource('places').setData({
                      'type': 'FeatureCollection',
                      'features': features_temp
                    });

                  }

            });


            jQuery("input#zeroSolarData").trigger("change");

            map.fitBounds(bounds);

            //     var checkbox = $(this), // Selected or current checkbox
            //         value = checkbox.val(); // Value of checkbox
            //    layers.forEach(layer => {
            //
            //     if(layer.type === "symbol" && layer.id !== "cluster-count"){
            //       if (checkbox.is(':checked'))
            //       {
            //
            //
            //         var year = layer.filter[1][2]
            //         var include_existing =["==", "years", year];
            //         map.setFilter(layer.id, include_existing);
            //
            //
            //       }else
            //       {
            //       var filter_existing =[
            //             "all",
            //             ["==", "years", layer.filter[1][2]],
            //             ["!=", "solarData", "Y"]
            //           ];
            //           map.setFilter(layer.id, filter_existing);
            //
            //
            //
            //
            //       }
            //     }
            //   });
            // });
            //
            //
            // map.fitBounds(bounds);



           // console.log(ptsWithin);


          });
        });
      }





      function getClusters() {
        $.ajax({
          type: 'GET',
          url: '/clusters',
        }).done(function(data) {
          clusters = data.data;
          cluster_select = $('#cluster-select')
          cluster_select.find('option').remove()
          for (var i = 0; i < clusters.length; i++) {
            cluster_select.append($('<option>').val(clusters[i].id).text(clusters[i].name))
          }
        })
      }
      $(document).ready(function() {

        function getProParams() {
            let proParams = {
                captive_use: (($("#input-captive-use").val().length > 0) ? $("#input-captive-use").val() : {{ $orgdata['captiveuse'] }}),
                export_tariff: (($("#input-export-tariff").val().length > 0) ? $("#input-export-tariff").val() : {{ $orgdata['exporttariff'] }}),
                domestic_tariff: (($("#input-domestic-tariff").val().length > 0) ? $("#input-domestic-tariff").val() : {{ $orgdata['residentialtariff'] }}),
                commercial_tariff: (($("#input-commercial-tariff").val().length > 0) ? $("#input-commercial-tariff").val() : {{ $orgdata['nonresidentialtariff'] }}),
                system_cost: $("#input-cost-of-small-system").val(),
                system_size: $("#input-system-size-kwp").val()
            }

            return proParams;
        }

          renderMap();
        $('[data-toggle="tooltip"]').tooltip();
        getClusters();
        $('#map').on('click', '#add_cluster', function(event) {
          clicked_geopoint_id = event.currentTarget.getAttribute("data-geopoint")
        });
        $('#map').on('click', '#remove_from_cluster', function(event) {
          clicked_geopoint_id = event.currentTarget.getAttribute("data-geopoint")
        });
        $('#remove-site').on('click', function(event) {
          var formData = {
            geopoint_id: clicked_geopoint_id,
            '_token': $('input[name=_token]').val(),
            cluster_name: cluster_route
          }
          $.ajax({
            type: 'POST',
            url: '/remove/geopoint',
            data: formData,
            dataType: 'json',
            encode: true
          }).done(function(data) {
            $('#delete-form').modal('hide')
            $('#delete-next-form').modal('show')
            var break_even_years
            features = features.filter(function(feature) {
              if (feature.properties.id == clicked_geopoint_id) {
                break_even_years = feature.properties.years
              }
              return feature.properties.id != clicked_geopoint_id
            })
            symbolCountMap[break_even_years] -= 1
            totalCount -= 1
            selectedCount -= 1
            $('#total-count').text(numeral(totalCount).format('0,0'));
            $('#selected-count').text(numeral(selectedCount).format('0,0'));

            $('.poly-ms').text($("#total-count").html());
            //$('.poly-ms').text(numeral(selectedCount).format('0,0'));


            $('#total-sites').text(totalCount)
            map.getSource('places').setData({
              'type': 'FeatureCollection',
              'features': features
            })
            clicked_popup.remove()
            $('#delete-next-response-status').text(data.message).css('display', 'block').addClass('alert-success').removeClass('alert-danger').delay(3000).fadeOut();
          }).fail(function(data) {
            $('#delete-form').modal('hide')
            $('#delete-next-form').modal('show')
            $('#delete-next-response-status').text(data.responseJSON.message).css('display', 'block').addClass('alert-danger').removeClass('alert-success').delay(3000).fadeOut();
          });
        })
        $('#modal-form').submit(function(event) {
          event.preventDefault();
          var visiblePoints = [];
          for (var i = 0; i < dataArray.length; i++) {
            if (filterYears[dataArray[i].breakeven_years]) {
              if(dataArray[i].existingsolar === 'N') {
                visiblePoints.push(dataArray[i].id);
              }
            }
          }
          var formData = {
            'name': $('input[name=name]').val(),
            '_token': $('input[name=_token]').val(),
            'geopoints': JSON.stringify(visiblePoints),
            'pro_params': JSON.stringify(getProParams())
          };
          $.ajax({
            type: 'POST',
            url: '/clusters',
            data: formData,
            dataType: 'json',
            encode: true
          }).done(function(data) {
            $('#modal-form').modal('hide')
            $('#next-form').modal('show')
            getClusters()
            $('#next-response-status').text(data.message).css('display', 'block').addClass('alert-success').removeClass('alert-danger').delay(3000).fadeOut();
            $('#cluster-href').attr('href', data.cluster_link)
          }).fail(function(data) {
            $('#modal-form').modal('hide')
            $('#next-form').modal('show')
            $('#next-response-status').text(data.responseJSON.message).css('display', 'block').addClass('alert-danger').removeClass('alert-success').delay(3000).fadeOut();
          });
        });

        $('#modal-form-polygon').submit(function(event) {
          event.preventDefault();

          var formData = {
            'name': $('input[name=namepoly]').val(),
            '_token': $('input[name=_token]').val(),
            'geopoints': JSON.stringify(allpolyginptn),
            'pro_params': JSON.stringify(getProParams())
          };
          $.ajax({
            type: 'POST',
            url: '/clusters',
            data: formData,
            dataType: 'json',
            encode: true
          }).done(function(data) {
            $('#modal-form-polygon').modal('hide')
            $('#next-form').modal('show')
            getClusters()
            $('#next-response-status').text(data.message).css('display', 'block').addClass('alert-success').removeClass('alert-danger').delay(3000).fadeOut();
            $('#cluster-href').attr('href', data.cluster_link)
          }).fail(function(data) {
            $('#modal-form-polygon').modal('hide')
            $('#next-form').modal('show')
            $('#next-response-status').text(data.responseJSON.message).css('display', 'block').addClass('alert-danger').removeClass('alert-success').delay(3000).fadeOut();
          });
        });

        if(totalshowingval == 0){
          $("#zero_solar_data_wrp").append('<div class="block-ui-toggle"></div>');
        }

        if(showactivesites == 0){
          $("#active_sites_data_wrp").append('<div class="block-ui-toggle"></div>');
        }

        $('#newClusterCheck').change(function(event) {
          $('input[name=new_name]').prop('disabled', !event.target.checked)
          $('#cluster-select').prop('disabled', event.target.checked)
        })
        $('#cluster-form').submit(function(event) {
          event.preventDefault();
          var formData = {
            geopoint_id: clicked_geopoint_id,
            '_token': $('input[name=_token]').val(),
            'pro_params': JSON.stringify(getProParams())
          }
          if ($('#newClusterCheck').is(":checked")) {
            formData['new_name'] = $('input[name=new_name]').val()
          } else {
            formData['cluster_id'] = $('#cluster-select').children("option:selected").val()
          }
          $.ajax({
            type: 'POST',
            url: '/add/geopoint',
            data: formData,
            dataType: 'json',
            encode: true
          }).done(function(data) {
            $('#cluster-form').modal('hide')
            $('#next-form').modal('show')
            getClusters()
            $('#next-response-status').text(data.message).css('display', 'block').addClass('alert-success').removeClass('alert-danger').delay(3000).fadeOut();
            $('#cluster-href').attr('href', data.cluster_link)
          }).fail(function(data) {
            $('#cluster-form').modal('hide')
            $('#next-form').modal('show')
            $('#next-response-status').text(data.responseJSON.message).css('display', 'block').addClass('alert-danger').removeClass('alert-success').delay(3000).fadeOut();
          });
        });
      });
      </script>
      <style>
      .dataTable tr {
        cursor: pointer;
      }

      .filter-group {
        font: 10px/8px 'Helvetica Neue', Arial, Helvetica, sans-serif;
        font-weight: 600;
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1;
        border-radius: .375rem;
        overflow: hidden;
        width: 100px;
        color: #fff;
      }

      .filter-group input[type='checkbox']:first-child+label {
        border-radius: 3px 3px 0 0;
      }

      .filter-group label:last-child {
        border-radius: 0 0 3px 3px;
        border: none;
      }

      .filter-group input[type='checkbox'] {
        display: none;
      }

      .filter-group input[type='checkbox']+label {
        background-color: #3386c0;
        display: block;
        cursor: pointer;
        padding: 10px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.25);
      }

      .filter-group input[type='checkbox']+label {
        background-color: #3386c0;
        text-transform: capitalize;
      }

      .filter-group input[type='checkbox']+label:hover,
      .filter-group input[type='checkbox']:checked+label {
        background-color: #4ea0da;
      }

      .filter-group input[type='checkbox']:checked+label:before {
        content: '✔';
        margin-right: 5px;
      }

      .mapboxgl-popup-close-button {
        font-size: 22px;
      }

      .mapboxgl-popup-content {
        background-color: #ffffff;
      }
      </style>
      @endpush
