@if(auth()->check() && !in_array(request()->route()->getName(), ['welcome', 'page.pricing','page.reporting', 'page.privacy', 'page.lock']))
    @include('layouts.navbars.navs.auth')
@endif

@if(!auth()->check() || in_array(request()->route()->getName(), ['welcome', 'page.pricing','page.reporting', 'page.privacy', 'page.lock']))
    @include('layouts.navbars.navs.guest')
@endif
