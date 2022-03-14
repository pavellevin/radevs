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
                        <h4 class="card-title">Tests</h4>
                    </div>
                    <div class="card-datatable table-responsive pt-0">
                        <table class="user-list-table table">
                            <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Grade</th>
                                <th>Criterion</th>
                                <th>Manager</th>
                                <th width="500px">Action</th>
                            </tr>
                            </thead>
                            @foreach($tests as $test)
                                <tr>
                                    <td>{{ $test->name }}</td>
                                    <td>{{ $test->date }}</td>
                                    <td>{{ $test->location }}</td>
                                    <td>{{ $test->grade }}</td>
                                    <td>{{ $test->criterion }}</td>
                                    <td>{{ $test->manager->name }}</td>
                                    <td>
                                        <form action="{{ route('tests.destroy',$test->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('tests.show',$test->id) }}">Show</a>
                                           @can('test-edit')
                                                <a class="btn btn-primary" href="{{ route('tests.edit',$test->id) }}">Edit</a>
                                            @endcan

                                            @csrf
                                            @method('DELETE')
                                            @can('test-delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            @endcan
                                            @can('test-create')
                                                <button class="dt-button add-new btn btn-info" tabindex="0" aria-controls="DataTables_Table_0" type="button" data-bs-toggle="modal" data-bs-target="#modals-slide-in"><span>Add New Test</span></button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- Modal to add new user starts-->
                    @include('tests.modals.add_test')
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
    @include('tests.partials.vendor_css')
@endsection

@section('page_vendor_js')
    @include('tests.partials.page_vendor_js')
@endsection
