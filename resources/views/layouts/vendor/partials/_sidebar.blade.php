<div id="sidebarMain" class="d-none">
    <aside
        class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered">
        <div class="navbar-vertical-container">
            <!-- <div class="navbar-brand-wrapper justify-content-center" onclick="location.href='{{ route('vendor.dashboard') }}'" style="cursor: pointer;font-weight: bold;font-size: 15px"> -->
            <div class="navbar-brand-wrapper justify-content-center"
                style="cursor: pointer;font-weight: bold;font-size: 15px">
                <!-- Logo -->

                {{-- @php($restaurant_data=\App\CentralLogics\Helpers::get_restaurant_data())
                <a class="navbar-brand" href="{{route('vendor.dashboard')}}" aria-label="Front" style="padding-top: 0!important;padding-bottom: 0!important;">
                    <img class="navbar-brand-logo"
                         style="border-radius: 50%;height: 55px;width: 55px!important; border: 5px solid #80808012"
                         onerror="this.src='{{asset('public/assets/admin/img/160x160/img2.jpg')}}'"
                         src="{{asset('storage/app/public/restaurant/'.$restaurant_data->logo)}}"
                         alt="Logo">
                    <img class="navbar-brand-logo-mini"
                         style="border-radius: 50%;height: 55px;width: 55px!important; border: 5px solid #80808012"
                         onerror="this.src='{{asset('public/assets/admin/img/160x160/img2.jpg')}}'"
                         src="{{asset('storage/app/public/restaurant/'.$restaurant_data->logo)}}" alt="Logo">
                </a>
                {{\Illuminate\Support\Str::limit($restaurant_data->name,15)}} --}}
                <a class="navbar-brand" href="{{ route('vendor.dashboard') }}" aria-label="Front"
                    style="padding-top: 0!important;padding-bottom: 0!important;">
                    <img class="navbar-brand-logo" style="" src="{{ asset('public/assets/admin/img/logo.png') }}"
                        alt="Logo">

                </a>
                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button"
                    class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Content -->
            <div class="navbar-vertical-content text-capitalize">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel') ? 'show' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('vendor.dashboard') }}"
                            title="{{ __('messages.dashboard') }}">
                            <i class="icon-home nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{ __('messages.dashboard') }}
                            </span>
                        </a>
                    </li>
                    <!-- End Dashboards -->

                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/profile') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.addon.profile') }}">
                            <i class="icon-profile nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Profile
                            </span>
                        </a>
                    </li>

                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/categories') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.addon.categories') }}">
                            <i class="icon-menu nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Categories
                            </span>
                        </a>
                    </li>

                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/products') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.addon.products') }}">
                            <i class="icon-menu nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Products
                            </span>
                        </a>
                    </li>
                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/order') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.addon.order') }}">
                            <i class="icon-orders nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Orders
                            </span>
                        </a>
                    </li>
                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/customer') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.addon.customer') }}">
                            <i class="icon-users nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Customers
                            </span>
                        </a>
                    </li>
                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/invoices') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.addon.invoices') }}">
                            <i class="icon-calculator nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Invoices
                            </span>
                        </a>
                    </li>
                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/loyalty') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.loyalty.index') }}">
                            <i class="icon-users nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Loyalty Program
                            </span>
                        </a>
                    </li>
                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/coupon') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.coupon.add-new') }}">
                            <i class="icon-users nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Coupon
                            </span>
                        </a>
                    </li>
                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/review') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.addon.review') }}">
                            <i class="icon-users nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Review
                            </span>
                        </a>
                    </li>
                    {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/addon/Blog')?'active':''}}"style="pointer-events: none;">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{route('vendor.addon.add-new')}}"
                        >
                            <i class="icon-users nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            Blog
                            </span>
                        </a>
                    </li> --}}
                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/massage') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{ route('vendor.addon.massage') }}">
                            <i class="icon-users nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Messages
                            </span>
                        </a>
                    </li>

                    <li
                        class="navbar-vertical-aside-has-menu {{ Request::is('vendor-panel/addon/settings') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('vendor.settings') }}">
                            <i class="icon-setting nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                Settings
                            </span>
                        </a>
                    </li>

                    {{-- 
                    @if (\App\CentralLogics\Helpers::employee_module_permission_check('order'))
                    <li class="nav-item">   
                        <small class="nav-subtitle" title="{{__('messages.order')}} {{__('messages.section')}}">{{__('messages.order')}} {{__('messages.section')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li> --}}

                    <!-- Order -->
                    {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/order*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                            title="{{__('messages.orders')}}">
                            <i class="tio-shopping-cart nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{__('messages.orders')}}
                            </span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                            style="display: {{Request::is('vendor-panel/order*')?'block':'none'}}">
                            <li class="nav-item {{Request::is('vendor-panel/order/list/pending')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.order.list',['pending'])}}" title="{{__('messages.pending')}}({{__('messages.take_away')}})">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.pending')}} {{(config('order_confirmation_model') == 'restaurant' || \App\CentralLogics\Helpers::get_restaurant_data()->self_delivery_system)?'':__('messages.take_away')}}
                                            <span class="badge badge-soft-success badge-pill ml-1">
                                            @if (config('order_confirmation_model') == 'restaurant' || \App\CentralLogics\Helpers::get_restaurant_data()->self_delivery_system)
                                            {{\App\Models\Order::where(['order_status'=>'pending','restaurant_id'=>\App\CentralLogics\Helpers::get_restaurant_id()])->Notpos()->OrderScheduledIn(30)->count()}}
                                            @else
                                            {{\App\Models\Order::where(['order_status'=>'pending','restaurant_id'=>\App\CentralLogics\Helpers::get_restaurant_id(), 'order_type'=>'take_away'])->Notpos()->OrderScheduledIn(30)->count()}}
                                            @endif
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item {{Request::is('vendor-panel/order/list/confirmed')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.order.list',['confirmed'])}}" title="{{__('messages.confirmed')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.confirmed')}}
                                            <span class="badge badge-soft-success badge-pill ml-1">
                                            {{\App\Models\Order::whereIn('order_status',['confirmed', 'accepted'])->Notpos()->whereNotNull('confirmed')->where('restaurant_id', \App\CentralLogics\Helpers::get_restaurant_id())->OrderScheduledIn(30)->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item {{Request::is('vendor-panel/order/list/cooking')?'active':''}}">
                                <a class="nav-link" href="{{route('vendor.order.list',['cooking'])}}" title="{{__('messages.cooking')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.cooking')}}
                                        <span class="badge badge-info badge-pill ml-1">
                                            {{\App\Models\Order::where(['order_status'=>'processing', 'restaurant_id'=>\App\CentralLogics\Helpers::get_restaurant_id()])->Notpos()->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/order/list/ready_for_delivery')?'active':''}}">
                                <a class="nav-link" href="{{route('vendor.order.list',['ready_for_delivery'])}}" title="{{__('messages.ready_for_delivery')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.ready_for_delivery')}}
                                        <span class="badge badge-info badge-pill ml-1">
                                            {{\App\Models\Order::where(['order_status'=>'handover', 'restaurant_id'=>\App\CentralLogics\Helpers::get_restaurant_id()])->Notpos()->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/order/list/food_on_the_way')?'active':''}}">
                                <a class="nav-link" href="{{route('vendor.order.list',['food_on_the_way'])}}" title="{{__('messages.foods_on_the_way')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.food_on_the_way')}}
                                        <span class="badge badge-info badge-pill ml-1">
                                            {{\App\Models\Order::where(['order_status'=>'picked_up', 'restaurant_id'=>\App\CentralLogics\Helpers::get_restaurant_id()])->Notpos()->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/order/list/delivered')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.order.list',['delivered'])}}" title="">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.delivered')}}
                                            <span class="badge badge-success badge-pill ml-1">
                                            {{\App\Models\Order::where(['order_status'=>'delivered','restaurant_id'=>\App\CentralLogics\Helpers::get_restaurant_id()])->Notpos()->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/order/list/refunded')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.order.list',['refunded'])}}" title="">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.refunded')}}
                                            <span class="badge badge-soft-danger bg-light badge-pill ml-1">
                                            {{\App\Models\Order::Refunded()->where(['restaurant_id'=>\App\CentralLogics\Helpers::get_restaurant_id()])->Notpos()->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/order/list/scheduled')?'active':''}}">
                                <a class="nav-link" href="{{route('vendor.order.list',['scheduled'])}}" title="{{__('messages.scheduled')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.scheduled')}}
                                        <span class="badge badge-info badge-pill ml-1">
                                            {{\App\Models\Order::where('restaurant_id',\App\CentralLogics\Helpers::get_restaurant_id())->Notpos()->Scheduled()->where(function($q){
                                                if(config('order_confirmation_model') == 'restaurant' || \App\CentralLogics\Helpers::get_restaurant_data()->self_delivery_system)
                                                {
                                                    $q->whereNotIn('order_status',['failed','canceled', 'refund_requested', 'refunded']);
                                                }
                                                else
                                                {
                                                    $q->whereNotIn('order_status',['pending','failed','canceled', 'refund_requested', 'refunded'])->orWhere(function($query){
                                                        $query->where('order_status','pending')->where('order_type', 'take_away');
                                                    });
                                                }

                                            })->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/order/list/all')?'active':''}}">
                                <a class="nav-link" href="{{route('vendor.order.list',['all'])}}" title="{{__('messages.all')}} {{__('messages.order')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">
                                        {{__('messages.all')}}
                                        <span class="badge badge-info badge-pill ml-1">
                                            {{\App\Models\Order::where('restaurant_id', \App\CentralLogics\Helpers::get_restaurant_id())
                                                ->where(function($query){
                                                    return $query->whereNotIn('order_status',(config('order_confirmation_model') == 'restaurant'|| \App\CentralLogics\Helpers::get_restaurant_data()->self_delivery_system)?['failed','canceled', 'refund_requested', 'refunded']:['pending','failed','canceled', 'refund_requested', 'refunded'])
                                                    ->orWhere(function($query){
                                                        return $query->where('order_status','pending')->where('order_type', 'take_away');
                                                    });
                                            })->Notpos()->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- End Order -->
                    {{-- @endif --}}

                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('pos'))
                    <li class="nav-item">
                        <small
                            class="nav-subtitle">{{__('messages.pos')}} {{__('messages.system')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li> --}}


                    <!-- POS -->
                    {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/pos/*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                        >
                            <i class="tio-shopping nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{__('messages.pos')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                            style="display: {{Request::is('vendor-panel/pos/*')?'block':'none'}}">
                            <li class="nav-item {{Request::is('vendor-panel/pos/')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.pos.index')}}"
                                    title="{{__('messages.pos')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span
                                        class="text-truncate">{{__('messages.pos')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/pos/orders')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.pos.orders')}}" title="{{__('messages.orders')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{__('messages.orders')}}
                                        <span class="badge badge-info badge-pill ml-1">
                                            {{\App\Models\Order::where('restaurant_id',\App\CentralLogics\Helpers::get_restaurant_id())->Pos()->count()}}
                                        </span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <!-- End POS -->
                    {{-- @endif       --}}
                    {{-- <li class="nav-item">
                        <small
                            class="nav-subtitle">{{__('messages.food')}} {{__('messages.management')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li> --}}

                    <!-- AddOn -->
                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('addon'))
                    <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/addon*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{route('vendor.addon.add-new')}}" title="{{__('messages.addons')}}"
                        >
                            <i class="tio-add-circle-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{__('messages.addons')}}
                            </span>
                        </a>
                    </li>
                    @endif --}}
                    <!-- End AddOn -->
                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('food')) --}}
                    <!-- Food -->
                    {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/food*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                        >
                            <i class="tio-premium-outlined nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{__('messages.foods')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                            style="display: {{Request::is('vendor-panel/food*')?'block':'none'}}">
                            <li class="nav-item {{Request::is('vendor-panel/food/add-new')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.food.add-new')}}"
                                    title="add new food">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span
                                        class="text-truncate">{{__('messages.add')}} {{__('messages.new')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/food/list')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.food.list')}}" title="food list">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{__('messages.list')}}</span>
                                </a>
                            </li>
                            @if (\App\CentralLogics\Helpers::get_restaurant_data()->food_section)
                            <li class="nav-item {{Request::is('vendor-panel/food/bulk-import')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.food.bulk-import')}}"
                                    title="{{__('messages.bulk_import')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate text-capitalize">{{__('messages.bulk_import')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/food/bulk-export')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.food.bulk-export-index')}}"
                                    title="{{__('messages.bukl_export')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate text-capitalize">{{__('messages.bulk_export')}}</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li> --}}
                    <!-- End Food -->
                    {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/category*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle"
                            href="javascript:" title="{{__('messages.category')}}"
                        >
                            <i class="tio-category nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{__('messages.categories')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                            style="display: {{Request::is('vendor-panel/category*')?'block':'none'}}">
                            <li class="nav-item {{Request::is('vendor-panel/category/list')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.category.add')}}"
                                    title="{{__('messages.category')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{__('messages.category')}}</span>
                                </a>
                            </li>

                            <li class="nav-item {{Request::is('vendor-panel/category/sub-category-list')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.category.add-sub-category')}}"
                                    title="{{__('messages.sub_category')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{__('messages.sub_category')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif --}}

                    <!-- DeliveryMan -->
                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('deliveryman'))
                        <li class="nav-item">
                            <small class="nav-subtitle"
                                   title="{{__('messages.deliveryman')}} {{__('messages.section')}}">{{__('messages.deliveryman')}} {{__('messages.section')}}</small>
                            <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                        </li>
                        <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/delivery-man/add')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('vendor.delivery-man.add')}}"
                               title="{{__('messages.add_delivery_man')}}"
                            >
                                <i class="tio-running nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{__('messages.add_delivery_man')}}
                                </span>
                            </a>
                        </li>

                        <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/delivery-man/list')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('vendor.delivery-man.list')}}"
                               title="{{__('messages.deliveryman')}} {{__('messages.list')}}"
                            >
                                <i class="tio-filter-list nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{__('messages.deliverymen')}}
                                </span>
                            </a>
                        </li> --}}

                    {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/delivery-man/reviews/list')?'active':''}}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link"
                               href="{{route('vendor.delivery-man.reviews.list')}}" title="{{__('messages.reviews')}}"
                            >
                                <i class="tio-star-outlined nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                    {{__('messages.reviews')}}
                                </span>
                            </a>
                        </li> --}}
                    {{-- @endif --}}
                    <!-- End DeliveryMan -->

                    {{-- <li class="nav-item">
                        <small
                            class="nav-subtitle">{{__('messages.marketing')}} {{__('messages.section')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li> --}}
                    <!-- Campaign -->
                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('campaign'))
                    <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/campaign*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                            <i class="tio-image nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{__('messages.campaign')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                            style="display: {{Request::is('vendor-panel/campaign*')?'block':'none'}}">
                            <li class="nav-item {{Request::is('vendor-panel/campaign/list')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.campaign.list')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{__('messages.list')}}</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- @endif --}}
                    <!-- End Campaign -->

                    <!-- Business Section-->
                    {{-- <li class="nav-item">
                        <small class="nav-subtitle"
                                title="{{__('messages.business')}} {{__('messages.section')}}">{{__('messages.business')}} {{__('messages.section')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    @if (\App\CentralLogics\Helpers::employee_module_permission_check('restaurant_setup'))
                    <li class="nav-item {{Request::is('vendor-panel/business-settings/restaurant-setup')?'active':''}}">
                        <a class="nav-link " href="{{route('vendor.business-settings.restaurant-setup')}}" title="{{__('messages.restaurant')}} {{__('messages.config')}}"
                        >
                            <span class="tio-settings nav-icon"></span>
                            <span
                                class="text-truncate">{{__('messages.restaurant')}} {{__('messages.config')}}</span>
                        </a>
                    </li>
                    @endif --}}

                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('my_shop'))
                    <li class="navbar-vertical-aside-has-menu {{Request::is('vendor/restaurant/*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{route('vendor.shop.view')}}"
                            title="{{__('messages.my_shop')}}">
                            <i class="tio-home nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{__('messages.my_shop')}}
                            </span>
                        </a>
                    </li>
                    @endif
                    @if (\App\CentralLogics\Helpers::employee_module_permission_check('bank_info'))
                    <!-- Business Settings -->
                    <li class="navbar-vertical-aside-has-menu {{Request::is('vendor/profile*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{route('vendor.profile.bankView')}}"
                            title="{{__('messages.bank_info')}}">
                            <i class="tio-shop nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{__('messages.bank_info')}}
                            </span>
                        </a>
                    </li>
                    @endif --}}


                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('wallet')) --}}
                    <!-- RestaurantWallet -->
                    {{-- <li class="navbar-vertical-aside-has-menu {{Request::is('vendor/wallet*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{route('vendor.wallet.index')}}" title="{{__('messages.my')}} {{__('messages.wallet')}}"
                        >
                            <i class="tio-table nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{__('messages.my')}} {{__('messages.wallet')}}</span>
                        </a>
                    </li>
                    @endif --}}
                    <!-- End RestaurantWallet -->
                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('reviews'))
                    <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/reviews')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link"
                            href="{{route('vendor.reviews')}}" title="{{__('messages.reviews')}}"
                        >
                            <i class="tio-star-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{__('messages.reviews')}}
                            </span>
                        </a>
                    </li>
                    @endif --}}
                    <!-- End Business Settings -->

                    <!-- Employee-->
                    {{-- <li class="nav-item">
                        <small class="nav-subtitle" title="{{__('messages.employee')}} {{__('messages.section')}}">{{__('messages.employee')}} {{__('messages.section')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    @if (\App\CentralLogics\Helpers::employee_module_permission_check('custom_role'))
                    <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/custom-role*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{route('vendor.custom-role.create')}}"
                        title="{{__('messages.employee')}} {{__('messages.Role')}}">
                            <i class="tio-incognito nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{__('messages.employee')}} {{__('messages.Role')}}</span>
                        </a>
                    </li>
                    @endif --}}

                    {{-- @if (\App\CentralLogics\Helpers::employee_module_permission_check('employee'))
                    <li class="navbar-vertical-aside-has-menu {{Request::is('vendor-panel/employee*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                        title="{{__('messages.employees')}}">
                            <i class="tio-user nav-icon"></i>
                            <span
                                class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{__('messages.employees')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                            style="display: {{Request::is('vendor-panel/employee*')?'block':'none'}}">
                            <li class="nav-item {{Request::is('vendor-panel/employee/add-new')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.employee.add-new')}}" title="{{__('messages.add')}} {{__('messages.new')}} {{__('messages.Employee')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{__('messages.add')}} {{__('messages.new')}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{Request::is('vendor-panel/employee/list')?'active':''}}">
                                <a class="nav-link " href="{{route('vendor.employee.list')}}" title="{{__('messages.Employee')}} {{__('messages.list')}}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{__('messages.list')}}</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    @endif --}}
                    <!-- End Employee -->

                    <li class="navbar-vertical-aside-has-menu">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="javascript:"
                            onclick="Swal.fire({
                            title: 'Do you want to logout?',
                            showDenyButton: true,
                            showCancelButton: true,
                            confirmButtonColor: '#FC6A57',
                            cancelButtonColor: '#363636',
                            confirmButtonText: `Yes`,
                            denyButtonText: `Don't Logout`,
                        }).then((result) => {
                            if (result.value) {
                                @if (auth('vendor')->check())
location.href='{{ route('vendor.auth.logout') }}';
@elseif (auth('vendor_employee')->check())
location.href='{{ route('vendor.auth.employee.logout') }}';
@endif
                            } else{
                                Swal.fire('Canceled', '', 'info')
                            }
                        })">
                            <i class="icon-logout nav-icon"></i>
                            <span class="text-truncate pr-2" title="">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Content -->
        </div>
    </aside>
</div>

<div id="sidebarCompact" class="d-none">

</div>


{{-- <script>
    $(document).ready(function () {
        $('.navbar-vertical-content').animate({
            scrollTop: $('#scroll-here').offset().top
        }, 'slow');
    });
</script> --}}
