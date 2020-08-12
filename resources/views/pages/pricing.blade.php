@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                        <h1 class="text-white">{{ __('Choose your plan') }}</h1>
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
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="pricing card-group flex-column flex-md-row mb-3">
                    <div class="card card-pricing border-0 text-center mb-4">
                        <div class="card-header bg-transparent">
                            <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">Consultant</h4>
                        </div>
                        <div class="card-body px-lg-7">
                            <div class="display-2">£500</div>
                            <span class="text-muted">per seat</span>
                            <ul class="list-unstyled my-4">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                                <i class="fas fa-terminal"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">One Region</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                                <i class="fas fa-pen-fancy"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">One KPI</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-gradient-primary shadow rounded-circle text-white">
                                                <i class="fas fa-pen-fancy"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2">Up to 1 km2</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-primary mb-3">Start free trial</button>
                        </div>
                        <div class="card-footer">
                            <a href="#!" class="text-light">Request a demo</a>
                        </div>
                    </div>
                    <div class="card card-pricing bg-gradient-success-card zoom-in shadow-lg rounded border-0 text-center mb-4">
                        <div class="card-header bg-transparent">
                            <h4 class="text-uppercase ls-1 text-white py-3 mb-0">Enterprise</h4>
                        </div>
                        <div class="card-body px-lg-7">
                            <div class="display-1 text-white">£10,000</div>
                            <span class="text-white">per seat</span>
                            <ul class="list-unstyled my-4">
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                                                <i class="fas fa-terminal"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2 text-white">Unlimited Regions</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                                                <i class="fas fa-pen-fancy"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2 text-white">Unlimited KPIs</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <div class="icon icon-xs icon-shape bg-white shadow rounded-circle text-muted">
                                                <i class="fas fa-hdd"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="pl-2 text-white">Up to 500 km2</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-secondary-orange mb-3">Contact Us</button>
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="#!" class="text-white">Request a demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-lg-center px-3 mt-5">
            <div>
                <div class="icon icon-shape bg-gradient-white shadow rounded-circle text-primary">
                    <i class="ni ni-check-bold text-primary"></i>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="text-white"><strong>GDPR Compliant</strong> - PowerMarket is 100% compliant with the General Data Protection Regulation.</p>
            </div>
        </div>
        <div class="row row-grid justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive">
                    <table class="table table-dark mt-5">
                        <thead>
                            <tr>
                                <th class="px-0 bg-transparent" scope="col">
                                    <span class="text-light font-weight-700">Features</span>
                                </th>
                                <th class="text-center bg-transparent" scope="col">Bravo Pack</th>
                                <th class="text-center bg-transparent" scope="col">Alpha Pack</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-0">IMAP/POP Support</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">Email Forwarding</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">Active Sync</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">Multiple domain hosting</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center">
                                    <span class="text-sm text-light">Limited to 1 domain only</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">Additional storage upgrade</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-0">30MB Attachment Limit</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                            <tr>
                                <td class="px-0">Password protected / Expiry links</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                            <tr>
                                <td class="px-0">Unlimited Custom Apps</td>
                                <td class="text-center"><i class="fas fa-check text-success"></i>
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
