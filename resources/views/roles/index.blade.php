@extends('layouts.app')

@section('main')

    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <h3>Roles List</h3>
            <p class="mb-2">
                A role provided access to predefined menus and features so that depending <br/>
                on assigned role an administrator can have access to what he need
            </p>

            <!-- Role cards -->
            <div class="row">
                @foreach($roles as $role)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span>Total {{ count($role->users) }} users</span>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        @foreach($role->users as $user)
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top"
                                                title="{{ $user->name }}" class="avatar avatar-sm pull-up">
                                                <img class="rounded-circle"
                                                     src="../../../app-assets/images/avatars/2.png"
                                                     alt="Avatar"/>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                                    <div class="role-heading">
                                        <h4 class="fw-bolder">{{ $role->name }}</h4>
                                        <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal"
                                           data-bs-target="#addRoleModal">
                                            <small class="fw-bolder">Add Role</small>
                                        </a>
                                    </div>
                                    <a href="javascript:void(0);" class="text-body"><i data-feather="copy"
                                                                                       class="font-medium-5"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--/ Role cards -->

            <h3 class="mt-50">Total users with their roles</h3>
            <p class="mb-2">Find all of your company’s administrator accounts and their associate roles.</p>
            <!-- table -->
            <div class="card">
                <div class="table-responsive">
                    <table class="user-list-table table">
                        <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Created_at</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
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
            </div>
            <!-- table -->
            <!-- Add Role Modal -->
        @include('roles.modals.add_role')
        <!--/ Add Role Modal -->

        </div>
    </div>

@stop

@section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')}}">
@endsection

@section('page_css')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
@endsection

@section('page_vendor_js')
    <script src="{{asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap5.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

@section('page_js')
    <script src="{{asset('app-assets/js/scripts/pages/modal-add-role.js')}}"></script>
    <script src="{{asset('app-assets/js/scripts/pages/app-access-roles.js')}}"></script>
@endsection
