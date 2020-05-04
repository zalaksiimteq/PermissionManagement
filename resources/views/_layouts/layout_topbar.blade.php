@extends('HR._layouts.layout_master')
@push('body_script')
    <script>
        $('#m_quicksearch_input1').keyup(function() {
            var value = $(this).val();
            $.ajax({
                url: '/hr/getissues',
                type: 'GET',
                dataType: 'JSON',
                data: {data: value},
                beforeSend: function(){
                    $("#loading").show();
                    $('#search_box').hide();
                },
                success: function(data) {
                    var rowdata = '';
                    if(data.status){
                        var res = data.issue;
                        $('#data_search').html('');
                        $('#issue_count').html('');
                        if(res.length > 0) {
                            rowdata = '';
                            var count = '( '+ res.length + ' )';
                            $('#issue_count').html(count);
                            $(res).each(function (indx, val) {
                                var myvar = '<a href="/hr/issue/' + val.id + '" class="m-list-search__result-item" target="_blank">' +
                                    '<span class="m-list-search__result-item-icon">' +
                                    '<i class="flaticon-interface-3 m--font-warning"></i>' +
                                    '</span>' +
                                    '<span class="m-list-search__result-item-text">' +
                                    '' + val.code + ' - ' + val.title +
                                    '</span>' +
                                    '</a>';
                                rowdata += myvar;
                            });
                        }else{
                            var norecord = '<span class="m-list-search__result-message" >'+
                                'No record found'+
                                '</span>';
                            // rowdata += norecord;
                        }
                    }
                    if(rowdata !== ''){
                        $("#loading").hide();
                        $('#search_box').show();
                        $('#data_search').append(rowdata);
                    }else{
                        $("#loading").hide();
                        $('#search_box').hide();
                    }
                }
            });
        });
    </script>
