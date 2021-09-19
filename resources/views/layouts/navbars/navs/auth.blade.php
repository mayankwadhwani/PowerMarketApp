<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand border-bottom {{ $navClass ?? 'navbar-dark bg-primary' }}">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Search form -->
            <!-- <form class="navbar-search {{ $searchClass ?? 'navbar-search-light' }} form-inline mr-sm-3" id="navbar-search-main">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative input-group-merge">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="{{ __('Search') }}" type="text">
                    </div>
                </div>
                <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </form> -->
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center ml-md-auto">
                <li class="nav-item d-xl-none">
                <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
                <li class="nav-item d-sm-none">
                    <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                        <i class="ni ni-zoom-split-in"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      @if(Auth::user()->unreadNotifications->count()>0)
                      <i class="ni ni-bell-55"></i><span class="badge badge-circle navbar-badge" style="background-color: orange">{{Auth::user()->unreadNotifications->count()}}</span>
                      @else
                      <i class="ni ni-bell-55"></i>
                      @endif
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 scroll-dropdown">

                        <!-- Dropdown header -->
                        <div class="px-3 py-3">
                            <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">{{Auth::user()->unreadNotifications->count() }}</strong> new notification(s).</h6>
                        </div>

                        <!-- List group -->
                        @foreach(Auth::user()->notifications as $notification)
                        @if($notification->unread())<div class="list-group list-group-flush single-notification notification-unread " data-notification={{ $notification->id }}>@endif
                        @if($notification->read())<div class="list-group list-group-flush single-notification notification-read" data-notification={{ $notification->id }}>@endif
                          <!-- <a href="{{ route('page.pricing') }}" class="list-group-item list-group-item-action"> -->
                          <div class="list-group-notification list-group-notification-action">
                            <div class="row align-items-center">
                              <div class="col-auto">
                                <!-- Avatar -->
                                <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg" class="avatar rounded-circle">
                              </div>
                              <div class="col ml--2">
                                <div class="d-flex justify-content-between align-items-center">
                                  <div>
                                    <h4 class="mb-0 text-sm">{{ Auth::user()->organization->name }}</h4>
                                  </div>
                                  <div class="text-right text-muted">
                                    <small>{{ $notification->created_at->diffForHumans()}}</small>
                                  </div>
                                </div>
                                <!-- need to consider different types of notifications? -->
                                <h4 class="text-sm" style="font-weight: 200 !important; padding-top: .5em;">
                                  <strong style="">{{ $notification->data['sharer_name']}}</strong> shared a project <strong><a href="/projects/{{ $notification->data['project_name']}}" target="_blank" style="color: #F7A22C; font-weight: 800;">{{ $notification->data['project_name']}}</a></strong> with you.
                                </h4>
                                <!-- <p class="text-sm mb-0">You are on trial. Upgrade Now.</p> -->
                                <!-- {{--                                        <p class="text-sm mb-0">You are on trial.<a href="{{ route('page.pricing') }}">Upgrade Now.</a></p>--}} -->
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <!-- View all -->

                        <!-- Beginning of Hard Coded Notifications -->
                        <!-- <div class="list-group list-group-flush">
                            <a href="{{ route('page.pricing') }}" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">

                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4.jpg" class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">PowerMarket</h4>
                                            </div>
                                            <div class="text-right text-muted">
                                                <small>2 hrs ago</small>
                                            </div>
                                        </div>
                                        <p class="text-sm mb-0">You are on trial. Upgrade Now.</p>
{{--                                        <p class="text-sm mb-0">You are on trial.<a href="{{ route('page.pricing') }}">Upgrade Now.</a></p>--}}
                                    </div>
                                </div>
                            </a>
                        </div> -->
                        <!-- End of Hard Coded Notifications -->

                        <a href="{{ route('page.pricing') }}" target="_blank" class="dropdown-item text-center text-primary font-weight-bold py-3">Upgrade</a>
                    </div>
                </li>
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <i class="ni ni-ungroup"></i>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">--}}
{{--                        <div class="row shortcuts px-4">--}}
{{--                            <a href="#!" class="col-4 shortcut-item">--}}
{{--                                <span class="shortcut-media avatar rounded-circle bg-gradient-red">--}}
{{--                                    <i class="ni ni-calendar-grid-58"></i>--}}
{{--                                </span>--}}
{{--                                <small>Calendar</small>--}}
{{--                            </a>--}}
{{--                            <a href="#!" class="col-4 shortcut-item">--}}
{{--                                <span class="shortcut-media avatar rounded-circle bg-gradient-orange">--}}
{{--                                    <i class="ni ni-email-83"></i>--}}
{{--                                </span>--}}
{{--                                <small>Email</small>--}}
{{--                            </a>--}}
{{--                            <a href="#!" class="col-4 shortcut-item">--}}
{{--                                <span class="shortcut-media avatar rounded-circle bg-gradient-info">--}}
{{--                                    <i class="ni ni-credit-card"></i>--}}
{{--                                </span>--}}
{{--                                <small>Payments</small>--}}
{{--                            </a>--}}
{{--                            <a href="#!" class="col-4 shortcut-item">--}}
{{--                                <span class="shortcut-media avatar rounded-circle bg-gradient-green">--}}
{{--                                    <i class="ni ni-books"></i>--}}
{{--                                </span>--}}
{{--                                <small>Reports</small>--}}
{{--                            </a>--}}
{{--                            <a href="#!" class="col-4 shortcut-item">--}}
{{--                                <span class="shortcut-media avatar rounded-circle bg-gradient-purple">--}}
{{--                                    <i class="ni ni-pin-3"></i>--}}
{{--                                </span>--}}
{{--                                <small>Maps</small>--}}
{{--                            </a>--}}
{{--                            <a href="#!" class="col-4 shortcut-item">--}}
{{--                                <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">--}}
{{--                                    <i class="ni ni-basket"></i>--}}
{{--                                </span>--}}
{{--                                <small>Shop</small>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="{{ auth()->user()->profilePicture() }}">
                            </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                        </div>
{{--                        <a href="{{ route('profile.edit') }}" class="dropdown-item">--}}
{{--                            <i class="ni ni-single-02"></i>--}}
{{--                            <span>{{ __('My profile') }}</span>--}}
{{--                        </a>--}}
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>{{ __('Settings') }}</span>
                        </a>
{{--                        <a href="#!" class="dropdown-item">--}}
{{--                            <i class="ni ni-calendar-grid-58"></i>--}}
{{--                            <span>{{ __('Activity') }}</span>--}}
{{--                        </a>--}}
                        <a href="/faq" target="_blank" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>{{ __('Support') }}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        //mark notificaiton as read
        $(".single-notification").on("click", function(event){
            var clickedNotification = $(this).attr("data-notification");
            var data = {
                'notificationId': clickedNotification
            };
            //if this notification is unread, mark it as read and change color from blue to white
            if($(this).hasClass("notification-unread")){
                $(this).removeClass("notification-unread").addClass("notification-read");
                $.ajax({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                url: '/notifications/markAsRead',
                data: data,
                dataType: 'json',
                encode: true
                }).done(function(data){
                }).fail(function(){
                    alert('something went wrong...');
                });
            }
        });
    });
</script>
