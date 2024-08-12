@if (env('APP_MODE') == 'demo')
    <div class="__announcement-bar" style="background-image: url({{ asset(config('app.static') . '/website-top-header.png') }})">
        <div class="container">
            <div class="wrapper">
                <div class="txt">
                    {{ __('messages.demo_website_message') }}
                </div>
                <a href="https://codecanyon.net/item/emarket-ecommerce-app-with-laravel-admin-panel-delivery-man-app/31157454?s_rank=20" class="click" target="_blank">
                    {{ __('messages.click_now') }} <img src="{{ asset(config('app.static') . '/arrowww.png') }}" alt="">
                </a>
                <a href="https://codecanyon.net/item/emarket-ecommerce-app-with-laravel-admin-panel-delivery-man-app/31157454?s_rank=20" class="btn btn-sm" style="background-color: #FF7500; color:#ffffff" target="_blank">
                    {{ __('messages.buy_now') }}
                </a>
            </div>
        </div>
    </div>
@endif

<div id="headerMain" class="d-none">
    <header id="header"
            class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered">
        <div class="navbar-nav-wrap">
            <div class="navbar-brand-wrapper">



            </div>

            <div class="navbar-nav-wrap-content-left d-xl-none">
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                    <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                       data-placement="right" title="{{ __('messages.collapse') }}"></i>
                    <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                       data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       data-toggle="tooltip" data-placement="right" title="{{ __('messages.expand') }}"></i>
                </button>
            </div>

            <div class="navbar-nav-wrap-content-right">
                <ul class="navbar-nav align-items-center flex-row">
                    <li class="nav-item d-none d-sm-inline-block">
                        <div class="hs-unfold">
                            {{--
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="{{route('admin.message.list')}}">
                                <i class="tio-messages-outlined"></i>
                                @php($message=\App\Model\Conversation::where('checked',0)->count())
                                @if($message!=0)
                                    <span class="btn-status btn-status-danger">{{ $message }}</span>
                                @endif
                            </a>
                            --}}
                        </div>
                    </li>
                    {{--
                    <li class="nav-item d-none d-sm-inline-block">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle"
                               href="{{route('admin.order.list',['status'=>'pending'])}}">
                                <i class="tio-shopping-cart-outlined"></i>
                                <span class="btn-status btn-status-danger">{{\App\Model\Order::where(['checked' => 0])->count()}}</span>
                            </a>
                        </div>
                    </li>
                    --}}

                    <li class="nav-item ml-md-3">
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper media align-items-center gap-3 bg-transparent dropdown-toggle dropdown-toggle-left-arrow" href="javascript:;"
                               data-hs-unfold-options='{
                                     "target": "#accountNavbarDropdown",
                                     "type": "css-animation"
                                   }'>
                                <div class="d-none d-md-block media-body text-right">
                                    {{-- <h5 class="profile-name text-capitalize mb-0">{{ auth('admin')->user()->f_name }}</h5> --}}
                                    {{-- <span class="fs-12 text-capitalize">{{ __('messages.super_admin') }}</span> --}}
                                </div>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img"
                                         src="{{ Auth::user()->image_fullpath }}"
                                         alt="{{ __('messages.image') }}">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div id="accountNavbarDropdown"
                                 class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account">
                                <div class="dropdown-item-text">
                                    <div class="media gap-3 align-items-center">
                                        <div class="avatar avatar-sm avatar-circle mr-2">
                                            {{-- <img class="avatar-img"
                                                 src="{{ auth('admin')->user()->image_fullpath }}"
                                                 alt="{{ __('messages.image') }}"> --}}
                                        </div>
                                        <div class="media-body">
                                            <span class="card-title h5">{{ Auth::user()->f_name }}</span>
                                            {{-- <span class="card-title h5">{{ auth('admin')->user()->f_name }}</span> --}}
                                            <span class="card-text">{{ Auth::user()->email }}</span>
                                            {{-- <span class="card-text">{{ auth('admin')->user()->email }}</span> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#">
                                    <span class="text-truncate pr-2" title="{{ __('messages.settings') }}">{{ __('messages.settings') }}</span>
                                </a>

                                <div class="dropdown-divider"></div>

                            @if (Auth::guard('admin')->check())
                                <a class="dropdown-item" href="javascript:" onclick="confirmLogout()">
                                    <span class="text-truncate pr-2" title="{{ __('messages.sign_out') }}">{{ __('messages.sign_out') }}</span>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <script>
                                        function confirmLogout() {
                                            Swal.fire({
                                                title: '{{ __('messages.logout_confirmation') }}',
                                                showDenyButton: true,
                                                showCancelButton: true,
                                                confirmButtonColor: '#673ab7',
                                                cancelButtonColor: '#363636',
                                                confirmButtonText: '{{ __('messages.yes') }}',
                                                cancelButtonText: '{{ __('messages.no') }}',
                                                denyButtonText: `{{ __('messages.dont_logout') }}`,
                                            }).then((result) => {
                                                if (result.value) {
                                                    document.getElementById('logout-form').submit();
                                                } else {
                                                    Swal.fire('{{ __('messages.canceled') }}', '', 'info');
                                                }
                                            });
                                        }
                                        </script>
                                </a>
                            @elseif (Auth::guard('web')->check())
                            <a class="dropdown-item" href="javascript:" onclick="confirmLogout()">
                                <span class="text-truncate pr-2" title="{{ __('messages.sign_out') }}">{{ __('messages.sign_out') }}</span>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                <script>
                                    function confirmLogout() {
                                        Swal.fire({
                                            title: '{{ __('messages.logout_confirmation') }}',
                                            showDenyButton: true,
                                            showCancelButton: true,
                                            confirmButtonColor: '#673ab7',
                                            cancelButtonColor: '#363636',
                                            confirmButtonText: '{{ __('messages.yes') }}',
                                            cancelButtonText: '{{ __('messages.no') }}',
                                            denyButtonText: `{{ __('messages.dont_logout') }}`,
                                        }).then((result) => {
                                            if (result.value) {
                                                document.getElementById('logout-form').submit();
                                            } else {
                                                Swal.fire('{{ __('messages.canceled') }}', '', 'info');
                                            }
                                        });
                                    }
                                    </script>
                            </a>
                            @endif
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>
</div>
<div id="headerFluid" class="d-none"></div>
<div id="headerDouble" class="d-none"></div>