@endpush
@section('topbar-header')
    <header id="m_header" class="m-grid__item    m-header "  m-minimize-offset="200" m-minimize-mobile-offset="200" >
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="{{ url()->current() }}" class="m-brand__logo-wrapper">
                                <img alt="" src="{{ URL::asset('assets/demo/default/media/img/logo/logo_default_dark.png')}}" width="100px"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">
                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>
                            <!-- END -->
                            <!-- BEGIN: Topbar Toggler -->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>
                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>
                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav" style="z-index:1 !important;">
                    <!-- BEGIN: Horizontal Menu -->
                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                        <i class="la la-close"></i>
                    </button>
                    <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark "  >
                        <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel">
                                <a  href="{{ route('reminder.index') }}" class="m-menu__link">
                                    <i class="m-menu__link-icon flaticon-time"></i>
                                    <span class="m-menu__link-text">
                                      Reminders
                                  </span>
                                </a>
                            </li>
                            <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel"  m-menu-submenu-toggle="click" m-menu-link-redirect="1" aria-haspopup="true">
                                <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                    <i class="m-menu__link-icon flaticon-add"></i>
                                    <span class="m-menu__link-text">
                                        Send Task List
                                    </span>
                                    <i class="m-menu__hor-arrow la la-angle-down"></i>
                                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                                </a>
                                <div class="m-menu__submenu m-menu__submenu--classic m-menu__submenu--left" style="width:300px !important;">
                                    <span class="m-menu__arrow m-menu__arrow--adjust"></span>
                                    <ul class="m-menu__subnav">
                                        <li class="m-menu__item"  m-menu-link-redirect="1" aria-haspopup="true" style="padding:2%;">
                                            {!! Form::open(['url'=>'/hr/send-task-list', 'method'=>'POST']) !!}
                                            <div class="form-group">
                                                {{ Form::label('sign_in', 'Sign in time') }}
                                                {{ Form::text('sign_in', null, ['class'=>'form-control timepicker','required'=>'required']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('sign_out', 'Sign out time') }}
                                                {{ Form::text('sign_out', null, ['class'=>'form-control timepicker','required'=>'required']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('lunch_time_in', 'Lunch from') }}
                                                {{ Form::text('lunch_time_in', null, ['class'=>'form-control timepicker','required'=>'required']) }}
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('lunch_time_out', 'Lunch to') }}
                                                {{ Form::text('lunch_time_out', null, ['class'=>'form-control timepicker','required'=>'required']) }}
                                            </div>
                                            <p class="text-right"><button type="submit" class="btn btn-primary btn-sm" style="margin-top:2%;">Send</button></p>
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @can ('hr_menu_show_account_system')
                                <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel">
                                    <a  href="{{ route('home') }}" class="m-menu__link" target="_blank">
                                        <i class="m-menu__link-icon flaticon-edit"></i>
                                        <span class="m-menu__link-text">
                                        Accounts
                                    </span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                    <!-- END: Horizontal Menu -->								<!-- BEGIN: Topbar -->
                    <?php
                    $path = \Auth::user()->user_profile_pic;
                    $public = URL::asset('uploads/');
                    if($path != null && !empty($path) && env('APP_ENV') == 'live'){
                        $img = $public.'/'.$path;
                    }else{
                        $img = URL::asset('assets/demo/default/media/img/logo/logo_default_dark.png');
                    }
                    ?>
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid" style="margin-right:2%;">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light" m-dropdown-toggle="click" id="m_quicksearch" m-quicksearch-mode="dropdown" m-dropdown-persistent="1">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-nav__link-icon">
                                            <i class="flaticon-search-1"></i>
                                        </span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                        <div class="m-dropdown__inner ">
                                            <div class="m-dropdown__header">
                                                <form  class="m-list-search__form">
                                                    <div class="m-list-search__form-wrapper">
                                                        <span class="m-list-search__form-input-wrapper">
                                                            <input id="m_quicksearch_input1" autocomplete="off" type="text" name="q" class="m-list-search__form-input" value="" placeholder="Search...">
                                                        </span>
                                                        <span class="m-list-search__form-icon-close" id="m_quicksearch_close">
                                                            <i class="la la-remove"></i>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="m-dropdown__scrollable m-scrollable text-center" data-scrollable="true" data-max-height="50" data-mobile-max-height="50" id="loading" style="display: none;">
                                                <img src="{{ URL::asset('img/loader.gif') }}" alt="Please Wait Loading..." style="text-align: center">
                                                <p>Finding the issue...</p>
                                            </div>
                                            <div class="m-dropdown__scrollable m-scrollable" data-scrollable="true" data-max-height="300" data-mobile-max-height="200" id="search_box" style="display: none;">
                                                <div class="m-dropdown__content" >
                                                    <div class="m-demo">
                                                        <div class="m-demo__preview">
                                                            <div class="m-list-search">
                                                                <div class="m-list-search__results">
                                                                    <span class="m-list-search__result-category m-list-search__result-category--first">
                                      																	Issues <span id="issue_count"></span>
                                      																</span>
                                                                    <div id="data_search">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="m-nav__item m-topbar__quick-actions m-topbar__quick-actions--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push m-dropdown--mobile-full-width m-dropdown--skin-light"  m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-nav__link-badge m-badge m-badge--dot m-badge--info m--hide"></span>
                                        <span class="m-nav__link-icon">
                                            <i class="flaticon-share"></i>
                                        </span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" style="background: url({{asset('assets/app/media/img/bg/bg-4.jpg')}}); background-size: cover;">
                                                <span class="m-dropdown__header-title">
                                                    Quick Actions
                                                </span>
                                                <span class="m-dropdown__header-subtitle">
                                                    Shortcuts
                                                </span>
                                            </div>
                                            <div class="m-dropdown__body m-dropdown__body--paddingless">
                                                <div class="m-dropdown__content">
                                                    <div class="data" data="false" data-max-height="380" data-mobile-max-height="200">
                                                        <div class="m-nav-grid m-nav-grid--skin-light">
                                                            <div class="m-nav-grid__row">
                                                                <a href="/hr/notes" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-add"></i>
                                                                    <span class="m-nav-grid__text">
                                                                        Add Notes
                                                                    </span>
                                                                </a>
                                                                <a href="/hr/issue/create" class="m-nav-grid__item">
                                                                    <i class="m-nav-grid__icon flaticon-warning-sign"></i>
                                                                    <span class="m-nav-grid__text">
                                                                        Add Issues
                                                                    </span>
                                                                </a>
                                                            </div>
                                                            @can ('hr_menu_show_completed_task_list')
                                                                <div class="m-nav-grid__row">
                                                                    <a href="/hr/tasks?command=search&srch_deves=&srch_status=Finished&srch_from={{ date('d-m-Y') }}&srch_to={{ date('d-m-Y') }}" class="m-nav-grid__item">
                                                                        <i class="m-nav-grid__icon flaticon-clipboard"></i>
                                                                        <span class="m-nav-grid__text">
                                                                Completed Tasks
                                                              </span>
                                                                    </a>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
                                        <span class="m-topbar__userpic">
                                            <img src="{{ $img }}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
                                        </span>
                                        <span class="m-topbar__username m--hide">
                                            Nick
                                        </span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="color:#36a3f7"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src="{{ $img }}" class="m--img-rounded m--marginless" alt=""/>
                                                    </div>
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name m--font-weight-500" style="color:#36a3f7;">
                                                            {{ \Auth::user()->name }}
                                                        </span>
                                                        <a href="#" class="m-card-user__email m--font-weight-300 m-link" style="color:#36a3f7;">
                                                            {{ \Auth::user()->email }}
                                                        </a>
                                                        <a href="#" class="m-card-user__email m--font-weight-300 m-link" style="color:#ff0000;">
                                                            {{ optional(auth()->user()->role)->name }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
                                                            <span class="m-nav__section-text">
                                                                Section
                                                            </span>
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <a href="/hr/my-profile" class="m-nav__link">
                                                                <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                                <span class="m-nav__link-title">
                                                                    <span class="m-nav__link-wrap">
                                                                        <span class="m-nav__link-text">
                                                                            My Profile
                                                                        </span>
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit"></li>
                                                        <li class="m-nav__item">
                                                            @role('SuperAdmin')
                                                            <a href="{{ url('/dashboard') }}" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                Invoice System
                                                            </a>
                                                            @endrole
                                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
                                                                Logout
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('sidebar')
@endsection
