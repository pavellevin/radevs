@extends('layouts.app')

@section('main')

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="app-user-list">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bolder mb-75">{{ count($tests) }}</h3>
                                    <span>Total Tests</span>
                                </div>
                                <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="user" class="font-medium-4"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- list and filter start -->
                <div class="card">
                    <div class="card-body border-bottom">
                        <h4 class="card-title">Search & Filter</h4>
                        <div class="row">
                            <div class="col-md-4 user_role"></div>
                            <div class="col-md-4 user_plan"></div>
                            <div class="col-md-4 user_status"></div>
                        </div>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Created_at</th>
                            </tr>
                            </thead>
                            @foreach($tests as $test)
                                <tr>
                                    <td>
                                        {{ $test->name }}
                                    </td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $role)
                                                {{ $role }}
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        {{ $user->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- Modal to add new user starts-->
                    @include('users.modals.add_user')
                    <!-- Modal to add new user Ends-->
                </div>
                <!-- list and filter end -->
            </section>
            <!-- users list ends -->

        </div>
    </div>
    <!-- END: Content-->

@stop

@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">
@endsection

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
@endsection

@section('page_vendor_js')
    <script src="{{asset('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/cleave/cleave.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js')}}"></script>
@endsection

@section('page_js')
    <script src="{{asset('app-assets/js/scripts/pages/app-user-list.js')}}"></script>
@endsection
