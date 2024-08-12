<div id="sidebarMain" class="d-none">
    <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container text-capitalize">
            <div class="navbar-vertical-footer-offset">
                <div class="d-flex align-items-center gap-3 py-2 px-3 justify-content-between">
                    @php($logo = App\Helpers\Helpers::get_business_settings('logo'))
                    <a class="navbar-brand w-75" href="{{route('admin.dashboard')}}" aria-label="Front">
                        <img class="navbar-brand-logo"
                             alt="{{ __('messages.logo') }}"
                             src="{{App\Helpers\Helpers::onErrorImage(
                            $logo,
                            asset('storage/app/public/ecommerce').'/' . $logo,
                            asset('assets/admin/img/160x160/img2.jpg') ,
                            'ecommerce/')}}"

                        >
                        <img class="navbar-brand-logo-mini"
                             alt="{{ __('messages.logo') }}"
                             src="{{App\Helpers\Helpers::onErrorImage(
                            $logo,
                            asset('storage/app/public/ecommerce').'/' . $logo,
                            asset('assets/admin/img/160x160/img2.jpg') ,
                            'ecommerce/')}}"
                        >
                    </a>

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
                                    <a class="nav-link" href="{{route('admin.orders.list',['all'])}}" title="">
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
                                <li class="nav-item {{Request::is('admin/orders/list/pending')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.orders.list',['pending'])}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.pending')}}
                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                {{-- {{\App\Model\Order::where(['order_status'=>'pending'])->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('order_confirmed_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/orders/list/confirmed')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.orders.list',['confirmed'])}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.confirmed')}}
                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                {{-- {{\App\Model\Order::where(['order_status'=>'confirmed'])->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('order_processing_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/orders/list/processing')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.orders.list',['processing'])}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.processing')}}
                                                <span class="badge badge-soft-warning badge-pill ml-1">
                                                {{-- {{\App\Model\Order::where(['order_status'=>'processing'])->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('order_orderfordelivery_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/orders/list/out_for_delivery')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.orders.list',['out_for_delivery'])}}"
                                       title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.out_for_delivery')}}
                                                <span class="badge badge-soft-warning badge-pill ml-1">
                                                {{-- {{\App\Model\Order::where(['order_status'=>'out_for_delivery'])->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('order_delivered_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/orders/list/delivered')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.orders.list',['delivered'])}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.delivered')}}
                                                <span class="badge badge-soft-success badge-pill ml-1">
                                                {{-- {{\App\Model\Order::where(['order_status'=>'delivered'])->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('order_returned_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/orders/list/returned')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.orders.list',['returned'])}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.returned')}}
                                                <span class="badge badge-soft-danger badge-pill ml-1">
                                                {{-- {{\App\Model\Order::where(['order_status'=>'returned'])->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('order_failed_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/orders/list/failed')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.orders.list',['failed'])}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.failed')}}
                                            <span class="badge badge-soft-danger badge-pill ml-1">
                                                {{-- {{\App\Model\Order::where(['order_status'=>'failed'])->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>0
                                {{-- @endif --}}
                                {{-- @if(in_array('order_cancelled_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/orders/list/canceled')?'active':''}}">
                                    <a class="nav-link " href="{{route('admin.orders.list',['canceled'])}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            {{__('messages.canceled')}}
                                                <span class="badge badge-soft-dark badge-pill ml-1">
                                                {{-- {{\App\Model\Order::where(['order_status'=>'canceled'])->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
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
                                    <a class="nav-link" href="{{route('admin.booking_list')}}" title="">
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
                                {{-- @if(in_array('pending_booking_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/bookings/pending*')?'active':''}}">
                                    <a class="nav-link" href="{{route('admin.bookings.pending')}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            pending
                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                {{-- {{\App\Model\Booking::pendings()->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('confirmed_booking_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/bookings/confirmed*')?'active':''}}">
                                    <a class="nav-link" href="{{route('admin.bookings.confirmed')}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            confirmed
                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                {{-- {{\App\Model\Booking::confirmed()->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                 {{-- @if(in_array('closed_booking_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/bookings/closed*')?'active':''}}">
                                    <a class="nav-link" href="{{route('admin.bookings.closed')}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            closed
                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                {{-- {{\App\Model\Booking::closed()->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('reschedule_booking_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/bookings/reschedule*')?'active':''}}">
                                    <a class="nav-link" href="{{route('admin.bookings.reschedule')}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            reschedule
                                            <span class="badge badge-soft-info badge-pill ml-1">
                                                {{-- {{\App\Model\Booking::reschedule()->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}

                                {{-- @if(in_array('rejected_booking_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/bookings/rejected*')?'active':''}}">
                                    <a class="nav-link" href="{{route('admin.bookings.rejected')}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            rejected
                                            <span class="badge badge-soft-dark badge-pill ml-1">
                                                {{-- {{\App\Model\Booking::rejected()->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('cancelled_booking_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/bookings/cancelled*')?'active':''}}">
                                    <a class="nav-link" href="{{route('admin.bookings.cancelled')}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            cancelled
                                            <span class="badge badge-soft-dark badge-pill ml-1">
                                                {{-- {{\App\Model\Booking::cancelled()->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                                {{-- @if(in_array('incomplete_booking_page_access',$userPermissions)) --}}
                                <li class="nav-item {{Request::is('admin/bookings/incomplete*')?'active':''}}">
                                    <a class="nav-link" href="{{route('admin.bookings.incomplete')}}" title="">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">
                                            incomplete
                                            <span class="badge badge-soft-dark badge-pill ml-1">
                                                {{-- {{\App\Model\Booking::incomplete()->count()}} --}}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                {{-- @endif --}}
                            </ul>
                        </li>
                        @if($role === 'super_admin')
                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin')?'show':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('admin.dashboard')}}" title="{{__('messages.Dashboards')}}">
                                <i class="tio-home-vs-1-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{__('messages.dashboard')}}
                                </span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin')?'show':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('admin.dashboard')}}" title="{{__('messages.booking')}}">
                                <i class="tio-shopping-cart nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{__('messages.booking')}}
                                </span>
                            </a>
                        </li>
                        @endif

                        @if($role === 'super_admin')
                        @endcan

                        <li class="nav-item p-top-100px">
                            <div class="nav-divider"></div>
                        </li>
                        
                    </ul>
                    
                </div>
                >
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
