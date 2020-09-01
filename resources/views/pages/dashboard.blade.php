@extends('layouts.app', [
    'parentSection' => 'dashboards',
    'elementName' => 'dashboard'
])

@section('content')
    @component('layouts.headers.auth')
        @component('layouts.headers.breadcrumbs')
            @slot('title')
                {{ __('Default') }}
            @endslot

            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboards') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Default') }}</li>
        @endcomponent
{{--        @include('layouts.headers.cards')--}}
    @endcomponent

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-primary border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Tasks completed</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">8/24</span>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-info border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Contacts</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">123/267</span>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-danger border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Items sold</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">200/300</span>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-gradient-default border-0">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Notifications</h5>
                                <span class="h2 font-weight-bold mb-0 text-white">50/62</span>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-sm btn-neutral mr-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-sm">
                            <a href="#!" class="text-nowrap text-white font-weight-600">See details</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card border-0">
                    {{--                    <div id="map-custom" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 600px;"></div>--}}
                    <div id='map' class="map-canvas" style='height: 600px;'></div>
                </div>
            </div>
        </div>
{{--        <div class="row">--}}
{{--            <div class="col-xl-8">--}}
{{--                <div class="card bg-default">--}}
{{--                    <div class="card-header bg-transparent">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>--}}
{{--                                <h5 class="h3 text-white mb-0">Sales value</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col">--}}
{{--                                <ul class="nav nav-pills justify-content-end">--}}
{{--                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}'--}}
{{--                                        data-prefix="$" data-suffix="k">--}}
{{--                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">--}}
{{--                                            <span class="d-none d-md-block">Month</span>--}}
{{--                                            <span class="d-md-none">M</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}'--}}
{{--                                        data-prefix="$" data-suffix="k">--}}
{{--                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">--}}
{{--                                            <span class="d-none d-md-block">Week</span>--}}
{{--                                            <span class="d-md-none">W</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <!-- Chart -->--}}
{{--                        <div class="chart">--}}
{{--                            <!-- Chart wrapper -->--}}
{{--                            <canvas id="chart-sales-dark" class="chart-canvas"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header bg-transparent">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>--}}
{{--                                <h5 class="h3 mb-0">Total orders</h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <!-- Chart -->--}}
{{--                        <div class="chart">--}}
{{--                            <canvas id="chart-bars" class="chart-canvas"></canvas>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-4">--}}
{{--                <!-- Members list group card -->--}}
{{--                <div class="card">--}}
{{--                    <!-- Card header -->--}}
{{--                    <div class="card-header">--}}
{{--                        <!-- Title -->--}}
{{--                        <h5 class="h3 mb-0">Team members</h5>--}}
{{--                    </div>--}}
{{--                    <!-- Card body -->--}}
{{--                    <div class="card-body">--}}
{{--                        <!-- List group -->--}}
{{--                        <ul class="list-group list-group-flush list my--3">--}}
{{--                            <li class="list-group-item px-0">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" class="avatar rounded-circle">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col ml--2">--}}
{{--                                        <h4 class="mb-0">--}}
{{--                                            <a href="#!">John Michael</a>--}}
{{--                                        </h4>--}}
{{--                                        <span class="text-success">●</span>--}}
{{--                                        <small>Online</small>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <button type="button" class="btn btn-sm btn-primary">Add</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item px-0">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" class="avatar rounded-circle">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col ml--2">--}}
{{--                                        <h4 class="mb-0">--}}
{{--                                            <a href="#!">Alex Smith</a>--}}
{{--                                        </h4>--}}
{{--                                        <span class="text-warning">●</span>--}}
{{--                                        <small>In a meeting</small>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <button type="button" class="btn btn-sm btn-primary">Add</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item px-0">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" class="avatar rounded-circle">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col ml--2">--}}
{{--                                        <h4 class="mb-0">--}}
{{--                                            <a href="#!">Samantha Ivy</a>--}}
{{--                                        </h4>--}}
{{--                                        <span class="text-danger">●</span>--}}
{{--                                        <small>Offline</small>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <button type="button" class="btn btn-sm btn-primary">Add</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item px-0">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" class="avatar rounded-circle">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col ml--2">--}}
{{--                                        <h4 class="mb-0">--}}
{{--                                            <a href="#!">John Michael</a>--}}
{{--                                        </h4>--}}
{{--                                        <span class="text-success">●</span>--}}
{{--                                        <small>Online</small>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <button type="button" class="btn btn-sm btn-primary">Add</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-4">--}}
{{--                <!-- Checklist -->--}}
{{--                <div class="card">--}}
{{--                    <!-- Card header -->--}}
{{--                    <div class="card-header">--}}
{{--                        <!-- Title -->--}}
{{--                        <h5 class="h3 mb-0">To do list</h5>--}}
{{--                    </div>--}}
{{--                    <!-- Card body -->--}}
{{--                    <div class="card-body p-0">--}}
{{--                        <!-- List group -->--}}
{{--                        <ul class="list-group list-group-flush" data-toggle="checklist">--}}
{{--                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">--}}
{{--                                <div class="checklist-item checklist-item-success">--}}
{{--                                    <div class="checklist-info">--}}
{{--                                        <h5 class="checklist-title mb-0">Call with Dave</h5>--}}
{{--                                        <small>10:30 AM</small>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="custom-control custom-checkbox custom-checkbox-success">--}}
{{--                                            <input class="custom-control-input" id="chk-todo-task-1" type="checkbox" checked>--}}
{{--                                            <label class="custom-control-label" for="chk-todo-task-1"></label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">--}}
{{--                                <div class="checklist-item checklist-item-warning">--}}
{{--                                    <div class="checklist-info">--}}
{{--                                        <h5 class="checklist-title mb-0">Lunch meeting</h5>--}}
{{--                                        <small>10:30 AM</small>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="custom-control custom-checkbox custom-checkbox-warning">--}}
{{--                                            <input class="custom-control-input" id="chk-todo-task-2" type="checkbox">--}}
{{--                                            <label class="custom-control-label" for="chk-todo-task-2"></label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">--}}
{{--                                <div class="checklist-item checklist-item-info">--}}
{{--                                    <div class="checklist-info">--}}
{{--                                        <h5 class="checklist-title mb-0">Argon Dashboard Launch</h5>--}}
{{--                                        <small>10:30 AM</small>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="custom-control custom-checkbox custom-checkbox-info">--}}
{{--                                            <input class="custom-control-input" id="chk-todo-task-3" type="checkbox">--}}
{{--                                            <label class="custom-control-label" for="chk-todo-task-3"></label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="checklist-entry list-group-item flex-column align-items-start py-4 px-4">--}}
{{--                                <div class="checklist-item checklist-item-danger">--}}
{{--                                    <div class="checklist-info">--}}
{{--                                        <h5 class="checklist-title mb-0">Winter Hackaton</h5>--}}
{{--                                        <small>10:30 AM</small>--}}
{{--                                    </div>--}}
{{--                                    <div>--}}
{{--                                        <div class="custom-control custom-checkbox custom-checkbox-danger">--}}
{{--                                            <input class="custom-control-input" id="chk-todo-task-4" type="checkbox" checked>--}}
{{--                                            <label class="custom-control-label" for="chk-todo-task-4"></label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-4">--}}
{{--                <!-- Progress track -->--}}
{{--                <div class="card">--}}
{{--                    <!-- Card header -->--}}
{{--                    <div class="card-header">--}}
{{--                        <!-- Title -->--}}
{{--                        <h5 class="h3 mb-0">Progress track</h5>--}}
{{--                    </div>--}}
{{--                    <!-- Card body -->--}}
{{--                    <div class="card-body">--}}
{{--                        <!-- List group -->--}}
{{--                        <ul class="list-group list-group-flush list my--3">--}}
{{--                            <li class="list-group-item px-0">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" class="avatar rounded-circle">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/bootstrap.jpg">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <h5>Argon Design System</h5>--}}
{{--                                        <div class="progress progress-xs mb-0">--}}
{{--                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item px-0">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" class="avatar rounded-circle">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/angular.jpg">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <h5>Angular Now UI Kit PRO</h5>--}}
{{--                                        <div class="progress progress-xs mb-0">--}}
{{--                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item px-0">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" class="avatar rounded-circle">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/sketch.jpg">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <h5>Black Dashboard</h5>--}}
{{--                                        <div class="progress progress-xs mb-0">--}}
{{--                                            <div class="progress-bar bg-red" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="list-group-item px-0">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Avatar -->--}}
{{--                                        <a href="#" class="avatar rounded-circle">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/react.jpg">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <h5>React Material Dashboard</h5>--}}
{{--                                        <div class="progress progress-xs mb-0">--}}
{{--                                            <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-5">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h5 class="h3 mb-0">Activity feed</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-header d-flex align-items-center">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <a href="#">--}}
{{--                                <img src="{{ asset('argon') }}/img/theme/team-1.jpg" class="avatar">--}}
{{--                            </a>--}}
{{--                            <div class="mx-3">--}}
{{--                                <a href="#" class="text-dark font-weight-600 text-sm">John Snow</a>--}}
{{--                                <small class="d-block text-muted">3 days ago</small>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="text-right ml-auto">--}}
{{--                            <button type="button" class="btn btn-sm btn-primary btn-icon">--}}
{{--                                <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>--}}
{{--                                <span class="btn-inner--text">Follow</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <p class="mb-4">--}}
{{--                            Personal profiles are the perfect way for you to grab their attention and persuade recruiters to continue reading your CV--}}
{{--                            because you’re telling them from the off exactly why they should hire you.--}}
{{--                        </p>--}}
{{--                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/img-1-1000x600.jpg" class="img-fluid rounded">--}}
{{--                        <div class="row align-items-center my-3 pb-3 border-bottom">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="icon-actions">--}}
{{--                                    <a href="#" class="like active">--}}
{{--                                        <i class="ni ni-like-2"></i>--}}
{{--                                        <span class="text-muted">150</span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="ni ni-chat-round"></i>--}}
{{--                                        <span class="text-muted">36</span>--}}
{{--                                    </a>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="ni ni-curved-next"></i>--}}
{{--                                        <span class="text-muted">12</span>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6 d-none d-sm-block">--}}
{{--                                <div class="d-flex align-items-center justify-content-sm-end">--}}
{{--                                    <div class="avatar-group">--}}
{{--                                        <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Jessica Rowland">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg" class="">--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Audrey Love">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg" class="rounded-circle">--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="avatar avatar-xs rounded-circle" data-toggle="tooltip" data-original-title="Michael Lewis">--}}
{{--                                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg" class="rounded-circle">--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                    <small class="pl-2 font-weight-bold">and 30+ more</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Comments -->--}}
{{--                        <div class="mb-1">--}}
{{--                            <div class="media media-comment">--}}
{{--                                <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="media-comment-text">--}}
{{--                                        <h6 class="h5 mt-0">Michael Lewis</h6>--}}
{{--                                        <p class="text-sm lh-160">Cras sit amet nibh libero nulla vel metus scelerisque ante sollicitudin. Cras purus odio--}}
{{--                                            vestibulum in vulputate viverra turpis.</p>--}}
{{--                                        <div class="icon-actions">--}}
{{--                                            <a href="#" class="like active">--}}
{{--                                                <i class="ni ni-like-2"></i>--}}
{{--                                                <span class="text-muted">3 likes</span>--}}
{{--                                            </a>--}}
{{--                                            <a href="#">--}}
{{--                                                <i class="ni ni-curved-next"></i>--}}
{{--                                                <span class="text-muted">2 shares</span>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="media media-comment">--}}
{{--                                <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                <div class="media-body">--}}
{{--                                    <div class="media-comment-text">--}}
{{--                                        <h6 class="h5 mt-0">Jessica Stones</h6>--}}
{{--                                        <p class="text-sm lh-160">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.--}}
{{--                                            Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>--}}
{{--                                        <div class="icon-actions">--}}
{{--                                            <a href="#" class="like active">--}}
{{--                                                <i class="ni ni-like-2"></i>--}}
{{--                                                <span class="text-muted">10 likes</span>--}}
{{--                                            </a>--}}
{{--                                            <a href="#">--}}
{{--                                                <i class="ni ni-curved-next"></i>--}}
{{--                                                <span class="text-muted">1 share</span>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <hr />--}}
{{--                            <div class="media align-items-center">--}}
{{--                                <img alt="Image placeholder" class="avatar avatar-lg rounded-circle mr-4" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                <div class="media-body">--}}
{{--                                    <form>--}}
{{--                                        <textarea class="form-control" placeholder="Write your comment" rows="1"></textarea>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-7">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <div class="card">--}}
{{--                            <!-- Card header -->--}}
{{--                            <div class="card-header border-0">--}}
{{--                                <h3 class="mb-0">Light table</h3>--}}
{{--                            </div>--}}
{{--                            <div class="table-responsive">--}}
{{--                                <table class="table align-items-center table-flush">--}}
{{--                                    <thead class="thead-light">--}}
{{--                                        <tr>--}}
{{--                                            <th scope="col" class="sort" data-sort="name">Project</th>--}}
{{--                                            <th scope="col" class="sort" data-sort="budget">Budget</th>--}}
{{--                                            <th scope="col" class="sort" data-sort="status">Status</th>--}}
{{--                                            <th scope="col">Users</th>--}}
{{--                                            <th scope="col" class="sort" data-sort="completion">Completion</th>--}}
{{--                                            <th scope="col"></th>--}}
{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody class="list">--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/bootstrap.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">Argon Design System</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $2500 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-warning"></i>--}}
{{--                                                    <span class="status">pending</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">60%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/angular.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $1800 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-success"></i>--}}
{{--                                                    <span class="status">completed</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">100%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/sketch.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">Black Dashboard</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $3150 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-danger"></i>--}}
{{--                                                    <span class="status">delayed</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">72%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/react.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">React Material Dashboard</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $4400 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-info"></i>--}}
{{--                                                    <span class="status">on schedule</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">90%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/vue.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $2200 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-success"></i>--}}
{{--                                                    <span class="status">completed</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">100%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/bootstrap.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">Argon Design System</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $2500 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-warning"></i>--}}
{{--                                                    <span class="status">pending</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">60%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/angular.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $1800 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-success"></i>--}}
{{--                                                    <span class="status">completed</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">100%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/sketch.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">Black Dashboard</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $3150 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-danger"></i>--}}
{{--                                                    <span class="status">delayed</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">72%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th scope="row">--}}
{{--                                                <div class="media align-items-center">--}}
{{--                                                    <a href="#" class="avatar rounded-circle mr-3">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/angular.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </th>--}}
{{--                                            <td class="budget">--}}
{{--                                                $1800 USD--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <span class="badge badge-dot mr-4">--}}
{{--                                                    <i class="bg-success"></i>--}}
{{--                                                    <span class="status">completed</span>--}}
{{--                                                </span>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="avatar-group">--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-2.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-3.jpg">--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">--}}
{{--                                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg">--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                <div class="d-flex align-items-center">--}}
{{--                                                    <span class="completion mr-2">100%</span>--}}
{{--                                                    <div>--}}
{{--                                                        <div class="progress">--}}
{{--                                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                            <td class="text-right">--}}
{{--                                                <div class="dropdown">--}}
{{--                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                        <i class="fas fa-ellipsis-v"></i>--}}
{{--                                                    </a>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--                                                        <a class="dropdown-item" href="#">Action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Another action</a>--}}
{{--                                                        <a class="dropdown-item" href="#">Something else here</a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-deck">--}}
{{--                    <div class="card bg-gradient-default">--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="mb-2">--}}
{{--                                <sup class="text-white">$</sup> <span class="h2 text-white">3,300</span>--}}
{{--                                <div class="text-light mt-2 text-sm">Your current balance</div>--}}
{{--                                <div>--}}
{{--                                    <span class="text-success font-weight-600">+ 15%</span> <span class="text-light">($250)</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <button class="btn btn-sm btn-block btn-neutral">Add credit</button>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <small class="text-light">Orders: 60%</small>--}}
{{--                                    <div class="progress progress-xs my-2">--}}
{{--                                        <div class="progress-bar bg-success" style="width: 60%"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col"><small class="text-light">Sales: 40%</small>--}}
{{--                                    <div class="progress progress-xs my-2">--}}
{{--                                        <div class="progress-bar bg-warning" style="width: 40%"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Username card -->--}}
{{--                    <div class="card bg-gradient-danger">--}}
{{--                        <!-- Card body -->--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row justify-content-between align-items-center">--}}
{{--                                <div class="col">--}}
{{--                                    <img src="{{ asset('argon') }}/img/icons/cards/bitcoin.png" alt="Image placeholder" />--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <span class="badge badge-lg badge-success">Active</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="my-4">--}}
{{--                                <span class="h6 surtitle text-light">--}}
{{--                            Username--}}
{{--                            </span>--}}
{{--                                <div class="h1 text-white">@johnsnow</div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col">--}}
{{--                                    <span class="h6 surtitle text-light">Name</span>--}}
{{--                                    <span class="d-block h3 text-white">John Snow</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header border-0">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h3 class="mb-0">Page visits</h3>--}}
{{--                            </div>--}}
{{--                            <div class="col text-right">--}}
{{--                                <a href="#!" class="btn btn-sm btn-primary">See all</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <!-- Projects table -->--}}
{{--                        <table class="table align-items-center table-flush">--}}
{{--                            <thead class="thead-light">--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">Page name</th>--}}
{{--                                    <th scope="col">Visitors</th>--}}
{{--                                    <th scope="col">Unique users</th>--}}
{{--                                    <th scope="col">Bounce rate</th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        /argon/--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        4,569--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        340--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        /argon/index.html--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        3,985--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        319--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        /argon/charts.html--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        3,513--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        294--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        /argon/tables.html--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        2,050--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        147--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        /argon/profile.html--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        1,795--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        190--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header border-0">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h3 class="mb-0">Social traffic</h3>--}}
{{--                            </div>--}}
{{--                            <div class="col text-right">--}}
{{--                                <a href="#!" class="btn btn-sm btn-primary">See all</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="table-responsive">--}}
{{--                        <!-- Projects table -->--}}
{{--                        <table class="table align-items-center table-flush">--}}
{{--                            <thead class="thead-light">--}}
{{--                                <tr>--}}
{{--                                    <th scope="col">Referral</th>--}}
{{--                                    <th scope="col">Visitors</th>--}}
{{--                                    <th scope="col"></th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        Facebook--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        1,480--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="mr-2">60%</span>--}}
{{--                                            <div>--}}
{{--                                                <div class="progress">--}}
{{--                                                    <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"--}}
{{--                                                        style="width: 60%;"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        Facebook--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        5,480--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="mr-2">70%</span>--}}
{{--                                            <div>--}}
{{--                                                <div class="progress">--}}
{{--                                                    <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"--}}
{{--                                                        style="width: 70%;"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        Google--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        4,807--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="mr-2">80%</span>--}}
{{--                                            <div>--}}
{{--                                                <div class="progress">--}}
{{--                                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"--}}
{{--                                                        style="width: 80%;"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        Instagram--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        3,678--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="mr-2">75%</span>--}}
{{--                                            <div>--}}
{{--                                                <div class="progress">--}}
{{--                                                    <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th scope="row">--}}
{{--                                        twitter--}}
{{--                                    </th>--}}
{{--                                    <td>--}}
{{--                                        2,645--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <div class="d-flex align-items-center">--}}
{{--                                            <span class="mr-2">30%</span>--}}
{{--                                            <div>--}}
{{--                                                <div class="progress">--}}
{{--                                                    <div class="progress-bar bg-gradient-warning" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"--}}
{{--                                                        style="width: 30%;"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Footer -->
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
{{--    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>--}}
{{--    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>--}}
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
<script>
    $( document ).ready(function() {
        mapboxgl.accessToken = 'pk.eyJ1IjoicG93ZXJtYXJrZXQiLCJhIjoiY2s3b3ZncDJ0MDkwZTNlbWtoYWY2MTZ6ZCJ9.Ywq8CoJ8OHXlQ4voDr4zow';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/light-v10',
            zoom: 13.5,
            // center: [-122.447303, 37.753574],
            center: [-77.04, 38.907],
            pitch: 45,
            bearing: -17.6,
            antialias: true
        });
        map.on('load', function() {
            var layers = map.getStyle().layers;

            var labelLayerId;
            for (var i = 0; i < layers.length; i++) {
                if (layers[i].type === 'symbol' && layers[i].layout['text-field']) {
                    labelLayerId = layers[i].id;
                    break;
                }
            }
            // map.addSource('ethnicity', {
            //     type: 'vector',
            //     url: 'mapbox://examples.8fgz4egr'
            // });
            map.addSource('places', {
                'type': 'geojson',
                'data': {
                    'type': 'FeatureCollection',
                    'features': [
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Make it Mount Pleasant</strong><p><a href="http://www.mtpleasantdc.com/makeitmtpleasant" target="_blank" title="Opens in a new window">Make it Mount Pleasant</a> is a handmade and vintage market and afternoon of live entertainment and kids activities. 12:00-6:00 p.m.</p>',
                                'icon': 'theatre'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.038659, 38.931567]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Mad Men Season Five Finale Watch Party</strong><p>Head to Lounge 201 (201 Massachusetts Avenue NE) Sunday for a <a href="http://madmens5finale.eventbrite.com/" target="_blank" title="Opens in a new window">Mad Men Season Five Finale Watch Party</a>, complete with 60s costume contest, Mad Men trivia, and retro food and drink. 8:00-11:00 p.m. $10 general admission, $20 admission and two hour open bar.</p>',
                                'icon': 'theatre'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.003168, 38.894651]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Big Backyard Beach Bash and Wine Fest</strong><p>EatBar (2761 Washington Boulevard Arlington VA) is throwing a <a href="http://tallulaeatbar.ticketleap.com/2012beachblanket/" target="_blank" title="Opens in a new window">Big Backyard Beach Bash and Wine Fest</a> on Saturday, serving up conch fritters, fish tacos and crab sliders, and Red Apron hot dogs. 12:00-3:00 p.m. $25.grill hot dogs.</p>',
                                'icon': 'bar'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.090372, 38.881189]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Ballston Arts & Crafts Market</strong><p>The <a href="http://ballstonarts-craftsmarket.blogspot.com/" target="_blank" title="Opens in a new window">Ballston Arts & Crafts Market</a> sets up shop next to the Ballston metro this Saturday for the first of five dates this summer. Nearly 35 artists and crafters will be on hand selling their wares. 10:00-4:00 p.m.</p>',
                                'icon': 'art-gallery'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.111561, 38.882342]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Seersucker Bike Ride and Social</strong><p>Feeling dandy? Get fancy, grab your bike, and take part in this year\'s <a href="http://dandiesandquaintrelles.com/2012/04/the-seersucker-social-is-set-for-june-9th-save-the-date-and-start-planning-your-look/" target="_blank" title="Opens in a new window">Seersucker Social</a> bike ride from Dandies and Quaintrelles. After the ride enjoy a lawn party at Hillwood with jazz, cocktails, paper hat-making, and more. 11:00-7:00 p.m.</p>',
                                'icon': 'bicycle'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.052477, 38.943951]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Capital Pride Parade</strong><p>The annual <a href="http://www.capitalpride.org/parade" target="_blank" title="Opens in a new window">Capital Pride Parade</a> makes its way through Dupont this Saturday. 4:30 p.m. Free.</p>',
                                'icon': 'rocket'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.043444, 38.909664]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Muhsinah</strong><p>Jazz-influenced hip hop artist <a href="http://www.muhsinah.com" target="_blank" title="Opens in a new window">Muhsinah</a> plays the <a href="http://www.blackcatdc.com">Black Cat</a> (1811 14th Street NW) tonight with <a href="http://www.exitclov.com" target="_blank" title="Opens in a new window">Exit Clov</a> and <a href="http://godsilla.bandcamp.com" target="_blank" title="Opens in a new window">Gods’illa</a>. 9:00 p.m. $12.</p>',
                                'icon': 'music'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.031706, 38.914581]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>A Little Night Music</strong><p>The Arlington Players\' production of Stephen Sondheim\'s  <a href="http://www.thearlingtonplayers.org/drupal-6.20/node/4661/show" target="_blank" title="Opens in a new window"><em>A Little Night Music</em></a> comes to the Kogod Cradle at The Mead Center for American Theater (1101 6th Street SW) this weekend and next. 8:00 p.m.</p>',
                                'icon': 'music'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.020945, 38.878241]
                            }
                        },
                        {
                            'type': 'Feature',
                            'properties': {
                                'description':
                                    '<strong>Truckeroo</strong><p><a href="http://www.truckeroodc.com/www/" target="_blank">Truckeroo</a> brings dozens of food trucks, live music, and games to half and M Street SE (across from Navy Yard Metro Station) today from 11:00 a.m. to 11:00 p.m.</p>',
                                'icon': 'music'
                            },
                            'geometry': {
                                'type': 'Point',
                                'coordinates': [-77.007481, 38.876516]
                            }
                        }
                    ]
                }
            });
            map.addLayer({
                'id': 'places',
                'type': 'symbol',
                'source': 'places',
                'layout': {
                    'icon-image': '{icon}-15',
                    'icon-allow-overlap': true
                }
            });
            // When a click event occurs on a feature in the places layer, open a popup at the
// location of the feature, with description HTML from its properties.
            map.on('click', 'places', function(e) {
                var coordinates = e.features[0].geometry.coordinates.slice();
                var description = e.features[0].properties.description;

// Ensure that if the map is zoomed out such that multiple
// copies of the feature are visible, the popup appears
// over the copy being pointed to.
                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
                }

                new mapboxgl.Popup()
                    .setLngLat(coordinates)
                    .setHTML(description)
                    .addTo(map);
            });

// Change the cursor to a pointer when the mouse is over the places layer.
            map.on('mouseenter', 'places', function() {
                map.getCanvas().style.cursor = 'pointer';
            });

// Change it back to a pointer when it leaves.
            map.on('mouseleave', 'places', function() {
                map.getCanvas().style.cursor = '';
            });
            map.addLayer(
                {
                    'id': '3d-buildings',
                    'source': 'composite',
                    'source-layer': 'building',
                    'filter': ['==', 'extrude', 'true'],
                    'type': 'fill-extrusion',
                    'minzoom': 15,
                    'paint': {
                        'fill-extrusion-color': '#aaa',

// use an 'interpolate' expression to add a smooth transition effect to the
// buildings as the user zooms in
                        'fill-extrusion-height': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            15,
                            0,
                            15.05,
                            ['get', 'height']
                        ],
                        'fill-extrusion-base': [
                            'interpolate',
                            ['linear'],
                            ['zoom'],
                            15,
                            0,
                            15.05,
                            ['get', 'min_height']
                        ],
                        'fill-extrusion-opacity': 0.6
                    }
                },
                labelLayerId
            );
            // map.addLayer({
            //     'id': 'population',
            //     'type': 'circle',
            //     'source': 'ethnicity',
            //     'source-layer': 'sf2010',
            //     'paint': {
            //         // make circles larger as the user zooms from z12 to z22
            //         'circle-radius': {
            //             'base': 1.75,
            //             'stops': [
            //                 [12, 2],
            //                 [22, 180]
            //             ]
            //         },
            //         // color circles by ethnicity, using a match expression
            //         // https://docs.mapbox.com/mapbox-gl-js/style-spec/#expressions-match
            //         'circle-color': [
            //             'match',
            //             ['get', 'ethnicity'],
            //             'White',
            //             '#fbb03b',
            //             'Black',
            //             '#223b53',
            //             'Hispanic',
            //             '#e55e5e',
            //             'Asian',
            //             '#3bb2d0',
            //             /* other */ '#ccc'
            //         ]
            //     }
            // });
        });
    });
</script>
@endpush
