<div id="sidebarMain" class="d-none">
    <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container text-capitalize">
            <div class="navbar-vertical-footer-offset">
                <div class="d-flex align-items-center gap-3 py-2 px-3 justify-content-between">


                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mt-1">
                        <i class="tio-first-page navbar-vertical-aside-toggle-short-align"></i>
                        <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                           title="Expand"></i>
                    </button>
                </div>

                <div class="navbar-vertical-content">
                    <div class="sidebar--search-form py-3">
                        <div class="search--form-group">
                            <button type="button" class="btn"><i class="tio-search"></i></button>
                            <input type="text" class="js-form-search form-control form--control" id="search-bar-input"
                                   placeholder="Search Menu...">
                        </div>
                    </div>
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">

                        {{-- @if(in_array('Order_management_access',$userPermissions)) --}}
                        <li class="nav-item">
                            <small class="nav-subtitle">{{__('messages.order_management')}}</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>

                        <!-- Pages -->
                        {{-- @if(in_array('create_orders_management_access',$userPermissions)) --}}
                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin/orders*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-shopping-cart nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{__('messages.Order')}}
                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: {{Request::is('admin/order*')?'block':'none'}}">
                                {{-- @if(in_array('all_order_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/orders/list/all')?'active':''}}">
                                    <a class="nav-link" href="" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.all')}}
                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                {{-- {{\app\Models\Order::all()->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('order_pending_page_access',$userPermissions)) --}}

                                {{-- @endif --}}
                            </ul>
                        </li>
                        {{-- @endif --}}
                        {{-- @endif --}}

                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin/booking_list*')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-shopping-cart nav-icon"  data-toggle="tooltip" data-placement="top" title="bookings"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{__('messages.booking')}}
                                </span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: {{Request::is('admin/bookings*')?'block':'none'}}">
                                {{-- @if(in_array('all_booking_page_access',$userPermissions)) --}}
                                <li class="nav-item {{(Request::is('admin/booking_list') || Request::is('admin/booking/edit*'))?'active':''}}">
                                    <a class="nav-link" href="" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            all
                                            <span class="badge badge-soft-info badge-pill ml-1">
                                            {{-- {{ \App\Model\Booking::whereNotNull('status')->count() }} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>

                                {{-- @endif --}}
                            </ul>
                        </li>


                        <li class="nav-item p-top-100px">
                            <div class="nav-divider"></div>
                        </li>

                    </ul>
                    <ul class="navbar-nav navbar-nav-lg nav-tabs">

                        @can(('user_management'))
                            <li class="nav-item">
                                <small class="nav-subtitle">{{__('messages.user_management')}}</small>
                                <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                            </li>
                        @endcan

                        <!-- Pages -->
                        {{-- @if(in_array('user_create_user_permission_access',$userPermissions)) --}}
                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin/permissions*') ? 'active' : ''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                                <i class="tio-group-senior nav-icon" data-toggle="tooltip" data-placement="top" title="{{ __('messages.Users')}}"></i>
                                <span
                                    class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{__('messages.user_management')}}</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                                style="display: {{Request::is('admin/permissions*')?'block':'none'}}">

                        {{-- @if(in_array('user_list_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/user*')?'active':''}}">
                                    <a class="nav-link " href="#">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{('Users')}}</span>
                                </a>
                            </li>
                            {{-- @endif --}}
                            @can(('role_show'))
                            @if (Auth::guard()->name == 'admin')
                                <li class="nav-item {{Request::is('admin/role*')?'active':''}}">
                                    <a class="nav-link " href="{{route('role.list')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{__('messages.roles')}}</span>
                                    </a>
                                </li>
                            @elseif(Auth::guard()->name == 'web')
                                <li class="nav-item {{Request::is('/role*')?'active':''}}">
                                    <a class="nav-link " href="{{route('web_role.list')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{__('messages.roles')}}</span>
                                    </a>
                                </li>
                            @endif
                            @endcan
                            @can(('permission_show'))
                                <li class="nav-item {{Request::is('admin/permission*')?'active':''}}">
                                    <a class="nav-link " href="{{route('permission.list')}}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{__('messages.permission')}}</span>
                                    </a>
                                </li>
                            @endcan

                            </ul>
                        </li>
                        {{-- @endif --}}


                        <li class="nav-item p-top-100px">
                            <div class="nav-divider"></div>
                        </li>

                    </ul>

                </div>

            </div>
        </div>
    </aside>
</div>

<div id="sidebarCompact" class="d-none">

</div>

@push('script_2')
    <script>
        "use strict"

        $(window).on('load', function () {
            if ($(".navbar-vertical-content li.active").length) {
                $('.navbar-vertical-content').animate({
                    scrollTop: $(".navbar-vertical-content li.active").offset().top - 150
                }, 10);
            }
        });

        var $rows = $('.navbar-vertical-content .navbar-nav > li');
        $('#search-bar-input').keyup(function () {
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

            $rows.show().filter(function () {
                var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                return !~text.indexOf(val);
            }).hide();
        });
    </script>
@endpush
