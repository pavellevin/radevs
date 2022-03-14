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
                                    <h3 class="fw-bolder mb-75">{{ count($users) }}</h3>
                                    <span>Total Users</span>
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
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Created_at</th>
                                <th width="500px">Action</th>
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
                                    <td>
                                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                                            @can('user-edit')
                                                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('user-delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            @endcan
                                            @can('user-create')
                                                <button class="dt-button add-new btn btn-info" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Add New User</span></button>
                                            @endcan
                                        </form>
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
    @include('users.partials.vendor_css')
@endsection

@section('page_vendor_js')
    @include('users.partials.page_vendor_js')
@endsection
