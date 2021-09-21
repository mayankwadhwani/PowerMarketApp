@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
  <div class="container">
    <div class="header-body text-center mb-7">
      <!-- <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 col-md-8 px-5">
      <h1 class="text-white">{{ __('Privacy Policy') }}</h1>
    </div>
  </div> -->
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
  <div class="container mt--8 pb-5">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="pricing card-group flex-column flex-md-row mb-3">
          <div class="card card-pricing border-0 text-center mb-4">
            <div class="card-header bg-transparent">
              <h4 class="text-uppercase ls-1 text-primary py-3 mb-0">Frequently Asked Questions</h4>
            </div>
            <div class="card-body px-lg-7">
              <!-- <embed src="{{ asset('argon') }}/tc/PowerMarket Platform - Terms and Conditions.pdf" width="700px" height="2100px" > -->

              <!-- <img src="{{ asset('argon') }}/tc/PowerMarket Platform - Terms and Conditions_Page_01.png" width="100%"  > -->
              <h3 class="mb-4 mt-4 text-left">Drawing Polygons</h3>

              <h4 class="mb-3 text-left">Polygons are a third way in which you can make organise sites and create and share projects.</h4>

              <p class="mb-2 text-left">1. Use the breakeven legend on the right side to filter down your results.</p>
              <p class="mb-2 text-left">2. Select polygon edit button at the top right of your explorer (map) view.</p>
              <p class="mb-2 text-left">3. With the edit tool engaged, select a starting vertex for your polygon.</p>
              <p class="mb-2 text-left">4. Draw a cluster around the sites you want to include. Click to add a vertex.</p>
              <p class="mb-2 text-left">5. Press 'enter' to enable create project from polygon card below map.</p>
              <p class="mb-6 text-left">6. Name your project and save it. It will now be accessible via your main dashboard.</p>
              <p class="mb-6 text-left"> <img src="https://res.cloudinary.com/dqwrhv4ue/image/upload/v1632110308/ezgif.com-gif-maker_1_s9mm6e.gif" alt="PowerMarket Polygon" width="700"></p>


            </div>
            <div class="card-footer">
            <h4 class="mb-2 mt-4">Still have questions or want to help improve the FAQ?</h4>
            <a href="mailto: lucas.porterbakker@powermarket.net"><button type="button" class="btn btn-primary m-3" style="max-width: auto;">Contact Help</button></a>
            <!-- <a href="mailto: abhinav.jain@powermarket.net" target="_blank" class="text-light">Upgrade to generate your own</a> -->
          </div>
          </div>

        </div>
      </div>
    </div>


  </div>
</div>
@endsection
