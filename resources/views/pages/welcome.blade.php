@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

<head>

<!-- Hotjar Tracking Code for https://mapping.powermarket.ai -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1996002,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
</head>
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
                            {{ __('Locate solar sites, forecast their generation prospects, and calculate your potential ROI') }}
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

    <script>
  window.intercomSettings = {
    app_id: "z30flz8e"
  };
</script>

<script>
// We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/z30flz8e'
(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/z30flz8e';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>

<script>
  window.intercomSettings = {
    app_id: "z30flz8e",
    name: "<%= current_user.name %>", // Full name
    email: "<%= current_user.email %>", // Email address
    created_at: "<%= current_user.created_at.to_i %>" // Signup date as a Unix timestamp
  };
</script>

<script>
// We pre-filled your app ID in the widget URL: 'https://widget.intercom.io/widget/z30flz8e'
(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/z30flz8e';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
@endsection
