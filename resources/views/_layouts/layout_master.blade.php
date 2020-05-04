<!DOCTYPE html>
<html lang="en" >
	{{-- Heade Start --}}
	<head>
		<meta charset="utf-8" />
		<title>
			Siimteq HR | {{ $title }}
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        @stack('head_script')
		<link href="{{ URL::asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="{{ URL::asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{ URL::asset('assets/global/plugins/summernote/summernote.css') }}">
		<link href="{{ URL::asset('time/TimeCircles.css')}}" rel="stylesheet" type="text/css">
		<!--end::Base Styles -->
		<link rel="stylesheet" href="{{asset('css/checkboxes.css')}}">
		<link rel="stylesheet" href="{{asset('css/lightbox.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('css/overrides.css')}}">
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
		@stack('head_link')
		<style>
			* {
				/*font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Oxygen,Ubuntu,'Fira Sans','Droid Sans','Helvetica Neue',sans-serif;*/
				font-family: Charlie Text,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Noto Sans,Ubuntu,Droid Sans,Helvetica Neue,sans-serif;
				font-weight: 500;
			}
			.note-editor {
				z-index: 1;
			}
			.m-wrapper {
				height: 100%;
			}
			th, td {
				white-space: nowrap;
			}
			.dataTables_wrapper .dataTable {
			    width: 130% !important;
			    border-collapse: initial!important;
			    border-spacing: 0!important;
			    margin: 1rem 0!important;
			}
			.dataTables_wrapper .dataTable th .m-checkbox {
				margin-top: -0.7rem !important;
				margin-bottom: 0 !important;
			}
			.dataTables_wrapper .dataTable td .m-checkbox {
				margin-top: -0.7rem !important;
				margin-bottom: 0 !important;
			}
		</style>
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}">
		<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    </head>
    <body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
        <div class="m-grid m-grid--hor m-grid--root m-page">
             @yield('topbar-header')
		</div>

		<script src="{{ URL::asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>

		<script src="{{ URL::asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/app/js/dashboard.js')}}" type="text/javascript"></script>
		<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('assets/global/plugins/summernote/summernote.js') }}"></script>
		<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->		
		<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('js/toast.js') }}"></script>
		<script src="{{ asset('js/lightbox.min.js') }}"></script>
		<script src="{{ asset('time/TimeCircles.js')}}"></script>
		<script>
		// $(document).ready(function() {
		   /*  $('.datatable').DataTable({
					"bSearch":false,
          bFilter: false,
          bInfo: false,
					"bJQueryUI": true,
					"bLengthChange" : false,
					"bPaginate": false,
					scrollCollapse: false,
					"columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": [-1,0,1,2,3,4,6,7,8,10,11]
        } ],
        "order": [[ 1, 'asc' ]]
				});
		} ); */
			$(document).ready(function() {
				$('.summernote').summernote({
					height: 300,
					width: 800
				});

			});

			$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
		</script>
		@stack('body_script')
		<script>
			$('.timepicker').timepicker({
				minuteStep: 1,
				showSeconds: false,
				secondStep: 1,
				maxHours: 24,
				defaultTime: false
			});

			$('.date-picker').datepicker({
				format:"dd-mm-yyyy",
				todayHighlight: true,
				autoclose:true
			});
		</script>

		{!! Toastr::message() !!}


    </body>
