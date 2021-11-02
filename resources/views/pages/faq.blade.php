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
            <!-- <div class="card-body px-lg-7"> -->
              <!-- <embed src="{{ asset('argon') }}/tc/PowerMarket Platform - Terms and Conditions.pdf" width="700px" height="2100px" > -->

              <!-- <img src="{{ asset('argon') }}/tc/PowerMarket Platform - Terms and Conditions_Page_01.png" width="100%"  > -->

              <!-- 1. How do I access my sites? -->
              <!-- <div class="card-header bg-transparent">
                <h3 class="text-uppercase ls-1 text-primary py-3 px-3 mb-0 text-left">What are projects and how do I create them?</h3>
                <h4 class="mb-3 text-left pb-5 pt-2 px-3">Projects are a great way to organize your sites and view reports about the region or financial requirement you’ve selected. You can even download a copy of them.</h4>
                <p class="mb-4"> <img src="https://res.cloudinary.com/dqwrhv4ue/image/upload/v1632110308/ezgif.com-gif-maker_1_s9mm6e.gif" alt="PowerMarket Polygon" width="700"></p>
              </div> -->

              <!-- 1. How do I access my sites? -->
              <div class="card-header bg-transparent">
                <h3 class="text-uppercase ls-1 text-primary py-3 mb-0 text-left" style="font-weight: 800;">How do I access my sites?</h3>
                <h4 class="mb-3 text-left pb-5 pt-2">From your home dashboard, click on the explorer icon, of the account you wish to view.</h4>
                <div class="embed-responsive embed-responsive-16by9 demo-frame">
                  <iframe src="https://www.youtube.com/embed/mLVTFWfx2Hg?rel=0" width="560" height="315" frameborder="0"></iframe>
                </div>
              </div>

              <!-- 2. What are projects and how do I create them? -->
              <div class="card-header bg-transparent">
                <h3 class="text-uppercase ls-1 text-primary py-3 mb-0 text-left" style="font-weight: 800;">What are projects and how do I create them?</h3>
                <h4 class="mb-3 text-left pb-5 pt-2">Projects are a great way to organize your sites and view reports about the region or financial requirement you’ve selected. You can even download a copy of them.</h4>
                <div class="embed-responsive embed-responsive-16by9 demo-frame">
                  <iframe src="https://www.youtube.com/embed/jaMG4UWBqhw?rel=0" width="560" height="315" frameborder="0"></iframe>
                </div>
              </div>

              <!-- 3. How do I share projects? -->
              <div class="card-header bg-transparent">
                <h3 class="text-uppercase ls-1 text-primary py-3 mb-0 text-left" style="font-weight: 800;">How do I share projects?</h3>
                <h4 class="mb-3 text-left pb-5 pt-2">You can share projects from your home dashboard with other members of your organization, to get feedback or share insights, and have other members share with you too.</h4>
                <div class="embed-responsive embed-responsive-16by9 demo-frame">
                  <iframe src="https://www.youtube.com/embed/_cygSrFfLGQ?rel=0" width="560" height="315" frameborder="0"></iframe>
                </div>
              </div>

              <!-- 4. How do I make projects based on geography? -->
              <div class="card-header bg-transparent">
                <h3 class="text-uppercase ls-1 text-primary py-3 mb-0 text-left" style="font-weight: 800;">How do I make projects based on geography?</h3>
                <h4 class="mb-3 text-left pb-5 pt-2">The polygon tool is great way to create projects based on country, region, province, neighbourhood, or street.</h4>
                <div class="embed-responsive embed-responsive-16by9 demo-frame">
                  <iframe src="https://www.youtube.com/embed/_ERc4XD0Y4s?rel=0" width="560" height="315" frameborder="0"></iframe>
                </div>
              </div>

              <!-- 5. How do I see more in depth details about a single location? -->
              <div class="card-header bg-transparent">
                <h3 class="text-uppercase ls-1 text-primary py-3 mb-0 text-left" style="font-weight: 800;">How do I see more in depth details about a single location?</h3>
                <h4 class="mb-3 text-left pb-5 pt-2">From the explorer view, zoom in and click on a site to show more details about the rooftop or location. You can even view and download a full report about that site.</h4>
                <div class="embed-responsive embed-responsive-16by9 demo-frame">
                  <iframe src="https://www.youtube.com/embed/QPPPblSjowg?rel=0" width="560" height="315" frameborder="0"></iframe>
                </div>
              </div>

              <!-- 6. How do I remove sites from a project I’ve created? -->
              <div class="card-header bg-transparent">
                <h3 class="text-uppercase ls-1 text-primary py-3 mb-0 text-left" style="font-weight: 800;">How do I remove sites from a project I’ve created?</h3>
                <h4 class="mb-3 text-left pb-5 pt-2">To remove a site from a project, navigate to the clutter, click on the site, and select remove from project.</h4>
                <div class="embed-responsive embed-responsive-16by9 demo-frame">
                    <iframe src="https://www.youtube.com/embed/c4wABoX5T04?rel=0" width="560" height="315" frameborder="0"></iframe>
                </div>
              </div>

              <!-- 7. What core assumptions are used to calculate the data I am seeing? -->
              <div class="card-header bg-transparent">
                <h3 class="text-uppercase ls-1 text-primary py-3 mb-0 text-left" style="font-weight: 800;">What core assumptions are used to calculate the data I am seeing?</h3>
                <h4 class="mb-3 text-left pb-5 pt-2">The data you are viewing is based on core assumptions pertaining to captive use, export tariff, residential tariff, and non-residential tariff (commercial), as well as a system size and cost. Using PowerMarket PRO you can enter different assumptions, to stress test your outputs, and cost horizon such as IRR and ROI.</h4>
                <div class="embed-responsive embed-responsive-16by9 demo-frame">
                  <iframe src="https://www.youtube.com/embed/Fu5sCJMADVc?rel=0" width="560" height="315" frameborder="0"></iframe>
                </div>
              </div>

              <!-- <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://res.cloudinary.com/dqwrhv4ue/image/upload/v1632110308/ezgif.com-gif-maker_1_s9mm6e.gif" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
              </div> -->


              <!-- <h3 class="mb-4 mt-4 text-left">Drawing Polygons</h3>

              <h4 class="mb-3 text-left">Polygons are a third way in which you can make organise sites and create and share projects.</h4>

              <p class="mb-2 text-left">1. Use the breakeven legend on the right side to filter down your results.</p>
              <p class="mb-2 text-left">2. Select polygon edit button at the top right of your explorer (map) view.</p>
              <p class="mb-2 text-left">3. With the edit tool engaged, select a starting vertex for your polygon.</p>
              <p class="mb-2 text-left">4. Draw a cluster around the sites you want to include. Click to add a vertex.</p>
              <p class="mb-2 text-left">5. Press 'enter' to enable create project from polygon card below map.</p>
              <p class="mb-6 text-left">6. Name your project and save it. It will now be accessible via your main dashboard.</p>
              <p class="mb-6 text-left"> <img src="https://res.cloudinary.com/dqwrhv4ue/image/upload/v1632110308/ezgif.com-gif-maker_1_s9mm6e.gif" alt="PowerMarket Polygon" width="700"></p> -->


            <!-- </div> -->
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

<style media="screen">
  .demo-frame {
  overflow: hidden;
  padding: 2em;
  margin-bottom: 50px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0,0,0,0.2);
}
</style>

@endsection
