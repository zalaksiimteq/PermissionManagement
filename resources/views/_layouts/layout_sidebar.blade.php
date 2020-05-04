@extends('_layouts.layout_topbar')

@section('sidebar')
@php
$dash_ac = ($title == 'Dashboard') ? 'm-menu__item--active' : '';
$task_ac = ($title == 'Task management' || $title == 'Reminder') ? 'm-menu__item--active' : '';
$leave_ac = ($title == 'Leave management') ? 'm-menu__item--active' : '';
$attendance_ac = ($title == 'Attendance') ? 'm-menu__item--active' : '';
$people_ac = ($title == 'Employee') ? 'm-menu__item--active' : '';
$project_ac = ($title == 'Projects') ? 'm-menu__item--active' : '';
$issue_ac = ($title == 'Issues listing') ? 'm-menu__item--active' : '';
$dsm_issue_ac = ($title == 'DSM Issues') ? 'm-menu__item--active' : '';
$document_ac = ($title == 'Documents')  ? 'm-menu__item--active' : '';
$setting_ac = ($title == 'Designation' || $title == 'Holidays' || $title == 'Login History') ? 'm-menu__item--active' : '';
$training_ac = ($title == 'Company Policy' || $title == 'Training Docs') ? 'm-menu__item--active' : '';
@endphp


<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
                <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                    <li class="m-menu__item  {{ $dash_ac }}" aria-haspopup="true" >
                        <a  href="/hr/dashboard" class="m-menu__link ">
                            <i class="m-menu__link-icon flaticon-line-graph"></i>
                            <span class="m-menu__link-title">
                                <span class="m-menu__link-wrap">
                                    <span class="m-menu__link-text">
                                        Dashboard
                                    </span>
                                </span>
                            </span>
                        </a>
                    </li>
                        <li class="m-menu__section ">
                            <h4 class="m-menu__section-text">
                                Training
                            </h4>
                            <i class="m-menu__section-icon flaticon-more-v3"></i>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu {{ $training_ac }}" aria-haspopup="true"  m-menu-submenu-toggle="hover">
                            <a  href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-icon flaticon-network"></i>
                                <span class="m-menu__link-text">
                                    Training
                                </span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item  m-menu__item--parent {{ $training_ac }}" aria-haspopup="true" >
                                        <span class="m-menu__link">
                                            <span class="m-menu__link-text">
                                                Training
                                            </span>
                                        </span>
                                        <li class="m-menu__item " aria-haspopup="true" >
                                            <a  href="#" class="m-menu__link ">
                                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                                    <span></span>
                                                </i>
                                                <span class="m-menu__link-text">
                                                    Company Policy
                                                </span>
                                            </a>
                                        </li>
                                    </li>
                                </ul>
                            </div>
                        </li>
                </ul>
            </div>
            <!-- END: Aside Menu -->
        </div>
        <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper" style="margin-bottom: 0px !important;">
            {{--  BEGIN: Subheader --}}
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title ">
                            {{ $title }}
                        </h3>
                    </div>
                    <div>
                        <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                            <span class="m-subheader__daterange-label">
                                <span class="m-subheader__daterange-title"></span>
                                <span class="m-subheader__daterange-date m--font-brand"></span>
                            </span>
                            {{-- <a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"> --}}
                                {{-- <i class="la la-angle-down"></i> --}}
                            {{-- </a> --}}
                        </span>
                    </div>
                </div>
            </div>
            {{--  END: Subheader --}}
            <div class="container" style="margin-top: 2%;">
                @yield('content')
            </div>
        </div>
        </div>
@endsection
